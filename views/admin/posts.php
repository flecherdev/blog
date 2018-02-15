<?php
    include_once '../config.php';
    
    $query = $pdo->prepare('SELECT * FROM `blog-posts` ORDER BY id DESC');
    $query->execute();

    $blogPost = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Blog Personal</title>
        <!-- BootstrapCDN-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Titulo de BLOG</h1>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-8">
                <h2>Posts</h2>
                <a class="btn btn-primary" href="insert-post.php">Nuevo Post</a>
                    <table class="table">
                        <tr>
                            <th>Titulo</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>

                        <?php 
                            foreach ($blogPost as $blogPost) {
                                echo '<tr>';
                                echo '<td>'.$blogPost['title'].'</td>';
                                echo '<td>Editar</td>';
                                echo '<td>Eliminar</td>';
                                echo '</tr>';
                            }
                        ?>
                    </table>
                    
                </div>
                <div class="col-md-4">Sidebar</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <footer>
                        Pie de pagina<br>
                        <a href="admin/index.php">Administrador de contenido</a>
                    </footer>
                </div>
            </div>    
        </div>
    </body>
</html>