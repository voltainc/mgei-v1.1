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
<?php echo $static->sidebar("company_manage");?>
<!--Left navigation section end-->


<!--Page main section start-->
<section id="min-wrapper">
    <div id="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!--Top header start-->
                    <h3 class="ls-top-header">Manage Company</h3>
                    <!--Top header end -->

                    <!--Top breadcrumb start -->
                    <ol class="breadcrumb">
                        <li><a href="javascript:void(0)"><i class="fa fa-home"></i></a></li>
                        <li class="">Dashboard</li>
                        <li class="active">Company</li>
                    </ol>
                    <!--Top breadcrumb start -->
                </div>
            </div>
            <!-- Main Content Element  Start-->
           
                       <?php 
								$q = mysql_query("select * from company where created_by='{$_SESSION['clerk']['id']}'");
								if(mysql_num_rows($q)>0)
								{
								?>
									<div class="row">
										<div class="col-md-12">
											<div class="panel panel-default">
												<div class="panel-heading">
													<h3 class="panel-title"><i class='fa fa-cog'></i> Summary</h3>
												</div>
												<div class="panel-body">
													<!--Table Wrapper Start-->
													<div class="table-responsive ls-table">
														<table id="datatable" class="table table-bordered">
															<thead>
															<tr>
																<th class='text-center'><b>#</b></th>
																<th class='text-center'><b>COMPANY</b></th>
																<th class='text-center'><b>EMPLOYEE</b></th>
																<th class='text-center'><b>CREATED</b></th>
															</tr>
															</thead>
															<tbody>
															
																<?php 
																	$count=1;
																	
																	while($result = mysql_fetch_assoc($q)){
																		
																		?>
																		<tr>
																			<td class='text-center'><?php echo $count; ?></td>
																			<td class='text-center'><a href='company-detail?salt=<?php echo $result['salt'];?>'><?php echo $result['name']; ?></a></td>
																			<td class='text-center'><?php echo $member->count_employee($result['id']);?></td>
																			<td class='text-center'><?php echo date("d,M Y",strtotime($result['reg_date'])); ?></td>
																			
																		</tr>
																		<?php
																		
																	$count++;}
																	
																?>
															
															
															</tbody>
														</table>
													</div>
													<!--Table Wrapper Finish-->
												</div>
											</div>
										</div>
									</div>
								<?php 
								}
								else
								{
								?>
                                
									<blockquote>Empty</blockquote>
									
								<?php 
								}
								?>
                    

            <!-- Main Content Element  End-->

        </div>
    </div>



</section>
<!--Page main section end -->
<!--Right hidden  section start-->

<!--Right hidden  section end -->



<!--<div id="change-color">
    <div id="change-color-control">
        <a href="javascript:void(0)"><i class="fa fa-magic"></i></a>
    </div>
    <div class="change-color-box">
        <ul>
            <li class="default active"></li>
            <li class="red-color"></li>
            <li class="blue-color"></li>
            <li class="light-green-color"></li>
            <li class="black-color"></li>
            <li class="deep-blue-color"></li>
        </ul>
    </div>
</div>-->
</section>

<?php 
		
		echo $static->jslib("inner");
?>
<!--Layout Script End -->
</body>

</html>