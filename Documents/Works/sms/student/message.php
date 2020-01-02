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
                            <h5 class="card-header-text">Send Message</h5>
                            <div class="f-right">
                              <a href="assignment_list.php" class="btn btn-info waves-effect" data-type="info">View Sent Messages</a>
                            </div>
                        </div>
                        <div class="card-block">
             
						<form class="form-horizontal ng-pristine ng-invalid ng-invalid-required" name="sendMessage" role="form" ng-submit="sendMessageNow()" novalidate="">
        <div class="form-group has-error" ng-class="{'has-error': sendMessage.toId.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Send message to (username) * </label>
          <div class="col-sm-10">
            <div class="row">
              <div class="col-xs-10 floatRight">
			  
			  <select class="js-example-basic-single select2-hidden-accessible" tabindex="-1" aria-hidden="true">
										<optgroup label="Developer">
											<option value="AL">Alabama</option>
											<option value="WY">Wyoming</option>
										</optgroup>
										<optgroup label="Designer">
											<option value="WY">Peter</option>
											<option value="WY">Hanry Die</option>
											<option value="WY">John Doe</option>
										</optgroup>
									</select>
			  
			  </div>
            
            </div>
          </div>
        </div>
        <div class="form-group" ng-class="{'has-error': sendMessage.messageText.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Message *</label>
          <div class="col-sm-10">
            <textarea name="messageText" class="form-control ng-pristine ng-valid" ng-model="form.messageText" placeholder="Message" style="height:250px"></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default ng-binding" ng-disabled="sendMessage.$invalid" disabled="disabled">Send Message</button>
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
		