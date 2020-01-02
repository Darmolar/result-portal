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
                                    <li class="breadcrumb-item"><a href="add_subject.php">Subject</a></li>
                                    <li class="breadcrumb-item"><a href="subject_list.php">Subject List</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">List Of Subject</h5>
                           
                        </div>
                        <div class="card-block">
						<table id="example" class="table table-striped"  width="100%">
 <?php
 $trans=$obj->Get_All_Data("select * from subject where school_id=".$_SESSION['school_id']."");
 
if(isset($trans)){ 

 ?>
 <thead>
 <tr><th> S/N</th><th> Title</th><th> Teacher</th><th>Pass/Final Grade </th> <th>Date </th> <th>Delete </th>   <th>Edit </th></tr>
 </thead>
 <tbody>
 
 <?php
///looping through the dataset
$n=0;
 for($i=0;$i<count($trans);$i++){ 
 $n++;
 
 $teacher_json=json_decode($trans[$i]['teacher'],true);

// print_r($teacher_json);
 
 ?>
 <tr>
 <td><?php echo $n; ?></td>
 <td><?php echo $trans[$i]['subject_name']; ?></td>
 <td><?php 
 $teacher_name="";
 if(isset($teacher_json)){
 for($j=0;$j<count($teacher_json);$j++){
	  $teacher=$obj->Get_All_Data("select * from teacher where uid=".$teacher_json[$j]."");
 
 $teacher_name.=$teacher[0]['fname'].",";
 }
  echo rtrim($teacher_name,',');
 }?></td>
 <td><?php echo $trans[$i]['pass_grade']."/".$trans[$i]['final_grade']; ?></td>
 <td><?php echo $trans[$i]['date']; ?></td>
 <td>   
<a class="waves-light btn btn-primary" href="edit_subject.php?sub_id=<?php echo $trans[$i]['sub_id']; ?>"><i class="fa fa-pencil "></i> Edit</a>
</td>
<td> 
<a class="waves-light btn btn-danger" onclick="Delete_Record('Subject Deleted Sucessfully','subject','sub_id','<?php echo $trans[$i]['sub_id'] ?>','ring<?php echo $trans[$i]['sub_id'] ?>','subject_list.php')"><i class="fa fa-trash-o "></i> <img style="display:none" width="30" id="ring<?php echo $trans[$i]['sub_id'] ?>" src="../assets/images/ring.gif"/> </a>
 </tr>
  
<?php 
}
echo '</tbody>';
}
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

<script type="text/javascript">
 
						jQuery("#form_data").submit(function(e){
						
								e.preventDefault();
								$('#ring').show();
								$.ajax({
									type:"POST",
									url:"../controller/controller.php",
									 contentType: false,
         							cache: false,
  									 processData:false,
									data:new FormData(this),
									success: function(response){
									$('#reg').attr('disabled',false);
									$('#ring').hide();
										console.log(response);
									if(response ==='Static Page Created Successfully')
									{
									notify("top", "center","", "success", "animated rotateInDownRight","animated rotateOutUpRight",response,"Successful");
									var delay = 3000;
										setTimeout((function(){ window.location="dashboard/dashboard.php" }), delay);  
									}else
									{
									$('#ring').hide();
									notify("top", "center","", "success", "animated rotateInDownRight","animated rotateOutUpRight",response,"Failed");	
									}
									}
								});
									$('#reg').attr('disabled',true);
									$('#ring').hide();
							});
												
						</script>
						
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
	