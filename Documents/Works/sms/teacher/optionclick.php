<?php
session_start();
 include_once('../controller/controller.php');
  
  
  
$ans=$_POST['RadioGroup1'];
mysqli_query($obj->db,"update testattempt set ans='$ans',correctans='".$_SESSION['cor']."' where quid=".$_SESSION['qno']." and stdid=". $_SESSION['uid']." and testid=".$_SESSION['test_id']."") or die (mysqli_error($obj->db));
//echo "1";
 ?>