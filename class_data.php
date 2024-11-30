<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');

// Error handling
try {
    $classData = [
        'warrior' => [
            'name' => 'Warrior',
            'description' => 'A fierce warrior who uses brute strength and raw power.',
            'icon' => 'warriorbanner1.png',
            'builds' => [
                'cyclone_berserker' => [
                    'name' => 'Cyclone Berserker',
                    'description' => 'The Cyclone Berserker is a build that focuses on using the Warrior\'s basic attacks to create a whirlwind of damage.',
                    'icon' => 'titan.webp',
                    'difficulty' => 'Medium',
                    'playstyle' => 'Melee',
                    'damage_type' => 'Physical',
                    'estHP' => 'HP: 1000',
                    'estMana' => 'Mana: 100',
                    'estDPS' => 'DPS: 1000',
                    'build_key' => 'cyclone_berserker'
                ],
                'warbringer' => [
                    'name' => 'Warbringer',
                    'description' => 'This fearsome frontline fighter conjures ancestral spirits to pummel his foes.',
                    'icon' => 'warbringer.webp',
                    'difficulty' => 'Hard',
                    'playstyle' => 'Melee/Caster',
                    'damage_type' => 'Physical/Ancestral',
                    'estHP' => 'HP: 1000',
                    'estMana' => 'Mana: 100',
                    'estDPS' => 'DPS: 1000',
                    'build_key' => 'warbringer'
                ],
                'thunderlord' => [
                    'name' => 'Thunderlord',
                    'description' => 'This fearsome frontline fighter conjures ancestral spirits to pummel his foes.',
                    'icon' => 'warrior.webp',
                    'difficulty' => 'Hard',
                    'playstyle' => 'Melee/Caster',
                    'damage_type' => 'Physical/Ancestral',
                    'estHP' => 'HP: 1000',
                    'estMana' => 'Mana: 100',
                    'estDPS' => 'DPS: 1000',
                    'build_key' => 'thunderlord'
                ],
                'earthquake' => [
                    'name' => 'Earthquake',
                    'description' => 'This fearsome frontline fighter conjures ancestral spirits to pummel his foes.',
                    'icon' => 'titan.webp',
                    'difficulty' => 'Hard',
                    'playstyle' => 'Melee/Caster',
                    'damage_type' => 'Physical/Ancestral',
                    'estHP' => 'HP: 1000',
                    'estMana' => 'Mana: 100',
                    'estDPS' => 'DPS: 1000',
                    'build_key' => 'earthquake'
                ]
            ]
        ],
        'sorceress' => [
            'name' => 'Sorceress',
            'description' => 'The Sorceress bends the elements to her will, using them to unleash devastation on her foes.',
            'icon' => 'sorcbanner1.png',
            'builds' => [
                'arc_witch' => [
                    'name' => 'Arc Witch',
                    'description' => 'A lightning-based caster that uses Arc to clear screens of enemies efficiently.',
                    'icon' => 'stormweaver.webp',
                    'difficulty' => 'Medium',
                    'playstyle' => 'Caster',
                    'damage_type' => 'Elemental',
                    'estHP' => 'HP: 1000',
                    'estMana' => 'Mana: 100',
                    'estDPS' => 'DPS: 1000',
                    'build_key' => 'stormweaver'
                ],
                'fire_witch' => [
                    'name' => 'Fire Witch',
                    'description' => 'Wields powerful temporal magic that can reset cooldowns and slow enemies.',
                    'icon' => 'chronomancer.webp',
                    'difficulty' => 'Hard',
                    'playstyle' => 'Caster',
                    'damage_type' => 'Temporal',
                    'estHP' => 'HP: 1000',
                    'estMana' => 'Mana: 100',
                    'estDPS' => 'DPS: 1000',
                    'build_key' => 'chronomancer'
                ]
            ]
        ],
        'ranger' => [
            'name' => 'Ranger',
            'description' => 'A master of the bow who uses precision and agility to outmaneuver her foes.',
            'icon' => 'rangerbanner1.png',
            'builds' => [
                'deadeye' => [
                    'name' => 'Deadeye',
                    'description' => 'A master of the bow who uses precision and agility to outmaneuver his foes.',
                    'icon' => 'deadeye.webp',
                    'difficulty' => 'Medium',
                    'playstyle' => 'Ranged',
                    'damage_type' => 'Physical',
                    'estHP' => 'HP: 1000',
                    'estMana' => 'Mana: 100',
                    'estDPS' => 'DPS: 1000'
                ],
                'shadow_assassin' => [
                    'name' => 'Shadow Assassin',
                    'description' => 'A master of the shadows who uses agility and stealth to outmaneuver his foes.',
                    'icon' => 'pathfinder.webp',
                    'difficulty' => 'Hard',
                    'playstyle' => 'Melee/Ranged',
                    'damage_type' => 'Physical/Shadow',
                    'estHP' => 'HP: 1000',
                    'estMana' => 'Mana: 100',
                    'estDPS' => 'DPS: 1000'
                ]
            ]
        ],
        'monk' => [
            'name' => 'Monk',
            'description' => 'A master of the fist who uses agility and precision to outmaneuver his foes.',
            'icon' => 'monkbanner1.png',
            'builds' => [
                'guardian' => [
                    'name' => 'Guardian',
                    'description' => 'A master of the fist who uses agility and precision to outmaneuver his foes.',
                    'icon' => 'invoker.webp',
                    'difficulty' => 'Medium',
                    'playstyle' => 'Melee',
                    'damage_type' => 'Physical',
                    'estHP' => 'HP: 1000',
                    'estMana' => 'Mana: 100',
                    'estDPS' => 'DPS: 1000'
                ],
                'berserker' => [
                    'name' => 'Berserker',
                    'description' => 'A master of the fist who uses agility and precision to outmaneuver his foes.',
                    'icon' => 'AcolyteofChayula.webp',
                    'difficulty' => 'Hard',
                    'playstyle' => 'Melee',
                    'damage_type' => 'Physical',
                    'estHP' => 'HP: 1000',
                    'estMana' => 'Mana: 100',
                    'estDPS' => 'DPS: 1000'
                ]
            ]
        ],
        'mercenary' => [
            'name' => 'Mercenary',
            'description' => 'A master of the blade who uses agility and precision to outmaneuver his foes.',
            'icon' => 'mercbanner1.png',
            'builds' => [
                'gunslinger' => [
                    'name' => 'Gunslinger',
                    'description' => 'A master of the blade who uses agility and precision to outmaneuver his foes.',
                    'icon' => 'witchhunter.webp',
                    'difficulty' => 'Medium',
                    'playstyle' => 'Ranged',
                    'damage_type' => 'Physical',
                    'estHP' => 'HP: 1000',
                    'estMana' => 'Mana: 100',
                    'estDPS' => 'DPS: 1000'
                ],
                'marauder' => [
                    'name' => 'Marauder',
                    'description' => 'A master of the blade who uses agility and precision to outmaneuver his foes.',
                    'icon' => 'gemlinglegionnaire.webp',
                    'difficulty' => 'Hard',
                    'playstyle' => 'Melee',
                    'damage_type' => 'Physical',
                    'estHP' => 'HP: 1000',
                    'estMana' => 'Mana: 100',
                    'estDPS' => 'DPS: 1000'
                ]
            ]
        ],
        'witch' => [
            'name' => 'Witch',
            'description' => 'A master of the arcane who uses her powers to control and dominate her foes.',
            'icon' => 'witchbanner1.png',
            'builds' => [
                'elementalist' => [
                    'name' => 'Elementalist',
                    'description' => 'A master of the arcane who uses her powers to control and dominate her foes.',
                    'icon' => 'infernalist.webp',
                    'difficulty' => 'Medium',
                    'playstyle' => 'Caster',
                    'damage_type' => 'Elemental',
                    'estHP' => 'HP: 1000',
                    'estMana' => 'Mana: 100',
                    'estDPS' => 'DPS: 1000'
                ],
                'necromancer' => [
                    'name' => 'Necromancer',
                    'description' => 'A master of the arcane who uses her powers to control and dominate her foes.',
                    'icon' => 'bloodmage.webp',
                    'difficulty' => 'Hard',
                    'playstyle' => 'Caster',
                    'damage_type' => 'Necromantic',
                    'estHP' => 'HP: 1000',
                    'estMana' => 'Mana: 100',
                    'estDPS' => 'DPS: 1000'
                ]
            ]
        ]
    ];


   

    // Convert to JSON with error checking
    $jsonOutput = json_encode($classData, JSON_PRETTY_PRINT);
    
    if ($jsonOutput === false) {
        throw new Exception('Failed to encode JSON data');
    }
    
    echo $jsonOutput;

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'error' => true,
        'message' => 'Error processing request: ' . $e->getMessage()
    ]);
}
?>