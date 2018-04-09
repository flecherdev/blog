<?php

namespace app\controllers;
use app\models\BlogPost;
use app\models\User;
use Sirius\Validation\Validator;

class AuthController extends BaseController{

    public function getLogin(){
        return  $this->render('login.twig');    
    }

    public function postLogin(){

        $errors = [];

        $validator = new Validator();
        $validator->add('email','required');
        $validator->add('email','email');
        $validator->add('password','required');

        if ($validator->validate($_POST)) {
            //Busco en la base ese usuario y lo trae no como coleccion sino como un usuario por eso first
            $user = User::where('email', $_POST['email'])->first(); 
            if ($user) {
                //Recibe el passwor y el hash con el que se loquiere comparar
                if (password_verify($_POST['password'], $user->password)) {
                    //Seteaamos las variables de sesion
                    $_SESSION['userId'] = $user->id;
                    header('Location:'.BASE_URL.'admin');
                    return null;
                }
                //En caso de que los datos no sean correctos
                $validator->addMessage('email', 'El usuario y/o password son incorrectos');
               // $validator->addMessage('password', 'El usuario y/o password son incorrectos');
            }
        }
        $errors = $validator->getMessages();
        return  $this->render('login.twig', [
            'errors' => $errors
        ]);  
    }

    public function getLogout(){
        unset($_SESSION['userId']);
        header('Location:'.BASE_URL.'auth/login');
    }
}