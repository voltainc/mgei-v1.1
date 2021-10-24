<?php
session_start();
class main{
	#Initializing Session#
	function check_sesh($session,$args){
		
			if(isset($_SESSION[$session])){
				
				$act = "pass";
				
			}else{
				
				$act = "fail";
			
			}
		
		
				switch($act){
				
					
					case "pass":
						
						if(!empty($args['pass'])){
						
						header("location:{$args['pass']}");
						exit();
						
						}
						
					break;
					
					case "fail":
						
						if(!empty($args['fail'])){
						
						header("location:{$args['fail']}");
						exit();
						}
						
					break;
					
					
					default:
						
						header("location:logout");
						exit();
					
					break;
				
				
				
				}
				
		
	}
	
	function create_sesh($session,$arg){
	
				$_SESSION[$session['sesh']]=$session['value'];
				$this->register_login("clerk");
				header("location:$arg");
				exit();
	
	}
	
	
	
		
	function connect_db(){
		
		#live
		// $host = "localhost";
		// $user = "majanghm_invent";
		// $db = "majanghm_inventory";
		// $pass = "wiperdex123";
		
		#local
		$host = "localhost";
		$user = "root";
		$db = "mgei-v1.1";
		$pass = "";
		
		
		mysql_connect($host,$user,$pass);
		
		
		if(mysql_select_db($db)){
		
		}else{
			header("location:down");
		}
	}
	
	function register_login($arg){
	
			switch($arg){
			
				
				case "clerk":
							
							$ip = $_SERVER["REMOTE_ADDR"];
							mysql_query("insert into punchcard values('','{$_SESSION['clerk']['id']}','{$ip}','clerk',(current_timestamp))");
	
				break;
			
			
			}
			
	
	}	
}

class static_content{
		
					
					function head($arg){
					
								switch($arg){
									
									
									case "inner":
									
										
										return 
										"
											
										<head>
											<meta charset='utf-8'>
											<meta http-equiv='X-UA-Compatible' content='IE=edge'>
											<meta name='description' content=''>
											<meta name='author' content='voltainc'>

											<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />

											<!-- Viewport metatags -->
											<meta name='HandheldFriendly' content='true' />
											<meta name='MobileOptimized' content='320' />
											<meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' />

											<!-- iOS webapp metatags -->
											<meta name='apple-mobile-web-app-capable' content='yes' />
											<meta name='apple-mobile-web-app-status-bar-style' content='black' />

											<!-- iOS webapp icons -->
											<link rel='apple-touch-icon-precomposed' href='assets/images/ios/fickle-logo-72.png' />
											<link rel='apple-touch-icon-precomposed' sizes='72x72' href='assets/images/ios/fickle-logo-72.png' />
											<link rel='apple-touch-icon-precomposed' sizes='114x114' href='assets/images/ios/fickle-logo-114.png' />

											<!-- TODO: Add a favicon -->
											<link rel='shortcut icon' href='assets/images/ico/fab3860.ico?v=1'>

											<title>IMS</title>

											<!--Page loading plugin Start -->
											<link rel='stylesheet' href='assets/css/plugins/pace.css'>
											<script src='assets/js/pace.min.js'></script>
											<!--Page loading plugin End   -->

											<!-- Plugin Css Put Here -->
											<link href='assets/css/bootstrap.min.css' rel='stylesheet'>

											<!-- Plugin Css End -->
											<!-- Custom styles Style -->
											<link href='assets/css/style.css' rel='stylesheet'>
											<!-- Custom styles Style End-->

											<!-- Responsive Style For-->
											<link href='assets/css/responsive.css' rel='stylesheet'>
											<!-- Responsive Style For-->

											<!-- Custom styles for this template -->
											<link rel='stylesheet' href='assets/css/plugins/selectize.bootstrap3.css'>
											<link rel='stylesheet' href='assets/css/plugins/icheck/skins/all.css'>
											<!-- Datatables -->

											<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
											<!--[if lt IE 9]>
											<script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'></script>
											<script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'></script>
											<![endif]-->
											<link rel='stylesheet' href='assets/css/datatables/jquery.dataTables.css'>
											
											<!--datepicker-->
											<link rel='stylesheet' href='assets/css/jquery.datetimepicker.css'>
										</head>
										
										";
										
									
									break;
									
									
									case "tabletools":
									
												
												return 
										"
										<link rel='stylesheet' href='assets/js/tabletools/buttons.dataTables.min.css' />
										";
									
									break;
									
								
									default:
										return NULL;
									break;
								
								
								}
								
					
					
					}
					
					
					function nav($arg){
					
								
								
								switch($arg){
										
										
										case "inner":
											
											
													$content = 
													
													"
															<nav class='navigation'>
															<div class='container-fluid'>
															<!--Logo text start-->
															<div class='header-logo'>
																<a href='dashboard' title=''>
																	<h1>IMS</h1>
																</a>
															</div>
															<!--Logo text End-->
															<div class='top-navigation'>
															<!--Collapse navigation menu icon start -->
															<div class='menu-control hidden-xs'>
																<a href='javascript:void(0)'>
																	<i class='fa fa-bars'></i>
																</a>

															</div>
															<!--<div class='search-box'>
																<ul>
																	<li class='dropdown'>
																		<a class='dropdown-toggle' data-toggle='dropdown' href='javascript:void(0)'>
																			<span class='fa fa-search'></span>
																		</a>
																		<div class='dropdown-menu  top-dropDown-1'>
																			<h4>Search</h4>
																			<form>
																				<input type='search' placeholder='what you want to see ?'>
																			</form>
																		</div>

																	</li>
																</ul>
															</div>-->

															<!--Collapse navigation menu icon end -->
															<!--Top Navigation Start-->

															<ul>
																<li class='dropdown'>
																	<!--All task drop down start-->
																	<!--<a class='dropdown-toggle' data-toggle='dropdown' href='javascript:void(0)'>
																		<span class='fa fa-tasks'></span>
																		<span class='badge badge-lightBlue'>3</span>
																	</a>
																	<div class='dropdown-menu right top-dropDown-1'>
																		<h4>All Task</h4>
																		<ul class='goal-item'>
																			<li>
																				<a href='javascript:void(0)'>
																					<div class='goal-user-image'>
																						<img class='rounded' src='assets/images/userimage/avatar3-80.png' alt='user image' />
																					</div>
																					<div class='goal-content'>
																						Wordpress Theme
																						<div class='progress progress-striped active'>
																							<div class='progress-bar ls-light-blue-progress six-sec-ease-in-out' aria-valuetransitiongoal='100'></div>
																						</div>
																					</div>
																				</a>
																			</li>
																			<li>
																				<a href='javascript:void(0)'>
																					<div class='goal-user-image'>
																						<img class='rounded' src='assets/images/userimage/avatar2-80.png' alt='user image' />
																					</div>
																					<div class='goal-content'>
																						PSD Designe
																						<div class='progress progress-striped active'>
																							<div class='progress-bar ls-red-progress six-sec-ease-in-out' aria-valuetransitiongoal='40'></div>
																						</div>
																					</div>
																				</a>
																			</li>
																			<li>
																				<a href='javascript:void(0)'>
																					<div class='goal-user-image'>
																						<img class='rounded' src='assets/images/userimage/avatar1-80.png' alt='user image' />
																					</div>
																					<div class='goal-content'>
																						Wordpress PLugin
																						<div class='progress progress-striped active'>
																							<div class='progress-bar ls-light-green-progress six-sec-ease-in-out' aria-valuetransitiongoal='60'></div>
																						</div>
																					</div>
																				</a>
																			</li>
																			<li class='only-link'>
																				<a href='javascript:void(0)'>View All</a>
																			</li>
																		</ul>
																	</div>-->
																	<!--All task drop down end-->
																</li>
																<!--<li class='dropdown'>
																	<a class='dropdown-toggle' data-toggle='dropdown' href='javascript:void(0)'>
																		<span class='fa fa-bell-o'></span>
																		<span class='badge badge-red'>6</span>
																	</a>

																	<div class='dropdown-menu right top-notification'>
																		<h4>Notification</h4>
																		<ul class='ls-feed'>
																			<li>
																				<a href='javascript:void(0)'>
																									<span class='label label-red'>
																										<i class='fa fa-check white'></i>
																									</span>
																					You have 4 pending tasks.
																					<span class='date'>Just now</span>
																				</a>
																			</li>
																			<li>
																				<a href='javascript:void(0)'>
																									<span class='label label-light-green'>
																										<i class='fa fa-bar-chart-o'></i>
																									</span>
																					Finance Report for year 2013
																					<span class='date'>30 min</span>
																				</a>
																			</li>
																			<li>
																				<a href='javascript:void(0)'>
																									<span class='label label-lightBlue'>
																										<i class='fa fa-shopping-cart'></i>
																									</span>
																					New order received with
																					<span class='date'>45 min</span>
																				</a>
																			</li>
																			<li>
																				<a href='javascript:void(0)'>
																									<span class='label label-lightBlue'>
																										<i class='fa fa-user'></i>
																									</span>
																					5 pending membership
																					<span class='date'>50 min</span>
																				</a>
																			</li>
																			<li>
																				<a href='javascript:void(0)'>
																									<span class='label label-red'>
																										<i class='fa fa-bell'></i>
																									</span>
																					Server hardware upgraded
																					<span class='date'>1 hr</span>
																				</a>
																			</li>
																			<li>
																				<a href='javascript:void(0)'>
																									<span class='label label-blue'>
																										<i class='fa fa-briefcase'></i>
																									</span>
																					IPO Report for
																					<span class='lightGreen'>2014</span>
																					<span class='date'>5 hrs</span>
																				</a>
																			</li>
																			<li class='only-link'>
																				<a href='javascript:void(0)'>View All</a>
																			</li>
																		</ul>
																	</div>
																</li>-->
																<!--<li class='dropdown'>
																	
																	<a class='dropdown-toggle' data-toggle='dropdown' href='javascript:void(0)'>
																		<span class='fa fa-envelope-o'></span>
																		<span class='badge badge-red'>3</span>
																	</a>

																	<div class='dropdown-menu right email-notification'>
																		<h4>Email</h4>
																		<ul class='email-top'>
																			<li>
																				<a href='javascript:void(0)'>
																					<div class='email-top-image'>
																						<img class='rounded' src='assets/images/userimage/avatar3-80.png' alt='user image' />
																					</div>
																					<div class='email-top-content'>
																						John Doe <div>Sample Mail 1</div>
																					</div>
																				</a>
																			</li>
																			<li>
																				<a href='javascript:void(0)'>
																					<div class='email-top-image'>
																						<img class='rounded' src='assets/images/userimage/avatar2-80.png' alt='user image' />
																					</div>
																					<div class='email-top-content'>
																						John Doe <div>Sample Mail 2</div>
																					</div>
																				</a>
																			</li>
																			<li>
																				<a href='javascript:void(0)'>
																					<div class='email-top-image'>
																						<img class='rounded' src='assets/images/userimage/avatar1-80.png' alt='user image' />
																					</div>
																					<div class='email-top-content'>
																						John Doe <div> Sample Mail 4</div>
																					</div>
																				</a>
																			</li>
																			<li class='only-link'>
																				<a href='mail.html'>View All</a>
																			</li>
																		</ul>
																	</div>-->
																	
																</li>
																<!--<li class='hidden-xs'>
																	<a class='right-sidebar' href='javascript:void(0)'>
																		<i class='fa fa-comment-o'></i>
																	</a>
																</li>
																<li class='hidden-xs'>
																	<a class='right-sidebar-setting' href='javascript:void(0)'>
																		<i class='fa fa-cogs'></i>
																	</a>
																</li>
																<li>
																	<a href='lock-screen.html'>
																		<i class='fa fa-lock'></i>
																	</a>
																</li>-->
																<li>
																	<a href='logout?act=factory'>
																		<i class='fa fa-power-off'></i>
																	</a>
																</li>

															</ul>
															<!--Top Navigation End-->
															</div>
															</div>
															</nav>
																
																
													";
											return $content;
											
										break;
										
										case "inner-wh":
											
											
													$content = 
													
													"
															<nav class='navigation'>
															<div class='container-fluid'>
															<!--Logo text start-->
															<div class='header-logo'>
																<a href='dashboard' title=''>
																	<h1>IMS</h1>
																</a>
															</div>
															<!--Logo text End-->
															<div class='top-navigation'>
															<!--Collapse navigation menu icon start -->
															<div class='menu-control hidden-xs'>
																<a href='javascript:void(0)'>
																	<i class='fa fa-bars'></i>
																</a>

															</div>
															<!--<div class='search-box'>
																<ul>
																	<li class='dropdown'>
																		<a class='dropdown-toggle' data-toggle='dropdown' href='javascript:void(0)'>
																			<span class='fa fa-search'></span>
																		</a>
																		<div class='dropdown-menu  top-dropDown-1'>
																			<h4>Search</h4>
																			<form>
																				<input type='search' placeholder='what you want to see ?'>
																			</form>
																		</div>

																	</li>
																</ul>
															</div>-->

															<!--Collapse navigation menu icon end -->
															<!--Top Navigation Start-->

															<ul>
																<li class='dropdown'>
																	<!--All task drop down start-->
																	<!--<a class='dropdown-toggle' data-toggle='dropdown' href='javascript:void(0)'>
																		<span class='fa fa-tasks'></span>
																		<span class='badge badge-lightBlue'>3</span>
																	</a>
																	<div class='dropdown-menu right top-dropDown-1'>
																		<h4>All Task</h4>
																		<ul class='goal-item'>
																			<li>
																				<a href='javascript:void(0)'>
																					<div class='goal-user-image'>
																						<img class='rounded' src='assets/images/userimage/avatar3-80.png' alt='user image' />
																					</div>
																					<div class='goal-content'>
																						Wordpress Theme
																						<div class='progress progress-striped active'>
																							<div class='progress-bar ls-light-blue-progress six-sec-ease-in-out' aria-valuetransitiongoal='100'></div>
																						</div>
																					</div>
																				</a>
																			</li>
																			<li>
																				<a href='javascript:void(0)'>
																					<div class='goal-user-image'>
																						<img class='rounded' src='assets/images/userimage/avatar2-80.png' alt='user image' />
																					</div>
																					<div class='goal-content'>
																						PSD Designe
																						<div class='progress progress-striped active'>
																							<div class='progress-bar ls-red-progress six-sec-ease-in-out' aria-valuetransitiongoal='40'></div>
																						</div>
																					</div>
																				</a>
																			</li>
																			<li>
																				<a href='javascript:void(0)'>
																					<div class='goal-user-image'>
																						<img class='rounded' src='assets/images/userimage/avatar1-80.png' alt='user image' />
																					</div>
																					<div class='goal-content'>
																						Wordpress PLugin
																						<div class='progress progress-striped active'>
																							<div class='progress-bar ls-light-green-progress six-sec-ease-in-out' aria-valuetransitiongoal='60'></div>
																						</div>
																					</div>
																				</a>
																			</li>
																			<li class='only-link'>
																				<a href='javascript:void(0)'>View All</a>
																			</li>
																		</ul>
																	</div>-->
																	<!--All task drop down end-->
																</li>
																<!--<li class='dropdown'>
																	<a class='dropdown-toggle' data-toggle='dropdown' href='javascript:void(0)'>
																		<span class='fa fa-bell-o'></span>
																		<span class='badge badge-red'>6</span>
																	</a>

																	<div class='dropdown-menu right top-notification'>
																		<h4>Notification</h4>
																		<ul class='ls-feed'>
																			<li>
																				<a href='javascript:void(0)'>
																									<span class='label label-red'>
																										<i class='fa fa-check white'></i>
																									</span>
																					You have 4 pending tasks.
																					<span class='date'>Just now</span>
																				</a>
																			</li>
																			<li>
																				<a href='javascript:void(0)'>
																									<span class='label label-light-green'>
																										<i class='fa fa-bar-chart-o'></i>
																									</span>
																					Finance Report for year 2013
																					<span class='date'>30 min</span>
																				</a>
																			</li>
																			<li>
																				<a href='javascript:void(0)'>
																									<span class='label label-lightBlue'>
																										<i class='fa fa-shopping-cart'></i>
																									</span>
																					New order received with
																					<span class='date'>45 min</span>
																				</a>
																			</li>
																			<li>
																				<a href='javascript:void(0)'>
																									<span class='label label-lightBlue'>
																										<i class='fa fa-user'></i>
																									</span>
																					5 pending membership
																					<span class='date'>50 min</span>
																				</a>
																			</li>
																			<li>
																				<a href='javascript:void(0)'>
																									<span class='label label-red'>
																										<i class='fa fa-bell'></i>
																									</span>
																					Server hardware upgraded
																					<span class='date'>1 hr</span>
																				</a>
																			</li>
																			<li>
																				<a href='javascript:void(0)'>
																									<span class='label label-blue'>
																										<i class='fa fa-briefcase'></i>
																									</span>
																					IPO Report for
																					<span class='lightGreen'>2014</span>
																					<span class='date'>5 hrs</span>
																				</a>
																			</li>
																			<li class='only-link'>
																				<a href='javascript:void(0)'>View All</a>
																			</li>
																		</ul>
																	</div>
																</li>-->
																<!--<li class='dropdown'>
																	
																	<a class='dropdown-toggle' data-toggle='dropdown' href='javascript:void(0)'>
																		<span class='fa fa-envelope-o'></span>
																		<span class='badge badge-red'>3</span>
																	</a>

																	<div class='dropdown-menu right email-notification'>
																		<h4>Email</h4>
																		<ul class='email-top'>
																			<li>
																				<a href='javascript:void(0)'>
																					<div class='email-top-image'>
																						<img class='rounded' src='assets/images/userimage/avatar3-80.png' alt='user image' />
																					</div>
																					<div class='email-top-content'>
																						John Doe <div>Sample Mail 1</div>
																					</div>
																				</a>
																			</li>
																			<li>
																				<a href='javascript:void(0)'>
																					<div class='email-top-image'>
																						<img class='rounded' src='assets/images/userimage/avatar2-80.png' alt='user image' />
																					</div>
																					<div class='email-top-content'>
																						John Doe <div>Sample Mail 2</div>
																					</div>
																				</a>
																			</li>
																			<li>
																				<a href='javascript:void(0)'>
																					<div class='email-top-image'>
																						<img class='rounded' src='assets/images/userimage/avatar1-80.png' alt='user image' />
																					</div>
																					<div class='email-top-content'>
																						John Doe <div> Sample Mail 4</div>
																					</div>
																				</a>
																			</li>
																			<li class='only-link'>
																				<a href='mail.html'>View All</a>
																			</li>
																		</ul>
																	</div>-->
																	
																</li>
																<!--<li class='hidden-xs'>
																	<a class='right-sidebar' href='javascript:void(0)'>
																		<i class='fa fa-comment-o'></i>
																	</a>
																</li>
																<li class='hidden-xs'>
																	<a class='right-sidebar-setting' href='javascript:void(0)'>
																		<i class='fa fa-cogs'></i>
																	</a>
																</li>
																<li>
																	<a href='lock-screen.html'>
																		<i class='fa fa-lock'></i>
																	</a>
																</li>-->
																<li>
																	<a href='logout?act=warehouse'>
																		<i class='fa fa-power-off'></i>
																	</a>
																</li>

															</ul>
															<!--Top Navigation End-->
															</div>
															</div>
															</nav>
																
																
													";
											return $content;
											
										break;
								
								
								}
								
					
					
					}
					
