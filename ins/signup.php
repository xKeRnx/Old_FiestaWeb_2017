<?php $__TOKEN = "hardcoreshitbykernstudios"; require_once('../includes/_init.php'); 

if(isset($_POST['username']) AND isset($_POST['password']) AND isset($_POST['email'])){
$username = mssql_escape_string($_POST['username']);
$password = mssql_escape_string($_POST['password']);
$email = mssql_escape_string($_POST['email']);

				if(filter_var($email, FILTER_VALIDATE_EMAIL)){
					if (strpos($email,'trbvm') !== false) {
						echo 'error';
					}else{
							$checkAccount = sqlsrv_query($conn, "SELECT * FROM tUser WHERE sUserID = ? OR sEmail = ?;", array($username, $email), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
							if(sqlsrv_num_rows($checkAccount) == 0){
								$insertAccount = sqlsrv_query($conn, "INSERT INTO Account..tUser (sUserID, sUserPW, sUserIP, sUserName, sEmail) VALUES (?, ?, ?, ?, ?);", array($username, md5($password), getRemoteIP(), $username, $email));
								if(!$insertAccount)
								{
									echo 'error';
								}else{
									if($insertAccount){
										echo 'ok';
									}else{
										echo 'error';
									}
								}
							}else{
								echo 'exist';
							}
					}
				}else{
					echo 'error';
				}
}else{
	echo 'error';
}
?>

