<?php  
include('header.php');
$mid=base64_decode($_GET['msg_id']);
   $msg=$obj->Get_All_Data("select * from message JOIN users on users.uid=message.sender_id where mid=$mid");
		//print_r($msg);														
		$obj->Execute_Query("UPdate message set view=1 where mid=$mid");														
?>

<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="icofont icofont-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="inbox.php">Message</a></li>
                                    <li class="breadcrumb-item"><a href="read_mail.php">Read Message</a></li>
                                  
                             
                                </ol>
                            </div>
                        </div>
                    </div>


					
					<div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-block">
                                <div class="col-xl-2 col-lg-12">
                                    <a href="compose.html" class="btn btn-inverse-danger waves-effect waves-light btn-block">Compose
                                    </a>
                                    <div class="list-group compose-list-group">
                                        <a href="inbox.php" class="list-group-item active">
                                                    <i class="icofont icofont-download-alt"></i> Inbox <b class="email-count">(<?php 

															 $count=$obj->Get_All_Data("select * from message  where reciever_id=".$_SESSION['uid']." and view=0");
															 if($count>0){
															 echo count($count);
															 }
															 else{
																 echo 0;
															 }
																

													?>)</b>
                                                </a>

                                    </div>
                                </div>
                                <div class="col-xl-10 col-lg-12">
                                    <div class="email-icon">
                                        <div class="btn-group waves-effect waves-light" role="group">
                                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light"><i class="icofont icofont-inbox"></i>
                                            </button>
                                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light"><i class="icofont icofont-exclamation-circle"></i>
                                            </button>
                                            <button type="button" class="btn btn-primary btn-sm waves-effect waves-light"><i class="icofont icofont-ui-delete"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="card email-card">
                                            <div class="card-header">
                                                <h5 class="card-header-text text-capitalize d-inline-block"><?php echo $msg[0]['fname']; ?></h5>
                                                <h6 class="f-right"><?php echo $msg[0]['date']; ?></h6>
                                            </div>
                                            <div class="card-block">
                                                <div class="media m-b-20">
                                                    <div class="media-body photo-contant">

                                                        <div>
                                                            <h6 class="email-welcome-txt"><?php echo $msg[0]['content']; ?></h6>
                                                            <p class="email-content">
                                                             
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
					
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
	