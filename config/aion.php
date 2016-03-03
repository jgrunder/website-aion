<?php

return [

  'website_name'             => 'RealAion',
  'aion_version'             => '4.9',
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
        'referer'            => 'http://www.rpg-paradize.com/site-RealAion+4.9+-99942'
      ],
      [
        'name'               => 'Gowonda',
        'link'               => 'http://www.gowonda.com/vote.php?server_id=5635',
        'referer'            => 'http://www.gowonda.com/serveur-aion-5635-RealAion-4.9-!.htm'
      ],
    ]
  ],

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
