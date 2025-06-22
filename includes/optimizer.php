<?php
function optimizeImage($source, $destination, $quality = 80, $maxWidth = 1920, $maxHeight = 1080) {
    // Check if optimized image already exists
    if (file_exists($destination)) {
        return true; // Skip optimization if file already exists
    }
    
    // Check if source file exists
    if (!file_exists($source)) {
        return false;
    }
    
    // Create destination directory if it doesn't exist
    $destinationDir = dirname($destination);
    if (!file_exists($destinationDir)) {
        mkdir($destinationDir, 0777, true);
    }
    
    $info = getimagesize($source);
    if ($info === false) {
        return false;
    }
    
    $mime = $info['mime'];
    
    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($source);
            break;
        case 'image/png':
            $image = imagecreatefrompng($source);
            break;
        case 'image/webp':
            $image = imagecreatefromwebp($source);
            break;
        default:
            return false;
    }
    
    $width = imagesx($image);
    $height = imagesy($image);
    
    // Calculate new dimensions
    $ratio = min($maxWidth / $width, $maxHeight / $height);
    if ($ratio < 1) {
        $newWidth = $width * $ratio;
        $newHeight = $height * $ratio;
    } else {
        $newWidth = $width;
        $newHeight = $height;
    }
    
    // Create new image
    $newImage = imagecreatetruecolor($newWidth, $newHeight);
    
    // Preserve transparency for PNG
    if ($mime == 'image/png') {
        imagealphablending($newImage, false);
        imagesavealpha($newImage, true);
        $transparent = imagecolorallocatealpha($newImage, 255, 255, 255, 127);
        imagefilledrectangle($newImage, 0, 0, $newWidth, $newHeight, $transparent);
    }
    
    // Resize image
    imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    
    // Save optimized image
    switch ($mime) {
        case 'image/jpeg':
            imagejpeg($newImage, $destination, $quality);
            break;
        case 'image/png':
            imagepng($newImage, $destination, 9);
            break;
        case 'image/webp':
            imagewebp($newImage, $destination, $quality);
            break;
    }
    
    imagedestroy($image);
    imagedestroy($newImage);
    return true;
}

// Updated helper function that preserves subfolder structure
function getOptimizedImagePath($originalPath) {
    $pathInfo = pathinfo($originalPath);
    
    // Extract the relative path from 'images/' onward
    $relativePath = str_replace('images/', '', $originalPath);
    $subfolderPath = dirname($relativePath);
    
    // Create optimized path that preserves subfolder structure
    if ($subfolderPath === '.') {
        // Image is directly in images/ folder
        $optimizedPath = 'images/optimized/' . $pathInfo['filename'] . '_optimized.' . $pathInfo['extension'];
    } else {
        // Image is in a subfolder, preserve the structure
        $optimizedPath = 'images/optimized/' . $subfolderPath . '/' . $pathInfo['filename'] . '_optimized.' . $pathInfo['extension'];
    }
    
    // Optimize only if needed
    optimizeImage($originalPath, $optimizedPath, 85, 1200, 800);
    
    return $optimizedPath;
}
?>