<?php

/** @var $renderer \Illuminate\View\Factory */

use Aura\Di\ContainerBuilder;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$builder = new ContainerBuilder();
$container = $builder->newInstance();


$container->set('validator', function () use ($capsule) {
    $filesystem = new \Illuminate\Filesystem\Filesystem();

    $loader = new \Illuminate\Translation\FileLoader($filesystem,
        dirname(dirname(__FILE__)) . '/resources/lang');

    $loader->addNamespace('lang', dirname(dirname(__FILE__)) . '/resources/lang');
    $loader->load($lang = 'ru', $group = 'validation', $namespace = 'lang');

    $factory = new Illuminate\Translation\Translator($loader, 'ru');
    $validator = new Illuminate\Validation\Factory($factory);

    $databasePresenceVerifier = new \Illuminate\Validation\DatabasePresenceVerifier($capsule->getDatabaseManager());
    $validator->setPresenceVerifier($databasePresenceVerifier);

    return $validator;
});

$container->set('logger', function() {
    $log = new Logger('name');
    $log->pushHandler(new StreamHandler(__DIR__ . '/../resources/logs/main.log'));

    $logger = new \PhpProject\MonologLoggerAdapter($log);

    return $logger;
});

$container->set(\PhpProject\Action\HomeAction::class, function () use ($renderer, $container) {
    return new \PhpProject\Action\HomeAction(
        $renderer,
        $container->get('validator'),
        $container->get('logger')
    );
});

$container->set(\PhpProject\Action\CategoryAction::class, function () use ($renderer) {
    return new \PhpProject\Action\CategoryAction($renderer);
});

$container->set(\PhpProject\Action\UserPageAction::class, function () use ($renderer) {
    return new \PhpProject\Action\UserPageAction($renderer);
});