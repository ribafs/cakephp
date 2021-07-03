<?php
$baseDir = dirname(dirname(__FILE__));

return [
    'plugins' => [
        'AdminBr' => $baseDir . '/vendor/ribafs/admin-br/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'WyriHaximus/TwigView' => $baseDir . '/vendor/wyrihaximus/twig-view/',
    ],
];
