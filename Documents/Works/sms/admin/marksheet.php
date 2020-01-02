<?php  
include('header.php');


$grade=$obj->Get_All_Data("select * from grade where exam_id=".$_POST['exam_id']." and class_id=".$_POST['class_id']."");
//print_r($grade);
?>

<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index-2.html"><i class="icofont icofont-home"></i></a>
                                    </li>
                                     <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="">Report</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                   
				 <div class="card">
                    <div class="invoice-contact">
                        <div class="col-md-8">
                            <div class="invoice-box row">
                                <div class="col-sm-4 text-center">
                                    <h1>A</h1>
                                </div>
                                <div class="col-sm-8">
                                    <table class="table table-responsive invoice-table">
                                        <tbody>
                                        <tr>
                                            <td>Phoenixcoded</td>
                                        </tr>
                                        <tr>
                                            <td>03/08/1990</td>
                                        </tr>
                                        <tr>
                                            <td><a href="mailto:demo@gmail.com" target="_top">demo@gmail.com</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>208, Paris Point, Varachha Road, Surat. (1234) - 567891</td>
                                        </tr>
                                        <tr>
                                            <td>2589741587</td>
                                        </tr>
                                        <tr>

                                            <td><a href="#" target="_blank">www.demo.com</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row text-center">
                                <div class="col-sm-12 invoice-btn-group">
                                    <button type="button" class="btn btn-primary btn-print-invoice waves-effect waves-light m-r-20">Print Report
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-block">
					
					<?php
					
					for($i=0;$i<count($grade);$i++){
$student=$obj->Get_All_Data("select * from grade JOIN student on student.uid=grade.uid where student.uid=".$grade[$i]['uid']."");
//print_r($student);
					
					?>
                        <div class="row invoive-info">
                            <div class="col-md-4 col-xs-12 invoice-client-info">
                                <h6>Student Information :</h6>
                                <h6><?php echo $student[0]['fname']  ?> </h6>
                                <p><?php echo $student[0]['add']  ?> </p>
                                <p><?php echo $student[0]['phone']  ?> </p>
                                <p><?php echo $student[0]['email']  ?> </p>
                            </div>
                            <div class="col-md-4 col-sm-6">
                               
                            </div>
                            <div class="col-md-4 col-sm-6">
                               
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table invoice-detail-table">
                                    <thead>
                                    <tr class="thead-default">
                                        <th>Subject</th>
                                        <th>CA</th>
                                        <th>Exam</th>
                                        <th>Total</th>
                                        <th>Grade</th>
                                        <th>Remark</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                      <?php echo $student[0]['subject_name']  ?> 
                                        </td>
                                        <td>   <?php echo $student[0]['ca']  ?>  </td>
                                        <td>  <?php echo $student[0]['exam']  ?> </td>
                                        <td>   <?php echo $student[0]['total']  ?>  </td>
                                        <td>   <?php echo $student[0]['grade']  ?>  </td>
                                        <td>   <?php echo $student[0]['remark']  ?>  </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-responsive invoice-table invoice-total">
                                    <tbody>
                                    <tr>
                                        <th>Average:</th>
                                        <td>4.5</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
						<br/><br/>
                       <?php
					   
					}
					   ?>
                    </div>
                </div>
				   
                    </div>
                </div>

				
		
			<?php  
include('footer.php');
?>