					function val_company_esp(){
			
						$q = mysql_query("select * from company");
						if(mysql_num_rows($q)>0){
							return mysql_fetch_assoc($q);
						}else{
							return false;
						}
					}
					function sidebar($menu){
					
						$dashboard=NULL;
						$company=NULL;
						$employee=NULL;
						$vehicle=NULL;
						$expenses=NULL;
						$attendance=NULL;
						$overtime=NULL;
						$salary=NULL;
						$payroll=NULL;
						$voucher=NULL;
						$payment_voucher=NULL;
						$receive_voucher=NULL;
						
						//inv
						
						$inventory=NULL;
						
						//inv-sale
						$inv_sale=NULL;
						$inv_sale_item=NULL;
						$inv_sale_customer=NULL;
						
						//inv-purchase
						$inv_purchase=NULL;
						$inv_purchase_item=NULL;
						$inv_purchase_supplier=NULL;
						$inv_purchase_stock=NULL;
						$inv_purchase_usage=NULL;
						
						
						
						$unit=NULL;
						$item=NULL;
						$grouping=NULL;
						
						//invoice
						
						$invoice=NULL;
						
						//invc-purchase
						$invc_purchase=NULL;
						
						//invc-sale
						
						$sale_grp=NULL;
						
						$invc_sale=NULL;
						$invc_sale_cash=NULL;
						
						$factory = NULL;
						
						$warehouse=NULL;
						
						
						$reports=NULL;
						$exchange=NULL;
						$exchange_wh=NULL;
						$rep_sale_return=NULL;
						$rep_sale_return_wh=NULL;
						$rep_p_l = NULL;
						$rep_p_l_wh = NULL;
						
						
						
						
						
					
						switch($menu){
							
							case "dashboard":
							
								$dashboard="class='active'";
							
							break;
							
							case "company":
							
								$company="class='active'";
							
							break;
							
							case "employee":
							
								$employee="class='active'";
							
							break;
							
							case "vehicle":
							
								$vehicle="class='active'";
							
							break;
							
							case "expenses":
							
								$expenses="class='active'";
							
							break;
							
							case "attendance":
							
								$attendance="class='active'";
								$payroll="class='active'";
							
							break;
							
							case "overtime":
							
								$overtime="class='active'";
								$payroll="class='active'";
							
							break;
							
							case "salary":
							
								$salary="class='active'";
								$payroll="class='active'";
							
							break;
							
							case "payment-voucher":
							
								$payment_voucher="class='active'";
								$voucher="class='active'";
							
							break;
							
							case "receive-voucher":
							
								$receive_voucher="class='active'";
								$voucher="class='active'";
							
							break;
							
							case "receive-voucher":
							
								$receive_voucher="class='active'";
								$voucher="class='active'";
							
							break;
							
							case "grouping":
							
								$grouping="class='active'";
								$inventory="class='active'";
							
							break;
							
							
							//inventory
							case "inv-sale-item":
							
								$inventory="class='active'";
								$inv_sale="class='active'";
								$inv_sale_item="class='active'";
							
							break;
							
							case "inv-sale-customer":
							
								$inventory="class='active'";
								$inv_sale="class='active'";
								$inv_sale_customer="class='active'";
							
							break;
							
							case "inv-purchase-item":
							
								$inventory="class='active'";
								$inv_purchase="class='active'";
								$inv_purchase_item="class='active'";
							
							break;
							
							case "inv-purchase-supplier":
							
								$inventory="class='active'";
								$inv_purchase="class='active'";
								$inv_purchase_supplier="class='active'";
							
							break;
							
							case "inv-purchase-stock":
							
								$inventory="class='active'";
								$inv_purchase="class='active'";
								$inv_purchase_stock="class='active'";
							
							break;
							
							case "inv-purchase-usage":
							
								$inventory="class='active'";
								$inv_purchase="class='active'";
								$inv_purchase_usage="class='active'";
							
							break;
							
							case "inv-unit":
							
								$inventory="class='active'";
								
								$unit="class='active'";
							
							break;
							
							case "inv-grouping":
							
								$inventory="class='active'";
								
								$grouping="class='active'";
							
							break;
							//invoice
							case "invc-purchase":
							
								$invoice="class='active'";
								$invc_purchase="class='active'";
								
							
							break;
							
							case "invc-sale":
							
								$invoice="class='active'";
								$sale_grp="class='active'";
								$invc_sale="class='active'";
								
							
							break;
							
							case "invc-sale-cash":
							
								$invoice="class='active'";
								$sale_grp="class='active'";
								$invc_sale_cash="class='active'";
								
							
							break;
							
							case "inv-wh":
								$inventory="class='active'";
								$warehouse="class='active'";
								
							
							break;
							
							case "rep-exchange":
							
								$reports="class='active'";
								$factory="class='active'";
								$exchange="class='active'";
							
							break;
							
							case "rep-exchange-wh":
							
								$reports="class='active'";
								$warehouse="class='active'";
								$exchange_wh="class='active'";
							
							break;
							
							case "rep-sale-return":
								$reports="class='active'";
								$factory="class='active'";
								$rep_sale_return="class='active'";
							
							break;
							
							case "rep-sale-return-wh":
								$reports="class='active'";
								$warehouse="class='active'";
								$rep_sale_return_wh="class='active'";
							
							break;
							
							
							case "rep-p-l":
							
								$reports="class='active'";
								$factory="class='active'";
								$rep_p_l="class='active'";
							
							break;
							
							case "rep-p-l-wh":
							
								$reports="class='active'";
								$warehouse="class='active'";
								$rep_p_l_wh="class='active'";
							
							break;
							
							
							
						}
						
					$exec = $this->val_company_esp();
					if($exec)
					{
						
						$content = 
						"
						
							<section id='left-navigation'>
							<!--Left navigation user details start-->
							<div class='user-image'>
								<img src='assets/images/userimage/avatar2-80.png' alt=''/>
								<div class='user-online-status'><span class='user-status is-online  '></span> </div>
							</div>
							<!--<ul class='social-icon'>
								<li><a href='javascript:void(0)'><i class='fa fa-facebook'></i></a></li>
								<li><a href='javascript:void(0)'><i class='fa fa-twitter'></i></a></li>
								<li><a href='javascript:void(0)'><i class='fa fa-github'></i></a></li>
								<li><a href='javascript:void(0)'><i class='fa fa-bitbucket'></i></a></li>
							</ul>-->
							<!--Left navigation user details end-->

							<!--Phone Navigation Menu icon start-->
							<div class='phone-nav-box visible-xs'>
								<a class='phone-logo' href='index-2.html' title=''>
									<h1>IMS</h1>
								</a>
								<a class='phone-nav-control' href='javascript:void(0)'>
									<span class='fa fa-bars'></span>
								</a>
								w
							</div>
							<!--Phone Navigation Menu icon start-->

							<!--Left navigation start-->
							<ul class='mainNav'>
							<li>
								<a {$dashboard} href='dashboard'>
									<i class='fa fa-dashboard'></i> <span>Dashboard <small>(بداية)</small></span>
								</a>
							</li>
							<li>
								<a {$company} href='company'>
									<i class='fa fa-building-o'></i> <span>Company <small>(شركة)</small></span>
								</a>
							</li>
							<li>
								<a {$employee} href='employee'>
									<i class='fa fa-user'></i> <span>Employee <small>(عامل)</small></span>
								</a>
							</li>
							<li>
								<a {$vehicle} href='vehicle'>
									<i class='fa fa-car'></i> <span>Vehicle <small>(مركبة)</small></span>
								</a>
							</li>
							<li>
								<a {$expenses} href='expenses'>
									<i class='fa fa-money'></i> <span>Expenses <small>(نفقات)</small></span>
								</a>
							</li>
							<li {$payroll}>
							<a href='#'>
								<i class='fa fa-bank'></i>
								<span>Payroll <small>(كشف الرواتب)</small></span>
							</a>
							<ul>
								<li><a {$attendance} href='attendance'>Attendance <small>(الحضور)</small></a></li>
								<li><a {$overtime} href='overtime'>Overtime <small>(متأخر)</small></a></li>
								<li><a {$salary} href='salary'>Salary <small>(الدخل الفردي)</small></a></li>
							</ul>
						</li>
						<li {$voucher}>
							<a href='#'>
								<i class='fa fa-ticket'></i>
								<span>Voucher <small>(قسيمة)</small></span>
							</a>
							<ul>
								<li><a {$payment_voucher} href='payment-voucher'>Payment Voucher <small>(قسيمة الدفع)</small></a></li>
								<li><a {$receive_voucher} href='receive-voucher'>Receive Voucher <small>(تلقي قسيمة)</small></a></li>
							</ul>
						</li>
						<li {$inventory}>
							<a href='#'>
								<i class='fa fa-codepen'></i>
								<span>Invetnory <small>(المخزون)</small></span>
							</a>
							<ul>
								<li {$inv_sale}>
									<a href='javascript:void(0)'>Sale</a>
								<ul>
									<li><a {$inv_sale_item} href='sale-item'>Item <small>(بند)</small></a></li>
									<li ><a {$inv_sale_customer} href='customer'>Customer <small>(زبون)</small></a></li>
								</ul>
								</li>
								
								<li {$inv_purchase}>
									<a href='javascript:void(0)'>Purchase</a>
								<ul>
									<li><a {$inv_purchase_item} href='purchase-item'>Item <small>(بند)</small></a></li>
									<li ><a {$inv_purchase_supplier} href='supplier'>Supplier <small>(زبون)</small></a></li>
									<li ><a {$inv_purchase_stock} href='purchase-stock'>Stock <small>(مخزون)</small></a></li>
									<li ><a {$inv_purchase_usage} href='purchase-usage'>Usage <small>(استعمال)</small></a></li>
								</ul>
								</li>
								
								<li>
									<a {$unit} href='unit'>
										<i class='fa fa-cog'></i> <span>Unit <small>(وحدة)</small></span>
									</a>
								</li>
								
								<li>
									<a {$grouping} href='grouping'>
										<i class='fa fa-cog'></i> <span>Grouping <small>(تجمع)</small></span>
									</a>
								</li>
								
								<li>
									<a {$warehouse} href='sale-item-wh'>
										<i class='fa fa-cubes'></i> <span>Warehouse <small>(مستودع)</small></span>
									</a>
								</li>
								
								
							</ul>
						</li>
						<li {$invoice}>
							<a href='#'>
								<i class='fa fa-codepen'></i>
								<span>Invoice <small>(فاتورة)</small></span>
							</a>
							<ul>
								<li><a {$invc_purchase} href='purchase'>Purchase <small>(شراء)</small></a></li>
								
								<li {$sale_grp}>
									<a href='#'>
										
										<span>Sale <small>(فاتورة)</small></span>
									</a>
									<ul>	
										
											<li><a {$invc_sale} href='sale'>Credit Sale <small>(بيع)</small></a></li>
											<li><a {$invc_sale_cash} href='sale-cash'>Cash Sale <small>(بيع)</small></a></li>
										
									</ul>
								</li>
								
							</ul>
						</li>

						<li {$reports}>
							<a href='#'>
								<i class='fa fa-book'></i>
								<span>Reports <small>(فاتورة)</small></span>
							</a>
							<ul>
								<li {$factory}>
									<a href='#'>
										<span>Factory <small>(فاتورة)</small></span>
									</a>
									<ul>	
										
											<li><a {$exchange} href='rep-exchange'>Invoices<small>(بيع)</small></a></li>
											<li><a {$rep_sale_return} href='rep-sale-return'>Sale/Return<small>(بيع)</small></a></li>
											<li><a {$rep_p_l} href='rep-p-l'>P/L</a></li>
										
									</ul>
								</li>
								<li {$warehouse}>
									<a href='#'>
										<span>Warehouse <small>(فاتورة)</small></span>
									</a>
									<ul>	
										
											<li><a {$exchange_wh} href='rep-exchange-wh'>Invoices<small>(بيع)</small></a></li>
											<li><a {$rep_sale_return_wh} href='rep-sale-return-wh'>Sale/Return<small>(بيع)</small></a></li>
											<li><a {$rep_p_l_wh} href='rep-p-l-wh'>P/L</a></li>
										
									</ul>
								</li>
								
							</ul>
						</li>
								</ul>
							</li>
							</ul>
							<!--Left navigation end-->
							</section>
						
						";
					}
					else{
						$content = 
						"
						
							<section id='left-navigation'>
							<!--Left navigation user details start-->
							<div class='user-image'>
								<img src='assets/images/userimage/avatar2-80.png' alt=''/>
								<div class='user-online-status'><span class='user-status is-online  '></span> </div>
							</div>
							<!--<ul class='social-icon'>
								<li><a href='javascript:void(0)'><i class='fa fa-facebook'></i></a></li>
								<li><a href='javascript:void(0)'><i class='fa fa-twitter'></i></a></li>
								<li><a href='javascript:void(0)'><i class='fa fa-github'></i></a></li>
								<li><a href='javascript:void(0)'><i class='fa fa-bitbucket'></i></a></li>
							</ul>-->
							<!--Left navigation user details end-->

							<!--Phone Navigation Menu icon start-->
							<div class='phone-nav-box visible-xs'>
								<a class='phone-logo' href='index-2.html' title=''>
									<h1>IMS</h1>
								</a>
								<a class='phone-nav-control' href='javascript:void(0)'>
									<span class='fa fa-bars'></span>
								</a>
							</div>
							<!--Phone Navigation Menu icon start-->

							<!--Left navigation start-->
								<ul class='mainNav'>
									<li>
										<a {$dashboard} href='dashboard'>
											<i class='fa fa-dashboard'></i> <span>Dashboard <small>(بداية)</small></span>
										</a>
									</li>
									<li>
										<a {$company} href='company'>
											<i class='fa fa-building-o'></i> <span>Company <small>(شركة)</small></span>
										</a>
									</li>
								</ul>
								</li>
							</ul>
							<!--Left navigation end-->
							</section>
						
						";
					}
						return $content;
					}
					
					
					function sidebar_wh($menu){
					
						$dashboard=NULL;
						
						//sale
						
						$sale=NULL;
						
						
						
						$credit_sale=NULL;
						$cash_sale=NULL;
						
						//invoice
						$invoice=NULL;
						
					
						switch($menu){
							
							//invoice
							case "dashboard":
							
								$dashboard="class='active'";
								
							
							break;
							
							case "credit-sale":
							
								$sale="class='active'";
								$credit_sale="class='active'";
							
							break;
							
							case "cash-sale":
							
								$sale="class='active'";
								$cash_sale="class='active'";
							
							break;
							
							case "invoice-wh":
							
								$invoice="class='active'";
							
							break;
													
							
						}
								
						$content = 
						"
						
							<section id='left-navigation'>
							<!--Left navigation user details start-->
							<div class='user-image'>
								<img src='assets/images/userimage/avatar2-80.png' alt=''/>
								<div class='user-online-status'><span class='user-status is-online  '></span> </div>
							</div>
							<!--<ul class='social-icon'>
								<li><a href='javascript:void(0)'><i class='fa fa-facebook'></i></a></li>
								<li><a href='javascript:void(0)'><i class='fa fa-twitter'></i></a></li>
								<li><a href='javascript:void(0)'><i class='fa fa-github'></i></a></li>
								<li><a href='javascript:void(0)'><i class='fa fa-bitbucket'></i></a></li>
							</ul>-->
							<!--Left navigation user details end-->

							<!--Phone Navigation Menu icon start-->
							<div class='phone-nav-box visible-xs'>
								<a class='phone-logo' href='index-2.html' title=''>
									<h1>IMS</h1>
								</a>
								<a class='phone-nav-control' href='javascript:void(0)'>
									<span class='fa fa-bars'></span>
								</a>
								w
							</div>
							<!--Phone Navigation Menu icon start-->

							<!--Left navigation start-->
							<ul class='mainNav'>
						<li>
								<a {$dashboard} href='dashboard-wh'>
									<i class='fa fa-dashboard'></i> <span>Dashboard <small>(بداية)</small></span>
								</a>
							</li>
							<li>
								<a {$invoice} href='invoice-wh'>
									<i class='fa fa-dashboard'></i> <span>Invoice <small>(بداية)</small></span>
								</a>
							</li>
							<li {$sale}>
							<a href='#'>
								<i class='fa fa-codepen'></i>
								<span>Sale <small>(فاتورة)</small></span>
							</a>
							<ul>
								<li ><a {$credit_sale} href='sale-wh'>Credit <small>(شراء)</small></a></li>
								<li><a {$cash_sale} href='sale-cash-wh'>Cash <small>(شراء)</small></a></li>
							</ul>
						</li>
							</ul>
							<!--Left navigation end-->
							</section>
						
						";
						return $content;
					}
					
					
					
