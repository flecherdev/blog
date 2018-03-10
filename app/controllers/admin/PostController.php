<?php

namespace app\controllers\admin;

class PostController{
    public function getIndex(){
        #admin/posts o /asdmin/posts/index
        global $pdo;

        $query = $pdo->prepare('SELECT * FROM `blog-posts` ORDER BY id DESC');
        $query->execute();
    
        $blogPost = $query->fetchAll(\PDO::FETCH_ASSOC);
        
        return  render('../views/admin/posts.php',['blogPost' => $blogPost]);    
    }

    public function getCreate(){
        #admin/posts/create
        return  render('../views/admin/insert-post.php');
    }

    public function postCreate(){
        global $pdo;

        $sql = 'INSERT INTO `blog-posts`(`title`, `content`)  VALUES (:title, :content)';
        $query = $pdo->prepare($sql);
        $result = $query->execute([
            'title' => $_POST['title'],
            'content' => $_POST['content']
        ]);
            
        return render('../views/admin/insert-post.php',['result' => $result]);
    }
}

?>