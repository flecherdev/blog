<?php

namespace app\controllers;

class IndexController{

    public function getIndex(){
        //esta variable se toma del scope superior
        global $pdo;

        $query = $pdo->prepare('SELECT * FROM `blog-posts` ORDER BY id DESC');
        $query->execute();
    
        $blogPost = $query->fetchAll(\PDO::FETCH_ASSOC);
        
        return  render('../views/index.php',['blogPost' => $blogPost]);    
    }
}
