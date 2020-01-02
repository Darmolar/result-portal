<?php  
@session_start();
 include_once('../controller/controller.php');

/* function Send_msg($msgr,$reci,){
				$ch2=curl_init();
				$encodedmsg=urlencode($msgr);
$url2="http://developers.cloudsms.com.ng/api.php?userid=38346815&password=inusokan&type=5&destination=$reci&sender=Gal Codes&message=$encodedmsg";
} */ 



 //echo Count_Subject(5,2); 
// print("<br/>");
 function Count_Subject($test_id){
	 global $obj;
	$qry=mysqli_query($obj->db,"select * from question where test='$test_id'");
	$count=mysqli_num_rows($qry);
	return $count;
 }

$sql=mysqli_query($obj->db,"select distinct(testid) from testattempt where stdid=". $_SESSION['uid']." and testid=".$_SESSION['test_id']."");
//print_r($sql);
if (mysqli_num_rows($sql)>0){
while($fetch=mysqli_fetch_assoc($sql)){
	
$sql2=mysqli_query($obj->db,"select * from testattempt where stdid=". $_SESSION['uid']." and testid=".$_SESSION['test_id']." and ans=correctans");
$numrows2=mysqli_num_rows($sql2);
//TODO: Write an algorithm that will count total question in the database per subject
$total_question=Count_Subject($_SESSION['test_id']);
//echo $total_question;
mysqli_fetch_assoc($sql2);
if($numrows2>0){
	//echo $numrows2;
$score=$numrows2/$total_question*100;
}else{
	$score=0;
}
echo $score.'%';

$check=$obj->Get_All_Data("select * from testscore where stdid=". $_SESSION['uid']." and testid=".$_SESSION['test_id']." and score='$score'");

if(count($check)<1){
$result=mysqli_query($obj->db,"Insert into testscore set stdid=". $_SESSION['uid'].",testid=".$_SESSION['test_id'].",score='$score'")or die(mysqli_error($obj->db));
}
}
}
//header('location:dashboard.php')
 ?>