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
                                    <li class="breadcrumb-item"><a href="add_section.php"> Add Section</a></li>
                                   
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Add Section</h5>
                           <div class="f-right">
                              <a href="teachers_list.php" class="btn btn-info waves-effect" data-type="info">View Sections</a>
                            </div>
                        </div>
                        <div class="card-block">
					<form class="form-horizontal ng-pristine ng-invalid ng-invalid-required" name="addDorm" role="form" ng-submit="saveAdd()" novalidate="">
        <div class="form-group has-error" ng-class="{'has-error': addDorm.sectionName.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Section name * </label>
          <div class="col-sm-10">
            <input type="text" name="section_name" class="form-control" required placeholder="Section name">
          </div>
        </div>
        <div class="form-group has-error" ng-class="{'has-error': addDorm.sectionTitle.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Section Title * </label>
          <div class="col-sm-10">
            <input type="text" name="section_title" ng-model="form.sectionTitle" class="form-control" required placeholder="Section Title">
          </div>
        </div>
        <div class="form-group has-error" ng-class="{'has-error': addDorm.classId.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Class *</label>
          <div class="col-sm-10">
            <select class="form-control" ng-model="form.classId" name="class" required>
			<option value="">Select Class</option>
            <option ng-repeat="(key,value) in classes" value="1" class="ng-binding ng-scope">Class 1</option>
			<!-- end ngRepeat: (key,value) in classes --><option ng-repeat="(key,value) in classes" value="2" class="ng-binding ng-scope">Class 2</option><!-- end ngRepeat: (key,value) in classes -->
            </select>
          </div>
        </div>
        <div class="form-group has-error" ng-class="{'has-error': addDorm.teacherId.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Teacher *</label>
          <div class="col-sm-10">
            <select class="form-control" name="teacher" multiple="" required>
			
            <option value="0">Select Teacher</option>
			<?php
			$data=$obj->Get_All_Data("select * from teacher");
			for($i=0;$i<count($data);$i++){
			?>
            <option value="<?php  echo $data[$i]['uid'] ?>"><?php  echo $data[$i]['fname']; ?></option>
			
			<?php
			}
			
			?>
			
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default ng-binding" ng-disabled="addDorm.$invalid" disabled="disabled">Add section</button>
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
									if(response ==='Teacher Saved Successfully')
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
	