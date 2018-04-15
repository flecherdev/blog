<?php

namespace app\controllers;

use app\models\BlogPost;

class DetalleController extends BaseController{

    public function getIndex($id){
        
        $blogPost = BlogPost::where('id', $id)->get();
        
        return  $this->render('detalle.twig',['blogPost' => $blogPost]);    
    }
}