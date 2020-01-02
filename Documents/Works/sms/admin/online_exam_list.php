<?php  
include('header.php');

?>

<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index-2.html"><i class="icofont icofont-home"></i></a>
                                    </li>
                                     <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="online_exam.php">Online Exam </a></li>
                                    <li class="breadcrumb-item"><a href="online_exam_list.php">Online Exam List</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Online Exam List</h5>
                           
                        </div>
                        <div class="card-block">
						<div class="table-responsive">
						<table id="example" class="table table-striped"  width="100%">
 <?php
 $trans=$obj->Get_All_Data("select * from onlineexams JOIN users on users.uid=onlineexams.examTeacher JOIN subject on subject.sub_id=examSubject WHERE onlineexams.school_id=".$_SESSION['school_id']."");
//print_r($trans);
 ?>
 <thead>
 <tr><th> S/N</th><th>Exam Title</th><th>Exam Description</th><th>Teacher</th><th>Subject</th> <th>End Date</th></th> <th> Add Question(s)</th> <th> View Question </th>  <th> Take Test </th><th> Result </th>  <th>Edit </th> <th>Delete </th> </tr>
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
 <td><?php echo $trans[$i]['examTitle']; ?></td>
 <td><?php echo $trans[$i]['examDescription'] ?></td>
 <td><?php echo $trans[$i]['fname'] ?></td>
 <td><?php echo $trans[$i]['subject_name']; ?></td>
 <td><?php echo $trans[$i]['ExamEndDate']; ?></td>
 
 <td>  
 <a class=" waves-light btn btn-primary" href="questions.php?oexam_id=<?php echo base64_encode($trans[$i]['id']); ?>&sub=<?php  echo base64_encode($trans[$i]['subject_name']); ?>"><i class="fa fa-plus"></i></a>
</td>

<td>  
 <a class=" waves-light btn btn-primary" href="questions_list.php?oexam_id=<?php echo base64_encode($trans[$i]['id']); ?>"><i class="fa fa-eye"></i></a>
</td>

 <td> 
 <a class=" waves-light btn btn-primary" href="take_test.php?oexam_id=<?php echo base64_encode($trans[$i]['id']); ?>&sub=<?php echo base64_encode($trans[$i]['examSubject']); ?>"><i class="fa fa-book"></i></a></td>
 <td> 
 <a class=" waves-light btn btn-primary" href="test_result.php?oexam_id=<?php echo base64_encode($trans[$i]['id']); ?>&sub=<?php echo base64_encode($trans[$i]['examSubject']); ?>"><i class="fa fa-calculator"></i></a></td>
 <td>  
 
 <a class=" waves-light btn btn-primary" href="questions_list.php?oexam_id=<?php echo base64_encode($trans[$i]['id']); ?>"><i class="fa fa-pencil"></i></a>
</td>
  <td>  
 <a class="waves-light btn btn-danger" onclick="Delete_Record('Online Exam Deleted Sucessfully','onlineexams','id','<?php echo $trans[$i]['id'] ?>','ring<?php echo $trans[$i]['id'] ?>','online_exam_list.php')"><i class="fa fa-trash-o "></i> <img style="display:none" width="30" id="ring<?php echo $trans[$i]['id'] ?>" src="../assets/images/ring.gif"/> </a>
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
	