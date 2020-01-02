<?php 
	session_start();
	require_once 'database/db.php';

	function staff_exist($staffid, $mysqli){
		$s = $mysqli->prepare("SELECT * FROM staff WHERE staff_id = ?");
		$s->bind_param("s", $staffid);
		$s->execute();

		$r = $s->get_result();

		if ($r->num_rows > 0) {
			return true;
		}else{
			return false;
		}
	}

	function password_match($staffid, $staffpass, $mysqli){
		$s = $mysqli->prepare("SELECT * FROM staff WHERE staff_id = ?");
		$s->bind_param("s", $staffid);
		$s->execute();

		$r = $s->get_result();

		if ($r->num_rows > 0) {
			$f = $r->fetch_assoc();
			if (password_verify($staffpass, $f["pass"])) {
				return true;
			}else{
				return false;
			}
		}
	}

	function getrole($staffid, $mysqli){
		$s = $mysqli->prepare("SELECT * FROM staff WHERE staff_id = ?");
		$s->bind_param("s", $staffid);
		$s->execute();

		$r = $s->get_result();

		if ($r->num_rows > 0) {
			$f = $r->fetch_assoc();
			return $f["role"];
		}
	}
	//Process Login Form
	if ($_SERVER["REQUEST_METHOD"] === "POST") {
		if (isset($_POST["staffSubmit"])) {
			$staffID = htmlentities(trim($_POST["staffId"]), ENT_QUOTES, "UTF-8");
			$staffPass = htmlentities(trim($_POST["staffPass"]), ENT_QUOTES, "UTF-8");

			if (empty($staffID) || empty($staffPass)) {
				$err = 'Fill the form!';
			}else if (!staff_exist($staffID, $mysqli)) {
				$err = "No record found!";
			}else{
				if (!password_match($staffID, $staffPass, $mysqli)) {
					$err = "Username and/or Password Incorrect!";
				}else{
					$err = "Successful! Redirecting.....";
					$_SESSION["staffID"] = $staffID;
					header("location: ".getrole($staffID, $mysqli)."/home.php");
				}
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Result Checker</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="overlay"></div>
	<section id="studentLogin">
		<div class="container">
			<div class="form-wrapper">
				<form method="POST">
					<div class="form-header">
						<h3><span style="color: blue;">Student</span> Login</h3>
						<p>Enter Username and Password to continue!</p>
					</div>
					<div class="form-group">
						<span style="color: red;">Error Msg</span>
						<!-- <span style="color: green;">Success Msg</span> -->
						<input type="text" name="username" placeholder="USERNAME" id="username">
					</div>

					<div class="form-group">
						<span style="color: red;">Error Msg</span>
						<!-- <span style="color: green;">Success Msg</span> -->
						<input type="password" name="password" placeholder="PASSWORD" id="password">
					</div>

					<div class="form-group">
						<button type="submit" name="submit">Login</button>
						<a id="showStaffSection" href="#">Staff Login</a>
					</div>
				</form>
			</div>
		</div>
	</section>

	<section id="staffLogin" style="display: none;">
		<div class="container">
			<div class="form-wrapper">
				<form method="POST">
					<div class="form-header">
						<h3><span style="color: blue;">Staff</span> Login</h3>
						<p>Enter Staff ID and Password to continue!</p>
						<?php 
							if (isset($err)) { ?>
								<h5 style="color: red;"><?php echo $err; ?></h5>
							<?php }else if(isset($success)){ ?>
								<h5 style="color: green;"><?php echo $success; ?></h5>
							<?php }
						?>
						
					</div>
					<div class="form-group">
						<input type="text" name="staffId" placeholder="STAFF ID" id="staffId">
					</div>

					<div class="form-group">
						<input type="password" name="staffPass" placeholder="PASSWORD" id="staffPass">
					</div>

					<div class="form-group">
						<button type="submit" name="staffSubmit">Login</button>
						<a id="showStudentSection" href="#">Student Login</a>
					</div>
				</form>
			</div>
		</div>
	</section>

	<script type="text/javascript">
		//grab all the IDs
		/* showStaffSection ID */
		var staffForm = document.querySelector("#showStaffSection");

		/* showStudentSection ID */
		var studentForm = document.querySelector("#showStudentSection");

		/* Staff Section Tag ID */
		var staffSection = document.querySelector("#staffLogin");

		/* Student Section Tag ID */
		var studentSection = document.querySelector("#studentLogin");

		//Hide and Show Forms on Click
		staffForm.addEventListener("click", function(){
			studentSection.style.display = "none";
			staffSection.style.display = "block";
		})

		studentForm.addEventListener("click", function(){
			staffSection.style.display = "none";
			studentSection.style.display = "block";
		})
	</script>
</body>
</html>