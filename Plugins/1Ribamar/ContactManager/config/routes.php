<?php
use Cake\Routing\Router;

Router::plugin(
    'ContactManager',
    ['path' => '/contact-manager'],
    function ($routes) {
        $routes->fallbacks('DashedRoute');
    }
);
