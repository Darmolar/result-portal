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
                                   <li class="breadcrumb-item"><a href="attendance.php">Attendance</a></li>
                                   
                             
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Filter  Attendance</h5>
                         
                        </div>
                        <div class="card-block">
                            <form class="form-horizontal ng-dirty ng-valid ng-valid-required" name="attendance" method="POST" action="attendance_stats.php">
        <div class="form-group" ng-class="{'has-error': attendance.classId.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Class *</label>
          <div class="col-sm-10">
           <select class="form-control ng-pristine ng-invalid ng-invalid-required" name="class"  onchange="Get_Section(this.value); Get_Subject(this.value)" required>
			<option value="">Select Class</option>
             <?php
									 $teacher=$obj->Get_All_Data("select * from class");
									 for($i=0;$i<count($teacher);$i++){
									 ?>
									<option value="<?php echo $teacher[$i]['cl_id'] ?>"><?php echo $teacher[$i]['clname'] ?></option>
								
								 <?php  } ?>
            </select>
			<div class="alert1"  style="display:none;" ><img width="30" id="ring1" src="../assets/images/ring.gif" />Working... </div>
          </div>
        </div>
		<br/>
		<br/>
    
        <div class="form-group" ng-show="attendanceModel == 'subject'" ng-class="{'has-error': attendance.subjectId.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Subject *</label>
          <div class="col-sm-10">
            <select class="form-control ng-dirty ng-valid ng-valid-required" name="subjectId" id="subject" required="required">
           
            </select>
          </div>
        </div>
		<br/>
		<br/>
        <div class="form-group" style="z-index: 999999999;" ng-class="{'has-error': attendance.attendanceDay.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Date *</label>
          <div class="col-sm-10">
            <input type="date" date-picker="" name="attendanceDay" ng-model="form.attendanceDay" class="form-control datemask ng-dirty ng-valid ng-valid-required" required="">
          </div>
        </div>
		<br/>
		<br/>
		 <div class="form-group" ng-show="attendanceModel == 'subject'" ng-class="{'has-error': attendance.subjectId.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Status *</label>
          <div class="col-sm-10">
            <select class="form-control ng-dirty ng-valid ng-valid-required" name="status" id="subject" required="required">
           <option value="*">All</option>
           <option value="0">Absent</option>
           <option value="1">Present</option>
           <option value="2">Late</option>
           <option value="3">Late With Excuses</option>
           <option value="4">Early Dismissal</option>
            </select>
          </div>
        </div>
		<br/>
		<br/>
        <div class="form-group">
          <div class="col-sm-12">
           	<input type="hidden" name="create_attendance">
							<button type="submit" class="btn btn-block btn-primary waves-effect waves-light m-r-10" data-toggle="tooltip" id="reg" data-placement="top" title="" data-original-title="Submit To Save">Submit  <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center>	 </button>
          </div>
        </div>
      </form>
                          </div>
                        </div>
                    </div>
                </div>


</div>
		
			<?php  
include('footer.php');
?>

<script type="text/javascript">


function Get_Section(classid){
	$('.alert1').show();
	$.ajax({
									type:"GET",
									url:"../controller/controller.php?get_section&class="+classid,
									success: function(response){
											$('.alert1').hide();
									$('#section').append(response);
									}
								});
	
}


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