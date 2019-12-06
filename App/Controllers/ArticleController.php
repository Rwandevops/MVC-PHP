<?php

namespace App\Controllers;

use WebFramework\AppController;
use WebFramework\Router;
use WebFramework\Request;

use App\Models\User;

class ArticleController extends AppController
{
    public function article_view(Request $request)
    {
        return $this->render('article.html.twig', [

            'base' => $request->base,
            'error' => $this->flashError
        ]);
    }

    public function article(Request $request)
    { }
}
