<?php
 include_once 'includes/team-data.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us - Craft Core Creatives</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css?v=8">
    <meta name="description" content="Learn about Craft Core Creatives: our team, our story, and our passion for 3D design, product visualization, and creative storytelling. Meet the artists and visionaries behind our work.">
   <meta name="keywords" content="About, Team, Craft Core Creatives, 3D Artists, Designers, Creative Agency, Product Visualization, Storytelling">
   <meta name="author" content="Craft Core Creatives">
   <meta name="robots" content="index, follow">

   <!-- Open Graph / Facebook -->
   <meta property="og:title" content="About Us - Craft Core Creatives">
   <meta property="og:description" content="Meet the team behind Craft Core Creatives. Discover our story, our values, and our expertise in 3D design, visualization, and creative solutions.">
   <meta property="og:image" content="https://craftcorecreatives.com/images/og-image.jpg">
   <meta property="og:url" content="https://craftcorecreatives.com/about.php">
   <meta property="og:type" content="website">

   <!-- Twitter Card -->
   <meta name="twitter:card" content="summary_large_image">
   <meta name="twitter:title" content="About Us - Craft Core Creatives">
   <meta name="twitter:description" content="Meet the team behind Craft Core Creatives. Discover our story, our values, and our expertise in 3D design, visualization, and creative solutions.">
   <meta name="twitter:image" content="https://craftcorecreatives.com/images/og-image.jpg">

   <link rel="canonical" href="https://craftcorecreatives.com/about.php">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>
<body class="relative relative">
   <?php include 'header.php'; ?>
   
   <!-- Hero Section -->
   <section class="w-full min-h-[70vh] flex items-center justify-center relative">
      <!-- Background circles -->
      <div class="absolute w-[50vw] md:w-[40vw] z-10 top-0 right-0 h-72 md:h-96 rounded-full bg-blue-600 opacity-50 blur-[80px] md:blur-[100px]"></div>
      <div class="absolute w-[40vw] md:w-[20vw] z-10 left-0 bottom-0 h-32 md:h-44 rounded-full bg-blue-600 opacity-50 blur-[80px] md:blur-[100px]"></div>

      <div class="max-w-6xl mx-auto px-4 w-full mt-20 relative z-10">
         <div class="text-center mb-16 fade-in">
            <h1 class="slideup-text text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">
               About <span class="text-blue-600">Us</span>
            </h1>
            <p class="text-xl md:text-2xl text-gray-300 max-w-4xl mx-auto slideup-text">
               Craft Core Creatives – <span class="text-blue-600 font-semibold">Designing Imagination, Rendering Reality</span>
            </p>
         </div>
      </div>
   </section>

   <!-- Introduction Section -->
   <section class="w-full py-8">
      <div class="max-w-6xl mx-auto px-4">
         <div class="text-center mb-16 slideup-text">
            <p class="text-lg md:text-xl text-gray-300 max-w-4xl mx-auto">
               Welcome to Craft Core Creatives, a digital playground where ideas evolve into immersive visuals. 
               We're a freelance-led creative studio passionate about building powerful visual content that speaks louder than words.
            </p>
         </div>
      </div>
   </section>

   <!-- Who We Are Section -->
   <section class="w-full py-20 relative">
      <!-- Background circles -->
      <div class="absolute w-[50vw] md:w-[40vw] left-0 bottom-0 h-72 md:h-96 rounded-full bg-blue-600 opacity-50 blur-[80px] md:blur-[100px]"></div>
      <div class="absolute w-[40vw] md:w-[20vw] top-0 right-0 h-32 md:h-44 rounded-full bg-blue-600 opacity-50 blur-[80px] md:blur-[100px]"></div>

      <div class="max-w-6xl mx-auto px-4 z-10">
         <div class="grid md:grid-cols-2 gap-16 items-center">
            <div class="slide-left">
               <h2 class="text-4xl md:text-5xl text-white mb-8">
                  Who We <span class="text-blue-600">Are</span>
               </h2>
               <div class="space-y-6 text-gray-300 text-lg">
                  <p>
                     We're a small but mighty team of 3D artists, designers, and storytellers who live and breathe digital craft. 
                     From product visualization and architectural rendering to gaming assets and 3D animation, we turn abstract concepts into pixel-perfect realities.
                  </p>
                  <p>
                     Every project is a collaboration, every render a reflection of purpose and personality. Whether you're launching a new product, 
                     designing a space, or developing a game, we're here to help you visualize, inspire, and connect.
                  </p>
               </div>
            </div>
            <div class="slide-right">
               <div class="bg-gradient-to-br from-blue-600/20 to-blue-600/20 rounded-2xl p-8 backdrop-blur-sm border border-blue-500/20">
                  <div class="grid grid-cols-2 gap-6 text-center">
                     <div class="p-4">
                        <div class="text-3xl font-bold text-blue-600">3D</div>
                        <div class="text-gray-300">Artists</div>
                     </div>
                     <div class="p-4">
                        <div class="text-3xl font-bold text-blue-600">Visual</div>
                        <div class="text-gray-300">Designers</div>
                     </div>
                     <div class="p-4">
                        <div class="text-3xl font-bold text-blue-600">Digital</div>
                        <div class="text-gray-300">Storytellers</div>
                     </div>
                     <div class="p-4">
                        <div class="text-3xl font-bold text-blue-600">Creative</div>
                        <div class="text-gray-300">Minds</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <!-- Our Team Section -->
