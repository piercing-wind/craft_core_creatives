<?php
// CONFIGURATION:
$password = "CraftCoreCreatives-99";  // Your secret password
$imageFolders = ["architectural", "productVisual", "gaming"];

$loggedIn = false;
$error = '';
$uploadMessage = '';
$jsonMessage = '';
$selectedFolder = $imageFolders[0];  // Default folder
// Handle Password Submission
if (isset($_POST['password'])) {
    if ($_POST['password'] === $password) {
        $loggedIn = true;
        $selectedFolder = $_POST['folder'] ?? $imageFolders[0];
    } else {
        $error = "Incorrect password!";
    }
}

// Handle Folder Selection & Keep Selection Across Actions
if (isset($_POST['folder'])) {
    $selectedFolder = basename($_POST['folder']);
}

// Handle Image Upload
// Handle Image Upload
if (isset($_POST['upload'], $_FILES['image'])) {
    $folder = basename($_POST['folder']);
    if (in_array($folder, $imageFolders)) {
        $targetDir = "images/$folder/";
        $targetFile = $targetDir . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $uploadMessage = "Image uploaded successfully to <strong>$folder</strong>.";
            $targetFileForJson = str_replace('\\', '/', $targetFile);
            // --- Automatically append to JSON with pattern ---
            $jsonFile = "gallery/{$folder}.json";
            $jsonData = file_exists($jsonFile) ? json_decode(file_get_contents($jsonFile), true) : [];
            // Determine the new index (1-based)
            $newIndex = count($jsonData) + 1;
            // Set size to "large" for every 4th, 10th, 16th, etc.
            $size = (($newIndex - 4) % 6 === 0 && $newIndex >= 4) ? "large" : "normal";
            $jsonData[] = [
                "src" => $targetFileForJson,
                "size" => $size
            ];
            file_put_contents($jsonFile, json_encode($jsonData));
        } else {
            $uploadMessage = "Failed to upload image.";
        }
    }
}

// Handle JSON Save
$jsonFile = "gallery/{$selectedFolder}.json";
if (isset($_POST['saveJson'])) {
    $saved = file_put_contents($jsonFile, $_POST['json']);
    if ($saved !== false) {
        $jsonMessage = "JSON saved successfully for <strong>$selectedFolder</strong>.";
    } else {
        $jsonMessage = "Failed to save JSON.";
    }
}

// Load JSON
$jsonContent = file_exists($jsonFile) ? file_get_contents($jsonFile) : '[]';

