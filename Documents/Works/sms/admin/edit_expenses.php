<?php  
include('header.php');


if(isset($_GET['exp_id'])){
	$exp_id=base64_decode($_GET['exp_id']);
	$data=$obj->Get_All_Data("select * from expenses JOIN expenses_cate on expenses.exp_cate=expenses_cate.exp_cate_id where expenses.exp_id='$exp_id'");
}else{
	//die('111 Error');
}
///print_r($data);
?>

<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index-2.html"><i class="icofont icofont-home"></i></a>
                                    </li>
                                     <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                   <li class="breadcrumb-item"><a href="expenses.php">Expenses</a></li>   
                                   <li class="breadcrumb-item"><a href="expenses_list.php">Expenses List</a></li>   
                                   <li class="breadcrumb-item"><a href="">Edit Expense</a></li>   
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Edit Expenses</h5>
                           <div class="f-right">
                              <a href="expenses_list.php" class="btn btn-info waves-effect" data-type="info">View Expenses</a>
                            </div>
                        </div>
                        <div class="card-block">
							<form class="form-horizontal" ng-upload="saveAdd(content)" method="post" id="form_data" enctype="multipart/form-data" encoding="multipart/form-data">
        <div class="form-group has-error" ng-class="{'has-error': addAdmin.fullName.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding"> Title * </label>
          <div class="col-sm-10">
            <input type="text" name="title" value="<?php echo $data[0]['exp_title'] ?>" ng-model="form.fullName" class="form-control" required="" placeholder="Title">
          </div>
        </div>
		<br/> <br/>
                       
		 <div class="form-group has-error" ng-class="{'has-error': addAdmin.fullName.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding"> Amount * </label>
          <div class="col-sm-10">
            <input type="text" name="amount" ng-model="form.fullName" value="<?php echo $data[0]['exp_amount'] ?>" class="form-control" required="" placeholder="Amount">
          </div>
        </div>
		<br/> <br/>
		 <div class="form-group has-error" ng-class="{'has-error': addAdmin.fullName.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding"> Category * </label>
          <div class="col-sm-10">
		  
            <select  name="cate" ng-model="form.fullName" class="form-control" required="">
			<option value="<?php echo $data[0]['exp_cate_id'] ?>"><?php echo $data[0]['cate_title'] ?></option>
             <?php
									 $ftype=$obj->Get_All_Data("select * from expenses_cate");
									 for($i=0;$i<count($ftype);$i++){
									 ?>
									<option value="<?php echo $ftype[$i]['exp_cate_id'] ?>"><?php echo $ftype[$i]['cate_title'] ?></option>
								
								 <?php  } ?>
								 </select>
          </div>
        </div>
		<br/> <br/>
		 <div class="form-group has-error" ng-class="{'has-error': addAdmin.fullName.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding"> Note * </label>
          <div class="col-sm-10">
            <textarea name="note" ng-model="form.fullName" class="form-control" required=""><?php echo $data[0]['exp_note'] ?></textarea>
          </div>
        </div>
		<br/> <br/>
        <div class="form-group">
		<br/> <br/>
		<div class="col-sm-2"></div>
          <div class="col-sm-10">
           <input type="hidden" name="edit_expenses">
           <input type="hidden" value="<?php echo $data[0]['exp_id'] ?>" name="exp_id">
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
									if(response ==='Expense Edited Successfully')
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
	
	