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
                                    <li class="breadcrumb-item"><a href="report.php">Report</a></li>
                                    <li class="breadcrumb-item"><a href="#">Users Category</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">List Of Users By Category</h5>
                           
                        </div>
                        <div class="card-block">
						<table id="example" class="table table-striped"  width="100%">
 <?php
 $trans=$obj->Get_All_Data("select * from users");

 ?>
 <thead>
 <tr><th> S/N</th><th>Users Privilege</th><th>Total Users</th></tr>
 </thead>
 <tbody>
 
 <tr>
 <td>1</td>
 <td>Administrator</td>
 <td>
  <?php echo count($trans=$obj->Get_All_Data("select * from users where priv=1")); ?>
 </td>
 </tr> 
 <tr>
 <td>2</td>
 <td>Teacher</td>
 <td>
  <?php echo count($trans=$obj->Get_All_Data("select * from users where priv=2")); ?>
 </td>
 </tr> 
 <tr>
 <td>3</td>
 <td>Student</td>
 <td>
  <?php echo count($trans=$obj->Get_All_Data("select * from users where priv=3")); ?>
 </td>
 </tr>
 
 <tr>
 <td>4</td>
 <td>Parent</td>
 <td>
  <?php echo count($trans=$obj->Get_All_Data("select * from users where priv=4")); ?>
 </td>
 </tr>
</tbody>


 </table>
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