<?php

session_start();

define('DS', DIRECTORY_SEPARATOR);
define('ROOT_PATH', dirname(__DIR__));
define('APP_PATH', ROOT_PATH . DS . 'application');
define('VIEW_PATH', APP_PATH . DS . 'view');
define('MOD_PATH', APP_PATH . DS . 'model');
define('LIB_PATH', ROOT_PATH . DS . 'library');
define('PUB_PATH', __DIR__);

//////////////////////////////////////////////////////////////////////////////////// ERRORS
ini_set("display_errors", 1);
//////////////////////////////////////////////////////////////////////////////////// ERRORS

require_once APP_PATH . DS . 'config.php';

// Chargement des définitions des classes.
require_once LIB_PATH . DS . 'Request.php';
require_once LIB_PATH . DS . 'Router.php';

require_once LIB_PATH . DS . 'Response.php';
require_once LIB_PATH . DS . 'Router.php';
require_once LIB_PATH . DS . 'Dispatcher.php';
require_once LIB_PATH . DS . 'ControllerInterface.php';
require_once LIB_PATH . DS . 'View.php';
require_once LIB_PATH . DS . 'Controller.php';
require_once LIB_PATH . DS . 'Message.php';

// Chargement des classes model
require_once MOD_PATH . DS . 'Connect.php';
require_once MOD_PATH . DS . 'Product.php';
require_once MOD_PATH . DS . 'Authentification.php';
require_once MOD_PATH . DS . 'Upload.php';

// Instanciation des classes
$request = Request::getInstance();
$router = new Router();
$dispatcher = new Dispatcher();
$view = new View();
$response = new Response();

//////// AUTRES OBJETS
// Connect db
$connect = new Connect($db);
$message = new Message();

//////// PROCESS APPLI
// 1. Récupération de l'url
$request->run();

// 2. Routage - Formatage de l'url
$router->setRequest($request);
$router->route();

// 3. Dispastching - Appel des classes et fichier en fonction de l'url
$dispatcher->setRequest($request);
$dispatcher->setResponse($response);
$dispatcher->setView($view);
$dispatcher->setConnection($connect);
$dispatcher->setMessage($message);
$dispatcher->dispatch();

// 4. View - Formatage du nom et appel des fichiers de la vue et intégration dans le layout
$viewName = strtolower($request->getControllerName() . '.phtml');
$view->setLayout('layout.phtml');
$page = $view->renderPage($viewName);
$fullpage = $view->renderLayout($page);
// 5. Response - Transmission de la page complète assemblée pour affichage
$response->setBody($fullpage);
$response->send();
