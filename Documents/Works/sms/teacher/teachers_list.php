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
                                    <li class="breadcrumb-item"><a href="add_teacher.php">Teacher</a></li>
                                    <li class="breadcrumb-item"><a href="teachers_list.php">Teachers List</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">List Of Students</h5>
                           
                        </div>
                        <div class="card-block">
						<table id="example" class="table table-striped"  width="100%">
 <?php
 $trans=$obj->Get_All_Data("select * from teacher where school_id=".$_SESSION['school_id']."");
 
 ?>
 <thead>
 <tr><th> S/N</th><th> Fullname</th><th> Username</th><th>Email</th> <th>Date </th> <th>Delete </th>   <th>Edit </th></tr>
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
 <td><?php echo $trans[$i]['username']; ?></td>
 <td><?php echo $trans[$i]['email'] ?></td>
 <td><?php echo $trans[$i]['date']; ?></td>
 <td>   
<a class="waves-light btn btn-danger" onclick="Delete_Record('Teacher Deleted Sucessfully','teacher','uid','<?php echo $trans[$i]['uid'] ?>','ring<?php echo $trans[$i]['uid'] ?>','teachers_list.php')"><i class="fa fa-trash-o "></i> <img style="display:none" width="30" id="ring<?php echo $trans[$i]['uid'] ?>" src="../assets/images/ring.gif"/> </a>
</td>
<td> 
 <a class=" waves-light btn btn-primary" href="edit_teacher.php?uid=<?php echo base64_encode($trans[$i]['uid']); ?>"><i class="fa fa-pencil"></i></a></td>
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
	