<?php  
include('header.php');


if(isset($_GET['cate_id'])){
	$cate_id=base64_decode($_GET['cate_id']);
	$data=$obj->Get_All_Data("select * from expenses_cate where exp_cate_id='$cate_id'");
}else{
	//die('111 Error');
}
//print_r($data);
?>

<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="#"><i class="icofont icofont-home"></i></a>
                                    </li>
                                     <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                   <li class="breadcrumb-item"><a href="expenses_cate.php">Expenses Category</a></li>
                                   <li class="breadcrumb-item"><a href="#">Edit Expenses Category</a></li>
                                 
                                   
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Expenses Category</h5>
                           <div class="f-right">
                              <a href="expenses_cate_list.php" class="btn btn-info waves-effect" data-type="info">Expenses Categories</a>
                            </div>
                        </div>
                        <div class="card-block">
							<form class="form-horizontal" ng-upload="saveAdd(content)" method="post" id="form_data" enctype="multipart/form-data" encoding="multipart/form-data">
        <div class="form-group has-error" ng-class="{'has-error': addAdmin.fullName.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Category Title * </label>
          <div class="col-sm-10">
            <input type="text" name="title" ng-model="form.fullName" value="<?php echo $data[0]['cate_title'];  ?>" class="form-control" required="" placeholder="Title">
          </div>
        </div>
		<br/> <br/>
                       
		 <div class="form-group has-error" ng-class="{'has-error': addAdmin.fullName.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Category Description * </label>
          <div class="col-sm-10">
            <input type="text" name="desc" ng-model="form.fullName" value="<?php echo $data[0]['cate_desc'];  ?>" class="form-control" required="" placeholder="Title">
          </div>
        </div>
        <div class="form-group">
		<br/> <br/>
		<div class="col-sm-2"></div>
          <div class="col-sm-10">
           <input type="hidden" name="edit_expenses_cate">
           <input type="hidden" value="<?php echo $data[0]['exp_cate_id'];  ?>" name="id">
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
									if(response ==='Category Created Successfully')
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
	
	