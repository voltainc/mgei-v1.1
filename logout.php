<?php 
	session_start();
	switch(@$_REQUEST['act']){
		
		case "factory":
		
			if(isset($_SESSION['clerk'])){
			
			unset($_SESSION['clerk']);
			header('location:../');
			
			}else{
			
				header('location:404');
			
			}
			
		break;
		
		case "warehouse":
		
			if(isset($_SESSION['clerk-wh'])){
			
			unset($_SESSION['clerk-wh']);
			header('location:../login-wh');
			
			}else{
			
				header('location:404');
			
			}
			
		break;
		
		
	}
	
	
?>