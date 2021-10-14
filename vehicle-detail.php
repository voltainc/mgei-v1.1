<?php require_once('assets/funcs.php');
$obj = new main();
$obj->check_sesh("clerk",array("pass"=>NULL,"fail"=>"../clerk"));
$obj->connect_db();
$member = new member();
$static = new static_content;
if(isset($_GET['salt'])){
	
	$val_vehicle  = $member->val_vehicle($_GET['salt']);
	if(!$val_vehicle){
		$member->redirect("vehicle");
	}

}else{
$member->redirect("vehicle");
}

if(isset($_POST['upload'])){
	
	
	$status = ($member->upload($_FILES['document'],"uploads/vehicle/document",$val_vehicle['id']));
	if($status['status']=="success"){
		
			$msgbox = "<div class='alert alert-success'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <strong><i class='fa fa-check-circle'></i> Success</strong> {$status['message']}
                                    </div>";
		
	}else{
	
			$msgbox = "<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <strong><i class='fa fa-times-circle'></i> Error</strong> {$status['message']}
                                    </div>";
	}
}if(isset($_POST['remove_document']))
	{
		$path = @trim($_POST['remove_document']);
		if(!empty($path))
		{
			if(unlink($path))
			{
					$msgbox = "<div class='alert alert-success'>                                        
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
					<strong><i class='fa fa-check-circle'></i> Success (????) </strong> Document removed.
					</div>";
			}else
			{
						$msgbox = "<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<strong><i class='fa fa-times-circle'></i> Error (???) </strong> Error while deleting document.
						</div>";
			}
		}else
		{
						$msgbox = "<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<strong><i class='fa fa-times-circle'></i> Error (???) </strong> Invalid path supplied.
						</div>";
		}	
	}
if(isset($_POST['update'])){
		
					
					$id = trim(@$_REQUEST['update']);
					$company = trim(@$_REQUEST['company']);
					$model = trim(@$_REQUEST['vehicle_model']);
					$registration_number = trim(@$_REQUEST['vehicle_registration_number']);
					$malkiya_date = trim(@$_REQUEST['malkiya_date']);
					$insurance_date = trim(@$_REQUEST['vehicle_insurance_date']);
					$color = trim(@$_REQUEST['vehicle_color']);
					$value = trim(@$_REQUEST['vehicle_value']);
					$malkiya_expire = trim(@$_REQUEST['malkiya_expire']);
					$insurance_expire = trim(@$_REQUEST['vehicle_insurance_expire']);

					if(!empty($id) AND !empty($company)  AND !empty($model) AND !empty($registration_number) AND !empty($malkiya_date) AND !empty($insurance_date) AND !empty($color) AND !empty($value) AND !empty($malkiya_expire) AND !empty($insurance_expire)){
					
					$val_dates = $member->verify_dates_veh($malkiya_date,$malkiya_expire,$insurance_date,$insurance_expire);
					
						if($val_dates['status']=="success"){

								$q =mysql_query("select * from vehicle where registration_number = {$registration_number} and id!={$id}");
								
								if(mysql_num_rows($q)>0){
									
											
										$msgbox = "<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
									<strong><i class='fa fa-times-circle'></i> Error (???) </strong> A Vehicle with same registration number already exists
									</div>";

										
								}else{
									
										$q = mysql_query("update vehicle set model='{$model}',registration_number='{$registration_number}',color='{$color}',malkiya_date='{$malkiya_date}',malkiya_expire='{$malkiya_expire}',insurance_date='{$insurance_date}',insurance_expire='{$insurance_expire}',value='{$value}' where id={$id}");
										
										if($q){
											
													$msgbox = "<div class='alert alert-success'>                                        
													<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
													<strong><i class='fa fa-check-circle'></i> Success (????) </strong> Vehicle info Updated.
													</div>";
											$val_vehicle  = $member->val_vehicle($_GET['salt']);
										}else{
											
												$msgbox = "<div class='alert alert-danger'>
											<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
											<strong><i class='fa fa-times-circle'></i> Error (???) </strong> An error occurred while processing, please report this to admin
											</div>";
											
										}
									
								}
								
						 }else{

						 

								$msgbox = "<div class='alert alert-danger'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
							<strong><i class='fa fa-times-circle'></i> Error (???) </strong> {$val_dates['message']}
							</div>";

						 

						 }
					 }else{
							
								$msgbox = "<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<strong><i class='fa fa-times-circle'></i> Error (???) </strong> Fields with * are required
						</div>";
						 
					 }

}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<?php 
		
		echo $static->head("inner");
?>
<body class="">
<!--Navigation Top Bar Start-->
<?php 
	
		echo $static->nav("inner");
	
