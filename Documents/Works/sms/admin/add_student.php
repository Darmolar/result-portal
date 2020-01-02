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
                                    <li class="breadcrumb-item"><a href="add_teacher.php"> Add Student</a></li>
                                   
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Add Student</h5>
                           <div class="f-right">
                              <a href="students_list.php" class="btn btn-info waves-effect" data-type="info">View Students</a>
                            </div>
                        </div>
                        <div class="card-block">
							<form class="form-horizontal" id="form_data" method="post" enctype="multipart/form-data" encoding="multipart/form-data">
        <div class="form-group has-error">
          <label for="inputEmail3" class="col-sm-2">Full name * </label>
          <div class="col-sm-10">
            <input type="text" name="fname" class="form-control" required placeholder="Full name">
          </div>
        </div>
		<br/><br/><br/>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Roll id </label>
          <div class="col-sm-10">
            <input type="text" name="rollid" class="form-control" placeholder="Roll id">
          </div>
        </div>
		<br/><br/><br/>
        <div class="form-group has-error" ng-class="{'has-error': addAdmin.username.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Username * </label>
          <div class="col-sm-10">
            <input type="text" name="username" ng-model="form.username" class="form-control ng-pristine ng-invalid ng-invalid-required" required="" placeholder="Username">
          </div>
        </div>
		<br/><br/><br/>
        <div class="form-group has-error" ng-class="{'has-error': addAdmin.email.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Email address *</label>
          <div class="col-sm-10">
            <input type="email" name="email" ng-model="form.email" class="form-control ng-dirty ng-valid-required ng-invalid ng-invalid-email" placeholder="Email address" ng-required="$root.dashboardData.emailIsMandatory == '1'" required="required">
          </div>
        </div>
		<br/><br/><br/>
        <div class="form-group has-error" ng-class="{'has-error': addAdmin.password.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Password *</label>
          <div class="col-sm-10">
            <input type="password" name="password" ng-model="form.password" class="form-control ng-dirty ng-invalid ng-invalid-required" required="" placeholder="Password">
          </div>
        </div>
		<br/><br/><br/>
        <div class="form-group">
		<br/>
		 <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Gender *</label>
         <div class="row">
		 
                                <div class="col-sm-1">
                                           <div class="radio">
												<label>
													<input type="radio" name="gender" value="male"><i class="helper"></i>Male
												</label>
											</div>
                                </div>
                                <div class="col-sm-1">
                                           <div class="radio">
												<label>
													<input type="radio" name="gender" value="female"><i class="helper"></i>Female
												</label>
											</div>
                                  
                                    </div>
                            </div>
        </div>
		<br/><br/><br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Birthday</label>
          <div class="col-sm-10">
            <input type="date" id="datemask" name="birthday" ng-model="form.birthday" class="form-control datemask ng-pristine ng-valid">
          </div>
        </div>
		<br/><br/><br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Address</label>
          <div class="col-sm-10">
            <input type="text" name="address" class="form-control ng-pristine ng-valid" ng-model="form.address" placeholder="Address">
          </div>
        </div>
		<br/><br/><br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Phone No</label>
          <div class="col-sm-10">
            <input type="text" name="phone" class="form-control ng-pristine ng-valid" ng-model="form.phoneNo" placeholder="Phone No" international-phone-number="">
          </div>
        </div>
       <br/><br/><br/>
        <div class="form-group has-error" ng-class="{'has-error': addAdmin.studentClass.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Class</label>
          <div class="col-sm-10">
            <select class="form-control ng-pristine ng-invalid ng-invalid-required" name="class" required>
			<option value="">Select Class</option>
             <?php
									 $teacher=$obj->Get_All_Data("select * from class");
									 for($i=0;$i<count($teacher);$i++){
									 ?>
									<option value="<?php echo $teacher[$i]['cl_id'] ?>"><?php echo $teacher[$i]['clname'] ?></option>
								
								 <?php  } ?>
            </select>
          </div>
        </div>
		<br/><br/><br/>
        <div class="form-group has-error" ng-class="{'has-error': addAdmin.studentSection.$invalid}" ng-show="$root.dashboardData.enableSections == '1'">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Section name *</label>
          <div class="col-sm-10">
            <select class="form-control ng-pristine" name="section" required="required">
			<option value="0">Select Section</option>
              <?php
									 $teacher=$obj->Get_All_Data("select * from section");
									 for($i=0;$i<count($teacher);$i++){
									 ?>
									<option value="<?php echo $teacher[$i]['sec_id'] ?>"><?php echo $teacher[$i]['sec_name'] ?></option>
								
								 <?php  } ?>
            </select>
          </div>
        </div>
		<br/><br/><br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Transportation</label>
          <div class="col-sm-10">
            <select class="form-control ng-pristine ng-valid" name="transport" ng-model="form.transport"><option value="0">Select Transportation</option>
              <?php
									 $teacher=$obj->Get_All_Data("select * from transportation");
									 for($i=0;$i<count($teacher);$i++){
									 ?>
									<option value="<?php echo $teacher[$i]['t_id'] ?>"><?php echo $teacher[$i]['title'] ?></option>
								
								 <?php  } ?>
            </select>
          </div>
        </div>
		<br/><br/><br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Hostel</label>
          <div class="col-sm-10">
            <select class="form-control ng-pristine ng-valid" name="hostel" ng-model="form.hostel"><option value="0">Select Hostel</option>
              <!-- ngRepeat: (key,value) in hostel --><option ng-repeat="(key,value) in hostel" value="1" class="ng-binding ng-scope">Building 13 - 5 Starsdd</option><!-- end ngRepeat: (key,value) in hostel --><option ng-repeat="(key,value) in hostel" value="2" class="ng-binding ng-scope">Building 2 - 4 Stars</option><!-- end ngRepeat: (key,value) in hostel -->
            </select>
          </div>
        </div>
		<br/><br/><br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Photo</label>
          <div class="col-sm-10">
            <input type="file" name="photo">
          </div>
        </div>
		<br/><br/><br/>
        <div class="form-group">
           <div class="col-sm-12">
           <input type="hidden" name="create_student"/>
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
									if(response ==='Student Saved Successfully')
									{
									notify("top", "center","", "success", "animated rotateInDownRight","animated rotateOutUpRight",response,"Successful");
									var delay = 3000;
										setTimeout((function(){ window.location.reload()}), delay);  
									}else
									{
									$('#ring').hide();
									notify("top", "center","", "danger", "animated rotateInDownRight","animated rotateOutUpRight",response," Failed");	
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
	