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
                                    <li class="breadcrumb-item"><a href="inbox.php">Message</a></li>
                                    <li class="breadcrumb-item"><a href="compose.php.php">Compose Message</a></li>
                                  
                             
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Compose Message</h5>
                           
                        </div>
                        <div class="card-block">
					
					<div class="row">
                <div class="col-sm-12">
                    <div class="card mail-compose">
                        <div class="card-block">
                            <div class="col-xl-2 col-lg-12">
                                <a href="compose.php" class="btn btn-inverse-danger waves-effect waves-light btn-block">Compose
                                </a>
                                <div class="list-group compose-list-group">
                                    <a href="inbox.php" class="list-group-item active">
                                      <i class="icofont icofont-download-alt"></i> Inbox <b class="email-count">(<?php echo count($obj->Get_All_Data("select * from message where reciever_id=".$_SESSION['uid'].""));  ?>)</b>
                                </a>
                                </div>
                            </div>
                            <div class="col-xl-10 col-lg-12">
                              
                                <form name="form_name" id="form_data" method="post">
                                    <div class="form-group">
                                       <select name="reci[]" class="form-control js-example-basic-single" aria-hidden="true">
										<?php
										$users=$obj->Get_All_Data("select * from users");
										for($i=0;$i<count($users);$i++){
										
												echo '<option value="'.$users[$i]['uid'].'">'.$users[$i]['username'].' </option>';
											
										}
										?>
									</select>
                                    </div>
                                   
                                    <div id="summernote">
									<textarea name="message" class="form-control"  height="200" placeholder="Type Message here..."></textarea>
									
									
									<input type="hidden" name="send_msg" class="form-control" />
									</div>
									<br/>
									<br/>
									<br/>
									
									  <div class="form-group">
          <div class="col-sm-12">
           <input type="hidden">
		<button type="submit" class="btn btn-block btn-primary waves-effect" data-toggle="tooltip" id="reg" data-placement="top" title="" data-original-title="Submit To Save">Submit  <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center>	 </button>
          </div>
        </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
									if(response ==='Message Sent successfully')
									{
									notify("top", "center","", "success", "animated rotateInDownRight","animated rotateOutUpRight",response,"Successful");
									var delay = 3000;
										setTimeout((function(){ window.location="dashboard/dashboard.php" }), delay);  
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
						
						<script>
 
 $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
 
 
 </script>
	