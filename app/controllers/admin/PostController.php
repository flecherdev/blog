<?php

namespace app\controllers\admin;
use app\controllers\BaseController;

class PostController extends BaseController{
    public function getIndex(){
        #admin/posts o /asdmin/posts/index
        global $pdo;

        $query = $pdo->prepare('SELECT * FROM `blog-posts` ORDER BY id DESC');
        $query->execute();
    
        $blogPost = $query->fetchAll(\PDO::FETCH_ASSOC);
        
        return  $this->render('admin/posts.twig',['blogPost' => $blogPost]);    
    }

    public function getCreate(){
        #admin/posts/create
        return  $this->render('admin/insert-post.twig');
    }

    public function postCreate(){
        global $pdo;

        $sql = 'INSERT INTO `blog-posts`(`title`, `content`)  VALUES (:title, :content)';
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'title' => $_POST['title'],
            'content' => $_POST['content']
        ]);
            
        return $this->render('admin/insert-post.twig',['result' => $result]);
    }
}

?>