<?php require_once('assets/funcs.php');
$obj = new main();
$obj->check_sesh("clerk",array("pass"=>NULL,"fail"=>"../clerk"));
$obj->connect_db();
$member = new member();
$static = new static_content;
if(isset($_POST['remove_customer']))
	{
		$remove_customer = trim($_POST['remove_customer']);
		if(!empty($remove_customer))
		{
			mysql_query("delete from customer where id={$remove_customer}");
			$msgbox = "<div class='alert alert-success'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
			<strong><i class='fa fa-check-circle'></i> Success!</strong> Customer Removed
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
<?php echo $static->sidebar("inv-sale-customer");?>
<!--Left navigation section end-->


<!--Page main section start-->
<section id="min-wrapper">
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--Top header start-->
                    <h3 class="ls-top-header"><i class='fa fa-codepen'></i> Inventory <i class="fa fa-angle-double-right"></i> Customer</h3>
                    <!--Top header end -->

                    <!--Top breadcrumb start -->
                    <ol class="breadcrumb">
                        <li><a href="javascript:void(0)"><i class="fa fa-home"></i></a></li>
                        <li><a href='dashboard'>Dashboard</a></li>
                        <li><a href='company'>Company</a></li>
                        <li><a href="employee">Employee</a></li>
                        <li><a href="attendance">Payroll</a></li>
                        <li><a href="payment-voucher">Voucher</a></li>
                        <li class="active">Inventory</li>
                    </ol>
                    <!--Top breadcrumb start -->
                </div>
            </div>
            <!-- Main Content Element  Start-->
									
					  <div class="row">
					  <div data-toggle="modal" data-target="#add_customer" class="col-md-3 col-sm-6">
                            <div class="ls-wizard label-red margin-top-iPad-15">
                                <h2>Customer <small>(<?php echo $member->total_customer($_SESSION['clerk']['id']);?>) Total</small></h2>
                                <span style="font-size:23px;">Add Customer</span>
                                <div class="icon">
                                    <i class="fa fa-codepen"></i>
                                </div>
                            </div>
                        </div>
                        <div onclick="window.location='company'"  class="col-md-3 col-sm-6">
                            <div class="ls-wizard  label-blue">
                                <h2>Company <small>(<?php echo $member->total_companies($_SESSION['clerk']['id']);?>) Total</small></h2>
                                <span style="font-size:23px;">Manage company</span>

                                <div class="icon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                        </div>
						<div onclick="window.location='employee'" class="col-md-3 col-sm-6">
                            <div class="ls-wizard">
                                <h2>Employee <small>(<?php echo $member->total_employee($_SESSION['clerk']['id']);?>) Total</small></h2>
                                <span style="font-size:23px;">Manage employee</span>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                        </div>
                        <div onclick="window.location='vehicle'" class="col-md-3 col-sm-6">
                            <div class="ls-wizard label-lightBlue margin-top-iPad-15">
                                <h2>Vehicle <small>(<?php echo $member->total_vehicle($_SESSION['clerk']['id']);?>) Total</small></h2>
                                <span style="font-size:23px;">Manage vehicle</span>
                                <div class="icon">
                                    <i class="fa fa-car"></i>
                                </div>
                            </div>
                        </div>
                        
                    </div>
					<hr />
					
					<?php
					if(isset($_GET['salt'])){
						$salt = mysql_real_escape_string(@$_GET['salt']);
						$val_company=$member->val_company($salt);
							if($val_company){
								$q = mysql_query("select * from company where created_by='{$_SESSION['clerk']['id']}' and salt !='{$salt}' order by id DESC");
							}else{
								$q = mysql_query("select * from company where created_by='{$_SESSION['clerk']['id']}' order by id DESC");
							}
					}else{
						$q = mysql_query("select * from company where created_by='{$_SESSION['clerk']['id']}' order by id DESC");
					}
						if(mysql_num_rows($q)>0)
						{
							if(!isset($val_company)){$arr = array();}
					?>
								<div class="col-md-12">
                                        <div class="form-group">
                                            <label>Select Company</label>
                                            <select id="swap_company" type="text" class="form-control">
												
												<?php 
													if($val_company){
													?>
														<option value="<?php echo $val_company['name'];?>"><?php echo $val_company['name'];?></option>
													<?php
													}
													while($result = mysql_fetch_assoc($q))
													{
														if(!isset($val_company)){array_push($arr,$result);}
														?>
															<option value='<?php echo $result['salt'];?>'><?php echo $result['name'];?></option>
														<?php
													}
												?>
											</select>
                                        </div>
								</div>
					<?php 
						}else
						{
					?>
							<blockquote>Empty</blockquote>
					<?php
						}
					 ?>
								
                     <?php 
								if(isset($val_company)){
									$q = mysql_query("select * from customer where company='{$val_company['id']}' and created_by='{$_SESSION['clerk']['id']}' order by id DESC");
									$prefix = $val_company['prefix'];
								}else{
									$q = mysql_query("select * from customer where company='{$arr[0]['id']}' and created_by='{$_SESSION['clerk']['id']}' order by id DESC");
									$prefix = $arr[0]['prefix'];
								}
								
								if(mysql_num_rows($q)>0)
								{
								?>
									<div class="row">										
									<div class="col-md-12"><?php if(isset($msgbox)){echo $msgbox;}?></div>
										<div class="col-md-12">											
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title"><i class='fa fa-cog'></i> Customer</h3>
												</div>
												<div class="panel-body">
													<div class="table-responsive ls-table">
														<table id="datatable" class="table table-bordered">
															<thead>
															<tr>
																<th class='text-center'><b>#</b></th>
																<th class='text-center'><b>Name</b></th>
																<th class='text-center'><b>Email</b></th>
																<th class='text-center'><b>Phone</b></th>
																<th class='text-center'><b>Fax</b></th>
																<th class='text-center'><b>Address</b></th>
																<th class='text-center'><b>Company</b></th>														
																<th class='text-center'><b>Remarks</b></th>
																<th class='text-center'><b>Action</b></th>
															</tr>
															</thead>
															<tbody>
															
																<?php 
																	$count=1;
																	
																	while($result = mysql_fetch_assoc($q)){
																		
																		?>
																		<tr>
																			<td class='text-center'><?php echo $count;$count++;?></td>
																			<td class='text-center'><a href='customer-detail?salt=<?php echo $result['salt'];?>'><?php echo ucwords($result['name']); ?></td>
																			<td class="text-center"><?php echo $result['email'];?></td>
																			<td class="text-center"><?php echo $result['phone'];?></td>
																			<td class="text-center"><?php echo $result['fax'];?></td>
																			<td class="text-center"><?php echo $result['address'];?></td>
																			<td class="text-center"><?php echo $result['customer_company'];?></td>
																			<td class="text-center"><?php echo $result['remarks'];?></td>
																			<td class='text-center'><button onclick="clip_value('remove_customer','<?php echo $result['id'];?>')" data-toggle="modal" data-target="#dell_customer" class="btn btn-danger btn-sm"><i class='fa fa-times-circle'></i> Remove</button></td>
																		</tr>
																		<?php
																		
																	$count++;}
																	
																?>
															
															
															</tbody>
														</table>
													</div>
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
						
						
			

            <!-- Main Content Element  End-->

        </div>
    </div>



</section>
	<div class="modal fade" id="add_customer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header label-primary white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" >Add Customer</h4>
                </div>
                <div class="modal-body">
                    <div class='row'>
									<span id="supplier_create_msgbox"></span>
											
										<div class='col-md-12'>
											
													<div class="form-group">
														<label>Name*</label>
														<input id="name" class="form-control" placeholder="Enter Name"/>
													</div>
													<div class="form-group">
														<label>Address</label>
														<input id="address" class="form-control" placeholder="Enter Address"/>
													</div>
													<div class="form-group">
														<label>Phone*</label>
														<input type='number' id="phone" class="form-control" placeholder="Enter Phone"/>
													</div>
													<div class="form-group">
														<label>FAX</label>
														<input type='number' id="fax" class="form-control" placeholder="Enter Fax"/>
													</div>
													<div class="form-group">
														<label>Email</label>
														<input type='email' id="email" class="form-control" placeholder="Enter Email"/>
													</div>
													<div class="form-group">
														<label>Company</label>
														<input id="customer_company" class="form-control" placeholder="Enter Company"/>
													</div>
													<div class="form-group">
														<label>Remarks</label>
														<textarea id="remarks" class="form-control" placeholder="Enter Remarks"></textarea>
													</div>
													<div class="form-group">
														<label>Action</label>
														<input type='hidden' id="company" value="<?php if(isset($val_company)){echo $val_company['id'];}else{echo $arr[0]['id'];}?>"/>
														<button onclick="create_customer()" class="btn btn-primary full-width">Create Customer</button>
													</div>
										</div>
					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary btn-xs" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
	<div class="modal fade" id="dell_customer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header label-primary white">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" >Remove Customer</h4>
				</div>
				<div class="modal-body">
					<div class="block">
						<span class="text-danger">
							<p><h4>Are you sure you want to remove this Customer ?</h4></p>
							<p>Deleting this Customer will result in the following effects :</p>
							<ul>
								<li>Loss of Data added against this Customer.</li>
								<li>Loss of Stock added against this Customer.</li>
							</ul>
							<p><i class='fa fa-warning'></i> Caution : This effect is irreversible i.e once the customer is removed the data associated with it is destroyed and cannot be restored.</p>
						</span>
					</div>
				</div>
				<div class="modal-footer">
					<form method="POST">
						<button type="submit" id="remove_customer" name="remove_customer" type="button" class="btn btn-success btn-xs">Remove</button>
						<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
					</form>
				</div>
			</div>
		</div>
	</div>
<?php 
		
		echo $static->jslib("inner");
?>

<script>
$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>
<!--Layout Script End -->
</body>

</html>