 <div class="md-modal md-effect-9" id="modal-9">
                                <div class="md-content">
                                    <h3>Assignment Upload Dialog</h3>
                                    <div>
                                        <p>Please Select Assignment To Upload</p>
                                        <ul>
   <form class="form-horizontal"  method="post" name="addAdmin" role="form" novalidate="" id="upload_ass" enctype="multipart/form-data" encoding="multipart/form-data">	
   
   
    <label for="inputEmail3" class="control-label ng-binding">File Name</label>
          <div class="col-sm-12">
            <input type="file" name="ass_file"required/>
			 <br/>
		 
          </div>
   
        <div class="form-group has-error">
          <label for="inputEmail3" class="control-label ng-binding">Note</label>
          <div class="col-sm-12">
        
            <textarea name="note"  class="form-control md-form-control" col="15"></textarea>
			
            <input type="hidden" name="submit_ass" required/>
            <input type="hidden" name="ass_id" value="<?php echo $trans[$i]['ass_id']; ?>" required/>
            <input type="hidden" name="title" value="<?php echo $trans[$i]['AssignTitle']; ?>" required/>
			 <br/>
		 
          </div>
		 
		    <button type="submit" name="submit_ass" id="upload_btn" class="btn btn-primary btn-block waves-effect">Upload <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center></button>
		  </form>
                                        </ul>
                                        <button type="button" class="btn btn-primary waves-effect md-close">Close</button>
                                    </div>
                                </div>
                            </div>

							

</div>