<?php

namespace PhpProject\Action;

use Illuminate\Validation\ValidationException;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Capsule\Manager;
use PhpProject\Model\Post;
use PhpProject\Model\User;
use Psr\Http\Message\ServerRequestInterface;

final class HomeAction
{
    /** @var \Illuminate\View\Factory */

    private $renderer;

    /** @var \Illuminate\Validation\Factory */
    private $validator;

    public function __construct($renderer, $validator)
    {
        $this->renderer = $renderer;
        $this->validator = $validator;
    }

    public function __invoke(ServerRequestInterface $request)
    {
        $validationMsg = null;

        if($request->getMethod() == 'POST'){
            $userData = $request->getParsedBody();

            try{

                $this->validator->validate(
                    $userData,
                    [
                        'name' => ['required', 'min:3'],
                        'email' => ['required', 'email', 'unique:users,email'],
                        'password' => ['required', 'min:8', 'confirmed'],
                        'password_confirmation' => ['required', 'min:8'],
                    ]
                );

                $user = new User();
                $user->name = $userData['name'];
                $user->email = $userData['email'];
                $user->password = password_hash($userData['password'], PASSWORD_BCRYPT);

                Manager::transaction(function () use ($user){
                    $user->save();
                }, 3);


                $_SESSION['user'] = $user;

                header('Location: /user/' . $user->getAttribute('id'));
                exit();

            }catch (ValidationException $exception){
                $validationMsg = $exception->validator->errors();
            }
        }

        $page = $request->getQueryParams()['page'] ?? 1;
        $postsPerPage = 4;
        $total = Manager::select("SELECT COUNT(*) as counter FROM posts");
        $counter = ceil($total[0]->counter / $postsPerPage);

        $page == 1 ? $offset = 0 : $offset = ($page - 1) * $postsPerPage;


        $posts = new Paginator(
            Post::skip($offset)->take($postsPerPage)->get(),
            $postsPerPage,
            $page
        );


        return $this->renderer->make('index', [
            'posts' => $posts,
            'counter' => $counter,
            'messages' => $validationMsg,
        ]);
    }
}

