<?php 
if(!isset($_REQUEST['inv'])){
	header("location:dashboard");
	exit();
}
require_once('assets/funcs.php');
$obj = new main();
$obj->check_sesh("clerk",array("pass"=>NULL,"fail"=>"../clerk"));
$obj->connect_db();
$member = new member();
$static = new static_content;
$invdtls = $member->retrieve(['act'=>'sale_invoice_details','inv'=>trim($_REQUEST['inv'])]);

$arr1=array();
$arr2=array();

$paid = $net = null;
	
	foreach($invdtls['sale_paid'] as $val){
		$arr1[] = ($val['paid']);
	}
	
$paid = array_sum($arr1);

	foreach($invdtls['sale_item'] as $val){
			$arr2[] = ($val['price']*$val['quantity']);
	}

$net = array_sum($arr2);
echo $static->head("inner");
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    			<h1 class="text-center"><b>AL - DAKHLIYA PLASTIC INDUSTRY</b></h1>
				<hr />
				<h3 class="pull-right">Invoice # <?php echo str_pad($invdtls['invoice_detail']['id'], 8, '0', STR_PAD_LEFT);?><br /><small class="pull-right"><?php echo date("d, M Y",strtotime($invdtls['invoice_detail']['reg_date']));?></small></h3>
    		
    		<div class="row">
    			<div class="col-xs-6">
    					<h3><?php echo ucwords($invdtls['customer_detail']['name']);?><br><small>Customer</small></h3>
						
    			</div>
    			
    		</div>
    		
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							  <th class="text-center">#</th>
																  <th class="text-center">Item</th>
																  <th class="text-center">Quantity</th>
																  <th class="text-center">Price (R.O)</th>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<?php
																	$i=1;
																	foreach($invdtls['sale_item'] as $val){
																			
																			?>
																				<tr>
																					<td class="text-center"><?php echo $i;?></td>
																					<td class="text-center"><?php echo $val['item']?></td>
																					<td class="text-center"><?php echo $val['quantity']?></td>
																					<td class="text-center"><?php echo $val['price']?></td>
																				</tr>
																			<?php
																		
																	}
																
																?>
    							<tr>
    								<td class="thick-line">&nbsp;</td>
    								<td class="thick-line">&nbsp;</td>
    								<td class="thick-line">&nbsp;</td>
    								<td class="thick-line">&nbsp;</td>
    							</tr>
								<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-right"><strong>SUBTOTAL</strong></td>
    								<td class="thick-line text-right">R.O <?php echo $net?></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-right"><strong>DISCOUNT</strong></td>
    								<td class="no-line text-right"><?php echo $invdtls['invoice_detail']['discount']?>%</td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-right"><strong>TOTAL</strong></td>
    								<td class="no-line text-right">R.O <?php echo $total = $net-(($net*$invdtls['invoice_detail']['discount'])/100);?></td>
    							</tr>
								
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>

<?php echo $static->jslib("inner");?>