					function footer($arg){
					
								switch($arg){
									
									
									case "inner":
									
										
										return 
										"
											
											 
											
										";
										
									
									break;
									
									
									case "outer":
									
									break;
									
								
									default:
									return NULL;
									break;
								
								
								}
								
					
					
					}
					
					function jslib($arg){
					
								switch($arg){
									
									
									case "inner":
									
										
										return 
										"
											<script type='text/javascript' src='assets/js/color.js'></script>
											<script type='text/javascript' src='assets/js/lib/jquery-1.11.min.js'></script>
											<script type='text/javascript' src='assets/js/bootstrap.min.js'></script>
											<script type='text/javascript' src='assets/js/multipleAccordion.js'></script>

											<!--easing Library Script Start -->
											<script src='assets/js/lib/jquery.easing.js'></script>
											<!--easing Library Script End -->

											<!--Nano Scroll Script Start -->
											<script src='assets/js/jquery.nanoscroller.min.js'></script>
											<!--Nano Scroll Script End -->

											<!--switchery Script Start -->
											<script src='assets/js/switchery.min.js'></script>
											<!--switchery Script End -->

											<!--bootstrap switch Button Script Start-->
											<script src='assets/js/bootstrap-switch.js'></script>
											<!--bootstrap switch Button Script End-->

											<!--easypie Library Script Start -->
											<script src='assets/js/jquery.easypiechart.min.js'></script>
											<!--easypie Library Script Start -->

											<!--bootstrap-progressbar Library script Start-->
											<script src='assets/js/bootstrap-progressbar.min.js'></script>
											<!--bootstrap-progressbar Library script End-->
											
											<!--datepicker-->
											<script src='assets/js/jquery.datetimepicker.full.min.js'></script>
											
											<!--datatables-->
											<script src='assets/js/datatables/jquery.dataTables.js'></script>
											<!--handler-->
											<script src='assets/js/handler.js'></script>
											
											<script type='text/javascript' src='assets/js/pages/layout.js'></script>
											<script src='assets/js/pages/login.js'></script>
											<script src='assets/js/selectize.min.js'></script>
											<script src='assets/js/pages/selectTag.js'></script>
											<script src='assets/js/icheck.min.js'></script>
											<script src='assets/js/pages/checkboxRadio.js'></script>
											
											 <script>
												$(document).ready( function () {
													$('#datatable').DataTable();
													$( 'input[name=datepicker]' ).datetimepicker({timepicker:false,format:'Y-m-d'});
													$( '.datepicker' ).datetimepicker({timepicker:false,format:'Y-m-d'});
												} );
											 </script>
											 
										";
										
									
									break;
									
									case "inner-wh":
									
										
										return 
										"
											<script type='text/javascript' src='assets/js/color.js'></script>
											<script type='text/javascript' src='assets/js/lib/jquery-1.11.min.js'></script>
											<script type='text/javascript' src='assets/js/bootstrap.min.js'></script>
											<script type='text/javascript' src='assets/js/multipleAccordion.js'></script>

											<!--easing Library Script Start -->
											<script src='assets/js/lib/jquery.easing.js'></script>
											<!--easing Library Script End -->

											<!--Nano Scroll Script Start -->
											<script src='assets/js/jquery.nanoscroller.min.js'></script>
											<!--Nano Scroll Script End -->

											<!--switchery Script Start -->
											<script src='assets/js/switchery.min.js'></script>
											<!--switchery Script End -->

											<!--bootstrap switch Button Script Start-->
											<script src='assets/js/bootstrap-switch.js'></script>
											<!--bootstrap switch Button Script End-->

											<!--easypie Library Script Start -->
											<script src='assets/js/jquery.easypiechart.min.js'></script>
											<!--easypie Library Script Start -->

											<!--bootstrap-progressbar Library script Start-->
											<script src='assets/js/bootstrap-progressbar.min.js'></script>
											<!--bootstrap-progressbar Library script End-->
											
											<!--datepicker-->
											<script src='assets/js/jquery.datetimepicker.full.min.js'></script>
											
											<!--datatables-->
											<script src='assets/js/datatables/jquery.dataTables.js'></script>
											<!--handler-->
											<script src='assets/js/handler-wh.js'></script>
											
											<script type='text/javascript' src='assets/js/pages/layout.js'></script>
											<script src='assets/js/pages/login.js'></script>
											<script src='assets/js/selectize.min.js'></script>
											<script src='assets/js/pages/selectTag.js'></script>
											<script src='assets/js/icheck.min.js'></script>
											<script src='assets/js/pages/checkboxRadio.js'></script>
											
											 <script>
												$(document).ready( function () {
													$('#datatable').DataTable();
													$( 'input[name=datepicker]' ).datetimepicker({timepicker:false,format:'Y-m-d'});
													$( '.datepicker' ).datetimepicker({timepicker:false,format:'Y-m-d'});
												} );
											 </script>
											 
										";
										
									
									break;
									
									
									case "tabletools":
									
												
												
										return 
										"
											<script src='assets/js/tabletools/dataTables.buttons.min.js'></script>
											<script src='assets/js/tabletools/buttons.colVis.min.js'></script>
											<script src='assets/js/tabletools/buttons.flash.min.js'></script>
											<script src='assets/js/tabletools/buttons.html5.min.js'></script>
											<script src='assets/js/tabletools/buttons.print.min.js'></script>
											<script src='assets/js/tabletools/jszip.min.js'></script>
											<script src='assets/js/tabletools/pdfmake.min.js'></script>
											<script src='assets/js/tabletools/vfs_fonts.js'></script>
										";
									
									break;
									
								
									default:
										return NULL;
									break;
								
								
								}
								
					
					
					}
					
		
		
		}

