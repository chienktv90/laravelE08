
<?php

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
    
?>