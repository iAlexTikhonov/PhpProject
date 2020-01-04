<?php

require_once 'vendor/autoload.php';

require_once 'config/dotenv.php';
require_once 'config/database.php';


Illuminate\Database\Capsule\Manager::schema()->create('posts', function ($table) {
    $table->increments('id');
    $table->string('title');
    $table->text('text');
    $table->string('image');
    $table->timestamps();
});

Illuminate\Database\Capsule\Manager::schema()->create('categories', function ($table) {
    $table->increments('id');
    $table->string('title');
    $table->string('slug');
    $table->timestamps();
});


Illuminate\Database\Capsule\Manager::schema()->create('category_post', function ($table) {
    $table->integer('post_id');
    $table->integer('category_id');
    $table->primary(['post_id', 'category_id']);
    $table->timestamps();
});