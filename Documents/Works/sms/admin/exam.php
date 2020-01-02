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
                                    <li class="breadcrumb-item"><a href="exam.php">Exam</a></li>
                                    <li class="breadcrumb-item"><a href="exam_list.php">Exam List</a></li>
                             
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Add Exam List</h5>
                            <div class="f-right">
                              <a href="exam_list.php" class="btn btn-info waves-effect" data-type="info">View Exam List</a>
                            </div>
                        </div>
                        <div class="card-block">
                              <form class="form-horizontal ng-pristine ng-invalid ng-invalid-required" name="addExam" role="form" id="form_data">
        <div class="form-group has-error" ng-class="{'has-error': addExam.examTitle.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Exam Name * </label>
          <div class="col-sm-10">
            <input type="text" name="examTitle" ng-model="form.examTitle" class="form-control ng-pristine ng-invalid ng-invalid-required" required="" placeholder="Exam Name" required>
          </div>
		  <br/>
		  <br/>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Exam Description</label>
          <div class="col-sm-10">
            <textarea name="examDescription" class="form-control" ng-model="form.examDescription" placeholder="Exam Description" required></textarea>
          </div>
		 <br/>
		  <br/>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2">Classes</label>
          <div class="col-sm-10">
              <select class="form-control" name="examClasses[]" multiple="" required>
                
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
        <div class="form-group has-error" ng-class="{'has-error': addExam.examDate.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Date *</label>
          <div class="col-sm-10">
            <input type="date" date-picker="" name="examDate" ng-model="form.examDate" class="form-control datemask ng-pristine ng-invalid ng-invalid-required" required="">
           
          </div>
		  <br/>
		  <br/>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Marksheet Fields *</label>
          <div class="col-sm-10" id="sheet">
              <div class="row">
                  <div class="col-md-2">
				   <input type="hidden" name="create_exam">
                      <button type="button" class="btn btn-warning" id="add_field" onclick="add_field_prompt()">Add Column</button>
                  </div>
		  <div class="col-xs-12"> 
		  <label for="fieldUser" >Sheet Field</label>
		   <div id="highschool">
						<div>
		 </div>		

		 </div> 
		
		
		 </div>
              </div>
          </div>
		  <br/>
		  <br/>
        </div>
        <div class="form-group">
          <center><div class="col-sm-12 ">
            <button type="submit" class="btn btn-primary btn-block">Add exam  <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center>	</button>
          </div></center>
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
						
						function add_field_prompt(){
							var name=prompt("Please Enter Field Name");
							Add_Fields("highschool","add_field",name)
						}
 
						function Add_Fields(wrapper_div,add_btn,nam) {
								
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(wrapper_div); //Fields wrapper
    var add_button      = $(add_btn); //Add button ID
    
    var x = 1; //initlal text box count
   //on add input button click
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
			
            $('#highschool').append('<div><div class="col-xs-12"> <label for="fieldUser" >Field(s)</label><input type="text" name="sheet[]" value="'+nam+'" id="fieldUser"  class="form-control" readonly/></div><br/><a href="#" class="remove_field">Remove</a></div>'); //add input box
			
			/*  $(wrapper).prepend(' <div class="col-md-5"><select  name='+role+"[]"+' id="fieldUser"  class="form-control"> <option value="Founder">Founder</option> <option value="Director">Director</option> <option value="Advisor">Advisor</option> <option value="Investor">Investor</option>  </select><a href="#" class="remove_field">Remove</a></div>');  *///add input box
        }
    
    $('#highschool').on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
}
		
							
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
									if(response ==='Exam List Created Successfully')
									{
									notify("top", "center","", "success", "animated rotateInDownRight","animated rotateOutUpRight",response,"Successful");
									var delay = 3000;
										setTimeout((function(){ window.location.reload() }), delay);  
									}else
									{
									$('#ring').hide();
									notify("top", "center","", "success", "animated rotateInDownRight","animated rotateOutUpRight",response,"Failed");	
									}
									}
								});
									$('#reg').attr('disabled',true);
									$('#ring').hide();
							});
												
						</script>