<?php

//The functions name is very specific, it explains it all
require('../config/connect.php');
class Master{
	private $obj;
	public $db;

	public $priv=array("Admin"=>1,"Teacher"=>2,"Student"=>3,"Parent"=>4);
	//$_SESSION['admin_id']="hey";

		//class constructor
	function __construct(){
		$this->obj=new connection;

		$this->db=$this->obj->connect();



		//array_walk_recursive($_POST,'mysqli_real_escape_string');
		}

		function __destruct(){

			}
			///handles all sql query execution
			function Execute_Query($sql){
				$res=mysqli_query($this->db,$sql) or die(mysqli_error($this->db));
				if($res){
				return 1;
				}
			}

	//checks if a data exist

	public function Is_Data_Exist($sql){
		$res=$this->Execute_Query($sql);
		$num_row=mysqli_num_rows($res);
		if($num_row>0)
		{
			return 1;

		}

	}



	//change password
public function Change_Pass($npass,$opass,$cnpass){
				$msg="";

				$nhashp=md5($npass);
					$cnhashp=md5($cnpass);
						$ohashp=md5($opass);
					//	return $ohashp;

		if($npass==$cnpass){
			$uname=$_SESSION['uname'];

			$sql="update registration set pass='$nhashp'";
				$res=$this->Execute_Query($sql);
				if($res){
					$msg=array("1"=>"Password Changed Successfully");
				}
				}
			else{

				$msg=array("0"=>"Wrong Password combination");
			}
			return json_encode($msg,JSON_FORCE_OBJECT);
			}

			//checks if user is activated
		 function Check_Activation($uname,$pass){
			$qry="select * from users where username='$uname'";
			$res=mysqli_query($this->db,$qry);
			$rows = mysqli_fetch_array($res);
			if($rows['activated'] == 1 ){
			    return true;
			}else{
			    return false;
			}
// 			$num_rows=mysqli_num_rows($res);
// 			return $num_rows;
// 				$row=mysqli_fetch_assoc($res);
// 		        return $row['activated'];
// 			}
    	}

			//checks if username alrady exist
				function CheckUname($uname,$table){

			$qry="select * from ".$table." where username='$uname'";
			$res=mysqli_query($this->db,$qry);
			$num_rows=mysqli_num_rows($res);
			if ($num_rows>0){
				  return true;
				}
			}

			//chacks if email already exist
				function Check_Email($email,$table){

			$qry="select * from ".$table." where email='$email'";
			$res=mysqli_query($this->db,$qry);
			$num_rows=mysqli_num_rows($res);
			if ($num_rows>0){
				  return true;
				}
			}



			//sends email
			function Send_signup_Mail($email,$fname,$phone,$password,$hash){


				$to = $email; // Send email to our user
				$subject = 'Signup | Verification'; // Give the email a subject
				$message = 'Thanks for signing up!
				Your account has been created, you can login with the below credentials after activating your account. You can activate your account by clicking the link below.

				------------------------
				Email: '.$email.'
				Fullname: '.$fname.'
				Phone: '.$phone.'
				------------------------

				Please click this link to activate your account:
				http://builderspayrise.com/portal/activate.php?email='.$email.'&hash='.$hash.'

				'; // Our message above including the link

				$headers = 'From:builderspayrise <noreply@builderspayrise.com>' . "\r\n"; // Set from headers
				mail($to, $subject,$message, $headers); // Send our email

			}





		   //logs user in
		  function Login($uname,$lpass){
				$msg="";
				$hashp=$lpass;
				//echo $hashp;
				$qry="SELECT * from users where username='$uname' and password='$hashp'";
				$res=mysqli_query($this->db,$qry);
				$num_rows=mysqli_num_rows($res);
				if ($num_rows>0){
					$row=mysqli_fetch_assoc($res);
					//$fetch_settings=$obj->Get_All_Data("select * from settings where setting_id=".$row['school_id']."");
					$_SESSION['uid']       = $row['uid'];
					$_SESSION['school_id'] = $row['school_id'];
					$_SESSION['username']  = $row['username'];
					$_SESSION['name']      = $row['fname'];
					$_SESSION['email']     = $row['email'];
					$_SESSION['priv']      = $row['priv'];
					$_SESSION['token']     = md5(uniqid(microtime(),true));
						 if ($this->Check_Activation($uname,$lpass)>0){
					       $msg=array(0=>" Loading...", 1 => $_SESSION['priv']);
						 }
						 else{
							$msg=array(0=>" Account not activated. Please check your email for activation link");
						 }
					}
					else{
						 $msg=array(0=>" Login Failed! Please Check your username and password");
					}
					die(json_encode($msg,JSON_FORCE_OBJECT));
					}


//gets a single record
	public function Get_Data($sql){
		$fecth="";
		$res=mysqli_query($this->db,$sql);
		$num_row=mysqli_num_rows($res);
		if($num_row>0)
		{
		$fetch=mysqli_fetch_assoc($res);

		return $fetch;
	}
	}

	//gets all records
	public function Get_All_Data($sql){
		$data_array=array();
		$res=mysqli_query($this->db,$sql)or die(mysqli_error($this->db));
		$num_row=mysqli_num_rows($res);
		if($num_row>0)
		{
			while($fetch=mysqli_fetch_assoc($res)){
		$data_array[]=$fetch;
			}
			return $data_array;
		}

	}

	//deletes records from database
	public function Delete_Data($sql){
		$msg="";
		$res=mysqli_query($this->db,$sql);
		if($res)
		{
			$msg=array("1"=>"Data Deleted Successfully");
			}
			else{
				$msg=array("0"=>"An Error Occurred While Deleting Data");
			}
			return json_encode($msg,JSON_FORCE_OBJECT);
		}

	//delete multiple records
	public function Multi_Delete($select,$table,$table_id,$idvalue){
		$msg="";
		$selector=$select;
		$N=count($selector);
		for($i=0;$i<$N;$i++){
		$res=mysqli_query($this->db,"Delete from ".$table." where ".$table_id."='$idvalue[$i]'");
		}
		if($res)
		{
			$msg=array("1"=>"".$N. " Data Deleted Successfully");
			}
			else{
				$msg=array("0"=>"An Error Occurred While Deleting Data".mysql_error());
			}
			return json_encode($msg,JSON_FORCE_OBJECT);
		}

