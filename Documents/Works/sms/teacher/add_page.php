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
                                    <li class="breadcrumb-item"><a href="add_page.php">Control Pages</a></li>
                             
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Add A Static Page</h5>
                            <div class="f-right">
                              <a href="pages_list.php" class="btn btn-info waves-effect" data-type="info">View Pages</a>
                            </div>
                        </div>
                        <div class="card-block">
                               <form id="form_data" name="form1" method="POST">
                                    <div class="md-input-wrapper">
                                        <input type="text" name="page_title" class="md-form-control md-static" required>
                                        <label>Page Title</label>
                                    <span class="md-line"></span></div>
                          
                            <div class="md-input-wrapper">
                                <textarea name="page_content" class="md-form-control md-static" cols="2" rows="4" required></textarea>
                                <label>Page Content </label>
                            <span class="md-line"></span></div>
							
							   <div class="row">
                                <div class="col-sm-6">
                                           <div class="radio">
												<label>
													<input type="radio" name="active" value="1"><i class="helper"></i>Active
												</label>
											</div>
                                </div>
                                <div class="col-sm-6">
                                           <div class="radio">
												<label>
													<input type="radio" name="active" value="0"><i class="helper"></i>In Active
												</label>
											</div>
                                  
                                    </div>
                            </div>
							<input type="hidden" name="creat_static_page"/>
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
									if(response ==='Static Page Created Successfully')
									{
									notify("top", "center","", "success", "animated rotateInDownRight","animated rotateOutUpRight",response,"Successful");
									var delay = 3000;
										setTimeout((function(){ window.location="dashboard/dashboard.php" }), delay);  
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