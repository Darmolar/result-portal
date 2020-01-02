<?php  
include('header.php');

?>

<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index-2.html"><i class="icofont icofont-home"></i></a>
                                    </li>
                                     <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="hostel_list.php">View Attendance</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">Attendance Statistic</h5>
                           
                        </div>
                        <div class="card-block">
						<table id="example" class="table table-striped"  width="100%">
 <?php
 $att=array("0"=>"Absent","1"=>"Present","2"=>"Late","3"=>"Late with excuse","4"=>"Early Dismissal");
 if(!is_numeric($_POST['status'])){
 $trans=$obj->Get_All_Data("select * from attendance 
 join class on class.cl_id=attendance.classId
 JOIN subject on subject.sub_id=attendance.subjectId
JOIN student on student.uid=attendance.studentId
 where attendance.subjectId=".$_POST['subjectId']." and attendance.classId=".$_POST['class']." and attendance.date='".$_POST['attendanceDay']."'");
 }else{
	// echo 1;
	 $trans=$obj->Get_All_Data("select * from attendance 
 join class on class.cl_id=attendance.classId
 JOIN subject on subject.sub_id=attendance.subjectId
JOIN student on student.uid=attendance.studentId
 where subjectId=".$_POST['subjectId']." and classId=".$_POST['class']." and attendance.date='".$_POST['attendanceDay']."' and status=".$_POST['status']."");
 }
 ?>
 <thead>
 <tr><th> S/N</th><th> Student</th><th> Class</th><th>Subject</th><th>Status</th> <th>Date </th></tr>
 </thead>
 <tbody>
 
 <?php
///looping through the dataset
$n=0;
 for($i=0;$i<count($trans);$i++){ 
 $n++;
 ?>
 <tr>
 <td><?php echo $n; ?></td>
 <td><?php echo $trans[$i]['fname']; ?></td>
 <td><?php echo $trans[$i]['clname']; ?></td>
 <td><?php echo $trans[$i]['subject_name']; ?></td>
 <td><?php echo $att[$trans[$i]['status']] ?></td>
 <td><?php echo $trans[$i]['date']; ?></td>
 </tr>
  
<?php 
}
echo '</tbody>';

?>

 </table>
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