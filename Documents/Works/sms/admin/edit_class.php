<?php  
include('header.php');

if(isset($_GET['cl_id'])){
	$id=base64_decode($_GET['cl_id']);
	$data=$obj->Get_All_Data("select * from class join teacher on teacher.uid=class.clteacher where class.cl_id=$id");
}
?>

<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index-2.html"><i class="icofont icofont-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="add_class.php">Classes</a></li>
                                    <li class="breadcrumb-item"><a href="class_list.php">View Classes</a></li>
                                    <li class="breadcrumb-item"><a href="edit_class.php">Edit Class</a></li>
                             
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Edit Class</h5>
                            <div class="f-right">
                              <a href="class_list.php" class="btn btn-info waves-effect" data-type="info">View Classes</a>
                            </div>
                        </div>
                        <div class="card-block">
                               <form id="form_data" name="form1" method="POST">
                                    <div class="md-input-wrapper">
                                        <input type="text" name="cl_name" class="md-form-control md-static" required value="<?php echo $data[0]['clname'] ?>">
                                        <label>Class Name</label>
                                    <span class="md-line"></span></div>
									
									<div class="md-input-wrapper">
                                   
									 <select name="cl_teacher" class="js-example-basic-single" tabindex="-1" aria-hidden="true">
									 <option value="">Select Class Teacher</option>
									 <?php
									 $teacher=$obj->Get_All_Data("select * from teacher");
									 for($i=0;$i<count($teacher);$i++){
										 	if(isset($data[$i]) and $teacher[$i]['uid']==$data[$i]['cl_id']){
					$selected="selected";
				}
									 ?>
									<option value="<?php echo $teacher[$i]['uid'] ?>" <?php echo $selected;  ?>><?php echo $teacher[$i]['fname'] ?></option>
								
								 <?php  } ?>
									</select>
									
									
														</div>
						
									<div class="md-input-wrapper">
                                      
									<select multiple="true" name="cl_related[]" class="js-example-basic-single" tabindex="-1" aria-hidden="true">
   
									 <option value="">Select Class Subject</option>
									 <?php
									 $teacher=$obj->Get_All_Data("select * from subject");
									  $json=json_decode($data[0]['clrelated']);
									  $selected2="";
									
									 for($i=0;$i<count($teacher);$i++){
										if(isset($json[$i]) and $json[$i]==$teacher[$i]['sub_id']){
					$selected2="selected";
				}
									 ?>
									<option value="<?php echo $teacher[$i]['sub_id'] ?>" <?php echo $selected2; ?>><?php echo $teacher[$i]['subject_name'] ?></option>
								
								 <?php  } ?>
									</select>
											</div>
                                    
									<div class="md-input-wrapper">
                                      <select multiple="true" name="cl_dorm[]" class="js-example-basic-single" tabindex="-1" aria-hidden="true">
									<option value="">Class Dormintory</option>
									<option value="WY">Peter</option>
									<option value="WY">Hanry Die</option>
									<option value="WY">John Doe</option>
									</select>
                                       
                                    <span class="md-line"></span></div>
							<input type="hidden" name="create_class">
							<button type="submit" class="btn btn-block btn-primary waves-effect waves-light m-r-10" data-toggle="tooltip" id="reg" data-placement="top" title="" data-original-title="Submit To Save">Submit  <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center>	 </button>
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
									if(response ==='Class Created Successfully')
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