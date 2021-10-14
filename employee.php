<?php require_once('assets/funcs.php');
$obj = new main();
$obj->check_sesh("clerk",array("pass"=>NULL,"fail"=>"../clerk"));
$obj->connect_db();
$member = new member();
$static = new static_content;if(isset($_POST['remove_employee'])){	$employee = trim($_POST['remove_employee']);		if(!empty($employee)){			mysql_query("delete from attendance where employee={$employee}");			mysql_query("delete from employee where id={$employee}");			mysql_query("delete from overtime where employee={$employee}");			mysql_query("delete from salary where employee={$employee}");			$msgbox = "<div class='alert alert-success'>                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>                                        <strong><i class='fa fa-check-circle'></i> Success!</strong> Employee Removed                                    </div>";	}}
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
<?php echo $static->sidebar("employee");?>
<!--Left navigation section end-->


<!--Page main section start-->
<section id="min-wrapper">
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--Top header start-->
                    <h3 class="ls-top-header"><i class='fa fa-user'></i> EMPLOYEE (عامل)</h3>
                    <!--Top header end -->

                    <!--Top breadcrumb start -->
                    <ol class="breadcrumb">
                        <li><a href="javascript:void(0)"><i class="fa fa-home"></i></a></li>
                        <li><a href='dashboard'>Dashboard</a></li>
                        <li><a href='company'>Company</a></li>
                        <li class="active">Employee</li>
                    </ol>
                    <!--Top breadcrumb start -->
                </div>
            </div>
            <!-- Main Content Element  Start-->
									
					<div class="row">
                        <div data-toggle="modal" data-target="#add_employee" class="col-md-3 col-sm-6">
                            <div class="ls-wizard">
                                <h2>Employee <small>(<?php echo $member->total_employee($_SESSION['clerk']['id']);?>) Total</small></h2>
                                <span style="font-size:20px;">Add Employee (إضافة) </span>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
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
								<div class="col-md-12">									<?php if(isset($msgbox)){echo $msgbox;}?>
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
														array_push($arr,$result);
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
									$q = mysql_query("select * from employee where company='{$val_company['id']}' and created_by='{$_SESSION['clerk']['id']}' order by id DESC");
									$prefix = $val_company['prefix'];
								}else{
									$q = mysql_query("select * from employee where company='{$arr[0]['id']}' and created_by='{$_SESSION['clerk']['id']}' order by id DESC");
									$prefix = $arr[0]['prefix'];
								}
								
								if(mysql_num_rows($q)>0)
								{
								?>
									<div class="row">
										<div class="col-md-12">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title"><i class='fa fa-cog'></i> Summary (ملخص) </h3>
												</div>
												<div class="panel-body">
													<!--Table Wrapper Start-->
													<div class="table-responsive ls-table">
														<table id="datatable" class="table table-bordered">
															<thead>
															<tr>
																<th class='text-center'><b>#</b></th>
																<th class='text-center'><b>Staff ID (هوية الموظفين) </b></th>
																<th class='text-center'><b>Name (اسم) </b></th>
																<th class='text-center'><b>CID (الهوية المدنية) </b></th>
																<th class='text-center'><b>Passport (جواز السفر) </b></th>
																<th class='text-center'><b>Joined (دخل)</b></th>
																<th class='text-center'><b>Visa Date (تاريخ التأشيرة) </b></th>
																<th class='text-center'><b>Visa Expiry (انتهاء صلاحية التأشيرة)</b></th>
																<th class='text-center'><b>Basic Salary (الراتب الاساسي) </b></th>
																<th class='text-center'><b>Insurance Date (تاريخ التأمين) </b></th>
																<th class='text-center'><b>Insurance Expiry (انتهاء التأمين) </b></th>																																<th class='text-center'><b>Action (عمل) </b></th>
															</tr>
															</thead>
															<tbody>
															
																<?php 
																	$count=1;
																	
																	while($result = mysql_fetch_assoc($q)){
																		
																		?>
																		<tr>
																			<td class='text-center'><?php echo $count; ?></td>
																			<td class='text-center'><?php echo strtoupper($prefix.'-'.$result['salt']); ?></td>
																			<td class='text-center'><a href='employee-detail?salt=<?php echo $result['salt'];?>'><?php echo $result['name']; ?></a></td>
																			<td class='text-center'><?php echo $result['cid']; ?></td>
																			<td class='text-center'><?php echo $result['passport']; ?></td>
																			<td class='text-center'><?php echo date("d,M Y",strtotime($result['joined'])); ?></td>
																			<td class='text-center'><?php echo date("d,M Y",strtotime($result['visa_date'])); ?></td>
																			<td class='text-center'><?php echo date("d,M Y",strtotime($result['visa_expire'])); ?></td>
																			<td class='text-center'><?php echo $result['basic_salary']; ?></td>
																			<td class='text-center'><?php echo date("d,M Y",strtotime($result['insurance_date'])); ?></td>
																			<td class='text-center'><?php echo date("d,M Y",strtotime($result['insurance_expire'])); ?></td>																																						<td class='text-center'><button onclick="clip_value('remove_employee','<?php echo $result['id'];?>')" data-toggle="modal" data-target="#dell_employee" class="btn btn-danger btn-sm"><i class='fa fa-times-circle'></i> Remove</button></td>
																			
																			
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
<div class="modal fade" id="add_employee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header label-primary white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" >Add Employee (إضافة موظف) </h4>
                </div>
                <div class="modal-body">
                    <div class='row'>
									<span id="employee_create_msgbox"></span>
									<div class='col-md-6'>
										<div class="form-group">
                                            <label>Name (اسم) *</label>
                                            <input type="text" id="employee_name" placeholder="Enter Name" class="form-control">
                                        </div>
										<div class="form-group">
                                            <label>DOB (تاريخ الميلاد) *</label>
                                            <input name="datepicker" type="text" id="employee_dob" placeholder="Enter DOB" class="form-control">
                                        </div>
										<div class="form-group">
                                            <label>Visa Date (تاريخ التأشيرة) *</label>
                                            <input name="datepicker" type="text" id="employee_visa_date" placeholder="Enter Visa Expire Date" class="form-control">
                                        </div>
										<div class="form-group">
                                            <label>Basic Salary (الراتب الاساسي) *</label>
                                            <input type="number" id="employee_salary_basic" placeholder="Enter Salaray Basic" class="form-control">
                                        </div>
										<div class="form-group">
                                            <label>Insurance Date (تاريخ التأمين) *</label>
                                            <input name="datepicker" id="employee_insurance_date" placeholder="Enter Insurance Date" class="form-control">
                                        </div>
										
									</div>
									<div class='col-md-6'>
										<div class="form-group">
                                            <label>Passport (جواز السفر) *</label>
                                            <input type="text" id="employee_passport" placeholder="Enter  Passport" class="form-control">
                                        </div>
										<div class="form-group">
                                            <label>Joining Date (دخل) *</label>
                                            <input name="datepicker" type="text" id="employee_joining_date" placeholder="Enter Joining Date" class="form-control">
                                        </div>
										<div class="form-group">
                                            <label>Visa Expire (انتهاء صلاحية التأشيرة) *</label>
                                            <input name="datepicker" type="text" id="employee_visa_expire" placeholder="Enter Visa Expire Date" class="form-control">
                                        </div>
										
										<div class="form-group">
                                            <label>Civil ID (الهوية المدنية) *</label>
                                            <input type="number" id="employee_civil_id" placeholder="Enter CID" class="form-control">
                                        </div>
										
										<div class="form-group">
                                            <label>Insurance Expire (انتهاء التأمين) *</label>
                                            <input name="datepicker" id="employee_insurance_expire" placeholder="Enter Insurance Expire date" class="form-control">
                                        </div>
										
										
									</div>
									<div class='col-md-12'>
										<div class="form-group">
												<label>Designation (التعيين) *</label>
												<input type="text" id="employee_designation" placeholder="Enter Designation" class="form-control">
										</div>
									</div>
							
						<div class='row'>
							<div class='col-md-12'>
								<input type='hidden' id="employee_company" value="<?php if($val_company){echo $val_company['id'];}else{echo $arr[0]['id'];}?>"/>
								<button class='btn btn-primary full-width' onclick="create_employee()">Create Employee (خلق) </button>
							</div>
						</div>
					</div>
					
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-xs" data-dismiss="modal">Close (أغلق)</button>
                </div>
            </div>
        </div>
    </div>

</section>
<div class="modal fade" id="dell_employee" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">        <div class="modal-dialog modal-lg">            <div class="modal-content">                <div class="modal-header label-primary white">                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>                    <h4 class="modal-title" >Remove Employee (نزع)</h4>                </div>                <div class="modal-body">                    <div class="block"> 														<span class="text-danger">							<p><h4>Are you sure you want to remove this company ?</h4></p>											 						<p>Deleting this employee will result in the following effects :</p>						<ul>							<li>Loss of Attendance added against this employees.</li>							<li>Loss of Overtime added against this employees.</li>							<li>Loss of Salaries added against this employees.</li>						</ul>						<p><i class='fa fa-warning'></i> Caution : This effect is irreversible i.e once the employee is removed the data associated with it is destroyed and cannot be restored.</p>					</span>																							   					</div>                </div>                <div class="modal-footer">                    <form method="POST"><button type="submit" id="remove_employee" name="remove_employee" type="button" class="btn btn-success btn-xs">Remove (نزع) </button>                    <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close (أغلق) </button></form>                </div>            </div>        </div>    </div>
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