<?php

namespace app\controllers\admin;
use app\controllers\BaseController;
use app\models\BlogPost;

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
        
        $blogPost = new BlogPost([
            'title' => $_POST['title'],
            'content' => $_POST['content']
        ]);
        $blogPost->save();
        
        $result = true;
            
        return $this->render('admin/insert-post.twig',['result' => $result]);
    }
}

?>