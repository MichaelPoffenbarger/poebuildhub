<?php
header('Content-Type: application/json');

// Simulated build data
$builds = [
    'warrior' => [
        'cyclone_berserker' => [
            'name' => 'Cyclone Berserker',
            'overview' => 'A high-damage melee build that uses the Cyclone skill to clear enemies quickly.',
            'leveling_guide' => 'Start with Ground Slam, transition to Cyclone at level 28. Focus on physical damage and attack speed nodes.',
            'skill_gems' => [
                'Cyclone',
                'Melee Physical Damage Support',
                'Fortify Support',
                'Infused Channelling Support',
                'Impale Support'
            ],
            'gear' => [
                'Weapon: Two-handed Axe with high physical DPS',
                'Helmet: Rare with life and resistances',
                'Body Armour: Belly of the Beast for extra life',
                'Gloves: Rare with attack speed and life',
                'Boots: Rare with movement speed and resistances',
                'Amulet: Rare with physical damage and life',
                'Rings: Rare with life and resistances'
            ],
            'passives' => 'Path towards Resolute Technique, Amplify, Bladedancer, and Cleaving. Pick up life nodes along the way.'
        ],
        // Add other warrior builds here
    ],
    'sorceress' => [
        'arc_witch' => [
            'name' => 'Arc Witch',
            'overview' => 'A lightning-based caster that uses Arc to clear screens of enemies efficiently.',
            'leveling_guide' => 'Use Freezing Pulse until you get Arc at level 12. Focus on spell damage and lightning damage nodes.',
            'skill_gems' => [
                'Arc',
                'Controlled Destruction Support',
                'Lightning Penetration Support',
                'Elemental Focus Support',
                'Increased Critical Strikes Support'
            ],
            'gear' => [
                'Weapon: Wand or Sceptre with spell damage and cast speed',
                'Shield: Rare with spell damage and life',
                'Helmet: Rare with life and resistances',
                'Body Armour: Tabula Rasa for early game, then rare with life and resistances',
                'Gloves: Rare with cast speed and life',
                'Boots: Rare with movement speed and resistances',
                'Amulet: Rare with lightning damage and cast speed',
                'Rings: Rare with life and resistances'
            ],
            'passives' => 'Path towards elemental damage nodes, lightning damage nodes, and critical strike nodes. Don\'t forget to pick up life nodes.'
        ],
        // Add other sorceress builds here
    ]
    // Add other classes here
];

// Get the class and build from the query string
$class = isset($_GET['class']) ? $_GET['class'] : '';
$build = isset($_GET['build']) ? $_GET['build'] : '';

// Return the build data for the requested class and build
if (isset($builds[$class]) && isset($builds[$class][$build])) {
    echo json_encode($builds[$class][$build]);
} else {
    http_response_code(404);
    echo json_encode(['error' => 'Build not found']);
}
?>