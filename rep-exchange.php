<?php 
require_once('assets/funcs.php');
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
		echo $static->head("tabletools");
?>
<link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css' />
						
<style>
table tfoot {
    display: table-row-group;
}
</style>
<body class="">
<!--Navigation Top Bar Start-->
<?php 
	
		echo $static->nav("inner");
	
?>
<!--Navigation Top Bar End-->
<section id="main-container">

<!--Left navigation section start-->
<?php echo $static->sidebar("rep-exchange");?>
<!--Left navigation section end-->


<!--Page main section start-->
<section id="min-wrapper">
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--Top header start-->
                    <h3 class="ls-top-header"><i class='fa fa-codepen'></i> Inventory <i class="fa fa-angle-double-right"></i>  Purchase <i class="fa fa-angle-double-right"></i> Item</h3>
                    <!--Top header end -->

                    <!--Top breadcrumb start -->
                    <ol class="breadcrumb">
                        <li><a href="javascript:void(0)"><i class="fa fa-home"></i></a></li>
                        <li><a href='dashboard'>Dashboard</a></li>
                        <li><a href='company'>Company</a></li>
                        <li><a href="employee">Employee</a></li>
                        <li><a href="attendance">Payroll</a></li>
                        <li><a href="payment-voucher">Voucher</a></li>
                        <li class="active">Inventory</li>
                    </ol>
                    <!--Top breadcrumb start -->
                </div>
            </div>
            <!-- Main Content Element  Start-->
									
					  <div class="row">
					  <div data-toggle="modal" data-target="#add_item" class="col-md-3 col-sm-6">
                            <div class="ls-wizard label-red margin-top-iPad-15">
                                <h2>Item <small>(<?php echo $member->total_item_purchase($_SESSION['clerk']['id']);?>) Total</small></h2>
                                <span style="font-size:23px;">Add Item</span>
                                <div class="icon">
                                    <i class="fa fa-codepen"></i>
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
						<div onclick="window.location='employee'" class="col-md-3 col-sm-6">
                            <div class="ls-wizard">
                                <h2>Employee <small>(<?php echo $member->total_employee($_SESSION['clerk']['id']);?>) Total</small></h2>
                                <span style="font-size:23px;">Manage employee</span>
                                <div class="icon">
                                    <i class="fa fa-user"></i>
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
                        
                    </div>
					<hr />
					<div class="block">
					<div class="col-md-3">
						<div class="form-group">
							<label>Select Company</label>
							<select type="text" class="form-control" id="curr_company">
								<?php $member->retrieve(['act'=>'list_company']);?>
							</select>
						</div>
					</div>
					
					<div class="col-md-2">
						<div class="form-group">
							<label>Report</label>
							<select type="text" class="form-control" id="report_type" onchange=retrieve({'act':'toggle_cust_supp'})>
								<option value="sale">Sale<option>
								<option value="purchase">Purchase<option>
							</select>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label id="cust_supp_txt">Select Customer</label>
							<span id="cust_supp_data">
								<?php $member->retrieve(['act'=>'customer_all_esp']);?>
							</span>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label>From</label>
							<input type="text" autocomplete="off"  id="from" class="form-control datepicker"  />
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label>To</label>
							<input type="text" autocomplete="off"  id="to" class="form-control datepicker"  />
						</div>
					</div>
					<div class="col-md-1">
						<div class="form-group">
							<label>Action</label>
							<a href="javascript:void(0)" class="btn ls-light-blue-btn btn-round" onclick=retrieve({'act':'fetch_report'})>Submit</a>
						</div>
					</div>
					</div>
					<div class="block col-md-12" id="report_data"></div>
        </div>
    </div>

</section>
	
	
	
</section>
	
<?php 
		
		echo $static->jslib("inner");
		echo $static->jslib("tabletools");
?>

<!--Layout Script End -->
</body>

</html>