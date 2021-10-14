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
<?php echo $static->sidebar("dashboard");?>
<!--Left navigation section end-->


<!--Page main section start-->
<section id="min-wrapper">
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--Top header start-->
                    <h3 class="ls-top-header">Dashboard (بداية)</h3>
                    <!--Top header end -->

                    <!--Top breadcrumb start -->
                    <ol class="breadcrumb">
                        <li><a href="javascript:void(0)"><i class="fa fa-home"></i></a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                    <!--Top breadcrumb start -->
                </div>
            </div>
			<?php 
				
				$exec = $member->val_company_esp();
				if(!$exec){
					?>
						<blockquote>Please add a Company to continue</blockquote>
					<?php
					die();
				}
			
			?>
            <!-- Main Content Element  Start-->
           <div class="row">
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
                        <div onclick="window.location='payment-voucher'" class="col-md-3 col-sm-6">
                            <div class="ls-wizard label-red margin-top-iPad-15">
                                <h2>Voucher <small>(<?php echo $member->total_voucher($_SESSION['clerk']['id']);?>) Total</small></h2>
                                <span style="font-size:23px;">Manage voucher</span>
                                <div class="icon">
                                    <i class="fa fa-ticket"></i>
                                </div>
                            </div>
                        </div>
                    </div>
					<hr />
 <div class="row">
                     <div class="col-md-6 col-sm-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bell-o"></i> Notifications (الإشعارات) </h3>
                                    <ul class="panel-control">
                                        <li><a class="minus" href="javascript:void(0)"><i class="fa fa-minus"></i></a></li>
                                        <li><a class="refresh" href="javascript:void(0)" onclick="notifications()"><i class="fa fa-refresh"></i></a></li>
                                        <li><a class="close-panel" href="javascript:void(0)"><i class="fa fa-times"></i></a></li>
                                    </ul>
                            </div>
                            <div class="panel-body no-padding">
                                <div class="nano nano-recent-activities">
                                    <div class="nano-content nano-activities">
                                        <div class="feed-box">
                                            <ul id="notifications" class="ls-feed">

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
						
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o"></i> Recent Activities (لنشاط الأخير) </h3>
                                    <ul class="panel-control">
                                        <li><a class="minus" href="javascript:void(0)"><i class="fa fa-minus"></i></a></li>
                                        <li><a class="refresh" href="javascript:void(0)" onclick="recent_activities()"><i class="fa fa-refresh"></i></a></li>
                                        <li><a class="close-panel" href="javascript:void(0)"><i class="fa fa-times"></i></a></li>
                                    </ul>
                            </div>
                            <div class="panel-body no-padding">
                                <div class="nano nano-recent-activities">
                                    <div class="nano-content nano-activities">
                                        <div class="feed-box">
                                            <ul id="recent_activities" class="ls-feed">

                                            </ul>
                                        </div>
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


</section>

<?php 
		
		echo $static->jslib("inner");
?>
<script>recent_activities();notifications();</script>
<!--Layout Script End -->
</body>

</html>