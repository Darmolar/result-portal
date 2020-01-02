<?php  
include('header.php');


$stm_id=base64_decode($_GET['stm_id']);

$data=$obj->Get_All_Data("select * from study_material
 JOIN class on class.cl_id=study_material.class
 JOIN section on section.sec_id=study_material.section where stm_id=$stm_id");
//print_r($data);
?>

<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index-2.html"><i class="icofont icofont-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="add_class.php">Study Materials</a></li>
                                    <li class="breadcrumb-item"><a href="study_material_list.php">Study Materials List</a></li>
                                    <li class="breadcrumb-item"><a href="edit_study_material.php">Edit Study Materials</a></li>
                             
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Add Study Material</h5>
                            <div class="f-right">
                              <a href="study_material_list.php" class="btn btn-info waves-effect" data-type="info">View Study Material</a>
                            </div>
                        </div>
                        <div class="card-block">
                            
							<form class="form-horizontal" name="addDorm" role="form" method="post" enctype="multipart/form-data" encoding="multipart/form-data" id="form_data">
        <div class="form-group has-error">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Material Title * </label>
          <div class="col-sm-10">
            <input type="hidden" name="stm_id" ng-model="form.material_title" class="form-control" value="<?php echo $stm_id; ?>">
			
			
            <input type="text" name="material_title" ng-model="form.material_title" class="form-control ng-pristine ng-invalid ng-invalid-required" required="" placeholder="Material Title" value="<?php echo $data[0]['title']; ?>">
          </div>
        </div>
		<br>
		<br>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Material Description</label>
          <div class="col-sm-10">
            <textarea name="material_description" class="form-control ng-pristine ng-valid" ng-model="form.material_description" placeholder="Material Description"><?php echo $data[0]['desc']; ?></textarea>
          </div>
        </div>
		<br>
		<br>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Material file</label>
          <div class="col-sm-10">
            <input type="file" name="material_file" id="material_add_file">
          </div>
        </div>
		<br>
        <div class="form-group has-error">
          <label for="inputPassword3" class="col-sm-2 control-label">Class *</label>
          <div class="col-sm-10">
            <select class="form-control ng-pristine ng-invalid ng-invalid-required" ng-model="form.class_id" name="class_id[]" multiple="" required="">
			<option value="<?php echo $data[0]['cl_id'] ?>"><?php echo $data[0]['clname'] ?></option>
              <?php
					$teacher=$obj->Get_All_Data("select * from class");
									 for($i=0;$i<count($teacher);$i++){
									 ?>
									<option value="<?php echo $teacher[$i]['cl_id'] ?>"><?php echo $teacher[$i]['clname'] ?></option>
								
								 <?php  } ?>
            </select>
          </div>
        </div>
		<br>
		<br><br>
        <div class="form-group has-error">
		 <br>
		<br>
          <label for="inputPassword3" class="col-sm-2 control-label">Sections *</label>
          <div class="col-sm-10">
            <select class="form-control ng-pristine ng-invalid ng-invalid-required" ng-model="form.sectionId" name="sectionId" multiple="" ng-required="$root.dashboardData.enableSections == '1'" required="required">
			
			<option value="<?php echo $data[0]['sec_id'] ?>"><?php echo $data[0]['sec_name'] ?></option>
			
               <?php
									 $teacher=$obj->Get_All_Data("select * from section");
									 for($i=0;$i<count($teacher);$i++){
									 ?>
									<option value="<?php echo $teacher[$i]['sec_id'] ?>"><?php echo $teacher[$i]['sec_name'] ?></option>
								
								 <?php  } ?>
            </select>
          </div>
        </div>
		<br>
		<br>
       <div class="form-group">
	  
          <div class="col-sm-12">
		   <br>
		<br>
           	<input type="hidden" name="edit_material">
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
									if(response ==='Study Material Updated Successfully')
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