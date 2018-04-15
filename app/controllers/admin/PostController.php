<?php

namespace app\controllers\admin;
use app\controllers\BaseController;
use app\models\BlogPost;
use Sirius\Validation\Validator;

class PostController extends BaseController{
    public function getIndex(){
        $blogPost = BlogPost::all();
        return  $this->render('admin/posts.twig',['blogPost' => $blogPost]);    
    }

    public function getCreate(){
        #admin/posts/create
        return  $this->render('admin/insert-post.twig');
    }

    public function postCreate(){

        $errors = [];
        $result = false;
        //Validaciones 
        $validator = new Validator();
        $validator->add('title','required');
        $validator->add('content','required');

        if($validator->validate($_POST)){
            $blogPost = new BlogPost([
                'title' => $_POST['title'],
                'content' => $_POST['content']
            ]);
            //La imagen no es obligatoria 
            if ($_POST['img']) {
                $blogPost->img_url = $_POST['img'];
            }
            $blogPost->save();
            
            $result = true;
        }else{
            $errors = $validator->getMessages();
            //var_dump($errors);
        }
            
        return $this->render('admin/insert-post.twig',[
            'result' => $result,
            'errors' => $errors
            ]);
    }
}

?>