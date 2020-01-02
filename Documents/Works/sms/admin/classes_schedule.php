<?php  
include('header.php');
$class_id= $_GET['cl_id']; 
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
                 <li class="breadcrumb-item"><a href="classes_schedule.php?cl_id=<?php echo $class_id; ?>">Class Schedule</a></li>
          
            </ol>
        </div>
    </div>
</div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">List Of Classes Schedule</h5>
                           
                        </div>
          <div class="card-block">
						<table id="" class="table table-striped"  width="100%">
             <thead>
             <tr><th> Days</th><th>Classes Schedule</th><th>Add </th></tr>
             </thead>
               <tbody>
               <?php
               
               for($j=0;$j<count($day_of_the_week);$j++){
              	 
               ?>
                <tr>
               
               <td><?php echo $day_of_the_week[$j]; ?></td>
               <td>
               <?php

               $sunday=$obj->Get_Schedule($j);
               //print_r($sunday);
               for($i=0;$i<count($sunday);$i++){ 

              	
               echo '<div class="dropdown-primary dropdown">
                      <button class="btn btn-primary dropdown-toggle waves-effect waves-light " type="button" id="dropdown1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">'.$sunday[$i]['subject_name']. '-'.$sunday[$i]['startTime'].'=> '.$sunday[$i]['endTime'].'
                       </button>
                      <div class="dropdown-menu" aria-labelledby="dropdown1" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                      <a class="dropdown-item waves-light" href="edit_schedule.php?cl_id='.base64_encode($class_id).'&sch_id='.base64_encode($sunday[$i]['sch_id']).'">Edit</a>';
              		?>
                      <a class="dropdown-item waves-light waves-effect" onclick="Delete_Record('Schedule Deleted Sucessfully','classschedule','sch_id','<?php echo $sunday[$i]['sch_id'] ?>','ring<?php echo $sunday[$i]['sch_id'] ?>','classes_schedule.php')" >Delete</a>
                      </div>
                      </div>
              		<?php
              								
              			continue;				 
               	include_once("edit_class_schedule.php");	

               }


               ?>

               
               </td>
               
              <td>  
                  <a class="waves-light btn btn-primary" data-toggle="modal" data-target="#large-Modal" ><i class="fa fa-plus "></i></a>
              </td>

               <?php
               }
               
               ?>
                </tr>
               </tbody>


 </table>
                          </div>
                        </div>
                    </div>
                </div>


