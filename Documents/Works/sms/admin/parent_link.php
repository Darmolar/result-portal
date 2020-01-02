 
  <!-- Modal -->
                        <div class="modal fade" id="large-Modal<?php echo $i; ?>" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title">Link Parent</h4>
            
			</div>
                                        <div class="modal-body">
                                          <form class="form-horizontal link_parent" name="addSubForm" role="form" id="form_data<?php echo $i; ?>">
        <div class="form-group has-error">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Parent *</label>
          <div class="col-sm-10">
            <input class="form-control" required="" type="hidden" name="uid" value="<?php  echo $trans[$i]['uid']; ?>"/>

            <select class="form-control" required="" name="pid">
			<?php
			$sub=$obj->Get_All_Data("select * from parent");
			

			for($j=0;$j<count($sub);$j++){
				 $data=json_decode($sub[$j]['data'],true);
			?>
			<option value="<?php if(isset($sub[$j]['uid'])) { echo $sub[$j]['uid']; } ?>" ><?php if(isset($data['fullName'])) { echo $data['fullName']; } ?></option>
			
			<?php  
			}
			?>
            </select>
          </div>
        </div>
		
		<br/><br/>
         <div class="form-group">
          <div class="col-sm-12">
           <input type="hidden" name="link_parent">
		<button type="submit" class="btn btn-block btn-primary waves-effect" data-toggle="tooltip" id="reg" data-placement="top" title="" data-original-title="Submit To Save">Submit  <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center>	 </button>
          </div>
        </div>
		<br/><br/>
    </form>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
						
							
													
<script type="text/javascript">
 
						jQuery("#form_data<?php echo $i; ?>").submit(function(e){
						
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
									if(response ==='Parent Linked  Successfully')
									{
									notify("top", "center","", "success", "animated rotateInDownRight","animated rotateOutUpRight",response,"Successful");
									var delay = 3000;
										setTimeout((function(){ window.location.reload()}), delay);  
									}else
									{
									$('#ring').hide();
									notify("top", "center","", "danger", "animated rotateInDownRight","animated rotateOutUpRight",response," Failed");	
									}
									}
								});
									$('#reg').attr('disabled',true);
									$('#ring').hide();
							});
												
						</script>