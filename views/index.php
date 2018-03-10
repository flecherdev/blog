
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
                    <?php 
                    foreach ($blogPost as $blogPost){
                        echo '<div class="blog-post">';
                        echo '<h2>'.$blogPost['title'].'</h2>';
                        echo '<p>Abril 5, 2010 by <a href="http://">Pepe</a></p>';
                        echo '<div class="blog-post-image">';
                        echo '<img src="images/pan.png" alt="">';
                        echo '</div>';
                        echo '<div class="blog-post-content">';
                        echo $blogPost['content'];
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <div class="col-md-4">Sidebar</div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <footer>
                        Pie de pagina<br>
                        <a href="<?php echo BASE_URL;?>admin">Administrador de contenido</a>
                    </footer>
                </div>
            </div>    
        </div>
    </body>
</html>