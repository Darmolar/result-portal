<?php  
include('header.php');

if(isset($_GET['uid'])){
	$uid=base64_decode($_GET['uid']);
	$data=$obj->Get_All_Data("select * from teacher where uid='$uid'");
}
//print_r($data);
?>

<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index-2.html"><i class="icofont icofont-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="teachers_list.php">Teachers List</a></li>
                                    <li class="breadcrumb-item"><a href="edit_teacher.php">Edit Teacher</a></li>
                             
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Edit Teacher</h5>
                            <div class="f-right">
                              <a href="teachers_list.php" class="btn btn-info waves-effect" data-type="info">View Teacher</a>
                            </div>
                        </div>
                        <div class="card-block">
                             
							 <form class="form-horizontal"  method="post" name="addAdmin" role="form" novalidate="" id="form_data" enctype="multipart/form-data" encoding="multipart/form-data">
					
        <div class="form-group has-error">
          <label for="inputEmail3" class="control-label ng-binding">Full name * </label>
          <div class="col-sm-12">
            <input type="hidden" name="uid" ng-model="form.fullName" class="form-control md-form-control" required="" placeholder="Full name" value="<?php  echo $data[0]['uid']; ?>"/>
            <input type="text" name="fname" ng-model="form.fullName" class="form-control md-form-control" required="" placeholder="Full name" value="<?php  echo $data[0]['fname']; ?>"/>
          </div>
        </div>
		<br/>
        <div class="form-group has-error" ng-class="{'has-error': addAdmin.username.$invalid}">
          <label for="inputEmail3" class="control-label ng-binding">Username * </label>
          <div class="col-sm-12">
            <input type="text" name="username" class="form-control md-form-control" placeholder="Username" value="<?php  echo $data[0]['username']; ?>" readonly/>
          </div>
		  <br/>
        </div>
        <div class="form-group has-error" >
          <label for="inputPassword3" class="md-form-control">Email address *</label>
          <div class="col-sm-12">
            <input type="email" name="email" ng-model="form.email" class="form-control md-form-control" placeholder="Email address" required="" value="<?php  echo $data[0]['email']; ?>" readonly>
          </div>
		  <br/>
        </div>
        <div class="form-group has-error" ng-class="{'has-error': addAdmin.password.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Password *</label>
          <div class="col-sm-12">
            <input type="password" name="password" class="form-control md-form-control" required="" placeholder="Password" value="<?php  echo $data[0]['password']; ?>">
          </div>
		  <br/>
        </div>
        <div class="form-group">
		<br/>
		 <label for="inputPassword3" class="control-label ng-binding">Gender *</label>
         <div class="row">
		 
                                <div class="col-sm-1">
                                           <div class="radio">
												<label>
													<input type="radio" name="gender" value="Male" <?php  if(strtolower($data[0]['gender'])=="male") echo 'checked'; ?>><i class="helper"></i>Male
												</label>
											</div>
                                </div>
                                <div class="col-sm-1">
                                           <div class="radio">
												<label>
													<input type="radio" name="gender" value="Female" <?php  if(strtolower($data[0]['gender'])=="female") echo 'checked'; ?>><i class="helper"></i>Female
												</label>
											</div>
                                  
                                    </div>
                            </div>
        </div>
        <div class="form-group">
		<br/>
          <label for="inputPassword3" class="control-label ng-binding">Birthday</label>
          <div class="col-sm-12">
            <input type="date" name="birthday"  class="form-control md-form-control" value="<?php  echo $data[0]['bday']; ?>">
          </div>
        </div>
        <div class="form-group">
		<br/>
          <label for="inputPassword3" class="control-label ng-binding">Address</label>
          <div class="col-sm-12">
            <input type="text" name="address" class="form-control md-form-control" ng-model="form.address" placeholder="Address" value="<?php  echo $data[0]['add']; ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="control-label ng-binding">Phone No</label>
          <div class="col-sm-12">
            <input type="text" name="phone" class="form-control md-form-control" ng-model="form.phoneNo" placeholder="Phone No" value="<?php  echo $data[0]['phone']; ?>">
          </div>
        </div>
   <br/><br/>
        <div class="form-group">
		<br/>
          <label for="inputPassword3" class="control-label ng-binding">Transportation</label>
          <div class="col-sm-12">
            <select class="form-control md-form-control" name="transport" >
			<option value="0">Select Transport</option>
          <?php
									 $teacher=$obj->Get_All_Data("select * from transportation");
									 for($i=0;$i<count($teacher);$i++){
									 ?>
									<option value="<?php echo $teacher[$i]['t_id'] ?>"><?php echo $teacher[$i]['title'] ?></option>
								
								 <?php  } ?>
		
            </select>
          </div>
        </div>
		 <br/><br/>
        <div class="form-group">
		<br/>
          <label for="inputPassword3" class="control-label ng-binding">Photo</label>
          <div class="col-sm-12">
            <input type="file" name="photo">
          </div>
        </div>
		 <br/><br/>
        <div class="form-group">
          <div class="col-sm-12">
           <input type="hidden" name="edit_teacher"/>
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
									if(response ==='Teacher Updated Successfully')
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
									$('#reg').attr('disabled',true);
									$('#ring').hide();
							});
												
						</script>