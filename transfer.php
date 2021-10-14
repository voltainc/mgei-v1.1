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

	<?php echo $static->sidebar("transfer");?>

		<section id="min-wrapper">
			<div id="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<h3 class="ls-top-header"><i class='fa fa-codepen'></i> Invoice <i class="fa fa-angle-double-right"></i> Purchase</h3>
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
					 
						<div class="col-md-9">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Item</h3>
                                </div>
                                <div class="panel-body">
								<div class="col-md-12 row">
									<div class="col-md-11">
										<div class="form-group">
											<input type="text" id="item"  placeholder="Enter item name" class="form-control">
										</div>
									</div>
									<div class="col-md-1">
										<div class="form-group">
											<button class='btn btn-primary' onclick=retrieve({'act':'add_list_purchase'})>Add</button>
										</div>
									</div>
								</div>
								<span class="col-md-12"><hr /></span>
									<div class="table-responsive ls-table">
                                        
										<table class="table" id="item_purchase">
                                            <thead>
                                            <tr>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
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
                                    <h3 class="panel-title">Supplier</h3>
                                </div>
                                <div class="panel-body">
                                    <?php $member->retrieve(['act'=>'supplier']);?>
								<hr />
								<div class="form-group">
								<label>Discount</label>
								<input type='number' placeholder='Discount %' class='form-control' id="discount" onchange="retrieve({'act':'purchase_reset'})"/>
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
								<input type='number' placeholder='Paid' id="paid" class='form-control' />
								</div>
								<div class="col-md-12">	
									<hr />
								</div>
								<div class="form-group">
								<button class="btn btn-info col-md-12" id="pur_proc" onclick=retrieve({'act':'verify_purchase'})>CALCULATE</button>
								</div>
                                </div>
                            </div>
                        </div>
						
						  <?php 
								$q = mysql_query("select * from purchase_invoice where created_by='{$_SESSION['clerk']['id']}'");
								if(mysql_num_rows($q)>0)
								{
								?>
									<div class="row">
										<div class="col-md-12">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title"><i class='fa fa-cog'></i> Summary (ملخص)</h3>
												</div>
												<div class="panel-body">
													<!--Table Wrapper Start-->
													<div class="table-responsive ls-table">
														<table id="datatable" class="table table-bordered">
															<thead>
															<tr>
																<th class='text-center'><b>#</b></th>
																<th class='text-center'><b>Supplier (شركة) </b></th>
																<th class='text-center'><b>Created (عامل) </b></th>
															</tr>
															</thead>
															<tbody>
															
																<?php 
																	
																	while($result = mysql_fetch_assoc($q)){
																		
																		?>
																		<tr>
																			<td class='text-center'><a href="purchase_invoice_detail?inv=<?php echo $result['id']; ?>"><?php echo str_pad($result['id'], 8, '0', STR_PAD_LEFT);?></a></td>
																			<td class='text-center'>
																				
																				<?php echo ucwords($member->ret_by("supplier","id",$result['supplier'],"name"));?>
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
	
<?php echo $static->jslib("inner"); ?>

<script>
$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>
</body>
</html>