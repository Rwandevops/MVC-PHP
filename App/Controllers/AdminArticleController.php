<?php

namespace App\Controllers;

use WebFramework\AppController;
use WebFramework\Router;
use WebFramework\Request;

use App\Models\User;

class AdminArticleController extends AppController
{
    public function adminarticle_view(Request $request)
    {
        return $this->render('adminarticle.html.twig', [
            'base' => $request->base,
            'error' => $this->flashError
        ]);
    }

    public function adminarticle(Request $request)
    { }
}
