<?php 
	/**
	* 
	*/
	//require_once('DbModel.php');
	
	
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

 ?>