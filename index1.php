<?php
include_once 'includes/project-data.php';

$projects = getAllProjects();

$stats = [
    ['number' => '02', 'title' => 'Years', 'subtitle' => 'Experience'],
    ['number' => '21', 'title' => 'Project', 'subtitle' => 'Completed'],
    ['number' => '04', 'title' => 'Industry', 'subtitle' => 'Served']
];

$hero_text = ['We are', 'Craftcore', 'Creatives', 'A Design', 'Agency'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home - Craft Core Creatives</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css?v=8">
    <!-- SEO Meta Tags -->
    <meta name="description" content="Craft Core Creatives is a design agency specializing in 3D modeling, product visualization, and creative solutions for games, architecture, and brands.">
    <meta name="keywords" content="3D Design, Game Assets, Product Visualization, Creative Agency, Craft Core Creatives, Architecture, Branding, Modeling">
    <meta name="author" content="Craft Core Creatives">
    <meta name="robots" content="index, follow">
    
    
    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="Craft Core Creatives - 3D Design & Creative Agency">
    <meta property="og:description" content="Explore our portfolio of 3D models, product renders, and creative projects for games, architecture, and brands.">
    <meta property="og:image" content="https://craftcorecreatives.com/images/og-image.jpg">
    <meta property="og:url" content="https://craftcorecreatives.com/">
    <meta property="og:type" content="website">
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Craft Core Creatives - 3D Design & Creative Agency">
    <meta name="twitter:description" content="Explore our portfolio of 3D models, product renders, and creative projects for games, architecture, and brands.">
    <meta name="twitter:image" content="https://craftcorecreatives.com/images/og-image.jpg">


    <link rel="canonical" href="https://craftcorecreatives.com/">




    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>
<body class="relative">

   <?php include 'header.php'; ?>

  <!-- Hero Section -->
  <section class="w-full relative">
    <!-- Background circles -->
    <div class="absolute w-[50vw] md:w-[40vw] z-10 top-0 right-0 h-72 md:h-96 rounded-full bg-blue-600 opacity-50 blur-[80px] md:blur-[100px]"></div>
    <div class="absolute w-[40vw] md:w-[20vw] z-10 left-0 bottom-0 h-32 md:h-44 rounded-full bg-blue-600 opacity-50 blur-[80px] md:blur-[100px]"></div>

    <div class="flex flex-col items-center max-w-5xl mx-auto justify-center h-[70vh] md:h-screen relative px-4">
      <img src="images/oval.svg" alt="Background Oval" class="absolute hidden sm:block -top-32 left-0 w-full h-[50vh] md:h-full scale-[2.2] opacity-70 md:scale-[1.3] z-20" />
      
      <div class="relative -mt-14 sm:mt-24 w-full h-full flex items-center justify-center z-30 hero-box">
        <div class="text-6xl md:text-8xl flex flex-col items-center justify-center uppercase text-center space-y-2 md:space-y-2">
          <?php foreach($hero_text as $text): ?>
            <span class="hero-text"><?= $text ?></span>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>

  <!-- Services Section -->
  <section class="w-full md:py-16 pb-8 md:mt-20">
   <a href="projects-layout.php?category=gaming">
    <div class="max-w-6xl mx-auto px-4">
      <h2 class="text-5xl md:text-6xl font-normal uppercase mb-8 slideup-text">Our <span class="text-blue-600">Services</span></h2>
      
      <div class="w-full relative flex flex-col lg:flex-row items-center justify-between gap-4 rounded-3xl border border-white lg:min-h-[60vh] bg-neutral-800">
        <div class="flex-1 -mt-8 pt-8 md:pt-0 p-4 lg:p-16 h-full z-10 flex flex-col justify-center relative overflow-visible">
          <h2 class="number text-[35vh] block -ml-[2%] stat-card">01</h2>
          <h3 class="text-4xl md:text-5xl mb-4 uppercase text-shadow -mt-12 slideup-text">3d Modelling <br> for Games </h3>
          <p class="text-base lg:w-[40vw] slideup-text">Building characters and worlds from imagination. From warriors and vehicles to props and weapons, we create detailed, engine-optimized 3D models with storytelling at the heart of every polygon.</p>
        </div>  
        <div class="flex-1 w-full h-full lg:min-h-[30rem] lg:min-w-[30rem] pb-0 lg:p-16">
          <img src="images/chracters.png" alt="Product Vision Image" class="lg:absolute bottom-0 right-0 w-full max-w-[24rem] lg:max-w-[44rem] max-h-[24rem] lg:max-h-[44rem] w-auto h-auto flipup-img" />
        </div>
        <span class="absolute hover:scale-[0.95] duration-300 transition-all bg-black/40 bottom-5 right-5 h-14 w-14 flex items-center justify-center p-4 font-bold text-4xl rounded-full">
          >
        </span>
      </div>
    </div>
    </a>
  </section>

  <!-- Stats Section -->
  <section class="w-full mb-24 pb-20">
    <div class="max-w-6xl w-full mx-auto px-4 grid grid-cols-1 md:grid-cols-3 md:gap-16">
      <?php foreach($stats as $stat): ?>
        <div class="p-4 stat-card flex flex-col justify-center h-full">
          <h2 class="number text-[12rem] text-center block"><?= $stat['number'] ?></h2>
          <h3 class="text-3xl text-center -mt-8 uppercase text-shadow"><?= $stat['title'] ?></h3>
          <h3 class="text-3xl text-blue-600 text-center -mt-1 mb-4 uppercase text-shadow"><?= $stat['subtitle'] ?></h3>
        </div>
      <?php endforeach; ?>
    </div>
  </section>

  <!-- Projects Section -->
  <section class="w-full mt-24 mb-24 relative">
    <!-- Background circles -->
    <div class="absolute w-[40vw] md:w-[20vw] top-0 right-0 h-32 md:h-44 rounded-full bg-blue-600 opacity-50 blur-[80px] md:blur-[100px]"></div>
    <div class="absolute w-[50vw] md:w-[40vw] left-0 bottom-[50%] top-[50%] h-72 md:h-[35rem] rounded-full bg-blue-600 opacity-50 blur-[80px] md:blur-[100px]"></div>

    <div class="max-w-6xl w-full mx-auto px-4 z-10">
      <h2 class="text-5xl md:text-7xl text-center -mt-8 uppercase slideup-text">Explore</h2>
      <h2 class="text-5xl md:text-7xl text-blue-600 text-center -mt-1 mb-4 uppercase slideup-text">Our - Project</h2>
      <p class="text-base lg:w-[50vw] mx-auto text-center mt-8 slideup-text">From sleek architecture to market-ready product renders and detailed 3D game assets — our work speaks louder than words. Browse a selection of projects we've crafted with precision, purpose, and creativity.</p>

      <div class="mt-20 w-full">
        <?php foreach($projects as $index => $project): ?>
         <?php 
         // Split the title into words
          $titleWords = explode(' ', $project['title']);
          $firstWord = $titleWords[0] ?? '';
          $secondWord = isset($titleWords[1]) ? $titleWords[1] : '';
         ?>
         <a href="<?= htmlspecialchars($project['link']) ?>">
            <div class="project-card w-full flex flex-col md:flex-row items-center justify-between gap-4 border-t <?= $index === count($projects) - 1 ? 'border-b' : '' ?> border-white relative md:h-64 overflow-hidden group">
              <div class="relative flex flex-col md:flex-row flex-1 md:w-[70%] h-44 md:h-full p-4 items-center">
                <img src="<?= $project['image-home'] ?>" alt="<?= strip_tags($project['title']) ?>" class="fade-right md:absolute left-0 top-0 w-full h-full object-cover project-img" style="opacity:0;" />
                <h3 class="text-4xl text-center uppercase text-shadow z-10 project-heading" style="transform:translateX(-30%);">
                    <?= htmlspecialchars($firstWord) ?> <br> <?= htmlspecialchars($secondWord) ?>
                </h3>
              </div>
              <div class="w-full md:w-[30%] p-4 flex items-center">
                <p class="text-xs md:text-sm text-center md:text-left">
                  <?= $project['desc'] ?>
                </p>
              </div>
            </div>
         </a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php include 'footer.php'; ?>
  <script src="js/script.js"></script>
  <script src="js/animations.js"></script>
</body>
</html>