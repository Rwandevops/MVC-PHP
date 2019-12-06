<?php

namespace App\Controllers;

use WebFramework\AppController;
use WebFramework\Router;
use WebFramework\Request;

use App\Models\User;

class HomeController extends AppController
{

    public function home_view(Request $request)
    {

        return $this->render('home.html.twig', [

            'base' => $request->base,
            'error' => $this->flashError
        ]);
    }

    public function home(Request $request)
    {
        echo 'home';
    }
}
