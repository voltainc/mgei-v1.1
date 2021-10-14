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

<body class="full-width">
<!--Navigation Top Bar Start-->
<?php 
	
		echo $static->nav("inner");
	
?>
<!--Navigation Top Bar End-->
<section id="main-container">

<!--Left navigation section start-->
<?php echo $static->sidebar("sales");?>
<!--Left navigation section end-->


<!--Page main section start-->
<section id="min-wrapper">
    <div id="main-content">
        <div class="container-fluid">
            <div class="row" id="noprint">
                <div class="col-md-12" id="noprint">
                    <!--Top header start-->
                    <h3 class="ls-top-header" id="noprint">Sales Details</h3>
                    <!--Top header end -->

                    <!--Top breadcrumb start -->
                    <ol class="breadcrumb" id="noprint">
                        <li><a href="javascript:void(0)"><i class="fa fa-home"></i></a></li>
                        <li>Dashboard</li>
                        <li class="active">Invoice</li>
                    </ol >
                    <!--Top breadcrumb start -->
                </div>
            </div>
            <!-- Main Content Element  Start-->
            <div class="modal-content">
						
						<div class="modal-body with-padding">
							<div class="panel panel-success">
								<div class="panel-heading" id="noprint">
									<h6 class="panel-title"><i class="icon-coin"></i>Customer Invoice</h6>
									
								</div>

								<div class="panel-body">

									<div class="row">
										<div class="col-md-10">
											<h3>Al WASHAH<br><small>Car Rental</small></h3>
											
										</div>

										<div class="col-md-2">
											<ul class="invoice-details">
											<li>Sale # <strong class="text-danger">205632764939</strong></li>
												<li>Invoice # <strong class="text-danger">205632764948</strong></li>
												
											</ul>
										</div>
									</div>


									<div class="row">
										
									</div>

								</div>


								<div class="table-responsive">
									<table class="table table-striped table-bordered">
										
										<tbody>
												<tr>
													<td><strong>Name</strong></td>
													<td>Raj Bajaj<!--</td-->
												</td></tr>
												<tr>
													<td><strong>Address</strong></td>
													<td>Bhatapara<!--</td-->
												</td></tr>
												<tr>
													<td><strong>City</strong></td>
													<td>Raipur<!--</td-->
												</td></tr>
												<tr>
													<td><strong>Country</strong></td>
													<td>India<!--</td-->
												</td></tr>
												<tr>
													<td><strong>Email Address</strong></td>
													<td>infoamericantrends@gmail.com<!--</td-->
												</td></tr>
												
												<tr>
													<td><strong>Payment Method</strong></td>
													<td>CC<!--</td-->
												</td></tr>
										   
										   
										</tbody>
									</table>
								</div>

								<div class="panel-body">
									<div class="row invoice-payment">
										<div class="col-sm-8">
											<h6 class="text-success"><i class="icon-checkmark3"></i> Paid on 07/Jul/2015</h6>
											
										</div>

										<div class="col-sm-4">
											
											<div class="col-xs-12"><div class="col-xs-8 text-left"><h6>Total:</h6></div><div class="col-xs-4">3.99&nbsp;USD</div></div>
											
											<div class="btn-group pull-right">
												
																			<button type="button" class="btn btn-success"><i class="icon-credit"></i> CreditCard Passed</button>
																		
												<button onclick="window.print()" id="noprint" type="button" class="btn btn-primary"><i class="icon-print2"></i> Print</button>
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

            <!-- Main Content Element  End-->

        </div>
    </div>



</section>
<!--Page main section end -->
<!--Right hidden  section start-->

<!--Right hidden  section end -->

</section>

<!--Layout Script start -->
<?php echo $static->jslib("inner");?>

<!--Layout Script End -->
</body>

</html>