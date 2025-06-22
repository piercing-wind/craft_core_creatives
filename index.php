<?php
// Project data for dynamic generation
$projects = [
    [
        'title' => 'Architecture <br> designing',
        'image' => 'images/car.jpg',
        'description' => 'Bringing spaces to life before they&apos;re built. Our architectural 3D visuals help bring spaces to life — before a single brick is laid. From sleek interiors to full-scale buildings, we create high-resolution renders that resonate with clients and stakeholders alike.'
    ],
    [
        'title' => 'Product <br> Visualisation',
        'image' => 'images/car.jpg',
        'description' => 'Your product, beautifully imagined. We turn your physical products into stunning 3D visuals that look ready for launch. Whether it&apos;s for branding, e-commerce, or advertising, our renders are precise, realistic, and built to convert.'
    ],
    [
        'title' => 'Gaming',
        'image' => 'images/car.jpg',
        'description' => 'Built for worlds beyond reality. We create optimized, game-ready 3D models tailored to your creative vision — whether it’s a stylized racing car or a fully rigged character for a cinematic sequence.'
    ] 
];

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
      <img src="images/oval.svg" alt="Background Oval" class="absolute -top-32 left-0 w-full h-[50vh] md:h-full scale-[2] opacity-70 md:scale-[1.3] z-20" />
      
      <div class="relative -mt-14 w-full h-full flex items-center justify-center z-30">
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
    <div class="max-w-6xl mx-auto px-4">
      <h2 class="text-5xl md:text-6xl font-normal uppercase mb-8 slideup-text">Our <span class="text-blue-600">Services</span></h2>
      
      <div class="w-full relative flex flex-col lg:flex-row items-center justify-between gap-4 rounded-3xl border border-white lg:min-h-[60vh] bg-neutral-800">
        <div class="flex-1 -mt-8 pt-8 md:pt-0 p-4 lg:p-16 h-full z-10 flex flex-col justify-center relative overflow-visible">
          <h2 class="number text-[35vh] block -ml-[2%] stat-card">01</h2>
          <h3 class="text-4xl md:text-5xl mb-4 uppercase text-shadow -mt-12 slideup-text">Product <br>Vision Image</h3>
          <p class="text-base lg:w-[40vw] slideup-text">Bring your product ideas to life with high-quality visual mockups that showcase your vision clearly and professionally. Bring your product ideas to life with high-quality visual mockups that showcase your vision</p>
        </div>  
        <div class="flex-1 w-full h-full lg:min-h-[30rem] lg:min-w-[30rem] pb-0 lg:p-16">
          <img src="images/chracters.png" alt="Product Vision Image" class="lg:absolute bottom-0 right-0 w-full max-w-[24rem] lg:max-w-[44rem] max-h-[24rem] lg:max-h-[44rem] w-auto h-auto flipup-img" />
        </div>
        <a href="contact.php" class="absolute hover:scale-[0.95] duration-300 transition-all bg-black/40 bottom-5 right-5 h-14 w-14 flex items-center justify-center p-4 font-bold text-4xl rounded-full">
          <span>></span>
        </a>
      </div>
    </div>
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
      <p class="text-base lg:w-[50vw] mx-auto text-center mt-8 slideup-text">Bring your product ideas to life with high-quality visual mockups that showcase your vision clearly and professionally. Bring your product ideas to life with high-quality visual mockups that showcase your vision</p>

      <div class="mt-20 w-full">
        <?php foreach($projects as $index => $project): ?>
          <div class="project-card w-full flex flex-col md:flex-row items-center justify-between gap-4 border-t <?= $index === count($projects) - 1 ? 'border-b' : '' ?> border-white relative md:h-64 overflow-hidden group">
            <div class="relative flex flex-col md:flex-row flex-1 md:w-[70%] h-44 md:h-full p-4 items-center">
              <img src="<?= $project['image'] ?>" alt="<?= strip_tags($project['title']) ?>" class="fade-right md:absolute left-0 top-0 w-full h-full object-cover project-img" style="opacity:0;" />
              <h3 class="text-4xl text-center -mt-8 uppercase text-shadow z-10 project-heading" style="transform:translateX(-30%);">
                <?= $project['title'] ?>
              </h3>
            </div>
            <div class="w-full md:w-[30%] p-4 flex items-center">
              <p class="text-xs md:text-sm text-center md:text-left">
                <?= $project['description'] ?>
              </p>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <?php include 'footer.php'; ?>
  <script src="js/script.js"></script>
  <script src="js/animations.js"></script>
</body>
</html>