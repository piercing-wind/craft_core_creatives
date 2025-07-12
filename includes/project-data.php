<?php
// filepath: c:\xampp\htdocs\craft_core_creatives\includes\project-data.php

function getImagesFromFolder($folderPath) {
    $images = [];
    $extensions = ['jpg', 'jpeg', 'png', 'webp'];

    if (is_dir($folderPath)) {
        $files = scandir($folderPath);
        // Filter only image files
        $files = array_filter($files, function($file) use ($extensions) {
            $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            return in_array($extension, $extensions);
        });
        // Natural sort (so 2.jpg comes before 10.jpg)
        natsort($files);

        foreach ($files as $file) {
            $images[] = $folderPath . '/' . $file;
        }
    }

    return array_values($images);
}

$projects = [
  [
    'title' => 'Architectural Visualisation',
    'desc'  => 'Bringing spaces to life before they\'re built. Our architectural 3D visuals help bring spaces to life — before a single brick is laid. From sleek interiors to full-scale buildings, we create high-resolution renders that resonate with clients and stakeholders alike.',
    'link'  => 'projects-layout.php?category=architectural',
    'category' => 'architectural',
    'image-portfolio' => 'images/architectural-port.jpg',
    'image-home' => 'images/architectural-home.jpg',
    'services' => [
      'Interior & Exterior Renders',
      '3D Floor Plans',
      'Moodboards & Design Concepts',
      'Animated Walkthroughs',
      'Marketing-Ready Visuals'
    ],
    'works' => getImagesFromFolder('images/architectural'),
    'gallery_json' => 'gallery/architectural.json'
  ],
  [
    'title' => 'Product Visualisation',
    'desc' => 'Your product, beautifully imagined. We turn your physical products into stunning 3D visuals that look ready for launch. Whether it\'s for branding, e-commerce, or advertising, our renders are precise, realistic, and built to convert.',
    'link'  => 'projects-layout.php?category=product',
    'image-portfolio' => 'images/product-port.jpg',
    'image-home' => 'images/product-home.jpg',
    'category' => 'product',
    'services' => [
      'E-commerce Product Renders',
      'Packaging Design Visualization',
      'Marketing & Advertising Visuals',
      '360° Product Views',
      'Lifestyle & Context Renders'
    ],
    'works' => getImagesFromFolder('images/productVisual'),
    'gallery_json' => 'gallery/productVisual.json'
  ]
];
// Helper function to get all projects
function getAllProjects() {
    global $projects;
    return $projects;
}

// Helper function to get specific project by category and index
function getProjectByIndex($category, $index = 0) {
    $categoryProjects = getProjectsByCategory($category);
    return isset($categoryProjects[$index]) ? $categoryProjects[$index] : null;
}

// Helper function to get available categories
function getAvailableCategories() {
    global $projects;
    return array_unique(array_column($projects, 'category'));
}

// Helper function to count projects by category
function countProjectsByCategory($category) {
    return count(getProjectsByCategory($category));
}

// Helper function to get projects by category
function getProjectsByCategory($category) {
    global $projects;
    return array_filter($projects, function($project) use ($category) {
        return $project['category'] === $category;
    });
}
?>