		//escapes record
	public function Escape($val){

		$clean=mysqli_real_escape_string($this->db,$val);
		return $clean;

	}

	//counts records
	function Count_Record($sql){
		$tot=$this->Get_All_Data($sql);
		return count($tot);
	}



//email sending parser
public function Email_Temp($to,$subject,$body,$alert){

						//echo $data['data']['gal_qr'];
				 // Send email to our user

$subject =$subject;
//echo $uid;

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .='From:Builderspayrise<noreply@Builderspayrise.com>' . "\r\n";

$check=mail($to, $subject,$body, $headers); // Send our email

$check="";
if($check!=false){
	$msg=array("1"=>"Mail Successfully. Please click the link to verify");
		}
		else{
			$msg=array("0"=>"An Error Occurred While Sending You Verification mail");
			}
			if ($alert==true){
				return json_encode($msg);
			}

}

		//send message to user
		public function Send_Msg(){
			$sql="INSERT INTO `message` set `sender_id`=".$_SESSION['uid'].", `reader_id`=0, `content`='".$_POST['message']."', `cate`='".$_POST['cate']."'";
			$res=$this->Execute_Query($sql);
			if($res){
				die("Ticket Created Successfully");
			}else{
					die("An Error Occurred While Creating Your Ticket");
			}
		}


	//creates static page
	public function Create_Static_Page($title,$content,$status){

		$sql="INSERT INTO `static_page` set `title`='$title', `content`='$content', `status`=$status, school_id=".$_SESSION['school_id']."";

		$res=$this->Execute_Query($sql);
		if($res){
			die("Static Page Created Successfully");

		}else{

			die("An Error Occurred While Creating Static Page");
		}
	}
		//edit static page
		public function Edit_Static_Page($page_id,$title,$content,$status){

		$sql="UPDATE `static_page` set `title`='$title', `content`='$content', `status`=$status where `page_id`=$page_id";

		$res=$this->Execute_Query($sql);
		if($res){
			die("Static Page Updated Successfully");

		}else{

			die("An Error Occurred While Updating for Static Page");
		}


	}



	public function Create_Class($claname,$cl_teacher,$cl_related,$class_dorm){

		$sql="INSERT INTO `class` set `clname`='$claname', `clteacher`='$cl_teacher', `clrelated`='$cl_related', `classdorm`='$class_dorm',school_id=".$_SESSION['school_id']."";

		$res=$this->Execute_Query($sql);
		if($res){
			die("Class Created Successfully");

		}else{

			die("An Error Occurred While Creating Class");
		}
	}
	public function Edit_Class($cl_id,$claname,$cl_teacher,$cl_related,$class_dorm){

		$sql="UPDATE `class` set `clname`='$claname', `clteacher`='$cl_teacher', `clrelated`='$cl_related', `classdorm`='$class_dorm' where cl_id=$cl_id";

		$res=$this->Execute_Query($sql);
		if($res){
			die("Class Edited Successfully");

		}else{

			die("An Error Occurred While Editing Class");
		}
	}


	public function Create_Section($sec_name,$sec_title,$sec_class,$sec_teacher){

		$sql="INSERT INTO `section` set `sec_name`='$sec_name', `sec_title`='$sec_title', `sec_class`=$sec_class, `sec_teacher`=$sec_teacher,school_id=".$_SESSION['school_id']."";

		$res=$this->Execute_Query($sql);
		if($res){
			die("Section Created Successfully");

		}else{

			die("An Error Occurred While Creating Section");
		}
	}




