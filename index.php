<?php require_once('assets/funcs.php');
$obj = new main();
$obj->check_sesh("clerk",array("pass"=>"dashboard","fail"=>NULL));
$obj->connect_db();
$member = new member();
if(isset($_POST['login']))
	{
		$val = $member->verify_login($_POST['username'],$_POST['password'],"clerk");
		
			if($val['status']=='success'){
				$obj->create_sesh(array("sesh"=>"clerk","value"=>$val['message']),"dashboard");
			}else{
				
				 $msgbox = " <div class='alert alert-danger'>
                                        <button type='button' class='close' data-dismiss='alert'
                                                aria-hidden='true'>&times;</button>
                                        <i class='fa fa-warning'></i> {$val['message']}
                                    </div>";
			}
		
	}
$static = new static_content();

?>
<!DOCTYPE html>
<html lang="en">

<?php echo $static->head("inner");?>
<body class="login-screen">
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="login-box">
                    <div class="login-content">
					<?php if(isset($msgbox)){echo $msgbox;}?>
                        <div class="login-user-icon">
                            <i class="glyphicon glyphicon-user"></i>

                        </div>
                        <h3>Identify Yourself</h3>
                        
                    </div>

                    <div class="login-form">
                        <form action="" method="POST">
                            <div class="input-group ls-group-input">
                                <input name="username" class="form-control" type="text" placeholder="Username">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            </div>


                            <div class="input-group ls-group-input">

                                <input type="password" placeholder="Password" name="password" class="form-control" value="">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            </div>

                            <div class="remember-me">
                                <input class="switchCheckBox" type="checkbox" checked data-size="mini"
                                       data-on-text="<i class='fa fa-check'><i>"
                                       data-off-text="<i class='fa fa-times'><i>">
                                <span>Remember me</span>
                            </div>
                            <div class="input-group ls-group-input login-btn-box">
                                <button name="login" class="btn ls-dark-btn col-md-12 col-sm-12 col-xs-12">
                                    <span class="ladda-label"><i class="fa fa-key"></i></span>
                                </button>

                                <a class="" href="login-wh">WAREHOUSE <i class="fa fa-arrow-circle-o-right"></i></a>
                            </div>
                        </form>
                    </div>
                    <div class="forgot-pass-box">
                        <form action="" class="form-horizontal ls_form">
                            <div class="input-group ls-group-input">
                                <input class="form-control" type="text" placeholder="someone@mail.com">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            </div>
                            <div class="input-group ls-group-input login-btn-box">
								<button class="btn ls-dark-btn col-md-12 col-sm-12 col-xs-12">Send</button>
								<a class="login-view" href="javascript:void(0)"><i class="fa fa-arrow-left"></i>&nbsp;back</a>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <p class="copy-right big-screen hidden-xs hidden-sm">
        <span>&#169;</span> IMS <span class="footer-year"><?php echo date("Y"); ?></span>
    </p>
</section>

</body>

<?php echo $static->jslib("inner");?>

</html>