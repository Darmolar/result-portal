<?php 
session_start();
 include_once('../controller/controller.php');
 $qno=$_GET['qno'];
//$sql=mysql_query("insert into testattempt(stdid,testid) values('1','121')") or die (mysql_error());
//$ans=$_POST['correct'];
//$cor=$_POST['RadioGroup1'];
$sql=mysqli_query($obj->db,"select stdid,testid from testattempt where quid='$qno' and stdid=".$_SESSION['uid']." and testid=".$_SESSION['testid']."");
$numrows=mysql_num_rows($sql);
$row=mysql_fetch_assoc($sql);
if ($numrows>0){

	}

else {
 //$_SESSION['qno']=$qno;

mysqli_query($obj->db,"Insert into testattempt(stdid,testid,quid) values(".$_SESSION['uid'].",".$_SESSION['testid'].",'$qno')") or die (mysqli_error($obj->db)); 
}
 ?>