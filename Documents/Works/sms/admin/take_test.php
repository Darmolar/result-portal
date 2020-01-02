<?php
session_start();
include('header.php');
 $testid=base64_decode($_GET['oexam_id']);
 $_SESSION['test_id']=$testid;
 $sub_id=base64_decode($_GET['sub']);
 if (!$_SESSION['uid']){
	header('location:index.php');
	
	}
	
	

	 $qarray=$obj->Get_All_Data("select qno from question where test='$testid'");
	
	$rand_values=$obj->Generate_Random_Numbers($obj->array_default_key($qarray),$sub_id,$testid);
	
//timer
$time=mysqli_query($obj->db,"select * from time where test_id=$testid and std_id=".$_SESSION['uid']."");

$timerows=mysqli_num_rows($time);
if ($timerows>0){
$row=mysqli_fetch_assoc($time);
$init=$row['time'];
	$minute=floor(($init/60)%60);
	$sec=$init%60;
}
else{
	$row=$obj->Get_All_Data("select * from onlineexams where id='$testid'");
	$init=$row[0]['examTimeMinutes'];
	$minute=floor(($init/60)%60);
	$sec=$init%60;
}
	
	//$qry3=mysql_query("insert into testattempt(stdid,testid,quid) values(".$_SESSION['stdid'].",'121',".$fetch['id'].")")
	
	

?>
 
<script type="text/javascript">

    var m;
	var s;
function countdown(){
		 m = $('.min');
		 s = $('.sec');
		if(m.html()==0 && parseInt(s.html()) <= 0){
			Submit_Test();
			$('.clock').html('Time UP.');
			$('.table').hide();
			$('.nextq').hide();
			$('.prev').hide();	
			//submittest();
		}
		if(parseInt(s.html()) <=0 ){
			m.html(parseInt(m.html()-1));
			s.html(60);
		}
		if(parseInt(s.html()) <=0){
			$('.clock').html('<span class="sec">59</span> seconds. ');
		}
		s.html(parseInt(s.html()-1));
}
		setInterval ('countdown()', 1000);
		
		
		
	
			</script>

 		
<div class="row">
<div class="col-md-2">
</div>
<div class="col-md-8">
<div align="center">

 <table class="table">
   

 <tr><td>
<div class="panel panel-success" >
			<div class="panel-head"> <center>
			  <div class="clock">
				<!--<span class="countdown">0</span>minutes-->
    			<span align="center" style="font-size:24px; background:#FFF;"><span style="color:black;" class="min"><?php echo $minute; ?></span><span style="color:white;"> <span style="color:black"> : </span></span><span style="color:black;" class="sec"><?php echo $sec; ?></span></span>
                	</div>        
</center>
<br/>
<div id="question_no"></div>
</div>
			
			

				<div class="panel-body">
				 <div id="sub_msg" style="font-size:20px; display:none;"> 
				 Test Submitted Successfully. Please wait while the system redirect you to your dashboard.
				 </div>
				 <div id="questions" style="font-size:20px;"> </div>
  
  </div>
  </div>
  <br/>
 <?php
 //pagination begins here.
 
 $pag=mysqli_query($obj->db,"select * from questionarray where std_id=".$_SESSION['uid']." and test_id=$testid") or die(mysqli_error($obj->db)) ;
$pagrows=mysqli_num_rows($pag);
if ($pagrows>0){
	$pagnum=mysqli_fetch_assoc($pag);
	$arr=$pagnum['array'];
	$array=json_decode($arr,true);
	$j=0;
		echo '<ul class="pagination bootpag" id="page_btn">';
		for($i=0;$i<count($array);$i++){
			$j++;
			$clean_array=str_replace("[","",($array[$i]));
				
  echo '<li ><a href="#?id" onclick="Get_Question('.$clean_array.','.$j.')">'.$j.'</a></li>';

		}
		echo '</ul>';
}
 ?>
   
<button id="sub_btn" type="button" class="btn btn-primary btn-block" onclick="Submit_Test()">Submit</button>    
     
</td></tr>
</table>

</div>

</div>

</div>

<?php  
include('footer.php');
?>
<?php   
$replace=$array[0];


?>

<!-- TAB ONE script -->
<script type="text/javascript">
var qno ="<?php echo $replace; ?>";

var total_question="<?php echo count($array);  ?>"		
		//loads question on formload
		
		function Get_Question(no,current_question){
			$.ajax({
									type:"POST",
									url:"question_loader.php?qno="+no,
									success: function(html){
									
									if(html>0){
											
										//alert(html);
											
										}else{
											$('#question_no').empty();
											$('#question_no').append(""+current_question+" Of "+total_question+"")
										$('#questions').empty(html)
											$('#questions').append(html)
											
										}
								}
							});	
			
			
		}
		
		$(document).ready(function(){
			//alert(qno)
			$.ajax({
									type:"POST",
									url:"question_loader.php?qno="+qno,
									success: function(html){
									
									if(html>0){
											
										alert(html);
											
										}else{
												$('#question_no').empty();
											$('#question_no').append("1 Of "+total_question+"")
										$('#questions').empty(html)
											$('#questions').append(html)
											
										}
								}
							});	
									 
		});
		
		
		Track_Time();
			

function Track_Time(){
	var m=$('.min');
	var s=$('.sec');
	m_parse=parseInt(m.html())
		s_parse=parseInt(s.html())
		var time=m_parse*60+s_parse;
	//console.log(time);
								$.ajax({
									
									type:"GET",
									url:"time_tracker.php?time="+time,
									success: function(html){	
									
								console.log(html);
												}
													});			
							window.setTimeout(Track_Time,1000);
											}
		
		
		
		
		
	
	

function Submit_Test(){
								var formData = jQuery(this).serialize();
								$.ajax({
									
									type:"POST",
									url:"Submit.php",
									data:formData,
									success: function(html){	
									console.log(html);
									if(html==0){
										return false;
											
										}else{
											
										$('#questions').fadeIn();
										$('#questions').text("");
										$('#questions').text("");
										$('#page_btn').fadeOut();
										$('#sub_btn').fadeOut();
										$('#sub_msg').fadeIn();
										var delay = 3000;
										 setTimeout((function(){ window.location = 'dashboard.php'  }), delay);
										
										
										}
								}
							});			
							
}
</script>




			