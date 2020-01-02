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
                <li class="breadcrumb-item"><a href="add_class.php">Classes</a></li>
         
            </ol>
        </div>
    </div>
</div>

<div class="row">
  <div class="col-xl-12">
	<div class="card">
	    <div class="card-header">
	        <h5 class="card-header-text">Add Class</h5>
	        <div class="f-right">
	          <a href="admin_list.php" class="btn btn-info waves-effect" data-type="info">View Admin</a>
	        </div>
	    </div>
	    <div class="card-block">
           <form id="form_data" name="form1" method="POST">
                <div class="md-input-wrapper">
                  <input type="text" name="admin_uname" class="md-form-control md-static" required>
                  <label>Admin Username</label>
                  <span class="md-line"></span>
                </div>

                <div class="md-input-wrapper">
                  <input type="text" name="admin_name" class="md-form-control md-static" required>
                  <label>Admin full name</label>
                  <span class="md-line"></span>
                </div>

                <div class="md-input-wrapper">
                  <input type="text" name="admin_mail" class="md-form-control md-static" required>
                  <label>Admin email</label>
                  <span class="md-line"></span>
                </div>
				
				<div class="md-input-wrapper">       
				  <select name="admin_gender" class="js-example-basic-single" tabindex="-1" aria-hidden="true">
				    <option value="" disabled selected>:: Admin gender :: </option>
				    <option value="male">Male</option>
				    <option value="female">Female</option>
				  </select>				
				</div>
	
				<div class="md-input-wrapper">
	            	<input type="number" name="admin_number" class="md-form-control md-static" required>
	            	 <label>Admin Phone number</label>
	            </div>
                
				<div class="md-input-wrapper">
                  <input type="password" name="admin_pass" class="md-form-control md-static" required>
                  <label>Admin Password</label>
				</select>
                   
                <span class="md-line"></span></div>
			<input type="hidden" name="add_admin">
			<button type="submit" class="btn btn-block btn-primary waves-effect waves-light m-r-10" data-toggle="tooltip" id="reg" data-placement="top" title="" data-original-title="Submit To Save">Submit 
			  <center>
			  	<img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" />
			  </center>
		    </button>
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
		if(response ==='Admin Created successfully')
		{
		notify("top", "center","", "success", "animated rotateInDownRight","animated rotateOutUpRight",response,"Successful");
		var delay = 3000;
			setTimeout((function(){ window.location.reload() }), delay);  
		}else
		{
		$('#ring').hide();
		notify("top", "center","", "success", "animated rotateInDownRight","animated rotateOutUpRight",response,"Failed");	
		}
		}
	});
		$('#reg').attr('disabled',true);
		$('#ring').hide();
});
						
</script>