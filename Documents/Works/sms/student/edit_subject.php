<?php  
include('header.php');

if(isset($_GET['sub_id'])){
	$data=$obj->Get_All_Data("select * from subject where sub_id=".$_GET['sub_id']."");
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
                                    <li class="breadcrumb-item"><a href="add_subject.php">Subject</a></li>
                                    <li class="breadcrumb-item"><a href="edit_subject.php">Edit Subject</a></li>
                             
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Add Subject</h5>
                            <div class="f-right">
                              <a href="subject_list.php" class="btn btn-info waves-effect" data-type="info">View Subject</a>
                            </div>
                        </div>
                        <div class="card-block">
                              <form class="form-horizontal ng-pristine ng-invalid ng-invalid-required" name="addDorm" role="form" id="form_data">
        <div class="form-group has-error" ng-class="{'has-error': addDorm.subjectTitle.$invalid}">
          <label for="inputEmail3">Subject name * </label>
          <div class="col-sm-12">
		   <div class="md-input-wrapper">
		    <input type="hidden" name="sub_id" value="<?php echo $data[0]['sub_id'] ?>"required>
		   
		   
            <input type="text" name="subjectTitle" ng-model="form.subjectTitle" class="form-control ng-pristine ng-invalid ng-invalid-required md-form-control md-static" value="<?php echo $data[0]['subject_name'] ?>" placeholder="Subject name" required> </div>
          </div>
        </div>
        <div class="form-group has-error" ng-class="{'has-error': addDorm.teacherId.$invalid}">
          <label for="inputPassword3">Teacher *</label>
          <div class="col-sm-12">
            <select class="form-control ng-pristine ng-invalid ng-invalid-required md-form-control md-static" ng-model="form.teacherId" name="teacherId[]" required multiple>
            <option value="1">Peter</option>
									<option value="2">Hanry Die</option>
									<option value="3">John Doe</option>
			
            </select>
          </div>
        </div>
        <div class="form-group has-error" ng-class="{'has-error': addDorm.passGrade.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Pass grade * </label>
          <div class="col-sm-12">
		   <div class="md-input-wrapper">
            <input type="text" name="passGrade" ng-model="form.passGrade" class="form-control ng-pristine ng-invalid ng-invalid-required md-form-control md-static" required placeholder="Pass grade" value="<?php echo $data[0]['pass_grade'] ?>" ></div>
          </div>
        </div>
        <div class="form-group has-error" ng-class="{'has-error': addDorm.finalGrade.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Final grade * </label>
          <div class="col-sm-12">
            <input type="text" name="finalGrade" ng-model="form.finalGrade" class="form-control ng-pristine ng-invalid ng-invalid-required md-form-control md-static" required placeholder="Final grade" value="<?php echo $data[0]['final_grade'] ?>">
          </div>
        </div>
        <div class="form-group">
		
          <div class=" col-sm-12">
		  <br/>
		  <input type="hidden" name="edit_subject">
							<button type="submit" class="btn btn-block btn-primary waves-effect waves-light m-r-10" data-toggle="tooltip" id="reg" data-placement="top" title="" data-original-title="Submit To Save">Submit  <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center>	 </button>
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
									if(response ==='Subject Updated Successfully')
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
						</script>