<?php

namespace App\Controllers;

class IndexController{

    public function getIndex(){
        
        global $pdo;

        $query = $pdo->prepare('SELECT * FROM `blog-posts` ORDER BY id DESC');
        $query->execute();
    
        $blogPost = $query->fetchAll(\PDO::FETCH_ASSOC);
        
        return  render('../views/index.php',['blogPost' => $blogPost]);    
    }
}

?>