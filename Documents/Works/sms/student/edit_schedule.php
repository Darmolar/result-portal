<?php  
include('header.php');
$cl_id=base64_decode($_GET['cl_id']);
$sch_id=base64_decode($_GET['sch_id']);


$data=$obj->Get_All_Data("select * from classschedule JOIN subject on subject.sub_id=classschedule.subjectId where sch_id=$sch_id");
?>

<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index-2.html"><i class="icofont icofont-home"></i></a>
                                    </li>
                                     <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
									  <li class="breadcrumb-item"><a href="class.php.php">Classes</a></li>
                                    <li class="breadcrumb-item"><a href="class_list.php">View Classes</a></li>
                                    <li class="breadcrumb-item"><a href="classes_schedule.php?cl_id=<?php echo $cl_id; ?>">Class Schedule</a></li>
                                    <li class="breadcrumb-item"><a href="edit_schedule.php">Class Schedule</a></li>
                              
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Edit Class Schedule</h5>
                           
                        </div>
                        <div class="card-block">
						
						       <form class="form-horizontal" name="addSubForm" role="form" id="form_data">
        <div class="form-group has-error">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Subject *</label>
          <div class="col-sm-10">
            <input class="form-control" required="" type="hidden" name="sch_id" value="<?php  echo base64_decode($_GET['sch_id']); ?>"/>
            <select class="form-control" required="" name="subjectId">
			 <option  value="<?php echo $data[0]['subjectId']; ?>"><?php echo $data[0]['subject_name']; ?></option>
			<?php
			$sub=$obj->Get_All_Data("select * from subject");
			for($i=0;$i<count($sub);$i++){
			?>
			<option value="<?php echo $sub[$i]['sub_id'] ?>" ><?php echo $sub[$i]['subject_name'] ?></option>
			
			<?php  
			}
			?>
			#
            </select>
          </div>
        </div>
		<br/><br/>
        <div class="form-group" ng-class="{'has-error': addSubForm.dayOfWeek.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Day *</label>
          <div class="col-sm-10">
            <select class="form-control" required="" name="dayOfWeek">
			 <option  value="<?php echo $data[0]['dayOfWeek']; ?>"><?php echo $day_of_the_week[$data[0]['dayOfWeek']]; ?></option>
              <option  value="0" >Sunday</option>
			 <option value="1" class="ng-binding ng-scope">Monday</option>
			 <option value="2" class="ng-binding ng-scope">Tuesday</option>
			 <option value="3" class="ng-binding ng-scope">Wednesday</option>
			 <option value="4" class="ng-binding ng-scope">Thurusday</option>
			 <option value="5" class="ng-binding ng-scope">Friday</option>
			 <option value="6" class="ng-binding ng-scope">Saturday</option>
            </select>
          </div>
        </div>
		<br/><br/>
        <div class="form-group has-error" ng-class="{'has-error': addSubForm.startTimeHour.$invalid || addSubForm.startTimeMin.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Start Time *</label>
          <div class="col-sm-10">
            <div class="row">
              <div class="col-xs-3">
                <select class="form-control ng-pristine ng-invalid ng-invalid-required" ng-model="form.startTimeHour" required="" name="startTimeHour">
				
				<option value="<?php echo explode(":",$data[0]['startTime'])[0] ?>" ><?php echo explode(":",$data[0]['startTime'])[0] ?></option>
				
                  <!-- ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="0" class="ng-binding ng-scope">0</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="1" class="ng-binding ng-scope">1</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="2" class="ng-binding ng-scope">2</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="3" class="ng-binding ng-scope">3</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="4" class="ng-binding ng-scope">4</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="5" class="ng-binding ng-scope">5</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="6" class="ng-binding ng-scope">6</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="7" class="ng-binding ng-scope">7</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="8" class="ng-binding ng-scope">8</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="9" class="ng-binding ng-scope">9</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="10" class="ng-binding ng-scope">10</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="11" class="ng-binding ng-scope">11</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="12" class="ng-binding ng-scope">12</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="13" class="ng-binding ng-scope">13</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="14" class="ng-binding ng-scope">14</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="15" class="ng-binding ng-scope">15</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="16" class="ng-binding ng-scope">16</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="17" class="ng-binding ng-scope">17</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="18" class="ng-binding ng-scope">18</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="19" class="ng-binding ng-scope">19</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="20" class="ng-binding ng-scope">20</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="21" class="ng-binding ng-scope">21</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="22" class="ng-binding ng-scope">22</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="23" class="ng-binding ng-scope">23</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] -->
                </select>
              </div>
              <div class="col-xs-3">
                <select class="form-control" required="" name="startTimeMin">
					<option value="<?php echo explode(":",$data[0]['startTime'])[1] ?>" ><?php echo explode(":",$data[0]['startTime'])[1] ?></option>
                 <option value="0" >0</option>
				 <option value="5" class="ng-binding ng-scope">5</option>
				 <option value="10" class="ng-binding ng-scope">10</option>
				<option value="15" class="ng-binding ng-scope">15</option>
				<option value="20" class="ng-binding ng-scope">20</option>
				<option value="25" class="ng-binding ng-scope">25</option>
				<option value="30" class="ng-binding ng-scope">30</option>
				<option value="35" class="ng-binding ng-scope">35</option>
				<option  value="40" class="ng-binding ng-scope">40</option>
				<option value="45" class="ng-binding ng-scope">45</option>
				<option  value="50" class="ng-binding ng-scope">50</option>
				<option value="55" class="ng-binding ng-scope">55</option>
                </select>
              </div>
            </div>
          </div>
        </div>
		
		<br/><br/>
        <div class="form-group has-error" ng-class="{'has-error': addSubForm.endTimeHour.$invalid || addSubForm.endTimeMin.$invalid}">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">End Time *</label>
          <div class="col-sm-10">
            <div class="row">
              <div class="col-xs-3">
                <select class="form-control ng-pristine ng-invalid ng-invalid-required" ng-model="form.endTimeHour" required="" name="endTimeHour">
					<option value="<?php echo explode(":",$data[0]['endTime'])[0] ?>" ><?php echo explode(":",$data[0]['endTime'])[0] ?></option>
                  <!-- ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="0" class="ng-binding ng-scope">0</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="1" class="ng-binding ng-scope">1</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="2" class="ng-binding ng-scope">2</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="3" class="ng-binding ng-scope">3</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="4" class="ng-binding ng-scope">4</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="5" class="ng-binding ng-scope">5</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="6" class="ng-binding ng-scope">6</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="7" class="ng-binding ng-scope">7</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="8" class="ng-binding ng-scope">8</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="9" class="ng-binding ng-scope">9</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="10" class="ng-binding ng-scope">10</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="11" class="ng-binding ng-scope">11</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="12" class="ng-binding ng-scope">12</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="13" class="ng-binding ng-scope">13</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="14" class="ng-binding ng-scope">14</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="15" class="ng-binding ng-scope">15</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="16" class="ng-binding ng-scope">16</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="17" class="ng-binding ng-scope">17</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="18" class="ng-binding ng-scope">18</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="19" class="ng-binding ng-scope">19</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="20" class="ng-binding ng-scope">20</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="21" class="ng-binding ng-scope">21</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="22" class="ng-binding ng-scope">22</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] --><option ng-repeat="i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23]" value="23" class="ng-binding ng-scope">23</option><!-- end ngRepeat: i in [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23] -->
                </select>
              </div>
              <div class="col-xs-3">
                <select class="form-control ng-pristine ng-invalid ng-invalid-required" ng-model="form.endTimeMin" required="" name="endTimeMin">
					<option value="<?php echo explode(":",$data[0]['startTime'])[1] ?>" ><?php echo explode(":",$data[0]['startTime'])[1] ?></option>
				<option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="0" class="ng-binding ng-scope">0</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="5" class="ng-binding ng-scope">5</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="10" class="ng-binding ng-scope">10</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="15" class="ng-binding ng-scope">15</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="20" class="ng-binding ng-scope">20</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="25" class="ng-binding ng-scope">25</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="30" class="ng-binding ng-scope">30</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="35" class="ng-binding ng-scope">35</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="40" class="ng-binding ng-scope">40</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="45" class="ng-binding ng-scope">45</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="50" class="ng-binding ng-scope">50</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="55" class="ng-binding ng-scope">55</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] -->
                </select>
              </div>
            </div>
          </div>
        </div>
		<br/><br/>
         <div class="form-group">
          <div class="col-sm-12">
           <input type="hidden" name="edit_class_schedule">
		<button type="submit" class="btn btn-block btn-primary waves-effect" data-toggle="tooltip" id="reg" data-placement="top" title="" data-original-title="Submit To Save">Submit  <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center>	 </button>
          </div>
        </div>
    </form>
	
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
									if(response ==='Schedule Updated Successfully')
									{
									notify("top", "center","", "success", "animated rotateInDownRight","animated rotateOutUpRight", response ,"Successful");
									var delay = 3000;
										setTimeout((function(){ window.location.reload() }), delay);  
									}else
									{
									$('#ring').hide();
									notify("top", "center","", "danger", "animated rotateInDownRight","animated rotateOutUpRight", response ,"Failed");	
									}
									}
								});
									$('#reg').attr('disabled',true);
									$('#ring').hide();
							});
												
						</script>
	