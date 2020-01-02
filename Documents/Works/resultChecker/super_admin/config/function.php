<?php
	require_once '../database/db.php';

	if (isset($_SESSION["staffID"])) {
		$staffID = $_SESSION["staffID"];
		//get staff details
		$s = $mysqli->prepare("SELECT * FROM staff_profile WHERE staff_id = ?");
		$s->bind_param("s", $staffID);
		$s->execute();
		$r = $s->get_result();
		$f = $r->fetch_assoc();
		
		//Store datas
		$name = $f["name"];
		$email = $f["email"];
		$gender = $f["gender"];
		$mobile = $f["mobile"];
		$address = $f["address"];
		$image = $f["image"];
	}

	function logged_in(){
		if (isset($_SESSION["staffID"])) {
			return true;
		}else{
			return false;
		}
	}

	function getAllStaffExceptMe($staffid, $mysqli){
		$s = $mysqli->prepare("SELECT * FROM staff_profile WHERE staff_id != ?");
		$s->bind_param("s", $staffid);
		$s->execute();
		$r = $s->get_result();

		return $r;
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

	function email_exist($email, $mysqli){
		$s = $mysqli->prepare("SELECT * FROM staff_profile WHERE email = ?");
		$s->bind_param("s", $email);
		$s->execute();

		$r = $s->get_result();

		if ($r->num_rows > 0) {
			return true;
		}else{
			return false;
		}
	}

	function check_email($email, $staff_id, $mysqli){
		$s = $mysqli->prepare("SELECT * FROM staff_profile WHERE email = ? AND $staff_id = ?");
		$s->bind_param("ss", $email, $staff_id);
		$s->execute();

		$r = $s->get_result();

		if ($r->num_rows > 0) {
			return true;
		}else{
			return false;
		}
	}

	function getStaffDetails($staff_id, $mysqli){
		$s = $mysqli->prepare("SELECT * FROM staff_profile WHERE staff_id = ?");
		$s->bind_param("s", $staff_id);
		$s->execute();
		$r = $s->get_result();

		return $r;
	}