<?php
 session_start();
 require_once "../../config/database.php";
 require_once "function.php";

if (isset($_POST['adminLogin'])) {
  $userid = secure($_POST['userid'], $mysqli);
  $pass   = secure($_POST['password'], $mysqli);



  if (!empty($userid) && !empty($pass)) {
  	 $row = select('admin', 'userid', $userid, $mysqli);
  	  if ($row['passkey'] === md5($pass)) {
  	  	$msg = array('status' => 1, 'msg' => "Success");
  	  	$_SESSION['localAdmin'] = $userid;
  	  }else{
  	  	$msg = array('status' => 0, 'msg' => "Invalid Password");
  	  }
  }else{
  	$msg = array('status' => 0, 'msg' => "All feilds are required");
  }

  print_r(json_encode($msg));
}

if (isset($_POST['addSessions'])) {
   $session = secure($_POST['addSession'], $mysqli);
   if (!empty($session)) {
      $insert = $mysqli->prepare("INSERT INTO sessions(name) VALUES(?)");
      $insert->bind_param("s", $session);
      if ($insert->execute()) {
        $msg = array('status' => 1, 'msg' => "Success");
      }else{
        $msg = array('status' => 0, 'msg' => "Invalid Password");
      }
   }else{
    $msg = array('status' => 0, 'msg' => "All feilds are required");
  }
  print_r(json_encode($msg));
}


if (isset($_POST['addDepartments'])) {
   $department = secure($_POST['addDepartment'], $mysqli);
   if (!empty($department)) {
      $insert = $mysqli->prepare("INSERT INTO departments(name) VALUES(?)");
      $insert->bind_param("s", $department);
      if ($insert->execute()) {
        $msg = array('status' => 1, 'msg' => "Success");
      }else{
        $msg = array('status' => 0, 'msg' => "Invalid Password");
      }
   }else{
    $msg = array('status' => 0, 'msg' => "All feilds are required");
  }
  print_r(json_encode($msg));
}

if (isset($_POST['addcourse'])) {
  $preCouser = secure($_POST['preCouser'], $mysqli);
  $preCouserName = secure($_POST['preCouserName'], $mysqli);
  $department = secure($_POST['department'], $mysqli);
  $semester = secure($_POST['semester'], $mysqli);
  $level = secure($_POST['level'], $mysqli);
  $status = 1;
  $insert = $mysqli->prepare("INSERT INTO courses(name, title, department, semester, level, status) VALUES(?,?,?,?,?,?)");
  $insert->bind_param("ssisss", $preCouser, $preCouserName, $department, $semester, $level, $status);
  if ($insert->execute()) {
     $msg = array('status' => 1, 'msg' => "Success");
  }else{
     $msg = array('status' => 0, 'msg' => "Invalid Password");
  }
  print_r(json_encode($msg));
}

if (isset($_POST['uploadAllResult'])) {
  $selectSession = $_POST['selectSession'];
  $selectDepartment = $_POST['selectDepartment'];
  $selectCourse = $_POST['selectCourse'];
  $uploadResult_name = $_FILES['uploadResult']['name'];
  $uploadResult_tmp_name = $_FILES['uploadResult']['tmp_name'];
  $allArray = [];
  $file = fopen($uploadResult_tmp_name , "r" );
  $i = 0;
  while ($data = fgetcsv($file, 2000, ",")){
    $allArray[$i] = $data;
    $i++;
  }
  $available = 0;
  for ($i=0; $i < sizeof($allArray); $i++) { 
    $sel = $mysqli->prepare("SELECT * FROM result WHERE course = ? AND  matricNo = ?");
    $sel->bind_param("is", $selectCourse,  $allArray[$i][0]);
    $sel->execute();
    $fet = $sel->get_result();
    if ($fet->num_rows > 0) {
      $available = $available + 1;
    }
  }
 
 if ($available > 0) {
   for ($i=0; $i < sizeof($allArray); $i++) { 
      $insert = $mysqli->prepare("UPDATE result SET course = ?,  department = ?, testScore = ?, examScore = ?, grade = ? WHERE  matricNo = ?");
      $insert->bind_param("iiiiss", $selectCourse, $selectDepartment, $allArray[$i][1], $allArray[$i][2], $allArray[$i][4], $allArray[$i][0]);
      $insert->execute();
    }
 }else{
   for ($i=0; $i < sizeof($allArray); $i++) { 
      $insert = $mysqli->prepare("INSERT INTO result SET course = ?,  department = ?, matricNo = ?, testScore = ?, examScore = ?, grade = ?");
      $insert->bind_param("iisiis", $selectCourse, $selectDepartment, $allArray[$i][0], $allArray[$i][1], $allArray[$i][2], $allArray[$i][4]);
      $insert->execute();
    }
 }
 $fileId = uniqid();
 $fileExtension = pathinfo($uploadResult_name, PATHINFO_EXTENSION);
 move_uploaded_file($uploadResult_tmp_name, "../file/");
  
  if (!$insert->error) {
    $msg = array('status' => 1, 'msg' =>  'Success');
  }else{
    $msg = array('status' => 1, 'msg' =>  'An Error Occured.....'.$insert->error);
  }
   
  print_r(json_encode($msg));
  }

?>



