// Delete Logic 
if (isset($_POST['delete_image'])) {
    $folder = basename($_POST['folder']);
    $fileToDelete = basename($_POST['delete_image']);
    $filePath = "images/$folder/$fileToDelete";

    if (file_exists($filePath)) {
        unlink($filePath);
        $uploadMessage = "Deleted image <strong>$fileToDelete</strong> from <strong>$folder</strong>.";
    } else {
        $uploadMessage = "Image not found.";
    }

    // Auto-remove from JSON:
    $jsonFile = "gallery/{$folder}.json";
    if (file_exists($jsonFile)) {
        $jsonData = json_decode(file_get_contents($jsonFile), true);
        $jsonData = array_filter($jsonData, function ($item) use ($fileToDelete) {
            return basename($item['src']) !== $fileToDelete;
        });
        file_put_contents($jsonFile, json_encode(array_values($jsonData)));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gallery Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
     <meta name="robots" content="index, no-follow">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col items-center justify-center p-4">
    <div class="max-w-4xl w-full bg-white rounded shadow p-6 space-y-6">
        <h1 class="text-2xl font-bold text-center">Gallery Admin Panel</h1>

        <?php if (!$loggedIn && !isset($_POST['folder'])): ?>
            <?php if ($error): ?>
                <p class="text-red-500"><?= $error ?></p>
            <?php endif; ?>
            <form method="post" class="space-y-4">
                <div>
                    <label class="block font-semibold">Enter Admin Password:</label>
                    <input type="password" name="password" class="w-full border border-gray-300 rounded p-2" required>
                </div>
                <div>
                    <label class="block font-semibold">Select Folder:</label>
                    <select name="folder" class="w-full border border-gray-300 rounded p-2" required>
                        <?php foreach ($imageFolders as $folder): ?>
                            <option value="<?= $folder ?>"><?= ucfirst($folder) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Login</button>
            </form>
        <?php else: ?>
            <!-- Upload Image Section -->
            <?php if ($uploadMessage): ?>
                <p class="text-green-600"><?= $uploadMessage ?></p>
            <?php endif; ?>
            <form method="post" enctype="multipart/form-data" class="space-y-4 border-t pt-4">
                <input type="hidden" name="folder" value="<?= $selectedFolder ?>">
                <div>
                    <label class="block font-semibold">Selected Folder: <span class="font-bold text-blue-600"><?= ucfirst($selectedFolder) ?></span></label>
                </div>
                <div>
                    <label class="block font-semibold">Select Image:</label>
                    <input type="file" name="image" accept="image/*" required>
                </div>
                <button type="submit" name="upload" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Upload Image</button>
            </form>

            <!-- JSON Editor Section -->
            <?php if ($jsonMessage): ?>
                <p class="text-green-600"><?= $jsonMessage ?></p>
            <?php endif; ?>
            <form method="post" class="space-y-4 border-t pt-4">
                <input type="hidden" name="folder" value="<?= $selectedFolder ?>">
                <label class="block font-semibold">Edit Gallery JSON for <span class="font-bold text-blue-600"><?= ucfirst($selectedFolder) ?></span>:</label>

                <textarea name="json" rows="15" class="w-full border border-gray-300 rounded p-2 font-mono text-sm"><?= file_exists($jsonFile) ? htmlspecialchars(file_get_contents($jsonFile)) : '[]' ?></textarea>
                <button type="submit" name="saveJson" class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700">Save JSON</button>
                
               </form>
               <span>Example of correct json</span>
               <pre class="bg-gray-100 p-2 rounded text-sm font-mono">
                 [
                    { "src": "images/<?= $selectedFolder ?>/1.jpg", "size": "normal" },
                    { "src": "images/<?= $selectedFolder ?>/2.jpg", "size": "normal" },
                    { "src": "images/<?= $selectedFolder ?>/3.jpg", "size": "normal" },
                    { "src": "images/<?= $selectedFolder ?>/4.jpg", "size": "large" }
                 ]
               </pre>  
               <span>Example of In-correct json</span>
               <pre class="bg-gray-100 p-2 rounded text-sm font-mono">
                 [
                    { "src": "images/<?= $selectedFolder ?>/1.jpg", "size": "normal" },
                    { "src": "images/<?= $selectedFolder ?>/2.jpg", "size": "normal" },
                    { "src": "images/<?= $selectedFolder ?>/3.jpg", "size": "normal" },
                    { "src": "images/<?= $selectedFolder ?>/4.jpg", "size": "large" }, <- This comma will break the json 
                 ]
               </pre>  
               
               <p>Every large Image is + 6 from its postion</p>
               <pre>
                 4 + 6 = 10
                 10 + 6 = 16
                 16 + 6 = 22
                 22 + 6 = 28
                 28 + 6 = 34
                 34 + 6 = 40 so on...
               </pre>
               <p><code>{"src":"images\/architectural\/1.jpeg","size":"normal"}</code> is same as (both will do the same job) <code>{"src":"images/architectural/1.jpeg","size":"normal"}</code></p>

            <!-- Change Folder -->
            <form method="post" class="pt-4 text-center">
                <label class="block font-semibold mb-2">Switch Folder:</label>
                <select name="folder" class="w-full border border-gray-300 rounded p-2 mb-2">
                    <?php foreach ($imageFolders as $folder): ?>
                        <option value="<?= $folder ?>" <?= $folder === $selectedFolder ? 'selected' : '' ?>><?= ucfirst($folder) ?></option>
                    <?php endforeach; ?>
                </select>
                <button type="submit" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Switch</button>
            </form>

            <div class="pt-4 text-center">
                <a href="<?= $_SERVER['PHP_SELF'] ?>" class="text-blue-600 hover:underline">Logout & Return to Login</a>
            </div>
            <!-- List Images in Folder with Delete Buttons -->
             <div>
                  <h2 class="text-xl font-semibold mt-6">Images in <?= ucfirst($selectedFolder) ?>:</h2>
                  <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                  <?php
                  $imageDir = "images/$selectedFolder/";
                  $images = array_filter(scandir($imageDir), function ($file) {
                     return preg_match('/\.(jpg|jpeg|png|gif|webp)$/i', $file);
                  });
                  foreach ($images as $img): ?>
                     <div class="border rounded p-2 flex flex-col items-center">
                        <img src="<?= "$imageDir$img" ?>" alt="<?= $img ?>" class="w-full h-32 object-cover rounded">
                         <div class="mt-2 text-xs text-gray-700 font-semibold break-all"><?= htmlspecialchars($img) ?></div>
                        <form method="post" class="mt-2">
                              <input type="hidden" name="folder" value="<?= $selectedFolder ?>">
                              <button type="submit" name="delete_image" value="<?= $img ?>"
                                 class="bg-red-600 text-white px-2 py-1 rounded text-xs hover:bg-red-700">
                                 Delete
                              </button>
                        </form>
                     </div>
                  <?php endforeach; ?>
                  </div>
             </div>
        <?php endif; ?>
    </div>


</body>
</html>
