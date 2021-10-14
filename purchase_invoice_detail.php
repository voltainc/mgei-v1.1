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
$invdtls = $member->retrieve(['act'=>'purchase_invoice_details','inv'=>trim($_REQUEST['inv'])]);
if(isset($_POST['upload'])){
	
	
	$status = ($member->upload($_FILES['document'],"uploads/invoice/purchase",$invdtls['invoice_detail']['id']));
	if($status['status']=="success"){
		
			$msgbox = "<div class='alert alert-success'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <strong><i class='fa fa-check-circle'></i> Success</strong> {$status['message']}
                                    </div>";
		
	}else{
	
			$msgbox = "<div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                                        <strong><i class='fa fa-times-circle'></i> Error</strong> {$status['message']}
                                    </div>";
	}
}if(isset($_POST['remove_document']))
	{
		$path = @trim($_POST['remove_document']);
		if(!empty($path))
		{
			if(unlink($path))
			{
					$msgbox = "<div class='alert alert-success'>                                        
					<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
					<strong><i class='fa fa-check-circle'></i> Success (نجاح) </strong> Document removed.
					</div>";
			}else
			{
						$msgbox = "<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<strong><i class='fa fa-times-circle'></i> Error (خطأ) </strong> Error while deleting document.
						</div>";
			}
		}else
		{
						$msgbox = "<div class='alert alert-danger'>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
						<strong><i class='fa fa-times-circle'></i> Error (خطأ) </strong> Invalid path supplied.
						</div>";
		}	
	}


