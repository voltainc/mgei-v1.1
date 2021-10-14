<?php 
require_once('assets/funcs.php');
$obj = new main();
$obj->check_sesh("clerk",array("pass"=>NULL,"fail"=>"../clerk"));
$obj->connect_db();
$member = new member();
$static = new static_content;
$settings = $member->retrieve(['act'=>'get_settings']);

?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<?php 
		
		echo $static->head("inner");
		echo $static->head("tabletools");
?>

<body class="">
<!--Navigation Top Bar Start-->
<?php 
	
		echo $static->nav("inner");
	
?>
<!--Navigation Top Bar End-->
<section id="main-container">

<!--Left navigation section start-->
<?php echo $static->sidebar("rep-sale-return-wh");?>
<!--Left navigation section end-->


<!--Page main section start-->
<section id="min-wrapper">
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--Top header start-->
                    <h3 class="ls-top-header"><i class='fa fa-codepen'></i> Inventory <i class="fa fa-angle-double-right"></i> Item</h3>
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
									
					 
					
					<div class="block">
					<div class="col-md-5">
						<div class="form-group">
							<label>Select Company</label>
							<select type="text" class="form-control" id="curr_company">
								<?php $member->retrieve(['act'=>'list_company']);?>
							</select>
						</div>
					</div>
					
					<div class="col-md-3">
						<div class="form-group">
							<label>From</label>
							<input type="text" autocomplete="off"  id="from" class="form-control datepicker"  />
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>To</label>
							<input type="text" autocomplete="off"  id="to" class="form-control datepicker"  />
						</div>
					</div>
					<div class="col-md-1">
						<div class="form-group">
							<label>Action</label>
							<a href="javascript:void(0)" class="btn ls-light-blue-btn btn-round" onclick=retrieve({'act':'fetch_report_sale_return_wh'})>Submit</a>
						</div>
					</div>
					</div>
					<div class="block col-md-12" id="report_data"></div>

            <!-- Main Content Element  End-->

        </div>
    </div>

</section>
	
	
	
</section>
	
<?php 
		
		echo $static->jslib("inner");
		echo $static->jslib("tabletools");
?>

<script>
$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>
<!--Layout Script End -->
</body>

</html>