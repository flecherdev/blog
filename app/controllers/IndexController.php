<?php

namespace app\controllers;

use app\models\BlogPost;

class IndexController extends BaseController{

    public function getIndex(){
        
        $blogPost = BlogPost::query()->orderBy('id','desc')->get();
        
        return  $this->render('index.twig',['blogPost' => $blogPost]);    
    }
}
