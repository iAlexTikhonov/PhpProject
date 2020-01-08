<?php

/** @var $renderer \Illuminate\View\Factory */

use Aura\Di\ContainerBuilder;

$builder = new ContainerBuilder();
$container = $builder->newInstance();


$container->set(\PhpProject\Action\HomeAction::class, function () use ($renderer) {
    return new \PhpProject\Action\HomeAction($renderer);
});

$container->set(\PhpProject\Action\CategoryAction::class, function () use ($renderer) {
    return new \PhpProject\Action\CategoryAction($renderer);
});