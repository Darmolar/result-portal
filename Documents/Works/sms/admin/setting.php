<?php  
include('header.php');
	$fetch_settings=$obj->Get_All_Data("select * from settings where admin_id=".$_SESSION['uid']."");
?>

<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index-2.html"><i class="icofont icofont-home"></i></a>
                                    </li>
                                     <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="add_teacher.php"> System Configuration</a></li>
                                   
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Add Some Configuration</h5>
                          
                        </div>
                        <div class="card-block">
							<form class="form-horizontal" id="form_data" method="post" enctype="multipart/form-data" encoding="multipart/form-data">
        <div class="form-group has-error">
          <label for="inputEmail3" class="col-sm-2">Application Name</label>
          <div class="col-sm-10">
            <input type="text" name="app_name" value="<?php echo $fetch_settings[0]['school_name'];  ?>" class="form-control" required placeholder="Application Name">
          </div>
        </div>
		<br/><br/><br/>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">School Description</label>
          <div class="col-sm-10">
            <input type="text" name="desc" value="<?php echo $fetch_settings[0]['description'];  ?>" class="form-control" placeholder="Description">
          </div>
        </div>
		<br/><br/><br/>
        <div class="form-group has-error">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Current Session * </label>
          <div class="col-sm-10">
            <input type="text" name="session" ng-model="form.username" class="form-control" value="<?php echo $fetch_settings[0]['current_session'];  ?>" required="" placeholder="Session">
          </div>
        </div>
		<br/><br/><br/>
        <div class="form-group has-error" >
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Current Term *</label>
          <div class="col-sm-10">
            <input type="text" name="term" ng-model="form.email" value="<?php echo $fetch_settings[0]['current_term'];  ?>" class="form-control" placeholder="Current Term" required="required">
          </div>
        </div>
		
		<br/><br/><br/>
     
		
		<br/><br/><br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Logo</label>
          <div class="col-sm-10">
            <input type="file" name="logo">
			
			<img src="../uploads/admin/<?php echo sha1($_SESSION['email'])."/".$fetch_settings[0]['logo']; ?>" width="200"/>
          </div>
        </div>
		<br/><br/><br/>
        <div class="form-group">
           <div class=" col-md-2"></div>
           <div class=" col-md-10">
           <input type="hidden" name="configure"/>
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
									if(response ==='! Setting Saved Successfully')
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
	