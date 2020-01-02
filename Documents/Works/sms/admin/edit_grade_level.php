<?php  
include('header.php');


if(isset($_GET['id'])){
	$id=base64_decode($_GET['id']);
	$data=$obj->Get_All_Data("select * from gradelevels where grade_level_id=$id");
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
                                    <li class="breadcrumb-item"><a href="gradelevel.php">Grade Level </a></li>
                                    <li class="breadcrumb-item"><a href="gradelevel_list.php">Grade Level List</a></li>
                                    <li class="breadcrumb-item"><a href="edit_grade_level.php">Edit Grade Level</a></li>
                             
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Add Grade Level</h5>
                            <div class="f-right">
                              <a href="gradelevel_list.php" class="btn btn-info waves-effect" data-type="info">View Grade Level List</a>
                            </div>
                        </div>
                        <div class="card-block">
                           <form class="form-horizontal" name="addGrade" role="form" id="form_data">
        <div class="form-group has-error">
          <label for="inputEmail3" class="col-sm-2 control-label">Grade Name * </label>
          <div class="col-sm-10">
            <input type="hidden" name="id" class="form-control"  value="<?php  echo $data[0]['grade_level_id'] ?>">
            <input type="text" name="gradeName" class="form-control" required="" placeholder="Grade Name" value="<?php  echo $data[0]['gradeName'] ?>">
          </div>
        </div>
		<br/><br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Grade Description</label>
          <div class="col-sm-10">
            <textarea name="gradeDesc" class="form-control" placeholder="Grade Description"><?php  echo $data[0]['gradeDescription'] ?></textarea>
          </div>
        </div>
		<br/><br/>
        <div class="form-group has-error">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Grade Point *</label>
          <div class="col-sm-10">
            <input type="text" name="gradePoints"class="form-control" required="" placeholder="Grade Point" value="<?php  echo $data[0]['gradePoints'] ?>">
          </div>
        </div>
		<br/><br/>
        <div class="form-group has-error">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Grade From *</label>
          <div class="col-sm-10">
            <input type="text" name="gradeFrom" class="form-control" required="" placeholder="Grade From" value="<?php  echo $data[0]['gradeFrom'] ?>">
          </div>
        </div>
		<br/><br/>
        <div class="form-group has-error">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Grade To</label>
          <div class="col-sm-10">
            <input type="text" name="gradeTo" ng-model="form.gradeTo" class="form-control" required="" placeholder="Grade To" value="<?php  echo $data[0]['gradeTo'] ?>">
          </div>
        </div>
		<br/><br/>
        <div class="form-group">
          <div class="col-sm-12">
           <input type="hidden" name="edit_gradelevel">
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
									if(response ==='Grade Level Updated Successfully')
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
		