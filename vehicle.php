<?php require_once('assets/funcs.php');
$obj = new main();
$obj->check_sesh("clerk",array("pass"=>NULL,"fail"=>"../clerk"));
$obj->connect_db();
$member = new member();
$static = new static_content;
if(isset($_POST['remove_vehicle']))
	{
		$vehicle = trim($_POST['remove_vehicle']);
		
		if(!empty($vehicle)){
			mysql_query("delete from vehicle where id={$vehicle}");
			$msgbox = "<div class='alert alert-success'>
			<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
			<strong><i class='fa fa-check-circle'></i> Success!</strong>Vehicle Removed
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
<?php echo $static->sidebar("vehicle");?>
<!--Left navigation section end-->


<!--Page main section start-->
<section id="min-wrapper">
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--Top header start-->
                    <h3 class="ls-top-header"><i class='fa fa-car'></i> Vehicle (مركبة) </h3>
                    <!--Top header end -->

                    <!--Top breadcrumb start -->
                    <ol class="breadcrumb">
                        <li><a href="javascript:void(0)"><i class="fa fa-home"></i></a></li>
                        <li><a href='dashboard'>Dashboard</a></li>
                        <li><a href='company'>Company</a></li>
                        <li><a href="employee">Employee</a></li>
                        <li class="active">Vehicle</li>
                    </ol>
                    <!--Top breadcrumb start -->
                </div>
            </div>
            <!-- Main Content Element  Start-->
									
					 <div class="row">
					 
						<div data-toggle="modal" data-target="#add_vehicle" class="col-md-3 col-sm-6">
                            <div class="ls-wizard">
                                <h2>Vehicle <small>(<?php echo $member->total_vehicle($_SESSION['clerk']['id']);?>) Total</small></h2>
                                <span  style="font-size:20px;">Add Vehicle (إضافة) </span>
                                <div class="icon">
                                    <i class="fa fa-car"></i>
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
                        <div onclick="window.location='payment-voucher'" class="col-md-3 col-sm-6">
                            <div class="ls-wizard label-red margin-top-iPad-15">
                                <h2>Voucher <small>(<?php echo $member->total_voucher($_SESSION['clerk']['id']);?>) Total</small></h2>
                                <span style="font-size:23px;">Manage voucher</span>
                                <div class="icon">
                                    <i class="fa fa-ticket"></i>
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
                                            <label>Select Company (اختر شركة) </label>
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
									$q = mysql_query("select * from vehicle where company='{$val_company['id']}' and created_by='{$_SESSION['clerk']['id']}' order by id DESC");
									$prefix = $val_company['prefix'];
								}else{
									$q = mysql_query("select * from vehicle where company='{$arr[0]['id']}' and created_by='{$_SESSION['clerk']['id']}' order by id DESC");
									$prefix = $arr[0]['prefix'];
								}
								
								if(mysql_num_rows($q)>0)
								{
								?>
									<div class="row">
										<div class="col-md-12">
											<div class="col-md-12"><?php if(isset($msgbox)){echo $msgobx;}?></div>
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title"><i class='fa fa-cog'></i> Vehicle</h3>
												</div>
												<div class="panel-body">
													<!--Table Wrapper Start-->
													<div class="table-responsive ls-table">
														<table id="datatable" class="table table-bordered">
															<thead>
															<tr>
																<th class='text-center'><b>#</b></th>
																<th class='text-center'><b>Registration No. (رقم التسجيل) </b></th>
																<th class='text-center'><b>Model (رقم الموديل) </b></th>
																<th class='text-center'><b>Color (اللون) </b></th>
																<th class='text-center'><b>Malkiya Renewal Date (تجديد المالكية) </b></th>
																<th class='text-center'><b>Malkiya Expire Date (المالكية انتهاء) </b></th>
																<th class='text-center'><b>Insurance date (تاريخ التأمين) </b></th>
																<th class='text-center'><b>Insurance Expire Date (انتهاء التأمين) </b></th>
																<th class='text-center'><b>Value of Vehicle (القيمة) </b></th>
																<th class='text-center'><b>Action (عمل) </b></th>																
															</tr>
															</thead>
															<tbody>
															
																<?php 
																	$count=1;
																	
																	while($result = mysql_fetch_assoc($q)){
																		
																		?>
																		<tr>
																			<td class='text-center'><?php echo $count;$count++;?></td>
																			<td class='text-center'><a href="vehicle-detail?salt=<?php echo $result['salt'];?>"><?php echo $result['registration_number']; ?></a></td>
																			<td class='text-center'><?php echo $result['model']; ?></td>
																			<td class='text-center'><?php echo $result['color']; ?></td>
																			<td class='text-center'><?php echo date("d,M Y",strtotime($result['malkiya_date'])); ?></td>
																			<td class='text-center'><?php echo date("d,M Y",strtotime($result['malkiya_expire'])); ?></td>
																			<td class='text-center'><?php echo date("d,M Y",strtotime($result['insurance_date'])); ?></td>
																			<td class='text-center'><?php echo date("d,M Y",strtotime($result['insurance_expire'])); ?></td>
																			<td class='text-center'><?php echo $result['value']; ?></td>
																			<td class='text-center'><button onclick="clip_value('remove_vehicle','<?php echo $result['id'];?>')" data-toggle="modal" data-target="#dell_vehicle" class="btn btn-danger btn-sm"><i class='fa fa-times-circle'></i> Remove</button></td>
																			
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

</section>
<div class="modal fade" id="add_vehicle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header label-primary white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" >Add Vehicle (إضافة مركبة) </h4>
                </div>
                <div class="modal-body">
                    <div class='row'>
									<span id="vehicle_create_msgbox"></span>
									<div class='col-md-6'>
										<div class="form-group">
                                            <label>Vehicle Model (رقم الموديل) *</label>
                                            <input type="text" id="vehicle_model" placeholder="Enter Vehicle Model" class="form-control">
                                        </div>
										<div class="form-group">
                                            <label>Vehicle Registration No (رقم التسجيل) *</label>
                                            <input type="text" id="vehicle_registration_number" placeholder="Enter Vehicle Registration Number" class="form-control">
                                        </div>
										
										<div class="form-group">
                                            <label>Malkiya Renewal Date (تجديد المالكية) *</label>
                                            <input name="datepicker" id="malkiya_date" placeholder="Enter Malkiya Renewal Date" class="form-control">
                                        </div>
										<div class="form-group">
                                            <label>Vehicle Insurance Date (تاريخ التأمين) *</label>
                                            <input name="datepicker" id="vehicle_insurance_date" placeholder="Enter Vehicle Insurance Date" class="form-control">
                                        </div>
										
									</div>
									<div class='col-md-6'>
										<div class="form-group">
                                            <label>Vehicle Color (اللون) *</label>
                                            <input type="text" id="vehicle_color" placeholder="Enter Vehicle Color" class="form-control">
                                        </div>
										<div class="form-group">
                                            <label>Vehicle Value (القيمة) *</label>
                                            <input type="number" id="vehicle_value" placeholder="Enter Vehicle Value" class="form-control">
                                        </div>
										<div class="form-group">
                                            <label>Malkiya Expiry (المالكية انتهاء) *</label>
                                            <input name="datepicker" id="malkiya_expire" placeholder="Enter Expire Date" class="form-control">
                                        </div>
										<div class="form-group">
                                            <label>Vehicle Insurance Expiry (انتهاء التأمين) *</label>
                                            <input name="datepicker" id="vehicle_insurance_expire" placeholder="Enter Vehicle Insurance Date" class="form-control">
                                        </div>
										
										
									</div>
						<div class='row'>
							<div class='col-md-12'>
								<input type='hidden' id="company" value="<?php if($val_company){echo $val_company['id'];}else{echo $arr[0]['id'];}?>"/>
								<button class='btn btn-primary full-width' onclick="create_vehicle()">Create Vehicle (خلق) </button>
							</div>
						</div>
					</div>
					
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-xs" data-dismiss="modal">Close (أغلق) </button>
                </div>
            </div>
        </div>
    </div>
	<div class="modal fade" id="dell_vehicle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header label-primary white">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" >Remove Vehcile (نزع)</h4>
					</div>
					<div class="modal-body">
						<div class="block">
							<span class="text-danger">
								<p><h4>Are you sure you want to remove this vehicle ?</h4></p>
								<p>Deleting this vehcile will result in the following effects :</p>
								<ul>
									<li>Loss of Data added against this vehicle.</li>
								</ul>
								<p><i class='fa fa-warning'></i> Caution : This effect is irreversible i.e once the employee is removed the data associated with it is destroyed and cannot be restored.</p>
							</span>
						</div>
					</div>
					<div class="modal-footer">
						<form method="POST"><button type="submit" id="remove_vehicle" name="remove_vehicle" type="button" class="btn btn-success btn-xs">Remove (نزع) </button>
						<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close (أغلق) </button></form>
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