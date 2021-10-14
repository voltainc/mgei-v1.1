<?php
// // require_once("assets/funcs.php");
// // $main = new main();
// // $member = new member();
// // $main->connect_db();
// // echo "<pre>";
// // print_r($member->retrieve(['act'=>'sale_invoice_details','inv'=>trim($_REQUEST['inv']),'type'=>'credit']));
// // echo "</pre>";
// // session_start();

// // // unset($_SESSION['purchase']);
// // print_r($_SESSION);

// // $arr = array([]);
// // $arr = (@trim($arr));
// // var_dump($arr);
 // // if (in_array(null, $arr, true) || in_array('', $arr, true)) {
    // // echo "empty";
  // // }else{
	  // // echo "not empty";
  // // }
  
  // // $float_val = 4.5;

// // echo (int)$float_val;

// $f = new NumberFormatter("en", NumberFormatter::SPELLOUT);
// echo $f->format(1432);
session_start();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
?>