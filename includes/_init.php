<?php
if($__TOKEN = "hardcoreshitbykernstudios"){
	SESSION_START();
	
	$__CONFIG['SQLHost'] = '.\KSQL';
	$__CONFIG['SQLUID'] = 'sa';
	$__CONFIG['SQLPWD'] = '';
	$__CONFIG['SQLDB'] = 'Account';
	
	$_SITEURL = '';
	$_SITETITLE = 'KeRnFiesta';
	require_once("_functions.php");
	
	$conn = sqlsrv_connect($__CONFIG['SQLHost'], array("Database"=>$__CONFIG['SQLDB'], "UID"=>$__CONFIG['SQLUID'], "PWD"=>$__CONFIG['SQLPWD']));
	if(!$conn){
		die (sqlsrv_errors());
	}
}
?>