<?php $__TOKEN = "hardcoreshitbykernstudios"; require_once('../includes/_init.php'); 

if(isset($_POST['username']) AND isset($_POST['password'])){
$username = mssql_escape_string($_POST['username']);
$password = mssql_escape_string($_POST['password']);

$conn = sqlsrv_connect($__CONFIG['SQLHost'], array("Database"=>$__CONFIG['SQLDB'], "UID"=>$__CONFIG['SQLUID'], "PWD"=>$__CONFIG['SQLPWD']));
if(!$conn){
	echo 'error';
}else{
	$checkAccount = sqlsrv_query($conn, "SELECT * FROM tUser WHERE sUserID = ? AND sUserPW = ?;", array($username, md5($password)), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
	if(sqlsrv_num_rows($checkAccount) == 1){
		$fetchAccount = sqlsrv_fetch_array($checkAccount);
		$_SESSION['nUserNo'] = $fetchAccount['nUserNo'];
		echo 'ok';
	}else{
		echo 'wrong';
	}	
}
}else{
	echo 'error';
}
?>

