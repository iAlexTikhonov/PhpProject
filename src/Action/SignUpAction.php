<?php

namespace PhpProject\Action;

use Illuminate\Validation\ValidationException;
use PhpProject\LoggerNotifyInterface;
use PhpProject\Model\User;
use Psr\Http\Message\ServerRequestInterface;

final class SignUpAction
{
    /** @var \Illuminate\View\Factory */

    private $renderer;

    /** @var \Illuminate\Validation\Factory */
    private $validator;

    private $logger;

    public function __construct($renderer, $validator, LoggerNotifyInterface $logger)
    {
        $this->renderer = $renderer;
        $this->validator = $validator;
        $this->logger = $logger;
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

                $user->save();


                $this->logger->info('New user registered');

                $_SESSION['user'] = $user;

                header('Location: /user/' . $user->getAttribute('id'));
                exit();

            }catch (ValidationException $exception){
                $validationMsg = $exception->validator->errors();
            }
        }


        return $this->renderer->make('user-registration', [
            'messages' => $validationMsg
        ]);
    }
}

