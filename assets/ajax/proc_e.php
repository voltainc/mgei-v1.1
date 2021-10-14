<?php require_once('../funcs.php');
$obj = new main();
if(isset($_SESSION['clerk'])){
$obj->connect_db();
$member = new member();

if(isset($_REQUEST['act'])){

	
	switch($_REQUEST['act']){
	
	
				case "create_employee":
					
					$employee = $_REQUEST['emlpoyee'];
					
					$company = $_REQUEST['company'];
					
					$passport = $_REQUEST['passport'];
					
					$visa_date = $_REQUEST['visa_date'];
					
					$visa_expire = $_REQUEST['visa_expire'];
					
					$dob = $_REQUEST['dob'];
					
					$joined = $_REQUEST['joined'];
					
					$cid = $_REQUEST['cid'];
					
					$created_by = $_SESSION['clerk']['id'];
					
					$basic_salary = $_REQUEST['basic_salary'];
					
					$basic_allowance = $_REQUEST['basic_allowance'];
					
					$designation = $_REQUEST['designation'];
					
					$insurance_date = $_REQUEST['employee_insurance_date'];
					
					$insurance_expire = $_REQUEST['employee_insurance_expire'];
					
					$salt = $member->saltish("employee",5);
					
					$status = "active";
					
					$val_dates = $member->verify_dates_emp($visa_date,$visa_expire,$insurance_date,$insurance_expire);
					 
					 if($val_dates['status']=="success"){

							echo $member->create_employee($employee,$company,$passport,$visa_date,$visa_expire,$dob,$joined,$cid,$basic_salary,$designation,$insurance_date,$insurance_expire,$created_by,$salt,$status);
					
					 }else{
					 
							echo json_encode($val_dates);
					 
					 }
					
					
					
				break;
				
				case "create_vehicle":
					
					$company = $_REQUEST['company'];
					
					$model = $_REQUEST['vehicle_model'];
					
					$registration_number = $_REQUEST['vehicle_registration_number'];
					
					$malkiya_date = $_REQUEST['malkiya_date'];
					
					$insurance_date = $_REQUEST['vehicle_insurance_date'];
					
					$color = $_REQUEST['vehicle_color'];
					
					$value = $_REQUEST['vehicle_value'];
					
					$malkiya_expire = $_REQUEST['malkiya_expire'];
					
					$insurance_expire = $_REQUEST['vehicle_insurance_expire'];
					
					$salt = $member->saltish("vehicle",5);
					
					$val_dates = $member->verify_dates_veh($malkiya_date,$malkiya_expire,$insurance_date,$insurance_expire);
					 
					 if($val_dates['status']=="success"){

							echo $member->create_vehicle($company,$model,$registration_number,$malkiya_date,$insurance_date,$color,$value,$malkiya_expire,$insurance_expire,$salt);
					
					 }else{
					 
							echo json_encode($val_dates);
					 
					 }
					
					
					case "create_payment_voucher":
					
					$company = $_REQUEST['company'];
					
					$pv_no = @trim($_REQUEST['pv_no']);
					$amount = @trim($_REQUEST['amount']);
					$issue_date = @trim($_REQUEST['issue_date']);
					$approved_by = @trim($_REQUEST['approved_by']);
					$cash = @trim($_REQUEST['cash']);
					$check = @trim($_REQUEST['check']);
					$to = @trim($_REQUEST['to']);
					$paid_by = @trim($_REQUEST['paid_by']);
					$description = @trim($_REQUEST['description']);
					$salt = $member->saltish("payment_voucher",5);

					 
					echo $member->create_payment_voucher($company,$pv_no,$amount,$issue_date,$approved_by,$cash,$check,$to,$paid_by,$description,$salt);
					
					
				break;
				
				
				case "create_bank_account":
					
					$name = $_REQUEST['name'];
					
					$address = $_REQUEST['address'];
					
					$account = $_REQUEST['account'];
					
					$company = $_REQUEST['company'];
					
					$created_by = $_SESSION['clerk']['id'];
					
					$salt = $member->saltish("bank_account",15);
					
					
					echo $member->create_bank_account($name,$address,$account,$company,$created_by,$salt);
					
				break;
	
				default:
					
						echo json_encode(array("status"=>"error","message"=>"invalid action"));
				
				break;
				
				case "recent_activities":
				
					$member->recent_activities("company");
					$member->recent_activities("employee");
				
				break;
				
				case "recent_activities_esp":
				
					$member->recent_activities_esp("company",$_REQUEST['company']);
					$member->recent_activities("employee",$_REQUEST['company']);
				
				break;
				
				case "notifications":
				
					$member->notifications("visa");
					$member->notifications("insurance");
					$member->notifications("vehicle_malkiya");
					$member->notifications("vehicle_insurance");
					
				
				break;
				
				case "create_attendace":
					
					$company = trim(@$_REQUEST['company']);
					$employee = trim(@$_REQUEST['employee']);
					$year = trim(@$_REQUEST['year']);
					$month = trim(@$_REQUEST['month']);
					$days = trim(@$_REQUEST['days']);
					
					if(!empty($company) AND !empty($employee) AND !empty($year) AND !empty($month) AND !empty($days)){
							$company = $member->ret_by("company","salt",$company,"id");
								$q = mysql_query("select * from attendance where employee='{$employee}' and company='{$company}' and year='{$year}' and month='{$month}'");
								if(mysql_num_rows($q)>0){
								
									echo json_encode(array("status"=>"error","message"=>"Attendance already exists"));
								
								}else{
									$q = mysql_query("insert into attendance values ('','{$employee}','{$company}','{$year}','{$month}','{$days}','{$_SESSION['clerk']['id']}',(current_timestamp))");
									if($q){
										echo json_encode(array("status"=>"success","message"=>"Attendance created"));
									}else{
										echo json_encode(array("status"=>"success","message"=>"Failed to create Attendance"));
									}
								}
								
						
					}else{
						echo json_encode(array("status"=>"error","message"=>"All fields are required"));
					}
					 
					
				break;
				
				case "view_attendace":
					
					$company = trim(@$_REQUEST['company']);
					$company = $member->ret_by("company","salt",$company,"id");
					$year = trim(@$_REQUEST['year']);
					$month = trim(@$_REQUEST['month']);
					$month_days = date('t', mktime(0, 0, 0, $month, 1, $year))+1;
					$count=1;
					$q = mysql_query("select * from employee where company = '{$company}' and created_by='{$_SESSION['clerk']['id']}' order by id DESC");
					
					if(mysql_num_rows($q)>0){
					?>
					 <div class="row">
                        <div class="col-md-12">
                               
                                <div class="panel-body">
                                    <!--Table Wrapper Start-->
                                    <div class="table-responsive ls-table">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <?php 
													for($i=1;$i<$month_days;$i++){
										
															echo "<th>{$i}</th>";
											
													}
												?>
                                            </tr>
                                            </thead>
                                            <tbody>
					<?php
						while($result = mysql_fetch_assoc($q)){
							
								?>
								
									
                                            <tr>
												<td><?php echo $count;$count++;?></td>
                                                <td><?php echo $result['name']; ?></td>
                                                <?php $member->ret_attendance($result['company'],$result['id'],$year,$month,$month_days); ?>
												
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
						<?php
					
					}else{
						echo "<blockquote>Empty</blockquote>";
					}
					
				break;
				
				case "view_attendace_esp":
					
					$company = trim(@$_REQUEST['company']);
					$company = $member->ret_by("company","salt",$company,"id");
					$year = trim(@$_REQUEST['year']);
					$month = trim(@$_REQUEST['month']);
					$month_days = date('t', mktime(0, 0, 0, $month, 1, $year))+1;
					$count=1;
					$q = mysql_query("select * from employee where company = '{$company}' and created_by='{$_SESSION['clerk']['id']}' order by id DESC");
					
					if(mysql_num_rows($q)>0){
					?>
					 <div class="row">
                        <div class="col-md-12">
                               
                                <div class="panel-body">
                                    <!--Table Wrapper Start-->
                                    <div class="table-responsive ls-table">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <?php 
													for($i=1;$i<$month_days;$i++){
										
															echo "<th>{$i}</th>";
											
													}
												?>
                                            </tr>
                                            </thead>
                                            <tbody>
					<?php
						while($result = mysql_fetch_assoc($q)){
							
								?>
								
									
                                            <tr>
												<td><?php echo $count;$count++;?></td>
                                                <td><?php echo $result['name']; ?></td>
                                                <?php $member->ret_attendance_esp($result['company'],$result['id'],$year,$month,$month_days); ?>
												
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
						<?php
					
					}else{
						echo "<blockquote>Empty</blockquote>";
					}
					
				break;
				
				case "attendance_view_months":
				
					$company = trim(@$_REQUEST['company']);
					$company = $member->ret_by("company","salt",$company,"id");
					$year = trim(@$_REQUEST['year']);
					
					$q = mysql_query("select distinct month from attendance where company ={$company} and year={$year} and created_by='{$_SESSION['clerk']['id']}'");
					if(mysql_num_rows($q)>0){
						?>
						<select id="months_view"  type="text" class="form-control">
						<?php
						$data = "";
						while($result = mysql_fetch_assoc($q)){
							
							$data.="<option value='{$result['month']}'>".date('F', mktime(0,0,0,$result['month'], 1, date('Y')))."</option>";
							
						}
						echo $data;
						?>
						</select>
						<?php
						
					}
				
				break;
				
					case "refresh_view_attendance_years":
				
					$company = trim(@$_REQUEST['company']);
					$company = $member->ret_by("company","salt",$company,"id");
					
					?>
					<select onchange="view_years()" id="years_view" type="text" class="form-control">
													
					<?php
														
						$q = mysql_query("select distinct year from attendance where company='{$company}' and created_by='{$_SESSION['clerk']['id']}'");
															
							if(mysql_num_rows($q)>0)
							{
							?>
							<option value=""></option>
							<?php
								while($result = mysql_fetch_assoc($q))
								{
									echo "<option value='{$result['year']}'>{$result['year']}</option>";
								}
																
							}
					?>
					</select>
					<?php
				
				break;
				
				case "create_overtime":
					
					$company = trim(@$_REQUEST['company']);
					$employee = trim(@$_REQUEST['employee']);
					$year = trim(@$_REQUEST['year']);
					$month = trim(@$_REQUEST['month']);
					$day = trim(@$_REQUEST['day']);
					$hrs = trim(@$_REQUEST['hrs']);
					$mins = trim(@$_REQUEST['mins']);
					
					if(!empty($company) AND !empty($employee) AND !empty($year) AND !empty($month) AND !empty($day) AND !empty($hrs) AND !empty($mins)){
							$company = $member->ret_by("company","salt",$company,"id");
							
					$q = mysql_query("select * from overtime where company = '{$company}' and created_by='{$_SESSION['clerk']['id']}' and employee='{$employee}' and year='{$year}' and month='{$month}' and day='{$day}'");
					
					if(mysql_num_rows($q)>0){
						
							echo json_encode(array("status"=>"error","message"=>"Overtime already added"));
						
					}else{
							
							$q = mysql_query("insert into overtime values ('','{$company}','{$_SESSION['clerk']['id']}','{$employee}','{$year}','{$month}','{$day}','{$hrs}','{$mins}',(current_timestamp))");
							if($q){
								echo json_encode(array("status"=>"success","message"=>"Overtime Added"));
							}else{
								echo json_encode(array("status"=>"error","message"=>"An error occured while adding overtime"));
							}
						
					}
								
						
					}else{
						echo json_encode(array("status"=>"error","message"=>"All fields are required"));
					}
					 
				
				break;
				
				case "overview_getyears":
				
					$company = trim(@$_REQUEST['company']);
					$company = $member->ret_by("company","salt",$company,"id");
					
					?>
					<label>Select Year*</label>
					<select onchange="get_overview('months')" id="overview_years_val" type="text" class="form-control">
													
					<?php
														
						$q = mysql_query("select distinct year from overtime where company='{$company}' and created_by='{$_SESSION['clerk']['id']}'");
															
							if(mysql_num_rows($q)>0)
							{
							?>
							<option value=""></option>
							<?php
								while($result = mysql_fetch_assoc($q))
								{
									echo "<option value='{$result['year']}'>{$result['year']}</option>";
								}
																
							}
					?>
					</select>
					<?php
				
				break;
				
				case "overview_getmonths":
				
					$company = trim(@$_REQUEST['company']);
					$company = $member->ret_by("company","salt",$company,"id");
					$year = trim(@$_REQUEST['year']);
					
					?>
					<label>Select Month*</label>
					<select onchange="get_overview('days')" id="overview_months_val" type="text" class="form-control">
													
					<?php
														
						$q = mysql_query("select distinct month from overtime where company ={$company} and year={$year} and created_by='{$_SESSION['clerk']['id']}'");
															
							if(mysql_num_rows($q)>0)
							{
							?>
							<option value=""></option>
							<?php
								$data="";
								while($result = mysql_fetch_assoc($q))
								{
									$data.="<option value='{$result['month']}'>".date('F', mktime(0,0,0,$result['month'], 1, date('Y')))."</option>";
								}
								echo $data;
																
							}
					?>
					</select>
					<?php
				
				break;
				
				case "overview_getdays":
				
					$company = trim(@$_REQUEST['company']);
					$company = $member->ret_by("company","salt",$company,"id");
					$year = trim(@$_REQUEST['year']);
					$month = trim(@$_REQUEST['month']);
					
					?>
					<label>Select Day*</label>
					<select onchange="get_overview('overview_results')" id="overview_days_val" type="text" class="form-control">
													
					<?php
														
						$q = mysql_query("select distinct day from overtime where company ={$company} and year={$year} and month={$month} and created_by='{$_SESSION['clerk']['id']}' order by day ASC");
															
							if(mysql_num_rows($q)>0)
							{
							?>
							<option value=""></option>
							<?php
								while($result = mysql_fetch_assoc($q))
								{
									echo "<option value='{$result['day']}'>{$result['day']}</option>";
								}
							}
					?>
					</select>
					<?php
				
				break;
				
				case "overview_results":
				
					$company = trim(@$_REQUEST['company']);
					$company = $member->ret_by("company","salt",$company,"id");
					$year = trim(@$_REQUEST['year']);
					$month = trim(@$_REQUEST['month']);
					$day = trim(@$_REQUEST['day']);
					
					?>
                                
                                <div class="panel-body">
                                    <!--Table Wrapper Start-->
                                    <div class="table-responsive ls-table">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th><strong>#</strong></th>
                                                <th><strong>Employee</strong></th>
                                                <th><strong>Hours</strong></th>
                                                <th><strong>Mins</strong></th>
                                            </tr>
                                            </thead>
                                            <tbody>
													
					<?php
														
						$q = mysql_query("select * from employee where company ={$company} and created_by='{$_SESSION['clerk']['id']}'");
															
							if(mysql_num_rows($q)>0)
							{
							?>
							<?php
								$count = 1;
								while($result = mysql_fetch_assoc($q))
								{
									?>
										<tr>
											<td><?php echo $count; $count++;?></td>
											<td><?php echo $result['name'];?></td>
											<?php 
												$member->val_emp_overtime($company,$result['id'],$year,$month,$day);
											?>
										</tr>
									<?php
								}
							}
					?>
											</tbody>
                                        </table>
                                    </div>
                                </div>
					<?php
				
				break;
			
				case "sheet":
						
						$company = trim(@$_REQUEST['company']);
						$company = $member->ret_by("company","salt",$company,"id");
						$year = trim(@$_REQUEST['year']);
						$month = trim(@$_REQUEST['month']);
						$count=1;
						$q = mysql_query("select * from employee where company = '{$company}' and created_by='{$_SESSION['clerk']['id']}' order by id DESC");
						
						if(mysql_num_rows($q)>0){
						?>
						 <div class="row">
							<div class="col-md-12">
								   
									<div class="panel-body">
										<span id='notify'></span>
										<!--Table Wrapper Start-->
										<div class="table-responsive ls-table">
											<table class="table table-bordered">
												<thead>
												<tr>
													<th><strong>#</strong></th>
													<th><strong>Name</strong></th>
													<th><strong>Allowance</strong></th>
													<th><strong>Other Allw.</strong></th>
													<th><strong>Adv Ded.</strong></th>
													<th><strong>Other Ded.</strong></th>
													<th><strong>Action</strong></th>
												</tr>
												</thead>
												<tbody>
							<?php
							while($result = mysql_fetch_assoc($q)){
								
									?>
												<tr>
													<td><?php echo $count;$count++;?></td>
													<td><?php echo $result['name']; ?></td>
													<?php 
														$member->val_emp_salary($company,$result['id'],$year,$month);
													?>
													
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
							<?php
						
						}else{
							echo "<blockquote>Empty</blockquote>";
						}
						
					break;
					
					case "create_salary":
					
						$company = trim(@$_REQUEST['company']);
						$company = $member->ret_by("company","salt",$company,"id");
						$employee = trim(@$_REQUEST['employee']);
						$year = trim(@$_REQUEST['year']);
						$month = trim(@$_REQUEST['month']);
						$month_days = date('t', mktime(0, 0, 0, $month, 1, $year));
						if(!empty($company) and !empty($employee) and !empty($year) and !empty($month)){
							
								$emp_info = $member->emp_info($employee,$company);
								if($emp_info['status']=="success"){
												
											$q = mysql_query("select * from salary where company = {$company} and created_by = '{$_SESSION['clerk']['id']}' and employee={$employee} and year={$year} and month={$month}");
											if(mysql_num_rows($q)>0){
													echo json_encode(array("status"=>"error","message"=>"Salary already added"));
													exit();
											}
											
											$salary_per_day = $emp_info['message']['basic_salary']/$month_days;
											$salary_per_min = $salary_per_day/540;
											
											
											$present = $member->emp_attendance($emp_info['message']['company'],$emp_info['message']['id'],$year,$month);
											$present_val =$present*$salary_per_day;
											
											
											$overtime = $member->emp_overtime($emp_info['message']['company'],$emp_info['message']['id'],$year,$month);
											if($overtime){
												$overtime = array_sum($member->emp_overtime($emp_info['message']['company'],$emp_info['message']['id'],$year,$month));
											}else{
												$overtime = 0;
											}
											$overtime_val=$overtime*$salary_per_min;
											
											$allowance = trim(@$_REQUEST['alw']);
											$other_allowance = trim(@$_REQUEST['otralw']);
											
											$advance = trim(@$_REQUEST['adv']);
											$other_deduction = trim(@$_REQUEST['otrded']);
											
											$gross_salary = $present_val+$overtime_val+$allowance+$other_allowance;
											$total_deduction = $advance+$loan+$other_deduction;
											$salary_to_be_paid = $gross_salary-$total_deduction;
											
											$q = mysql_query("insert into salary values('','{$company}','{$_SESSION['clerk']['id']}','{$emp_info['message']['id']}','{$year}','{$month}','{$present}','{$present_val}','{$overtime}','{$overtime_val}','{$allowance}','{$other_allowance}','{$gross_salary}','{$advance}','{$other_deduction}','{$total_deduction}','{$salary_to_be_paid}',(current_timestamp))");
											
											if($q){
													
													echo json_encode(array("status"=>"success","message"=>"Salary added for Employee : {$emp_info['message']['name']}"));
											}else{
													echo json_encode(array("status"=>"error","message"=>"An error occurred while creating salary"));
											}
											
											
											
											
									
								}else{
									
										echo json_encode(array("status"=>"error","message"=>$emp_info['message']));
									
								}
							
						}else{
							
								echo json_encode(array("status"=>"error","message"=>"All fields required"));
							
						}
						
						
						
					
					break;
					
					case "salary_years":
					
						$company = trim(@$_REQUEST['company']);
						$company = $member->ret_by("company","salt",$company,"id");
						
						$q = mysql_query("select distinct year from salary where company={$company} and created_by='{$_SESSION['clerk']['id']}'");
						
						if(mysql_num_rows($q)){
							?>
								<label>Year*</label>
								<select onchange="get_salary('months')" type="text" class="form-control" id="view_salary_years">
									<option value=""></option>
								
							<?php
								while($result = mysql_fetch_assoc($q)){
											
											?>
												<option value="<?php echo $result['year']; ?>"><?php echo $result['year']; ?></option>
											<?php 
											
								}
						?>
						
								</select>
							
						<?php						
						}else{
						
						}
					
					break;
					
					case "salary_months":
					
						$company = trim(@$_REQUEST['company']);
						$company = $member->ret_by("company","salt",$company,"id");
						$year = trim(@$_REQUEST['year']);
						
						$q = mysql_query("select distinct month from salary where company={$company} and created_by='{$_SESSION['clerk']['id']}' and year={$year}");
						
						if(mysql_num_rows($q)){
							?>
								<label>Month*</label>
								<select onchange="get_salary('view_stored_sheet')" type="text" class="form-control" id="view_salary_months">
									<option value=""></option>
								
							<?php
								while($result = mysql_fetch_assoc($q)){
											
											?>
												<option value="<?php echo $result['month']; ?>"><?php echo date('F', mktime(0,0,0,$result['month'], 1, date('Y'))); ?></option>
											<?php 
											
								}
						?>
						
								</select>
							
						<?php						
						}else{
						
						}
					
					break;
					
					case "view_stored_sheet":
					
						$company = trim(@$_REQUEST['company']);
						$company = $member->ret_by("company","salt",$company,"id");
						$year = trim(@$_REQUEST['year']);
						$month = trim(@$_REQUEST['month']);
						
						$q = mysql_query("select * from employee where company={$company} and created_by='{$_SESSION['clerk']['id']}'");
						
						if(mysql_num_rows($q)){
							
								?>
								
								<div class="panel-body">
										<span id='notify'></span>
										<!--Table Wrapper Start-->
										<div class="table-responsive ls-table">
											<table class="table table-bordered">
												<thead>
												<tr>
													<th><strong>#</strong></th>
													<th><strong>Name</strong></th>
													<th><strong>Basic Salary</strong></th>
													<th><strong>Present</strong></th>
													<th><strong>Present R.O</strong></th>
													<th><strong>O.time</strong></th>
													<th><strong>O.time R.O</strong></th>
													<th><strong>Allowance</strong></th>
													<th><strong>Other Allowance</strong></th>
													<th><strong>Gross Salary</strong></th>
													<th><strong>Adv.Ded</strong></th>
													<th><strong>Other Ded.</strong></th>
													<th><strong>Total Ded.</strong></th>
													<th><strong>Salary to be Paid</strong></th>
												</tr>
												</thead>
												<tbody>
							<?php
							$count=1;
							while($result = mysql_fetch_assoc($q)){
								
									?>
												<tr>
													<td><?php echo $count;$count++;?></td>
													<td><?php echo $result['name']; ?></td>
													<td><?php echo $result['basic_salary']; ?></td>
													<?php 
														$member->ret_salary_sheet($company,$result['id'],$year,$month);
													?>
													
												</tr>
									
									<?php
							
							}
							?>
							   </tbody>
											</table>
										</div>
										<!--Table Wrapper Finish-->
									</div>
								
								<?php 
							
						}else{
						
						}
					
					break;
			
	}
	

}else{
	
		echo json_encode(array("status"=>"error","message"=>"Parameters Missing"));
	
}

}

?>