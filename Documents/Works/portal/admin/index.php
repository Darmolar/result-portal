<!DOCTYPE html>
<html>
<head>
	<title>School Portal</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">


	<!--Font Awsome  CDN-->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<div class="container">
	<div class="row">
		<div class="col-md-4"></div>
		 <div class="col-md-4 login p-3">
		  <div class="container-fluid">
		  	<div class="form">
		  		<form id="submitForm" class="text-center" method="POST">
		  			<p>Sign In As Admin</p>
		  			<div class="input-group mb-3">
					  <input type="text" accept="number" class="form-control" id="userid" name="userid" placeholder="Login Id" aria-label="Matric Number" aria-describedby="basic-addon1">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1"><span style="color: blue;" class="fa fa-user"></span></span>
					  </div>
					</div>
					<div class="input-group mb-3">
					  <input type="password" class="form-control" id="password" name="password" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1"><span style="color: blue;" class="fa fa-key"></span></span>
					  </div>
					</div>
					<div class="form-group">
						<input type="hidden" name="adminLogin">
						<button class="btn btn-primary" type="submit">Submit</button>
					</div>
		  		</form>
		  		<div class="container">
		  			<p class="float-right"><a href="../">Login</a> as Student</p>
		  		</div>
		  	</div>
		  </div>	
		</div>
		<div class="col-md-4"></div>
	</div>
</div>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){

		$('#submitForm').submit(function(e){
          e.preventDefault();

          var datas = new FormData(this);


          $.ajax({
          	url: 'php/controller.php',
          	method: 'POST',
          	data: datas,
          	success: function(data){
                var curData = JSON.parse(data);
                if(curData['msg'] = "Success"){
                	window.location = 'home'
                }else{
                	alert(curData['msg'] );
                };
          	},
          	cache: false,
            contentType: false,
            processData: false
          })
		})
	})
</script>
</body>
</html>