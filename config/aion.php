<?php

return [

    'website_name'  => 'Aion server',
    'aion_version'  => '4.9',
    'link_facebook' => '#',
    'link_twitter'  => '#',
    'link_youtube'  => '#',
    'languages'     => ['en', 'fr'],
    'contactMail'   => 'mathieu.letyrant@gmail.com',

    // When you are connect you can unlock your character
    'spawn' => [
        'elyos' => [
            'world_id' => '120010000',
            'x'        => '1275.5504',
            'y'        => '1169.5846',
            'z'        => '215.21492',
            'heading'  => 30
        ],
        'asmodians' => [
            'world_id' => '120010000',
            'x'        => '1275.5504',
            'y'        => '1169.5846',
            'z'        => '215.21492',
            'heading'  => 30
        ]
    ],

    'allopass'                 => [
        'url'                  => 'https://payment.allopass.com/buy/buy.apu?ids=307954&idd=1326680',
        'pointsGiven'          => 4000,
        'documentId'           => '307954/1326680/4588246'
    ],

    'paypal'                   => [
        'email'                => 'unretailed@gmail.com',
        'maxShopPoints'        => 1000000
    ],

    'servers'                  => [
        'Serveur'              => [
            'ip'               => '127.0.0.1',
            'port'             => 2106
        ],
        'Login'                => [
            'ip'               => '127.0.0.1',
            'port'             => 7777
        ],
        'TS'                   => [
            'ip'               => '127.0.0.1',
            'port'             => 9987
        ]
    ],

    // On the back office you can download logs from the server
    'logs'                     => [
        'path'                 => '/Users/letyrantmathieu/Desktop/logs-realAion/',
        'files'                => [
            [
                'file'         => 'adminaudit',
                'extension'    => '.log',
                'access_level' => 1
            ],
            [
                'file'         => 'audit',
                'extension'    => '.log',
                'access_level' => 1
            ],
            [
                'file'         => 'chat',
                'extension'    => '.log',
                'access_level' => 1
            ],
            [
                'file'         => 'console',
                'extension'    => '.log',
                'access_level' => 1
            ],
            [
                'file'         => 'error',
                'extension'    => '.log',
                'access_level' => 1
            ],
            [
                'file'         => 'exchange',
                'extension'    => '.log',
                'access_level' => 1
            ],
            [
                'file'         => 'kill',
                'extension'    => '.log',
                'access_level' => 1
            ],
            [
                'file'         => 'mail',
                'extension'    => '.log',
                'access_level' => 1
            ],
            [
                'file'         => 'warn',
                'extension'    => '.log',
                'access_level' => 1
            ]

        ]
    ],

    // Vote System
    'vote'                     => [
        'activated'              => true, // You can activate or not the vote system
        'boost'                  => false,
        'boost_value'            => 50,
        'shop_points_per_vote'   => 100,
        'links'                  => [
            [
                'name'               => 'RPG',
                'link'               => 'http://www.rpg-paradize.com/?page=vote&vote=99942',
                'referer'            => 'http://www.rpg-paradize.com/site-RealAion+4.9+-99942' // Use for check if the user has realy vote
            ],
            [
                'name'               => 'Gowonda',
                'link'               => 'http://www.gowonda.com/vote.php?server_id=5635',
                'referer'            => 'http://www.gowonda.com/serveur-aion-5635-RealAion-4.9-!.htm' // Use for check if the user has realy vote
            ],
        ]
    ],

    // Level is use for the shop, more you buy on the shop more you account level-up
    'levels' => [
        [
            'level' => 0,
            'price' => 0
        ],
        [
            'level' => 1,
            'price' => 5
        ],
        [
            'level' => 2,
            'price' => 20
        ],
        [
            'level' => 3,
            'price' => 45
        ],
        [
            'level' => 4,
            'price' => 80
        ],
        [
            'level' => 5,
            'price' => 125
        ]
    ]

];