// echo "<pre>";
// print_r($invdtls);
// echo "</pre>";
// exit();
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
                    <h3 class="ls-top-header" id="noprint">Purchase Details</h3>
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
								<div class="panel-heading">
									<h6 class="panel-title">Purchase Invoice
										<button class="btn btn-danger btn-xs pull-right" data-toggle="modal" data-target="#discard" onclick=$("#pur_discard_inv").attr("onclick","retrieve({'act':'pur_discard_inv','inv':'<?php echo $invdtls['invoice_detail']['id']?>'})")>Discard</button>
									</h6>
									
								</div>

								<div class="panel-body">

									<div class="row">
										<div class="col-md-10">
											<h3><a href='supplier-detail?salt=<?php echo $invdtls['supplier_detail']['salt'];?>'><?php echo ucwords($invdtls['supplier_detail']['name'])?></a><br /><small><?php echo date("d, M Y",strtotime($invdtls['invoice_detail']['reg_date']));?></small></h3>
											
										</div>

										<div class="col-md-2">
												<span><h3>Invoice : <strong class="text-danger"><?php echo str_pad($invdtls['invoice_detail']['id'], 8, '0', STR_PAD_LEFT);?></strong></h3></span>
										</div>
										
									</div>


									<div class="row">
										
									</div>

								</div>

								<div class="panel-body">
									
									<div class="row">
										<div class="col-md-12">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title">Details<a class="btn btn-info btn-xs pull-right" href="purchase_invoice_detail_print?inv=<?php echo $invdtls['invoice_detail']['id'];?>">Print</a></h3>
												</div>
												<div class="panel-body">
													<!--Table Wrapper Start-->
													<div class="table-responsive ls-table">
														<table class="table">
															<thead>
																<tr>
																  <th>Items</th>
																  <th>Net</th>
																  <th>Discount</th>
																  <th>Total</th>
																  <th>Paid</th>
																  <th>Remaining</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	$i=1;
																?>
																<tr>
																	<td><?php echo count($invdtls['purchase_item']);?></td>
																	<td><?php echo $invdtls['net']; ?></td>
																	<td><?php echo $invdtls['invoice_detail']['discount'];echo $invdtls['invoice_detail']['discount_type']=="percentage"? "%" : "" ;?></td>
																	<td><?php echo $invdtls['total'];?></td>
																	<td><?php echo $invdtls['paid'];?></td>
																	<td><?php echo $invdtls['remaining'];?></td>
																</tr>
															</tbody>
														</table>
													</div>
													<!--Table Wrapper Finish-->
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title">Item</h3>
												</div>
												<div class="panel-body">
													<!--Table Wrapper Start-->
													<div class="table-responsive ls-table">
														<table class="table">
															<thead>
																<tr>
																  <th>SKU</th>
																  <th>Item</th>
																  <th>Quantity</th>
																  <th>Volume/Unit</th>
																  <th>Volume Total</th>
																  <th>Price/Unit</th>
																  <th>Price Total</th>
																  <!--<th>Option</th>-->
																</tr>
															</thead>
															<tbody>
																<?php
																	
																	foreach($invdtls['purchase_item'] as $val){
																			
																			?>
																				<tr>
																					<td><?php echo $val['id'];?></td>
																					<td><?php echo ucwords($member->ret_by("item_purchase","id",$val['item'],"name"));?></td>
																					<td><?php echo $val['quantity']?></td>
																					<td><?php echo $val['volume']." ".ucwords($member->ret_by("unit","id",$val['unit'],"name"));?></td>
																					<td><?php echo ($val['volume']*$val['quantity'])." ".ucwords($member->ret_by("unit","id",$val['unit'],"name"));?></td>
																					<td><?php echo $val['price']?></td>
																					<td><?php echo $val['price']*$val['quantity']?></td>
																					<!--<td><button onclick=$("#pur_rem_item").attr("onclick","retrieve({'act':'pur_rem_item','item':'<?php echo $val['id']; ?>'})") data-toggle="modal" data-target="#remove" class="btn btn-danger btn-xs"><i class='fa fa-times'></i></button></td>-->
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
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title">Payment
														<button onclick=$("#pur_add_paid").attr("onclick","retrieve({'act':'pur_add_paid','inv':'<?php echo $invdtls['invoice_detail']['id']; ?>','remaining':<?php echo $invdtls['remaining'];?>})") data-toggle="modal" data-target="#add" class="btn btn-success btn-xs pull-right">Add</button>
													</h3>
												</div>
												<div class="panel-body">
													<!--Table Wrapper Start-->
													<div class="table-responsive ls-table">
														<table class="table">
															<thead>
																<tr>
																  <th>#</th>
																  <th>Paid</th>
																  <th>Type</th>
																  <th>Description</th>
																  <th>Date</th>
																  <th>Action</th>
																</tr>
															</thead>
															<tbody>
																<?php
																	$i=1;
																		foreach($invdtls['purchase_paid'] as $val){
																				$type = $val['type']=="cheque" ? "<a href=javascript:void(0) onclick=retrieve({'act':'purchase_cheque_detail','inv':{$val['inv']},'purchase_paid_id':{$val['id']}}) data-toggle='modal' data-target='#cheque_detail'>{$val['type']}</a>" : $val['type'];
																				?>
																					<tr>
																						<td><?php echo $i;?></td>
																						<td><?php echo $val['paid']?></td>
																						<td><?php echo $type; ?></td>
																						<td><?php echo $val['description'];?></td>
																						<td>
																							<?php echo date("d, M Y",strtotime($val['reg_date']));?>
																						</td>
																						<td><button onclick=$("#pur_rem_item").attr("onclick","retrieve({'act':'pur_rem_paid','paid':'<?php echo $val['id']; ?>'})") data-toggle="modal" data-target="#remove" class="btn btn-danger btn-xs"><i class='fa fa-times'></i></button></td>
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
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title"><i class="fa fa-archive"></i> Documents</h3>
														<ul class="panel-control">
															<li><a data-toggle="modal" data-target="#upload" class="label label-success refresh" href="javascript:void(0)"><i class="fa fa-upload white"></i></a>&nbsp;&nbsp;</li>
															<li><a class="minus" href="javascript:void(0)"><i class="fa fa-minus"></i></a></li>
															<li><a class="close-panel" href="javascript:void(0)"><i class="fa fa-times"></i></a></li>
														</ul>
												</div>
												<div class="panel-body">
													<!--Table Wrapper Start-->
													 <div class="feed-box">
                                            <ul class="ls-feed">
                                                <?php 
													
													$docs = @$member->dirToArray("uploads/invoice/purchase/{$invdtls['invoice_detail']['id']}");
													if(!empty($docs))
													{
														foreach($docs as $val)
														{
												?>
														<li> 
															<span class="label label-primary">
																<i class="fa fa-download white"></i>
															</span>
															<a href="javascript:void(0)" onclick="OpenInNewTab('<?php echo "uploads/invoice/purchase/{$invdtls['invoice_detail']['id']}/{$val}";?>')"><?php echo $val; ?></a>
															<a title='Remove (نزع)' class="text-danger" href="javascript:void(0)" data-toggle="modal" data-target="#unlink" onclick="clip_value('remove_document','<?php echo "uploads/invoice/purchase/{$invdtls['invoice_detail']['id']}/{$val}";?>')"><span class="date"><i class='fa fa-times-circle'></i></span></a>
														</li>
												<?php 
														}
													}else{
														?>
															<li> 
																<span class="label label-primary">
																	<i class="fa fa-exclamation-circle white"></i>
																</span>
																Empty
																
															</li>
														<?php
													}
												?>
                                            </ul>
                                        </div>
													<!--Table Wrapper Finish-->
												</div>
											</div>
										</div>
									</div>
									<div class="row invoice-payment">
										<div class="col-sm-8">
											<h6 class="text-success"><i class="icon-checkmark3"></i> Created on <?php echo date("d, M Y",strtotime($invdtls['invoice_detail']['reg_date']));?></h6>
											
										</div>

										
									</div>
									
									
									
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
<div class="modal fade" id="discard" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header label-red white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModaDanger">Warning</h4>
                </div>
                <div class="modal-body">
						<p>Are you sre you want to delete this item?<br />Removing this item will cause the following changes</p>
						<ul>
							<li>Invoice data will be lost and cannot be recovered</li>
						</ul>
						
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn ls-red-btn btn-xs" id="pur_discard_inv" data-dismiss="modal">Proceed</button>
					<button type="button" class="btn btn-xs" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
</div>

<div class="modal fade" id="remove" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header label-red white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModaDanger">Warning</h4>
                </div>
                <div class="modal-body">
						<p>Are you sre you want to delete this item?<br />Removing this item will cause the following changes</p>
						<ul>
							<li>Invoice(s) data lost priorly related to this item</li>
							<li>Report(s) data lost priorly related to this item</li>
						</ul>
						
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn ls-red-btn btn-xs" id="pur_rem_item" data-dismiss="modal">Proceed</button>
					<button type="button" class="btn btn-xs" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
</div>

<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header label-green white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModaDanger">Payment</h4>
                </div>
                <div class="modal-body">
					<div class='row'>
					<span id="payment_add_notify"></span>
					<div class='col-md-12'>
						
						<div class="form-group">
							<label>Payment method</label>
							<select onchange=retrieve({'act':'payment_type'}) id="payment_type" class="form-control">
								<option value="cash">Cash</option>
								<option value="cheque">Cheque</option>
							</select>
						</div>
						<hr />
						<div id="payment_type_body">
						
							<div class="form-group">
							  <label>Amount</label>
							  <input id="pur_paid_amt" type="number" class="form-control" placeholder="Enter Payment">
							</div>
							<div class="form-group">
											<label>Description</label>
											<textarea type="text" id="description" class="form-control" placeholder="Enter Description"></textarea>
										</div>
								
						</div>
											
					</div>
					
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn ls-green-btn btn-xs" id="pur_add_paid">Add</button>
					<button type="button" class="btn btn-xs" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
</div>

<div class="modal fade" id="cheque_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header label-green white">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModaDanger">Cheque Detail</h4>
                </div>
                <div class="modal-body" id="cheque_detail_data"></div>
                <div class="modal-footer">
					<button type="button" class="btn btn-xs" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
</div>

<div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header label-primary white">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" >Upload Document</h4>
			</div>
			<div class="modal-body">
				<div class="block"> 
					<form method="POST" enctype='multipart/form-data'>
						<div class="panel-body">
							<div class="ls_form">
								<div class='col-md-12'>
									<div class="form-group">
										<label>Document *</label>
										<input name="document" type="file" class="form-control">
									</div>
									<div class="form-group">
										<button name='upload' class='btn btn-primary full-width'>Upload Document</button>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<div class="modal fade" id="unlink" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
			<div class="modal-content">
					<div class="modal-header label-primary white">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" >Remove Document (نزع)</h4>
					</div>
					<div class="modal-body">
						<div class="block">
							<span class="text-danger">
								<p><h4>Are you sure you want to remove this document ?</h4></p>
								<p>Deleting this document will result in the following effects :</p>
								<ul>
								<li>The data associated with the document will be lost.</li>
								</ul>
								<p><i class='fa fa-warning'></i> Caution : This effect is irreversible i.e once the doucment is removed the data associated with it is destroyed and cannot be restored.</p>
							</span>
						</div>
					</div>
					<div class="modal-footer">
						<form method="POST"><button type="submit" id="remove_document" name="remove_document" type="button" class="btn btn-success btn-xs">Remove (نزع) </button>
						<button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Close (أغلق) </button></form>
					</div>
			</div>
		</div>
</div>	


<!--Layout Script start -->
<?php echo $static->jslib("inner");?>

<!--Layout Script End -->
</body>

</html>