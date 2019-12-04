<?php

namespace App\Controllers;

use WebFramework\AppController;
use WebFramework\Router;
use WebFramework\Request;

use App\Models\User;

class AdminUserController extends AppController
{
    public function adminuser_view(Request $request)
    {
        return $this->render('adminuser.html.twig', [
            'base' => $request->base,
            'error' => $this->flashError
        ]);
    }

    public function adminuser(Request $request)
    { }
}
