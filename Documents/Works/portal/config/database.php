<?php

	//Set DB variables
	$host		=	'localhost';
	$user		=	'root';
	$password	=	'';
	$db_name	=	'portal';

	//Start Connection
	$mysqli = new mysqli($host, $user, $password, $db_name);

	//Check for Connection Error
	if ($mysqli->connect_error) {
		die("Connection to server was not established <br>".$mysqli->connect_error);
	}

