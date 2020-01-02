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
                                    <li class="breadcrumb-item"><a href="exam.php">Exam</a></li>
                                    <li class="breadcrumb-item"><a href="exam_list.php">Exam List</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">List Of Exams</h5>
                           
                        </div>
                        <div class="card-block">
						<table id="example" class="table table-striped"  width="100%">
 <?php
 $trans=$obj->Get_All_Data("select * from examslist where school_id=".$_SESSION['school_id']."");
 ?>
 <thead>
 <tr><th> S/N</th><th> Exam Title</th><th> Description</th> <th>Exam Date </th> <th>Year</th></tr>
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
 <td><?php echo $trans[$i]['examDescription']; ?></td>
 <td><?php echo $trans[$i]['examDate']; ?></td>
 <td><?php echo $trans[$i]['examAcYear']; ?></td>
 <td>   
  <?php
include_once("choose_class.php");

?>
 <div class="dropdown-primary dropdown">
        <button class="btn btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Operation
         </button>
        <div class="dropdown-menu" aria-labelledby="dropdown1" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
      
       <a class="waves-light btn btn-primary md-trigger"  href="#"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Upload" data-modal="modal-9"><i class="fa fa-calculator "></i>Grade
</a>
		
      
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
	