<?php require_once('assets/funcs.php');
$obj = new main();
$obj->check_sesh("clerk",array("pass"=>NULL,"fail"=>"../clerk"));
$obj->connect_db();
$member = new member();
$static = new static_content;

if(isset($_POST['create'])){

	$company = @trim($_POST['company']);
	$owner = @trim($_POST['owner']);
	$address = @trim($_POST['address']);
	$phone = @trim($_POST['phone']);
	$prefix = @trim($_POST['prefix']);
	$fax = @trim($_POST['fax']);
	$cr = @trim($_POST['cr']);
	$other_gsm = @trim($_POST['other_gsm']);
	

	if(!empty($company) AND !empty($owner) AND !empty($address) AND !empty($phone) AND !empty($cr) AND !empty($prefix)){
	
			$company  = mysql_real_escape_string($company);
			
			$create = $member->create_company($company,$owner,$address,$phone,$prefix,$fax,$cr,$other_gsm);
			
			if($create['status']=="success"){
						
						$msgbox = "<div class='alert alert-success'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <strong><i class='fa fa-check-circle'></i> Success  (نجاح) </strong> {$create['message']}. 
                                    </div>";
			
			}else{
						$msgbox = "<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <strong><i class='fa fa-warning'></i> Error (خطأ) </strong> {$create['message']}. 
                                    </div>";
			}
			
		
	
	}else{
		
		$msgbox = "<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <strong><i class='fa fa-warning'></i> Error (خطأ) </strong> fields with * cannot be empty 
                                    </div>";
	
	}


			

}elseif(isset($_POST['remove_company'])){

	
	$company = trim($_POST['remove_company']);
	
	if(!empty($company)){
			
			mysql_query("delete from attendance where company={$company}");
			mysql_query("delete from bank_account where company={$company}");
			mysql_query("delete from company where id={$company}");
			mysql_query("delete from employee where company={$company}");
			mysql_query("delete from overtime where company={$company}");
			mysql_query("delete from payment_voucher where company={$company}");
			mysql_query("delete from salary where company={$company}");
			mysql_query("delete from vehicle where company={$company}");
			
			$msgbox = "<div class='alert alert-success'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <strong><i class='fa fa-check-circle'></i> Success!</strong> Company Removed
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
<?php echo $static->sidebar("company");?>
<!--Left navigation section end-->


<!--Page main section start-->
<section id="min-wrapper">
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--Top header start-->
                    <h3 class="ls-top-header"><i class='fa fa-building-o'></i> COMPANY (شركة) </h3>
                    <!--Top header end -->

                    <!--Top breadcrumb start -->
                   <ol class="breadcrumb">
                        <li><a href="javascript:void(0)"><i class="fa fa-home"></i></a></li>
                        <li><a href='dashboard'>Dashboard</a></li>
                        <li class="active">Company</li>
                    </ol>
                    <!--Top breadcrumb start -->
                </div>
            </div>
            <!-- Main Content Element  Start-->
									
					<?php 
						
						$exec = $member->val_company_esp();
						if($exec){
							
						
					
					?>
					<div class="row">
                        <div data-toggle="modal" data-target="#add_company" class="col-md-3 col-sm-6">
                            <div class="ls-wizard  label-blue">
                                <h2>Company <small>(<?php echo $member->total_companies($_SESSION['clerk']['id']);?>) Total</small></h2>
                                <span style="font-size:20px;">Add company (إضافة) </span>

                                <div class="icon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                        </div>
                        <div onclick="window.location='employee'" class="col-md-3 col-sm-6">
                            <div class="ls-wizard">
                                <h2>Employee <small>(<?php echo $member->total_employee($_SESSION['clerk']['id']);?>) Total</small></h2>
                                <span style="font-size:23px;" >Manage Employee</span>

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
					<?php 
						}
						else{
							?>
							
								<div class="row">
                        <div data-toggle="modal" data-target="#add_company" class="col-md-3 col-sm-6">
                            <div class="ls-wizard  label-blue">
                                <h2>Company <small>(<?php echo $member->total_companies($_SESSION['clerk']['id']);?>) Total</small></h2>
                                <span style="font-size:20px;">Add company (إضافة) </span>

                                <div class="icon">
                                    <i class="fa fa-building"></i>
                                </div>
                            </div>
                        </div>
                        <div  class="col-md-3 col-sm-6">
                            <div class="ls-wizard">
                                <h2>Employee <small>(<?php echo $member->total_employee($_SESSION['clerk']['id']);?>) Total</small></h2>
                                <span style="font-size:23px;" >Manage Employee</span>

                                <div class="icon">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>

                        </div>
                        <div  class="col-md-3 col-sm-6">
                            <div class="ls-wizard label-lightBlue margin-top-iPad-15">
                                <h2>Vehicle <small>(<?php echo $member->total_vehicle($_SESSION['clerk']['id']);?>) Total</small></h2>
                                <span style="font-size:23px;">Manage vehicle</span>
                                <div class="icon">
                                    <i class="fa fa-car"></i>
                                </div>
                            </div>
                        </div>
                        <div  class="col-md-3 col-sm-6">
                            <div class="ls-wizard label-red margin-top-iPad-15">
                                <h2>Voucher <small>(<?php echo $member->total_voucher($_SESSION['clerk']['id']);?>) Total</small></h2>
                                <span style="font-size:23px;">Manage voucher</span>
                                <div class="icon">
                                    <i class="fa fa-ticket"></i>
                                </div>
                            </div>
                        </div>
                    </div>
							
							<?php
						}
					?>
					<hr />
								  <?php 
								$q = mysql_query("select * from company where created_by='{$_SESSION['clerk']['id']}'");
								if(mysql_num_rows($q)>0)
								{
								?>
									<div class="row">										<div class="col-md-12"><?php if(isset($msgbox)){echo $msgbox;}?></div>
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
																<th class='text-center'><b>COMPANY (شركة) </b></th>
																<th class='text-center'><b>EMPLOYEE (عامل) </b></th>
																<th class='text-center'><b>Date (لتاريخ) </b></th>
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
																			<td class='text-center'><a href='company-detail?salt=<?php echo $result['salt'];?>'><?php echo $result['name']; ?></a></td>
																			<td class='text-center'><?php echo $member->count_employee($result['id']);?></td>
																			<td class='text-center'><?php echo date("d,M Y",strtotime($result['reg_date'])); ?></td>
																			<td class='text-center'><button onclick="clip_value('remove_company','<?php echo $result['id'];?>')" data-toggle="modal" data-target="#dell_company" class="btn btn-danger btn-sm"><i class='fa fa-times-circle'></i> Remove</button></td>
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
                            
						
						
			

            <!-- Main Content Element  End-->

        </div>
    </div>



</section>
<div class="modal fade" id="add_company" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header label-primary white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" >Add Company (اضافة شركة)</h4>
                </div>
                <div class="modal-body">
                    <div class="block"> 
									
																	 
																	<form method="POST">
																		
																		<div class="panel-body">
																			
																			<div class="ls_form">
																				<div class='col-md-12'>
																							<div class="form-group">
																								<label>Name (اسم) *</label>
																								<input name="company" type="text" value="<?php if(isset($_POST['company'])){echo $_POST['company'];}?>" placeholder="Enter Company Name" class="form-control">
																							</div>
																							<div class="form-group">
																								<label>Owner (مالك) *</label>
																								<input name="owner" type="text"  value="<?php if(isset($_POST['owner'])){echo $_POST['owner'];}?>" placeholder="Enter Owner Name" class="form-control">
																							</div>
																							<div class="form-group">
																								<label>CR *</label>
																								<input name="cr" type="number"  value="<?php if(isset($_POST['cr'])){echo $_POST['cr'];}?>" placeholder="Enter CR number" class="form-control">
																							</div>
																							<div class="form-group">
																								<label>Address (العنوان) *</label>
																								<input name="address" type="text"  value="<?php if(isset($_POST['address'])){echo $_POST['address'];}?>" placeholder="Enter Address" class="form-control">
																							</div>
																							<div class="form-group">
																								<label>Phone (الهاتف) *</label>
																								<input name="phone" type="number" value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];}?>"placeholder="Enter Phone" class="form-control">
																							</div>
																							<div class="form-group">
																								<label>Company Prefix (بادئة شركة) *</label>
																								<input name="prefix" type="text"  value="<?php if(isset($_POST['prefix'])){echo $_POST['prefix'];}?>" placeholder="Enter Company Prefix" class="form-control">
																							</div>
																							<div class="form-group">
																								<label>Other GSM (هاتف آخر) </label>
																								<input name="other_gsm" type="number"  value="<?php if(isset($_POST['other_gsm'])){echo $_POST['other_gsm'];}?>" placeholder="Enter other GSM" class="form-control">
																							</div>
																							<div class="form-group">
																								<label>Fax (فاكس)</label>
																								<input name="fax" type="number"  value="<?php if(isset($_POST['fax'])){echo $_POST['fax'];}?>" placeholder="Enter Fax" class="form-control">
																							</div>
																	
																				   </div>
																				   
																				   <div class="col-md-12">
																								<button name='create' class='btn btn-primary full-width'>Create Company (خلق)</button>
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
	
	<div class="modal fade" id="dell_company" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header label-primary white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" >Remove Company (نزع)</h4>
                </div>
                <div class="modal-body">
                    <div class="block"> 
									
					<span class="text-danger">	
						<p><h4>Are you sure you want to remove this company ?</h4></p>											 
						<p>Deleting this company will result in the following effects :</p>
						<ul>
							<li>Loss of Employee added in this company.</li>
							<li>Loss of Attendance added against the employees of this company.</li>
							<li>Loss of Overtime added against the employees of this company.</li>
							<li>Loss of Salaries added against the employees of this company.</li>
							<li>Loss of Vehicles added in this company.</li>
							<li>Loss of Vouchers added in this company.</li>
						</ul>
						<p><i class='fa fa-warning'></i> Caution : This effect is irreversible i.e once a company is removed the data associated with it is destroyed and cannot be restored.</p>
					</span>								
															   
					</div>
                </div>
                <div class="modal-footer">
                    <form method="POST"><button type="submit" id="remove_company" name="remove_company" type="button" class="btn btn-success btn-xs">Remove (نزع) </button>
                    <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close (أغلق) </button></form>
                </div>
            </div>
        </div>
    </div>
<!--Page main section end -->
<!--Right hidden  section start-->

<!--Right hidden  section end -->
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