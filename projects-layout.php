<?php
include_once 'includes/project-data.php';

// Get category from URL parameter or default to 'architectural'
$category = $_GET['category'] ?? 'architectural';
$projects = getProjectsByCategory($category);
$currentProject = !empty($projects) ? array_values($projects)[0] : null;


$galleryData = [];
if ($currentProject && isset($currentProject['gallery_json'])) {
    $jsonPath = $currentProject['gallery_json'];
    if (file_exists($jsonPath)) {
        $galleryData = json_decode(file_get_contents($jsonPath), true);
    }
}

// Define page titles for SEO
$pageTitles = [
    'architectural' => 'Architectural Visualisation',
    'product' => 'Product Visualisation', 
    'gaming' => 'Gaming Assets'
];
$pageTitle = $pageTitles[$category] ?? ucfirst($category);


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $pageTitle ?> - Craft Core Creatives</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css?v=9">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>
<body>
   <?php include 'header.php'; ?>
   
   <section class="w-full relative py-12">
      <!-- Decorative background circles -->
      <div class="absolute w-[50vw] md:w-[40vw] top-0 right-0 h-72 md:h-96 rounded-full bg-blue-600 opacity-50 blur-[80px] md:blur-[100px]"></div>
      <div class="absolute w-[40vw] md:w-[20vw] left-0 bottom-0 h-32 md:h-44 rounded-full bg-blue-600 opacity-50 blur-[80px] md:blur-[100px]"></div>

      <div class="max-w-5xl w-full mx-auto my-14 px-4 z-30">
      <?php if ($currentProject): ?>
         <?php 
         // Split the title into words
         $titleWords = explode(' ', $currentProject['title']);
         $firstWord = $titleWords[0] ?? '';
         $secondWord = isset($titleWords[1]) ? $titleWords[1] : '';
         ?>
         <h2 class="text-5xl md:text-6xl font-normal uppercase mb-8 slideup-text">
            <?= htmlspecialchars($firstWord) ?> <span class="text-blue-600"><?= htmlspecialchars($secondWord) ?></span>
         </h2>
      <?php else: ?>
         <?php 
         // Split the pageTitle into words for fallback
         $titleWords = explode(' ', $pageTitle);
         $firstWord = $titleWords[0] ?? '';
         $secondWord = isset($titleWords[1]) ? $titleWords[1] : '';
         ?>
         <h2 class="text-5xl md:text-6xl font-normal uppercase mb-8 slideup-text">
            <?= htmlspecialchars($firstWord) ?> <span class="text-blue-600"><?= htmlspecialchars($secondWord) ?></span>
         </h2>
      <?php endif; ?>
         
         <?php if (!empty($projects)): ?>
            <?php foreach($projects as $project): ?>
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
         <?php else: ?>
            <div class="text-center py-20">
               <p class="text-gray-400 text-lg">No <?= strtolower($pageTitle) ?> projects available at the moment.</p>
            </div>
         <?php endif; ?>
      </div>
   </section>

   <section class="w-full py-20">
      <div class="max-w-6xl mx-auto px-4">
         <?php if ($currentProject): ?>
            <h2 class="text-4xl md:text-5xl font-medium text-white mb-12 text-center slideup-text">
               Our Latest <span class="text-blue-600"><?= htmlspecialchars($currentProject['title']) ?> Works</span>
            </h2>
         <?php else: ?>
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-12 text-center slideup-text">
               Our Latest <span class="text-blue-600"><?= $pageTitle ?> Works</span>
            </h2>
         <?php endif; ?>
         
         <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-6">
            <?php foreach($galleryData as $i => $img): ?>
                  <?php if (isset($img['size']) && $img['size'] === 'large'): // Big image at 4, 10, 16, ... ?>
                     <div class="md:col-span-2 md:row-span-2">
                        <img
                              src="<?= htmlspecialchars($img['src']) ?>"
                              alt="Gallery Big Image"
                              class="w-full h-[calc(2*16rem+1.5rem)] object-cover rounded-xl cursor-pointer gallery-img"
                              loading="lazy"
                        />
                     </div>
                  <?php else: ?>
                     <div>
                        <img
                              src="<?= htmlspecialchars($img['src']) ?>"
                              alt="Gallery Image"
                              class="w-full h-64 object-cover rounded-xl cursor-pointer gallery-img"
                              loading="lazy"
                        />
                     </div>
                  <?php endif; ?>
            <?php endforeach; ?>
         </div>
      </div>
   </section>
      <!-- Modal for fullscreen image -->
   <div id="galleryModal" class="fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center z-50 hidden">
      <button id="closeModal" class="absolute top-6 right-8 text-white text-4xl font-bold">x</button>
      <button id="prevImg" class="absolute left-4 top-1/2 -translate-y-1/2 text-white text-4xl px-4 py-2 bg-black bg-opacity-40 rounded-full hover:bg-opacity-70">&#8592;</button>
      <img id="modalImg" src="" alt="Gallery Fullscreen" class="max-h-[90vh] max-w-[90vw] rounded-xl shadow-2xl border-4 border-white" />
      <button id="nextImg" class="absolute right-4 top-1/2 -translate-y-1/2 text-white text-4xl px-4 py-2 bg-black bg-opacity-40 rounded-full hover:bg-opacity-70">&#8594;</button>
   </div>

   <?php include 'footer.php'; ?>
   <script src="js/script.js"></script>
   <script src="js/animations.js"></script>
   <script>
   // --- Gallery Modal Logic ---
   const images = Array.from(document.querySelectorAll('.gallery-img'));
   const modal = document.getElementById('galleryModal');
   const modalImg = document.getElementById('modalImg');
   const closeModal = document.getElementById('closeModal');
   const prevBtn = document.getElementById('prevImg');
   const nextBtn = document.getElementById('nextImg');
   let currentIndex = 0;

   function showModal(index) {
      currentIndex = index;
      modalImg.src = images[currentIndex].src;
      modal.classList.remove('hidden');
      document.body.style.overflow = 'hidden';
   }

   function hideModal() {
      modal.classList.add('hidden');
      document.body.style.overflow = '';
   }

   function showNext() {
      currentIndex = (currentIndex + 1) % images.length;
      modalImg.src = images[currentIndex].src;
   }

   function showPrev() {
      currentIndex = (currentIndex - 1 + images.length) % images.length;
      modalImg.src = images[currentIndex].src;
   }

   images.forEach((img, idx) => {
      img.addEventListener('click', () => showModal(idx));
   });
   closeModal.addEventListener('click', hideModal);
   nextBtn.addEventListener('click', showNext);
   prevBtn.addEventListener('click', showPrev);

   // Optional: close modal on ESC or click outside image
   modal.addEventListener('click', (e) => {
      if (e.target === modal) hideModal();
   });
   document.addEventListener('keydown', (e) => {
      if (modal.classList.contains('hidden')) return;
      if (e.key === 'Escape') hideModal();
      if (e.key === 'ArrowRight') showNext();
      if (e.key === 'ArrowLeft') showPrev();
   });
   </script>
</body>
</html>