<?php

namespace App\Controllers;

use WebFramework\AppController;
use WebFramework\Router;
use WebFramework\Request;

use App\Models\User;

class LoginController extends AppController
{

  public function login_view(Request $request)
  {
    return $this->render('login.html.twig', [
      'base' => $request->base,
      'error' => $this->flashError
    ]);
  }

  public function login(Request $request)
  { }
}
