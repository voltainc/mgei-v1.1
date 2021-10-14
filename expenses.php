<?php 
require_once('assets/funcs.php');
$obj = new main();
$obj->check_sesh("clerk",array("pass"=>NULL,"fail"=>"../clerk"));
$obj->connect_db();
$member = new member();
$static = new static_content;
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
<?php echo $static->sidebar("expenses");?>
<!--Left navigation section end-->


<!--Page main section start-->
<section id="min-wrapper">
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--Top header start-->
                    <h3 class="ls-top-header"><i class='fa fa-money'></i> Expenses</h3>
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
					  <div data-toggle="modal" data-target="#add_item" class="col-md-3 col-sm-6">
                            <div class="ls-wizard label-red margin-top-iPad-15">
                                <h2>Expenses <small>(<?php echo $member->total_expenses($_SESSION['clerk']['id']);?>) Total</small></h2>
                                <span style="font-size:23px;">Add Expenses</span>
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
														<option value="<?php echo $val_company['salt'];?>"><?php echo $val_company['name'];?></option>
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
									$q = mysql_query("select * from expenses where company='{$val_company['id']}' and created_by='{$_SESSION['clerk']['id']}' order by id DESC");
									$prefix = $val_company['prefix'];
								}else{
									$q = mysql_query("select * from expenses where company='{$arr[0]['id']}' and created_by='{$_SESSION['clerk']['id']}' order by id DESC");
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
													<h3 class="panel-title"><i class='fa fa-cog'></i> Item</h3>
												</div>
												<div class="panel-body">
													<div class="table-responsive ls-table">
														<table id="datatable" class="table table-bordered">
															<thead>
															<tr>
																<th class='text-center'><b>#</b></th>
																<th class='text-center'><b>Name</b></th>
																<th class='text-center'><b>Amount</b></th>
																<th class='text-center'><b>Place</b></th>
																<th class='text-center'><b>Date</b></th>
																<th class='text-center'><b>Action</b></th>
															</tr>
															</thead>
															<tbody>
															
																<?php 
																	$count=1;
																	
																	while($result = mysql_fetch_assoc($q)){
																		//$unit = $member->disp_units($result['unit']);
																		?>
																		<tr>
																			<td class='text-center'><?php echo $count;?></td>
																			<td class="text-center"><?php echo $result['name'];?></td>
																			<td class="text-center"><?php echo $result['amount'];?></td>
																			<td class="text-center"><?php echo ucwords($result['place']);?></td>
																			<td class="text-center"><?php echo date("d, m Y",strtotime($result['reg_date']));?></td>
																			<td class='text-center'>
																				
																				<button class="btn btn-xs btn-round btn-danger" data-toggle="modal" data-target="#dell_item" onclick=$("#remove_item").attr("onclick","retrieve({'act':'rem_expense','id':'<?php echo $result['id'];?>'})")><i class="fa fa-times"></i></button>
																			</td>
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
	<div class="modal fade" id="add_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header label-primary white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" >Add Item</h4>
                </div>
                <div class="modal-body">
                    <div class='row'>
									<span id="expenses_create_msgbox"></span>
										<div class='col-md-12'>
											
													<div class="form-group">
														<label>Place*</label>
														<select id='place' class="form-control">
															<option value="factory">Factory</option>
															<option value="warehouse">Warehouse</option>
														</select>
													</div>
													<div class="form-group">
														<label>Name*</label>
														<input type="text" placeholder="Name" id='name' class="form-control">
													</div>
													<div class="form-group">
														<label>Amount*</label>
														<input type="number" placeholder="Amount" id='amount' class="form-control">
													</div>
													
													<div class="form-group">
														<label>Action</label>
														<button onclick=retrieve({'act':'create_expense'}) class="btn btn-primary full-width">Add Expense</button>
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
	<div class="modal fade" id="dell_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header label-primary white">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" >Remove Expense (???)</h4>
				</div>
				<div class="modal-body">
					<div class="block">
						<span class="text-danger">
							<p><h4>Are you sure you want to remove this Expense ?</h4></p>
							<p>Deleting this Expense will result in the following effects :</p>
							<ul>
								<li>Loss of Data added against this Expense.</li>
							</ul>
							<p><i class='fa fa-warning'></i> Caution : This effect is irreversible i.e once the expense is removed the data associated with it is destroyed and cannot be restored.</p>
						</span>
					</div>
				</div>
				<div class="modal-footer">
						<button type="button" id="remove_item" name="remove_item" type="button" class="btn btn-success btn-xs">Remove (???) </button>
						<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close (????) </button>
				</div>
			</div>
		</div>
	</div>
	<!--<div class="modal fade" id="edit_quantity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header label-primary white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" >Update Quantity</h4>
                </div>
                <div class="modal-body">
                    <div class='row'>
									<span id="unit_create_msgbox"></span>
										<div class='col-md-12'>
											
													<div class="form-group">
														<label>Name*</label>
														<input type="number" id="curr_qty" class="form-control" placeholder="Enter Quantity"/>
													</div>
													
													<div class="form-group">
														<label>Action</label>
														<button  class="btn btn-primary full-width" id="up_sale_qty">Update</button>
													</div>
										</div>
					
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary btn-xs" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>-->
	
	
</section>
	
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