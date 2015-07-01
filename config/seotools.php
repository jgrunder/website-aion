<?php

return [
    'meta'      => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults'       => [
            'title'       => "RealAion 4.7", // set false to total remove
            'description' => "Serveur privé Aion fun et PVP stable et performant en version 4.7", // set false to total remove
            'separator'   => ' - ',
            'keywords'    => ['aion', 'serveur', 'fun', 'pvp', 'serveur privee', 'serveur aion', 'gratuit'],
        ],

        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google'    => 'WdYf2ZSXWuYDHBwR22rlUX-8THYZoF19pSGho3jyrzQ',
            'bing'      => null,
            'alexa'     => null,
            'pinterest' => null,
            'yandex'    => null
        ]
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title'       => 'RealAion 4.7', // set false to total remove
            'description' => 'Serveur privé Aion fun et PVP stable et performant en version 4.7', // set false to total remove
            'url'         => 'http://realaion.com',
            'type'        => 'website',
            'site_name'   => 'RealAion 4.7',
            'images'      => [],
        ]
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
          'card'        => 'Serveur privé Aion fun et PVP stable et performant en version 4.7',
          'site'        => '@Real_Aion',
        ]
    ]
];
