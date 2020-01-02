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
                                    <li class="breadcrumb-item"><a href="assignment.php">Assignment </a></li>
                             
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Add Assignment</h5>
                            <div class="f-right">
                              <a href="assignment_list.php" class="btn btn-info waves-effect" data-type="info">View Assignments</a>
                            </div>
                        </div>
                        <div class="card-block">
              <form class="form-horizontal" name="addDorm" role="form" method="post"  enctype="multipart/form-data" encoding="multipart/form-data" id="form_data">
        <div class="form-group has-error" ng-class="{'has-error': addDorm.AssignTitle.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Assignment title * </label>
          <div class="col-sm-10">
            <input type="text" name="title" ng-model="form.AssignTitle" class="form-control" required="" placeholder="Assignment title">
          </div>
        </div>
		<br/><br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2">Assignment Description</label>
          <div class="col-sm-10">
            <textarea name="desc" class="form-control"  placeholder="Assignment Description"></textarea>
          </div>
        </div>
			<br/><br/>
        <div class="form-group has-error">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Assignment Deadline *</label>
          <div class="col-sm-10">
            <input date-picker="" type="date" id="datemask" name="deadLine" required="" class="form-control">
          </div>
        </div>
			<br/><br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Assignment File</label>
          <div class="col-sm-10">
            <input type="file" name="file" id="AssignAddFile">
          </div>
        </div>
			<br/><br/>
        <div class="form-group has-error">
          <label for="inputPassword3" class="col-sm-2 control-label">Class *</label>
          <div class="col-sm-10">
            <select class="form-control" name="classId[]"  multiple="" required="">
            
			<option value="" >Select Class</option>
			<?php
			$class=$obj->Get_All_Data("select * from class");
			for($i=0;$i<count($class);$i++){
			?>
			<option value="<?php echo $class[$i]['cl_id'] ?>" ><?php echo $class[$i]['clname'] ?></option>
			
			<?php  
			}
			?>
	
            </select>
          </div>
        </div>
			<br/><br/>
			<br/><br/>
			<br/><br/>
        <div class="form-group has-error" ng-class="{'has-error': addDorm['sectionId[]'].$invalid}" ng-show="$root.dashboardData.enableSections == '1'">
          <label for="inputPassword3" class="col-sm-2 control-label">Section *</label>
          <div class="col-sm-10">
            <select class="form-control ng-pristine ng-invalid ng-invalid-required" ng-model="form.sectionId" name="sectionId[]" multiple=""  required="required">
              <!-- ngRepeat: section in sections -->
			  	<option value="" >Select Section</option>
			<?php
			$section=$obj->Get_All_Data("select * from section");
			for($i=0;$i<count($section);$i++){
			?>
			<option value="<?php echo $section[$i]['sec_id'] ?>" ><?php echo $section[$i]['sec_name'] ?></option>
			
			<?php  
			}
			?>
            </select>
          </div>
        </div>
		
				<br/><br/>
			<br/><br/>
			<br/><br/>
        <div class="form-group has-error" ng-class="{'has-error': addDorm.subjectId.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Subject *</label>
          <div class="col-sm-10">
            <select class="form-control" ng-model="form.subjectId" required="" name="subjectId">
			<?php
			$sub=$obj->Get_All_Data("select * from subject");
			for($i=0;$i<count($sub);$i++){
			?>
			<option value="<?php echo $sub[$i]['sub_id'] ?>" ><?php echo $sub[$i]['subject_name'] ?></option>
			
			<?php  
			}
			?>
            </select>
          </div>
        </div>
				<br/><br/>
			<br/><br/>
			<br/><br/>
        <div class="form-group">
          <div class="col-sm-12">
           <input type="hidden" name="create_assignment">
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
									if(response ==='Assignment Created Successfully')
									{
									notify("top", "center","", "success", "animated rotateInDownRight","animated rotateOutUpRight", response ,"Successful");
									var delay = 3000;
										setTimeout((function(){ window.location.reload() }), delay);  
									}else
									{
									$('#ring').hide();
									notify("top", "center","", "danger", "animated rotateInDownRight","animated rotateOutUpRight", response ,"Failed");	
									}
									}
								});
									$('#reg').attr('disabled',true);
									$('#ring').hide();
							});
												
						</script>
                          </div>
                        </div>
                    </div>
                </div>


</div>
		