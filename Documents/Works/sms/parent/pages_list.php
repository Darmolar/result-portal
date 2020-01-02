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
                                    <li class="breadcrumb-item"><a href="add_page.php">Control Pages</a></li>
                                    <li class="breadcrumb-item"><a href="pages_list.php">Pages List</a></li>
                             
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">List Of Static Pages</h5>
                           
                        </div>
                        <div class="card-block">
						<table id="example">
						<thead>
						<tr>
						<th>S/N</th>
						<th>Page Title</th>
						<th>Content</th>
						<th>Status</th>
						<th>Date Created</th>
						
						</tr>
						</thead>
						<tbody>
                            <?php
							$data=$obj->Get_All_Data("select * from static_page where school_id=".$_SESSION['school_id']."");
							
							//print_r($data);
							$n=0;
							for($i=0;$i<count($data);$i++){
								$n++;
								
								if($data[$i]['status']==1){
									$stat="Active";
								}else{
									$stat="In Active";
								}
								echo'<tr> <td> '.$n.'</td><td> '.$data[$i]['title'].' </td>  <td> '.$data[$i]['content'].' </td>  <td> '.$stat.' </td><td> '.$data[$i]['date'].' </td>'; ?>
										
									
                                    </div>
                                </div> </td>  </tr>
								
								
							<?php	
							}
							?>
							</tbody>
							</table>
							
                          </div>
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
	