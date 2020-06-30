<?php

require_once('models/UserModel.php');

class UserController
	{
		public function getUser(){
			$username = isset($_POST['username'])? $_POST['username']: '' ;
			$password = isset($_POST['password'])? $_POST['password']: '' ;
			if ($password != '' && $username != '' ) {
				 
				 $usermodel = new UserModel();
				 
				 $user = $usermodel->login($username , $password );

				 if ($user) {
					echo "Login sucess";
				 } else {
					require_once('views/Login.php');
					echo "incorect username or password";
				 }
				 
			}else{
				require_once('views/Login.php');
			}
		}
		
	}
?>