<?php
function getImagesFromFolder($folderPath) {
    $images = [];
    $extensions = ['jpg', 'jpeg', 'png', 'webp'];
    
    if (is_dir($folderPath)) {
        $files = scandir($folderPath);
        foreach ($files as $file) {
            // Skip system files and folders
            if ($file === '.' || $file === '..' || $file === 'optimized') continue;
            
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            if (in_array($extension, $extensions)) {
                $images[] = $folderPath . '/' . $file;
            }
        }
    }
    
    return $images;
}

$projects = [
  [
    'title' => 'Architectural Visualisation',
    'image' => 'images/bottle.jpg',
    'desc'  => 'Bringing spaces to life before they\'re built. Our architectural 3D visuals help bring spaces to life — before a single brick is laid. From sleek interiors to full-scale buildings, we create high-resolution renders that resonate with clients and stakeholders alike.',
    'link'  => 'contact.php',
    'category' => 'architectural',
    'services' => [
      'Interior & Exterior Renders',
      '3D Floor Plans',
      'Moodboards & Design Concepts',
      'Animated Walkthroughs',
      'Marketing-Ready Visuals'
    ],
    'works' => getImagesFromFolder('images/architectural')
  ],
  [
    'title' => 'Product Visualisation',
    'image' => 'images/we_laura_parfum.jpeg',
    'desc' => 'Your product, beautifully imagined. We turn your physical products into stunning 3D visuals that look ready for launch. Whether it\'s for branding, e-commerce, or advertising, our renders are precise, realistic, and built to convert.',
    'link'  => 'contact.php',
    'category' => 'product',
    'services' => [
      'Lifestyle Product Renders',
      'Transparent & Cutaway Views',
      'Studio-Style Renders',
      'Packaging & Label Visuals',
      'Cosmetic, Furniture, Tech & More'
    ],
    'works' => getImagesFromFolder('images/productVisiual')
  ],
  [
    'title' => 'Gaming',
    'image' => 'images/bottle.jpg',
    'desc' => 'Built for worlds beyond reality. We create optimized, game-ready 3D models tailored to your creative vision — whether it\'s a stylized racing car or a fully rigged character for a cinematic sequence.',
    'link'  => 'contact.php',
    'category' => 'gaming',
    'services' => [
      'Game Characters & Props',
      'Cars, Weapons, & Vehicles',
      'Game Asset Packs',
      'High/Low Poly Models',
      'Rigged & Ready Assets',
      'PBR Texturing for Game Engines'
    ],
    'works' => getImagesFromFolder('images/gaming')
  ]
];

// Filter only architectural projects
$architecturalProjects = array_filter($projects, function($project) {
    return $project['category'] === 'product';
});

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Architectural Visualisation - Craft Core Creatives</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css?v=9">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>
<body>
   <?php include 'header.php'; ?>
   
   <section class="w-full relative pb-20">
      <!-- Decorative background circles -->
      <div class="absolute w-[50vw] md:w-[40vw] top-0 right-0 h-72 md:h-96 rounded-full bg-blue-600 opacity-50 blur-[80px] md:blur-[100px]"></div>
      <div class="absolute w-[40vw] md:w-[20vw] left-0 bottom-0 h-32 md:h-44 rounded-full bg-blue-600 opacity-50 blur-[80px] md:blur-[100px]"></div>

      <div class="max-w-5xl w-full mx-auto my-14 px-4 z-30">
         <h2 class="text-5xl md:text-6xl font-normal uppercase mb-8 slideup-text">
            Product - <span class="text-blue-600">Visualisation</span>
         </h2>
         <?php foreach($architecturalProjects as $project): ?>
            <div class="mb-12 slideup-text">
               <p class="text-gray-300 text-lg mb-6 leading-relaxed">
                  <?= htmlspecialchars($project['desc']) ?>
               </p>
               
               <?php if (isset($project['services']) && !empty($project['services'])): ?>
                  <div class="bg-gradient-to-r from-blue-950/20 to-neutral-900/20 rounded-xl p-6 backdrop-blur-sm border border-blue-500/20">
                     <h3 class="text-xl font-semibold text-white mb-4">What We Offer:</h3>
                     <ul class="grid md:grid-cols-2 gap-3">
                        <?php foreach($project['services'] as $service): ?>
                           <li class="flex items-center text-gray-300">
                              <span class="text-blue-400 mr-3">✓</span>
                              <?= htmlspecialchars($service) ?>
                           </li>
                        <?php endforeach; ?>
                     </ul>
                  </div>
               <?php endif; ?>
            </div>
         <?php endforeach; ?>
      </div>
         
         <!-- If no architectural projects found -->
         <?php if (empty($architecturalProjects)): ?>
            <div class="text-center py-20">
               <p class="text-gray-400 text-lg">No architectural projects available at the moment.</p>
            </div>
         <?php endif; ?>
      </div>
   </section>

   <section class="w-full py-4">
      <div class="max-w-5xl mx-auto px-4 text-center">
         <h2 class="text-4xl md:text-5xl font-bold text-white mb-8">
            Our Latest <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">Designs</span>
         </h2>
            <?php foreach($architecturalProjects as $project): ?>
         <?php if (isset($project['works']) && !empty($project['works'])): ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
               <?php foreach($project['works'] as $work): ?>
                  <div class="group cursor-pointer popup-anim">
                     <div class="relative overflow-hidden rounded-xl aspect-[4/3]">
                        <img 
                           src="<?= $work ?>" 
                           alt="Architectural Design" 
                           class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                           loading="lazy"
                        />
                        <div class="absolute inset-0 bg-blue-600/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                     </div>
                  </div>
               <?php endforeach; ?>
            </div>
         <?php else: ?>
            <div class="text-center py-10">
               <p class="text-gray-400">No architectural images found. Please add images to the <code>images/architectural/</code> folder.</p>
            </div>
         <?php endif; ?>
      <?php endforeach; ?>
      </div>
   </section>


   <?php include 'footer.php'; ?>
   <script src="js/script.js"></script>
   <script src="js/animations.js"></script>
</body>
</html>