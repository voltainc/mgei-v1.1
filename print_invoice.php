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

 <div class="modal-content">
						
						<div class="modal-body with-padding">
							<div class="panel panel-success">
								<div class="panel-heading" >
									<h6 class="panel-title"><i class="icon-coin"></i>Customer Invoice<b class='pull-right'> #123123123</b></h6>
									
								</div>

								<div class="panel-body">

									<div class="block">
										<div class="col-xs-4">
											<h3><strong style='font-size:20px;'>Al WASHAH</strong></h3>
											
										</div>
										
										<div class="col-xs-4">
											<h3><strong style='font-size:20px;'>Al WASHAH</strong></h3>
											
										</div>

										<div class="col-xs-4">
											<h3 class='pull-right'><strong style='font-size:40px;'>الو شح</strong></h3>
										</div>
									</div>


									<div class="row">
										
									</div>

								</div>


								<div class="table-responsive">
									<table class="table table-striped table-bordered">
										
										<tbody>
												<tr>
													<td>Name</td>
													<td>Raj Bajaj
												</td></tr>
												<tr>
													<td>Address</td>
													<td>Bhatapara
												</td></tr>
												<tr>
													<td>City</td>
													<td>Raipur
												</td></tr>
												<tr>
													<td>Country</td>
													<td>India
												</td></tr>
												<tr>
													<td>Email Address</td>
													<td>infoamericantrends@gmail.com
												</td></tr>
												
												<tr>
													<td>Credit</td>
													<td>0.000
												</td></tr>
										   
										   
										</tbody>
									</table>
								</div>

								<div class="panel-body" style='border:0px;'>
									<div class="row">
										<div class="col-sm-8">
											
											
										</div>

										<div class="col-sm-4">
											
											<div class="col-xs-12"><div class="col-xs-8 text-left"><h6>Total:</h6></div><div class="col-xs-4">3.99&nbsp;USD</div></div>
											
											<div class="btn-group pull-right">
												
																			
																		
												
											</div>
										</div>
									</div>

									<h6>Notes &amp; Information:</h6>
									This invoice contains a incomplete list of items destroyed by the Federation ship Enterprise on Startdate 5401.6 in an unprovked attacked on a peaceful &amp; wholly scientific mission to Outpost 775.
									The Romulan people demand immediate compensation for the loss of their Warbird, Shuttle, Cloaking Device, and to a lesser extent thier troops.
								</div>
							</div>  
						</div>			
					
			</div>

</html>