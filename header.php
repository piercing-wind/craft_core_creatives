<?php
$current = basename($_SERVER['PHP_SELF']);
?>
<div class="w-full backdrop-blur-lg sticky top-0 z-50 px-4 py-4">
  <nav class="relative mx-auto max-w-5xl z-50 p-2 w-full flex items-center justify-between">
   <a href="index.php">
      <img
        src="images/logo.png"
        alt="Craftcore Logo"
        class="h-8 w-auto sm:h-12 transition-all"
      />
   </a>
    <!-- Desktop Nav -->
    <div class="hidden md:flex space-x-12 text-base md:text-lg font-medium uppercase">
      <a href="index.php" class="nav-link hover:text-blue-400 <?php if($current == 'index.php') echo 'active'; ?>">Home</a>
      <a href="about.php" class="nav-link hover:text-blue-400 <?php if($current == 'about.php') echo 'active'; ?>">About</a>
      <a href="portfolio.php" class="nav-link hover:text-blue-400 <?php if($current == 'portfolio.php') echo 'active'; ?>">Portfolio</a>
    </div>
    <a href="contact.php" class="contact-btn">
      Contact Us
    </a>
    <!-- Mobile Hamburger -->
    <div class="md:hidden flex items-center">
      <button id="mobile-menu-btn" class="focus:outline-none">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
      </button>
    </div>
    <!-- Mobile Menu (hidden by default) -->
    <div id="mobile-menu" class="fixed inset-0 bg-neutral-900 h-screen bg-opacity-95 flex flex-col items-center space-y-4 py-12 text-lg font-medium uppercase text-white hidden">
      <button id="close-mobile-menu" class="absolute top-4 right-4 text-white text-3xl">&times;</button>
       <a href="index.php" class="nav-link hover:text-blue-400 <?php if($current == 'index.php') echo 'active'; ?>">Home</a>
       <a href="about.php" class="nav-link hover:text-blue-400 <?php if($current == 'about.php') echo 'active'; ?>">About</a>
       <a href="portfolio.php" class="nav-link hover:text-blue-400 <?php if($current == 'portfolio.php') echo 'active'; ?>">Portfolio</a>
       <a href="contact.php" class="nav-link hover:text-blue-400 <?php if($current == 'contact.php') echo 'active'; ?>">Contact Us</a>
    </div>
  </nav>
</div>