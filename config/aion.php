<?php

return [

    'website_name'  => 'RealAion',
    'aion_version'  => '4.7',
    'link_facebook' => 'https://www.facebook.com/Realaion',
    'link_twitter'  => 'https://twitter.com/Real_Aion',

    'servers'        => [
        'loginserver' => [
            'ip'    => '188.165.42.128',
            'port'  => 7777
        ],
        'gameserver'  => [
            'ip'    => '188.165.42.128',
            'port'  => 2106
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