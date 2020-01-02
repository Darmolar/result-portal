<?php 
  
  session_start();
  require_once "config/database.php";
  require_once "php/function.php";

 
 if (!isset($_SESSION['matricNo'])) {
 	header("location: ./");
 	die();
 }

 $getUserDetails = select('users', 'matricNo', $_SESSION['matricNo'], $mysqli);
 
?>
<!DOCTYPE html>
<html>
<head>
	<title>School Portal</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!--Font Awsome  CDN-->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


   <!--  <script
	  src="https://code.jquery.com/jquery-3.4.1.js"
	  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	  crossorigin="anonymous"></script>
 -->	<!-- Data table cdn-->
	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
	
</head>