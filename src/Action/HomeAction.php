<?php

namespace NtSchool\Action;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Capsule\Manager;
use NtSchool\Model\Post;
use Psr\Http\Message\ServerRequestInterface;

final class HomeAction
{
    /** @var \Illuminate\View\Factory */
    protected $renderer;

    public function __construct($renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(ServerRequestInterface $request)
    {
        $page = $request->getQueryParams()['page'] ?? 1;
        $postsPerPage = 4;
        $total = Manager::select("SELECT COUNT(*) as counter FROM posts");
        $counter = round($total[0]->counter / $postsPerPage);

        $page == 1 ? $offset = 0 : $offset = ($page - 1) * $postsPerPage;


        $posts = new Paginator(
            Post::skip($offset)->take($postsPerPage)->get(),
            $postsPerPage,
            $page
        );


        return $this->renderer->make('index', [
            'posts' => $posts,
            'counter' => $counter
        ]);
    }
}

