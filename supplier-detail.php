<?php require_once('assets/funcs.php');
$obj = new main();
$obj->check_sesh("clerk",array("pass"=>NULL,"fail"=>"../clerk"));
$obj->connect_db();
$member = new member();
$static = new static_content;
if(isset($_GET['salt'])){
	
	$val_supplier  = $member->val_supplier($_GET['salt']);
	if(!$val_supplier){
		$member->redirect("supplier");
	}

}else{
$member->redirect("supplier");
}

if(isset($_POST['upload'])){
	
	
	$status = ($member->upload($_FILES['document'],"uploads/supplier/document",$val_supplier['id']));
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
					$name = trim(@$_REQUEST['name']);
					$address = trim(@$_REQUEST['address']);
					$phone = trim(@$_REQUEST['phone']);
					$fax = trim(@$_REQUEST['fax']);
					$email = trim(@$_REQUEST['email']);
					$supplier_company = trim(@$_REQUEST['supplier_company']);
					$remarks = trim(@$_REQUEST['remarks']);
					

					 if(!empty($name) AND !empty($phone))
					{
							$q= mysql_query("select * from supplier where name='{$name}' and phone='{$phone}' and id!='{$id}'");
							if(mysql_num_rows($q)>0){
								
								
									$msgbox = "<div class='alert alert-danger'>
									<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
									<strong><i class='fa fa-times-circle'></i> Error (???) </strong> Another Supplier with similar Name and Phone already exists
									</div>";
								
							}else{
							
								$q = mysql_query("update supplier set name='{$name}',address='{$address}',phone='{$phone}',fax='{$fax}',email='{$email}',supplier_company='{$supplier_company}',remarks='{$remarks}' where id='{$id}'");
									if($q)
									{
											$msgbox = "<div class='alert alert-success'>
											<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
											<strong><i class='fa fa-check-circle'></i> Success (???) </strong> Supplier info updated
											</div>";
											$val_supplier  = $member->val_supplier($_GET['salt']);
									}
									else
									{	
										$msgbox = "<div class='alert alert-danger'>
										<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
										<strong><i class='fa fa-times-circle'></i> Error (???) </strong> An error occured while updating Supplier info
										</div>";
									}
							}
					}else
					{
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
<?php echo $static->sidebar('supplier');?>
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
                                    <h3 class="panel-title"><i class='fa fa-cog'></i> Supplier Info</h3>
                                    <ul class="panel-control">
                                        <li><a class="minus" href="javascript:void(0)"><i class="fa fa-minus"></i></a></li>
                                        <li><a class="wrench" data-toggle="modal" data-target="#update_supplier"   href="javascript:void(0)"><i class="fa fa-wrench"></i></a></li>
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
										<div class='col-md-4'>
											<p><b>Name : </b><?php echo ucwords($val_supplier['name']);?></p>
											<hr />
											
											<p><b>Phone : </b><?php echo ucwords($val_supplier['phone']);?></p>
											<hr />
											<p><b>Email : </b><?php echo ucwords($val_supplier['email']);?></p>
											<hr />
											<p><b>Company : </b><?php echo ucwords($val_supplier['supplier_company']);?></p>
											<hr />
										</div>
										<div class='col-md-5'>
											<p><b>Address : </b><?php echo ucwords($val_supplier['address']);?></p>
											<hr />
											<p><b>FAX : </b><?php echo ucwords($val_supplier['fax']);?></p>
											<hr />
											<p><b>Remarks : </b><?php echo ucwords($val_supplier['remarks']);?></p>
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
													
													$docs = @$member->dirToArray("uploads/supplier/document/{$val_supplier['id']}");
													if(!empty($docs))
													{
														foreach($docs as $val)
														{
												?>
																<li> 
																						<span class="label label-primary">
																							<i class="fa fa-download white"></i>
																						</span>
																						<a href="javascript:void(0)" onclick="OpenInNewTab('<?php echo "uploads/supplier/document/{$val_supplier['id']}/{$val}";?>')"><?php echo $val; ?></a>
																						<a title='Remove (???)' class="text-danger" href="javascript:void(0)" data-toggle="modal" data-target="#unlink" onclick="clip_value('remove_document','<?php echo "uploads/supplier/document/{$val_supplier['id']}/{$val}";?>')"><span class="date"><i class='fa fa-times-circle'></i></span></a>
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
<div class="modal fade" id="update_supplier" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header label-primary white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" >Update Supplier (????? ????) </h4>
                </div>
                <div class="modal-body">
                    <form method="POST" class='row'>
									
									<div class='col-md-12'>
											
													<div class="form-group">
														<label>Name*</label>
														<input name="name" class="form-control" value="<?php echo $val_supplier['name'];?>" placeholder="Enter Name"/>
													</div>
													<div class="form-group">
														<label>Address</label>
														<input name="address" class="form-control" value="<?php echo $val_supplier['address'];?>" placeholder="Enter Address"/>
													</div>
													<div class="form-group">
														<label>Phone*</label>
														<input type='number' name="phone" class="form-control" value="<?php echo $val_supplier['phone'];?>" placeholder="Enter Phone"/>
													</div>
													<div class="form-group">
														<label>FAX</label>
														<input type='number' name="fax" class="form-control" value="<?php echo $val_supplier['fax'];?>" placeholder="Enter Fax"/>
													</div>
													<div class="form-group">
														<label>Email</label>
														<input type='email' name="email" class="form-control" value="<?php echo $val_supplier['email'];?>" placeholder="Enter Email"/>
													</div>
													<div class="form-group">
														<label>Company</label>
														<input name="supplier_company" class="form-control" value="<?php echo $val_supplier['supplier_company'];?>" placeholder="Enter Company"/>
													</div>
													<div class="form-group">
														<label>Remarks</label>
														<textarea name="remarks" class="form-control" placeholder="Enter Remarks"><?php echo $val_supplier['remarks'];?></textarea>
													</div>
											
									</div>
								
							
						<div class='row'>
							<div class='col-md-12'>
								<button class='btn btn-primary full-width' name="update" value="<?php echo $val_supplier['id'];?>" type="submit">Update Supplier (???) </button>
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