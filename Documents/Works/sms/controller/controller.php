<?php
//error_reporting(0);
@session_start();
//print_r($_POST);
include('../model/model.php');
$obj=new Master;

$day_of_the_week=array("0"=>"Sunday","1"=>"Monday","2"=>"Tuesday","3"=>"Wednesday","4"=>"Thursday","5"=>"Friday","6"=>"Saturday");
if(isset($_POST['token'])&& $_POST['token']!=$_SESSION['token']){
	//echo $_SESSION['token'];
	//die("User authentication Failed");
}



if(isset($_POST['creat_static_page'])){
	$title=$obj->Escape($_POST['page_title']);
	$content=$obj->Escape($_POST['page_content']);
	$status=$obj->Escape($_POST['active']);
	$res=$obj->Create_Static_Page($title,$content,$status);
	die($res);
}


if(isset($_POST['login'])){
	$username=$obj->Escape($_POST['username']);
	$password=$obj->Escape($_POST['password']);

	$res=$obj->Login($username,$password);
	die($res);


}

if(isset($_POST['edit_static_page'])){
	$title=$obj->Escape($_POST['page_title']);
	$content=$obj->Escape($_POST['page_content']);
	$status=$obj->Escape($_POST['active']);
	$page_id=$obj->Escape($_POST['page_id']);
	$res=$obj->Edit_Static_Page($page_id,$title,$content,$status);
	die($res);


}


if(isset($_POST['creat_static_page'])){
	$title=$obj->Escape($_POST['title']);
	$hostel=$obj->Escape($_POST['hostel']);
	$catefee=$obj->Escape($_POST['cateFee']);
	$catenote=$obj->Escape($_POST['cateNote']);
	$res=$obj-> Create_Hostel_Cate($title,$hostel,$catefee,$catenote);
	die($res);


}



if(isset($_POST['create_class'])){
	//print_r($_POST);
	$clname=$obj->Escape($_POST['cl_name']);
	$cl_teacher=$obj->Escape($_POST['cl_teacher']);
	$cl_related=json_encode($_POST['cl_related']);
	$class_dorm=json_encode($_POST['cl_dorm']);
	$res=$obj->Create_Class($clname,$cl_teacher,$cl_related,$class_dorm);
	die($res);


}

if(isset($_POST['create_subject'])){
	//print_r($_POST);
	$sub_name=$obj->Escape($_POST['subjectTitle']);
	$teacher=json_encode($_POST['teacherId']);
	$pass_grade=$_POST['passGrade'];
	$final_grade=$obj->Escape($_POST['finalGrade']);
	$res=$obj->Create_Subject($sub_name,$teacher,$pass_grade,$final_grade);
	die($res);


}

if(isset($_POST['create_section'])){
	//print_r($_POST);
	$sec_name=$obj->Escape($_POST['section_name']);
	$sec_title=$_POST['section_title'];
	$sec_class=$_POST['class'];
	$sec_teacher=$obj->Escape($_POST['teacher']);
	$res=$obj->Create_Section($sec_name,$sec_title,$sec_class,$sec_teacher);
	die($res);


}


if(isset($_POST['edit_subject'])){
	//print_r($_POST);
	$sub_id=$obj->Escape($_POST['sub_id']);
	$sub_name=$obj->Escape($_POST['subjectTitle']);
	$teacher=json_encode($_POST['teacherId']);
	$pass_grade=$_POST['passGrade'];
	$final_grade=$obj->Escape($_POST['finalGrade']);
	$res=$obj->Edit_Subject($sub_id,$sub_name,$teacher,$pass_grade,$final_grade);
	die($res);
}


if(isset($_POST['create_teacher'])){
	//print_r($_POST);
	if(!isset($_POST['gender'])){
		die("Please Select Gender");
	}
	$username=$obj->Escape($_POST['username']);
	if($obj->CheckUname($username,"users")==true){
		die("Username Already Exist");
	}
	$fname=$obj->Escape($_POST['fname']);
	$username=$obj->Escape($_POST['username']);
	$email=$obj->Escape($_POST['email']);
	$pass=$obj->Escape($_POST['password']);
	$bday=$obj->Escape($_POST['birthday']);
	$gender=$obj->Escape($_POST['gender']);
	$add=$obj->Escape($_POST['address']);
	$phone=$obj->Escape($_POST['phone']);
	$transport=$obj->Escape($_POST['transport']);
		$folder=sha1($email);
		$obj->Create_Users($username,$fname,$email,$pass,$transport,$obj->priv['Teacher'],$folder);
	$id= mysqli_insert_id($obj->db);
	$res=$obj->Create_Teacher($id,$fname,$username,$email,$pass,$bday,$gender,$add,$phone,$transport);
		die($res);



}

