<?php

namespace App\Controllers;

use WebFramework\AppController;
use WebFramework\Router;
use WebFramework\Request;

use App\Models\User;


class RegisterController extends AppController
{

    public function register_view(Request $request)
    {
        return $this->render('auth/register.html.twig', [
            'base' => $request->base,
            'error' => $this->flashError
        ]);
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->setUsername($request->params['username']);
        $user->setEmail($request->params['email']);
        $user->setPassword($request->params['password']);

        try {
            $user->validate();
        } catch (\Exception $e) {
            $this->flashError->set($e->getMessage());
            $this->redirect('/' . $request->base . 'auth/register', '302');
            return;
        }

        var_dump($user);
        // TODO: Store user in the database with the ORM (this->orm).
        die();
    }
}
