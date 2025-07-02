<?php
include_once 'includes/project-data.php';

$projects = getAllProjects();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Portfolio - Craft Core Creatives</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css?v=9">
    <!-- SEO Meta Tags -->
    <meta name="description" content="Explore the Craft Core Creatives portfolio: 3D design, product visualization, branding, and creative projects for games, architecture, and brands.">
    <meta name="keywords" content="Portfolio, Craft Core Creatives, 3D Design, Product Visualization, Branding, Creative Agency, Game Assets, Architecture">
    <meta name="author" content="Craft Core Creatives">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="Portfolio - Craft Core Creatives">
    <meta property="og:description" content="Explore the Craft Core Creatives portfolio: 3D design, product visualization, branding, and creative projects for games, architecture, and brands.">
    <meta property="og:image" content="https://craftcorecreatives.com/images/og-image.jpg">
    <meta property="og:url" content="https://craftcorecreatives.com/portfolio.php">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Portfolio - Craft Core Creatives">
    <meta name="twitter:description" content="Explore the Craft Core Creatives portfolio: 3D design, product visualization, branding, and creative projects for games, architecture, and brands.">
    <meta name="twitter:image" content="https://craftcorecreatives.com/images/og-image.jpg">

    <link rel="canonical" href="https://craftcorecreatives.com/portfolio.php">


    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>
<body>
   <?php include 'header.php'; ?>
   <!--  -->
   <section class="w-full relative">
      <!-- Decorative background circles -->
      <div class="absolute w-[50vw] md:w-[40vw] top-0 right-0 h-72 md:h-96 rounded-full bg-blue-600 opacity-50 blur-[80px] md:blur-[100px]"></div>
      <div class="absolute w-[40vw] md:w-[20vw] left-0 bottom-0 h-32 md:h-44 rounded-full bg-blue-600 opacity-50 blur-[80px] md:blur-[100px]"></div>

      <div class="max-w-5xl w-full mx-auto h-screen my-14 px-4 z-30">
         <h2 class="text-5xl md:text-6xl font-normal uppercase mb-8 slideup-text">Graphic - <span class="text-blue-600">Portfolio</span></h2>
         <div class="w-full flex items-start gap-x-2 justify-start overflow-x-auto scrollbar-hide overflow-y-hidden mt-20">
            
            <?php foreach($projects as $project): ?>
            <a href="<?= htmlspecialchars($project['link']) ?>" class="block">
               <div class="card shrink-0 group w-96 p-4 hover:scale-[1.02] duration-300 transition-all relative cursor-pointer">
                  <div class="w-full h-20 rollbox py-4 px-8 uppercase rounded-full border border-neutral-600 transition-colors duration-300 
                     group-hover:border-blue-500 group-focus-within:border-blue-500 js-card-btn flex items-center justify-center text-center">
                     <?= htmlspecialchars($project['title']) ?>
                  </div>
                  <div class="w-full mt-8">
                     <div class="w-full h-96 aspect-[9/16] rounded-t-xl overflow-hidden relative">
                        <img
                           src="<?= htmlspecialchars($project['image-portfolio']) ?>"
                           alt="<?= htmlspecialchars($project['title']) ?>"
                           class="w-full h-full object-cover"
                           loading="lazy"
                        />
                     </div>
                     <div class="card-overlay w-full flex flex-row items-center justify-between rounded-b-xl bg-gradient-to-r from-blue-950 to-neutral-900 p-4
                     opacity-0 translate-y-4
                     group-hover:opacity-100 group-hover:translate-y-0
                     transition-all duration-300 z-10">
                        <p class="w-[70%] text-xs">
                           <?= htmlspecialchars(substr($project['desc'], 0, 140)) ?>...
                        </p>
                        <div class="hover:scale-[0.95] duration-300 transition-all p-4 font-bold text-4xl">
                           <span>></span>
                        </div>
                     </div>
                  </div>
               </div>
            </a>
            <?php endforeach; ?>
         </div> 
         <p class="md:hidden my-4 py-6">scroll to left ></p> 
      </div>


   </section>


   <script>
      document.querySelectorAll('.card').forEach(card => {
      card.addEventListener('touchstart', function(e) {
        if (!e.target.closest('.card-overlay') && !e.target.closest('a')) {
          document.querySelectorAll('.card-overlay').forEach(overlay => {
            overlay.classList.remove('!opacity-100', '!translate-y-0');
          });
          const overlay = card.querySelector('.card-overlay');
          if (overlay) {
            overlay.classList.add('!opacity-100', '!translate-y-0');
          }
          const btn = card.querySelector('.js-card-btn');
          if (btn) {
            btn.classList.add('border-blue-600');
          }
          document.querySelectorAll('.js-card-btn').forEach(otherBtn => {
            if (otherBtn !== btn) otherBtn.classList.remove('border-blue-500');
          });
        }
      });
      document.addEventListener('touchstart', function(e) {
          if (!card.contains(e.target)) {
            const overlay = card.querySelector('.card-overlay');
            if (overlay) {
              overlay.classList.remove('!opacity-100', '!translate-y-0');
            }
            const btn = card.querySelector('.js-card-btn');
            if (btn) {
              btn.classList.remove('border-blue-500');
            }
          }
        });
      });
   </script>
   <!--  -->
   <?php include 'footer.php'; ?>
   <script src="js/script.js"></script>
   <script src="js/animations.js"></script>
</body>
</html>