</div>
		
                            <!-- Modal -->
                        <div class="modal fade" id="large-Modal" tabindex="-1" role="dialog">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            <h4 class="modal-title">Create Class Schedule</h4>
            
			</div>
                                        <div class="modal-body">
                                          <form class="form-horizontal" name="addSubForm" role="form" id="form_data">
        <div class="form-group has-error">
          <label for="inputPassword3" class="col-sm-2 control-label ng-binding">Subject *</label>
          <div class="col-sm-10">
            <input class="form-control" required="" type="hidden" name="classId" value="<?php  echo base64_decode($_GET['cl_id']); ?>"/>
            <select class="form-control" required="" name="subjectId">
			
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
                  <option value="0" class="ng-binding ng-scope">0</option>
        				  <option value="1" class="ng-binding ng-scope">1</option>
        				  <option value="2" class="ng-binding ng-scope">2</option>
        				  <option value="3" class="ng-binding ng-scope">3</option>
        				  <option  value="4" class="ng-binding ng-scope">4</option><option  value="5" class="ng-binding ng-scope">5</option><option  value="6" class="ng-binding ng-scope">6</option><option  value="7" class="ng-binding ng-scope">7</option><option  value="8" class="ng-binding ng-scope">8</option><option  value="9" class="ng-binding ng-scope">9</option><option  value="10" class="ng-binding ng-scope">10</option><option  value="11" class="ng-binding ng-scope">11</option><option  value="12" class="ng-binding ng-scope">12</option><option  value="13" class="ng-binding ng-scope">13</option><option  value="14" class="ng-binding ng-scope">14</option><option  value="15" class="ng-binding ng-scope">15</option><option  value="16" class="ng-binding ng-scope">16</option><option  value="17" class="ng-binding ng-scope">17</option><option  value="18" class="ng-binding ng-scope">18</option><option  value="19" class="ng-binding ng-scope">19</option><option  value="20" class="ng-binding ng-scope">20</option><option  value="21" class="ng-binding ng-scope">21</option><option  value="22" class="ng-binding ng-scope">22</option><option  value="23" class="ng-binding ng-scope">23</option>
                </select>
              </div>
              <div class="col-xs-3">
                <select class="form-control" required="" name="startTimeMin">
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
                   <option  value="0" class="ng-binding ng-scope">0</option>
          			   <option  value="1" class="ng-binding ng-scope">1</option>
          			   <option  value="2" class="ng-binding ng-scope">2</option>
          			   <option  value="3" class="ng-binding ng-scope">3</option>
          			   <option  value="4" class="ng-binding ng-scope">4</option>
          			   <option  value="5" class="ng-binding ng-scope">5</option>
          			   <option  value="6" class="ng-binding ng-scope">6</option>
          			   <option  value="7" class="ng-binding ng-scope">7</option>
          			   <option  value="8" class="ng-binding ng-scope">8</option>
          			   <option  value="9" class="ng-binding ng-scope">9</option>
          			   <option  value="10" class="ng-binding ng-scope">10</option>
          			   <option  value="11" class="ng-binding ng-scope">11</option>
          			   <option  value="12" class="ng-binding ng-scope">12</option>
          			   <option  value="13" class="ng-binding ng-scope">13</option>
          			   <option  value="14" class="ng-binding ng-scope">14</option>
          			   <option  value="15" class="ng-binding ng-scope">15</option>
          			   <option  value="16" class="ng-binding ng-scope">16</option>
          			   <option  value="17" class="ng-binding ng-scope">17</option>
          			   <option  value="18" class="ng-binding ng-scope">18</option>
          			   <option  value="19" class="ng-binding ng-scope">19</option>
          			   <option  value="20" class="ng-binding ng-scope">20</option>
          			   <option  value="21" class="ng-binding ng-scope">21</option>
          			   <option  value="22" class="ng-binding ng-scope">22</option>
          			   <option  value="23" class="ng-binding ng-scope">23</option>
                </select>
              </div>
              <div class="col-xs-3">
                <select class="form-control ng-pristine ng-invalid ng-invalid-required" ng-model="form.endTimeMin" required="" name="endTimeMin">
				
                  <!-- ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="0" class="ng-binding ng-scope">0</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="5" class="ng-binding ng-scope">5</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="10" class="ng-binding ng-scope">10</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="15" class="ng-binding ng-scope">15</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="20" class="ng-binding ng-scope">20</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="25" class="ng-binding ng-scope">25</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="30" class="ng-binding ng-scope">30</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="35" class="ng-binding ng-scope">35</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="40" class="ng-binding ng-scope">40</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="45" class="ng-binding ng-scope">45</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="50" class="ng-binding ng-scope">50</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] --><option ng-repeat="i in [00,05,10,15,20,25,30,35,40,45,50,55]" value="55" class="ng-binding ng-scope">55</option><!-- end ngRepeat: i in [00,05,10,15,20,25,30,35,40,45,50,55] -->
                </select>
              </div>
            </div>
          </div>
        </div>
		<br/><br/>
         <div class="form-group">
          <div class="col-sm-12">
           <input type="hidden" name="create_class_schedule">
        		<button type="submit" class="btn btn-block btn-primary waves-effect" data-toggle="tooltip" id="reg" data-placement="top" title="" data-original-title="Submit To Save">Submit  <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center>	 </button>
                  </div>
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

			<?php  
include('footer.php');
?>

						
						<script>
 
 $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
 
 
 </script>
 
 
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
									if(response ==='Schedule Created Successfully')
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
	