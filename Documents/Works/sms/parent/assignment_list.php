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
                                    <li class="breadcrumb-item"><a href="assignment.php">View Assignment</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">List Of Assignments</h5>
                           
                        </div>
                        <div class="card-block">
						<table id="example" class="table table-striped"  width="100%">
 <?php
 $trans=$obj->Get_All_Data("select * from assignments where school_id=".$_SESSION['school_id']."");
 //print_r($trans);
 ?>
 <thead>
 <tr><th> S/N</th><th> Assignment Title</th><th>Assignment Description</th><th>Assignment Deadline</th> <th>Date </th> <th>Download </th> <th>Upload </th></tr>
 </thead>
 <tbody>
 
 <?php
///looping through the dataset
$n=0;
 for($i=0;$i<count($trans);$i++){ 
 $class=json_decode($trans[0]['classId']);
 $sectionid=json_decode($trans[0]['sectionId']);
//echo array_search($photo_data[0]['class'],$class);
 if(is_numeric(array_search($photo_data[0]['class'],$class))){

	if(is_numeric(array_search($photo_data[0]['section'],$sectionid))){
	 

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
<?php
include_once("ass_upload_modal.php");

?>
<td>   
<a class="waves-light btn btn-primary md-trigger" target="blank" href="#"  data-toggle="tooltip" data-placement="top" title="" data-original-title="Upload" data-modal="modal-9"><i class="fa fa-upload "></i>
</a>
</td>
 </tr>
  
<?php 
}
 } 
 }
echo '</tbody>';

?>

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
 
 
<script type="text/javascript">
 
						jQuery("#upload_ass").submit(function(e){
						
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
									$('#upload_ass').attr('disabled',false);
									$('#ring').hide();
										
									if(response ==='Assignment Uploaded Successfully')
									{
									notify("top", "center","", "success", "animated rotateInDownRight","animated rotateOutUpRight",response,"Successful");
									var delay = 3000;
										setTimeout((function(){ window.location.reload() }), delay);  
									}else
									{
									$('#ring').hide();
									notify("top", "center","", "danger", "animated rotateInDownRight","animated rotateOutUpRight",response,"Failed");	
									}
									}
								});
									$('#upload_ass').attr('disabled',true);
									$('#ring').hide();
							});
												
						</script>
	