if(isset($_POST['edit_teacher'])){
	//print_r($_POST);
	if(!isset($_POST['gender'])){
		die("Please Select Gender");
	}
	$fname=$obj->Escape($_POST['fname']);
	$username=$obj->Escape($_POST['username']);
	$email=$obj->Escape($_POST['email']);
	$pass=$obj->Escape($_POST['password']);
	$bday=$obj->Escape($_POST['birthday']);
	$gender=$obj->Escape($_POST['gender']);
	$add=$obj->Escape($_POST['address']);
	$phone=$obj->Escape($_POST['phone']);
	$transport=$obj->Escape($_POST['transport']);
		$folder=sha1($email);
		$obj->Update_Users($username,$fname,$pass,$transport,$obj->priv['Teacher'],$folder,$_POST['uid']);
	$res=$obj->Edit_Teacher($_POST['uid'],$fname,$username,$email,$pass,$bday,$gender,$add,$phone,$transport);
	die($res);
}

if(isset($_POST['create_student'])){
	//print_r($_POST);
	if(!isset($_POST['gender'])){
		die("Please Select Gender");
	}
	$fname=$obj->Escape($_POST['fname']);
	$rollid=$obj->Escape($_POST['rollid']);
	$username=$obj->Escape($_POST['username']);
	$email=$obj->Escape($_POST['email']);
	$pass=$obj->Escape($_POST['password']);
	$bday=$obj->Escape($_POST['birthday']);
	$gender=$obj->Escape($_POST['gender']);
	$add=$obj->Escape($_POST['address']);
	$phone=$obj->Escape($_POST['phone']);
	$class=$obj->Escape($_POST['class']);
	$section=$obj->Escape($_POST['section']);
	$transport=$obj->Escape($_POST['transport']);
	$hostel=$obj->Escape($_POST['hostel']);
		$folder=sha1($email);
	$obj->Create_Users($username,$fname,$email,$pass,$transport,$obj->priv['Student'],$folder);
		$id= mysqli_insert_id($obj->db);
	$res=$obj->Create_Student($id,$fname,$rollid,$username,$email,$pass,$bday,$gender,$add,$phone,$class,$section,$transport,$hostel);
	die($res);
}

if(isset($_POST['edit_student'])){
	//print_r($_POST);
	if(!isset($_POST['gender'])){
		die("Please Select Gender");
	}
	$fname=$obj->Escape($_POST['fname']);
	$rollid=$obj->Escape($_POST['rollid']);
	$username=$obj->Escape($_POST['username']);
	$email=$obj->Escape($_POST['email']);
	$pass=$obj->Escape($_POST['password']);
	$bday=$obj->Escape($_POST['birthday']);
	$gender=$obj->Escape($_POST['gender']);
	$add=$obj->Escape($_POST['address']);
	$phone=$obj->Escape($_POST['phone']);
	$class=$obj->Escape($_POST['class']);
	$section=$obj->Escape($_POST['section']);
	$transport=$obj->Escape($_POST['transport']);
	$hostel=$obj->Escape($_POST['hostel']);
		$folder=sha1($email);
	$obj->Update_Users($username,$fname,$pass,$transport,$obj->priv['Teacher'],$folder,$uid);
	$res=$obj->Edit_Student($_POST['uid'],$fname,$rollid,$username,$email,$pass,$bday,$gender,$add,$phone,$class,$section,$transport,$hostel);
	die($res);
}


if(isset($_POST['create_event'])){
	$title=$obj->Escape($_POST['title']);
	$desc=$obj->Escape($_POST['eventdesc']);
	$place=$obj->Escape($_POST['eventplace']);
	$for=$obj->Escape($_POST['eventfor']);
	$date=$obj->Escape($_POST['eventdate']);
	$res=$obj->Create_Event($title,$desc,$place,$for,$date);
	die($res);
}

