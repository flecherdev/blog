<?php 
//Fromt controler

//iniciamos como se mostraran los errores
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
include_once '../config.php';


$baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']),'',$_SERVER['SCRIPT_NAME']);
$baseUrl = 'http://'.$_SERVER['HTTP_HOST'].$baseDir;

var_dump($baseUrl);

$route = $_GET['route'] ?? '/';

//ejemplo de utilizacion de rutas con switch
/*switch($route){
    case '/':
        require '../index.php';
        break;
    case '/admin';
        require '../admin/index.php';
        break;
    case '/admin/posts':
        require '../admin/posts.php';
        break;
}*/

function render($fileName, $params = []){
    //inicia un buffer interno antes de enviar al navegador
    ob_start();
    //arreglo asociativo
    extract($params);
    include $fileName;
    return ob_get_clean();
}

/* Uso de rutas 42 */
use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

$router->get('/admin',function(){
    return render('../views/admin/index.php');
});

$router->get('/',function() use($pdo){
    $query = $pdo->prepare('SELECT * FROM `blog-posts` ORDER BY id DESC');
    $query->execute();

    $blogPost = $query->fetchAll(PDO::FETCH_ASSOC);
    
    return  render('../views/index.php',['blogPost' => $blogPost]);
    
    //include '../views/index.php';
    
});

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'],$route);

echo $response;

?>