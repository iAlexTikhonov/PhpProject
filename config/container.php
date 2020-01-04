<?php

/** @var $renderer \Illuminate\View\Factory */

use Aura\Di\ContainerBuilder;

$builder = new ContainerBuilder();
$container = $builder->newInstance();

$container->set(\NtSchool\Action\HomeAction::class, function () use ($renderer) {
    return new \NtSchool\Action\HomeAction($renderer);
});

$container->set(\NtSchool\Action\ContactUsAction::class, function () use ($renderer) {
    return new \NtSchool\Action\ContactUsAction($renderer);
});

$container->set(\NtSchool\Action\ServicesAction::class, function () use ($renderer) {
    return new \NtSchool\Action\ServicesAction($renderer);
});