class member{
		
		
	function verify_login($username,$password,$designation){
	
	
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
		
		
		switch($designation){
			
			
			case "clerk":
			
					
					$val = mysql_query("select * from clerk where username='{$username}' and password='{$password}'");
						
						if($val){
						
							
							if(mysql_num_rows($val)>0){
								
								$results = mysql_fetch_assoc($val);
								return array("status"=>"success","message"=>$results);
								
							}else{
									
								return array("status"=>"error","message"=>"invalid username / password");
							}
							
						
						}else{
							
							return array("status"=>"error","message"=>"an error occured while processing, please try later");
							
						}
			
			
			break;
			
			case "clerk-wh":
			
					
					$val = mysql_query("select * from clerk_wh where username='{$username}' and password='{$password}'");
						
						if($val){
						
							
							if(mysql_num_rows($val)>0){
								
								$results = mysql_fetch_assoc($val);
								if($results['status']==true){
									return array("status"=>"success","message"=>$results);
								}else{
									return array("status"=>"error","message"=>"Account disabled/deleted");
								}
								
							}else{
									
								return array("status"=>"error","message"=>"invalid username / password");
							}
							
						
						}else{
							
							return array("status"=>"error","message"=>"an error occured while processing, please try later");
							
						}
			
			
			break;
			
			default:
				
				return array("status"=>"error","message"=>"parameter missing");
			
			break;
			
		}
		
	}
	
