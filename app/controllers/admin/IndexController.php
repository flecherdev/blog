<?php

namespace app\controllers\admin;
use app\controllers\BaseController;
use app\models\User;

class IndexController extends BaseController{

    public function getIndex(){
        if (isset($_SESSION['userId'])) {
            $userId = $_SESSION['userId'];
            $user = User::find($userId);

            if($user){
                return  $this->render('admin/index.twig',['user' => $user]);
            }
        }

        header('Location: '. BASER_URL .'auth/login');
    }
}

?>