<?php  
include('header.php');
$testid=base64_decode($_GET['oexam_id']);
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
						<table id="example" class="table table-striped"  width="100%">
 <?php
 $trans=$obj->Get_All_Data("select * from testscore
 JOIN users on users.uid=testscore.stdid 
 where testid=$testid and testscore.stdid=".$_SESSION['uid']."");
//print_r($trans);
 ?>
 <thead>
 <tr><th> S/N</th><th>Student</th><th>Score</th><th>Date</th><th> View  </th> </tr>
 </thead>
 <tbody>
 
 <?php
///looping through the dataset
$n=0;
 for($i=0;$i<count($trans);$i++){ 
 $n++;
 ?>
 <tr>
 <td><?php echo $n; ?></td>
 <td><?php echo $trans[$i]['fname']; ?></td>
 <td><?php echo $trans[$i]['score'] ?></td>
 <td><?php echo $trans[$i]['date']; ?></td>
 
 <td>  
 
 <a class=" waves-light btn btn-primary" href="review.php?oexam_id=<?php echo base64_encode($testid); ?>&uid=<?php echo base64_encode($_SESSION['uid']); ?>"><i class="fa fa-eye"></i></a>
 
</td>
 
 </tr>
  
<?php 
}
echo '</tbody>';

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
	