<?php  
include('header.php');
if(isset($_POST['class'])){
	$student=$obj->Get_All_Data("select * from student where class=".$_POST['class']."");
}

?>

<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index-2.html"><i class="icofont icofont-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                   <li class="breadcrumb-item"><a href="attendance.php">Attendance</a></li>
                                   
                             
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Control Attendance</h5>
                         
                        </div>
                        <div class="card-block">
                    <form class="form-horizontal ng-pristine ng-valid" ng-submit="saveAttendance()" name="form" id="form_data">
					
					 <input type="hidden"  value="<?php  echo $_POST['class'] ?>"  name="class">
					 <input type="hidden"  value="<?php  echo $_POST['sectionId'] ?>"  name="section">
					 <input type="hidden"  value="<?php  echo $_POST['subjectId'] ?>"  name="subject">
					 <input type="hidden"  value="<?php  echo $_POST['attendanceDay'] ?>"  name="date">
					 <input type="hidden"  value="<?php  echo count($student);?>"  name="total">
        <table class="table table-bordered">
            <tbody><tr>
                <th style="width: 10px">S/N</th>
                <th class="ng-binding">Student Name</th>
                <th class="ng-binding">Attendance</th>
            </tr>
            <tr>
                <th style="width: 10px">#</th>
                <th>Select All</th>
                <th>
                    <input type="button" onclick="SelectAll(pre)" class="btn btn-info btn-sm" value="Present">
                    <input type="button" onclick="SelectAll(abs)" class="btn btn-info btn-sm" value="Absent">
                    <input type="button" onclick="SelectAll(late)" class="btn btn-info btn-sm" value="Late">
                    <input type="button" onclick="SelectAll(latew)" class="btn btn-info btn-sm" value="Late with excuse">
                    <input type="button" onclick="SelectAll(earlyd)" class="btn btn-info btn-sm" value="Early Dismissal">
                </th>
            </tr>
          <?php  
		  $n=0;
		  for($i=0;$i<count($student);$i++){
		 $n++
		  ?>
		  <tr ng-repeat="student in students | object2Array | orderBy:'studentRollId'" class="ng-scope">
                <td class="ng-binding"><?php echo $n; ?></td>
                <td class="ng-binding"><?php echo $student[$i]['fname']; ?></td>
                <td>
                  <div>
                     
                    <div class="">
                        <label class="ng-binding">
                            <input type="hidden"  value="<?php echo $student[$i]['uid'];  ?>" name="student[]"> Present
                            <input type="radio"  value="1" id="pre" name="att<?php echo $i ?>"> Present
                        </label>
                        <label class="ng-binding">
                            <input type="radio" value="0" id="abs" name="att<?php echo $i ?>"> Absent
                        </label>
                        <label class="ng-binding">
                            <input type="radio"  value="2" id="late"  name="att<?php echo $i ?>"> Late
                        </label>
                        <label class="ng-binding">
                            <input type="radio" value="3" id="latew"  name="att<?php echo $i ?>"> Late with excuse
                        </label>
                        <label class="ng-binding">
                            <input type="radio" value="4" id="earlyd"  name="att<?php echo $i ?>"> Early Dismissal
                        </label>
                    </div>
                  </div>
                </td>
            </tr>
			<?php
		  }
			?>
          </tbody>
        </table>
        <br>
         <div class="form-group">
          <div class="col-sm-12">
           	<input type="hidden" name="control_attendance">
							<button type="submit" class="btn btn-block btn-primary waves-effect waves-light m-r-10" data-toggle="tooltip" id="reg" data-placement="top" title="" data-original-title="Submit To Save">Submit  <center><img style="display:none;" width="30" id="ring1" src="../assets/images/ring.gif" /></center>	 </button>
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


function SelectAll(name){
var j=-1;
var allElems = document.getElementsByTagName('input');
//console.log(allElems);
var id=name.length;
if(typeof id!="undefined"){
	
for (i = 0; i < allElems.length; i++) {
	j++
	if(j>name.length-1){
		j=0;
	}
	//console.log(j);
    if (allElems[i].id ==name[j].id) {
		
        allElems[i].checked = true;
    }
}
}
else{
	//alert(id)		
for (i = 0; i < allElems.length; i++) {
    if (allElems[i].id ==name.id) {
		
        allElems[i].checked = true;
    }
}
}
}
 
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
									if(response ==='Attendance Created Successfully')
									{
									notify("top", "center","", "success", "animated rotateInDownRight","animated rotateOutUpRight", response ," Successful");
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