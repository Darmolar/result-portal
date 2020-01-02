<?php  
include('header.php');
$testid=base64_decode($_GET['oexam_id']);
$stdid=base64_decode($_GET['uid']);
echo $testid;
?>

<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index-2.html"><i class="icofont icofont-home"></i></a>
                                    </li>
                                     <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="online_exam.php">Online Exam </a></li>
                                    <li class="breadcrumb-item"><a href="online_exam_list.php?oexam_id=<?php ?>">Online Exam List</a></li>
                                    <li class="breadcrumb-item"><a href="">Test Result</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Test Result</h5>
                           
                        </div>
                        <div class="card-block">
					
					 
  <table class="table table-condensed" bgcolor="#FFFFFF" border="1">
   <thead>
  <tr>
    <td><b>Questions NO</b></td>
    <td><b>Answer</b></td>
     <td><b>Remark</b></td>
  </tr>
  </thead>
 <?php 

$sql3=mysqli_query($obj->db,"select * from users where uid=".$stdid."");
$numrows3=mysqli_num_rows($sql3);

while($row3=mysqli_fetch_assoc($sql3)){
	$sql5="select * from testattempt where stdid=$stdid and testid=$testid order by quid asc";
$sql4=mysqli_query($obj->db,$sql5);
$numrows4=mysqli_num_rows($sql4);
while($row4=mysqli_fetch_assoc($sql4)){

?>

  <tr>
    <td> <?php echo $row4['quid']?></td>
    <td> <?php echo $row4['ans']?></td>
    <td> <?php  if ($row4['ans'] === $row4['correctans']){
		echo '<img src="../assets/images/Yes.ico" alt="Correct"> Correct';
		}    
		else{echo '<img src="../assets/images/Erase.ico" alt="wrong">Wrong';
			} ?></td>
  </tr>

 <?php
 }//third loop
}//end of second loop
//}//end of first loop

//}//end of if
//
//	else{
//	echo 'No Result Found';
//	}

   ?>
     </table>
					
					
                          </div>
                        </div>
                    </div>
                </div>


</div>
		
			<?php  
include('footer.php');
?>

						
						<script>
 
 $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
 
 
 </script>
	