<?php require_once('assets/funcs.php');
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
<?php echo $static->sidebar("salary");?>
<!--Left navigation section end-->


<!--Page main section start-->
<section id="min-wrapper">
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="ls-top-header"><i class='fa fa-bank'></i> Payroll <i class='fa fa-angle-double-right'></i> Salary</h3>

                   <ol class="breadcrumb">
                        <li><a href="javascript:void(0)"><i class="fa fa-home"></i></a></li>
                        <li><a href='dashboard'>Dashboard</a></li>
                        <li><a href='company'>Company</a></li>
                        <li><a href='employee'>Employee</a></li>
						<li><a href='vehicle'>Vehicle</a></li>
                        <li class="active">Payroll <i class='fa fa-angle-double-right'></i> Salary</li>
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
								
                     <div class="row">
						<div class='col-md-12'>
                                <div class="panel-body">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs nav-justified icon-tab">
                                        <li onclick="refresh_view_attendance_years()" class="active"><a href="#create" data-toggle="tab"><i class="fa fa-plus-circle"></i> <span>Create</span></a></li>
                                        <li ><a onclick="get_salary('years')" href="#view" data-toggle="tab"><i class="fa fa-search"></i> <span>View</span></a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content tab-border">
                                        <div class="tab-pane fade in active" id="create">
                                           <div class='row'>
										<div class="col-md-12">
										<div class='col-md-5'>
											<div class="form-group">
												<label>Select Year</label>
												<span id="refresh_view_attendance_years"></span>
											</div>
										</div>
										<div class='col-md-5'>
											<div class="form-group">
												<label>Select Month</label>
													<span id="months_view_container"><input type='text' class='form-control' disabled="disabled" placeholder='Select Year to enable this field' /></span>
											</div>
										</div>
										
										<div class='col-md-2'>
										<div class="form-group">
												<label>Action</label>
													<button onclick="salary('sheet')" type="submit" class="btn btn-primary">&nbsp;Salary Sheet&nbsp;</button>
											</div>
										</div>
										
										</div>
										</div>
										<div class='row'>
											<div id="sheet" class='col-md-12'>
												
											</div>
										</div>
                                        </div>
                                        <div class="tab-pane fade" id="view">
												<div class='row'>
														
															<div class='col-md-12'>
																
																	<div class='col-md-6' id="salary_view_years"></div>
																	<div class='col-md-6' id="salary_view_months"></div>
																
															</div>
															<div class='col-md-12' id="salary_sheet_results"></div>
														
												</div>
										</div>
                                    </div>

                                </div>
                        </div>
					</div>
        </div>
    </div>



</section>

</section>

<?php 
		
		echo $static->jslib("inner");
?>
<script>refresh_view_attendance_years();</script>
<!--Layout Script End -->
</body>

</html>