?>
<!--Navigation Top Bar End-->
<section id="main-container">

<!--Left navigation section start-->
<?php echo $static->sidebar('vehicle');?>
<!--Left navigation section end-->


<!--Page main section start-->
<section id="min-wrapper">
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--Top header start-->
                    
					
                    <!--Top header end -->

                    <!--Top breadcrumb start -->
                 <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class='fa fa-cog'></i> Vehicle Info</h3>
                                    <ul class="panel-control">
                                        <li><a class="minus" href="javascript:void(0)"><i class="fa fa-minus"></i></a></li>
                                        <li><a class="wrench" data-toggle="modal" data-target="#update_vehicle"   href="javascript:void(0)"><i class="fa fa-wrench"></i></a></li>
										<li><a class="close-panel" href="javascript:void(0)"><i class="fa fa-times"></i></a></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class='col-md-12'>
										
										<div class='col-md-3'>
											<a href="javascript:void(0)">
											<img style='width:140px; height:140px; border:5px dotted gray;border-radius: 25px;' src='assets/images/logo/company_logo.png' title="Company logo" alt='Company Logo'></img>
											</a>
											<br />
											<br />
										</div>
										<div class='col-md-3'>
											<p><b>Registration number : </b><?php echo ucwords($val_vehicle['registration_number']);?></p>
											<hr />
											<p><b>Model : </b><?php echo ucwords($val_vehicle['model']);?></p>
											<hr />
											<p><b>Color : </b><?php echo ucwords($val_vehicle['color']);?></p>
											<hr />
											
										</div>
										<div class='col-md-3'>
											<p><b>Insurance Date : </b><?php echo date("d,M Y",strtotime($val_vehicle['insurance_date']));?></p>
											<hr />
											<p><b>Malkiya Date : </b><?php echo date("d,M Y",strtotime($val_vehicle['malkiya_date']));?></p>
											<hr />
												<p><b>Added : </b><?php echo date("d,M Y",strtotime($val_vehicle['reg_date']));?></p>
											<hr />
										</div>
										<div class='col-md-3'>
											<p><b>Insurance Exire : </b><?php echo date("d,M Y",strtotime($val_vehicle['insurance_expire']));?></p>
											<hr />
											<p><b>Malkiya Exire : </b><?php echo date("d,M Y",strtotime($val_vehicle['malkiya_expire']));?></p>
											<hr />
											<p><b>Company : </b><?php echo ucwords($member->ret_by("company","id",$val_vehicle['company'],"name"));?></p>
											<hr />
											
										</div>
									</div>
                                </div>
                            </div>
                        </div>
						
					
                    </div>
					
					<div class="row">
					<div class="col-md-12"><?php if(isset($msgbox)){echo $msgbox;}?></div>
					<div class="col-md-12">
					<div class='row'>
					
                         <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-archive"></i> Documents</h3>
                                    <ul class="panel-control">
                                        <li><a data-toggle="modal" data-target="#upload" class="label label-success refresh" href="javascript:void(0)"><i class="fa fa-upload white"></i></a>&nbsp;&nbsp;</li>
                                        <li><a class="minus" href="javascript:void(0)"><i class="fa fa-minus"></i></a></li>
                                        <li><a class="close-panel" href="javascript:void(0)"><i class="fa fa-times"></i></a></li>
                                    </ul>
                            </div>
                            <div class="panel-body no-padding">
                                <div class="nano nano-recent-activities">
                                    <div class="nano-content nano-activities">
                                        <div class="feed-box">
                                            <ul class="ls-feed">
                                                <?php 
													
													$docs = @$member->dirToArray("uploads/vehicle/document/{$val_vehicle['id']}");
													if(!empty($docs))
													{
														foreach($docs as $val)
														{
												?>
																<li> 
																						<span class="label label-primary">
																							<i class="fa fa-download white"></i>
																						</span>
																						<a href="javascript:void(0)" onclick="OpenInNewTab('<?php echo "uploads/vehicle/document/{$val_vehicle['id']}/{$val}";?>')"><?php echo $val; ?></a>
																						<a title='Remove (???)' class="text-danger" href="javascript:void(0)" data-toggle="modal" data-target="#unlink" onclick="clip_value('remove_document','<?php echo "uploads/vehicle/document/{$val_vehicle['id']}/{$val}";?>')"><span class="date"><i class='fa fa-times-circle'></i></span></a>
																</li>
												<?php 
														}
													}else{
														?>
															<li> 
																<span class="label label-primary">
																	<i class="fa fa-exclamation-circle white"></i>
																</span>
																Empty
																
															</li>
														<?php
													}
												?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					</div>
					</div>
                        
                    </div>
                    <!--Top breadcrumb start -->
                </div>
            </div>
            <!-- Main Content Element  Start-->
            
                    <hr/>

            <!-- Main Content Element  End-->

