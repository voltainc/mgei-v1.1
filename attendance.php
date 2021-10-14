<?php require_once('assets/funcs.php');
$obj = new main();
$obj->check_sesh("clerk",array("pass"=>NULL,"fail"=>"../clerk"));
$obj->connect_db();
$member = new member();
$static = new static_content;

if(isset($_POST['change_period'])){
	
	$month = $_POST['month'];
	$month_name = date('F', mktime(0,0,0,$month, 1, date('Y')));
	$year = $_POST['year'];
	$interval = array("month"=>array("name"=>$month_name,"value"=>$month),"year"=>$year);
}

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<?php 
		
		echo $static->head("inner");
?>
<link rel="stylesheet" type="text/css" href="assets/css/css/jquery.datepick.css"> 


<body class="">
<!--Navigation Top Bar Start-->
<?php 
	
		echo $static->nav("inner");
	
?>
<!--Navigation Top Bar End-->
<section id="main-container">

<!--Left navigation section start-->
<?php echo $static->sidebar("attendance");?>
<!--Left navigation section end-->


<!--Page main section start-->
<section id="min-wrapper">
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="ls-top-header"><i class='fa fa-bank'></i> Payroll <i class='fa fa-angle-double-right'></i> Attendance (الحضور) </h3>

                   <ol class="breadcrumb">
                        <li><a href="javascript:void(0)"><i class="fa fa-home"></i></a></li>
                        <li><a href='dashboard'>Dashboard</a></li>
                        <li><a href='company'>Company</a></li>
                        <li><a href='employee'>Employee</a></li>
						<li><a href='vehicle'>Vehicle</a></li>
                        <li class="active">Payroll <i class='fa fa-angle-double-right'></i> Attendance</li>
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
                                            <label>Select Company (اختر شركة) </label>
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
                                        <li class="active"><a href="#create" data-toggle="tab"><i class="fa fa-plus-circle"></i> <span>Create (خلق) </span></a></li>
                                        <li onclick="refresh_view_attendance_years()" ><a href="#view" data-toggle="tab"><i class="fa fa-search"></i> <span>View (رأي) </span></a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content tab-border">
                                        <div class="tab-pane fade in active" id="create">
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
										<form method="POST">
										<div class='col-md-5'>
											<div class="form-group">
												<label>Select Month (اختر الشهر) </label>
												<select id="months" name="month"  type="text" class="form-control">
													
													<?php 
														if(isset($interval)){echo "<option value='{$interval['month']['value']}'>{$interval['month']['name']}</option>";}
														 for ($m=1; $m<=12; $m++) {
														 if(isset($interval) and $m==$interval['month']['value']){}else{
														 $month = date('F', mktime(0,0,0,$m, 1, date('Y')));
														 ?>
															<option value="<?php echo $m;?>"><?php echo $month;?></option>
														 <?php
														 }
														}
													?>
												</select>
											</div>
										</div>
										<div class='col-md-5'>
											<div class="form-group">
												<label>Select Year (اختر سنة) </label>
												<select id="years" name="year" type="text" class="form-control">
													
													<?php 
													
														if(isset($interval)){
														
															echo "<option value='{$interval['year']}'>{$interval['year']}</option>";
															
															$start = 1990;
															$current = (int)date("Y");
															for($i=$start;$i<=$current;$i++){
																
																if($i!=$interval['year']){
																	echo "<option value='{$i}'>{$i}</option>";
																}
															
															}
														
														
														}else{
													
															$start = 1990;
															$current = (int)date("Y");
															for($i=$start;$i<=$current;$i++){
															
																echo "<option value='{$i}'>{$i}</option>";
															
															}
															
														}
														
													?>
												</select>
											</div>
										</div>
										<div class='col-md-2'>
										<div class="form-group">
												<label>               </label>
													<button name="change_period" type="submit" class="btn btn-primary">Change (تغيير) </button>
											</div>
										</div>
										 </form>
										
								</div>
										<div class="col-md-12">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title"><i class='fa fa-cog'></i> Summary (ملخص) </h3>
												</div>
												<div class="panel-body">
													<!--Table Wrapper Start-->
													<div class="table-responsive ls-table">
														<table class="table">
															<thead>
															<tr>
																<th class='text-center'><b>#</b></th>
																<th class='text-center'><b>Staff ID (هوية الموظفين) </b></th>
																<th class='text-center'><b>Name (اسم) </b></th>
																<th class='text-center'><b>Days (أيام) </b></th>
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
																			<td class="text-center"><input name="mutlidates" id="<?php echo $result['id'];?>" class="form-control"/><span id="notify_<?php echo $result['id']?>"></span></td>
																			
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
											<button onclick="create_attendance()" class='btn btn-success full-width'><i class='fa fa-check-circle'></i> Create (خلق) </button>
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
                                        <div class="tab-pane fade" id="view">
                                        <div class='row'>
										<div class="col-md-12">
										<div class='col-md-5'>
											<div class="form-group">
												<label>Select Year (اختر سنة) </label>
												<span id="refresh_view_attendance_years"></span>
											</div>
										</div>
										<div class='col-md-5'>
											<div class="form-group">
												<label>Select Month (اختر الشهر) </label>
													<span id="months_view_container"><input type='text' class='form-control' disabled="disabled" placeholder='Select Year to enable this field' /></span>
											</div>
										</div>
										
										<div class='col-md-2'>
										<div class="form-group">
												<label>Action (إجراء) </label>
													<button onclick="view_attendance()" type="submit" class="btn btn-primary">View (رأي) </button>
											</div>
										</div>
										
										</div>
										</div>
										<div class='row'>
											<div id="view_attendance" class='col-md-12'>
												
											</div>
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
<script type="text/javascript" src="assets/js/js/jquery.plugin.js"></script> 
<script type="text/javascript" src="assets/js/js/jquery.datepick.js"></script>
<script>
$(document).ready( function () {
	
	var years_selec = $("#years").val();
	var months_selec = $("#months").val();
	var days_selec = "1";
	
	var selected_period = ""+years_selec+"-"+months_selec+"-"+days_selec+"";
	
	$("input[name='mutlidates']").datepick({ 
    dateFormat:'yyyy-mm-dd',multiSelect: 31,changeMonth: false, prevText: '',nextText:'',todayText:'',useMouseWheel: false,defaultDate: selected_period});
	
} );
</script>
<!--Layout Script End -->
</body>

</html>