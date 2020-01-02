<?php  
include('header.php');


if(isset($_GET['fee_id'])){
	$fee_id=base64_decode($_GET['fee_id']);
	$data=$obj->Get_All_Data("select * from fee_type where fee_id='$fee_id'");
}else{
	die('111 Error');
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
                                   <li class="breadcrumb-item"><a href="fee_type.php">Fee Type</a></li>
                                   <li class="breadcrumb-item"><a href="fee_type_list.php">Fee Type List</a></li>
                                   <li class="breadcrumb-item"><a href="">Edit Fee Type</a></li>
                                   
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Edit Fee Type</h5>
                           <div class="f-right">
                              <a href="fee_type_list.php" class="btn btn-info waves-effect" data-type="info">View Fee Type</a>
                            </div>
                        </div>
                        <div class="card-block">
							<form class="form-horizontal" ng-upload="saveAdd(content)" method="post" action="parents" id="form_data" enctype="multipart/form-data" encoding="multipart/form-data">
        <div class="form-group has-error" ng-class="{'has-error': addAdmin.fullName.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Fee Type Title * </label>
          <div class="col-sm-10">
            <input type="text" name="title" ng-model="form.fullName" class="form-control" value="<?php echo $data[0]['title'];  ?>" required="" placeholder="Title">
          </div>
        </div>
		<br/> <br/>
        <div class="form-group has-error" ng-class="{'has-error': addAdmin.username.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Fee Description * </label>
          <div class="col-sm-10">
            <input type="text" name="description" ng-model="form.username" value="<?php echo $data[0]['description'];  ?>" class="form-control ng-pristine ng-invalid ng-invalid-required" required="" placeholder="Description">
          </div>
        </div>
		<br/> <br/>
        <div class="form-group has-error" ng-class="{'has-error': addAdmin.email.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Amount*</label>
          <div class="col-sm-10">
            <input type="number" name="amount" ng-model="form.email" value="<?php echo $data[0]['amount'];  ?>" class="form-control ng-dirty ng-valid-required ng-invalid ng-invalid-email" placeholder="Amount" required="">
          </div>
		  <br/><br/>
        </div>

		<div class="form-group has-error" ng-class="{'has-error': addAdmin.email.$invalid}">
          <label for="inputPassword3" class="col-sm-3 control-label ng-binding">Fee Schedule*</label>
          <div class="col-sm-9">
             <div class="row">
                                <div class="col-sm-3">
                                           <div class="radio"  >
												<label>
													<input type="radio" name="schedule" value="1"><i class="helper" style="margin-right:10px;"></i>One Time
												</label>
											</div>
											<br/>
                                </div>
                                <div class="col-sm-3">
                                           <div class="radio">
												<label>
													<input type="radio" name="schedule" value="2"><i class="helper"></i>Every Term
												</label>
											</div>
                                  <br/>
                                    </div> 
									<div class="col-sm-3">
                                           <div class="radio">
												<label>
													<input type="radio" name="schedule" value="3"><i class="helper"></i>Every Session
												</label>
											</div>
                                  <br/>
                                    </div> 
									
									<div class="col-sm-3">
                                           <div class="radio">
												<label>
													<input type="radio" name="schedule" value="4"><i class="helper"></i>Every Month
												</label>
											</div>
                                  <br/>
                                    </div>
						
          </div>
        </div>
		
                            
							
		<br/><br/>
        <div class="form-group">
		<div class="col-sm-2"></div>
          <div class="col-sm-10">
           <input type="hidden" name="edit_fee_type">
           <input type="hidden" name="fee_id" value="<?php echo $data[0]['fee_id'];  ?>">
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
									if(response ==='Fee Types Edited Successfully')
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
	
	