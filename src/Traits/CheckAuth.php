<?php

namespace PhpProject\Traits;


trait CheckAuth
{

    public function checkAuth()
    {
        if(!isset($_SESSION['user']))
        {
            header('Location: /');
            exit();
        }
    }

}