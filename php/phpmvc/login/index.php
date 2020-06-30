<?php 
	
	//require_once('controllers/UserController.php');
	class DbModel 
	{
		public function connect(){
			$con = mysqli_connect('localhost', 'root', '', 'phpmvc');
			if (mysqli_connect_errno()) {
				echo "connect fail" ;
			}
			return $con ;
		}
		
	}
	
	class UserModel extends DbModel
	{
		
		public function login($username , $password )
		{
			$con = $this->connect();
			$sql = 'SELECT * FROM `user` WHERE username = "'.$username.'" and password = "'.$password.'" ' ;
			$result = $con-> query($sql);
			return $user = mysqli_fetch_assoc($result);
		}
	}
	
	
	
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
	
	$usercontroller = new UserController();
	$usercontroller-> getUser();
 ?>