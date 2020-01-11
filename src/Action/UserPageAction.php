<?php

namespace PhpProject\Action;

use Illuminate\Database\Capsule\Manager;
use PhpProject\Model\User;
use PhpProject\Traits\CheckAuth;
use Psr\Http\Message\ServerRequestInterface;

final class UserPageAction
{
    use CheckAuth;

    /** @var \Illuminate\View\Factory */

    private $renderer;


    public function __construct($renderer)
    {
        $this->renderer = $renderer;
    }

    public function __invoke(ServerRequestInterface $request)
    {
        $this->checkAuth();

        $pageId = $request->getAttribute('id');

        $userData = Manager::select("SELECT * FROM users WHERE id = :id", ['id' => $pageId]);
        $userName = $userData[0]->name;


        unset($_SESSION['user']);

        return $this->renderer->make('user-page', [
            'name' => $userName
        ]);
    }
}

