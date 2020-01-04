<?php

$routerContainer = new \Aura\Router\RouterContainer();
$router = $routerContainer->getMap();

$router->get('home', '/', \NtSchool\Action\HomeAction::class);
$router->get('contact-us', '/contact-us', \NtSchool\Action\ContactUsAction::class);
$router->get('services', '/posts/{slug}', \NtSchool\Action\ServicesAction::class);
