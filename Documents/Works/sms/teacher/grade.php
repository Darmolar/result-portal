<?php  
include('header.php');
if(isset($_POST)){
 $class=$obj->Get_All_Data("select * from class join student on student.class=class.cl_id JOIN subject where subject.sub_id=".$_POST['subjectId']."");
}else{
	die();
}

?>

<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index-2.html"><i class="icofont icofont-home"></i></a>
                                    </li>
                                     <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="grade.php">Grade</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Process Student Result</h5>
                           
                        </div>
                        <div class="card-block">
						<table id="example" class="table table-striped"  width="100%">
 
 <thead>
 <tr><th> S/N</th><th> Student</th><th>C.A Test</th><th>Exam  </th></tr>
 </thead>
 <tbody>
  <tr><td><b>Class: </b><?php echo $class[0]['clname']; ?></td></tr>
  <tr><td><b>Subject: </b><?php echo $class[0]['subject_name']; ?></td></tr>

   <form class="form-horizontal"  method="post" name="addAdmin" id="form_data" action="grade.php" enctype="multipart/form-data">	
    <input type="hidden" name="exam_id" value="<?php echo $_POST['exam_list']; ?>" />
  <tr>
 <?php
///looping through the dataset
$n=0;
 for($i=0;$i<count($class);$i++){ 
 $n++;
 
?>
 <td><?php echo $n; ?></td>
 <td><?php echo $class[$i]['fname']; ?></td>
 <td> 
 
 <input type="hidden" name="uid[]" class="form-control datemask ng-dirty ng-valid ng-valid-required" value="<?php echo $class[$i]['uid'] ?>"/>
 
 
 <input type="hidden" name="class_id" class="form-control datemask ng-dirty ng-valid ng-valid-required" value="<?php echo $class[$i]['cl_id'] ?>"/>
 
 <input type="hidden" value="<?php echo $class[$i]['clname'] ?>" name="class_name" class="form-control datemask ng-dirty ng-valid ng-valid-required"/>
 
 <input type="hidden"  value="<?php echo $class[$i]['sub_id'] ?>" name="subject_id" class="form-control datemask ng-dirty ng-valid ng-valid-required"/>
 
 <input type="hidden" value="<?php echo $class[$i]['subject_name'] ?>" name="subject_name" class="form-control datemask ng-dirty ng-valid ng-valid-required"/>
 <center><input type="number" name="ca[]" value="<?php echo $obj->Get_Student_Grade($_POST['exam_list'],$class[$i]['uid'])[0]['ca'] ?>" class="form-control"/></center>
 </td>
 <td> <input type="number" name="exam[]" value="<?php echo $obj->Get_Student_Grade($_POST['exam_list'],$class[$i]['uid'])[0]['exam'] ?>" class="form-control"/></td>
 
 </tr>
  
<?php 
}
?>
<tr>

 <div class="form-group" style="position: absolute; bottom:0; padding-top:50px;">
          <div class="col-sm-2"></div>
          <div class="col-sm-10">
		  <br/><br/> <br/><br/>
           	<input type="hidden" name="create_grade">
							<button type="submit" class="btn btn-block btn-primary waves-effect waves-light m-r-10" data-toggle="tooltip" id="reg" data-placement="top" title="" data-original-title="Submit To Save">Submit  <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center>	 </button>
          </div>
       </tr>
		</form>
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
										console.log(response);
									$('#upload_ass').attr('disabled',false);
									$('#ring').hide();
										
									if(response ==='Grade Proccessed Successfully')
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
	