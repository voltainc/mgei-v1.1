<?php 
require_once('assets/funcs.php');
$obj = new main();
$obj->check_sesh("clerk-wh",array("pass"=>NULL,"fail"=>"../clerk/login-wh"));
$obj->connect_db();
$member = new member();
$static = new static_content;
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<?php echo $static->head("inner"); ?>

<body class="">
<?php echo $static->nav("inner-wh"); ?>

	<section id="main-container">

	<?php echo $static->sidebar_wh("invoice-wh");?>

		<section id="min-wrapper">
			<div id="main-content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<h3 class="ls-top-header"><i class='fa fa-codepen'></i> Invoice</h3>
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
									$q = mysql_query("select * from company where created_by='{$_SESSION['clerk-wh']['id']}' and salt !='{$salt}' order by id DESC");
								}else{
									$q = mysql_query("select * from company where created_by='{$_SESSION['clerk-wh']['id']}' order by id DESC");
								}
						}else{
							$q = mysql_query("select * from company where created_by='{$_SESSION['clerk-wh']['id']}' order by id DESC");
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
						  
						  $comp = null;
						  isset($val_company) ? $comp = $val_company : $comp = $arr[0];
						  
								$q = mysql_query("select * from sale_invoice_wh where company = {$comp['id']} AND created_by='{$_SESSION['clerk-wh']['id']}'");
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
																<th class='text-center'><b>Type (شركة) </b></th>
																<th class='text-center'><b>Customer (شركة) </b></th>
																<th class='text-center'><b>Created (عامل) </b></th>
															</tr>
															</thead>
															<tbody>
															
																<?php 
																	
																	while($result = mysql_fetch_assoc($q)){
																		$result['type'] == "cash" ? $redir="sale_cash_invoice_detail-wh?inv=".$result['id'] : $redir = "sale_invoice_detail-wh?inv=".$result['id'];
																		?>
																		<tr>
																			<td class='text-center'><a href=<?php echo $redir; ?>><?php echo str_pad($result['id'], 8, '0', STR_PAD_LEFT);?></a></td>
																			<td class="text-center"><?php echo ucwords($result['type']);?></td>
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
 
<?php echo $static->jslib("inner-wh"); ?>

<script>
$(document).ready( function () {
    $('#datatable').DataTable();
	retrieve({'act':'sale_trig'});
	
} );
</script>
</body>
</html>