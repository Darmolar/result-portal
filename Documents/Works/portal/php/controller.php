<?php 
session_start();
require_once "../config/database.php";
require_once "function.php";

if ( $_SESSION['matricNo']) {
   $getUserDetails = select('users', 'matricNo', $_SESSION['matricNo'], $mysqli);
}
$config = getAllTable('configuration', $mysqli);
$rowConfig = $config->fetch_assoc();

if (isset($_POST['addUser'])) {
	$matricNo = secure($_POST['matricNo'], $mysqli);
	$password = secure($_POST['password'], $mysqli);
	$rePassword = secure($_POST['rePassword'], $mysqli);

	if (!empty($matricNo) && !empty($password)) {
		if (is_numeric($matricNo)) {
			if ($password == $rePassword) {
				$mdPass = md5($password);
				$insert = $mysqli->prepare("INSERT INTO users(matricNo, passKey) VALUES(?,?)");
				$insert->bind_param("is", $matricNo, $mdPass);
				if($insert->execute()) {
					$msg = array('status' => 1, 'msg' => "Success");
					$_SESSION['matricNo'] = $matricNo;
				}else{
					$msg = array('status' => 0, 'msg' => "An Error occured...........");
				}
			}else{
				$msg = array('status' => 0, 'msg' => "Password Does not match");
			}
		}else{
			$msg = array('status' => 0, 'msg' => "Invalid Matric Number");
		}
	}else{
		$msg = array('status' => 0, 'msg' => "All feilds are required");
	}
	print_r(json_encode($msg));
}

if (isset($_POST['loginDetails'])) {
	$matricNo = secure($_POST['matricNo'], $mysqli);
    $password = secure($_POST['password'], $mysqli);

    if (!empty($matricNo) && !empty($password)) {
    	if ($row = select('users', 'matricNo', $matricNo, $mysqli)) {
    		if ($row['passKey'] === md5($password)) {
    			$msg = array('status' => 1, 'msg' => "Success");
				$_SESSION['matricNo'] = $matricNo;
    		}else{
				$msg = array('status' => 0, 'msg' => "Invalid Password");
			}
    	}else{
		   $msg = array('status' => 0, 'msg' => "No user found");
	    }
    }else{
		$msg = array('status' => 0, 'msg' => "All feilds are required");
	}
	print_r(json_encode($msg));
}

if (isset($_POST['editAllMyProfile'])) {
	$fullName = secure($_POST['fullName'], $mysqli);
	$mobile = secure($_POST['mobile'], $mysqli);
	$mail = secure($_POST['mail'], $mysqli);
	$level = secure($_POST['level'], $mysqli);
	$department = secure($_POST['department'], $mysqli);

	if (!empty($fullName) && !empty($mobile) && !empty($mail) && !empty($level) && !empty($department)) {
		$update = $mysqli->prepare("UPDATE users SET fullName = ?, email = ?, phone = ?, level = ?, department = ? WHERE matricNo = ?");
		$update->bind_param("sssiii", $fullName, $mail, $mobile, $level, $department, $_SESSION['matricNo']);
		$update->execute();
		if ($update->affected_rows) {
			$msg = array('status' => 1, 'msg' => 'success');
		}else{
			$msg = array('status' => 0, 'msg' => 'An Error Occured............');
		}
	}else{
		$msg = array('status' => 0, 'msg' => 'All input feilds are required');
	}
	print_r(json_encode($msg));
}

if (isset($_POST['datas'])) {
	$selectedCourse = json_decode($_POST['datas'], true);
	$len = sizeof($selectedCourse);
	$resgistered = 0;
	$resgisteredCourse = [];
	for ($i=0; $i < $len; $i++) { 
		$select = $mysqli->prepare('SELECT * FROM courseregistration WHERE matricNo = ? AND course_id = ?');
		$select->bind_param("si", $_SESSION['matricNo'], $selectedCourse[$i]['id']);
		$select->execute();
		$res = $select->get_result();
		if($res->num_rows > 0){
			$rr = $res->fetch_assoc();
			$resgistered++;
			array_push($resgisteredCourse,  $selectedCourse[$i]['title']); 
		}
	}	

	if (sizeof($resgisteredCourse) < 1) {
		for ($i=0; $i < $len; $i++) { 
			$myStmt = "INSERT INTO courseregistration SET course_id = ?,  course_title = ?, matricNo = ?, level = ?, department = ?, session = ?";
			$insert = $mysqli->prepare($myStmt);
			$insert->bind_param("issiis", $selectedCourse[$i]['id'], $selectedCourse[$i]['title'], $_SESSION['matricNo'],  $getUserDetails['level'],  $getUserDetails['department'], $rowConfig['currSession']);
			$insert->execute();
		}
		if ($insert->error) {
			$msg = array('status' => 0, 'msg' => $rowConfig['currSession']. $insert->error);
		}else{
            $msg = array('status' => 1, 'msg' => 'success');
		}			
	}else{
       $msg = array('status' => 0, 'msg' =>  json_encode($resgisteredCourse));
	}

	print_r(json_encode($msg));
}

?>














































