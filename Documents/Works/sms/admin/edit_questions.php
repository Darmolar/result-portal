<?php  
include('header.php');
if(isset($_GET['question_id'])){
$id=base64_decode($_GET['question_id']);
$question=$obj->Get_All_Data("select * from question where id=$id");
}else{
	die("Error");
}
?>
<script src="../assets/ckeditor/ckeditor.js" type="text/javascript"> </script>

<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index-2.html"><i class="icofont icofont-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                  
                                    <li class="breadcrumb-item"><a href="edit_questions.php">Edit Question</a></li>
                                 
                             
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
                              <!--<a href="questions_list.php?oexam_id=<?php// echo $_GET['oexam_id'] ?>" class="btn btn-info waves-effect" data-type="info">View Question(s)</a>-->
                            </div>
                        </div>
  <h3><strong>Add New Questions To Database</strong></h3>
  <form action="" method="post" name="form1" id="form1" class="form-horizontal" style="padding:20px;">
    <label> <strong>Question</strong></label>
 <textarea name="question" cols="" rows="" class="ckeditor"><?php echo $question[0]['question']; ?></textarea><br/>
 
 <label> <strong>Number</strong></label>
<input name="No" type="text" value="<?php echo $question[0]['qno']; ?>" require class="form-control"/>
<br/>

<label> <strong>Option A</strong></label><br/>
<input name="optiona" type="text" value="<?php echo $question[0]['option1']; ?>" id="opt1" require class="form-control" />
<br/>
<label> <strong>Option B</strong></label> <br/>

<input name="optionb" type="text" value="<?php echo $question[0]['option2']; ?>" require class="form-control"/><br/>
<label> <strong>Option C</strong></label><br/>

<input name="optionc" type="text" value="<?php echo $question[0]['option3']; ?>" require class="form-control"/><br/>
<label> <strong>Option D</strong></label><br/>

<input name="optiond" type="text" value="<?php echo $question[0]['option4']; ?>" require class="form-control"/>
<br/>
<label> <strong>Correct Option</strong></label><br/>
<input name="correct" type="text" value="<?php echo $question[0]['correctanswer']; ?>" require class="form-control"/>
<br>

<input name="edit_question" type="hidden"  require class="form-control"/><br/>
<input name="qid" type="hidden" value="<?php echo base64_decode($_GET['question_id']); ?>" require class="form-control"/><br/>
<input type="submit" name="Button1" class="btn btn-primary" value="Submit"/>
</form>

</div>
</div>
</div>

			<?php  
include('footer.php');
?>

<script type="text/javascript">
	jQuery(document).ready(function(){
						jQuery("#form1").submit(function(e){
								e.preventDefault();
								
								for (var i in CKEDITOR.instances) {
									CKEDITOR.instances[i].updateElement();
										}

								var formData = new FormData(this);
								
								$.ajax({
									type:"POST",
									url:"../controller/controller.php",
									data:formData,
									 contentType: false,
         							cache: false,
  									 processData:false,
									success: function(response){
									$('#reg').attr('disabled',false);
									$('#ring').hide();
										console.log(response);
									if(response ==='Successful! Question Updated Sucessfully')
									{
								notify("top", "center","", "success", "animated rotateInDownRight","animated rotateOutUpRight", response ,"Successful");
								var delay = 3000;
										setTimeout((function(){ window.location.reload() }), delay); 
									}else{
										
											$('#ring').hide();
									notify("top", "center","", "danger", "animated rotateInDownRight","animated rotateOutUpRight", response ,"Failed");	
										
									}
									}
								});
								return false;
							});	
							});					
 
						</script>
                          </div>
                        </div>
                    </div>
                </div>


</div>
		