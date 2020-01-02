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
                                    <li class="breadcrumb-item"><a href="event.php">Event</a></li>
                                    <li class="breadcrumb-item"><a href="event_list.php">Event List</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">List Of Events</h5>
                           
                        </div>
                        <div class="card-block">
						<table id="example" class="table table-striped"  width="100%">
 <?php
 $trans=$obj->Get_All_Data("select * from event where school_id=".$_SESSION['school_id']."");
 
 ?>
 <thead>
 <tr><th> S/N</th><th> Title</th><th> Description</th><th>Place</th> <th>For </th><th>Date</th> <th>Delete </th>   <th>Edit </th></tr>
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
 <td><?php echo $trans[$i]['title']; ?></td>
 <td><?php echo $trans[$i]['desc']; ?></td>
 <td><?php echo $trans[$i]['place'] ?></td>
 <td><?php echo $trans[$i]['for']; ?></td>
 <td><?php echo $trans[$i]['date']; ?></td>
 <td>   
<a class="waves-light btn btn-danger" onclick="Delete_Record('Event Deleted Sucessfully','event','eid','<?php echo $trans[$i]['eid'] ?>','ring<?php echo $trans[$i]['eid'] ?>','event_list.php')"><i class="fa fa-trash-o "></i> <img style="display:none" width="30" id="ring<?php echo $trans[$i]['eid'] ?>" src="../assets/images/ring.gif"/> </a>
</td>
<td> 
 <a class=" waves-light btn btn-primary" href="edit_event.php?eid=<?php echo base64_encode($trans[$i]['eid']); ?>"><i class="fa fa-pencil"></i></a></td>
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
	





?>