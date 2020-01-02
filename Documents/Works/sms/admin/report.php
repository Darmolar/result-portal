<?php  
include('header.php');

?>


  <div class="md-modal md-effect-9" id="modal-9">
                                <div class="md-content">
                                    <h3>Choose Class And Exam</h3>
                                    <div>
                                        <p>Please Select Class And Exam</p>
                 	
   <form class="form-horizontal"  method="post" name="addAdmin" role="form" action="marksheet.php" enctype="multipart/form-data">	
          <div class="form-group" ng-class="{'has-error': attendance.classId.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Class *</label>
          <div class="col-sm-10">
           <select class="form-control ng-pristine ng-invalid ng-invalid-required" name="class_id" required>
		   
			<option value="">Select Class</option>
             <?php
									 $teacher=$obj->Get_All_Data("select * from class");
									 for($j=0;$j<count($teacher);$j++){
									 ?>
									<option value="<?php echo $teacher[$j]['cl_id'] ?>"><?php echo $teacher[$j]['clname'] ?></option>
								
								 <?php  } ?>
            </select>
          </div>
        </div>
		<br/>
		<br/>
        <div class="form-group" ng-show="attendanceModel == 'subject'" ng-class="{'has-error': attendance.subjectId.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Exam *</label>
          <div class="col-sm-10">
            <select class="form-control ng-dirty ng-valid ng-valid-required" name="exam_id" id="subject" required="required">
           
		   <option value="">Exam</option>
             <?php
									 $exam=$obj->Get_All_Data("select * from examslist");
									 for($j=0;$j<count($exam);$j++){
									 ?>
									<option value="<?php echo $exam[$j]['id'] ?>"><?php echo $exam[$j]['examTitle'] ?></option>
								
								 <?php  } ?>
		   
            </select>
          </div>
		
		<br/>
        </div>
		<br/>           
		    <button type="submit" name="fetch_student" id="upload_btn" class="btn  btn-primary waves-effect">Submit <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center></button>
		  </form>
		<br/>
                                        <button type="button" class="btn btn-primary waves-effect md-close">Close</button>
                                    </div>
                                </div>
                            </div>


<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index-2.html"><i class="icofont icofont-home"></i></a>
                                    </li>
                                     <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="add_teacher.php">Report</a></li>
                       
                                </ol>
                            </div>
                        </div>
                    </div>


					<div class="row m-b-30 dashboard-header">
                <div class="col-lg-4 col-sm-6">
				<a href="users_cate.php">
                    <div class="dashboard-primary bg-primary">
                        <div class="sales-primary">
                            <i class="fa fa-users fa-5x"></i>
                            <div class="f-right">
                                <h2 class="counter"><?php 
									$data=$obj->Get_All_Data("select * from users");
									echo count($data);
								?></h2>
                            </div>
                        </div>
						<div class="bg-dark-primary">
                            <p class="week-sales">Users Statistics</p>
                        </div>
                    </div>
					</a>
                </div>
                <div class="col-lg-4 col-sm-6">
				<a href="#">
                    <div class="bg-success dashboard-success">
                        <div class="sales-success">
                            <i class="fa fa-money fa-5x"></i>
                            <div class="f-right">
                                <h2 class="counter">3521</h2>
                                <span>Payment</span>
                            </div>
                        </div>
						<div class="bg-dark-success">
                            <p class="week-sales">Payments</p>
                        </div>
                    </div>
					</a>
                </div>
                <div class="col-lg-4 col-sm-6">
				<a href="#" class="md-trigger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Upload" data-modal="modal-9">
                    <div class="bg-warning dasboard-warning">
                        <div class="sales-warning">
                            <i class="fa fa-calculator fa-5x"></i>
                            <div class="f-right">
                                <h2 class="counter">
								<?php 
									$data=$obj->Get_All_Data("select * from grade");
									echo count($data);
								?>
								
								</h2>
                                <span>Result</span>
                            </div>
                        </div>
						
						<div class="bg-dark-warning">
                            <p class="week-sales">Result(s)</p>
                        </div>
						
                    </div>
					</a>
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
 
							

</div>



<script>


function Get_Subject(classid){
	$('.alert2').show();
	$.ajax({
									type:"GET",
									url:"../controller/controller.php?get_subject&class="+classid,
									success: function(response){
											$('.alert2').hide();
											console.log(response)
									$('#subject').append(response);
									}
								});
	
}

</script>
	