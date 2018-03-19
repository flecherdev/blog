<?php 
//Fromt controler

//iniciamos como se mostraran los errores
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
//include_once '../config.php';

//Utilizamos variables de entorno
$dotenv = new Dotenv\Dotenv(__DIR__ . '/..');
$dotenv->load();

//Conexion con la base de datos 
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv('DB_USER'),
    'password'  => getenv('DB_PASS'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']),'',$_SERVER['SCRIPT_NAME']);
$baseUrl = 'http://'.$_SERVER['HTTP_HOST'].$baseDir;

define('BASE_URL',$baseUrl);

$route = $_GET['route'] ?? '/';

/* Uso de rutas 42 */
use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

//Ruta principal
$router->controller('/', app\controllers\IndexController::class);//::class devuelve el nombre de la clase
//Ruta Administrador
$router->controller('/admin', app\controllers\admin\IndexController::class);
//Ruta Insert
$router->controller('/admin/posts', app\controllers\admin\PostController::class); 

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'],$route);

echo $response;

?>