if(isset($_POST['edit_event'])){
	$eid=$obj->Escape($_POST['eid']);
	$title=$obj->Escape($_POST['title']);
	$desc=$obj->Escape($_POST['eventdesc']);
	$place=$obj->Escape($_POST['eventplace']);
	$for=$obj->Escape($_POST['eventfor']);
	$date=$obj->Escape($_POST['eventdate']);
	$res=$obj->Edit_Event($eid,$title,$desc,$place,$for,$date);
	die($res);
}

if(isset($_POST['create_news'])){
	$title=$obj->Escape($_POST['newstitle']);
	$con=$obj->Escape($_POST['newstext']);
	$for=$obj->Escape($_POST['newsfor']);
	$date=$obj->Escape($_POST['newsdate']);
	$res=$obj->Create_News($title,$con,$for,$date);
	die($res);
}

if(isset($_POST['edit_news'])){
	$nid=$obj->Escape($_POST['nid']);
	$title=$obj->Escape($_POST['newstitle']);
	$con=$obj->Escape($_POST['newstext']);
	$for=$obj->Escape($_POST['newsfor']);
	$date=$obj->Escape($_POST['newsdate']);
	$res=$obj->Edit_News($nid,$title,$con,$for,$date);
	die($res);
}


if(isset($_POST['create_transport'])){
	$title=$obj->Escape($_POST['title']);
	$desc=$obj->Escape($_POST['desc']);
	$contact=$obj->Escape($_POST['contact']);
	$fare=$obj->Escape($_POST['fare']);
	$res=$obj->Create_Transportation($title,$desc,$contact,$fare);
	die($res);
}

if(isset($_POST['edit_transport'])){
	$tid=$obj->Escape($_POST['tid']);
	$title=$obj->Escape($_POST['title']);
	$desc=$obj->Escape($_POST['desc']);
	$contact=$obj->Escape($_POST['contact']);
	$fare=$obj->Escape($_POST['fare']);
	$res=$obj->Edit_Transportation($tid,$title,$desc,$contact,$fare);
	die($res);
}

if(isset($_POST['create_library'])){

	$title=$obj->Escape($_POST['book_name']);
	$desc=$obj->Escape($_POST['bookdesc']);
	$author=$obj->Escape($_POST['bookauthor']);
	$type=$obj->Escape($_POST['booktype']);
	$price=$obj->Escape($_POST['bookprice']);
	$state=$obj->Escape($_POST['bookstate']);
	$res=$obj->Create_Library($title,$desc,$price,$author,$type,$state);
	die($res);
}

if(isset($_POST['updated_library'])){

	$title=$obj->Escape($_POST['book_name']);
	$desc=$obj->Escape($_POST['bookdesc']);
	$author=$obj->Escape($_POST['bookauthor']);
	$type=$obj->Escape($_POST['booktype']);
	$price=$obj->Escape($_POST['bookprice']);
	$state=$obj->Escape($_POST['bookstate']);
	$res=$obj->Create_Library($_POST['lib_id'],$title,$desc,$price,$author,$type,$state);
	die($res);
}

if(isset($_POST['create_material'])){
	$title=$obj->Escape($_POST['material_title']);
	$desc=$obj->Escape($_POST['material_description']);
	$section=$obj->Escape($_POST['sectionId']);
	for($i=0;$i<count($_POST['class_id']);$i++){
	$res=$obj->Create_Study_Materials($title,$desc,$_POST['class_id'][$i],$section);
	}
	die($res);
}

if(isset($_POST['edit_material'])){
	$title=$obj->Escape($_POST['material_title']);
	$desc=$obj->Escape($_POST['material_description']);
	$section=$obj->Escape($_POST['sectionId']);
	$stm_id=$_POST['stm_id'];
	for($i=0;$i<count($_POST['class_id']);$i++){
	$res=$obj->Edit_Study_Materials($stm_id,$title,$desc,$_POST['class_id'][$i],$section);
	}
	die($res);
}


if(isset($_POST['create_hostel'])){
	$title=$obj->Escape($_POST['title']);
	$type=$obj->Escape($_POST['type']);
	$add=$obj->Escape($_POST['address']);
	$manager=$_POST['manager'];
	$note=$_POST['notes'];
	$res=$obj->Create_Hostel($title,$type,$add,$manager,$note);
	die($res);
}


