<?php 
require_once('assets/funcs.php');
$obj = new main();
$obj->check_sesh("clerk",array("pass"=>NULL,"fail"=>"../clerk"));
$obj->connect_db();
$member = new member();
$static = new static_content;
$settings = $member->retrieve(['act'=>'get_settings']);
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
<?php echo $static->sidebar("inv-purchase-stock");?>
<!--Left navigation section end-->


<!--Page main section start-->
<section id="min-wrapper">
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--Top header start-->
                    <h3 class="ls-top-header"><i class='fa fa-codepen'></i> Inventory <i class="fa fa-angle-double-right"></i>  Purchase <i class="fa fa-angle-double-right"></i> Stock</h3>
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
                                <h2>Item <small>(<?php echo $member->total_item_purchase($_SESSION['clerk']['id']);?>) Total</small></h2>
                                <span style="font-size:23px;">Add Item</span>
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
									$q = mysql_query("select * , sum(quantity) AS tot_qty from purchase_stock where company='{$val_company['id']}' and created_by='{$_SESSION['clerk']['id']}' and status=true GROUP BY item");
									$prefix = $val_company['prefix'];
								}else{
									$q = mysql_query("select * , sum(quantity) AS tot_qty from purchase_stock where company='{$arr[0]['id']}' and created_by='{$_SESSION['clerk']['id']}' and status=true GROUP BY item");
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
																<th class='text-center'><b>Item</b></th>
																<th class='text-center'><b>Quantity</b></th>
																<th class='text-center'><b>Volume/unit</b></th>
																<th class='text-center'><b>Unit</b></th>
																<th class='text-center'><b>Date</b></th>
																<th class='text-center'><b>Action</b></th>
																
															</tr>
															</thead>
															<tbody>
															
																<?php 
																	$count=1;
																	
																	while($result = mysql_fetch_assoc($q)){
																		
																		$result['tot_qty']>=$settings['item_threshold'] ? $bg = " bg-danger" : $bg=NULL;
																		
																		$name = $member->ret_by("item_purchase","id",$result['item'],"name");
																		$unit = $member->ret_by("unit","id",$result['unit'],"name");
																		
																		?>
																		<tr>
																			<td class='text-center<?php echo $bg;?>'><?php echo $count;$count++;?></td>
																			<td class="text-center<?php echo $bg;?>"><?php echo $name ;?></td>
																			<td class="text-center<?php echo $bg;?>"><?php echo $result['tot_qty'] ;?></td>
																			<td class="text-center<?php echo $bg;?>"><?php echo $result['volume'] ;?></td>
																			<td class="text-center<?php echo $bg;?>"><?php echo $unit ;?></td>
																			<td class="text-center<?php echo $bg;?>"><?php echo date("d, M Y",strtotime($result['reg_date'])) ;?></td>
																			<td class='text-center<?php echo $bg;?>'>
																				
																					<button  data-toggle="modal" data-target="#usage" class="btn btn-xs btn-round btn-primary" onclick=retrieve({'act':'purchase_add_usage','item':'<?php echo $result['id']?>','qty':'<?php echo $result['quantity']?>'})><i class="fa fa-cube"></i></button>
																				
																				<!--<button class="btn btn-xs btn-round btn-danger" data-toggle="modal" data-target="#dell_item" onclick=$("#remove_item").attr("onclick","retrieve({'act':'rem_purchase_item','item':'<?php echo $result['id'];?>'})")><i class="fa fa-times"></i></button>-->
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
									<span id="item_create_msgbox"></span>
										<div class='col-md-12'>
											
													<div class="form-group">
														<label>Name*</label>
														<input type="text" placeholder="Name" id='name' class="form-control">
													</div>
													
													<div class="form-group">
														<label>Action</label>
														<button onclick="create_item_purchase()" class="btn btn-primary full-width">Create Item</button>
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
					<h4 class="modal-title" >Remove Item (???)</h4>
				</div>
				<div class="modal-body">
					<div class="block">
						<span class="text-danger">
							<p><h4>Are you sure you want to remove this Item ?</h4></p>
							<p>Deleting this Item will result in the following effects :</p>
							<ul>
								<li>Loss of Data added against this Item.</li>
							</ul>
							<p><i class='fa fa-warning'></i> Caution : This effect is irreversible i.e once the item is removed the data associated with it is destroyed and cannot be restored.</p>
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
	<div class="modal fade" id="usage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header label-primary white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" >Usage</h4>
                </div>
                <div class="modal-body">
                    <div class='row'>
									<span id="notify_purchase_usage"></span>
										<div class='col-md-12'>
											
													<div class="form-group">
														<label>Quantity*</label>
														<label>Quantity*</label>
														<input type="number"  id="usage_qty" class="form-control" placeholder="Enter Quantity"/>
														<span class="help-block m-b-none">Max : <span id="curr_qty"></span></span>
													</div>
													
													<div class="form-group">
														<label>Remarks*</label>
														<textarea type="text"  id="usage_remarks" class="form-control" placeholder="Enter Remarks" ></textarea>
													</div>
													
													<div class="form-group">
														<label>Action</label>
														<button  class="btn btn-primary full-width" id="exec_purchase_usage">Update</button>
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