<?php
	require_once('controllers/UserController.php');

	// $controller = isset($_GET['controller'])? $_GET['controller'].'Controller' : 'UserController';
	// $action = isset($_GET['action'])?$_GET['action']: 'getUser' ;
	
	// $usercontroller = new $controller();
	// $usercontroller-> $action();
	
	
	
	$usercontroller = new UserController();
	$usercontroller-> getUser();
?>