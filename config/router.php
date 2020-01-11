<?php

$routerContainer = new \Aura\Router\RouterContainer();
$router = $routerContainer->getMap();

$router->get('home', '/', \PhpProject\Action\HomeAction::class);

$router->post('home.user-sign-up', '/', \PhpProject\Action\HomeAction::class);

$router->get('post-by-category', '/category/{id}', \PhpProject\Action\CategoryAction::class);

$router->get('user-page', '/user/{id}', \PhpProject\Action\UserPageAction::class);

