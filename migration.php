<?php

require_once 'vendor/autoload.php';
require_once 'config/database.php';

Illuminate\Database\Capsule\Manager::schema()->create('users', function ($table) {
    $table->increments('id');
    $table->string('email')->unique();
    $table->timestamps();
});

Illuminate\Database\Capsule\Manager::schema()->create('categories', function ($table) {
    $table->increments('id');
    $table->string('email')->unique();
    $table->timestamps();
});

Illuminate\Database\Capsule\Manager::schema()->create('pets', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->timestamps();
});

