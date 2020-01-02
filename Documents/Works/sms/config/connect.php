<?php

require('config.php');

class connection{

public $con;
function __construct(){
	$this->con=mysqli_connect(host,user,pass,database) or die(mysqli_error($this->con));

	}
	
	function __destruct(){
		
		}
		
		public function connect(){
			
return $this->con;

if (mysqli_connect_errno()){
	
	die('Could Not Connect'.mysqli_error());
	
	return $this->con;
	
	}
	else{
		//die('connected');
		//print_r( $this->con);
	}
		}
		
		
		function discon(){
		mysqli_close($this->con);
		
		}
		
}

$db=new connection();
$db->connect();


?>