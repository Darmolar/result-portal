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
                                    <li class="breadcrumb-item"><a href="event.php">Event</a></li>
                             
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Add Event</h5>
                            <div class="f-right">
                              <a href="event_list.php" class="btn btn-info waves-effect" data-type="info">View vent</a>
                            </div>
                        </div>
                        <div class="card-block">
                              <form class="form-horizontal" name="addEvent" role="form" id="form_data">
							  <br>
		<br>
        <div class="form-group has-error" ng-class="{'has-error': addEvent.eventTitle.$invalid}">
          <label for="inputEmail3" class="col-sm-2 control-label ng-binding">Event Title * </label>
          <div class="col-sm-10">
            <input type="text" name="title" ng-model="form.eventTitle" class="form-control ng-pristine ng-invalid ng-invalid-required" required="" placeholder="Event Title">
          </div>
        </div>
		<br>
		<br>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Event Description</label>
          <div class="col-sm-10">
            <textarea ck-editor="" name="eventdesc" class="form-control" placeholder="Event Description" ></textarea>
          </div>
        </div>
		<br>
		<br>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Event Place</label>
          <div class="col-sm-10">
            <input type="text" name="eventplace" ng-model="form.enentPlace" class="form-control ng-pristine ng-valid" placeholder="Event Place">
          </div>
        </div>
		<br>
		<br>
        <div class="form-group has-error" ng-class="{'has-error': addEvent.eventFor.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">For *</label>
          <div class="col-sm-10">
 <select name="eventfor" class=" form-control" tabindex="-1" aria-hidden="true">
									<option value="" disabled>Event For</option>
									<option value="All">All</option>
									<option value="Student">Student</option>
									<option value="Teacher">Teacher</option>
									<option value="Parent">Parent</option>
									</select>
           
          </div>
        </div>
		<br>
		<br>
        <div class="form-group has-error" ng-class="{'has-error': addEvent.eventDate.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Date *</label>
          <div class="col-sm-10">
            <input type="date" id="datemask" name="eventdate" class="form-control">
          </div>
        </div>
		<br>
		<br>
        <div class="form-group">
          <div class="col-sm-12">
           	<input type="hidden" name="create_event">
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
									if(response ==='Event Saved Successfully')
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