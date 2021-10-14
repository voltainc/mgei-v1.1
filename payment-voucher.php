<?php require_once('assets/funcs.php');
$obj = new main();
$obj->check_sesh("clerk",array("pass"=>NULL,"fail"=>"../clerk"));
$obj->connect_db();
$member = new member();
$static = new static_content;if(isset($_POST['remove_payment_voucher']))	{		$remove_payment_voucher = trim($_POST['remove_payment_voucher']);		if(!empty($remove_payment_voucher)){			mysql_query("delete from payment_voucher where id={$remove_payment_voucher}");			$msgbox = "<div class='alert alert-success'>			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>			<strong><i class='fa fa-check-circle'></i> Success!</strong> Payment Voucher Removed			</div>";			}	}
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
<?php echo $static->sidebar("payment-voucher");?>
<!--Left navigation section end-->


<!--Page main section start-->
<section id="min-wrapper">
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--Top header start-->
                    <h3 class="ls-top-header"><i class='fa fa-ticket'></i> Voucher <i class="fa fa-angle-double-right"></i> Payment Voucher</h3>
                    <!--Top header end -->

                    <!--Top breadcrumb start -->
                    <ol class="breadcrumb">
                        <li><a href="javascript:void(0)"><i class="fa fa-home"></i></a></li>
                        <li><a href='dashboard'>Dashboard</a></li>
                        <li><a href='company'>Company</a></li>
                        <li><a href="employee">Employee</a></li>
                        <li><a href="attendance">Payroll</a></li>
                        <li class="active">Voucher</li>
                    </ol>
                    <!--Top breadcrumb start -->
                </div>
            </div>
            <!-- Main Content Element  Start-->
									
					  <div class="row">
					  <div data-toggle="modal" data-target="#add_voucher" class="col-md-3 col-sm-6">
                            <div class="ls-wizard label-red margin-top-iPad-15">
                                <h2>Voucher <small>(<?php echo $member->total_voucher($_SESSION['clerk']['id']);?>) Total</small></h2>
                                <span style="font-size:23px;">Add voucher</span>
                                <div class="icon">
                                    <i class="fa fa-ticket"></i>
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
									$q = mysql_query("select * from payment_voucher where company='{$val_company['id']}' and created_by='{$_SESSION['clerk']['id']}' order by id DESC");
									$prefix = $val_company['prefix'];
								}else{
									$q = mysql_query("select * from payment_voucher where company='{$arr[0]['id']}' and created_by='{$_SESSION['clerk']['id']}' order by id DESC");
									$prefix = $arr[0]['prefix'];
								}
								
								if(mysql_num_rows($q)>0)
								{
								?>
									<div class="row">										<div class="col-md-12"><?php if(isset($msgbox)){echo $msgbox;}?></div>
										<div class="col-md-12">											
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title"><i class='fa fa-cog'></i> Voucher</h3>
												</div>
												<div class="panel-body">
													<div class="table-responsive ls-table">
														<table id="datatable" class="table table-bordered">
															<thead>
															<tr>
																<th class='text-center'><b>#</b></th>
																<th class='text-center'><b>PV No.</b></th>
																<th class='text-center'><b>Payment method</b></th>
																<th class='text-center'><b>Date</b></th>
																<th class='text-center'><b>To</b></th>
																<th class='text-center'><b>Cash Amount</b></th>
																<th class='text-center'><b>Bank</b></th>														
																<th class='text-center'><b>Cheque Number</b></th>
																<th class='text-center'><b>Cheque Amount</b></th>
																<th class='text-center'><b>Cheque Date</b></th>
																<th class='text-center'><b>Description</b></th>																																<th class='text-center'><b>Action</b></th>
															</tr>
															</thead>
															<tbody>
															
																<?php 
																	$count=1;
																	
																	while($result = mysql_fetch_assoc($q)){
																		
																		?>
																		<tr>
																			<td class='text-center'><?php echo $count;$count++;?></td>
																			<td class='text-center'><a href='payment-voucher-detail?salt=<?php echo $result['salt'];?>'><?php echo $result['pv_number']; ?></td>
																			<td class="text-center"><?php echo ucwords($result['payment_method']);?></td>
																			<td class='text-center'><?php echo date("d,M Y",strtotime($result['issue_date'])); ?></td>
																			<td class="text-center"><?php echo ucwords($result['issue_to']);?></td>
																			<?php 
																				
																				if($result['payment_method']=="cash"){
																					
																					?>
																						
																						<td class="text-center"><?php echo $result['cash_amount']?></td>
																						<td class="text-center">-</td>
																						<td class="text-center">-</td>
																						<td class="text-center">-</td>
																						<td class="text-center">-</td>
																						
																					<?php
																					
																				}else{
																					
																					?>
																					
																						<td class="text-center">-</td>
																						<td class="text-center"><?php echo ucwords($result['bank']);?></td>
																						<td class="text-center"><?php echo $result['cheque_number'];?></td>
																						<td class="text-center"><?php echo $result['cheque_amount'];?></td>
																						<td class='text-center'><?php echo date("d,M Y",strtotime($result['cheque_date'])); ?></td>
																					
																					<?php
																					
																				}
																			?>
																			<td class="text-center"><?php echo ucwords($result['description']);?></td>																			<td class='text-center'><button onclick="clip_value('remove_payment_voucher','<?php echo $result['id'];?>')" data-toggle="modal" data-target="#dell_payment_voucher" class="btn btn-danger btn-sm"><i class='fa fa-times-circle'></i> Remove</button></td>
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
<div class="modal fade" id="add_voucher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header label-primary white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" >Add Voucher</h4>
                </div>
                <div class="modal-body">
                    <div class='row'>
									<span id="voucher_create_msgbox"></span>
										<div class='col-md-12'>
											
											<div class="form-group">
												<label>Payment method*</label>
												<select onchange="payment_method()" id="payment_method" class="form-control">
													<option value="cash">Cash</option>
													<option value="cheque">Cheque</option>
												</select>
											</div>
											<span id="voucher_form">
											
													<div class="form-group">
														<label>PV Number</label>
														<input id="pv_number" class="form-control" placeholder="Enter PV number"/>
													</div>
													<div class="form-group">
														<label>Date</label>
														<input id="issue_date" name="datepicker" class="form-control" placeholder="Enter Date"/>
													</div>
													<div class="form-group">
														<label>To</label>
														<input id="issue_to" type="text" class="form-control" placeholder="Enter To"/>
													</div>
													<div class="form-group">
														<label>Cash Amount</label>
														<input type="number" id="cash_amount" class="form-control" placeholder="Enter Cash"/>
													</div>
													<div class="form-group">
														<label>Description</label>
														<textarea type="text" id="description" class="form-control" placeholder="Enter Description"></textarea>
													</div>
													<div class="form-group">
														<label>Action</label>
														<button onclick="create_payment_voucher('cash')" class="btn btn-primary full-width">Create Voucher</button>
													</div>
													
											</span>
											
					</div>
					
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-xs" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

</section>
	<div class="modal fade" id="dell_payment_voucher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">			<div class="modal-dialog modal-lg">				<div class="modal-content">					<div class="modal-header label-primary white">						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>						<h4 class="modal-title" >Remove Payment Voucher (نزع)</h4>					</div>					<div class="modal-body">						<div class="block">							<span class="text-danger">								<p><h4>Are you sure you want to remove this Payment Voucher ?</h4></p>								<p>Deleting this Payemnt Voucher will result in the following effects :</p>								<ul>									<li>Loss of Data added against this Payment Voucher.</li>								</ul>								<p><i class='fa fa-warning'></i> Caution : This effect is irreversible i.e once the employee is removed the data associated with it is destroyed and cannot be restored.</p>							</span>						</div>					</div>					<div class="modal-footer">						<form method="POST"><button type="submit" id="remove_payment_voucher" name="remove_payment_voucher" type="button" class="btn btn-success btn-xs">Remove (نزع) </button>						<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close (أغلق) </button></form>					</div>				</div>			</div>	</div>
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