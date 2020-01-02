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
                                    <li class="breadcrumb-item"><a href="class.php.php">Classes</a></li>
                                    <li class="breadcrumb-item"><a href="class_list.php">View Classes</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">List Of Class</h5>
                           
                        </div>
                        <div class="card-block">
						<table id="example" class="table table-striped"  width="100%">
 <?php
 $trans=$obj->Get_All_Data("select * from class join teacher on teacher.uid=class.clteacher where class.school_id=".$_SESSION['school_id']."");
 ?>
 <thead>
 <tr><th> S/N</th><th>Class Name</th><th>Class Teacher</th><th>Date </th> <th>Add Schedule</th> <th>Edit </th> <th>Delete </th> </tr>
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
 <td><?php echo $trans[$i]['clname']; ?></td>
 <td><?php echo $trans[$i]['fname']; ?></td>
 <td><?php echo $trans[$i]['date']; ?></td>
 
 
  <td>   
<a class="waves-light btn btn-primary" target="blank" href="classes_schedule.php?cl_id=<?php echo base64_encode($trans[$i]['cl_id']); ?>"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Create Schedule" ><i class="fa fa-bars "></i>

</a>
</td>

  <td>   
<a class="waves-light btn btn-primary" href="edit_class.php?cl_id=<?php echo base64_encode($trans[$i]['cl_id']); ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title=" Edit Class"><i class="fa fa-pencil "></i>

</a>
</td>

<td>
<a class="waves-light btn btn-danger" onclick="Delete_Record('Class Deleted Sucessfully','gradelevels','cl_id','<?php echo $trans[$i]['cl_id'] ?>','ring<?php echo $trans[$i]['cl_id'] ?>','class_list.php')"><i class="fa fa-trash-o "></i> <img style="display:none" width="30" id="ring<?php echo $trans[$i]['cl_id'] ?>" src="../assets/images/ring.gif"/> </a>
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
	