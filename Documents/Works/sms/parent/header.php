<?php
include('../controller/controller.php');

if(!isset($_SESSION['uid']) && !isset($_SESSION['username'])){
	
	header('location:../index.html');
}



$info=$obj->Get_All_Data("select * from teacher where username='".$_SESSION['username']."'")[0]['uid'];

//get student photo

$photo_data=$obj->Get_All_Data("SELECT * FROM `parent` join users on users.uid=parent.uid");
//print_r($photo);
if(isset($photo_data[0]['photo'])){
//$photo="../uploads/parent/".$photo_data[0]['folder']."/".$photo_data[0]['photo']."";
$photo="../uploads/parent/avatar.png";
}else{
	$photo="../uploads/parent/avatar.png";
}



?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from ableproadmin.com/light/vertical/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Mar 2017 21:00:07 GMT -->
<head>
    <title>School Management</title>
   

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <!-- Favicon icon -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">
    <link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">

    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
 
   <!-- Font Awesome -->
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">


    <!-- iconfont -->
    <link rel="stylesheet" type="text/css" href="../assets/icon/icofont/css/icofont.css">

    <!-- simple line icon -->
    <link rel="stylesheet" type="text/css" href="../assets/icon/simple-line-icons/css/simple-line-icons.css">

    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">

    <!-- Chartlist chart css -->
    <link rel="stylesheet" href="../assets/plugins/charts/chartlist/css/chartlist.css" type="text/css" media="all">

    <!-- Weather css -->
    <link href="../assets/css/svg-weather.css" rel="stylesheet">
	
	<!-- Calender css -->
	<link rel="stylesheet" type="text/css" href="../assets/plugins/calender/css/fullcalendar.css">
	<link rel="stylesheet" type="text/css" href="../assets/plugins/calender/css/fullcalendar.print.css" media='print'>


    <!-- Echart js -->
    <script src="../assets/plugins/charts/echarts/js/echarts-all.js"></script>

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/main.css">

    <!-- Responsive.css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/responsive.css">

		<!-- Tags css -->
	<link rel="stylesheet" href="../assets/plugins/tags/css/bootstrap-tagsinput.css" />

	
    <!--color css-->
    <link rel="stylesheet" type="text/css" href="../assets/css/color/color-1.css" id="color"/>

 <!-- Data Table Css -->
  <link rel="stylesheet" type="text/css" href="../assets/plugins/data-table/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/plugins/data-table/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="../assets/plugins/data-table/css/responsive.bootstrap4.min.css">
      
	  <!-- Modal animation CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/plugins/modal/css/component.css">

  
  <!-- Select 2 css -->
	<link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css" />
	<link rel="stylesheet" type="text/css" href="../assets/plugins/select2/css/s2-docs.css">


 
</head>
<body class="sidebar-mini fixed">
    <div class="loader-bg">
        <div class="loader-bar">
        </div>
    </div>
