<?php  
include('header.php');

?>

<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="dashboard.php"><i class="icofont icofont-home"></i></a>
                                    </li>
                                     <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="students_list.php">Students List</a></li>
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
 $trans=$obj->Get_All_Data("select * from student join class on class.cl_id=student.class where class.clteacher=".$_SESSION['uid']."");
 ?>
 <thead>
 <tr><th> S/N</th><th> Fullname</th><th> Username</th><th>Email</th> <th>Date </th>  <th>Operation </th></tr>
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
 
 <div class="dropdown-primary dropdown">
        <button class="btn btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">OPeration
         </button>
        <div class="dropdown-menu" aria-labelledby="dropdown1" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
        <a class="dropdown-item waves-light" href="attendance_stats.php?uid=<?php echo base64_encode($trans[$i]['uid']) ?>">Attendance</a>
        <a class="dropdown-item waves-light waves-effect" href="#">Marksheet</a>
        </div>
        </div>
 
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
	