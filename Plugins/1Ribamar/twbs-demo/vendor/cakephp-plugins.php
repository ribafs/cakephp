<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'BootstrapUI' => $baseDir . '/vendor/friendsofcake/bootstrap-ui/',
        'CakeControlTwbs' => $baseDir . '/vendor/ribafs/cake-control-twbs/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Less' => $baseDir . '/vendor/elboletaire/less-cake-plugin/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/'
    ]
];