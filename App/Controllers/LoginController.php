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
  {
    $user = new User();
    $user
      ->setEmail($request->params['email'])
      ->setPassword($request->params['password']);

    // *** DONNEES ENTREE VIA POST DU LOGIN
    $passwordPost = $user->getPassword();
    $emailPost = $user->getEmail();

    // *** DONNEES ENTREE VIA LA DB
    $userInformationArray = $this->orm->select('users', 'email', $emailPost);

    if (empty($userInformationArray)) {
      $this->flashError->set('No User match with this email. Please Register.');
    } else {
      $matchPassword = password_verify($passwordPost, $userInformationArray['password']);
    }

    if ($matchPassword === true) {
      var_dump('Connection successful');
    } else {
      var_dump('Connection failed');
    }

    $this->redirect('/' . $request->base . '', '302');

    die();
  } // fin de la fonction Login
} // fin de la classe LoginController