if(isset($_POST['edit_hostel'])){
	$title=$obj->Escape($_POST['title']);
	$type=$obj->Escape($_POST['type']);
	$add=$obj->Escape($_POST['address']);
	$manager=$_POST['manager'];
	$note=$_POST['notes'];
	$hostel_id=$_POST['hostel_id'];
	$res=$obj->Edit_Hostel($hostel_id,$title,$type,$add,$manager,$note);
	die($res);
}


if(isset($_POST['create_hostel_cate'])){
	$title=$obj->Escape($_POST['title']);
	$hostel=$obj->Escape($_POST['hostel']);
	$catefee=$obj->Escape($_POST['catFees']);
	$catenote=$obj->Escape($_POST['catNotes']);
	$res=$obj-> Create_Hostel_Cate($title,$hostel,$catefee,$catenote);
	die($res);


}


if(isset($_POST['edit_hostel_cate'])){
	$title=$obj->Escape($_POST['title']);
	$id=$obj->Escape($_POST['id']);
	$hostel=$obj->Escape($_POST['hostel']);
	$catefee=$obj->Escape($_POST['catFees']);
	$catenote=$obj->Escape($_POST['catNotes']);
	$res=$obj-> Edit_Hostel_Cate($id,$title,$hostel,$catefee,$catenote);
	die($res);


}

if(isset($_POST['create_gradelevel'])){
	$name=$obj->Escape($_POST['gradeName']);
	$desc=$obj->Escape($_POST['gradeDesc']);
	$point=$obj->Escape($_POST['gradePoints']);
	$from=$obj->Escape($_POST['gradeFrom']);
	$to=$obj->Escape($_POST['gradeTo']);
	$res=$obj->Create_Grade_Level($name,$desc,$point,$from,$to);
	die($res);
}

if(isset($_POST['edit_gradelevel'])){

	$id=$obj->Escape($_POST['id']);
	$name=$obj->Escape($_POST['gradeName']);
	$desc=$obj->Escape($_POST['gradeDesc']);
	$point=$obj->Escape($_POST['gradePoints']);
	$from=$obj->Escape($_POST['gradeFrom']);
	$to=$obj->Escape($_POST['gradeTo']);
	$res=$obj->Edit_Grade_Level($id,$name,$desc,$point,$from,$to);
	die($res);


}


if(isset($_POST['create_assignment'])){
	$title=$obj->Escape($_POST['title']);
	$desc=$obj->Escape($_POST['desc']);
	$class=json_encode($_POST['classId']);
	$section=json_encode($_POST['sectionId']);
	$subject=$obj->Escape($_POST['subjectId']);
	$deadline=$obj->Escape($_POST['deadLine']);
	$res=$obj->Create_Assignment($class,$section,$subject,$_SESSION['uid'],$title,$desc,$deadline);
	die($res);
}


if(isset($_POST['edit_assignment'])){
	$id=$obj->Escape($_POST['id']);
	$title=$obj->Escape($_POST['title']);
	$desc=$obj->Escape($_POST['desc']);
	$class=json_encode($_POST['classId']);
	$section=json_encode($_POST['sectionId']);
	$subject=$obj->Escape($_POST['subjectId']);
	$deadline=$obj->Escape($_POST['deadLine']);
	$res=$obj->Edit_Assignment($id,$class,$section,$subject,$_SESSION['uid'],$title,$desc,$deadline);
	die($res);


}

if(isset($_POST['create_class_schedule'])){
	$class=$obj->Escape($_POST['classId']);
	$sub_id=$obj->Escape($_POST['subjectId']);
	$day=$obj->Escape($_POST['dayOfWeek']);
	$start=$obj->Escape($_POST['startTimeHour'].":".$_POST['startTimeMin']);
	$end=$obj->Escape($_POST['endTimeHour'].":".$_POST['endTimeMin']);
	$res=$obj->Create_Class_Schedule($class,$sub_id,$day,$start,$end);
	die($res);

}

if(isset($_POST['edit_class_schedule'])){
	$sch_id=$obj->Escape($_POST['sch_id']);
	$sub_id=$obj->Escape($_POST['subjectId']);
	$day=$obj->Escape($_POST['dayOfWeek']);
	$start=$obj->Escape($_POST['startTimeHour'].":".$_POST['startTimeMin']);
	$end=$obj->Escape($_POST['endTimeHour'].":".$_POST['endTimeMin']);
	$res=$obj->Edit_Class_Schedule($sub_id,$day,$start,$end,$sch_id);
	die($res);
}