	function saltish($tbl,$length) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		
		$q = mysql_query("select salt from ".$tbl."");
		if(mysql_num_rows($q)>0){
		while($result=mysql_fetch_array($q)){
					while($randomString!=$result['salt']){
					return $randomString;

					}
				}
		}else{
		return $randomString;
		}
		}
		
	function create_company($company,$owner,$address,$phone,$prefix,$fax,$cr,$other_gsm){
				
				$q= mysql_query("select * from company where name='{$company}'");
				if(mysql_num_rows($q)>0)
				{
						return array("status"=>"error","message"=>"Company already exists"); 
				}
				else
				{
					$q = mysql_query("select * from company where prefix='{$prefix}'");
					if(mysql_num_rows($q)>0){
						return array("status"=>"error","message"=>"Company prefix unavailable"); 
					}else{
							
							$q = mysql_query("select * from company where cr={$cr}");
							if(mysql_num_rows($q)>0){
								return array("status"=>"error","message"=>"Company CR unavailable"); 
							}else{
								$salt = $this->saltish("company",15);
								$q = mysql_query("insert into company values('','{$company}','{$owner}','{$address}','{$phone}','{$prefix}','{$fax}','{$cr}','{$other_gsm}','{$_SESSION['clerk']['id']}','{$salt}',(current_timestamp))");
								
								if($q)
								{
									header("location:company-detail?salt={$salt}");
								}else{
									return array("status"=>"error","message"=>"Something went wrong while processing your request, please report to <a href='mailto:voltaincx@gmail.com'>admin</a>"); 
								}
							}
							
						}
				}
		
		}
		
		function update_company($company,$owner,$address,$phone,$prefix,$fax,$cr,$other_gsm,$company_id){
				
							$q = mysql_query("select * from company where name='{$company}'and id!={$company_id}");
							if(mysql_num_rows($q)>0){
								return array("status"=>"error","message"=>"Another company with that NAME exists"); 
							}else{
								$q = mysql_query("select * from company where cr='{$cr}' and id!={$company_id}");
									if(mysql_num_rows($q)>0)
									{
										return array("status"=>"error","message"=>"Another company with that CR exists"); 
									}else
									{
									
										$q = mysql_query("select * from company where prefix='{$prefix}' and id!={$company_id}");
										if(mysql_num_rows($q)>0)
										{
											return array("status"=>"error","message"=>"Another company with that COMPANY PREFIX exists"); 
										}else
										{
										
											$q = mysql_query("update company set  name='{$company}',owner='{$owner}',address='{$address}',phone='{$phone}',prefix='{$prefix}',fax='{$fax}',cr='{$cr}',other_gsm='{$other_gsm}' where id={$company_id}");
							
											if($q)
											{
												return array("status"=>"success","message"=>"Company Information Updated"); 
											}else{
												return array("status"=>"error","message"=>"Something went wrong while processing your request, please report to <a href='mailto:voltaincx@gmail.com'>admin</a>"); 
											}
														
										}
													
									}
							}
							
							
							
					
			
		
		}
		
		function redirect($url){
			header("location:{$url}");
			exit();
		}
		
		function val_company($salt){
			
				$q = mysql_query("select * from company where salt='{$salt}'");
				if(mysql_num_rows($q)>0){
					return mysql_fetch_assoc($q);
				}else{
					return false;
				}
			
		}
		function val_company_esp(){
			
				$q = mysql_query("select * from company");
				if(mysql_num_rows($q)>0){
					return mysql_fetch_assoc($q);
				}else{
					return false;
				}
			
		}
		function val_employee($salt){
			
				$q = mysql_query("select * from employee where salt='{$salt}' and created_by='{$_SESSION['clerk']['id']}'");
				if(mysql_num_rows($q)>0){
					return mysql_fetch_assoc($q);
				}else{
					return false;
				}
			
		}
		function val_supplier($salt){
			
				$q = mysql_query("select * from supplier where salt='{$salt}' and created_by='{$_SESSION['clerk']['id']}'");
				if(mysql_num_rows($q)>0){
					return mysql_fetch_assoc($q);
				}else{
					return false;
				}
			
		}
		function val_vehicle($salt){
			
				$q = mysql_query("select * from vehicle where salt='{$salt}' and created_by='{$_SESSION['clerk']['id']}'");
				if(mysql_num_rows($q)>0){
					return mysql_fetch_assoc($q);
				}else{
					return false;
				}
			
		}
		function val_payment_voucher($salt){
			
				$q = mysql_query("select * from payment_voucher where salt='{$salt}' and created_by='{$_SESSION['clerk']['id']}'");
				if(mysql_num_rows($q)>0){
					return mysql_fetch_assoc($q);
				}else{
					return false;
				}
			
		}
		function val_receive_voucher($salt){
			
				$q = mysql_query("select * from receive_voucher where salt='{$salt}' and created_by='{$_SESSION['clerk']['id']}'");
				if(mysql_num_rows($q)>0){
					return mysql_fetch_assoc($q);
				}else{
					return false;
				}
			
		}
		
		
		function create_employee($employee,$company,$passport,$visa_date,$visa_expire,$dob,$joined,$cid,$basic_salary,$designation,$insurance_date,$insurance_expire,$created_by,$salt,$status){
		
			
			$q = mysql_query("select * from employee where passport='{$passport}'");
					if(mysql_num_rows($q)>0){
						
						echo json_encode(array("status"=>"error","message"=>"Employee already exists"));
						
					}else{
					
						$q = mysql_query("insert into employee values('','{$employee}','{$company}','{$passport}','{$visa_date}','{$visa_expire}','{$dob}','{$joined}','{$cid}','{$basic_salary}','{$designation}','{$insurance_date}','{$insurance_expire}','{$created_by}','{$salt}','{$status}',(current_timestamp))");
						if($q){
						
							return json_encode(array("status"=>"success","message"=>"employee created"));
						
						}else{
							return json_encode(array("status"=>"error","message"=>"Something went wrong while processing, please report this to <a href='mailto:voltaincx@gmail.com'>admin</a>"));
						}
					}
			
		
		}
		
		function create_vehicle($company,$model,$registration_number,$malkiya_date,$insurance_date,$color,$value,$malkiya_expire,$insurance_expire,$salt){
		
			
			$q = mysql_query("select * from vehicle where registration_number='{$registration_number}'");
					if(mysql_num_rows($q)>0){
						
						echo json_encode(array("status"=>"error","message"=>"Vehicle with {$registration_number} already exists"));
						
					}else{
					
						$q = mysql_query("insert into vehicle values('','{$company}','{$_SESSION['clerk']['id']}','{$model}','{$registration_number}','{$color}','{$malkiya_date}','{$malkiya_expire}','{$insurance_date}','{$insurance_expire}','{$value}','{$salt}',(current_timestamp))");
						if($q){
						
							return json_encode(array("status"=>"success","message"=>"Vehicle created"));
						
						}else{
							
							return json_encode(array("status"=>"error","message"=>"Something went wrong while processing, please report this to <a href='mailto:voltaincx@gmail.com'>admin</a>"));
							
						}
					}
			
		
		}
		
		function create_supplier($company,$name,$address,$phone,$fax,$email,$supplier_company,$remarks,$salt){
		
			
				$q = mysql_query("insert into supplier values('','{$company}','{$_SESSION['clerk']['id']}','{$name}','{$address}','{$phone}','{$fax}','{$email}','{$supplier_company}','{$remarks}','{$salt}',(current_timestamp))");
						if($q){
						
							return json_encode(array("status"=>"success","message"=>"Supplier created"));
						
						}else{
							
							return json_encode(array("status"=>"error","message"=>"Something went wrong while processing, please report this to <a href='mailto:voltaincx@gmail.com'>admin</a>"));
							
						}
			
		
		}
		
		function create_customer($company,$name,$address,$phone,$fax,$email,$customer_company,$remarks,$salt){
		
			
				$q = mysql_query("insert into customer values('','{$company}','{$_SESSION['clerk']['id']}','{$name}','{$address}','{$phone}','{$fax}','{$email}','{$customer_company}','{$remarks}','{$salt}',true,(current_timestamp))");
						if($q){
						
							return json_encode(array("status"=>"success","message"=>"Customer created"));
						
						}else{
							
							return json_encode(array("status"=>"error","message"=>"Something went wrong while processing, please report this to <a href='mailto:voltaincx@gmail.com'>admin</a>"));
							
						}
			
		
		}
		function create_unit($company,$name){
		
			
				$q = mysql_query("insert into unit values('','{$company}','{$_SESSION['clerk']['id']}','{$name}',true,(current_timestamp))");
						if($q){
						
							return json_encode(array("status"=>"success","message"=>"Unit created"));
						
						}else{
							
							return json_encode(array("status"=>"error","message"=>"Something went wrong while processing, please report this to <a href='mailto:voltaincx@gmail.com'>admin</a>"));
							
						}
			
		
		}
		function create_item($company,$name,$quantity,$unit,$price_per_unit){
		
			
				$q = mysql_query("insert into item values('','{$company}','{$_SESSION['clerk']['id']}','{$name}','{$quantity}','{$unit}','{$price_per_unit}',(current_timestamp))");
						if($q){
						
							return json_encode(array("status"=>"success","message"=>"Item created"));
						
						}else{
							
							return json_encode(array("status"=>"error","message"=>"Something went wrong while processing, please report this to <a href='mailto:voltaincx@gmail.com'>admin</a>"));
							
						}
			
		
		}
		
		
		function create_payment_voucher($company,$payment_method,$pv_number,$issue_date,$issue_to,$cash_amount,$bank,$cheque_number,$cheque_amount,$cheque_date,$description,$salt){
		
			
			$q = mysql_query("select * from payment_voucher where pv_number='{$pv_number}' and company={$company}");
					if(mysql_num_rows($q)>0){
						
						echo json_encode(array("status"=>"error","message"=>"Voucher with {$pv_number} already exists"));
						
					}else{
					
						$q = mysql_query("insert into payment_voucher values('','{$company}','{$_SESSION['clerk']['id']}','{$payment_method}','{$pv_number}','{$issue_date}','{$issue_to}','{$cash_amount}','{$bank}','{$cheque_number}','{$cheque_amount}','{$cheque_date}','{$description}','{$salt}',(current_timestamp))");
						if($q){
						
							return json_encode(array("status"=>"success","message"=>"Voucher created"));
						
						}else{
							
							return json_encode(array("status"=>"error","message"=>"Something went wrong while processing, please report this to <a href='mailto:voltaincx@gmail.com'>admin</a>"));
							
						}
					}
			
		
		}
		
		function create_receive_voucher($company,$payment_method,$rv_number,$issue_date,$issue_from,$cash_amount,$bank,$cheque_number,$cheque_amount,$cheque_date,$description,$salt){
		
			
			$q = mysql_query("select * from receive_voucher where pv_number='{$rv_number}' and company={$company}");
					if(mysql_num_rows($q)>0){
						
						echo json_encode(array("status"=>"error","message"=>"Voucher with {$rv_number} already exists"));
						
					}else{
					
						$q = mysql_query("insert into receive_voucher values('','{$company}','{$_SESSION['clerk']['id']}','{$payment_method}','{$rv_number}','{$issue_date}','{$issue_from}','{$cash_amount}','{$bank}','{$cheque_number}','{$cheque_amount}','{$cheque_date}','{$description}','{$salt}',(current_timestamp))");
						if($q){
						
							return json_encode(array("status"=>"success","message"=>"Voucher created"));
						
						}else{
							
							return json_encode(array("status"=>"error","message"=>"Something went wrong while processing, please report this to <a href='mailto:voltaincx@gmail.com'>admin</a>"));
							
						}
					}
			
		
		}
		
		function create_bank_account($name,$address,$account,$company,$created_by,$salt){
		
			
			$q = mysql_query("select * from bank_account where account='{$account}'");
					if(mysql_num_rows($q)>0){
						
						echo json_encode(array("status"=>"error","message"=>"Account already exists"));
						
					}else{
					
						$q = mysql_query("insert into bank_account values('','{$name}','{$address}','{$account}','{$company}','{$created_by}','{$salt}',(current_timestamp))");
						if($q){
						
							return json_encode(array("status"=>"success","message"=>"account created"));
						
						}else{
							return json_encode(array("status"=>"error","message"=>"Something went wrong while processing, please report this to <a href='mailto:voltaincx@gmail.com'>admin</a>"));
						}
					}
			
		
		}
		
		function crud($arr){
				
				
			 switch($arr['act']){
				 
					
					
					
					case "insert":
						
						$fields = array_keys($arr['fields']);
						$sql = "INSERT INTO ".$arr['table']."
						(`".implode('`,`', $fields)."`)
						VALUES('".implode("','", $arr['fields'])."')";
						if(mysql_query($sql)){
							return mysql_insert_id();
						}
					break;
					
					case "update":
						$result =NULL;
						foreach ($arr['fields'] as $key => $value) {
						  $result .= "$key = '{$value}',";
						}
						$result = rtrim($result,',');
						$sql = "UPDATE ".$arr['table']." set
						{$result}
						where id={$arr['id']}";
						
						if(mysql_query($sql)){
							return true;
						}
					break;
			 }
		}
		
		// function invoice($arr){
			
			// switch($arr['act']){
				
				// case "purchase_invoice":
					
					
					// $insert = $this->crud(array("act"=>"insert","table"=>"purchase_invoice","fields"=>$arr['payload']));
					
					// $current_qty = $this->ret_by("item","id",$arr['payload']['item'],"quantity");
					
					// $qty = $arr['payload']['qty']+$current_qty;
					
					// $update = $this->crud(array("act"=>"update","table"=>"item","fields"=>["quantity"=>$qty],"id"=>$arr['payload']['item']));
					
						
					
				// break;
			
			// }
		// }
		
		function count_employee($company){
		
			$q= mysql_query("select * from employee where created_by='{$_SESSION['clerk']['id']}' and company='{$company}'");
			
			return mysql_num_rows($q);
		
		}
		
		function count_bank_account($company){
		
			$q= mysql_query("select * from bank_account where created_by='{$_SESSION['clerk']['id']}' and company='{$company}'");
			
			return mysql_num_rows($q);
		
		}
		function ret_by($tbl,$entity,$attr,$return){
		
			$q = mysql_query("select * from ".$tbl." where ".$entity."='".$attr."'");
			if(mysql_num_rows($q)>0){ 
			
			$result = mysql_fetch_assoc($q);
			return $result[$return];
			
			
			}else{
			
			
			
			return "X(O";
			}
		
		}
		
		function ret_salary($emp_id,$month,$year){
				$q = mysql_query("select * from salary where employee='{$emp_id}' and month='{$month}' and year='{$year}'");
				if(mysql_num_rows($q)>0){
					$result = mysql_fetch_assoc($q);
					return $result['salary'];
				}
				
		}
		function total_companies($clerk){
			$q = mysql_query("select * from company where created_by='{$clerk}'");
			return(mysql_num_rows($q));
		}
		function total_employee($clerk){
			$q = mysql_query("select * from employee where created_by='{$clerk}'");
			return(mysql_num_rows($q));
		}
		
		function total_vehicle($clerk){
			$q = mysql_query("select * from vehicle where created_by='{$clerk}'");
			return(mysql_num_rows($q));
		}
		function total_voucher($clerk){
			$pay_vouch = mysql_num_rows(mysql_query("select * from payment_voucher where created_by='{$clerk}'"));
			$rec_vouch = mysql_num_rows(mysql_query("select * from receive_voucher where created_by='{$clerk}'"));
			return $pay_vouch+$rec_vouch;
		}
		function total_supplier($clerk){
			$supplier = mysql_num_rows(mysql_query("select * from supplier where created_by='{$clerk}'"));
			
			return $supplier;
		}
		function total_customer($clerk){
			$supplier = mysql_num_rows(mysql_query("select * from customer where created_by='{$clerk}'"));
			
			return $supplier;
		}
		function total_unit($clerk){
			$unit = mysql_num_rows(mysql_query("select * from unit where created_by='{$clerk}'"));
			return $unit;
		}
		function total_grouping($clerk){
			$unit = mysql_num_rows(mysql_query("select * from grouping where created_by='{$clerk}' and status=true"));
			return $unit;
		}
		function total_item($clerk){
			$unit = mysql_num_rows(mysql_query("select * from item where status=true and created_by='{$clerk}'"));
			return $unit;
		}
		function total_item_purchase($clerk){
			$unit = mysql_num_rows(mysql_query("select * from item_purchase where status=true and created_by='{$clerk}'"));
			return $unit;
		}
		
		function total_expenses($clerk){
			$unit = mysql_num_rows(mysql_query("select * from expenses where created_by='{$clerk}'"));
			return $unit;
		}
		
		
		
		function recent_activities($arg){
		
			switch($arg){
				
				case "company":
					
					$q = mysql_query("select * from company WHERE created_by='{$_SESSION['clerk']['id']}' and company.reg_date >= ( CURDATE() - INTERVAL 3 DAY ) order by id DESC limit 10");
						if(mysql_num_rows($q)>0){
								
								while($result = mysql_fetch_assoc($q)){
								$date = date("d,M Y",strtotime($result['reg_date']));
									echo " <li onclick='$(this).remove()'>
                                                    <span class='label label-green'>
                                                        <i class='fa fa-building-o white'></i>
                                                    </span>
                                                    Added Company : <a href='company-detail?salt={$result['salt']}'>{$result['name']}</a>
                                                    <span class='date'>
													{$date}
                                                    </span>
                                                </li>";
									
								}
								
							
						}
					
				break;
				
				case "employee":
					
						$q = mysql_query("select * from employee WHERE created_by='{$_SESSION['clerk']['id']}' and employee.reg_date >= ( CURDATE() - INTERVAL 3 DAY ) order by id DESC limit 10");
						if(mysql_num_rows($q)>0){
								
								while($result = mysql_fetch_assoc($q)){
								$date = date("d,M Y",strtotime($result['reg_date']));
									echo " <li onclick='$(this).remove()'>
                                                    <span  class='label label-blue'>
                                                        <i class='fa fa-user white'></i>
                                                    </span>
                                                    Added Employee : <a href='employee-detail?salt={$result['salt']}'>{$result['name']}</a>
                                                    <span class='date'>
													{$date}
                                                    </span>
                                                </li>";
									
								}
								
							
						}
					
				break;
			
			}
		
		}
		
		
		function recent_activities_esp($arg,$company){
		
			switch($arg){
				
				case "company":
					
						$q = mysql_query("select * from company WHERE id='{$company}' and created_by='{$_SESSION['clerk']['id']}' and company.reg_date >= ( CURDATE() - INTERVAL 3 DAY ) order by id DESC limit 10");
						if(mysql_num_rows($q)>0){
								
								while($result = mysql_fetch_assoc($q)){
								$date = date("d,M Y",strtotime($result['reg_date']));
									echo " <li onclick='$(this).remove()'>
                                                    <span class='label label-green'>
                                                        <i class='fa fa-building-o white'></i>
                                                    </span>
                                                    Added Company : <a href='company-detail?salt={$result['salt']}'>{$result['name']}</a>
                                                    <span class='date'>
													{$date}
                                                    </span>
                                                </li>";
									
								}
								
							
						}
					
				break;
				
					case "employee":
					
						$q = mysql_query("select * from employee WHERE company='{$company}' and created_by='{$_SESSION['clerk']['id']}' and employee.reg_date >= ( CURDATE() - INTERVAL 3 DAY ) order by id DESC limit 10");
						if(mysql_num_rows($q)>0){
								
								while($result = mysql_fetch_assoc($q)){
								$date = date("d,M Y",strtotime($result['reg_date']));
									echo " <li onclick='$(this).remove()'>
                                                    <span  class='label label-blue'>
                                                        <i class='fa fa-user white'></i>
                                                    </span>
                                                    Added Employee : <a href='employee-detail?salt={$result['salt']}'>{$result['name']}</a>
                                                    <span class='date'>
													{$date}
                                                    </span>
                                                </li>";
									
								}
								
							
						}
					
				break;
			
			}
		
		}
		function notifications($arg){
		
			switch($arg){
				
				case "visa":
						$curdate=date('Y-m-d');
						$interval=date('Y-m-d', strtotime("+10 days"));
						$q = mysql_query("SELECT * FROM employee WHERE visa_expire>='{$curdate}' AND visa_expire<='{$interval}'");
						if(mysql_num_rows($q)>0){
								
								while($result = mysql_fetch_assoc($q)){
								$date = date("d,M Y",strtotime($result['visa_expire']));
									echo " <li onclick='$(this).remove()'>
                                                    <span class='label label-red'>
                                                        <i class='fa fa-warning'></i>
                                                    </span>
                                                    Visa Renewal Employee: <a href='employee-detail?salt={$result['salt']}'>{$result['name']}</a>
                                                    <span class='date'>
													{$date}
                                                    </span>
                                                </li>";
									
								}
								
							
						}
					
				break;
				
				case "insurance":
						$curdate=date('Y-m-d');
						$interval=date('Y-m-d', strtotime("+10 days"));
						$q = mysql_query("SELECT * FROM employee WHERE insurance_expire>='{$curdate}' AND insurance_expire<='{$interval}'");
						if(mysql_num_rows($q)>0){
								
								while($result = mysql_fetch_assoc($q)){
								$date = date("d,M Y",strtotime($result['insurance_expire']));
									echo " <li onclick='$(this).remove()'>
                                                    <span class='label label-red'>
                                                        <i class='fa fa-warning'></i>
                                                    </span>
                                                    Insurance Renewal Employee: <a href='employee-detail?salt={$result['salt']}'>{$result['name']}</a>
                                                    <span class='date'>
													{$date}
                                                    </span>
                                                </li>";
									
								}
								
							
						}
					
				break;
				
				case "vehicle_malkiya":
						$curdate=date('Y-m-d');
						$interval=date('Y-m-d', strtotime("+10 days"));
						$q = mysql_query("SELECT * FROM vehicle WHERE malkiya_expire>='{$curdate}' AND malkiya_expire<='{$interval}'");
						if(mysql_num_rows($q)>0){
								
								while($result = mysql_fetch_assoc($q)){
								$salt = $this->ret_by("company","id",$result['company'],"salt");
								$date = date("d,M Y",strtotime($result['malkiya_expire']));
									echo " <li onclick='$(this).remove()'>
                                                    <span class='label label-red'>
                                                        <i class='fa fa-warning'></i>
                                                    </span>
                                                    Malkiya Renewal Vehicle Reg : <a href='vehicle?salt={$salt}'>{$result['registration_number']}</a>
                                                    <span class='date'>
													{$date}
                                                    </span>
                                                </li>";
									
								}
								
							
						}
					
				break;
				
				case "vehicle_insurance":
						$curdate=date('Y-m-d');
						$interval=date('Y-m-d', strtotime("+10 days"));
						$q = mysql_query("SELECT * FROM vehicle WHERE insurance_expire>='{$curdate}' AND insurance_expire<='{$interval}'");
						if(mysql_num_rows($q)>0){
								
								while($result = mysql_fetch_assoc($q)){
								$salt = $this->ret_by("company","id",$result['company'],"salt");
								$date = date("d,M Y",strtotime($result['insurance_expire']));
									echo " <li onclick='$(this).remove()'>
                                                    <span class='label label-red'>
                                                        <i class='fa fa-warning'></i>
                                                    </span>
                                                    Insurance Renewal Vehicle Reg : <a href='vehicle?salt={$salt}'>{$result['registration_number']}</a>
                                                    <span class='date'>
													{$date}
                                                    </span>
                                                </li>";
									
								}
								
							
						}
					
				break;
				
				case "sale-item-notif":
						
						$settings = $this->retrieve(['act'=>'get_settings']);
						$q = mysql_query("select * from item where quantity<={$settings['item_threshold']} and status=true");
						
						if(mysql_num_rows($q)>0){
								
								while($result = mysql_fetch_assoc($q)){
									$company = $this->ret_by("company","id",$result['company'],"salt");
									echo
										" <li onclick='$(this).remove()'>
												<span class='label label-red'>
													<i class='fa fa-warning'></i>
												</span>
												Low quantity item (Factory): <a href='sale-item?salt={$company}'>{$result['name']}</a>
											</li>
										";
								}
						}
					
				break;
				
				case "sale-item-notif-wh":
						
						$settings = $this->retrieve(['act'=>'get_settings']);
						$q = mysql_query("select * from item_warehouse where quantity<={$settings['item_threshold']} and status = true");
						
						if(mysql_num_rows($q)>0){
								
								while($result = mysql_fetch_assoc($q)){
									$company = $this->ret_by("company","id",$result['company'],"salt");
									echo
										" <li onclick='$(this).remove()'>
												<span class='label label-red'>
													<i class='fa fa-warning'></i>
												</span>
												Low quantity item (Warehouse): <a href='sale-item-wh?salt={$company}'>{$result['name']}</a>
											</li>
										";
								}
						}
					
				break;
				
				case "sale-invoice-aging":
						
						$q = mysql_query("Select id,company,aging,  reg_date, DATE_ADD(reg_date, INTERVAL aging DAY) as 'expiry', DATEDIFF(DATE_ADD(reg_date, INTERVAL aging DAY), CURDATE()) as 'diff' from sale_invoice where DATEDIFF(DATE_ADD(reg_date, INTERVAL aging DAY), CURDATE()) <=(select aging_days from settings) AND aging!=0 AND DATEDIFF(DATE_ADD(reg_date, INTERVAL aging DAY), CURDATE()) >0");
						
						if(mysql_num_rows($q)>0){
								
								while($result = mysql_fetch_assoc($q)){
									
									$company = $this->ret_by("company","id",$result['company'],"salt");
									
									
									echo
										" <li onclick='$(this).remove()'>
												<span class='label label-red'>
													<i class='fa fa-warning'></i>
												</span>
								Invoice # <a href='sale?salt={$company}'>".str_pad($result['id'], 8, '0', STR_PAD_LEFT)."</a> expiring in {$result['diff']} days  (Factory)
											</li>
										";
								}
						}
					
				break;
				
				case "sale-invoice-aging-wh":
						
						$q = mysql_query("Select id,company,aging,  reg_date, DATE_ADD(reg_date, INTERVAL aging DAY) as 'expiry', DATEDIFF(DATE_ADD(reg_date, INTERVAL aging DAY), CURDATE()) as 'diff' from sale_invoice_wh where DATEDIFF(DATE_ADD(reg_date, INTERVAL aging DAY), CURDATE()) <=(select aging_days from settings) AND aging!=0 AND DATEDIFF(DATE_ADD(reg_date, INTERVAL aging DAY), CURDATE()) >0");
						
						if(mysql_num_rows($q)>0){
								
								while($result = mysql_fetch_assoc($q)){
									echo
										" 
										<li onclick='$(this).remove()'>
											<span class='label label-red'>
												<i class='fa fa-warning'></i>
											</span>
											Invoice # ".str_pad($result['id'], 8, '0', STR_PAD_LEFT)." expiring in {$result['diff']} days  (Warehouse)
										</li>
										";
								}
						}
					
				break;
			}
		}
		
		function upload($file,$path,$dir){
			
			if(!file_exists($path.'/'.$dir)) {
				mkdir($path.'/'.$dir, 0777, true);
			}
		
			 $allowed = array("jpg","jpeg","png","doc","docx","xlsx","xls","pdf","csv","txt");
			 $max_size = 2097152;
			 
			 $name = explode(".",$file['name']);
			 
			 if(!$file['error']){
			 
				 if(in_array($name[1],$allowed)){
				 
						if($file['size']<=$max_size){
							
							move_uploaded_file($file['tmp_name'],$path."/{$dir}/".$file['name']);
							if(file_exists($path."/{$dir}/".$file['name'])) {
								return array("status"=>"success","message"=>"Document Uploaded");
							} else {
								return array("status"=>"error","message"=>"File upload failed");
							}
						
						}else{
							return array("status"=>"error","message"=>"File size must not exceed 2mb");
						}
				 
				 }else{
						return array("status"=>"error","message"=>"Invalid file type");
				 }
			 
			 }else{
				return array("status"=>"error","message"=>"Error while file uploading contact Admin. Error#:".$file['error']);
			 }
		
		}
		
		function dirToArray($dir) { 
   
		   $result = array(); 

		   $cdir = scandir($dir); 
		   foreach ($cdir as $key => $value) 
		   { 
			  if (!in_array($value,array(".",".."))) 
			  { 
				 if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) 
				 { 
					$result[$value] = dirToArray($dir . DIRECTORY_SEPARATOR . $value); 
				 } 
				 else 
				 { 
					$result[] = $value; 
				 } 
			  } 
		   } 
		   
		   return $result; 
		}
		
		function ret_attendance($company,$employee,$year,$month,$month_days){
				
				if(!empty($company) AND !empty($year) AND !empty($month)){
							
							
								$q = mysql_query("select * from attendance where company={$company} AND employee={$employee}  AND year={$year} AND month={$month}");
								if(mysql_num_rows($q)>0){
									
									$result = mysql_fetch_assoc($q);
									$days = explode(",",$result['days']);
									
									$arr = array();
									foreach($days as $val){
									
										$x = explode("-",$val);
										$x = end($x);
										array_push($arr,$x);
										
									}
									
									for($i=1;$i<$month_days;$i++){
										
											if(in_array($i,$arr)){
												
												echo "<td style='background-color:green;color:#FFF;'>P</td>";
												
											}else{
												echo "<td style='background-color:red;color:#FFF;'>A</td>";
											}
											
									}
									
								
								}else{
									
									for($i=1;$i<$month_days;$i++){
										
												echo "<td style='background-color:gray;'>-</td>";
											
									}
								}
								
						
					}else{
						echo json_encode(array("status"=>"error","message"=>"All fields are required"));
					}
		
		}
		
		function ret_attendance_esp($company,$employee,$year,$month,$month_days){
				
				if(!empty($company) AND !empty($year) AND !empty($month)){
							
							
								$q = mysql_query("select * from attendance where company={$company} AND employee={$employee}  AND year={$year} AND month={$month}");
								if(mysql_num_rows($q)>0){
									
									$result = mysql_fetch_assoc($q);
									$days = explode(",",$result['days']);
									
									$arr = array();
									foreach($days as $val){
									
										$x = explode("-",$val);
										$x = end($x);
										array_push($arr,$x);
										
									}
									
									for($i=1;$i<$month_days;$i++){
										
											if(in_array($i,$arr)){
												
												echo "<td style='background-color:green;'><b onclick=clipovertime('{$result['employee']}_{$i}') emp_day='{$result['employee']}_{$i}' style='color:#FFF;' data-toggle='modal' data-target='#add_overtime' name='overtime_val'>P</b></td>";
												
											}else{
												echo "<td style='background-color:red;color:#FFF;'>A</td>";
											}
											
									}
									
								
								}else{
									
									for($i=1;$i<$month_days;$i++){
										
												echo "<td style='background-color:gray;'>-</td>";
											
									}
								}
								
						
					}else{
						echo json_encode(array("status"=>"error","message"=>"All fields are required"));
					}
		
		}
		
		function calcTax($amt){
			return ($amt*5)/100;
		}
		
		function val_emp_overtime($company,$employee,$year,$month,$day){
			
			$q = mysql_query("select * from overtime where company ={$company} and created_by='{$_SESSION['clerk']['id']}' and employee='{$employee}' and year={$year} and month={$month} and day={$day}");
				if(mysql_num_rows($q)>0){
				
					$result = mysql_fetch_assoc($q);
					?>
							<td><?php echo $result['hour']; ?></td>
							<td><?php echo $result['min']; ?></td>
					<?php
				
				}else{
					?>
						<td>-</td>
						<td>-</td>
					<?php
				}
			
		}
		
		function val_emp_salary($company,$employee,$year,$month){
			
			$q = mysql_query("select * from attendance where company ={$company} and created_by='{$_SESSION['clerk']['id']}' and employee='{$employee}' and year={$year} and month={$month}");
				if(mysql_num_rows($q)>0){
				
					$result = mysql_fetch_assoc($q);
					?>
						<td><input style="width:50%" name='<?php echo $result['employee'];?>_alw'  type='number'></td>
						<td><input style="width:50%" name='<?php echo $result['employee'];?>_otralw'  type='number'></td>
						<td><input style="width:50%" name='<?php echo $result['employee'];?>_adv'  type='number'></td>
						<td><input style="width:50%"name='<?php echo $result['employee'];?>_otrded'   type='number'></td>
						<td><button onclick="create_salary(<?php echo $result['employee']; ?>)" class='btn btn-primary btn-xs'>Create Salary</button></td>
					<?php
				
				}else{
					?>
						<td>-</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
						<td>-</td>
					<?php
				}
			
		}
		
		function emp_info($emp_id,$company){
			
				$q = mysql_query("select * from employee where id={$emp_id} and company={$company} and created_by='{$_SESSION['clerk']['id']}'");
								if(mysql_num_rows($q)>0){
									
									$result = mysql_fetch_assoc($q);
									
									return array("status"=>"success","message"=>$result);
									
								}else{
									return array("status"=>"error","message"=>"Employee does not exist");
								}
			
		}
		
		function emp_attendance($company,$employee,$year,$month){
				
				$q = mysql_query("select * from attendance where company={$company} and created_by='{$_SESSION['clerk']['id']}' and employee={$employee} and year={$year} and month={$month}");
								if(mysql_num_rows($q)>0){
									
									$result = mysql_fetch_assoc($q);
									
										$days  = trim($result['days']);
										
										if($days){
											
												$days = explode(",",$days);
												return (count($days));
											
										}
									
								}
			
		}
		
		function emp_overtime($company,$employee,$year,$month){
			
				$q = mysql_query("select * from overtime where company={$company} and created_by='{$_SESSION['clerk']['id']}' and employee={$employee} and year={$year} and month={$month}");
								
								if(mysql_num_rows($q)>0){
									$arr = array();
										while($result = mysql_fetch_assoc($q)){
											
												array_push($arr,((($result['hour'])*60)+$result['min']));
											
										}
									return $arr;
									
								}
			
		}
		
		function ret_salary_sheet($company,$employee,$year,$month){
		
					
					$q = mysql_query("select * from salary where company = {$company} and created_by='{$_SESSION['clerk']['id']}' and employee={$employee} and year={$year} and month={$month}");
					
					if(mysql_num_rows($q)>0){
					
						$result = mysql_fetch_assoc($q);
					
						?>
									<td><?php echo $result['present'];?></td>
									<td><?php echo $result['present_val'];?></td>
									<td><?php echo $result['overtime'];?></td>
									<td><?php echo $result['overtime_val'];?></td>
									<td><?php echo $result['allowance'];?></td>
									<td><?php echo $result['other_allowance'];?></td>
									<td><?php echo $result['gross_salary'];?></td>
									<td><?php echo $result['advance'];?></td>
									<td><?php echo $result['other_deduction'];?></td>
									<td><?php echo $result['total_deduction'];?></td>
									<td><?php echo $result['salary_to_be_paid'];?></td>
						<?php
					
					}else{
						
							?>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
								<td>-</td>
							<?php
						
					}
		
		
		}
		
		function verify_dates_emp($visa_date,$visa_expire,$insurance_date,$insurance_expire){
		
		
				$visa_date = strtotime($visa_date);
				$visa_expire = strtotime($visa_expire);
				$insurance_date = strtotime($insurance_date);
				$insurance_expire = strtotime($insurance_expire);
				
				if($visa_expire<=$visa_date){
						
						return array("status"=>"error","message"=>"Visa date cannot exceed or equal to Visa expire date");
						
				}elseif($insurance_expire<=$insurance_date){
				
						return array("status"=>"error","message"=>"Insurance date cannot exceed or equal to Insurance expire date");
				
				}else{
						
						return array("status"=>"success","message"=>"");
						
				}
		
		
		}
		
		function verify_dates_veh($malkiya_date,$malkiya_expire,$insurance_date,$insurance_expire){
		
		
				$malkiya_date = strtotime($malkiya_date);
				$malkiya_expire = strtotime($malkiya_expire);
				$insurance_date = strtotime($insurance_date);
				$insurance_expire = strtotime($insurance_expire);
				
				if($malkiya_expire<=$malkiya_date){
						
						return array("status"=>"error","message"=>"Malkiya date cannot exceed or equal to Malkiya expire date");
						
				}elseif($insurance_expire<=$insurance_date){
				
						return array("status"=>"error","message"=>"Insurance date cannot exceed or equal to Insurance expire date");
				
				}else{
						
						return array("status"=>"success","message"=>"");
						
				}
		
		
		}
		function convertNumberToWord($num)
		{
			$num = str_replace(array(',', ' '), '' , trim($num));
			if(! $num) {
				return false;
			}
			$num = (int) $num;
			$words = array();
			$list1 = array('', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine', 'ten', 'eleven',
				'twelve', 'thirteen', 'fourteen', 'fifteen', 'sixteen', 'seventeen', 'eighteen', 'nineteen'
			);
			$list2 = array('', 'ten', 'twenty', 'thirty', 'forty', 'fifty', 'sixty', 'seventy', 'eighty', 'ninety', 'hundred');
			$list3 = array('', 'thousand', 'million', 'billion', 'trillion', 'quadrillion', 'quintillion', 'sextillion', 'septillion',
				'octillion', 'nonillion', 'decillion', 'undecillion', 'duodecillion', 'tredecillion', 'quattuordecillion',
				'quindecillion', 'sexdecillion', 'septendecillion', 'octodecillion', 'novemdecillion', 'vigintillion'
			);
			$num_length = strlen($num);
			$levels = (int) (($num_length + 2) / 3);
			$max_length = $levels * 3;
			$num = substr('00' . $num, -$max_length);
			$num_levels = str_split($num, 3);
			for ($i = 0; $i < count($num_levels); $i++) {
				$levels--;
				$hundreds = (int) ($num_levels[$i] / 100);
				$hundreds = ($hundreds ? ' ' . $list1[$hundreds] . ' hundred' . ( $hundreds == 1 ? '' : 's' ) . ' ' : '');
				$tens = (int) ($num_levels[$i] % 100);
				$singles = '';
				if ( $tens < 20 ) {
					$tens = ($tens ? ' ' . $list1[$tens] . ' ' : '' );
				} else {
					$tens = (int)($tens / 10);
					$tens = ' ' . $list2[$tens] . ' ';
					$singles = (int) ($num_levels[$i] % 10);
					$singles = ' ' . $list1[$singles] . ' ';
				}
				$words[] = $hundreds . $tens . $singles . ( ( $levels && ( int ) ( $num_levels[$i] ) ) ? ' ' . $list3[$levels] . ' ' : '' );
			} //end for loop
			$commas = count($words);
			if ($commas > 1) {
				$commas = $commas - 1;
			}
			return implode(' ', $words);
		}
		function ret_info($id,$tbl){
				
				$q = mysql_query("select * from {$tbl} where id={$id} and created_by='{$_SESSION['clerk']['id']}'");
				if(mysql_num_rows($q)>0){
							
							$result = mysql_fetch_assoc($q);
							return $result;
				}
			
		}
		function is_decimal($val){
		
			return is_numeric( $val ) && floor( $val ) != $val;
		
		}
		
		function disp_units($id){
			
				$q = mysql_query("select * from unit where id={$id}");
				if(mysql_num_rows($q)>0){
					return(mysql_fetch_assoc($q));
					
				}
			
		}
		
		function retrieve($arr){
			
				switch($arr['act']){
					
						case "supplier":
							
								$q = mysql_query("select * from supplier where created_by = '{$_SESSION['clerk']['id']}'");
								if(mysql_num_rows($q)){
									
									?>
									<select id="supplier" class="form-control" >
									<?php
									
										while($result=mysql_fetch_assoc($q)){
											
											?>
												
													<option value="<?php echo $result['id'];?>"><?php echo ucwords($result['name']);?></option>
												
											<?php
											
										}
									
									?>
									</select>
									<?php

									
								}else{
									
										?>
										
											<select id="supplier" class="form-control" disabled>
												
													<option>Empty</option>
												
											</select>
										
										<?php
									
								}
							
						
						break;
						
						case "get_settings":
							
								$q = mysql_query("select * from settings where status=true");
								if(mysql_num_rows($q)){

									$result = mysql_fetch_assoc($q);
									return $result;
								
								}
							
						
						
						break;
						
						case "due_days":
						
							return date('Y-m-d', strtotime($arr['date']. " + {$arr['days']} days"));
						
						break;
						
						
						case "past_due_days":
							$date = new DateTime($arr['date']);
							$now = new DateTime();

							echo $date->diff($now)->format("%R%a days");
						
						break;
						
						case "list_company":
						
							$q = mysql_query("select * from company order by id DESC");
							if(mysql_num_rows($q)){
								
								while($result = mysql_fetch_assoc($q)){
									?>
										<option value="<?php echo $result['id'];?>">
											<?php echo ucwords($result['name']);?>
										</option>
									<?php
								}
								
							}else{
								echo "<blockquote>Empty</blockquote>";
							}
						
						break;

						case "customer":
							
								$q = mysql_query("SELECT * FROM `customer` where created_by = '{$_SESSION['clerk']['id']}' and status=true ORDER BY IF(name RLIKE '^[a-z]', 'A','Z'), name");
								if(mysql_num_rows($q)){
									
									?>
									<select id="customer" class="form-control" >
									<?php
									
										while($result=mysql_fetch_assoc($q)){
											
											?>
												
													<option value="<?php echo $result['id'];?>"><?php echo ucwords($result['name']);?></option>
												
											<?php
											
										}
									
									?>
									</select>
									<?php

									
								}else{
									
										?>
										
											<select id="customer" class="form-control" disabled>
												
													<option>Empty</option>
												
											</select>
										
										<?php
									
								}
							
						
						break;
						
						case "customer_all":
							
								$q = mysql_query("SELECT * FROM `customer` where status<>false ORDER BY ID DESC");
								if(mysql_num_rows($q)){
									
									?>
									<select id="customer" class="form-control" >
									<?php
									
										while($result=mysql_fetch_assoc($q)){
											
											?>
												
													<option value="<?php echo $result['id'];?>"><?php echo ucwords($result['name']);?></option>
												
											<?php
											
										}
									
									?>
									</select>
									<?php

									
								}else{
									
										?>
										
											<select id="customer" class="form-control" disabled>
												
													<option>Empty</option>
												
											</select>
										
										<?php
									
								}
							
						
						break;
						
						case "customer_all_esp":
							
								$q = mysql_query("SELECT * FROM `customer` where status=true ORDER BY IF(name RLIKE '^[a-z]', 'A','Z'), name ");
								if(mysql_num_rows($q)){
									
									?>
									<select id="customer" class="form-control" >
									<option value="all" selected>All</option>
									<?php
									
										while($result=mysql_fetch_assoc($q)){
											
											?>
													<option value="<?php echo $result['id'];?>"><?php echo ucwords($result['name']);?></option>
												
											<?php
											
										}
									
									?>
									</select>
									<?php

									
								}else{
									
										?>
										
											<select id="customer" class="form-control" disabled>
												
													<option>Empty</option>
												
											</select>
										
										<?php
									
								}
							
						
						break;
						
						case "supplier_all_esp":
							
								$q = mysql_query("SELECT * FROM `supplier` where status=true ORDER BY IF(name RLIKE '^[a-z]', 'A','Z'), name ");
								if(mysql_num_rows($q)){
									
									?>
									<select id="customer" class="form-control" >
									<option value="all" selected>All</option>
									<?php
									
										while($result=mysql_fetch_assoc($q)){
											
											?>
													<option value="<?php echo $result['id'];?>"><?php echo ucwords($result['name']);?></option>
												
											<?php
											
										}
									
									?>
									</select>
									<?php

									
								}else{
									
										?>
										
											<select id="supplier" class="form-control" disabled>
												
													<option>Empty</option>
												
											</select>
										
										<?php
									
								}
							
						
						break;
						
						case "sale_pull_details":
									
							$q = mysql_query("select * from sale_paid_{$arr['payment_type']} where inv='{$arr['inv']}' and sale_paid_id='{$arr['sale_paid_id']}'");
							if(mysql_num_rows($q)){
								$result = mysql_fetch_assoc($q);
								return $result;
							}
										
						break;
						
						case "grouping":
							
								$q = mysql_query("select * from grouping where status=true");
								if(mysql_num_rows($q)){
									while($result = mysql_fetch_assoc($q)){
										?>
											
											<option value='<?php echo $result['id']?>'><?php echo ucwords($result['name']); ?></option>
											
										<?php
									}
								}else{
										
									?>	
											<option value="">No groups added, please add a group to proceed</option>
									<?php
								}
						
						break;
						
						case "item":
							
								$q = mysql_query("select * from item where created_by = '{$_SESSION['clerk']['id']}'");
								if(mysql_num_rows($q)){
									
									?>
									<select id="item" class="form-control" >
									<?php
									
										while($result=mysql_fetch_assoc($q)){
											
											?>
												
													<option value="<?php echo $result['id'];?>"><?php echo ucwords($result['name']);?></option>
												
											<?php
											
										}
									
									?>
									</select>
									<?php

									
								}else{
									
										?>
										
											<select id="item" class="form-control" disabled>
												
													<option>Empty</option>
												
											</select>
										
										<?php
									
								}
							
						
						break;
						
						case "item-purchase":
							
								$q = mysql_query("select * from item where created_by = '{$_SESSION['clerk']['id']}'");
								if(mysql_num_rows($q)){
									
									?>
									<select type="text" id="item" class="form-control">
									<?php
									
										while($result=mysql_fetch_assoc($q)){
											
											?>
												
													<option value="<?php echo $result['id'];?>"><?php echo ucwords($result['name']);?></option>
												
											<?php
											
										}
									
									?>
									</select>
									<?php

									
								}else{
									
										?>
										
											<select id="item" class="form-control" disabled>
												
													<option>Empty</option>
												
											</select>
										
										<?php
									
								}
							
						
						break;
						
						case "item_purchase":
							
								
								$q = mysql_query("select * from item_purchase where company='{$arr['company']}' and created_by = '{$_SESSION['clerk']['id']}' and status=true");
								if(mysql_num_rows($q)){
									
									?>
									<select id="item" class="form-control pur_trig">
									<?php
									
										while($result=mysql_fetch_assoc($q)){
											
											?>
												
													<option value="<?php echo $result['id'];?>"><?php echo ucwords($result['name']);?></option>
												
											<?php
											
										}
									
									?>
									</select>
									<?php

									
								}else{
									
										?>
										
											<select id="item" class="form-control" disabled>
												
													<option>Empty</option>
												
											</select>
										
										<?php
									
								}
							
						
						break;
						
						case "item_sale_verify":
							
								$q = mysql_query("select * from item where name='{$arr['name']}' and id<>'{$arr['item']}' and status=true");
								return mysql_fetch_assoc($q);
						break;
						
						
						case "item_sale":
							
								
								$q = mysql_query("select * from item where company='{$arr['company']}' and created_by = '{$_SESSION['clerk']['id']}' and status=true");
								if(mysql_num_rows($q)){
									
									?>
									<select id="item" class="form-control pur_trig">
									<?php
									
										while($result=mysql_fetch_assoc($q)){
											
											?>
												
													<option value="<?php echo $result['id'];?>"><?php echo ucwords($result['name']);?></option>
												
											<?php
											
										}
									
									?>
									</select>
									<?php

									
								}else{
									
										?>
										
											<select id="item" class="form-control" disabled>
												
													<option>Empty</option>
												
											</select>
										
										<?php
									
								}
							
						
						break;
						
						case "item_sale_wh":
							
								
								$q = mysql_query("select * from item_warehouse where company='{$arr['company']}' and status=true");
								if(mysql_num_rows($q)){
									
									?>
									<select id="item" class="form-control pur_trig">
									<?php
									
										while($result=mysql_fetch_assoc($q)){
											
											?>
												
													<option value="<?php echo $result['id'];?>"><?php echo ucwords($result['name']);?></option>
												
											<?php
											
										}
									
									?>
									</select>
									<?php

									
								}else{
									
										?>
										
											<select id="item" class="form-control" disabled>
												
													<option>Empty</option>
												
											</select>
										
										<?php
									
								}
							
						
						break;
						
						
						
						
						case "suppliers":
							
								$q = mysql_query("select * from supplier where created_by = '{$_SESSION['clerk']['id']}'");
								if(mysql_num_rows($q)){
									
									?>
									<select type="text" id="supplier" class="form-control">
									<?php
									
										while($result=mysql_fetch_assoc($q)){
											
											?>
												
													<option value="<?php echo $result['id'];?>"><?php echo ucwords($result['name']);?></option>
												
											<?php
											
										}
									
									?>
									</select>
									<?php

									
								}else{
									
										?>
										
											<select id="supplier" class="form-control" disabled>
												
													<option>Empty</option>
												
											</select>
										
										<?php
									
								}
							
						
						break;
						
						case "transaction_type":
							
								$q = mysql_query("select * from transaction_type");
								if(mysql_num_rows($q)){
									
									?>
									<select id="transaction_type" class="form-control" >
									<?php
									
										while($result=mysql_fetch_assoc($q)){
											
											?>
												
													<option value="<?php echo $result['id'];?>"><?php echo ucwords($result['name']);?></option>
												
											<?php
											
										}
									
									?>
									</select>
									<?php

									
								}else{
									
										?>
										
											<select id="item" class="form-control" disabled>
												
													<option>Empty</option>
												
											</select>
										
										<?php
									
								}
							
						
						break;
						
						case "purchase_invoice_details":
							
								$q = mysql_query("select * from purchase_invoice where id='{$arr['inv']}'");
								if(mysql_num_rows($q)){
									$invoice_detail = mysql_fetch_assoc($q);
								}
								
								$q = mysql_query("select * from supplier where id='{$invoice_detail['supplier']}'");
								if(mysql_num_rows($q)){
									
										$supplier_detail = mysql_fetch_assoc($q);

								}
								
								$purchase_item = array();
								
								$q = mysql_query("select * from purchase_item where inv='{$arr['inv']}'");
								if(mysql_num_rows($q)){
									while($result=mysql_fetch_assoc($q)){
										$purchase_item[]=$result;
									}
								}
								
								
								$purchase_paid = array();
								
								$q = mysql_query("select * from purchase_paid where inv='{$arr['inv']}'");
								if(mysql_num_rows($q)){
									while($result=mysql_fetch_assoc($q)){
											$purchase_paid[]=$result;
									}
								}
								
								
								
								$arr1=array();
								$arr2=array();
								

								$paid = $net = null;
									
									foreach($purchase_paid as $val){
										$arr1[] = ($val['paid']);
									}
									
								$paid = array_sum($arr1);

									foreach($purchase_item as $val){
											$arr2[] = ($val['price']*$val['quantity']);
											
									}

								$net = array_sum($arr2);
								
								if($invoice_detail['discount']){
									$total = $net - (($net*$invoice_detail['discount'])/100);
								}else{
									$total = $net;
								}

								
								$details = 
								[
								
									"invoice_detail"=>$invoice_detail,
									"supplier_detail"=>$supplier_detail,
									"purchase_item"=>$purchase_item,
									"purchase_paid"=>$purchase_paid,
									"net"=>$net,
									"paid"=>$paid,
									"total"=>$total,
									"remaining"=>($total-$paid)
								
								];
								
								
								return $details;
						
						break;
					
						
						case "sale_item_details":
						
								
								$q = mysql_query("select * from item where id ='{$arr['item']}'");
								
								$result = mysql_fetch_assoc($q);
								$result['unit'] = $this->ret_by("unit","id",$result['unit'],"name");
								
								return $result;

							
						break;
						
						case "sale_item_wh_details":
								
								$q = mysql_query("select * from item_warehouse where id ='{$arr['item']}' and status=true");
								
								if(mysql_num_rows($q)){
										
										$result = mysql_fetch_assoc($q);
										return $result;
								}
						break;
						
						case "item_wh_details":
								
								$q = mysql_query("select * from item_warehouse where id ='{$arr['item']}' and status=true");
								
								if(mysql_num_rows($q)){
										
										$result = mysql_fetch_assoc($q);
										return $result;
								}
						break;
						
						case "grouping_detail":
						
								$q = mysql_query("select * from grouping where id ='{$arr['grouping']}'");
								
								$result = mysql_fetch_assoc($q);
								
								return $result;

							
						break;
						
						case "proc_sale_qty":
						
							$qty = floatval($arr['qty']);
							$type = $arr['type'];
						
								if($type>1){
										
										if(is_float($qty)){
											
												$tot = explode(".",$qty);
												
												!empty($tot[1]) ? $tot = ($tot[0]*$type)+$tot[1] : $tot = ($tot[0]*$type);
												
												return $tot;
											
										}else{
											
											$tot = $type*$qty;
											
											return ($tot);
										}
										
								}else{
									return $qty;
								}
							
						
						break;
						
						
						
						case "sale_invoice_details":
							
								$q = mysql_query("select * from sale_invoice where type='{$arr['type']}' and id='{$arr['inv']}'");
								
								if(mysql_num_rows($q)){
									$invoice_detail = mysql_fetch_assoc($q);
								}
								
								//added on 7th of apr 19
								$q = mysql_query("select * from sale_inv_order where inv='{$arr['inv']}'");
								if(mysql_num_rows($q)){
									
									$sale_inv_order = mysql_fetch_assoc($q);
									
								}else{
									$sale_inv_order = NULL;
								}
								
								$q = mysql_query("select * from customer where id='{$invoice_detail['customer']}'");
								if(mysql_num_rows($q)){
									
										$customer_detail = mysql_fetch_assoc($q);

								}
								
								
								
								$sale_item = array();
								$tot_price = array();
								
								$q = mysql_query("select * from sale_item where inv='{$arr['inv']}' and quantity>0");
								if(mysql_num_rows($q)){
									while($result=mysql_fetch_assoc($q)){
										$sale_qty = $this->retrieve(['act'=>'proc_sale_qty','qty'=>$result['quantity'],'type'=>$result['grouping_qty']])*$result['price_per_unit'];
										$tot_price[] = $sale_qty;
										$sale_item[]=$result;
									}
								}
								
								
								$sale_paid = array();
								$tot_paid = array();
								
								$q = mysql_query("select * from sale_paid where inv='{$arr['inv']}'");
								if(mysql_num_rows($q)){
									while($result=mysql_fetch_assoc($q)){
											$sale_paid[]=$result;
											$tot_paid[]=$result['paid'];
									}
								}
								
								$net = array_sum($tot_price);
								$invoice_detail['discount_type'] == "percentage" ? $total = (array_sum($tot_price)-((array_sum($tot_price)*$invoice_detail['discount'])/100)) : $total = array_sum($tot_price)-$invoice_detail['discount'];
								// $total = (array_sum($tot_price)-((array_sum($tot_price)*$invoice_detail['discount'])/100));
								$remaining = $total - array_sum($tot_paid);
								$details = 
								[
								
									"invoice_detail"=>$invoice_detail,
									"order"=>($sale_inv_order['status']!=null ? $sale_inv_order['status'] : NULL),
									"remarks"=>($sale_inv_order['remarks']!=null ? $sale_inv_order['remarks'] : NULL),
									"customer_detail"=>@$customer_detail,
									"sale_item"=>$sale_item,
									"sale_paid"=>$sale_paid,
									"net"=>$net,
									"total"=>$total,
									"remaining"=>$remaining,
									"tot_paid"=>array_sum($tot_paid)
																
								];
								
								
								return $details;
						
						break;
						
						case "sale_invoice_details_wh":
							
								$q = mysql_query("select * from sale_invoice_wh where type='{$arr['type']}' and id='{$arr['inv']}'");
								
								if(mysql_num_rows($q)){
									$invoice_detail = mysql_fetch_assoc($q);
								}
								
								//added on 7th of apr 19
								$q = mysql_query("select * from sale_inv_order_wh where inv='{$arr['inv']}'");
								if(mysql_num_rows($q)){
									
									$sale_inv_order = mysql_fetch_assoc($q);
									
								}else{
									$sale_inv_order = NULL;
								}
								
								$q = mysql_query("select * from customer where id='{$invoice_detail['customer']}'");
								if(mysql_num_rows($q)){
									
										$customer_detail = mysql_fetch_assoc($q);

								}
								
								
								
								$sale_item = array();
								$tot_price = array();
								
								$q = mysql_query("select * from sale_item_wh where inv='{$arr['inv']}' and quantity>0");
								if(mysql_num_rows($q)){
									while($result=mysql_fetch_assoc($q)){
										$sale_qty = $this->retrieve(['act'=>'proc_sale_qty','qty'=>$result['quantity'],'type'=>$result['grouping_qty']])*$result['price_per_unit'];
										$tot_price[] = $sale_qty;
										$sale_item[]=$result;
									}
								}
								
								
								$sale_paid = array();
								$tot_paid = array();
								
								$q = mysql_query("select * from sale_paid_wh where inv='{$arr['inv']}'");
								if(mysql_num_rows($q)){
									while($result=mysql_fetch_assoc($q)){
											$sale_paid[]=$result;
											$tot_paid[]=$result['paid'];
									}
								}
								
								$net = array_sum($tot_price);
								$invoice_detail['discount_type'] == "percentage" ? $total = (array_sum($tot_price)-((array_sum($tot_price)*$invoice_detail['discount'])/100)) : $total = array_sum($tot_price)-$invoice_detail['discount'];
								// $total = (array_sum($tot_price)-((array_sum($tot_price)*$invoice_detail['discount'])/100));
								$remaining = $total - array_sum($tot_paid);
								$details = 
								[
								
									"invoice_detail"=>$invoice_detail,
									"order"=>($sale_inv_order['status']!=null ? $sale_inv_order['status'] : NULL),
									"remarks"=>($sale_inv_order['remarks']!=null ? $sale_inv_order['remarks'] : NULL),
									"customer_detail"=>$customer_detail,
									"sale_item"=>$sale_item,
									"sale_paid"=>$sale_paid,
									"net"=>$net,
									"total"=>$total,
									"remaining"=>$remaining,
									"tot_paid"=>array_sum($tot_paid)
																
								];
								
								
								return $details;
						
						break;
						
						case "compare_purchase_stock":
							
								// $purchase_stock_id = $this->ret_by("purchase_stock","id",$arr['stock_item'],"item");
								
							
						break;
						
						case "purchase_usage_item_detail":
							
								$q = mysql_query("select * from purchase_stock where item='{$arr['item']}' and status=true");
								
								if(mysql_num_rows($q)){
									
									$result = mysql_fetch_assoc($q);
									
									
								}
							
						break;
						
						case "calc_sale_return":
							
							$sale = NULL;
							$return = NULL;
							
							$q = mysql_query("select * from sale_item where item_id='{$arr['item']}' AND reg_date BETWEEN '{$arr['from']}' AND '{$arr['to']}'");
							
							if(mysql_num_rows($q)){
								
								while($result = mysql_fetch_assoc($q)){
									$sale[] = ($result['quantity']*$result['grouping_qty']);
								}
								$sale = array_sum($sale);
							}
							
							
							$q = mysql_query("select * from sale_item_returned where item_id='{$arr['item']}' AND reg_date BETWEEN '{$arr['from']}' AND '{$arr['to']}'");
							
							if(mysql_num_rows($q)){
								
								while($result = mysql_fetch_assoc($q)){
									$return[] = $result['quantity'];
								}
								$return = array_sum($return);
							}
						
						
							return ["sale"=>$sale,"return"=>$return];
						
						break;
						
						case "calc_sale_return_wh":
							
							$sale = NULL;
							$return = NULL;
							
							$q = mysql_query("select * from sale_item_wh where item_id='{$arr['item']}' AND reg_date BETWEEN '{$arr['from']}' AND '{$arr['to']}'");
							
							if(mysql_num_rows($q)){
								
								while($result = mysql_fetch_assoc($q)){
									$sale[] = ($result['quantity']*$result['grouping_qty']);
								}
								$sale = array_sum($sale);
							}
							
							
							$q = mysql_query("select * from sale_item_returned_wh where item_id='{$arr['item']}' AND reg_date BETWEEN '{$arr['from']}' AND '{$arr['to']}'");
							
							if(mysql_num_rows($q)){
								
								while($result = mysql_fetch_assoc($q)){
									$return[] = $result['quantity'];
								}
								$return = array_sum($return);
							}
						
						
							return ["sale"=>$sale,"return"=>$return];
						
						break;
					
					
				}
			
			
		}
		
		function p_l($arr){
			
			$from  = date("Y-m-d",strtotime($arr['dates']['from']));
			
			$to  = date("Y-m-d",strtotime($arr['dates']['to']));
			
			
			
			switch($arr['act']){
				
				case "factory-purchase":
				
					$q = mysql_query("
									SELECT sum((pi.quantity*grp.qty)*pi.price) as total
									FROM `purchase_item` AS pi
									left join grouping as grp
									on pi.type = grp.id
									left join purchase_invoice as pinv
									on pi.inv = pinv.id
									where pinv.company = '{$arr['company']}'
									AND pi.reg_date BETWEEN 
									'{$from}' AND '{$to}'
									");

					if(mysql_num_rows($q)){
						
						$result = mysql_fetch_assoc($q);
						return round($result['total']);
						
					}
				
				break;
				
				case "factory-sale":
				
					$q = mysql_query("
									SELECT sum((si.quantity*si.grouping_qty)*si.price_per_unit) as total
									FROM `sale_item` AS si
									left join sale_invoice as sinv
									on si.inv = sinv.id
									where sinv.company = '{$arr['company']}'
									AND si.reg_date BETWEEN 
									'{$from}' AND '{$to}'
									");
					if(mysql_num_rows($q)){
						
						$result = mysql_fetch_assoc($q);
						return round($result['total']);
						
					}
				
				break;
				
				case "warehouse-sale":
				
					$q = mysql_query("
									SELECT sum((si.quantity*si.grouping_qty)*si.price_per_unit) as total
									FROM `sale_item_wh` AS si
									left join sale_invoice_wh as sinv
									on si.inv = sinv.id
									where sinv.company = '{$arr['company']}'
									AND si.reg_date BETWEEN 
									'{$from}' AND '{$to}'
									");
					if(mysql_num_rows($q)){
						
						$result = mysql_fetch_assoc($q);
						return round($result['total']);
						
					}
				
				break;
				
				case "factory-expenses":
				
					$q = mysql_query("
									SELECT sum(amount) as total
									FROM `expenses`
									where reg_date BETWEEN 
									'{$from}' AND '{$to}'
									AND company = '{$arr['company']}'
									AND place = 'factory'
									");
					if(mysql_num_rows($q)){
						
						$result = mysql_fetch_assoc($q);
						return round($result['total']);
						
					}
				
				break;
				
				
				case "warehouse-expenses":
				
					$q = mysql_query("
									SELECT sum(amount) as total
									FROM `expenses`
									where reg_date BETWEEN 
									'{$from}' AND '{$to}'
									AND company = '{$arr['company']}'
									AND place = 'warehouse'
									");
					if(mysql_num_rows($q)){
						
						$result = mysql_fetch_assoc($q);
						return round($result['total']);
						
					}
				
				break;
				
				
				
			}
			
		}
		
		function create_update_log($arr){
			
			$q = mysql_query("insert into update_log values('{$arr['id']}','{$arr['tbl']}','{$arr['entity_id']}','{$arr['data_before']}','{$arr['data_after']}','{$arr['status']}','{$arr['reg_date']}')");
			
			if($q){
				return true;
			}
			
		}
		
		function updateItem($arr){
			
			$q = mysql_query("
								update item 
								set name='{$arr['name']}',
								quantity='{$arr['qty']}',
								volume='{$arr['volume']}',
								unit='{$arr['unit']}',
								price_per_unit='{$arr['price_per_unit']}',
								sale_item_desc='{$arr['desc']}'
								where id={$arr['item']}
							");
			
			if($q){
				return true;
			}
			
		}
		
		function unitsListForEdit($arr){
			
			$q = mysql_query("select * from unit where company = '{$arr['company']}' and created_by='{$arr['created_by']}' and status<>false order by id='{$arr['id']}' DESC");
			
			$data = NULL;
			if(mysql_num_rows($q)){
				while($result = mysql_fetch_assoc($q)){
					$data.= "<option value='{$result['id']}'>".ucwords($result['name'])."</option>";
				}
			}else{
				$data = "<option>No unit associated</option>";
			}
			
			$content = "<label>Unit*</label><select id='edit_curr_unit' class='form-control'>{$data}</select>";
			return $content;
		}
	
}	

?>
