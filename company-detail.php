<?php require_once('assets/funcs.php');
$obj = new main();
$obj->check_sesh("clerk",array("pass"=>NULL,"fail"=>"../clerk"));
$obj->connect_db();
$member = new member();
$static = new static_content;
if(isset($_GET['salt'])){
	
	$val_company  = $member->val_company($_GET['salt']);
	if(!$val_company){
		$member->redirect("company");
	}

}else{
$member->redirect("company");
}
if(isset($_POST['upload'])){
	
	
	$status = ($member->upload($_FILES['document'],"uploads/company/document",$val_company['id']));
	if($status['status']=="success"){
		
			$msgbox = "<div class='alert alert-success'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <strong><i class='fa fa-check-circle'></i> Success (نجاح) </strong> {$status['message']}
                                    </div>";
		
	}else{
	
			$msgbox = "<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <strong><i class='fa fa-times-circle'></i> Error (خطأ) </strong> {$status['message']}
                                    </div>";
	}
	
}
if(isset($_POST['update'])){
	
	$company = @trim($_POST['company']);
	$owner = @trim($_POST['owner']);
	$address = @trim($_POST['address']);
	$phone = @trim($_POST['phone']);
	$prefix = @trim($_POST['prefix']);
	$fax = @trim($_POST['fax']);
	$cr = @trim($_POST['cr']);
	$other_gsm = @trim($_POST['other_gsm']);
	$company_id = @trim($_POST['update']);
	
	
		if(!empty($company) AND !empty($owner) AND !empty($address) AND !empty($phone) AND !empty($cr) AND !empty($prefix)){
	
			$company  = mysql_real_escape_string($company);
			
			$update = $member->update_company($company,$owner,$address,$phone,$prefix,$fax,$cr,$other_gsm,$company_id);
			
			if($update['status']=="success"){
						
						$msgbox = "<div class='alert alert-success'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <strong><i class='fa fa-check-circle'></i> Success (نجاح) </strong> {$update['message']}. 
                                    </div>";
						$val_company  = $member->val_company($_GET['salt']);
			
			}else{
						$msgbox = "<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <strong><i class='fa fa-warning'></i> Error (خطأ) </strong> {$update['message']}. 
                                    </div>";
			}
			
		
	
	}else{
		
		$msgbox = "<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <strong><i class='fa fa-warning'></i> Error (خطأ) </strong> fields with * cannot be empty 
                                    </div>";
	
	}
	
}
if(isset($_POST['remove_document'])){
	
	$path = @trim($_POST['remove_document']);
							if(!empty($path)){
								
									if(unlink($path)){
										
										$msgbox = "<div class='alert alert-success'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <strong><i class='fa fa-check-circle'></i> Success (نجاح) </strong> Document removed. 
                                    </div>";
										
									}else{
										
										$msgbox = "<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <strong><i class='fa fa-times-circle'></i> Error (خطأ) </strong> Error while deleting document. 
                                    </div>";
										
										
									}
									
							}else{
								
									$msgbox = "<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <strong><i class='fa fa-times-circle'></i> Error (خطأ) </strong> Invalid path supplied. 
                                    </div>";
								
							}
	
}
if(isset($_POST['remove_bank_account'])){
	
	$acc = @trim($_POST['remove_bank_account']);
	
							if(!empty($acc)){
								
								$q = mysql_query("delete from bank_account where id={$acc}");
								
									if($q){
										
										$msgbox = "<div class='alert alert-success'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <strong><i class='fa fa-check-circle'></i> Success (نجاح) </strong> Bank account removed. 
                                    </div>";
										
									}else{
										
										$msgbox = "<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <strong><i class='fa fa-times-circle'></i> Error (خطأ) </strong> Error while deleting bank account. 
                                    </div>";
										
										
									}
									
							}else{
								
									$msgbox = "<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <strong><i class='fa fa-times-circle'></i> Error (خطأ)</strong> Invalid bank account credentials supplied. 
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
<?php echo $static->sidebar('company');?>
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
					 
					  <div data-toggle="modal" data-target="#manage_bank_accounts"  class="col-md-3 col-sm-6">
                            <div class="ls-wizard  label-blue">
                                <h2>Bank Acc. <small>(<?php echo $member->count_bank_account($val_company['id']);?>) Total</small></h2>
                                <span style="font-size:17px;">Manage Bank Accounts</span>

                                <div class="icon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                        </div>
					 
					 <div onclick="window.location='employee?salt=<?php echo $val_company['salt'];?>'" class="col-md-3 col-sm-6">
                            <div class="ls-wizard">
                                <h2>Employee <small>(<?php echo $member->count_employee($val_company['id']);?>) Total</small></h2>
                                <span style="font-size:23px;">Manage employee</span>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                        </div>
                       
						
                        <div onclick="window.location='attendance?salt=<?php echo $val_company['salt'];?>'" class="col-md-3 col-sm-6">
                            <div class="ls-wizard label-lightBlue margin-top-iPad-15">
                                <h2>Attendance</h2>
                                <span style="font-size:20px;">manage attendance</span>
                                <div class="icon">
                                    <i class="fa fa-bank"></i>
                                </div>
                            </div>
                        </div>
                        <div onclick="window.location='salary?salt=<?php echo $val_company['salt'];?>'" class="col-md-3 col-sm-6">
                            <div class="ls-wizard label-red margin-top-iPad-15">
                                <h2>Salary</h2>
                                <span style="font-size:25px;">manage salary</span>
                                <div class="icon">
                                    <i class="fa fa-bank"></i>
                                </div>
                            </div>
                        </div>
                    </div>
					<hr />
                <div class="row">
						<div class='col-md-12'><?php if(isset($msgbox)){echo $msgbox;}?></div>
					<div class='col-md-12'>
                        
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><i class='fa fa-cog'></i> Company Info</h3>
                                    <ul class="panel-control">
                                        <li><a class="minus" href="javascript:void(0)"><i class="fa fa-minus"></i></a></li>
                                        <li><a class="wrench" data-toggle="modal" data-target="#update_company"   href="javascript:void(0)"><i class="fa fa-wrench"></i></a></li>
                                        <li><a class="close-panel" href="javascript:void(0)"><i class="fa fa-times"></i></a></li>
                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class='col-md-12'>
										
										<div class='col-md-3'>
											<a href="javascript:void(0)">
											<img style='width:140px; height:140px; border:5px dotted gray;border-radius: 25px;' src='assets/images/logo/company_logo.png' title="Company logo" alt='Company Logo'></img>
											</a>
											
										</div>
										<div class='col-md-4'>
											<p><b id="company" value="<?php echo $val_company['id']; ?>"><i class='fa fa-building'></i> Company : </b><?php echo ucwords($val_company['name']);?></p>
											<hr />
											<p><b><i class='fa fa-user-md'></i> Owner : </b><?php echo ucwords($val_company['owner']);?></p>
											<hr />
											<p><b><i class='fa fa-location-arrow'></i> Address : </b><?php echo ucwords($val_company['address']);?></p>
											<hr />
										</div>
										<div class='col-md-5'>
											<p>
												<b><i class='fa fa-phone'></i> Phone : </b>
												<?php echo ucwords($val_company['phone']);
												if(!empty($val_company['other_gsm'])){
													echo " | ".$val_company['other_gsm'];
												}
												?> 
												
											</p>
											<hr />
											<p><b><i class='fa fa-fax'></i> Fax : </b><?php if(!empty($val_company['fax'])){echo ucwords($val_company['fax']);}else{echo "N/A";}?></p>
											<hr />
											<p><b><i class='fa fa-credit-card'></i> CR : </b><?php echo ucwords($val_company['cr']);?></p>
											<hr />
											
											
										</div>
									</div>
                                </div>
                            </div>
							</div>
							<div class="col-md-12">
                        
																				<div class="panel panel-default">
													<div class="panel-heading">
														<h3 class="panel-title"><i class="fa fa-archive"></i> Documents (الوثائق) </h3>
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
																			
																			$docs = @$member->dirToArray("uploads/company/document/{$val_company['id']}");
																			if(!empty($docs))
																			{
																				foreach($docs as $val)
																				{
																		?>
																					<li> 
																						<span class="label label-primary">
																							<i class="fa fa-download white"></i>
																						</span>
																						<a href="javascript:void(0)" onclick="OpenInNewTab('<?php echo "uploads/company/document/{$val_company['id']}/{$val}";?>')"><?php echo $val; ?></a>
																						<a title='Remove (نزع)' class="text-danger" href="javascript:void(0)" data-toggle="modal" data-target="#unlink" onclick="clip_value('remove_document','<?php echo "uploads/company/document/{$val_company['id']}/{$val}";?>')"><span class="date"><i class='fa fa-times-circle'></i></span></a>
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
					
                    <!--Top breadcrumb start -->
                </div>
            </div>
            <!-- Main Content Element  Start-->
            
                    <hr/>

            <!-- Main Content Element  End-->

        </div>
    </div>



</section>

</section>

	<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header label-primary white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" >Upload Document (وثيقة تحميل) </h4>
                </div>
                <div class="modal-body">
                    <div class="block"> 
									
																	 
																	<form method="POST" enctype='multipart/form-data'>
																		
																		<div class="panel-body">
																			<div class="ls_form">
																				<div class='col-md-12'>
																							<div class="form-group">
																								<label>Document (وثيقة) *</label>
																								<input name="document" type="file" class="form-control">
																							</div>
																							<div class="form-group">
																								<button name='upload' class='btn btn-primary full-width'>Upload Document (وثيقة تحميل) </button>
																							</div>
																							<label class="label-xs">Supported file types (أنواع الملفات المدعومة) : </label> <label class="label label-xs label-success"> JPG | JPEG | PNG | DOC | DOCX | XLS | XLSX | PDF | CSV | TXT </label>
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
	<div class="modal fade" id="manage_bank_accounts" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header label-primary white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Bank Accounts (حسابات بنكية) </h4>
                </div>
                <div class="modal-body">
                    <div class='row'>
						 <div class="col-md-12">
                           <span id="employee_create_msgbox"></span>
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-justified icon-tab">
                                        <li class="active"><a href="#create_bank_account" data-toggle="tab"><i class="fa fa-building"></i> <span>Create (خلق) </span></a></li>
                                        <li ><a href="#view_current_accounts" data-toggle="tab"><i class="fa fa-search"></i> <span>View (الحسابات) </span></a></li>
                                        
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content tab-border">
                                       
                                        <div class="tab-pane fade in active" id="create_bank_account">
										<div class='row'>
														<span id="bank_account_create_msgbox"></span>
														<div class='col-md-12'>
															<div class="form-group">
																<label>Name (اسم) *</label>
																<input type="text" id="bank_account_name" placeholder="Enter Name" class="form-control">
															</div>
															<div class="form-group">
																<label>Address (العنوان) *</label>
																<input type="text" id="bank_account_address" placeholder="Enter Address" class="form-control">
															</div>
															<div class="form-group">
																<label>Account (حساب) *</label>
																<input type="text" id="bank_account_number" placeholder="Enter Account" class="form-control">
															</div>
															<button class='btn btn-primary full-width' onclick="create_bank_account()">Create (خلق) </button>
														</div>
														
												
										</div>
                                        </div>
										 <div class="tab-pane fade" id="view_current_accounts">
                                            <?php 

								$q = mysql_query("select * from bank_account where company='{$val_company['id']}' and created_by='{$_SESSION['clerk']['id']}' order by id DESC");
								if(mysql_num_rows($q)>0)
								{
								?>
									<div class="row">
										<div class="col-md-12">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title"><i class='fa fa-cog'></i> Summary</h3>
												</div>
												<div class="panel-body">
													<!--Table Wrapper Start-->
													<div class="table-responsive ls-table">
														<table id="datatable" class="table table-bordered">
															<thead>
															<tr>
																<th class='text-center'><b>#</b></th>
																<th class='text-center'><b>Name (اسم) </b></th>
																<th class='text-center'><b>Address (العنوان) </b></th>
																<th class='text-center'><b>Account (حساب) </b></th>
																<th class='text-center'><b>Created (مكون) </b></th>
																<th class='text-center'><b>Action (إجراء) </b></th>
															</tr>
															</thead>
															<tbody>
															
																<?php 
																	$count=1;
																	
																	while($result = mysql_fetch_assoc($q)){
																		
																		?>
																		<tr>
																			<td class='text-center'><?php echo $count; ?></td>
																			<td class='text-center'><?php echo $result['name']; ?></td>
																			<td class='text-center'><?php echo $result['address']; ?></td>
																			<td class='text-center'><?php echo $result['account']; ?></td>
																			<td class='text-center'><?php echo date("d,M Y",strtotime($result['reg_date'])); ?></td>
																			<td class='text-center'><button onclick="clip_value('remove_bank_account','<?php echo $result['id']; ?>')" data-toggle="modal" data-target="#remove_doc"  class="btn btn-danger btn-xs"><i class='fa fa-times-circle'></i> Remove (نزع) </button></td>
																		</tr>
																		<?php
																		
																	$count++;}
																	
																?>
															
															
															</tbody>
														</table>
													</div>
													<!--Table Wrapper Finish-->
												</div>
											</div>
										</div>
									</div>
								<?php 
								}
								else
								{
								?>
                                
									<blockquote>Empty</blockquote>
									
								<?php 
								}
								?>
                                        </div>
                                        
                                    </div>

                                
                        </div>
					</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-xs" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
	<div class="modal fade" id="update_company" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header label-primary white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" >Update Company (تحديث)</h4>
                </div>
                <div class="modal-body">
                    <div class="block"> 
									
																	 
																	<form method="POST">
																		
																		<div class="panel-body">
																			
																			<div class="ls_form">
																				<div class='col-md-12'>
																							<div class="form-group">
																								<label>Name (اسم) *</label>
																								<input name="company" type="text" placeholder="Enter Company Name" class="form-control" value="<?php echo $val_company['name']; ?>" required />
																							</div>
																							<div class="form-group">
																								<label>Owner (مالك) *</label>
																								<input name="owner" type="text" placeholder="Enter Owner Name" class="form-control" value="<?php echo $val_company['owner']; ?>" required />
																							</div>
																							<div class="form-group">
																								<label>CR *</label>
																								<input name="cr" type="number" placeholder="Enter Fax" class="form-control" value="<?php echo $val_company['cr']; ?>" required />
																							</div>
																							<div class="form-group">
																								<label>Address (العنوان) *</label>
																								<input name="address" type="text" placeholder="Enter Address" class="form-control" value="<?php echo $val_company['address']; ?>" required />
																							</div>
																							<div class="form-group">
																								<label>Phone (الهاتف) *</label>
																								<input name="phone" type="number" placeholder="Enter Phone" class="form-control" value="<?php echo $val_company['phone']; ?>" required  />
																							</div>
																							<div class="form-group">
																								<label>Company Prefix (بادئة شركة) *</label>
																								<input name="prefix" type="text" placeholder="Enter Company Prefix" class="form-control" value="<?php echo $val_company['prefix']; ?>" required />
																							</div>
																							<div class="form-group">
																								<label>Other GSM (هاتف آخر) </label>
																								<input name="other_gsm" type="number" placeholder="Enter other GSM" class="form-control" value="<?php echo $val_company['other_gsm']; ?>" />
																							</div>
																							<div class="form-group">
																								<label>Fax (فاكس)</label>
																								<input name="fax" type="number" placeholder="Enter Fax" class="form-control" value="<?php echo $val_company['fax']; ?>" />
																							</div>
																	
																				   </div>
																				   
																				   <div class="col-md-12">
																								<button name='update' value="<?php echo $val_company['id']; ?>" class='btn btn-primary full-width'>Update Company (تحديث)</button>
																							</div>
																					
																			</div>
																		</div>
																	</form>
													
															   
									</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close (أغلق) </button>
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
	<div class="modal fade" id="remove_doc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header label-primary white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" >Remove Account (نزع)</h4>
                </div>
                <div class="modal-body">
                    <div class="block"> 
									
					<span class="text-danger">	
						<p><h4>Are you sure you want to remove this bank account ?</h4></p>											 
						<p>Deleting this bank account will result in the following effects :</p>
						<ul>
							<li>The data associated with this bank account will be lost.</li>
						</ul>
						<p><i class='fa fa-warning'></i> Caution : This effect is irreversible i.e once the bank account is removed the data associated with it is destroyed and cannot be restored.</p>
					</span>								
															   
					</div>
                </div>
                <div class="modal-footer">
                    <form method="POST"><button type="submit" id="remove_bank_account" name="remove_bank_account" type="button" class="btn btn-success btn-xs">Remove (نزع) </button>
                    <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close (أغلق) </button></form>
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