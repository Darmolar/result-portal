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
                                    <li class="breadcrumb-item"><a href="add_class.php">Library</a></li>
                             
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Add Book TO Library</h5>
                            <div class="f-right">
                              <a href="library_list.php" class="btn btn-info waves-effect" data-type="info">View Books</a>
                            </div>
                        </div>
                        <div class="card-block">
                             <form class="form-horizontal" name="addDorm" role="form" method="post" id="form_data" enctype="multipart/form-data" encoding="multipart/form-data">
        <div class="form-group has-error" ng-class="{'has-error': addDorm.bookName.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Book title * </label>
          <div class="col-sm-10">
            <input type="text" name="book_name" ng-model="form.bookName" class="form-control ng-pristine ng-invalid ng-invalid-required" required="" placeholder="Book title">
          </div>
        </div>
		<br/><br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Book Description</label>
          <div class="col-sm-10">
            <textarea name="bookdesc" class="form-control" ng-model="form.bookDescription" placeholder="Book Description"></textarea>
          </div>
        </div>
			<br/><br/>
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Book Author</label>
          <div class="col-sm-10">
            <input type="text" name="bookauthor" ng-model="form.bookAuthor" class="form-control ng-pristine ng-valid" placeholder="Book Author">
          </div>
        </div>
			<br/><br/>
        <div class="form-group" ng-class="{'has-error': addDorm.bookType.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Book Type *</label>
          <div class="col-sm-10">
              <select id="btype" name="booktype" class="js-example-basic-single form-control" onchange="Show_Hide(this.value)">
									<option value="">Select Book Type</option>
									<option value="Tradition">Traditional Book</option>
									<option value="Electronic">Electronic Book</option>
									
									</select>
          </div>
        </div>
			<br/><br/>
        <div class="form-group ng-hide" id="trad">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Book Price</label>
          <div class="col-sm-10">
            <input type="text" name="bookprice" ng-model="form.bookPrice" class="form-control ng-pristine ng-valid" placeholder="Book Price">
          </div>
        </div>
			<br/><br/>
        <div class="form-group" id="elect">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Upload book</label>
          <div class="col-sm-10">
            <input type="file" name="bookfile">
          </div>
        </div>
			<br/><br/>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">State</label>
          <div class="col-sm-10">
            <select class="form-control ng-pristine ng-valid" name="bookstate" ng-model="form.bookState">
              <option value="1" class="ng-binding">Available</option>
              <option value="0" class="ng-binding">Unavailable</option>
            </select>
          </div>
        </div>
			<br/><br/>
        <div class="form-group">
          <div class="col-sm-12">
           	<input type="hidden" name="create_library">
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
$(document).ready(function(){
	$('#trad').hide();
	$('#elect').hide();
	
})

function Show_Hide(type){
	if(type=="Electronic"){
		$('#trad').hide();
		$('#elect').show();
	}else{
	$('#trad').show();
	$('#elect').hide();
	}
	
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
									if(response ==='Library Created Successfully')
									{
									notify("top", "center","", "success", "animated rotateInDownRight","animated rotateOutUpRight",response,"Successful");
									var delay = 3000;
										setTimeout((function(){ window.location.reload() }), delay);  
									}else
									{
									$('#ring').hide();
									notify("top", "center","", "danger", "animated rotateInDownRight","animated rotateOutUpRight",response,"Failed");	
									}
									}
								});
									$('#reg').attr('disabled',true);
									$('#ring').hide();
							});
												
						</script>