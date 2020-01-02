 <div class="md-modal md-effect-9" id="modal-9">
                                <div class="md-content">
                                    <h3>Choose Class And Subject</h3>
                                    <div>
                                        <p>Please Select Class And Subject</p>
                 	
   <form class="form-horizontal"  method="post" name="addAdmin" role="form" action="grade.php" enctype="multipart/form-data">	
          <div class="form-group" ng-class="{'has-error': attendance.classId.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Class *</label>
          <div class="col-sm-10">
		  <input type="hidden" name="exam_list" value="<?php echo $trans[$i]['id']; ?>" />
           <select class="form-control ng-pristine ng-invalid ng-invalid-required" name="class"  onchange="Get_Subject(this.value);" required>
		   
			<option value="">Select Class</option>
             <?php
									 $teacher=$obj->Get_All_Data("select * from class");
									 for($j=0;$j<count($teacher);$j++){
									 ?>
									<option value="<?php echo $teacher[$j]['cl_id'] ?>"><?php echo $teacher[$j]['clname'] ?></option>
								
								 <?php  } ?>
            </select>
			<div class="alert1"  style="display:none;" ><img width="30" id="ring1" src="../assets/images/ring.gif" />Working... </div>
          </div>
        </div>
		<br/>
		<br/>
			<div class="alert2"  style="display:none;" ><img width="30" id="ring1" src="../assets/images/ring.gif" />Working... </div>
        <div class="form-group" ng-show="attendanceModel == 'subject'" ng-class="{'has-error': attendance.subjectId.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Subject *</label>
          <div class="col-sm-10">
            <select class="form-control ng-dirty ng-valid ng-valid-required" name="subjectId" id="subject" required="required">
           
            </select>
          </div>
		   <br/>
		<br/>
        </div>
		 <br/>
		<br/>   <br/>
		<br/>
                           
		    <button type="submit" name="fetch_student" id="upload_btn" class="btn  btn-primary waves-effect">Submit <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center></button>
		  </form>
                                    <br/>
		<br/>
                                        <button type="button" class="btn btn-primary waves-effect md-close">Close</button>
                                    </div>
                                </div>
                            </div>

							

</div>



<script>


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