<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header label-primary white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" >Upload Document</h4>
                </div>
                <div class="modal-body">
                    <div class="block"> 
									
																	 
																	<form method="POST" enctype='multipart/form-data'>
																		
																		<div class="panel-body">
																			<div class="ls_form">
																				<div class='col-md-12'>
																							<div class="form-group">
																								<label>Document *</label>
																								<input name="document" type="file" class="form-control">
																							</div>
																							<div class="form-group">
																								<button name='upload' class='btn btn-primary full-width'>Upload Document</button>
																							</div>
																				   </div>
																				   
																					
																			</div>
																		</div>
																	</form>
													
															   
									</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
</div>
<div class="modal fade" id="unlink" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
			<div class="modal-content">
					<div class="modal-header label-primary white">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" >Remove Document (???)</h4>
					</div>
					<div class="modal-body">
						<div class="block">
							<span class="text-danger">
								<p><h4>Are you sure you want to remove this document ?</h4></p>
								<p>Deleting this document will result in the following effects :</p>
								<ul>
								<li>The data associated with the document will be lost.</li>
								</ul>
								<p><i class='fa fa-warning'></i> Caution : This effect is irreversible i.e once the doucment is removed the data associated with it is destroyed and cannot be restored.</p>
							</span>
						</div>
					</div>
					<div class="modal-footer">
						<form method="POST"><button type="submit" id="remove_document" name="remove_document" type="button" class="btn btn-success btn-xs">Remove (???) </button>
						<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close (????) </button></form>
					</div>
			</div>
		</div>
</div>
<div class="modal fade" id="update_vehicle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header label-primary white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" >Update Employee (????? ????) </h4>
                </div>
                <div class="modal-body">
                    <form method="POST" class='row'>
											<div class='col-md-6'>
												<div class="form-group">
													<label>Vehicle Model (??? ???????) *</label>
													<input type="text" name="vehicle_model" value="<?php echo $val_vehicle['model']; ?>" placeholder="Enter Vehicle Model" class="form-control">
												</div>
												<div class="form-group">
													<label>Vehicle Registration No (??? ???????) *</label>
													<input type="text" name="vehicle_registration_number" value="<?php echo $val_vehicle['registration_number']; ?>" placeholder="Enter Vehicle Registration Number" class="form-control">
												</div>
												
												<div class="form-group">
													<label>Malkiya Renewal Date (????? ????????) *</label>
													<input name="malkiya_date" value="<?php echo $val_vehicle['malkiya_date']; ?>" placeholder="Enter Malkiya Renewal Date" class="form-control datepicker">
												</div>
												<div class="form-group">
													<label>Vehicle Insurance Date (????? ???????) *</label>
													<input name="vehicle_insurance_date" value="<?php echo $val_vehicle['insurance_date']; ?>" placeholder="Enter Vehicle Insurance Date" class="form-control datepicker">
												</div>
												
											</div>
											<div class='col-md-6'>
												<div class="form-group">
													<label>Vehicle Color (?????) *</label>
													<input type="text" name="vehicle_color" value="<?php echo $val_vehicle['color']; ?>" placeholder="Enter Vehicle Color" class="form-control">
												</div>
												<div class="form-group">
													<label>Vehicle Value (??????) *</label>
													<input type="number" name="vehicle_value" value="<?php echo $val_vehicle['value']; ?>" placeholder="Enter Vehicle Value" class="form-control">
												</div>
												<div class="form-group">
													<label>Malkiya Expiry (???????? ??????) *</label>
													<input name="malkiya_expire" value="<?php echo $val_vehicle['malkiya_expire']; ?>" placeholder="Enter Expire Date" class="form-control datepicker">
												</div>
												<div class="form-group">
													<label>Vehicle Insurance Expiry (?????? ???????) *</label>
													<input name="vehicle_insurance_expire" value="<?php echo $val_vehicle['insurance_expire']; ?>" placeholder="Enter Vehicle Insurance Date" class="form-control datepicker">
												</div>
												
												
											</div>
								<div class='row'>
									<div class='col-md-12'>
										<input type='hidden' name="company" value="<?php echo $val_vehicle['company']; ?>"/>
										<button type="submit" name="update" value="<?php echo $val_vehicle['id'];?>" class='btn btn-primary full-width'>Update Vehicle (???) </button>
									</div>
								</div>
							
					</form>
					
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-xs" data-dismiss="modal">Close (????)</button>
                </div>
            </div>
        </div>
    </div>

<?php 
		
		echo $static->jslib("inner");
?>
<!--Layout Script End -->
</body>

</html>