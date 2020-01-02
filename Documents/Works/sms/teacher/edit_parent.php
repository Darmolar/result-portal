<?php  
include('header.php');
$pid=base64_decode($_GET['pid']);
 $trans=$obj->Get_All_Data("select * from parent where pid=$pid");
 
 $data=json_decode($trans[0]['data'],true);
 //print_r($data);
?>

<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index-2.html"><i class="icofont icofont-home"></i></a>
                                    </li>
                                     <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="add_parent.php"> Add Parent</a></li>
                                    <li class="breadcrumb-item"><a href="parents_list.php"> List Parent</a></li>
                                    <li class="breadcrumb-item"><a href="edit_parent.php"> Edit Parent</a></li>
                                   
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Add Parents</h5>
                           <div class="f-right">
                              <a href="parents_list.php" class="btn btn-info waves-effect" data-type="info">View Parents</a>
                            </div>
                        </div>
                        <div class="card-block">
							<form class="form-horizontal" ng-upload="saveAdd(content)" method="post" action="parents" id="form_data" enctype="multipart/form-data" encoding="multipart/form-data">
        <div class="form-group has-error" ng-class="{'has-error': addAdmin.fullName.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Full name * </label>
          <div class="col-sm-10">
            <input type="hidden" name="pid" class="form-control" value="<?php echo $pid  ?>">
            <input type="text" name="fullName" ng-model="form.fullName" class="form-control" required="" placeholder="Full name" value="<?php if(isset($data['fullName'])) { echo $data['fullName']; }  ?>">
          </div>
        </div>
		<br/> <br/>
        <div class="form-group has-error" ng-class="{'has-error': addAdmin.username.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Username * </label>
          <div class="col-sm-10">
            <input type="text" name="username" ng-model="form.username" class="form-control ng-pristine ng-invalid ng-invalid-required" required="" placeholder="Username" value="<?php if(isset($data['username'])) { echo $data['username']; }  ?>" readonly />
          </div>
        </div>
		<br/> <br/>
        <div class="form-group has-error" ng-class="{'has-error': addAdmin.email.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Email address *</label>
          <div class="col-sm-10">
            <input type="email" name="email" ng-model="form.email" class="form-control ng-dirty ng-valid-required ng-invalid ng-invalid-email" placeholder="Email address" required="" value="<?php if(isset($data['email'])) { echo $data['email']; }  ?>" readonly />
          </div>
        </div>
		<br/> <br/>
        <div class="form-group has-error" ng-class="{'has-error': addAdmin.password.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Password *</label>
          <div class="col-sm-10">
            <input type="password" name="password" ng-model="form.password" value="<?php if(isset($data['fullName'])) { echo $data['fullName']; }  ?>" class="form-control ng-dirty ng-invalid ng-invalid-required" placeholder="Password">
          </div>
        </div>
		<br/> <br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Gender</label>
          <div class="col-sm-10">

          <select name="gender" class="form-control" >
		  <option value="<?php if(isset($data['gender'])) { echo $data['gender']; }  ?>"><?php if(isset($data['gender'])) { echo $data['gender']; }  ?></option>
		  <option value="male" >Male</option>
		  <option value="female" >Female</option>
		  
		  </select>

          </div>
        </div>
		<br/> <br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Birthday</label>
          <div class="col-sm-10">
            <input type="date" date-picker="" id="datemask" name="birthday" ng-model="form.birthday" class="form-control datemask ng-pristine ng-valid" value="<?php if(isset($data['birthday'])) { echo $data['birthday']; }  ?>">
          </div>
        </div>
		<br/> <br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Address</label>
          <div class="col-sm-10">
            <input type="text" name="address" class="form-control ng-pristine ng-valid" ng-model="form.address" placeholder="Address" value="<?php if(isset($data['address'])) { echo $data['address']; }  ?>">
          </div>
        </div>
		<br/> <br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Phone No</label>
          <div class="col-sm-10">
            <input type="text" name="phoneNo" class="form-control ng-pristine ng-valid" ng-model="form.phoneNo" placeholder="Phone No" value="<?php if(isset($data['phoneNo'])) { echo $data['phoneNo']; }  ?>">
          </div>
        </div>
		<br/> <br/>
        <div class="form-group" ng-class="{'has-error': addAdmin.mobileNo.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Mobile No</label>
          <div class="col-sm-10">
          <input type="text" name="mobileNo" class="form-control ng-pristine ng-valid" ng-model="form.phoneNo" placeholder="Mobile No" value="<?php if(isset($data['phoneNumber'])) { echo $data['phoneNo']; }  ?>">
          </div>
        </div>
		<br/> <br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Profession</label>
          <div class="col-sm-10">
            <input type="text" name="parentProfession" class="form-control ng-pristine ng-valid" ng-model="form.parentProfession" placeholder="Profession" value="<?php if(isset($data['parentProfession'])) { echo $data['parentProfession']; }  ?>">
          </div>
        </div>
		<br/> <br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Photo</label>
          <div class="col-sm-10">
            <input type="file" name="photo">
          </div>
        </div>
		<br/> <br/>
      
        <div class="form-group">
          <div class="col-sm-12">
           <input type="hidden" name="edit_parent">
		<button type="submit" class="btn btn-block btn-primary waves-effect" data-toggle="tooltip" id="reg" data-placement="top" title="" data-original-title="Submit To Save">Submit  <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center>	 </button>
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
									if(response ==='Parent Updated Successfully')
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
	
	