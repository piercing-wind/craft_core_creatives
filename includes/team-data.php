<?php
$team = [
    [
        'name' => 'Prabhnoor Singh',
        'role' => 'Founder & Creative Director',
        'bio'  => 'Visionary founder of Craft Core Creatives, Prabhnoor leads the team with a passion for 3D art, design, and storytelling. With a keen eye for detail and a drive for innovation, he ensures every project is crafted to perfection.',
        'quote' => '"Designing Imagination, Rendering Reality"',
        'image' => 'images/team/prabhnoor.jpg',
        'highlight' => true
    ],
    [
        'name' => 'Nikhil',
        'role' => 'Game Asset Artist',
        'bio'  => 'Expert in digital storytelling and branding through stunning visuals.',
        'image' => 'images/team/nikhil.jpg',
        'highlight' => false
    ],
    [
        'name' => 'Gurman Bhambra',
        'role' => 'Junior 3D Artist',
        'bio'  => 'Bringing Fresh Perspective to Every Render Gurman supports the 3D pipeline with modeling, texturing, and lighting assistance — refining assets and ensuring each visual element meets the Craft Core standard. A rising talent dedicated to learning and delivering with passions.',
        'image' => 'images/team/gurman.jpg',
        'highlight' => false
    ],
    [
        'name' => 'Akshit Dhingra',
        'role' => '2D Designer & Illustrator',
        'bio'  => 'The Hand Behind the Highlights From sketch to screen, Akshit adds the human touch to every project. Whether it’s UI design, storyboarding, or custom illustrations — they bring depth, charm, and clarity to the digital canvas.',
        'image' => 'images/team/craft_core_team1.jpg',
        'highlight' => false
    ],
    [
        'name' => 'Ritik Loomba',
        'role' => 'Product Designer',
        'bio'  => 'Makes unbuilt products look like luxury launches. From sleek packaging to soft shadows, they bring visual polish and commercial appeal to every shot.',
        'image' => 'images/team/craft_core_team2.jpg',
        'highlight' => false
    ]
];

// Helper: Get all team members
function getAllTeamMembers() {
    global $team;
    return $team;
}

// Helper: Get highlighted (founder) member
function getFounder() {
    global $team;
    foreach ($team as $member) {
        if (!empty($member['highlight'])) {
            return $member;
        }
    }
    return null;
}

// Helper: Get other team members
function getOtherTeamMembers() {
    global $team;
    return array_filter($team, function($member) {
        return empty($member['highlight']);
    });

}
?>