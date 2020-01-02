<?php 
 
 //Preventing SQL INJECTION
	function secure($string, $mysqli){
		//Require Config.php File
		$secure = trim($string);
		$secure = htmlentities($secure, ENT_QUOTES, 'UTF-8');
		$secure = $mysqli->real_escape_string($secure);
		return $secure;
	}

//Select all values in field
	function select($table, $field, $value, $mysqli){
		$select = $mysqli->prepare("SELECT * FROM ".$table." WHERE ". $field." = ? LIMIT 1");
		$select->bind_param("s", $value);
		$select->execute();
		$res = $select->get_result();
		$row = $res->fetch_assoc();
		return $row;
	}
    
    // Getting all values in table
	function getAllTable($table, $mysqli){
		$select = $mysqli->prepare("SELECT * FROM $table LIMIT 1");
		$select->execute();
		$row = $select->get_result();
		return $row;
	}
?>