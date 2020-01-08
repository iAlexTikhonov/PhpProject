<?php

namespace PhpProject\Action;

use Illuminate\Pagination\Paginator;
use Illuminate\Database\Capsule\Manager;
use PhpProject\Model\Category;
use PhpProject\Model\Post;
use Psr\Http\Message\ServerRequestInterface;

final class CategoryAction
{
    /** @var \Illuminate\View\Factory */
    protected $renderer;

    public function __construct($renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(ServerRequestInterface $request)
    {
        $categoryId = $request->getAttribute('id');
        $page = $request->getQueryParams()['page'] ?? 1;

        $postsPerPage = 4;
        $total = Manager::select("SELECT COUNT(*) as counter FROM category_post WHERE category_id = :id",
            [
                ':id' => $categoryId
            ]
        );

        $counter = ceil($total[0]->counter / $postsPerPage);

        $page == 1 ? $offset = 0 : $offset = ($page - 1) * $postsPerPage;

        $category = Category::find($categoryId);

        $categoryAll  = new Paginator(
            $category->posts->skip($offset)->take($postsPerPage),
            $postsPerPage,
            $page
        );


        return $this->renderer->make('posts-by-category', [
            'categoryAll' => $categoryAll,
            'counter' => $counter,
            'categoryId' => $categoryId
        ]);
    }
}