<section class="w-full py-20 bg-gradient-to-br from-blue-600/5 to-blue-600/10">
   <div class="max-w-6xl mx-auto px-4">
      <div class="text-center mb-16 slideup-text">
         <h2 class="text-4xl md:text-5xl font-bold text-white mb-8">
            Meet Our <span class="text-blue-600">Team</span>
         </h2>
         <p class="text-lg text-gray-300 max-w-2xl mx-auto">
            A blend of creative minds, technical experts, and passionate storytellers.
         </p>
      </div>
      <?php $founder = getFounder(); ?>
      <?php if ($founder): ?>
      <div class="flex flex-col md:flex-row items-center bg-gradient-to-br from-blue-600/10 to-blue-600/20 rounded-2xl overflow-clip text-center shadow-lg mb-12">
         <img src="<?= htmlspecialchars($founder['image']) ?>" 
            alt="<?= htmlspecialchars($founder['name']) ?> - <?= htmlspecialchars($founder['role']) ?>" 
            style="filter: grayscale(100%);"
            class="w-full md:w-80 h-80 object-cover border-b-2 md:border-b-0 md:border-r-2 border-blue-600/30"
         >
         <div class="p-8 flex-1 text-left">
            <h3 class="text-2xl font-bold text-white mb-2"><?= htmlspecialchars($founder['name']) ?></h3>
            <p class="text-blue-400 mb-2 text-lg"><?= htmlspecialchars($founder['role']) ?></p>
            <p class="text-gray-300 text-base mb-2"><?= htmlspecialchars($founder['bio']) ?></p>
            <?php if (!empty($founder['quote'])): ?>
            <p class="text-gray-400 text-sm"><?= htmlspecialchars($founder['quote']) ?></p>
            <?php endif; ?>
         </div>
      </div>
      <?php endif; ?>
      <div class="grid md:grid-cols-3 sm:grid-cols-2 gap-10">
         <?php foreach(getOtherTeamMembers() as $member): ?>
         <div class="bg-gradient-to-br overflow-clip from-blue-600/10 to-blue-600/20 rounded-2xl text-center shadow-lg">
            <img src="<?= htmlspecialchars($member['image']) ?>" 
               alt="<?= htmlspecialchars($member['name']) ?>"
               style="filter: grayscale(100%);"
               class="w-full h-80 mb-4 object-cover border-b-2 border-blue-600/30"
            />
            <div class="p-4">
               <h3 class="text-xl font-semibold text-white mb-1"><?= htmlspecialchars($member['name']) ?></h3>
               <p class="text-blue-400 mb-2"><?= htmlspecialchars($member['role']) ?></p>
               <p class="text-gray-300 text-sm"><?= htmlspecialchars($member['bio']) ?></p>
            </div>
         </div>
         <?php endforeach; ?>
      </div>
   </div>
