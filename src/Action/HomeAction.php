<?php

namespace NtSchool\Action;

use Illuminate\Database\Capsule\Manager;
use Psr\Http\Message\RequestInterface;

final class HomeAction
{
    /** @var \Illuminate\View\Factory */
    protected $renderer;

    public function __construct($renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(RequestInterface $request)
    {

        $posts = Manager::select("SELECT * FROM posts");


        return $this->renderer->make('index', [
            'posts' => $posts
        ]);
    }
}

