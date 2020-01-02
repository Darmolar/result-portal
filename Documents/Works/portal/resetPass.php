<!DOCTYPE html>
<html>
<head>
	<title>Login </title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">



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
		  		<form id="loginForm" class="text-center" method="POST">
		  			<p>Sign In As Student</p>
		  			<div class="input-group mb-3">
					  <input type="text" accept="number" class="form-control" id="matricNo" placeholder="Matric Number" aria-label="Matric Number" aria-describedby="basic-addon1">
					  <div class="input-group-prepend">
					    <span class="input-group-text" id="basic-addon1"><span style="color: blue;" class="fa fa-user"></span></span>
					  </div>
					</div>
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Submit</button>
					</div>
		  		</form>
		  		<div class="container">
		  			<p class="float-right"><a href="./admin">SignUp</a> as Student</p>
		  			<p><a href="./resetPass">forgetpassword?</a></p>
		  		</div>
		  	</div>
		  </div>	
		</div>
		<div class="col-md-4"></div>
	</div>
</div>

<script type="text/javascript" src="js/bootstrap.min.css"></script>
</body>
</html>