if(isset($_GET['get_section'])){

	$obj->Get_Section();
}

if(isset($_GET['get_subject'])){
	$class=$obj->Escape($_GET['class']);
	$obj-> Get_Subject($class);
}



if(isset($_POST['control_attendance'])){

	$class=$obj->Escape($_POST['class']);
	$subject=$obj->Escape($_POST['subject']);
	$date=$obj->Escape($_POST['date']);
	for($j=0;$j<$_POST['total'];$j++){

	$res=$obj->Control_Attendance($class,$subject,$date,$obj->Escape($_POST['student'][$j]),$obj->Escape($_POST['att'.$j]));
}
	if($res){
			die("Attendance Created Successfully");

		}else{
			die("An Error Occurred While Creating Attendance");
	}
}


if(isset($_POST['add_parent'])){
	$data=json_encode($_POST);
	//$obj->Create_Users($username,$fname,$pass,$transport,$obj->priv['Teacher'],$folder);
	 $res=$obj->Create_Parent($data);
	die($res);
}
if(isset($_POST['edit_parent'])){
	$data=json_encode($_POST);
		$pid=$_POST['pid'];
	 $res=$obj->Update_Parent($data,$pid);
	die($res);
}

if(isset($_POST['send_msg'])){
	$reci=$_POST['reci'][0];
		$message=$obj->Escape($_POST['message']);
	 $res=$obj->Send_Messsag($_SESSION['uid'],$reci,$message);
	die($res);
}
if(isset($_GET['Delete_Record'])){

	$msg=$obj->Escape($_GET['msg']);
	$table=$obj->Escape($_GET['table']);
	$key=$obj->Escape($_GET['key']);
	$value=$obj->Escape($_GET['val']);
	echo $obj->Delete_Record($msg,$table,$key,$value);
}
if(isset($_POST['submit_ass'])){
	$usernote=$obj->Escape($_POST['note']);
	$assid=$obj->Escape($_POST['ass_id']);
	$title=$obj->Escape($_POST['title']);
	echo $obj->Upload_Assignment($assid,$_SESSION['uid'],$usernote,$title);
}
//print_r($_POST);
if(isset($_POST['create_exam'])){
	$title=$obj->Escape($_POST['examTitle']);
	$desc=$obj->Escape($_POST['examDescription']);
	$class=json_encode($_POST['examClasses']);
	$date=$obj->Escape($_POST['examDate']);
	$year=explode("-",$obj->Escape($_POST['examDate']))[0];
	$field=json_encode($_POST['sheet']);
	echo $obj->Create_Exam($title,$desc,$class,$field,$date,$year);
}

if(isset($_POST['create_online_exam'])){
	$title=$obj->Escape($_POST['examTitle']);
	$desc=$obj->Escape($_POST['examDescription']);
	$class=json_encode($_POST['examClass']);
	$section=json_encode($_POST['sectionId']);
	$sub=$obj->Escape($_POST['examSubject']);
	$date=$obj->Escape($_POST['examDate']);
	$explode_year=explode("/",$obj->Escape($_POST['examDate']));
	if(isset($explode_year[2])){
	   $year=$explode_year[2];
	}else{
		die('Incorrect date formate');
	}
	//print_r($year);
	$enddate=$obj->Escape($_POST['ExamEndDate']);
	$minute=$obj->Escape($_POST['examTimeMinutes']);
	echo $obj->Create_Online($title,$desc,$class,$section,$_SESSION['uid'],$sub,$date,$year,$enddate,$minute,"1");
}
if(isset($_POST['add_question'])){
	echo $obj->Add_Questions();
}
if(isset($_POST['edit_question'])){
	echo $obj->Edit_Questions();
}

if(isset($_POST['add_fee_type'])){
	$title=$obj->Escape($_POST['title']);
	$desc=$obj->Escape($_POST['description']);
	$amount=$obj->Escape($_POST['amount']);
	$schedule=$obj->Escape($_POST['schedule']);
	echo $obj->Create_Fee_type($title,$desc,$amount,$schedule);
}

