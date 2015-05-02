<?php

return [

    'website_name'  => 'RealAion',
    'aion_version'  => '4.7',
    'link_facebook' => '#',
    'link_twitter'  => '#',

    'servers'        => [
        'loginserver' => [
            'ip'    => '127.0.0.1',
            'port'  => 7000
        ],
        'gameserver'  => [
            'ip'    => '127.0.0.1',
            'port'  => 8000
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