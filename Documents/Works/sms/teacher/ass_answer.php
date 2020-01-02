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
 //103->value to set
 if(!isset($_GET['title']) or !isset($_GET['ans_id']) ){
	die('Error:103');
 }
 $ans=base64_decode($_GET['title']);
 $id=base64_decode($_GET['ans_id']);
 $trans=$obj->Get_All_Data("select * from `assignmentsanswers` JOIN student on student.uid=assignmentsanswers.userId where assignmentId=$id");
 //print_r($trans);
 ?>
 <thead>
 <tr><th> S/N</th><th>Student</th>  <th>Note</th><th>Download </th> <th>Date </th> </tr>
 </thead>
 <tbody>
 
 <?php
///looping through the dataset
$n=0;
 for($i=0;$i<count($trans);$i++){ 
 $n++;
 //echo "../uploads/assignment/'.sha1(base64_decode($_GET['title'])).'/answers/'.$trans[$i]['fileName'] .'"
 ?>
 <tr>
 <td><?php echo $n; ?></td>
 <td><?php echo base64_decode($_GET['title']); ?></td>
 <td><?php echo $trans[$i]['userNotes']; ?></td>
<td><?php if(!empty($trans[$i]['fileName'])){ echo '<a target="blank" class="waves-light btn btn-primary" href="../uploads/assignment/'.sha1(base64_decode($_GET['title'])).'/answers/'.$trans[$i]['fileName'] .'"><i class="fa fa-download"></i></a>'; }else{ echo 'No File'; } ?></td>
 <td><?php echo $trans[$i]['date']; ?></td>

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
	