</section>

   <!-- What We Believe Section -->
   <section class="w-full py-20 bg-gradient-to-br from-blue-600/5 to-blue-600/5">
      <div class="max-w-6xl mx-auto px-4">
         <div class="text-center mb-16 slideup-text">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-8">
               What We <span class="text-blue-600">Believe</span>
            </h2>
         </div>
         
         <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-gradient-to-br from-blue-600/10 to-blue-600/10 rounded-2xl p-8 backdrop-blur-sm border border-blue-500/20 hover:border-blue-400/40 transition-all duration-300 card-hover popup-anim">
               <div class="text-blue-600 text-2xl font-bold mb-4">Craft over shortcuts</div>
               <p class="text-gray-300">
                  We're obsessed with detail, composition, and quality. Every pixel matters.
               </p>
            </div>
            
            <div class="bg-gradient-to-br from-blue-600/10 to-blue-600/10 rounded-2xl p-8 backdrop-blur-sm border border-blue-500/20 hover:border-blue-400/40 transition-all duration-300 card-hover popup-anim">
               <div class="text-blue-600 text-2xl font-bold mb-4">Core creativity</div>
               <p class="text-gray-300">
                  Every project begins at the core: your story, your idea, your goal.
               </p>
            </div>
            
            <div class="bg-gradient-to-br from-blue-600/10 to-blue-600/10 rounded-2xl p-8 backdrop-blur-sm border border-blue-500/20 hover:border-blue-400/40 transition-all duration-300 card-hover popup-anim">
               <div class="text-blue-600 text-2xl font-bold mb-4">Visuals with soul</div>
               <p class="text-gray-300">
                  Good visuals look nice. Great visuals move people. We aim for the latter.
               </p>
            </div>
         </div>
      </div>
   </section>

   <!-- Why Work With Us Section -->
   <section class="w-full py-20">
      <div class="max-w-6xl mx-auto px-4">
         <div class="text-center mb-16 slideup-text">
            <h2 class="text-4xl md:text-5xl font-bold text-white mb-8">
               Why Work <span class="text-blue-600">With Us?</span>
            </h2>
         </div>
         
         <div class="bg-gradient-to-br from-blue-600/20 to-blue-600/20 rounded-2xl p-12 backdrop-blur-sm border border-blue-500/20 text-center">
            <div class="space-y-6 text-gray-300 text-lg max-w-4xl mx-auto">
               <p>
                  Because you care about quality. Because you're tired of cookie-cutter solutions. 
                  And because you want a creative partner who's as invested in your vision as you are.
               </p>
               <p class="text-xl font-semibold text-white">
                  We don't just deliver files — we deliver feeling, form, and function.
               </p>
               <p class="text-2xl font-bold text-blue-500">
                  Let's build something unforgettable.
               </p>
            </div>
         </div>
      </div>
   </section>

   <!-- CTA Section -->
   <section class="w-full py-20 bg-black/50">
      <div class="max-w-4xl mx-auto px-4 text-center">
         <div class="space-y-8 slideup-text">
            <h3 class="text-4xl">
               Ready to bring your vision to life?
            </h3>
            <p class="text-xl text-gray-300">
               📩 Reach out and let's start creating together
            </p>
            <a href="contact.php" class="inline-block bg-blue-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:from-blue-700 hover:to-blue-700 transition-all duration-300 transform hover:scale-105">
               Get In Touch
            </a>
         </div>
      </div>
   </section>
   
   <?php include 'footer.php'; ?>
   
   <script src="js/script.js"></script>
   <script src="js/animations.js"></script>
</body>
</html>