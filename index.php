<?php
	session_start();
	include "lib/database.php";
	include "controller/logincontroller.php";
	include "controller/notecontroller.php";
	$db=new Database();
	if(isset($_GET['controller'])){
		$controller=$_GET['controller'];
	}else{
		$controller="";
	}
	switch($controller){
		case "note":{
			$notecontroller=new Notecontroller();
			break;
		}
		default:{
			$logincontroller=new Logincontroller();
			break;
		}
	}
?>