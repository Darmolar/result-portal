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
                                    <li class="breadcrumb-item"><a href="questions.php">Add Question </a></li>
                                    <li class="breadcrumb-item"><a href="questions_list.php">Questions list</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">List Of Hostels Categories</h5>
                           
                        </div>
                        <div class="card-block">
						<div class="table table-responsive">
						<table id="example" class="table table-striped"  width="100%">
 <?php
 $test=base64_decode($_GET['oexam_id']);
 $trans=$obj->Get_All_Data("select * from question JOIN onlineexams on onlineexams.id=question.test JOIN subject on subject.sub_id=onlineexams.examSubject JOIN users on users.uid=onlineexams.examTeacher where test='$test' and  question.school_id=".$_SESSION['school_id']."");
 //print_r($trans);
 ?>
 <thead>
 <tr><th> S/N</th><th>Exam Title</th><th>Subject</th><th>Teacher</th><th>QUestions</th> <th>Option A</th></th> <th>Option B</th> <th>Option C</th> <th>Option D</th>  <th>Correc Answer</th> <th>Edit </th> <th>Delete </th> </tr>
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
 <td><?php echo $trans[$i]['subject_name'] ?></td>
 <td><?php echo $trans[$i]['fname'] ?></td>
 <td><?php echo $trans[$i]['question']; ?></td>
 <td><?php echo $trans[$i]['option1']; ?></td>
 <td><?php echo $trans[$i]['option2']; ?></td>
 <td><?php echo $trans[$i]['option3']; ?></td>
 <td><?php echo $trans[$i]['option4']; ?></td>
 <td><?php echo $trans[$i]['correctanswer']; ?></td>
 
 <td> 
 <a class=" waves-light btn btn-primary" href="edit_questions.php?question_id=<?php echo base64_encode($trans[$i]['id']); ?>"><i class="fa fa-pencil"></i></a></td>
 
  <td>  
 <a class="waves-light btn btn-danger" onclick="Delete_Record('Question Deleted Sucessfully','question','id','<?php echo $trans[$i]['id'] ?>','ring<?php echo $trans[$i]['id'] ?>','online_exam_list.php')"><i class="fa fa-trash-o "></i> <img style="display:none" width="30" id="ring<?php echo $trans[$i]['id'] ?>" src="../assets/images/ring.gif"/> </a>
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
	