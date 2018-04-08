<?php

namespace app\controllers\admin;

use app\controllers\BaseController;
use Sirius\Validation\Validator;
use app\models\User;


class UserController extends BaseController{

    //Renderea la vista
    public function getIndex(){
        $users = User::all();
        return $this->render('admin/users.twig',[
            'users' => $users 
        ]);
    }


    public function getCreate(){
        return $this->render('admin/insert-user.twig');
    }

    public function postCreate(){
        $errors = [];
        $result = false;

        //Reglas de validacion
        $validator = new Validator();
        $validator->add('name','required');
        $validator->add('email','required');
        $validator->add('email','email');
        $validator->add('password','required');

        if($validator->validate($_POST)){
            $user = new User();
            $user->name = $_POST['name'];
            $user->email = $_POST['email'];
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);//encripta el password

            $user->save();//Guardamos el usuario
            $result = true;
        }else{
            $errors = $validator->getMessages();
        }

        return $this->render('admin/insert-user.twig',[
            'result' => $result,
            'errors' => $errors
        ]);
    }

}