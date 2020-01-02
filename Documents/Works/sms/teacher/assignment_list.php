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
                                    <li class="breadcrumb-item"><a href="hostel.php.php">Assignment</a></li>
                                    <li class="breadcrumb-item"><a href="hostel_list.php">View Assignment</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">List Of Assignment</h5>
                           
                        </div>
                        <div class="card-block">
						<table id="example" class="table table-striped"  width="100%">
 <?php
 $trans=$obj->Get_All_Data("select * from assignments where school_id=".$_SESSION['school_id']."");
 
 ?>
 <thead>
 <tr><th> S/N</th><th> Assignment Title</th><th>Assignment Description</th><th>Assignment Deadline</th> <th>Date </th> <th>Download </th><th>View Answers</th> <th>Edit </th> <th>Delete </th> </tr>
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
 <td><?php echo $trans[$i]['AssignTitle']; ?></td>
 <td><?php echo $trans[$i]['AssignDescription']; ?></td>
 <td><?php echo $trans[$i]['AssignDeadLine'] ?></td>
 <td><?php echo $trans[$i]['date']; ?></td>
 
 
  <td>   
<a class="waves-light btn btn-primary" target="blank" href="<?php if(!empty($trans[$i]['AssignFile'])) echo "../uploads/assignment/".sha1("assignment")."/".$trans[$i]['AssignFile']; ?>"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Download" ><i class="fa fa-download "></i>

</a>
</td>

  <td>   
<a class="waves-light btn btn-primary" href="ass_answer.php?ans_id=<?php echo base64_encode($trans[$i]['ass_id']); ?>&title=<?php echo base64_encode($trans[$i]['AssignTitle']); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="View Answer"><i class="fa fa-eye "></i>

</a>
</td>

 
 <td> 
 <a class=" waves-light btn btn-primary" href="edit_assignment.php?ass_id=<?php echo base64_encode($trans[$i]['ass_id']); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Assignment"><i class="fa fa-pencil"></i></a></td>
 
  <td>  
<a class="waves-light btn btn-danger" onclick="Delete_Record('Assignment Deleted Sucessfully','assignments','ass_id','<?php echo $trans[$i]['ass_id'] ?>','ring<?php echo $trans[$i]['ass_id'] ?>','assignment_list.php')"><i class="fa fa-trash-o "></i> <img style="display:none" width="30" id="ring<?php echo $trans[$i]['ass_id'] ?>" src="../assets/images/ring.gif"/> </a>
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
	