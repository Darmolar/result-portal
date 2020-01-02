<?php
include('header.php');

?>
<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                                <h4>Dashboard</h4>
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index-2.html"><i class="icofont icofont-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                  
                                </ol>
                            </div>
                        </div>
                    </div>

						<div class="row m-b-30 dashboard-header">
                <div class="col-lg-4 col-sm-6">
				<a href="users_cate.php">
                    <div class="dashboard-primary bg-primary">
                        <div class="sales-primary">
                            <i class="fa fa-users fa-5x"></i>
                            <div class="f-right">
                                <h2 class="counter"><?php 
									$data=$obj->Get_All_Data("select * from users");
									echo count($data);
								?></h2>
                            </div>
                        </div>
						<div class="bg-dark-primary">
                            <p class="week-sales">Users Statistics</p>
                        </div>
                    </div>
					</a>
                </div>
                <div class="col-lg-4 col-sm-6">
				<a href="#">
                    <div class="bg-success dashboard-success">
                        <div class="sales-success">
                            <i class="fa fa-money fa-5x"></i>
                            <div class="f-right">
                                <h2 class="counter">3521</h2>
                                <span>Payment</span>
                            </div>
                        </div>
						<div class="bg-dark-success">
                            <p class="week-sales">Payments</p>
                        </div>
                    </div>
					</a>
                </div>
                <div class="col-lg-4 col-sm-6">
				<a href="#" class="md-trigger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Upload" data-modal="modal-9">
                    <div class="bg-warning dasboard-warning">
                        <div class="sales-warning">
                            <i class="fa fa-calculator fa-5x"></i>
                            <div class="f-right">
                                <h2 class="counter">
								<?php 
									$data=$obj->Get_All_Data("select * from grade");
									echo count($data);
								?>
								
								</h2>
                                <span>Result</span>
                            </div>
                        </div>
						
						<div class="bg-dark-warning">
                            <p class="week-sales">Result(s)</p>
                        </div>
						
                    </div>
					</a>
                </div>
               
            </div>
				
			
			<div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="col-sm-12 card">
                        <div class="card-block">
                            <h6 class="m-b-20">Users Statistics</h6>
							<div class="table table-responsive">
                            <div id="website-stats" style="height: 420px; -webkit-tap-highlight-color: transparent; user-select: none; cursor: default; background-color: rgba(0, 0, 0, 0);" _echarts_instance_="1490763305328"><div style="position: relative; overflow: hidden; width: 739px; height: 420px;"><div data-zr-dom-id="bg" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 739px; height: 420px; user-select: none;"></div><canvas width="739" height="420" data-zr-dom-id="0" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 739px; height: 420px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="739" height="420" data-zr-dom-id="1" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 739px; height: 420px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><canvas width="739" height="420" data-zr-dom-id="_zrender_hover_" class="zr-element" style="position: absolute; left: 0px; top: 0px; width: 739px; height: 420px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas><div class="echarts-tooltip zr-element" style="position: absolute; display: none; border-style: solid; white-space: nowrap; transition: left 0.4s, top 0.4s; background-color: rgba(0, 0, 0, 0.701961); border-width: 0px; border-color: rgb(51, 51, 51); border-radius: 4px; color: rgb(255, 255, 255); padding: 5px; left: 380px; top: 190px;">Thursday<br>Visits : 54<br>Pages/Visits : 791<br>Users : 234</div></div></div>
							</div>
                        </div>

                    </div>
                </div>
            </div>
			
			
			
			<div class="row">
                <!-- <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="table-responsive">
							<h3>News</h3>
                               <table id="example" class="table table-striped"  width="100%">
                                 <?php
                                 $trans=$obj->Get_All_Data("select * from news");
                                 
                                 ?>
                                 <thead>
                                 <tr><th> S/N</th><th> Title</th><th> Content</th><th>For </th></tr>
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
                                 <td><?php echo $trans[$i]['title']; ?></td>
                                 <td><?php echo $trans[$i]['content']; ?></td>
                                 <td><?php echo $trans[$i]['for']; ?></td>
                                 </tr>
                                  
                                <?php 
                                }
                                echo '</tbody>';

                                ?>

                             </table>
                            </div>
                        </div>
                    </div>
                </div> -->
                 <div class="col-xl-6 col-lg-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="table-responsive">
                              <h3>Events</h3> 
							  <table id="example" class="table table-striped"  width="100%">
                                 <?php
                                 $trans=$obj->Get_All_Data("select * from event");
                                 
                                 ?>
                                 <thead>
                                 <tr><th> S/N</th><th> Title</th><th> Description</th><th>Place</th> <th>For </th></tr>
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
                                 <td><?php echo $trans[$i]['title']; ?></td>
                                 <td><?php echo $trans[$i]['desc']; ?></td>
                                 <td><?php echo $trans[$i]['place'] ?></td>
                                 <td><?php echo $trans[$i]['for']; ?></td>
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
            </div>
					<?php
include('footer.php');
 $admin_count=count($trans=$obj->Get_All_Data("select * from users where priv=1"));
 $teacher_count=count($trans=$obj->Get_All_Data("select * from users where priv=2"));
 $student_count=count($trans=$obj->Get_All_Data("select * from users where priv=3"));
 $parent_count=count($trans=$obj->Get_All_Data("select * from users where priv=4"));
?>
<script>

$(document).ready(function(){
	
	dashboard();
});

function dashboard(){


     //website States
            var myChart = echarts.init(document.getElementById('website-stats'));

            var option = {
            tooltip : {
                trigger: 'axis'
            },
            legend: {
                data:['Users']
            },

            toolbox: {
                show : false,
                feature : {
                    mark : {show: true},
                    dataView : {show: true, readOnly: false},
                    magicType : {show: true, type: ['line', 'bar', 'stack', 'tiled']},
                    restore : {show: true},
                    saveAsImage : {show: true}
                }
            },
            color: ["#1B8BF9", "#BBC9EC", "#49C1F7"],
            calculable : true,
            xAxis : [
                {
                    type : 'category',
                    boundaryGap : false,
                    data : ['Admin','Teacher','Parent','Student']
                }
            ],
            yAxis : [
                {
                    type : 'value'
                }
            ],
            series : [
               
			   
			   
			   
                {
                    name:'Users',
                    type:'line',
                    smooth:true,
                    itemStyle: {normal: {areaStyle: {type: 'default'}}},
                    data:[<?php echo  $admin_count; ?>, <?php echo  $teacher_count; ?>, <?php echo  $student_count; ?>, <?php echo  $parent_count; ?>]
                }
            ],
            grid: {
                zlevel: 0,
                z: 0,
                x: 40,
                y: 40,
                x2: 40,
                y2: 40,
                backgroundColor: 'rgba(0,0,0,0)',
                borderColor: '#fff',
                },
        };

        // Load data into the ECharts instance
        myChart.setOption(option);



};

</script>
