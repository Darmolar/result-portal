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
                                    <li class="breadcrumb-item"><a href="hostel.php.php">Hostel Category</a></li>
                                    <li class="breadcrumb-item"><a href="hostel_list.php">View Hostel</a></li>
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
						<table id="example" class="table table-striped"  width="100%">
 <?php
 $trans=$obj->Get_All_Data("select * from hostelcat JOIN hostel on hostel.hostel_id=hostelcat.catTypeId where hostel.school_id=".$_SESSION['school_id']."");
 //print_r($trans);
 ?>
 <thead>
 <tr><th> S/N</th><th> Categories Title</th><th>Hostel</th><th>Fee</th><th>Date</th> <th>Edit </th> <th>Delete </th> </tr>
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
 <td><?php echo $trans[$i]['catTitle']; ?></td>
 <td><?php echo $trans[$i]['hostelTitle'] ?></td>
 <td><?php echo $trans[$i]['catFees'] ?></td>
 
 <td><?php echo $trans[$i]['date']; ?></td>
 

 <td> 
 <a class=" waves-light btn btn-primary" href="edit_hostel_cate.php?hostel_cate_id=<?php echo base64_encode($trans[$i]['hostel_cat_id']); ?>"><i class="fa fa-pencil"></i></a></td>
 
  <td>  
 <a class="waves-light btn btn-danger" onclick="Delete_Record('Hostel Category Deleted Sucessfully','hostel','hostel_cat_id','<?php echo $trans[$i]['hostel_cat_id'] ?>','ring<?php echo $trans[$i]['hostel_cat_id'] ?>','hostel_cat_list.php')"><i class="fa fa-trash-o "></i> <img style="display:none" width="30" id="ring<?php echo $trans[$i]['hostel_cat_id'] ?>" src="../assets/images/ring.gif"/> </a>
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
	