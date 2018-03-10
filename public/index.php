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

define('BASE_URL',$baseUrl);

$route = $_GET['route'] ?? '/';

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

/*$router->get('/admin',function(){
    return render('../views/admin/index.php');
});*/

//Ruta principal
$router->controller('/', app\controllers\IndexController::class);//::class devuelve el nombre de la clase
//Ruta Administrador
$router->controller('/admin', app\controllers\admin\IndexController::class);
//Ruta insert
$router->controller('/admin/posts', app\controllers\admin\PostController::class); 


$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'],$route);

echo $response;

?>