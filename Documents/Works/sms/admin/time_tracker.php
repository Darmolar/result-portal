<?php
session_start();
 include_once('../controller/controller.php');
if(isset($_GET['time'])){
	$time=$_GET['time'];
	$qry2=mysqli_query($obj->db,"select * from time where std_id=".$_SESSION['uid']." and test_id=".$_SESSION['test_id']."");
	$check=mysqli_num_rows($qry2);
	if ($check<1){
		
$qry=mysqli_query($obj->db,"insert into time set
std_id=".$_SESSION['uid'].", test_id=".$_SESSION['test_id'].",
time='$time'");
}
else{
$qry=mysqli_query($obj->db,"update time set
std_id=".$_SESSION['uid'].", test_id=".$_SESSION['test_id'].",
time='$time'");	
	
}
}

?>