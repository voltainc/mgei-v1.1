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

<?php echo $static->head("inner"); ?>

<body class="">
<?php echo $static->nav("inner"); ?>

	<section id="main-container">

	<?php echo $static->sidebar("invc-sale-cash");?>

		<section id="min-wrapper">
			<div id="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<h3 class="ls-top-header"><i class='fa fa-codepen'></i> Invoice <i class="fa fa-angle-double-right"></i> Credit Sale</h3>
							<ol class="breadcrumb">
								<li><a href="javascript:void(0)"><i class="fa fa-home"></i></a></li>
								<li><a href='dashboard'>Dashboard</a></li>
								<li><a href='company'>Company</a></li>
								<li><a href="employee">Employee</a></li>
								<li><a href="attendance">Payroll</a></li>
								<li><a href="payment-voucher">Voucher</a></li>
								<li class="active">Inventory</li>
							</ol>
						</div>
					</div>
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
					 
						<div class="col-md-9">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Item</h3>
                                </div>
                                <div class="panel-body">
								<div class="col-md-12 row">
									<div class="col-md-11">
										<div class="form-group">
											<?php 
												$member->retrieve(['act'=>'item_sale','company'=>(isset($val_company) ? $val_company['id'] : $arr[0]['id'])]);
											?>
											
										</div>
									</div>
									<div class="col-md-1">
										<div class="form-group">
											<button class='btn btn-primary sale_trig' onclick=retrieve({'act':'add_list_sale'})>Add</button>
										</div>
									</div>
								</div>
								<span class="col-md-12"><hr /></span>
									<div class="table-responsive ls-table">
                                        
										<table class="table" id="item_sale">
                                            <thead>
                                            <tr>
                                                <th>SKU</th>
                                                <th>Quantity</th>
                                                <th>Type</th>
                                                <th>Price/Unit</th>
                                                <th>Stock</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                            </thead>
                                            <tbody id="tbl"></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Customer</h3>
                                </div>
                                <div class="panel-body">
                                    <?php $member->retrieve(['act'=>'customer_all']);?>
									<button class="btn btn-primary" style="width:100%" data-toggle='modal' data-target="#add_customer">New Customer</button>
								<hr />
								<div class="form-group">
								<label>Discount Type</label>
								<select class='form-control' id="discount_type" onchange=retrieve({'act':'sale_reset'})>
									<option value="fixed">Fixed</option>
									<option value="percentage">Percentage</option>
								</select>
								</div>
								<div class="form-group">
								<label>Discount</label>
								<input type='number' placeholder='Discount %' class='form-control sale_trig' id="discount"/>
								</div>
								
								<div class="form-group">
								<label>Net</label>
								<input type='text' id="net" placeholder='Net' class='form-control' readonly/>
								</div>
								
								<div class="form-group">
								<label>Total</label>
								<input type='text' id="tot" placeholder='Total' class='form-control' readonly/>
								</div>
								
								<div class="form-group">
								<label>Paid</label>
								<input type='number' placeholder='Paid' id="paid" class='form-control sale_trig' />
								</div>
								<div class="form-group">
								<label>Aging days </label>
								<input type='number' placeholder='Aging days' id="aging" class='form-control' />
								</div>
								<div class="form-group">
								<label>Date (??????????)</label>
								<input type='text' placeholder='date' id="date" value="<?php echo date("Y-m-d");?>" class='form-control datepicker' />
								</div>
								<hr />
								<div class="form-group">
								<label><b>Order</b></label><br />
								  <input type="radio" name="order" value="delivered" checked/> Delivered 
								  <input type="radio" name="order" value="nondelivered" /> Non Delivered
								  <textarea class="form-control" id="remarks">Enter Remarks</textarea>
								</div>
								<hr />
								<div class="form-group">
								<button class="btn btn-info col-md-12" id="sale_proc" onclick=retrieve({'act':'verify_sale'})>CALCULATE</button>
								</div>
                                </div>
                            </div>
                        </div>
						
						  <?php 
						  
						  $comp = null;
						  isset($val_company) ? $comp = $val_company : $comp = $arr[0];
						  
								$q = mysql_query("select * from sale_invoice where company = {$comp['id']} AND created_by='{$_SESSION['clerk']['id']}' and type='cash'");
								if(mysql_num_rows($q)>0)
								{
								?>
									<div class="row">
										<div class="col-md-12">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title"><i class='fa fa-cog'></i> Summary (????????)</h3>
												</div>
												<div class="panel-body">
													<!--Table Wrapper Start-->
													<div class="table-responsive ls-table">
														<table id="datatable" class="table table-bordered">
															<thead>
															<tr>
																<th class='text-center'><b>#</b></th>
																<th class='text-center'><b>Customer (????????) </b></th>
																<th class='text-center'><b>Created (????????) </b></th>
															</tr>
															</thead>
															<tbody>
															
																<?php 
																	
																	while($result = mysql_fetch_assoc($q)){
																		
																		?>
																		<tr>
																			<td class='text-center'><a href="sale_cash_invoice_detail?inv=<?php echo $result['id']; ?>"><?php echo str_pad($result['id'], 8, '0', STR_PAD_LEFT);?></a></td>
																			<td class='text-center'>
																				
																				<?php echo ucwords($member->ret_by("customer","id",$result['customer'],"name"));?>
																			</td>
																			<td class='text-center'><?php echo date("d, M Y",strtotime($result['reg_date']));?></td>
																		</tr>
																		<?php
																		
																	}
																	
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
			
			
			
		</section>
		
		
	</section>
 <div class="modal fade" id="item_exists" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header label-primary white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabelSmall">Warning</h4>
                </div>
                <div class="modal-body">
                    <p>Please select and add items to proceed</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-xs" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
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
														<input id="custName" class="form-control" placeholder="Enter Name"/>
													</div>
													<div class="form-group">
														<label>Phone*</label>
														<input type='custNum' id="custPhone" class="form-control" placeholder="Enter Phone"/>
													</div>
													<div class="form-group">
														<label>Address</label>
														<input id="custAddress" class="form-control" placeholder="Enter Address"/>
													</div>
													<div class="form-group">
														<label>FAX</label>
														<input type='custFax' id="fax" class="form-control" placeholder="Enter Fax"/>
													</div>
													<div class="form-group">
														<label>Email</label>
														<input type='email' id="custEmail" class="form-control" placeholder="Enter Email"/>
													</div>
													<div class="form-group">
														<label>Company</label>
														<input id="custCompany" class="form-control" placeholder="Enter Company"/>
													</div>
													<div class="form-group">
														<label>Remarks</label>
														<textarea id="custRemarks" class="form-control" placeholder="Enter Remarks"></textarea>
													</div>
													<div class="form-group">
														<label>Action</label>
														<input type='hidden' id="custParentCompany" value="<?php if(isset($val_company)){echo $val_company['id'];}else{echo $arr[0]['id'];}?>"/>
														<button onclick="addCustomer()" class="btn btn-primary full-width">Create Customer</button>
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
<?php echo $static->jslib("inner"); ?>

<script>
$(document).ready( function () {
    $('#datatable').DataTable();
	retrieve({'act':'sale_trig'});
	
} );
</script>
</body>
</html>