<?php  
include('header.php');

if(isset($_GET['hostel_cate_id'])){
	$id=base64_decode($_GET['hostel_cate_id']);
	$data=$obj->Get_All_Data("select * from hostelcat JOIN hostel on hostel.hostel_id=hostelcat.catTypeId  where hostelcat.hostel_cat_id=$id");
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
                                    <li class="breadcrumb-item"><a href="hostel_cate.php">Hostel Category</a></li>
                                    <li class="breadcrumb-item"><a href="hostel_cate_list.php">Hostel Category List</a></li>
                                    <li class="breadcrumb-item"><a href="hostel_cate.php">Edit Hostel Category</a></li>
                                 
                             
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Edit Hostel Category</h5>
                            <div class="f-right">
                              <a href="hostel_cate_list.php" class="btn btn-info waves-effect" data-type="info">View Hostel Categories</a>
                            </div>
                        </div>
                        <div class="card-block">
                            <form class="form-horizontal" name="addHostel" role="form" id="form_data">
        <div class="form-group has-error">
          <label for="inputEmail3" class="col-sm-2">Category Title * </label>
          <div class="col-sm-10">
            <input type="hidden" name="id" class="form-control" placeholder="Category Title" required value="<?php echo $data[0]['hostel_cat_id']; ?>"/>
            <input type="text" name="title" class="form-control" placeholder="Category Title" required value="<?php echo $data[0]['catTitle']; ?>"/>
          </div>
        </div>
		<br/><br/>
        <div class="form-group has-error">
          <label for="inputPassword3" class="col-sm-2 control-label">Hostel *</label>
          <div class="col-sm-10">
              <select class="form-control" name="hostel" required>
			  <option value="<?php echo $data[0]['hostel_id']; ?>"><?php echo $data[0]['hostelTitle']; ?></option>
			  <?php 
					$data2=$obj->Get_All_Data("select * from hostel");
					
				for($i=0;$i<count($data2);$i++){
			  ?>
			  <option value="<?php  echo $data2[$i]['hostel_id'] ?>"><?php  echo $data2[$i]['hostelTitle'] ?></option>
			  
			  <?php  
			  }
			  ?>
              
              </select>
          </div>
        </div>
			<br/><br/>
        <div class="form-group has-error" ng-class="{'has-error': addHostel.catFees.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Fees *</label>
          <div class="col-sm-10">
              <input type="text" name="catFees" ng-model="form.catFees" class="form-control ng-pristine ng-invalid ng-invalid-required" required="" placeholder="Fees"  value="<?php echo $data[0]['catFees']; ?>">
          </div>
        </div>
			<br/><br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Notes</label>
          <div class="col-sm-10">
              <textarea name="catNotes" class="form-control ng-pristine ng-valid" ng-model="form.catNotes" placeholder="Notes"><?php echo $data[0]['catNotes']; ?></textarea>
          </div>
        </div>
			<br/><br/>
        <div class="form-group">
          <div class="col-sm-12">
            	<input type="hidden" name="edit_hostel_cate">
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
									if(response ==='Hostel Category Updated Successfully')
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
		