<?php

return [

    'website_name'  => 'RealAion',
    'aion_version'  => '4.7',
    'link_facebook' => 'https://www.facebook.com/Realaion',
    'link_twitter'  => 'https://twitter.com/Real_Aion',
    'link_youtube'  => 'https://youtube.com',

    'servers'        => [
        'Serveur'  => [
            'ip'    => '188.165.42.128',
            'port'  => 2106
        ],
        'Login' => [
            'ip'    => '188.165.42.128',
            'port'  => 7777
        ],
        'TS'  => [
            'ip'    => '188.165.42.128',
            'port'  => 8888
        ]
    ],

    'slider' => [
      [
          'image' => '1.jpg',
          'title' => 'Titre de l’article du slider 1'
      ],
      [
          'image' => '2.jpg',
          'title' => 'Titre de l’article du slider 2'
      ],
      [
          'image' => '3.jpg',
          'title' => 'Titre de l’article du slider 3'
      ]
    ],

    'vote' => [
        'activated'         => true,
        'boost'             => false,
        'toll_per_vote'     => 100,
        'links'      => [
            [
                'name' => 'RPG',
                'link' => 'http://www.rpg-paradize.com/?page=vote&vote=99942'
            ],
            [
                'name' => 'Gowonda',
                'link' => 'http://www.gowonda.com/vote.php?server_id=5635'
            ],
        ]
    ]

];
