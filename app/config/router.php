<?php

$router = $di->getRouter();

// Define your routes here

$router->add(
    '/poll/{do}/{id}',
    [
        'controller' => 'poll',
        'action' => 1,
        'id' => 2,
    ]
);

$router->handle();
