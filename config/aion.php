<?php

return [

  'website_name'             => 'RealAion',
  'aion_version'             => '4.7',
  'link_facebook'            => 'https://www.facebook.com/Realaion',
  'link_twitter'             => 'https://twitter.com/Real_Aion',
  'link_youtube'             => 'https://youtube.com',
  'languages'                => ['fr', 'en'],
  'contactMail'              => 'aion@realaion.com',

  'allopass'                 => [
    'realGiven'            => 4000,
    'documentId'           => '307954/1326680/4588246'
  ],

  'paypal'                   => [
    'email'                => 'unretailed@gmail.com',
    'maxReal'              => 1000000
  ],

  'servers'                  => [
    'Serveur'              => [
      'ip'               => '188.165.42.128',
      'port'             => 2106
    ],
    'Login'                => [
      'ip'               => '188.165.42.128',
      'port'             => 7777
    ],
    'TS'                   => [
      'ip'               => 'realaion.com',
      'port'             => 9987
    ]
  ],

  'slider'                   => [
    [
      'image'              => '1.jpg',
      'title'              => 'Titre de l’article du slider 1'
    ],
    [
      'image'              => '2.jpg',
      'title'              => 'Titre de l’article du slider 2'
    ],
    [
      'image'              => '3.jpg',
      'title'              => 'Titre de l’article du slider 3'
    ]
  ],

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

  'vote'                     => [
    'activated'              => true,
    'boost'                  => false,
    'real_per_vote'          => 100,
    'links'                  => [
      [
        'name'               => 'RPG',
        'link'               => 'http://www.rpg-paradize.com/?page=vote&vote=99942',
        'referer'            => null
      ],
      [
        'name'               => 'Gowonda',
        'link'               => 'http://www.gowonda.com/vote.php?server_id=5635',
        'referer'            => null
      ],
    ]
  ]

];