		public function Create_Subject($sub_name,$teacher,$pass_grade,$final_grade){

		$sql="INSERT INTO `subject` set `subject_name`='$sub_name', `teacher`='$teacher', `pass_grade`='$pass_grade', `final_grade`='$final_grade',school_id=".$_SESSION['school_id']."";

		$res=$this->Execute_Query($sql);
		if($res){
			die("Subject Created Successfully");

		}else{

			die("An Error Occurred While Creating Subject");
		}
	}
	public function Edit_Subject($sub_id,$sub_name,$teacher,$pass_grade,$final_grade){

		$sql="UPDATE `subject` set `subject_name`='$sub_name', `teacher`='$teacher', `pass_grade`='$pass_grade', `final_grade`='$final_grade' where sub_id=$sub_id";

		$res=$this->Execute_Query($sql);
		if($res){
			die("Subject Updated Successfully");

		}else{
			die("An Error Occurred While Updating Subject");
	}
}

public function Upload_Assignment($assid,$uid,$usernote,$title){
	 $filename=$_FILES['ass_file']['name'];
				  	$filename=str_replace("_","",$filename);
					$ext=pathinfo($filename, PATHINFO_EXTENSION);
$sql="INSERT INTO `assignmentsanswers` set `assignmentId`=$assid, `userId`=$uid, `fileName`='$filename', `userNotes`='$usernote',school_id=".$_SESSION['school_id']."";
		   $extension1= array("jpeg","jpg","png","gif","pdf","doc","rtf","csv","xml","xscl","txt");
			       $file_size =$_FILES['ass_file']['size'];
				   $file=$_FILES['ass_file']['tmp_name'];
			      if(!in_array($ext, $extension1)){
			      		die("extension not allowed, please choose any of the following extension jpeg,jpg,png,gif,pdf,doc,rtf,csv,xml,xscl,txt");
			      }


			      if($file_size > 2097152){
			         die('File size must be excately 2 MB');
			      }
				 $path="../uploads/assignment/".sha1($title)."/answers/";
	if(!file_exists($path)){

			 $path1=mkdir($path,0777,true);
			}else{
				$path1=$path;
			}

			  move_uploaded_file($file,$path.$filename);

		$res=$this->Execute_Query($sql);
		if($res){
			die("Assignment Uploaded Successfully");

		}else{

			die("An Error Occurred While Uploading Subject");
		}

}

public function Upload_Single_Data($index,$email,$user_type){
	if(isset($_FILES[$index])){
			$file=$_FILES[$index]['tmp_name'];
	$filename=$_FILES[$index]['name'];
	$path="../uploads/".$user_type."/".sha1($email)."/";
	if(!file_exists($path)){

			 $path1=mkdir($path,0777,true);
			}else{
				$path1=$path;
			}
	//print_r($path);
	$ext=pathinfo($filename, PATHINFO_EXTENSION);
			$filename=str_replace("_","",$filename);
				$_POST['file']=$filename;
			  move_uploaded_file($file,$path.$filename);
		}

}
public function Create_Teacher($id,$fname,$username,$email,$pass,$bday,$gender,$add,$phone,$transport){

	//print_r($_FILES);
	if($this->CheckUname($username,"teacher")==true){
		die("Username Already Exist");
	}

	//print_r($_FILES);
	if($this->Check_Email($username,"teacher")==true){
		die("Email Already Exist");
	}
	$folder=sha1($email);

	$this->Upload_Single_Data("photo",$_POST['email'],"teacher");

	$sql="INSERT INTO `teacher` set uid=$id,`fname`='$fname', `username`='$username', `email`='$email', `password`='$pass', `bday`='$bday', `gender`='$gender', `add`='$add', `phone`='$phone', `transport`='$transport', `photo`='".$_POST['file']."',school_id=".$_SESSION['school_id']."";


	$res=$this->Execute_Query($sql);
	if($res){
			die("Teacher Saved Successfully");

		}else{
			die("An Error Occurred While Creating Teacher");
	}

}


public function Edit_Teacher($uid,$fname,$username,$email,$pass,$bday,$gender,$add,$phone,$transport){
	$folder=sha1($email);
	//print_r($_FILES);
	if(isset($_FILES['photo'])){
	$this->Upload_Single_Data("photo",$_POST['email'],"teacher");
	$sql="update `teacher` set `fname`='$fname', `username`='$username', `email`='$email', `password`='$pass', `bday`='$bday', `gender`='$gender', `add`='$add', `phone`='$phone', `transport`='$transport', `photo`='".$_POST['file']."' where uid=$uid";
	}else{
	$sql="update `teacher` set `fname`='$fname', `username`='$username', `email`='$email', `password`='$pass', `bday`='$bday', `gender`='$gender', `add`='$add', `phone`='$phone', `transport`='$transport' where uid=$uid";
	}

	$res=$this->Execute_Query($sql);
	if($res){
			die("Teacher Updated Successfully");

		}else{
			die("An Error Occurred While Updating Teacher");
	}

}


public function Create_Student($id,$fname,$rollid,$username,$email,$pass,$bday,$gender,$add,$phone,$class,$section,$transport,$hostel){
	$folder=sha1($email);
	//print_r($_FILES);
	if($this->CheckUname($username,"student")==true){
		die("Username Already Exist");
	}
	//print_r($_FILES);
	if($this->Check_Email($username,"student")==true){
		die("Email Already Exist");
	}

	$this->Upload_Single_Data("photo",$_POST['email'],"student");

$sql="INSERT INTO `student` set uid=$id,`fname`='$fname', `rollid`=$rollid, `username`='$username', `email`='$email', `password`='$pass',`gender`='$gender', `bday`='$bday', `add`='$add', `phone`='$phone', `class`='$class', `section`='$section', `transport`='$transport', `hostel`='$hostel', `photo`='".$_POST['file']."',school_id=".$_SESSION['school_id']."";


	$res=$this->Execute_Query($sql);
	if($res){
			die("Student Saved Successfully");

		}else{
			die("An Error Occurred While Creating Student");
	}

}


public function Edit_Student($uid,$fname,$rollid,$username,$email,$pass,$bday,$gender,$add,$phone,$class,$section,$transport,$hostel){
	$folder=sha1($email);
	if(isset($_FILES['photo'])){
	$this->Upload_Single_Data("photo",$_POST['email'],"student");

$sql="update `student` set `fname`='$fname', `rollid`=$rollid, `username`='$username', `email`='$email', `password`='$pass',`gender`='$gender', `bday`='$bday', `add`='$add', `phone`='$phone', `class`='$class', `section`='$section', `transport`='$transport', `hostel`='$hostel', `photo`='".$_POST['file']."' where uid='$uid'";
	}else{


$sql="update `student` set `fname`='$fname', `rollid`=$rollid, `username`='$username', `email`='$email', `password`='$pass',`gender`='$gender', `bday`='$bday', `add`='$add', `phone`='$phone', `class`='$class', `section`='$section', `transport`='$transport', `hostel`='$hostel' where uid='$uid'";

	}
	$this->Update_Users($role,$uid);

	$res=$this->Execute_Query($sql) or die(mysqli_error($this->db));
	if($res){
			die("Student Updated Successfully");

		}else{
			die("An Error Occurred While Updating Student");
	}

}


public function Create_Event($title,$desc,$place,$for,$date){
$sql="INSERT INTO `event` set `title`='$title', `desc`='$desc', `place`='$place', `for`='$for', `date`='$date',school_id=".$_SESSION['school_id']."";

	$res=$this->Execute_Query($sql);
	if($res){
			die("Event Saved Successfully");

		}else{
			die("An Error Occurred While Creating Event");
	}

}

public function Edit_Event($eid,$title,$desc,$place,$for,$date){
$sql="UPDATE `event` set `title`='$title', `desc`='$desc', `place`='$place', `for`='$for', `date`='$date' where eid=$eid";

	$res=$this->Execute_Query($sql);
	if($res){
			die("Event Updated Successfully");

		}else{
			die("An Error Occurred While Updating Event");
	}

}


public function Create_News($title,$con,$for,$date){
$sql="INSERT INTO `news` set `title`='$title',`content`='$con', `for`='$for', `date`='$date',school_id=".$_SESSION['school_id']."";

	$res=$this->Execute_Query($sql);
	if($res){
			die("News Saved Successfully");

		}else{
			die("An Error Occurred While Saving News");
	}

}

public function Edit_News($nid,$title,$con,$for,$date){
$sql="UPDATE `news` set `title`='$title',`content`='$con', `for`='$for', `date`='$date' where n_id=$nid";

	$res=$this->Execute_Query($sql);
	if($res){
			die("News Updated Successfully");

		}else{
			die("An Error Occurred While Updating News");
	}

}

public function Create_Transportation($title,$desc,$contact,$fare){
$sql="INSERT INTO `transportation` set `title`='$title', `desc`='$desc', `contact`='$contact', `fare`='$fare',school_id=".$_SESSION['school_id']."";

	$res=$this->Execute_Query($sql);
	if($res){
			die("Transportation Created Successfully");

		}else{
			die("An Error Occurred While Creating Transportation");
	}

}

public function Edit_Transportation($tid,$title,$desc,$contact,$fare){
$sql="update `transportation` set `title`='$title', `desc`='$desc', `contact`='$contact', `fare`='$fare' where t_id=$tid";

	$res=$this->Execute_Query($sql);
	if($res){
			die("Transportation Updated Successfully");

		}else{
			die("An Error Occurred While Updating Transportation");
	}

}




public function Create_Library($title,$desc,$price,$author,$type,$state){

	if(isset($_FILES['bookfile'])){
	$this->Upload_Single_Data("bookfile",sha1("library"),"library");
	}
$sql="INSERT INTO `library`  set  `title`='$title',`desc`='$desc',`price`=$price,`author`='$author',`type`='$type',`file`='".$_POST['file']."',`state`=$state,school_id=".$_SESSION['school_id']."";
	///print($sql);
	$res=$this->Execute_Query($sql);
	if($res){
			die("Library Created Successfully");

		}else{
			die("An Error Occurred While Creating Library");
	}

}

public function Edit_Library($lib_id,$title,$desc,$price,$author,$type,$state){

	if(isset($_FILES['bookfile'])){
	$this->Upload_Single_Data("bookfile",sha1("library"),"library");
	}
$sql="update `library`  set  `title`='$title',`desc`='$desc',`price`=$price,`author`='$author',`type`='$type',`file`='".$_POST['file']."',`state`=$state where lib_id=$lib_id";
	///print($sql);
	$res=$this->Execute_Query($sql);
	if($res){
			die("Library Created Successfully");

		}else{
			die("An Error Occurred While Creating Library");
	}

}



public function Create_Study_Materials($title,$desc,$class,$section){

	if(isset($_FILES['material_file'])){
	$this->Upload_Single_Data("material_file",sha1("studymaterial"),"studymaterial");
	}
$sql="INSERT INTO `study_material` set `title`='$title',`desc`='$desc',`file`='".$_POST['file']."',`class`=$class, `section`=$section,school_id=".$_SESSION['school_id']."";
	///print($sql);
	$res=$this->Execute_Query($sql);
	if($res){
			die("Study Material Created Successfully");

		}else{
			die("An Error Occurred While Creating Study Material");
	}

}

public function Edit_Study_Materials($stm_id,$title,$desc,$class,$section){

	if(isset($_FILES['material_file'])){
	$this->Upload_Single_Data("material_file",sha1("studymaterial"),"studymaterial");
	}
$sql="UPDATE `study_material` set `title`='$title',`desc`='$desc',`file`='".$_POST['file']."',`class`=$class, `section`=$section where stm_id=$stm_id";
	///print($sql);
	$res=$this->Execute_Query($sql);
	if($res){
			die("Study Material Updated Successfully");

		}else{
			die("An Error Occurred While Updating Study Material");
	}

}




public function Create_Hostel($title,$type,$add,$manager,$note){

$sql="INSERT INTO `hostel` set `hostelTitle`='$title', `hostelType`='$type', `hostelAddress`='$add', `hostelManager`='$manager', `hostelNotes`='$note',school_id=".$_SESSION['school_id']."";
	///print($sql);
	$res=$this->Execute_Query($sql);
	if($res){
			die("Hostel Created Successfully");

		}else{
			die("An Error Occurred While Creating Hostel");
	}

}

public function Edit_Hostel($hostel_id,$title,$type,$add,$manager,$note){

$sql="UPDATE `hostel` set `hostelTitle`='$title', `hostelType`='$type', `hostelAddress`='$add', `hostelManager`='$manager', `hostelNotes`='$note' where hostel_id=$hostel_id";
	///print($sql);
	$res=$this->Execute_Query($sql);
	if($res){
			die("Hostel Updated Successfully");

		}else{
			die("An Error Occurred While Updating Hostel ");
	}

}



public function Create_Hostel_Cate($title,$hostel,$catefee,$catenote){

$sql="INSERT INTO `hostelcat` set `catTitle`='$title', `catTypeId`='$hostel',`catFees`='$catefee', `catNotes`='$catenote',school_id=".$_SESSION['school_id']."";
	///print($sql);
	$res=$this->Execute_Query($sql);
	if($res){
			die("Hostel Category Created Successfully");

		}else{
			die("An Error Occurred While Creating Hostel Category");
	}

}


public function Edit_Hostel_Cate($id,$title,$hostel,$catefee,$catenote){

$sql="UPDATE `hostelcat` set `catTitle`='$title', `catTypeId`='$hostel',`catFees`='$catefee', `catNotes`='$catenote' where hostel_cat_id=$id";
	///print($sql);
	$res=$this->Execute_Query($sql);
	if($res){
			die("Hostel Category Updated Successfully");

		}else{
			die("An Error Occurred While Updating Hostel Category");
	}

}



public function Create_Grade_Level($name,$desc,$point,$from,$to){

$sql="INSERT INTO `gradelevels` set `gradeName`='$name', `gradeDescription`='$desc', `gradePoints`=$point, `gradeFrom`=$from, `gradeTo`=$to,school_id=".$_SESSION['school_id']."";
	///print($sql);
	$res=$this->Execute_Query($sql);
	if($res){
			die("Grade Level Created Successfully");

		}else{
			die("An Error Occurred While Creating Grade Level");
	}

}

public function Edit_Grade_Level($id,$name,$desc,$point,$from,$to){

$sql="UPDATE `gradelevels` set `gradeName`='$name', `gradeDescription`='$desc', `gradePoints`=$point, `gradeFrom`=$from, `gradeTo`=$to where grade_level_id=$id";
	///print($sql);
	$res=$this->Execute_Query($sql);
	if($res){
			die("Grade Level Updated Successfully");

		}else{
			die("An Error Occurred While Updating Grade Level");
	}

}


public function Create_Assignment($class,$section,$subject,$teacher,$title,$desc,$deadline){
	if(isset($_FILES['file'])){
	$this->Upload_Single_Data("file",sha1($title),"assignment");
	}
$sql="INSERT INTO `assignments` set `classId`='$class', `sectionId`='$section', `subjectId`='$subject', `teacherId`='$teacher', `AssignTitle`='$title', `AssignDescription`='$desc', `AssignFile`='".$_POST['file']."', `AssignDeadLine`='$deadline',school_id=".$_SESSION['school_id']."";
	///print($sql);
	$res=$this->Execute_Query($sql);
	if($res){
			die("Assignment Created Successfully");

		}else{
			die("An Error Occurred While Creating Assignment");
	}

}



public function Edit_Assignment($id,$class,$section,$subject,$teacher,$title,$desc,$deadline){

	if(isset($_FILES['file'])){
	$this->Upload_Single_Data("file",sha1($title),"assignment");
$sql="Update `assignments` set `classId`='$class', `sectionId`='$section', `subjectId`='$subject', `teacherId`='$teacher', `AssignTitle`='$title', `AssignDescription`='$desc', `AssignFile`='".$_POST['file']."', `AssignDeadLine`='$deadline' where ass_id=$id";
	}else{
$sql="Update `assignments` set `classId`='$class', `sectionId`='$section', `subjectId`='$subject', `teacherId`='$teacher', `AssignTitle`='$title', `AssignDescription`='$desc', `AssignDeadLine`='$deadline' where ass_id=$id";

	}
	print($sql);
	$res=$this->Execute_Query($sql);
	if($res){
			die("Assignment Updated Successfully");

		}else{
			die("An Error Occurred While Updating Assignment");
	}

}



public function Create_Class_Schedule($class,$sub_id,$day,$start,$end){

$sql="INSERT INTO `classschedule` set `classId`=$class, `subjectId`=$sub_id, `dayOfWeek`='$day', `startTime`='$start', `endTime`='$end',school_id=".$_SESSION['school_id']."";
	///print($sql);
	$res=$this->Execute_Query($sql);
	if($res){
			die("Schedule Created Successfully");

		}else{
			die("An Error Occurred While Creating Schedule");
	}

}

public function Get_Schedule($days){

	$schedule=$this->Get_All_Data("select * from `classschedule` JOIN subject on subject.sub_id=classschedule.subjectId where dayOfWeek='$days' and subject.school_id=".$_SESSION['school_id']."");

	return $schedule;

}



public function Edit_Class_Schedule($sub_id,$day,$start,$end,$sch_id){

$sql="UPDATE `classschedule` set `subjectId`=$sub_id, `dayOfWeek`='$day', `startTime`='$start', `endTime`='$end' where sch_id=$sch_id";
	///print($sql);
	$res=$this->Execute_Query($sql);
	if($res){
			die("Schedule Updated Successfully");

		}else{
			die("An Error Occurred While Updating Schedule");
	}

}

function Get_Section(){
	$teacher=$this->Get_All_Data("select * from section where school_id=".$_SESSION['school_id']." ");
	for($i=0;$i<count($teacher);$i++){

  echo'<option value="'.$teacher[$i]['sec_id'].'">'.$teacher[$i]['sec_name'].'</option>';
		}

}

function Get_Subject($class){
	$class=$this->Get_All_Data("select * from class where cl_id=$class and  school_id=".$_SESSION['school_id']."");

	$data=json_decode($class[0]['clrelated']);
	for($i=0;$i<count($data);$i++){

			$subject=$this->Get_All_Data("select * from subject where sub_id=".$data[$i]." and school_id=".$_SESSION['school_id']."");

  echo'<option value="'.$subject[0]['sub_id'].'">'.$subject[0]['subject_name'].'</option>';
		}

}


public function Control_Attendance($class,$subject,$date,$studentid,$status){
	$check="";

	$check=$this->Get_All_Data("select * from `attendance` where `classId`=$class and `subjectId`=$subject and `date`='$date' and `studentId`=$studentid and school_id=".$_SESSION['school_id']."");
	//print_r($check);
	if(count($check)>0){
		$sql="update `attendance` set `classId`=$class, `subjectId`=$subject, `date`=$date, `studentId`=$studentid, `status`='$status' where `classId`=$class and `subjectId`=$subject and `date`='$date' and `studentId`=$studentid";
	}
	else{
	$sql="INSERT INTO `attendance` set `classId`=$class, `subjectId`=$subject, `date`='$date', `studentId`=$studentid, `status`=$status,school_id=".$_SESSION['school_id']."";
	}
	$res=$this->Execute_Query($sql);
	return true;
}


public function Create_Parent($data){
		if(isset($_FILES['photo'])){
			$username=$this->Escape($_POST['username']);
			$fname=$this->Escape($_POST['fullName']);
			$pass=$this->Escape($_POST['password']);
			$email=$this->Escape($_POST['email']);
			$folder=sha1($email);
		$this->Create_Users($username,$fname,$pass,0,'none',$this->priv['Parent'],$folder);

	$this->Upload_Single_Data("photo",sha1("parent"),"parent");
		$photo=$this->Escape($_POST['file']);
	$sql="INSERT INTO `parent` set `data`='$data',photo='$photo',school_id=".$_SESSION['school_id']."";
	$res=$this->Execute_Query($sql);
	if($res){
			die("Parent Created Successfully");

		}else{
			die("An Error Occurred While Creating Parent");
	}
}
}

public function Create_Users($username,$fname,$email,$pass,$transport,$priv,$folder){
	if($this->CheckUname($username,"teacher")==true){
		die("Username Already Exist");
	}

	$sql2="INSERT INTO `users` set `username`='$username',fname='$fname',`email`='$email',`password`='$pass', `transport`='$transport',`priv`=$priv, `folder`='$folder',school_id=".$_SESSION['school_id']."";
	$this->Execute_Query($sql2);
}


public function Send_Messsag($sender,$reciever,$msg){
$sql="INSERT INTO `message` set `sender_id`='$sender',
 `reciever_id`='$reciever',
 `content`='$msg'";
$res=$this->Execute_Query($sql);
if ($res){
			$msg=array("1"=>"Message Sent successfully");
		}
		else{
			$msg=array("0"=>"An error occurred while Sending You Message".mysqli_error($this->db));
		}
		return json_encode($msg,JSON_FORCE_OBJECT);
}



public function Update_Users($username,$fname,$pass,$transport,$priv,$folder,$uid){
	if($this->CheckUname($username,"teacher")==true){
		die("Username Already Exist");
	}

	$sql2="UPDATE `users` set `username`='$username',fname='$fname',`password`='$pass', `transport`='$transport',`priv`=$priv, `folder`='$folder' where uid=$uid";
	$this->Execute_Query($sql2);
}


public function Update_Parent($data,$pid){
	$pid=$_POST['pid'];
	if(isset($_FILES['photo']) and $_FILES['photo']['size']>0){
		$username=$this->Escape($_POST['username']);
		$fname=$this->Escape($_POST['fullName']);
		$pass=$this->Escape($_POST['password']);
		$email=$this->Escape($_POST['email']);
		$folder=sha1($email);
		$this-> Update_Users($username,$fname,$pass,$transport,$priv,$folder,$pid);
	$this->Upload_Single_Data("photo",sha1("assignment"),"assignment");
	$photo=$_POST['file'];
	$sql="UPDATE `parent` set `data`='$data',photo='$photo' where pid=$pid";
	}else{
			$sql="UPDATE `parent` set `data`='$data' where pid=$pid";
	}

	$res=$this->Execute_Query($sql);
	if($res){
			die("Parent Updated Successfully");

		}else{
			die("An Error Occurred While Updating Parent");
	}

}


public function Hide_Some($string){
	$total=str_word_count($string);
	if($total>10){
		$explode=explode(" ",$string);
		for($i=0;$i<10;$i++){

			echo $explode[$i]." ";

		}
		echo "...";
	}else{
		echo $string;
	}

}


function Delete_Record($msg,$table,$key,$value){
	$sql="delete from ".$table." where ".$key."=$value";
	$res=$this->Execute_Query($sql);

		if($res){
			echo json_encode(array("1"=>$msg),JSON_FORCE_OBJECT);
		}
		else{
			echo json_encode(array("0"=>"An Error Occurred While Deleting ".$msg),JSON_FORCE_OBJECT);
		}
}


public function Create_Exam($title,$desc,$class,$field,$date,$year){
	$sql="INSERT INTO `examslist` SET `examTitle`='$title',`examDescription`='$desc',`class`='$class'Create_Online, `field`='$field', `examDate`='$date', `examAcYear`=$year, school_id=".$_SESSION['school_id']."";
	//print_r($sql);
	$res=$this->Execute_Query($sql);

		if($res){
			die("Exam List Created Successfully");
		}
		else{
			die("An Error Occurred While Creating Exam List");
		}

}

public function Create_Online($title,$desc,$class,$section,$teacher,$sub,$date,$year,$enddate,$minute,$grade){
	$sql="INSERT INTO `onlineexams` set `examTitle`='$title', `examDescription`='$desc', `examClass`='$class', `sectionId`='$section', `examTeacher`=$teacher, `examSubject`=$sub, `examDate`='$date', `exAcYear`='$year', `ExamEndDate`='$enddate', `examTimeMinutes`=$minute,`ExamShowGrade`='$grade',school_id=".$_SESSION['school_id']."";
	//print_r($sql);
	$res=$this->Execute_Query($sql);

		if($res){
			die("Exam Created Successfully");
		}
		else{
			die("An Error Occurred While Creating Exam List");
		}

}



public function Add_Questions(){
$qn=$_POST['question'];
$opa=$_POST['optiona'];
$opb=$_POST['optionb'];
$opc=$_POST['optionc'];
$opd=$_POST['optiond'];
$cor=$_POST['correct'];
$no=$_POST['No'];
$sub=$_POST['sub'];
$test=$_POST['id'];
$check_qno=$this->Get_All_Data("select * from question where qno='$no' and test='$test' and school_id=".$_SESSION['school_id']."");

if(count($check_qno)>0){

	die("Question with this nunmber already exist for this test and subject");

}
else{
$sql="insert into question set qno='$no',
question='$qn',
test='$test',
option1='$opa',
option2='$opb',
option3='$opc',
option4='$opd',
correctanswer='$cor', school_id=".$_SESSION['school_id']."";
$res=$this->Execute_Query($sql);
if ($res){
die("Successful! Question Added Sucessfully");

	}
 else{
die("Failed! Question Was Not Added");
	 }
}
}
public function Edit_Questions(){
$qn=$_POST['question'];
$opa=$_POST['optiona'];
$opb=$_POST['optionb'];
$opc=$_POST['optionc'];
$opd=$_POST['optiond'];
$cor=$_POST['correct'];
$no=$_POST['No'];
$id=$_POST['qid'];

$sql="update question set qno='$no',
question='$qn',
option1='$opa',
option2='$opb',
option3='$opc',
option4='$opd',
correctanswer='$cor' where id=$id";

$res=$this->Execute_Query($sql);
if ($res){
die("Successful! Question Updated Sucessfully");

	}
 else{
die("Failed! Question Was Not Added");
	 }
}

public function array_default_key($arrays) {
    $arrayTemp = array();
    $i = 0;
    foreach ($arrays as $array) {
		 foreach ($array as $key=>$value) {
        $arrayTemp[$i] = $value;
        $i++;
    }
	}
    return $arrayTemp;
}

public function Generate_Random_Numbers($array,$sub_id,$test_id){
shuffle($array );
$arrdata=json_encode($array);
//checking if the user's data alrady exist in the database
$sql="select * from questionarray where std_id=".$_SESSION['uid']." and test_id=$test_id and sub_id=$sub_id and school_id=".$_SESSION['school_id']."";
$qry=$this->Get_All_Data($sql);
if(count($qry)<1){
$this->Execute_Query("insert into questionarray(std_id,test_id,sub_id,array,school_id)VALUES('".$_SESSION['uid']."',$test_id,'$sub_id','".$arrdata.",".$_SESSION['school_id']."')");
}
 }



public function Create_Fee_type($title,$desc,$amount,$schedule){
	$sql="INSERT INTO `fee_type` set `title`='$title',
	`description`='$desc',
	`amount`=$amount,
	`schedule`=$schedule,school_id=".$_SESSION['school_id']."";
	$res=$this->Execute_Query($sql);

		if($res){
			die("Fee Types Created Successfully");
		}
		else{
			die("An Error Occurred While Creating Fee Type");
		}

}

public function Edit_Fee_type($title,$desc,$amount,$schedule){
	$id=$_POST['fee_id'];
	$sql="UPDATE `fee_type` set `title`='$title',
	`description`='$desc',
	`amount`=$amount,
	`schedule`=$schedule where fee_id=$id";
	$res=$this->Execute_Query($sql);

		if($res){
			die("Fee Types Edited Successfully");
		}
		else{
			die("An Error Occurred While Editing Fee Type");
		}

}

public function Allocate_Fee($title,$type,$alloc_type,$alloc_to){
	//print_r($_POST);
	if($_POST['allocate_to']=="student" && !empty($_POST['student'])){
		for($i=0;$i<count($_POST['student']);$i++){
			$sql="INSERT INTO `allocate_fee` set `title`='$title', `type`='$type', `allocate_to_type`='$alloc_type', `allocate_to`='".$_POST['student'][$i]."',school_id=".$_SESSION['school_id']."";
			//echo count($_POST['student']);
			$res=$this->Execute_Query($sql);
			$this->Generate_Receipt_Single();
		}
	}else if($_POST['allocate_to']=="class" && !empty($_POST['class'])){
			$sql="INSERT INTO `allocate_fee` set `title`='$title', `type`='$type', `allocate_to_type`='$alloc_type', `allocate_to`='".$_POST['class']."',school_id=".$_SESSION['school_id']."";
			$res=$this->Execute_Query($sql);
			$this->Generate_Receipt_ForClass();
	}else{
		$sql="INSERT INTO `allocate_fee` set `title`='$title', `type`='$type', `allocate_to_type`='$alloc_type', `allocate_to`='$alloc_to',school_id=".$_SESSION['school_id']."";
		$res=$this->Execute_Query($sql);
		$this->Generate_Receipt_ForAll();
	}


	if($res){
		die("Fee Allocated Successfully");
	}
	else{
		die("An Error Occurred While Allocating Fee");
	}

}

public function Edit_Allocated_Fee($title,$type,$alloc_type,$alloc_to,$alloc_id){
	//print_r($_POST);
	if(count($_POST['allocate_to'])>0 && $_POST['allocate_to']=="student" && !empty($_POST['student'])){
	$sql="UPDATE `allocate_fee` set `title`='$title', `type`='$type', `allocate_to_type`='$alloc_type', `allocate_to`='".$_POST['student'][0]."' where alloc_fee_id='$alloc_id'";
	//echo count($_POST['student']);
	$res=$this->Execute_Query($sql);
	}
	else if(count($_POST['allocate_to'])>0 && $_POST['allocate_to']=="class" && !empty($_POST['class'])){
			$sql="UPDATE `allocate_fee` set `title`='$title', `type`='$type', `allocate_to_type`='$alloc_type', `allocate_to`='".$_POST['class']."' where alloc_fee_id='$alloc_id'";
			$res=$this->Execute_Query($sql);
		}else{
			$sql="UPDATE `allocate_fee` set `title`='$title', `type`='$type', `allocate_to_type`='$alloc_type', `allocate_to`='$alloc_to' where alloc_fee_id='$alloc_id'";
			$res=$this->Execute_Query($sql);
		}
		if($res){
			die("Edit Successfully");
		}
		else{
			die("An Error Occurred While Editing Allocated Fee");
		}

}


public function Create_Expense_Cate($title,$desc){
			$sql="INSERT INTO `expenses_cate` set `cate_title`='$title', `cate_desc`='$desc',school_id=".$_SESSION['school_id']."";
			$res=$this->Execute_Query($sql);
		if($res){
			die("Category Created Successfully");
		}
		else{
			die("An Error Occurred While Creating Category");
		}

}


public function Edit_Expense_Cate($title,$desc,$cate_id){
			$sql="update `expenses_cate` set `cate_title`='$title', `cate_desc`='$desc' where exp_cate_id='$cate_id'";
			$res=$this->Execute_Query($sql);
		if($res){
			die("Category Created Successfully");
		}
		else{
			die("An Error Occurred While Editing Category");
		}

}

public function Create_Expenses($title,$amount,$cate,$note){
			$sql="INSERT INTO `expenses` set `exp_title`='$title', `exp_amount`='$amount', `exp_cate`='$cate', `exp_note`='$note',school_id=".$_SESSION['school_id']."";
			$res=$this->Execute_Query($sql);
		if($res){
			die("Expense Created Successfully");
		}
		else{
			die("An Error Occurred While Creating Expense");
		}

}

public function Edit_Expenses($title,$amount,$cate,$note,$exp_id){
			$sql="UPDATE `expenses` set `exp_title`='$title', `exp_amount`='$amount', `exp_cate`='$cate', `exp_note`='$note' where exp_id=$exp_id";
			$res=$this->Execute_Query($sql);
		if($res){
			die("Expense Edited Successfully");
		}
		else{
			die("An Error Occurred While Editing Expense");
		}

}


public function Get_Grade_And_Remark($tot){

	$grade_settings=$this->Get_All_Data("select * from gradelevels wehere school_id=".$_SESSION['school_id']."");
	for($i=0;$i<count($grade_settings);$i++){
						if($tot>=$grade_settings[$i]['gradeFrom'] and $tot<=$grade_settings[$i]['gradeTo']){
							$grade=$grade_settings[$i]['gradeName'];
							$remark=$grade_settings[$i]['gradeDescription'];
									return array("Remark"=>$remark,"Grade"=>$grade);
						}

					}

}



public function Add_Grade(){
	for($i=0;$i<count($_POST['uid']);$i++){
	$check=$this->Get_All_Data("select * from grade where uid=".$_POST['uid'][$i]." and exam_id=".$_POST['exam_id']." and school_id=".$_SESSION['school_id']."");
	if(isset($check)){
		$total=$_POST['ca'][$i]+$_POST['exam'][$i];
	$grade_parse=$this->Get_Grade_And_Remark($total);
	$grade=$grade_parse['Grade'];
	$remark=$grade_parse['Remark'];
		$sql="UPDATE grade set ca='".$_POST['ca'][$i]."', exam='".$_POST['exam'][$i]."',total=$total,grade='$grade',remark='$remark' where uid=".$_POST['uid'][$i]." and exam_id=".$_POST['exam_id']." and class_id=".$_POST['class_id']." and subject_id=".$_POST['subject_id']."";
		$res=$this->Execute_Query($sql);
	}else{
		$total=$_POST['ca'][$i]+$_POST['exam'][$i];
	$grade_parse=$this->Get_Grade_And_Remark($total);
	$grade=$grade_parse['Grade'];
	$remark=$grade_parse['Remark'];
		$sql="INSERT INTO grade set ca='".$_POST['ca'][$i]."', exam='".$_POST['exam'][$i]."',total=$total,grade='$grade',remark='$remark',uid=".$_POST['uid'][$i].",exam_id=".$_POST['exam_id'].",class_id=".$_POST['class_id'].",subject_id=".$_POST['subject_id'].",class_name='".$_POST['class_name']."',subject_name='".$_POST['subject_name']."',school_id=".$_SESSION['school_id']."";
		$res=$this->Execute_Query($sql);
	}
}
if($res){
			die("Grade Proccessed Successfully");
		}
		else{
			die("An Error Occurred While Proccessing Grade");
		}
}

public function System_Setting($school_name,$desc,$session,$term,$uid){
	$check=$this->Get_All_Data("select * from settings where admin_id=$uid");
		$this->Upload_Single_Data("logo",$_SESSION['email'],"admin");
		$logo=$_POST['file'];
	if(isset($check)){
		$sql="UPDATE `settings` set `school_name`='$school_name', `logo`='$logo', `description`='$desc', `current_session`='$session', `current_term`='$term', `admin_id`='$uid' where setting_id=$uid";
		$res=$this->Execute_Query($sql);
	}else{
		$sql="INSERT INTO `settings` set `school_name`='$school_name', `logo`='$logo', `description`='$desc', `current_session`='$session', `current_term`='$term', `admin_id`='$uid'";
		$res=$this->Execute_Query($sql);
	}

if($res){
			die("! Setting Saved Successfully");
		}
		else{
			die("! An Error Occurred While Saving Your Setting");
		}
}

public function Get_Student_Grade($exam_id,$uid){

	$check=$this->Get_All_Data("select * from grade where uid=$uid and exam_id=$exam_id");
	return $check;
}

function Insert_Receipt($alloc,$fee,$uid){
	$sql="INSERT INTO `reciept`set `alloc_fee_id`=$alloc, `fee_type`=$fee, `std_id`=$uid,school_id=".$_SESSION['school_id']."";
	$res=$this->Execute_Query($sql);
	//return $res;

}

function Generate_Receipt_Single(){
	$sql="SELECT * FROM `allocate_fee` where allocate_fee.allocate_to_type='student' and allocate_fee.allocate_to!='student' and receipt_generated=0, and school_id=".$_SESSION['school_id']."";
	$data=$this->Get_All_Data($sql);
	for($i=0;$i<count($data);$i++){
	$this->Insert_Receipt($data[$i]['alloc_fee_id'],$data[$i]['type'],$data[$i]['allocate_to']);
	$this->Execute_Query("update allocate_fee set receipt_generated=1 where alloc_fee_id=".$data[$i]['alloc_fee_id']."");
	}

}


function Generate_Receipt_ForClass(){
	$sql="SELECT * FROM `allocate_fee` where allocate_fee.allocate_to_type='class' and receipt_generated=0 and school_id=".$_SESSION['school_id']."";
	$data=$this->Get_All_Data($sql);
		//print_r($data);
		if(count($data)>0){
	$class=$this->Get_All_Data("select * from student where class=".$data[0]['allocate_to']." and school_id=".$_SESSION['school_id']."");
	//print_r($class);
	for($i=0;$i<count($class);$i++){
	$this->Insert_Receipt($data[0]['alloc_fee_id'],$data[0]['type'],$class[$i]['uid']);
	}
	$this->Execute_Query("update allocate_fee set receipt_generated=1 where alloc_fee_id=".$data[0]['alloc_fee_id']."");
		}
}


function Generate_Receipt_ForAll(){
	$sql="SELECT * FROM `allocate_fee` where allocate_fee.allocate_to_type='All' and allocate_fee.allocate_to='All' and receipt_generated=0 and school_id=".$_SESSION['school_id']."";
	$data=$this->Get_All_Data($sql);
		if(count($data)>0){
	$class=$this->Get_All_Data("select * from student where school_id=".$_SESSION['school_id']."");
	//print_r($class);
	for($i=0;$i<count($class);$i++){
	$this->Insert_Receipt($data[0]['alloc_fee_id'],$data[0]['type'],$class[$i]['uid']);
	}
	$this->Execute_Query("update allocate_fee set receipt_generated=1 where alloc_fee_id=".$data[0]['alloc_fee_id']."");
		}
}


function Link_Parent($std_id,$pid){
	$data=$this->Get_All_Data("select * from parent_student_link where `std_id`=$std_id and `p_id`=$pid and school_id=".$_SESSION['school_id']."");

		if(count($data)>0){
			$sql="UPDATE `parent_student_link` set `std_id`=$std_id, `p_id`=$pid where `std_id`=$std_id and `p_id`=$pid";
			$res=$this->Execute_Query($sql);
		}else{
			$sql="INSERT INTO `parent_student_link` set `std_id`=$std_id, `p_id`='$pid', school_id=".$_SESSION['school_id']."";
	        $res=$this->Execute_Query($sql);
		}

		if($res){
			die("Parent Linked  Successfully");
		}
		else{
			die("An Error Occurred While Linking Parent");
		}

}


	public function Add_admin($admin_uname, $admin_name, $admin_mail, $admin_gender, $admin_number, $admin_pass){
	  $hashp = md5($admin_pass);
	  $insert = "INSERT INTO `users` SET `school_id` = ".$_SESSION['school_id'].", `username`= '$admin_uname', `fname`= '$admin_name', `email`= '$admin_mail', `gender`= '$admin_gender', `phone`= '$admin_number', `password`= '$hashp', `priv` = 1, `activated` = 1";
	  $res = $this->Execute_Query($insert);
	  if ($res) {
	  	die("Admin Created successfully");
	  }else{
	  	die("An Error occured while Adding Admin");
	  }
	}

}
?>
