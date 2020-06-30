<?php 
	/**
	* 
	*/
	//require_once('models/UserModel.php');
	class DbModel 
	{
		public function connect(){
			$con = mysqli_connect('localhost', 'root', '', 'login_mvc');
			if (mysqli_connect_errno()) {
				echo " ket noi that bai " ;
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
				 	echo "chuc mung ban da dang nhap thanh cong ";
				 } else {
				 	require_once('views/Login.php');
				 	echo "sai ten dang nhap hoac mat khau ";
				 }
				 
			}else{
				require_once('views/Login.php');
			}
		}
		
	}

 ?>