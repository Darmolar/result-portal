<?php  
include('header.php');


$tid=base64_decode($_GET['t_id']);

$data=$obj->Get_All_Data("select * from transportation where t_id=$tid");
//print_r($data);
?>

<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index-2.html"><i class="icofont icofont-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="transport.php">Transportation</a></li>
                                    <li class="breadcrumb-item"><a href="edit_transport.php">Edit Transportation</a></li>
                             
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Add Transportations</h5>
                            <div class="f-right">
                              <a href="transport_list.php" class="btn btn-info waves-effect" data-type="info">View Transportations</a>
                            </div>
                        </div>
                        <div class="card-block">
                              <form class="form-horizontal" name="addDorm" id="form_data">
        <div class="form-group has-error" ng-class="{'has-error': addDorm.transportTitle.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Transport title * </label>
          <div class="col-sm-10">
            <input type="hidden" name="tid" ng-model="form.transportTitle" class="form-control" required="" placeholder="Transport title" value="<?php echo $data[0]['t_id'] ?>">
			
            <input type="text" name="title" ng-model="form.transportTitle" class="form-control" required="" placeholder="Transport title" value="<?php echo $data[0]['title'] ?>">
          </div>
        </div>
		<br>
		<br>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Transport Description</label>
          <div class="col-sm-10">
            <textarea name="desc" class="form-control ng-pristine ng-valid" ng-model="form.transportDescription" placeholder="Transport Description"><?php echo $data[0]['desc'] ?></textarea>
          </div>
        </div>
		<br>
		<br>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Driver Contact</label>
          <div class="col-sm-10">
            <textarea name="contact" class="form-control ng-pristine ng-valid" ng-model="form.transportDriverContact" placeholder="Driver Contact"><?php echo $data[0]['contact'] ?></textarea>
          </div>
        </div>
		<br>
		<br>
        <div class="form-group has-error" ng-class="{'has-error': addDorm.transportFare.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Fare</label>
          <div class="col-sm-10">
            <input type="text" name="fare" ng-model="form.transportFare" class="form-control ng-pristine ng-invalid ng-invalid-required" required="" placeholder="Fare" value="<?php echo $data[0]['fare'] ?>">
          </div>
        </div>
		<br>
		<br>
        <div class="form-group">
          <div class="col-sm-12">
            	<input type="hidden" name="edit_transport">
							<button type="submit" class="btn btn-block btn-primary waves-effect waves-light m-r-10" data-toggle="tooltip" id="reg" data-placement="top" title="" data-original-title="Submit To Save">Submit  <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center>	 </button>
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
									if(response ==='Transportation Updated Successfully')
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
		