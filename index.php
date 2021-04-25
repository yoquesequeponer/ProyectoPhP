<?php
// Start Session
session_start();

// Include Config
require('config.php');

require('classes/Messages.php');
require('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/home.php');
require('controllers/animals.php');
require('controllers/comentarios.php');
require('controllers/adoptar.php');
require('controllers/acoger.php');
require('controllers/users.php');

require('models/home.php');
require('models/animal.php');
require('models/comentarios.php');
require('models/adoptar.php');
require('models/acoger.php');
require('models/user.php');

$bootstrap = new Bootstrap($_GET);

$pag=$_GET['id'];
if(!$pag){
	$pag=1;
}
$_SESSION['pag'] = $pag;

$controller = $bootstrap->createController();
if($controller){
	$controller->executeAction();
}