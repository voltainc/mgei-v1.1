<?php require_once('assets/funcs.php');
$obj = new main();
$obj->check_sesh("clerk",array("pass"=>NULL,"fail"=>"../clerk"));
$obj->connect_db();
$member = new member();
$static = new static_content;
if(isset($_GET['salt'])){
	
	$val_voucher  = $member->val_payment_voucher($_GET['salt']);
	if(!$val_voucher){
		$member->redirect("payment-voucher");
	}
	$company_info = $member->ret_info($val_voucher['company'],"company");

}else{
$member->redirect("payment-voucher");
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
<?php echo $static->sidebar('payment-voucher');?>
<!--Left navigation section end-->


<!--Page main section start-->
<section id="min-wrapper">
    <div id="main-content">
        <div class="container-fluid">
			<div class="row">
				<div class='col-md-12'>
					<div class="panel panel-success">
						<div class="panel-body">
							<div class="row">
								<div class='col-md-12'>
									<div class="col-md-8 pull-left">
										<h1><?php echo $company_info['name']; ?></h1>
										<span>Payment Voucher #<?php echo $val_voucher['pv_number'];?></span>
									</div>

									<div class="col-md-4 pull-right">
										<div class='row'>
											<div class="col-sm-12">
												<table class="table table-striped table-bordered">
														<tr>
															<td><b>Address</td>
															<td><?php echo $company_info['address']; ?></td>
														</tr>
														<tr>
															<td><b>Phone</td>
															<td><?php echo $company_info['phone']; ?></td>
														</tr>
														<tr>
															<td><b>Date</td>
															<td><?php echo date("d,M Y",strtotime($val_voucher['issue_date'])); ?></td>
														</tr>
												</table>
												
											</div>
										</div>
									</div>
								</div>
								<div class='col-md-12'><hr /></div>
							</div>
						</div>


						<div class='block'>
							<div class='col-md-12'>
								<table class="table table-striped table-bordered">
										<tr>
											<td><b>Payment Method</td>
											<td><?php echo strtoupper($val_voucher['payment_method']);?></td>
										</tr>
										<tr>
											<td><b>To</td>
											<td><?php echo ucwords($val_voucher['issue_to']); ?></td>
										</tr>
										
										<?php 
											
											if($val_voucher['payment_method']=="cash"){
												
												?>
												
													<tr>
														<td><b>Cash R.O</td>
														<td>
																<?php 
																		$amount = $member->is_decimal($val_voucher['cash_amount']);
																		if($amount){
																			
																			echo $val_voucher['cash_amount'];
																		
																		}else{
																			
																			echo $val_voucher['cash_amount'].".000";
																			
																		}
																		
																?>
															</td>
													</tr>
													
													<tr>
														<td><b>Amount in words</td>
														<td><?php echo ucwords($member->convertNumberToWord($val_voucher['cash_amount']));?> Rial Omani</td>
													</tr>
												
												<?php
												
											}elseif($val_voucher['payment_method']=="cheque"){
												
													?>
													
														<tr>
															<td><b>Bank</td>
															<td><?php echo ucwords($val_voucher['bank']); ?></td>
														</tr>
														<tr>
															<td><b>Cheque Number</td>
															<td><?php echo ucwords($val_voucher['cheque_number']); ?></td>
														</tr>
														<tr>
															<td><b>Cheque Date</td>
															<td><?php echo date("d,M Y",strtotime($val_voucher['cheque_date'])); ?></td>
														</tr>
														<tr>
															<td><b>Cheque Amount R.O</td>
															<td>
																<?php 
																		$amount = $member->is_decimal($val_voucher['cheque_amount']);
																		if($amount){
																			
																			echo $val_voucher['cheque_amount'];
																		
																		}else{
																			
																			echo $val_voucher['cheque_amount'].".000";
																			
																		}
																		
																?>
															</td>
														</tr>
														<tr>
															<td><b>Amount in words</td>
															<td><?php echo ucwords($member->convertNumberToWord($val_voucher['cheque_amount']));?> Rial Omani</td>
														</tr>
													
													<?php
												
											}
										
										?>
										
										
								</table>
							</div>
							<div class='row'><div class='col-md-12'><br /></div></div>
							<div class="row">
								<div class='col-md-1'></div>
								<div class="col-sm-11">
									
									<div class="col-sm-4">
										<b>Approved By:</b>
										<h6>Signature:__________________________</h6>
									</div>
									<div class="col-sm-4">
										<b>Paid By:</b>
										<h6>Signature:__________________________</h6>
									</div>
									<div class="col-sm-4">
										<b>Recieved By:</b>
										<h6>Signature:__________________________</h6>
									</div>
									
								</div>
							</div>
							<div class='row'><div class='col-md-12'><br /></div></div>
						</div>
					</div>  
				</div>
				<div class='col-md-12'>
					<button onclick="window.location='payment-voucher-detail-print?salt=<?php echo $_GET['salt'];?>'" class="btn btn-primary pull-right"><i class='fa fa-print'></i> Print this document</button>
				</div>
            </div>
          


	
<?php 
		
		echo $static->jslib("inner");
?>
<!--Layout Script End -->
</body>

</html>