<?php  
include('header.php');

if(isset($_GET['hostel_id'])){
	$hostel_id=base64_decode($_GET['hostel_id']);
	$data=$obj->Get_All_Data("select * from hostel where hostel_id='$hostel_id'");
}
//print_r($data);
?>
<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index-2.html"><i class="icofont icofont-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="hostel.php">Hostel</a></li>
                                    <li class="breadcrumb-item"><a href="hostel_list.php">View Hostel</a></li>
                                    <li class="breadcrumb-item"><a href="edit_hostel.php">Edit Hostel</a></li>
                             
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Add Hostel</h5>
                            <div class="f-right">
                              <a href="hostel_list.php" class="btn btn-info waves-effect" data-type="info">View Hostel</a>
                            </div>
                        </div>
                        <div class="card-block">
                            <form class="form-horizontal" name="addHostel" id="form_data" role="form">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Hostel Title * </label>
          <div class="col-sm-10">
		  <input type="hidden" name="hostel_id" class="form-control" required="" placeholder="Hostel Title" value="<?php echo $data[0]['hostel_id'] ?>">
            <input type="text" name="title" class="form-control" required="" placeholder="Hostel Title" value="<?php echo $data[0]['hostelTitle'] ?>">
          </div>
        </div>
		<br/><br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2">Hostel Type *</label>
          <div class="col-sm-10">
              <select class="form-control" name="type" required>
			  
			  <option value="<?php echo $data[0]['hostelType'] ?>"><?php echo $data[0]['hostelType'] ?></option>
                  <option value="Boys" class="ng-binding">Boys</option>
                  <option value="Girls" class="ng-binding">Girls</option>
                  <option value="Mixed" class="ng-binding">Mixed</option>
              </select>
          </div>
        </div>
		<br/> <br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Address</label>
          <div class="col-sm-10">
              <textarea name="address" class="form-control" placeholder="Address"><?php echo $data[0]['hostelAddress'] ?></textarea>
          </div>
        </div>
		<br/><br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2">Manager</label>
          <div class="col-sm-10">
              <textarea name="manager" class="form-control" placeholder="Manager"><?php echo $data[0]['hostelManager'] ?></textarea>
          </div>
        </div>
		<br/><br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2">Notes</label>
          <div class="col-sm-10">
              <textarea name="notes" class="form-control" placeholder="Notes"><?php echo $data[0]['hostelNotes'] ?></textarea>
          </div>
        </div>
		<br/><br/>
      <div class="form-group">
          <div class="col-sm-12">
            	<input type="hidden" name="edit_hostel">
							<button type="submit" class="btn btn-block btn-primary waves-effect" data-toggle="tooltip" id="reg" data-placement="top" title="" data-original-title="Submit To Save">Submit  <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center>	 </button>
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
									if(response ==='Hostel Updated Successfully')
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
		