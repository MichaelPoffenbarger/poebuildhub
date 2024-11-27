<?php
header('Content-Type: application/json');

// In a real-world scenario, this data would come from a database or external API
$classData = [
    'warrior' => [
        'name' => 'Warrior',
        'description' => 'The Warrior pounds the ground with big, chunky attacks and can shrug off the hits of smaller enemies with large amounts of armour.',
        'icon' => 'warrior.webp',
        'ascendancies' => [
            'Titan' => [
                'description' => 'The Titan focuses on stuns, slams, and beefy defence. Call upon your ancestors to boost your slams. Push your enemies to the ground. Shrug off any attack.',
                'icon' => 'titan.webp',
                'builds' => ['Cyclone Berserker', 'Blitz Charge Berserker']
            ],
            'Warbringer' => [
                'description' => 'This fearsome frontline fighter conjures ancestral spirits to pummel his foes and has a voice so powerful his Warcries can detonate his fallen enemies.',
                'icon' => 'warbringer.webp',
                'builds' => ['Earthquake Juggernaut', 'Molten Strike Juggernaut']
            ]
        ]
    ],
    'sorceress' => [
        'name' => 'Sorceress',
        'description' => 'The Sorceress bends the elements to her will, using them to unleash devastation on her foes. This classic spellcaster weaves a flurry of elemental magic from afar.',
        'icon' => 'sorceress.webp',
        'ascendancies' => [
            'Stormweaver' => [
                'description' => 'Become a master of the elements who can cast faster, hit harder, and chill and shock enemies en masse. The Stormweaver can even conjure devastating Elemental Storms.',
                'icon' => 'stormweaver.webp',
                'builds' => ['Arc Elementalist', 'Golem Elementalist']
            ],
            'Chronomancer' => [
                'description' => 'The Chronomancer wields powerful temporal magic that can reset cooldowns, slow enemies in her presence, and even freeze time itself.',
                'icon' => 'chronomancer.webp',
                'builds' => ['Vortex Occultist', 'Bane Occultist']
            ]
        ]
    ],
    // Add more classes here...
    'ranger' => [
        'name' => 'Ranger',
        'description' => 'The Ranger is quick, but deadly, peppering her enemies with arrows and then vaulting away before they have a chance to reach her.',
        'icon' => 'ranger.webp',
        'ascendancies' => [
            'Deadeye' => [
                'description' => 'This expert marksman can take down foes with style. She moves as fast as the wind, and can nock additional arrows with every draw.',
                'icon' => 'deadeye.webp',
                'builds' => []
            ],
            'Pathfinder' => [
                'description' => 'Pathfinder is a master of flasks and poison. She can turn mana potions into chemical weapons, and stack poisons to her heart’s content.',
                'icon' => 'pathfinder.webp',
                'builds' => []
            ]
        ]
    ],
    'monk' => [
        'name' => 'Monk',
        'description' => 'The Monk is a fast and furious melee fighter. He dashes in and out of combat, and has mechanics that involve building up and keeping momentum.',
        'icon' => 'monk.webp',
        'ascendancies' => [
            'Invoker' => [
                'description' => 'The Invoker wields the elements with ease and can use that power to become an Elemental Avatar. The Invoker is also a master of the Spirit allowing him to use many abilities without lifting a finger.',
                'icon' => 'invoker.webp',
                'builds' => []
            ],
            'Acolyte of Chayula' => [
                'description' => 'The Acolyte of Chayula exchanges mastery of Spirit for Darkness, a resource that can be utilized to both absorb and deal damage. Summoning power from the Breach, he trades elemental affinity for Chaos.',
                'icon' => 'acolyteofchayula.webp',
                'builds' => []
            ]
        ]
    ],
    'mercenary' => [
        'name' => 'Mercenary',
        'description' => 'The Mercenary wields a crossbow that can be loaded with different ammo types, offering versatility, power, and mobility. He also has options to combo abilities together to devastating effect.',
        'icon' => 'mercenary.webp',
        'ascendancies' => [
            'Witchhunter' => [
                'description' => 'The Witchhunter specialises in taking down the most deadly of foes. With extra defences against magic, and the ability to break the concentration of his enemies, he is perfectly suited for slaughtering spellcasters.',
                'icon' => 'witchhunter.webp',
                'builds' => []
            ],
            'Gemling Legionnaire' => [
                'description' => 'Enhance your abilities by embedding Gems directly into your flesh. The Gemling Legionnaire can use more skills than any other class, and the more he uses, the more powerful he becomes.',
                'icon' => 'gemlinglegionnaire.webp',
                'builds' => []
            ]
        ]
    ],
    'witch' => [
        'name' => 'Witch',
        'description' => 'Death and decay are the Witchs weapons of choice. She can call forth hordes of undead minions to fight for her while casting powerful chaos spells.',
        'icon' => 'witch.webp',
        'ascendancies' => [
            'Blood Mage' => [
                'description' => 'Become a master of life energy. The Blood Mage uses her own life as a resource to bring destruction to her enemies.',
                'icon' => 'bloodmage.webp',
                'builds' => []
            ],
            'Infernalist' => [
                'description' => 'Infernalist transcends the need for mana, instead building heat as she casts spells. With an Infernal hound at her side she can even turn into a demon herself.',
                'icon' => 'infernalist.webp',
                'builds' => []
            ]
        ]   
    ]
];

echo json_encode($classData);