if(isset($_POST['edit_fee_type'])){
	$title=$obj->Escape($_POST['title']);
	$desc=$obj->Escape($_POST['description']);
	$amount=$obj->Escape($_POST['amount']);
	$schedule=$obj->Escape($_POST['schedule']);
	echo $obj->Edit_Fee_type($title,$desc,$amount,$schedule);
}

if(isset($_POST['add_fee_allocation'])){
	$title=$obj->Escape($_POST['title']);
	$type=$obj->Escape($_POST['fee_type']);
	$alloc_type=$obj->Escape($_POST['allocate_to']);
	$alloc_to=$obj->Escape($_POST['allocate_to']);
	echo $obj->Allocate_Fee($title,$type,$alloc_type,$alloc_to);
}

if(isset($_POST['edit_fee_allocation'])){
	$title=$obj->Escape($_POST['title']);
	$type=$obj->Escape($_POST['fee_type']);
	$alloc_type=$obj->Escape($_POST['allocate_to']);
	$alloc_to=$obj->Escape($_POST['allocate_to']);
	$alloc_id=$obj->Escape($_POST['alloc_id']);
	echo $obj->Edit_Allocated_Fee($title,$type,$alloc_type,$alloc_to,$alloc_id);
}


if(isset($_POST['create_expenses_cate'])){
	$title=$obj->Escape($_POST['title']);
	$desc=$obj->Escape($_POST['desc']);
	echo $obj->Create_Expense_Cate($title,$desc);
}

if(isset($_POST['edit_expenses_cate'])){
	$title=$obj->Escape($_POST['title']);
	$desc=$obj->Escape($_POST['desc']);
	$cate_id=$obj->Escape($_POST['id']);
	echo $obj->Edit_Expense_Cate($title,$desc,$cate_id);
}

if(isset($_POST['add_expenses'])){
	$title=$obj->Escape($_POST['title']);
	$amount=$obj->Escape($_POST['amount']);
	$cate=$obj->Escape($_POST['cate']);
	$note=$obj->Escape($_POST['note']);
	echo $obj->Create_Expenses($title,$amount,$cate,$note);
}

if(isset($_POST['edit_expenses'])){
	$title=$obj->Escape($_POST['title']);
	$amount=$obj->Escape($_POST['amount']);
	$cate=$obj->Escape($_POST['cate']);
	$note=$obj->Escape($_POST['note']);
	$exp_id=$obj->Escape($_POST['exp_id']);
	echo $obj->Edit_Expenses($title,$amount,$cate,$note,$exp_id);
}

if(isset($_POST['create_grade'])){
	echo $obj->Add_Grade();
}


if(isset($_GET['receipt'])){
	echo $obj->Generate_Receipt_ForAll();
}

if(isset($_POST['update_payment'])){
		$rid=$obj->Escape($_POST['rid']);
		$ref=$obj->Escape($_POST['ref']);
		$obj->Execute_Query("update reciept set status=1,ref='$ref' where re_id=$rid");
}

if(isset($_POST['link_parent'])){
		$std_id=$obj->Escape($_POST['uid']);
		$pid=$obj->Escape($_POST['pid']);
		$obj->Link_Parent($std_id,$pid);
}

if(isset($_POST['configure'])){
		$school_name=$obj->Escape($_POST['app_name']);
		$desc=$obj->Escape($_POST['desc']);
		$session=$obj->Escape($_POST['session']);
		$term=$obj->Escape($_POST['term']);
		$uid=$obj->Escape($_SESSION['uid']);
		$obj->System_Setting($school_name,$desc,$session,$term,$uid);
}


if (isset($_POST['add_admin'])) {
	$admin_uname = $obj->Escape($_POST['admin_uname']);
	$admin_name = $obj->Escape($_POST['admin_name']);
	$admin_mail = $obj->Escape($_POST['admin_mail']);
	$admin_gender = $obj->Escape($_POST['admin_gender']);
	$admin_number = $obj->Escape($_POST['admin_number']);
	$admin_pass = $obj->Escape($_POST['admin_pass']);
	$obj->Add_admin($admin_uname, $admin_name, $admin_mail, $admin_gender, $admin_number, $admin_pass);
}
//echo $obj->Get_Grade_And_Remark("44");

?>

















