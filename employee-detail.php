<?php require_once('assets/funcs.php');
$obj = new main();
$obj->check_sesh("clerk",array("pass"=>NULL,"fail"=>"../clerk"));
$obj->connect_db();
$member = new member();
$static = new static_content;
if(isset($_GET['salt'])){
	
	$val_employee  = $member->val_employee($_GET['salt']);
	if(!$val_employee){
		$member->redirect("employee");
	}

}else{
$member->redirect("employee");
}

if(isset($_POST['upload'])){
	
	
	$status = ($member->upload($_FILES['document'],"uploads/employee/document",$val_employee['id']));
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
					<strong><i class='fa fa-check-circle'></i> Success (نجاح) </strong> Document removed.
					</div>";
			}else
			{
						$msgbox = "<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<strong><i class='fa fa-times-circle'></i> Error (خطأ) </strong> Error while deleting document.
						</div>";
			}
		}else
		{
						$msgbox = "<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<strong><i class='fa fa-times-circle'></i> Error (خطأ) </strong> Invalid path supplied.
						</div>";
		}	
	}
if(isset($_POST['update'])){
	
					$emp_id = trim(@$_POST['update']);
					$employee = trim(@$_POST['name']);
					$passport = trim(@$_POST['passport']);
					$visa_date = trim(@$_POST['visa_date']);
					$visa_expire = trim(@$_POST['visa_expire']);
					$dob = trim(@$_POST['dob']);
					$joined = trim(@$_POST['joined']);
					$cid = trim(@$_POST['cid']);
					$basic_salary = trim(@$_POST['basic_salary']);
					$designation = trim(@$_POST['designation']);
					$insurance_date = trim(@$_POST['insurance_date']);
					$insurance_expire = trim(@$_POST['insurance_expire']);
					

					 if(!empty($emp_id) AND !empty($employee)  AND !empty($passport) AND !empty($visa_date)  AND !empty($visa_expire) AND !empty($dob)  AND !empty($joined)  AND !empty($cid)  AND !empty($basic_salary)  AND !empty($designation)  AND !empty($insurance_date)  AND !empty($insurance_expire)){
					
					$val_dates = $member->verify_dates_emp($visa_date,$visa_expire,$insurance_date,$insurance_expire);
					
						if($val_dates['status']=="success"){

								if($passport == $val_employee['passport']){
									
									$q  = mysql_query("update employee set name='{$employee}',passport='{$passport}',visa_date='{$visa_date}',visa_expire='{$visa_expire}',dob='{$dob}',joined='{$joined}',cid='{$cid}',basic_salary='{$basic_salary}',designation='{$designation}',insurance_date='{$insurance_date}',insurance_expire='{$insurance_expire}' where id={$emp_id}");
									
									if($q){
										
										$msgbox = "<div class='alert alert-success'>
											<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
											<strong><i class='fa fa-check-circle'></i> Success</strong> Employee Updated
										</div>";
										$val_employee  = $member->val_employee($_GET['salt']);
									
								}else{
									$msgbox = "<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
									<strong><i class='fa fa-times-circle'></i> Error (خطأ) </strong> Failed to update employee credentials pelase report this to admin
									</div>";
								}

									
								}else{
									
									$q = mysql_query("select * from employee where passport='{$passport}'");
									if(mysql_num_rows($q)>0){
										
										$msgbox = "<div class='alert alert-danger'>
											<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
											<strong><i class='fa fa-times-circle'></i> Error (خطأ) </strong> Passport number already exists
											</div>";
										
									}else{
										
										$q  = mysql_query("update employee set name='{$employee}',passport='{$passport}',visa_date='{$visa_date}',visa_expire='{$visa_expire}',dob='{$dob}',joined='{$joined}',cid='{$cid}',basic_salary='{$basic_salary}',designation='{$designation}',insurance_date='{$insurance_date}',insurance_expire='{$insurance_expire}' where id={$emp_id}");
									
										if($q){
												
												$msgbox = "<div class='alert alert-success'>
													<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
													<strong><i class='fa fa-check-circle'></i> Success</strong> Employee Updated
												</div>";
												$val_employee  = $member->val_employee($_GET['salt']);
											
										}else{
											$msgbox = "<div class='alert alert-danger'>
											<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
											<strong><i class='fa fa-times-circle'></i> Error (خطأ) </strong> Failed to update employee credentials pelase report this to admin
											</div>";
										}
										
									}
									
									
								}
								
						 }else{

						 

								$msgbox = "<div class='alert alert-danger'>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
							<strong><i class='fa fa-times-circle'></i> Error (خطأ) </strong> {$val_dates['message']}
							</div>";

						 

						 }
					 }else{
							
								$msgbox = "<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<strong><i class='fa fa-times-circle'></i> Error (خطأ) </strong> Fields with * are required
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
<?php echo $static->sidebar('employee');?>
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
                                    <h3 class="panel-title"><i class='fa fa-cog'></i> Employee Info</h3>
                                    <ul class="panel-control">
                                        <li><a class="minus" href="javascript:void(0)"><i class="fa fa-minus"></i></a></li>
                                        <li><a class="wrench" data-toggle="modal" data-target="#update_employee"   href="javascript:void(0)"><i class="fa fa-wrench"></i></a></li>
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
											<p><b>Name : </b><?php echo ucwords($val_employee['name']);?></p>
											<hr />
											<p><b>Designation : </b><?php echo ucwords($val_employee['designation']);?></p>
											<hr />
											<p><b>Visa Date : </b><?php echo date("d,M Y",strtotime($val_employee['visa_date']));?></p>
											<hr />
											<p><b>Insurance Date : </b><?php echo date("d,M Y",strtotime($val_employee['insurance_date']));?></p>
											<hr />
										</div>
										<div class='col-md-3'>
											<p><b>Passport No : </b><?php echo ucwords($val_employee['passport']);?></p>
											<hr />
											<p><b>Civil ID : </b><?php echo ucwords($val_employee['cid']);?></p>
											<hr />
											<p><b>Visa Expire : </b><?php echo date("d,M Y",strtotime($val_employee['visa_expire']));?></p>
											<hr />
											<p><b>Insurance Expire : </b><?php echo date("d,M Y",strtotime($val_employee['insurance_expire']));?></p>
											<hr />
											
										</div>
										<div class='col-md-3'>
											<p><b>Join Date : </b><?php echo date("d,M Y",strtotime($val_employee['joined']));?></p>
											<hr />
											<p><b>Basic Salary : </b><?php echo ucwords($val_employee['basic_salary']);?></p>
											<hr />
											<p><b>Company : </b><?php echo ucwords($member->ret_by("company","id",$val_employee['company'],"name"));?></p>
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
													
													$docs = @$member->dirToArray("uploads/employee/document/{$val_employee['id']}");
													if(!empty($docs))
													{
														foreach($docs as $val)
														{
												?>
																<li> 
																						<span class="label label-primary">
																							<i class="fa fa-download white"></i>
																						</span>
																						<a href="javascript:void(0)" onclick="OpenInNewTab('<?php echo "uploads/employee/document/{$val_employee['id']}/{$val}";?>')"><?php echo $val; ?></a>
																						<a title='Remove (نزع)' class="text-danger" href="javascript:void(0)" data-toggle="modal" data-target="#unlink" onclick="clip_value('remove_document','<?php echo "uploads/employee/document/{$val_employee['id']}/{$val}";?>')"><span class="date"><i class='fa fa-times-circle'></i></span></a>
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
						<h4 class="modal-title" >Remove Document (نزع)</h4>
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
						<form method="POST"><button type="submit" id="remove_document" name="remove_document" type="button" class="btn btn-success btn-xs">Remove (نزع) </button>
						<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close (أغلق) </button></form>
					</div>
			</div>
		</div>
</div>
<div class="modal fade" id="update_employee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header label-primary white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" >Update Employee (إضافة موظف) </h4>
                </div>
                <div class="modal-body">
                    <form method="POST" class='row'>
									<span id="employee_create_msgbox"></span>
									<div class='col-md-6'>
										<div class="form-group">
                                            <label>Name (اسم) *</label>
                                            <input type="text" name="name" value="<?php echo $val_employee['name']; ?>" placeholder="Enter Name" class="form-control">
                                        </div>
										<div class="form-group">
                                            <label>DOB (تاريخ الميلاد) *</label>
                                            <input type="text" name="dob" value="<?php echo $val_employee['dob']; ?>" placeholder="Enter DOB" class="form-control datepicker">
                                        </div>
										<div class="form-group">
                                            <label>Visa Date (تاريخ التأشيرة) *</label>
                                            <input type="text" name="visa_date" value="<?php echo $val_employee['visa_date']; ?>" placeholder="Enter Visa Expire Date" class="form-control datepicker">
                                        </div>
										<div class="form-group">
                                            <label>Basic Salary (الراتب الاساسي) *</label>
                                            <input type="number" name="basic_salary" value="<?php echo $val_employee['basic_salary']; ?>" placeholder="Enter Salaray Basic" class="form-control">
                                        </div>
										<div class="form-group">
                                            <label>Insurance Date (تاريخ التأمين) *</label>
                                            <input name="insurance_date" value="<?php echo $val_employee['insurance_date']; ?>" placeholder="Enter Insurance Date" class="form-control datepicker">
                                        </div>
										
									</div>
									<div class='col-md-6'>
										<div class="form-group">
                                            <label>Passport (جواز السفر) *</label>
                                            <input type="text" name="passport" value="<?php echo $val_employee['passport']; ?>"  placehodler ="Enter Passport" class="form-control">
                                        </div>
										<div class="form-group">
                                            <label>Joining Date (دخل) *</label>
                                            <input type="text" name="joined" value="<?php echo $val_employee['joined']; ?>" placeholder="Enter Joining Date" class="form-control datepicker">
                                        </div>
										<div class="form-group">
                                            <label>Visa Expire (انتهاء صلاحية التأشيرة) *</label>
                                            <input  type="text" name="visa_expire" placeholder="Enter Visa Expire Date" value="<?php echo $val_employee['visa_expire']; ?>" class="form-control datepicker">
                                        </div>
										
										<div class="form-group">
                                            <label>Civil ID (الهوية المدنية) *</label>
                                            <input type="number" name="cid" placeholder="Enter CID" value="<?php echo $val_employee['cid']; ?>" class="form-control">
                                        </div>
										
										<div class="form-group">
                                            <label>Insurance Expire (انتهاء التأمين) *</label>
                                            <input name="insurance_expire" value="<?php echo $val_employee['insurance_expire']; ?>" placeholder="Enter Insurance Expire date" class="form-control datepicker">
                                        </div>
										
										
									</div>
									<div class='col-md-12'>
										<div class="form-group">
												<label>Designation (التعيين) *</label>
												<input type="text" name="designation" placeholder="Enter Designation" value="<?php echo $val_employee['designation']; ?>" class="form-control">
										</div>
									</div>
							
						<div class='row'>
							<div class='col-md-12'>
								<button class='btn btn-primary full-width' name="update" value="<?php echo $val_employee['id'];?>" type="submit">Update Employee (خلق) </button>
							</div>
						</div>
					</form>
					
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-xs" data-dismiss="modal">Close (أغلق)</button>
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