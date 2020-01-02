<?php  
include('header.php');


if(isset($_GET['alloc_fee_id'])){
	$alloc_fee_id=base64_decode($_GET['alloc_fee_id']);
	$data=$obj->Get_All_Data("select *,allocate_fee.title as alloc_title from allocate_fee  JOIN fee_type on fee_type.fee_id=allocate_fee.type  where alloc_fee_id=$alloc_fee_id");
	//print_r($data);
}else{
	
	die();
}
?>
<style>

#class-input{
	display:none;
}
</style>
<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index-2.html"><i class="icofont icofont-home"></i></a>
                                    </li>
                                     <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                   <li class="breadcrumb-item"><a href="fee_allocation.php">Fee Allocation</a></li>
                                   <li class="breadcrumb-item"><a href="fee_allocation_list.php">Fee Allocation List</a></li>
                                   
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Add Fee Allocation</h5>
                           <div class="f-right">
                              <a href="fee_allocation_list.php" class="btn btn-info waves-effect" data-type="info">View Fee Allocatoin</a>
                            </div>
                        </div>
                        <div class="card-block">
							<form class="form-horizontal" ng-upload="saveAdd(content)" method="post" action="parents" id="form_data" enctype="multipart/form-data" encoding="multipart/form-data">
        <div class="form-group has-error" ng-class="{'has-error': addAdmin.fullName.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Fee Title * </label>
          <div class="col-sm-10">
            <input type="text" name="title" ng-model="form.fullName" class="form-control"  value="<?php echo $data[0]['alloc_title'];  ?>" required="" placeholder="Title">
          </div>
        </div>
		<br/>
		<br/><br/>
		
		<div class="form-group has-error" ng-class="{'has-error': addAdmin.email.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Fee Type*</label>
          <div class="col-sm-10">
           
		     <select class="form-control ng-pristine ng-invalid ng-invalid-required" id="fee_type" name="fee_type" required>
			<option value="<?php echo $data[0]['type'];  ?>"><?php echo $data[0]['title'];  ?></option>
             <?php
									 $ftype=$obj->Get_All_Data("select * from fee_type");
									 for($i=0;$i<count($ftype);$i++){
									 ?>
									<option value="<?php echo $ftype[$i]['fee_id'] ?>"><?php echo $ftype[$i]['title'] ?></option>
								
								 <?php  } ?>
            </select>
		   
          </div>
		  <br/><br/>
        </div>
		
		
		<div class="form-group has-error" ng-class="{'has-error': addAdmin.email.$invalid}">
          <label for="inputPassword3" class="col-sm-3 control-label ng-binding">Allocate To*</label>
          <div class="col-sm-9">
             <div class="row" id="radio">
                                <div class="col-sm-3">
                                           <div class="radio"  >
												<label>
													<input type="radio" name="allocate_to"  id="all" value="All"/><i class="helper" style="margin-right:10px;"></i>All Student
												</label>
											</div>
											<br/>
                                </div>
                                <div class="col-sm-3">
                                           <div class="radio">
												<label>
													<input type="radio" name="allocate_to"  id="class" value="class"/><i class="helper"></i>Class
												</label>
											</div>
                                  <br/>
                                    </div> 

									<div class="col-sm-3">
                                           <div class="radio">
												<label>
													<input type="radio" name="allocate_to" id="std" /><i class="helper"> </i>Student
												</label>
											</div>
                                  <br/>
                                    </div> 
								
						
          </div>
        </div>
		
           
		   
		<div class="alert1"  style="display:none;" ><img width="30" id="ring1" src="../assets/images/ring.gif" />Working... </div>
		<div class="form-group has-error" id="class_input" style="display:none;">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Class*</label>
          <div class="col-sm-10">
           
		     <select class="form-control ng-pristine ng-invalid ng-invalid-required" name="class"  onchange="Get_Section(this.value);" required>
			 <?php if($data[0]['allocate_to_type']=="class"){ 
			 $teacher=$obj->Get_All_Data("select * from class where cl_id=".$data[0]['allocate_to']."");
									 for($i=0;$i<count($teacher);$i++){
									?>
									<option value="<?php echo $teacher[$i]['cl_id'] ?>"><?php echo $teacher[$i]['clname'] ?></option>
<?php
			 }			} ?>
			
             <?php
									 $teacher=$obj->Get_All_Data("select * from class");
									 for($i=0;$i<count($teacher);$i++){
									 ?>
									<option value="<?php echo $teacher[$i]['cl_id'] ?>"><?php echo $teacher[$i]['clname'] ?></option>
								
								 <?php  } ?>
            </select>
		   
          </div>
		 
        </div>
	
		<div class="form-group has-error" id="std_input" style="display:none;">
		
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Student*</label>
          <div class="col-sm-10">
<select class="form-control" class name="student[]" multiple="true">
        <?php
									 $student=$obj->Get_All_Data("select * from student");
									 for($i=0;$i<count($student);$i++){
									 ?>
									<option value="<?php echo $student[$i]['uid'] ?>"><?php echo $student[$i]['fname'] ?></option>
								
								 <?php  } ?>
</select>  
          </div>
		  <br/><br/>
        </div>

        <div class="form-group">
		<div class="col-sm-2"></div>
          <div class="col-sm-10">
		  <br/><br/>
           <input type="hidden" name="edit_fee_allocation">
           <input type="hidden" name="alloc_id" value="<?php echo $data[0]['alloc_fee_id'];  ?>" >
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
$("input:radio[name=allocate_to]").click(function() {
        var value = $(this).val();
        //alert(value);
        var id= $(this).attr('id');
       // alert(id);
	   if(id=="class"){
	$('#class_input').show();
	$('#std_input').hide();
}else if(id=="std"){
	$('#std_input').show();
	$('#class_input').hide();
}else{
		$('#class_input').hide();
		$('#std_input').hide();
}

    });

function Get_Section(classid){
	$('.alert1').show();
	$.ajax({
									type:"GET",
									url:"../controller/controller.php?get_section&class="+classid,
									success: function(response){
											$('.alert1').hide();
									$('#section').append(response);
									}
								});
	
}

 
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
									if(response ==='Edit Successfully')
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
	
	