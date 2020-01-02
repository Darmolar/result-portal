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
                                    <li class="breadcrumb-item"><a href="online_exam.php">Online Exam</a></li>
                                 
                             
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Add Exam</h5>
                            <div class="f-right">
                              <a href="online_exam_list.php" class="btn btn-info waves-effect" data-type="info">View Exam(s)</a>
                            </div>
                        </div>
                        <div class="card-block">
                           <form class="form-horizontal" name="addExam" role="form" id="form_data">
        <div class="form-group" ng-class="{'has-error': addExam.examTitle.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Exam Name * </label>
          <div class="col-sm-10">
            <input type="text" name="examTitle" ng-model="form.examTitle" class="form-control ng-pristine ng-invalid ng-invalid-required" required="" placeholder="Exam Name">
          </div>
		  <br/>
		  <br/>
        </div>
		
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Exam Description</label>
          <div class="col-sm-10">
            <textarea name="examDescription" class="form-control"  placeholder="Exam Description"></textarea>
          </div>
		   <br/>
		  <br/>
        </div>
		<br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Class *</label>
          <div class="col-sm-10">
            <select class="form-control"  name="examClass[]" multiple="" required="" onchange="Get_Section(this.value); Get_Subject(this.value)" >
			  <option value="0">Select Class</option>
               <?php
									 $teacher=$obj->Get_All_Data("select * from class");
									 for($i=0;$i<count($teacher);$i++){
									 ?>
									<option value="<?php echo $teacher[$i]['cl_id'] ?>"><?php echo $teacher[$i]['clname'] ?></option>
								
								 <?php  } ?>
            </select>
          </div>
		    <br/>
		  <br/>
        </div>
		 <br/>
		  <br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Section name *</label>
          <div class="col-sm-10">
            <select class="form-control" ng-model="form.sectionId" id="section" name="sectionId[]" multiple="" required="required">
             <option value="0">Select Section</option>
             
            </select>
          </div>
		    <br/>
		  <br/>
        </div>
		 <br/>
		  <br/>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Subject *</label>
          <div class="col-sm-10">
            <select class="form-control" ng-model="form.examSubject" id="subject" required="" name="examSubject">
             
            </select>
          </div>
		    <br/>
		  <br/>
        </div>
		 <br/>
		  <br/>
        <div class="form-group has-error">
          <label for="inputPassword3" class="col-sm-2 control-label">Start Time *</label>
          <div class="col-sm-10">
            <input type="text" date-picker="" id="datemask" name="examDate" ng-model="form.examDate" required="" class="form-control datemask">
          </div>
        </div>
		 <br/>
		  <br/>
        <div class="form-group has-error">
          <label for="inputPassword3" class="col-sm-2 control-label">End Time *</label>
          <div class="col-sm-10">
            <input type="text" id="datemask" name="ExamEndDate" required="" class="form-control datemask">
          </div>
		 
        </div>
		 <br/>
		  <br/>
        <div class="form-group has-error" ng-class="{'has-error': addExam.examTimeMinutes.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Allowed exam time in miuntes (0 for unlimited) *</label>
          <div class="col-sm-10">
            <input type="text" name="examTimeMinutes" ng-model="form.examTimeMinutes" required="" class="form-control ng-pristine ng-invalid ng-invalid-required">
          </div>
        </div>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Extras</label>
          <div class="col-sm-10 ng-binding">
            <input type="checkbox" name="grade" ng-model="form.ExamShowGrade" value="1" class="ng-valid ng-dirty"/> Show grade after finish exams
          </div>
        </div>
        <div class="form-group">
		<div class="col-sm-2"></div>
          <div class="col-sm-10">
            	<input type="hidden" name="create_online_exam">
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
									if(response ==='Exam Created Successfully')
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
								

										
										
								function Get_Section(classid){
								$('.alert1').show();
								$.ajax({
																type:"GET",
																url:"../controller/controller.php?get_section&class="+classid,
																success: function(response){
																		$('.alert1').hide();
																		$('#section').empty()
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
											$('#subject').empty()
											
									$('#subject').append(response);
									}
								});
	
												}
 
						</script>
                          </div>
                        </div>
                    </div>
                </div>


</div>
		