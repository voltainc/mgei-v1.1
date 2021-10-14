<?php require_once('assets/funcs.php');
$obj = new main();
$obj->check_sesh("clerk-wh",array("pass"=>NULL,"fail"=>"../clerk/login-wh"));
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
	
		echo $static->nav("inner-wh");
	
?>
<!--Navigation Top Bar End-->
<section id="main-container">

<!--Left navigation section start-->
<?php echo $static->sidebar_wh("dashboard");?>
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
            <!-- Main Content Element  Start-->
          
 <div class="row">
                     <div class="col-md-12 col-sm-12">
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
                    </div>
            <!-- Main Content Element  End-->

        </div>
    </div>



</section>
<!--Page main section end -->
<!--Right hidden  section start-->


</section>

<?php echo $static->jslib("inner-wh"); ?>
<script>recent_activities();</script>
<!--Layout Script End -->
</body>

</html>