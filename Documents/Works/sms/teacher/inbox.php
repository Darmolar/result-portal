<?php
include('header.php');

?>
<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                                <h4>Inbox</h4>
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="icofont icofont-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="inbox.php">Inbox</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
<div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-block">
                                    <div class="">
                                        <div class="col-xl-2 col-lg-12">
                                            <a href="compose.php" class="btn btn-inverse-danger waves-effect waves-light btn-block">Compose
                                            </a>
                                            <div class="list-group compose-list-group">
                                                <a href="inbox.php" class="list-group-item active">
                                                    <i class="icofont icofont-download-alt"></i> Inbox <b class="email-count">(<?php 
													//print_r($_SESSION);
						$count=$obj->Get_All_Data("select * from message  where reciever_id=".$_SESSION['uid']." 
						and view=0");
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
                                           
                                            <div class="table-responsive">
                                                <table class="table table-hover email-table">
                                                    <tbody class="email-body">
                                                   <?php
												   $msg=$obj->Get_All_Data("select * from message 
																JOIN users on users.uid=message.sender_id where reciever_id=".$_SESSION['uid']."");
																
																//print_r($msg);
												   for($i=0;$i<count($msg);$i++){
												   
												   ?>
                                                    <tr class="unread">
                                                        <td>
                                                            <div class="checkbox-fade fade-in-primary checkbox ">
                                                                <label>
                                                                    <input type="checkbox" value="">
                                                                    <span class="cr"><i class="cr-icon icofont icofont-verification-check txt-primary"></i></span>
                                                                </label>
                                                            </div>
                                                            <i class="icofont icofont-star txt-info"></i>
                                                          
                                                        </td>
                                                        <td><a href="read-mail.html" class="email-name"><?php echo $msg[$i]['username']; ?></a></td>
                                                        <td><a href="read-mail.html" class="email-name"></a><?php echo $obj->Hide_Some($msg[$i]['content']); ?></td>
                                                      
                                                        <td class="email-time"><?php echo $msg[$i]['date']; ?></td>

                                                    </tr>
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
                        </div>
                    </div>
					
					<?php
include('footer.php');

?>
