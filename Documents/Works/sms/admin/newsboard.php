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
                                    <li class="breadcrumb-item"><a href="event.php">News Board</a></li>
                             
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Add News</h5>
                            <div class="f-right">
                              <a href="news_list.php" class="btn btn-info waves-effect" data-type="info">View News</a>
                            </div>
                        </div>
                        <div class="card-block">
                              <form class="form-horizontal" id="form_data" role="form">
        <div class="form-group has-error" ng-class="{'has-error': addDorm.newsTitle.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">News title * </label>
          <div class="col-sm-10">
            <input type="text" name="newstitle" ng-model="form.newsTitle" class="form-control ng-pristine ng-invalid ng-invalid-required" required="" placeholder="News title">
          </div>
        </div>
		<br><br>
        <div class="form-group has-error" ng-class="{'has-error': addDorm.newsText.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">News content *</label>
          <div class="col-sm-10">
            <textarea ck-editor="" name="newstext" class="form-control ng-pristine ng-invalid ng-invalid-required" ng-model="form.newsText" placeholder="News content"></textarea>
          </div>
        </div>
			<br><br>
        <div class="form-group has-error" ng-class="{'has-error': addDorm.newsFor.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">For *</label>
          <div class="col-sm-10">
            <select class="form-control ng-pristine ng-invalid ng-invalid-required" ng-model="form.newsFor" name="newsfor" required="">
              <option value="all" class="ng-binding">All</option>
              <option value="teacher" class="ng-binding">Teachers</option>
              <option value="student" class="ng-binding">Students</option>
              <option value="parent" class="ng-binding">Parents</option>
            </select>
          </div>
        </div>
			<br><br>
        <div class="form-group has-error">
          <label for="inputPassword3" class="col-sm-2 control-label">Date *</label>
          <div class="col-sm-10">
            <input date-picker="" type="date" name="newsdate" required="" class="form-control">
          </div>
        </div>
			<br><br>
        <div class="form-group">
          <div class="col-sm-12">
              	<input type="hidden" name="create_news">
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
										console.log("News Saved Successfully")
                  if(response ==='News Saved Successfully')
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