               <!-- Modal -->
                        <div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title">Link Parent</h4>
            
			</div>
                                        <div class="modal-body">
                                          <form class="form-horizontal" name="addSubForm" role="form" id="form_data">
        <div class="form-group has-error">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Parent *</label>
          <div class="col-sm-10">
            <input class="form-control" required="" type="hidden" name="classId" value="<?php  echo base64_decode($_GET['cl_id']); ?>"/>
            <select class="form-control" required="" name="subjectId">
			
			<?php
			$sub=$obj->Get_All_Data("select * from subject");
			for($i=0;$i<count($sub);$i++){
			?>
			<option value="<?php echo $sub[$i]['sub_id'] ?>" ><?php echo $sub[$i]['subject_name'] ?></option>
			
			<?php  
			}
			?>
			#
            </select>
          </div>
        </div>
		
		<br/><br/>
         <div class="form-group">
          <div class="col-sm-12">
           <input type="hidden" name="create_class_schedule">
		<button type="submit" class="btn btn-block btn-primary waves-effect" data-toggle="tooltip" id="reg" data-placement="top" title="" data-original-title="Submit To Save">Submit  <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center>	 </button>
          </div>
        </div>
    </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>