<div class="wrapper">
    <!--   <div class="loader-bg">
    <div class="loader-bar">
    </div>
  </div> -->
    <!-- Navbar-->
    <header class="main-header-top hidden-print">
        <a href="index-2.html" class="logo">SMS</a>
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button--><a href="#!" data-toggle="offcanvas" class="sidebar-toggle"></a>
            <!-- Navbar Right Menu-->
            <div class="navbar-custom-menu">
                <ul class="top-nav">
                    <!--Notification Menu-->

                    <li class="dropdown pc-rheader-submenu message-notification search-toggle">
                        <a href="#!" id="morphsearch-search" class="drop icon-circle txt-white">
                            <i class="icofont icofont-search-alt-1"></i>
                        </a>
                    </li>
                    <li class="dropdown notification-menu">
                        <a href="#!" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
                            <i class="icon-bell"></i>
                            <span class="badge badge-danger header-badge">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="not-head">You have <b class="text-primary">4</b> new notifications.</li>
                            <li class="bell-notification">
                                <a href="javascript:;" class="media">
                    <span class="media-left media-icon">
                    <img class="img-circle" src="../assets/images/avatar-1.png" alt="User Image">
                  </span>
                                    <div class="media-body"><span class="block">Lisa sent you a mail</span><span class="text-muted block-time">2min ago</span></div></a>
                            </li>
                            <li class="bell-notification">
                                <a href="javascript:;" class="media">
                    <span class="media-left media-icon">
                    <img class="img-circle" src="<?php echo $photo; ?>" alt="User Image">
                  </span>
                                    <div class="media-body"><span class="block">Server Not Working</span><span class="text-muted block-time">20min ago</span></div></a>
                            </li>
                            <li class="bell-notification">
                                <a href="javascript:;" class="media"><span class="media-left media-icon">
                    <img class="img-circle" src="../assets/images/avatar-3.png" alt="User Image">
                  </span>
                                    <div class="media-body"><span class="block">Transaction xyz complete</span><span class="text-muted block-time">3 hours ago</span></div></a>
                            </li>
                            <li class="not-footer">
                                <a href="#!">See all notifications.</a>
                            </li>
                        </ul>
                    </li>
                    <!-- chat dropdown -->
                   
                    <!-- User Menu-->
                    <li class="dropdown">
                        <a href="#!" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle drop icon-circle drop-image">
                            <span><img class="img-circle " src="<?php echo $photo; ?>" style="width:40px;" alt="User Image"></span>
                            <span> <b><?php echo $_SESSION['username'];  ?></b> <i class=" icofont icofont-simple-down"></i></span>

                        </a>
                        <ul class="dropdown-menu settings-menu">
                            <li><a href="#!"><i class="icon-settings"></i> Settings</a></li>
                            <li><a href="#!"><i class="icon-user"></i> Profile</a></li>
                            <li><a href="inbox.php"><i class="icon-envelope-open"></i> My Messages</a></li>
                            <li class="p-0">
                                <div class="dropdown-divider m-0"></div>
                            </li>
                            <li><a href="#"><i class="icon-lock"></i> Lock Screen</a></li>
                            <li><a href="../logout.php"><i class="icon-logout"></i> Logout</a></li>

                        </ul>
                    </li>
                </ul>

            </div>
        </nav>
    </header>
    <!-- Side-Nav-->
    <aside class="main-sidebar hidden-print " >
        <section class="sidebar" id="sidebar-scroll">
            <div class="user-panel">
                <div class="f-left image"><img src="<?php echo $photo; ?>" alt="User Image" class="img-circle"></div>
                <div class="f-left info">
                    <p><?php echo $_SESSION['username'];  ?></p>
                    <p class="designation">Parent <i class="icofont icofont-caret-down m-l-5"></i></p>
                </div>
            </div>
            <!-- sidebar profile Menu-->
            <ul class="nav sidebar-menu extra-profile-list">
                <li>
                    <a class="waves-effect waves-dark" href="#">
                        <i class="icon-user"></i>
                        <span class="menu-text">View Profile</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="javascript:void(0)">
                        <i class="icon-settings"></i>
                        <span class="menu-text">Settings</span>
                        <span class="selected"></span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="../logout.php">
                        <i class="icon-logout"></i>
                        <span class="menu-text">Logout</span>
                        <span class="selected"></span>
                    </a>
                </li>
            </ul>
            <!-- Sidebar Menu-->
            <ul class="sidebar-menu">
                <li class="nav-level">Navigation</li>
                 <li><a href="dashboard.php"><i class="icofont icofont-dashboard"></i><span> Dashboard</span></a> </li>
         
               <!-- <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-film"></i>
                    <span>Static Pages</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                      
                        <li><a class="waves-effect waves-dark" href="#"><i class="icon-arrow-right"></i>School Dashboard</a></li>
                    </ul>
                </li>-->
                <li><a href="inbox.php"><i class="icofont icofont-ui-message"></i><span> Messages</span></a> </li>
                <li><a href="calendar.php"><i class="icofont icofont-calendar"></i><span> Calendar</span></a> </li>
                <li><a href="class_list.php"><i class="icofont icofont-ui-calendar"></i><span> Classes Schedule</span></a> </li>
				
				
                <li class="treeview"><a class="waves-effect waves-dark" href="#"><i class="icon-briefcase"></i><span>Attendance</span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                        <li><a class="waves-effect waves-dark" href="#"  data-toggle="modal" data-target="#attendance"  ><i class="icon-arrow-right"></i> Attendance</a></li>
						
                       
                    </ul>
                </li>
               
				  <li><a href="library_list.php"><i class="icofont icofont-book-alt"></i><span> Library</span></a> </li>
               <!-- <li><a href="#"><i class="icofont icofont-multimedia"></i><span> Media Center</span></a> </li>-->
                <li><a href="assignment_list.php"><i class="icofont icofont-read-book"></i><span> Assignment</span></a> </li>
                <li><a href="study_material_list.php"><i class="icofont icofont-read-book"></i><span> Study Materials</span></a> </li>
                <li><a href="exam_list.php"><i class="icofont icofont-read-book-alt"></i><span> Exam List</span></a> </li>
                <li><a href="news_list.php"><i class="icofont icofont-newspaper"></i><span> News Board</span></a> </li>
                <li><a href="event_list.php"><i class="icofont icofont-bathtub"></i><span> Event</span></a> </li>
                <li><a href="transport_list.php"><i class="icofont icofont-bus-alt-3"></i><span> Transportation</span></a> </li>
                <li><a href="#"  data-toggle="modal" data-target="#marksheet" ><i class="icofont icofont-book-alt"></i><span> Marksheet</span></a> </li>
				
				 <li class="treeview"><a class="waves-effect waves-dark" href="#!"><i class="icon-chart"></i><span> Accounting </span><i class="icon-arrow-down"></i></a>
                    <ul class="treeview-menu">
                     
                        <li><a class="waves-effect waves-dark" href="#"  data-toggle="modal" data-target="#invoice" ><i class="icon-arrow-right"></i> Payment</a></li>
                        <li><a class="waves-effect waves-dark" href="#" data-toggle="modal" data-target="#paid"><i class="icon-arrow-right"></i> Paid</a></li>
                    </ul>
                </li>
				
				
            </ul>
        </section>
    </aside>
	
	
  <div class="content-wrapper">
  <div class="container-fluid">

      
        <!-- Main content ends -->
		
		
		 
  <!-- Modal -->
                        <div class="modal fade" id="marksheet" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title">Select Child</h4>
            
			</div>
                                        <div class="modal-body">
                                          <form method="POST" class="form-horizontal link_parent" action="marksheet.php" name="addSubForm" role="form" id="form_data">
        <div class="form-group has-error">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Student *</label>
          <div class="col-sm-10">
            <select class="form-control" required="" name="std_id">
			<?php
			$sub=$obj->Get_All_Data("select * from student join parent_student_link on parent_student_link.std_id=student.uid where parent_student_link.p_id=".$_SESSION['uid']."");
		
			for($j=0;$j<count($sub);$j++){
				
			?>
			<option value="<?php echo $sub[$j]['uid'] ?>" ><?php echo $sub[$j]['fname'] ?></option>
			
			<?php  
			}
			?>
            </select>
          </div>
        </div>
		
		<br/><br/>
         <div class="form-group">
          <div class="col-sm-12">
		<button type="submit" class="btn btn-block btn-primary waves-effect" data-toggle="tooltip" id="reg" data-placement="top" title="" data-original-title="Submit To Save">Submit  <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center>	 </button>
          </div>
        </div>
		<br/><br/>
    </form>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
						
							
							
							
							
									 
  <!-- invoice modal -->
                        <div class="modal fade" id="invoice" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title">Select Child</h4>
            
			</div>
                                        <div class="modal-body">
                                          <form method="POST" class="form-horizontal link_parent" action="invoices.php" name="addSubForm" role="form" id="form_data">
        <div class="form-group has-error">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Student *</label>
          <div class="col-sm-10">
            <select class="form-control" required="" name="std_id">
			<?php
			$sub=$obj->Get_All_Data("select * from student join parent_student_link on parent_student_link.std_id=student.uid where parent_student_link.p_id=".$_SESSION['uid']."");
		
			for($j=0;$j<count($sub);$j++){
				
			?>
			<option value="<?php echo $sub[$j]['uid'] ?>" ><?php echo $sub[$j]['fname'] ?></option>
			
			<?php  
			}
			?>
            </select>
          </div>
        </div>
		
		<br/><br/>
         <div class="form-group">
          <div class="col-sm-12">
		<button type="submit" class="btn btn-block btn-primary waves-effect" data-toggle="tooltip" id="reg" data-placement="top" title="" data-original-title="Submit To Save">Submit  <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center>	 </button>
          </div>
        </div>
		<br/><br/>
    </form>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
							

							
  <!-- paid modal -->
                        <div class="modal fade" id="paid" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title">Select Child</h4>
            
			</div>
                                        <div class="modal-body">
                                          <form method="POST" class="form-horizontal link_parent" action="payments.php" name="addSubForm" role="form" id="form_data">
        <div class="form-group has-error">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Student *</label>
          <div class="col-sm-10">
            <select class="form-control" required="" name="std_id">
			<?php
			$sub=$obj->Get_All_Data("select * from student join parent_student_link on parent_student_link.std_id=student.uid where parent_student_link.p_id=".$_SESSION['uid']."");
		
			for($j=0;$j<count($sub);$j++){
				
			?>
			<option value="<?php echo $sub[$j]['uid'] ?>" ><?php echo $sub[$j]['fname'] ?></option>
			
			<?php  
			}
			?>
            </select>
          </div>
        </div>
		
		<br/><br/>
         <div class="form-group">
          <div class="col-sm-12">
		<button type="submit" class="btn btn-block btn-primary waves-effect" data-toggle="tooltip" id="reg" data-placement="top" title="" data-original-title="Submit To Save">Submit  <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center>	 </button>
          </div>
        </div>
		<br/><br/>
    </form>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
							
							
						 <!-- attendance modal -->
                        <div class="modal fade" id="attendance" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title">Select Child</h4>
                      			</div>
                                        <div class="modal-body">
                                          <form method="POST" class="form-horizontal link_parent" action="attendance_stats.php" name="addSubForm" role="form" id="form_data">
                                            <div class="form-group has-error">
                                              <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Student *</label>
                                              <div class="col-sm-10">
                                                <select class="form-control" required="" name="std_id">
                                    			<?php
                                    			$sub=$obj->Get_All_Data("select * from student join parent_student_link on parent_student_link.std_id=student.uid where parent_student_link.p_id=".$_SESSION['uid']."");
                                    		
                                    			for($j=0;$j<count($sub);$j++){
                                    				
                                    			?>
                                    			<option value="<?php echo $sub[$j]['uid'] ?>" ><?php echo $sub[$j]['fname'] ?></option>
                                    			
                                    			<?php  
                                    			}
                                    			?>
                                                </select>
                                              </div>
                                            </div>
                                    		
                                    		<br/><br/>
                                             <div class="form-group">
                                              <div class="col-sm-12">
                                    		<button type="submit" class="btn btn-block btn-primary waves-effect" data-toggle="tooltip" id="reg" data-placement="top" title="" data-original-title="Submit To Save">Submit  <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center>	 </button>
                                              </div>
                                            </div>
                                    		<br/><br/>
                                        </form>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
						