<?php

namespace App\Controllers;

use WebFramework\AppController;
use WebFramework\Router;
use WebFramework\Request;

use App\Models\User;

class ErrorController extends AppController
{
    public function Error404_view(Request $request)
    {
        return $this->render('Error404.html.twig', [
            'base' => $request->base,
            'error' => $this->flashError
        ]);
    }
}
