<?php
// 4 = ok || 3 = chargeback
$__TOKEN = "hardcoreshitbykernstudios";
require_once('includes/_init.php');
/**  
 *  Pingback Listener Script
 *  For Virtual Currency API
 *  Copyright (c) 2010-2013 Paymentwall Team
 */
 
/**  
 *  Define your application-specific options
 */
define('SECRET', ''); // secret key of your application
define('IP_WHITELIST_CHECK_ACTIVE', true);

define('CREDIT_TYPE_CHARGEBACK', 2);

/**  
 *  The IP addresses below are Paymentwall's
 *  servers. Make sure your pingback script
 *  accepts requests from these addresses ONLY.
 *
 */
$ipsWhitelist = array(
    '174.36.92.186',
    '174.36.96.66',
    '174.36.92.187',
    '174.36.92.192',
    '174.37.14.28',
	'216.127.71.0',
	'216.127.71.1',
	'216.127.71.2',
	'216.127.71.3',
	'216.127.71.4',
	'216.127.71.5',
	'216.127.71.6',
	'216.127.71.7',
	'216.127.71.8',
	'216.127.71.9',
	'216.127.71.10',
	'216.127.71.11',
	'216.127.71.12',
	'216.127.71.13',
	'216.127.71.14',
	'216.127.71.15',
	'216.127.71.16',
	'216.127.71.17',
	'216.127.71.18',
	'216.127.71.19',
	'216.127.71.20',
	'216.127.71.21',
	'216.127.71.22',
	'216.127.71.23',
	'216.127.71.24',
	'216.127.71.25',
	'216.127.71.26',
	'216.127.71.27',
	'216.127.71.28',
	'216.127.71.29',
	'216.127.71.30',
	'216.127.71.31',
	'216.127.71.32',
	'216.127.71.33',
	'216.127.71.34',
	'216.127.71.35',
	'216.127.71.36',
	'216.127.71.37',
	'216.127.71.38',
	'216.127.71.39',
	'216.127.71.40',
	'216.127.71.41',
	'216.127.71.42',
	'216.127.71.43',
	'216.127.71.44',
	'216.127.71.45',
	'216.127.71.46',
	'216.127.71.47',
	'216.127.71.48',
	'216.127.71.49',
	'216.127.71.50',
	'216.127.71.51',
	'216.127.71.52',
	'216.127.71.53',
	'216.127.71.54',
	'216.127.71.55',
	'216.127.71.56',
	'216.127.71.57',
	'216.127.71.58',
	'216.127.71.59',
	'216.127.71.60',
	'216.127.71.61',
	'216.127.71.62',
	'216.127.71.63',
	'216.127.71.64',
	'216.127.71.65',
	'216.127.71.66',
	'216.127.71.67',
	'216.127.71.68',
	'216.127.71.69',
	'216.127.71.70',
	'216.127.71.71',
	'216.127.71.72',
	'216.127.71.73',
	'216.127.71.74',
	'216.127.71.75',
	'216.127.71.76',
	'216.127.71.77',
	'216.127.71.78',
	'216.127.71.79',
	'216.127.71.80',
	'216.127.71.81',
	'216.127.71.82',
	'216.127.71.83',
	'216.127.71.84',
	'216.127.71.85',
	'216.127.71.86',
	'216.127.71.87',
	'216.127.71.88',
	'216.127.71.89',
	'216.127.71.90',
	'216.127.71.91',
	'216.127.71.92',
	'216.127.71.93',
	'216.127.71.94',
	'216.127.71.95',
	'216.127.71.96',
	'216.127.71.97',
	'216.127.71.98',
	'216.127.71.99',
	'216.127.71.100',
	'216.127.71.101',
	'216.127.71.102',
	'216.127.71.103',
	'216.127.71.104',
	'216.127.71.105',
	'216.127.71.106',
	'216.127.71.107',
	'216.127.71.108',
	'216.127.71.109',
	'216.127.71.110',
	'216.127.71.111',
	'216.127.71.112',
	'216.127.71.113',
	'216.127.71.114',
	'216.127.71.115',
	'216.127.71.116',
	'216.127.71.117',
	'216.127.71.118',
	'216.127.71.119',
	'216.127.71.120',
	'216.127.71.121',
	'216.127.71.122',
	'216.127.71.123',
	'216.127.71.124',
	'216.127.71.125',
	'216.127.71.126',
	'216.127.71.127',
	'216.127.71.128',
	'216.127.71.129',
	'216.127.71.130',
	'216.127.71.131',
	'216.127.71.132',
	'216.127.71.133',
	'216.127.71.134',
	'216.127.71.135',
	'216.127.71.136',
	'216.127.71.137',
	'216.127.71.138',
	'216.127.71.139',
	'216.127.71.140',
	'216.127.71.141',
	'216.127.71.142',
	'216.127.71.143',
	'216.127.71.144',
	'216.127.71.145',
	'216.127.71.146',
	'216.127.71.147',
	'216.127.71.148',
	'216.127.71.149',
	'216.127.71.150',
	'216.127.71.151',
	'216.127.71.152',
	'216.127.71.153',
	'216.127.71.154',
	'216.127.71.155',
	'216.127.71.156',
	'216.127.71.157',
	'216.127.71.158',
	'216.127.71.159',
	'216.127.71.160',
	'216.127.71.161',
	'216.127.71.162',
	'216.127.71.163',
	'216.127.71.164',
	'216.127.71.165',
	'216.127.71.166',
	'216.127.71.167',
	'216.127.71.168',
	'216.127.71.169',
	'216.127.71.170',
	'216.127.71.171',
	'216.127.71.172',
	'216.127.71.173',
	'216.127.71.174',
	'216.127.71.175',
	'216.127.71.176',
	'216.127.71.177',
	'216.127.71.178',
	'216.127.71.179',
	'216.127.71.180',
	'216.127.71.181',
	'216.127.71.182',
	'216.127.71.183',
	'216.127.71.184',
	'216.127.71.185',
	'216.127.71.186',
	'216.127.71.187',
	'216.127.71.188',
	'216.127.71.189',
	'216.127.71.190',
	'216.127.71.191',
	'216.127.71.192',
	'216.127.71.193',
	'216.127.71.194',
	'216.127.71.195',
	'216.127.71.196',
	'216.127.71.197',
	'216.127.71.198',
	'216.127.71.199',
	'216.127.71.200',
	'216.127.71.201',
	'216.127.71.202',
	'216.127.71.203',
	'216.127.71.204',
	'216.127.71.205',
	'216.127.71.206',
	'216.127.71.207',
	'216.127.71.208',
	'216.127.71.209',
	'216.127.71.210',
	'216.127.71.211',
	'216.127.71.212',
	'216.127.71.213',
	'216.127.71.214',
	'216.127.71.215',
	'216.127.71.216',
	'216.127.71.217',
	'216.127.71.218',
	'216.127.71.219',
	'216.127.71.220',
	'216.127.71.221',
	'216.127.71.222',
	'216.127.71.223',
	'216.127.71.224',
	'216.127.71.225',
	'216.127.71.226',
	'216.127.71.227',
	'216.127.71.228',
	'216.127.71.229',
	'216.127.71.230',
	'216.127.71.231',
	'216.127.71.232',
	'216.127.71.233',
	'216.127.71.234',
	'216.127.71.235',
	'216.127.71.236',
	'216.127.71.237',
	'216.127.71.238',
	'216.127.71.239',
	'216.127.71.240',
	'216.127.71.241',
	'216.127.71.242',
	'216.127.71.243',
	'216.127.71.244',
	'216.127.71.245',
	'216.127.71.246',
	'216.127.71.247',
	'216.127.71.248',
	'216.127.71.249',
	'216.127.71.250',
	'216.127.71.251',
	'216.127.71.252',
	'216.127.71.253',
	'216.127.71.254',
	'216.127.71.255',
	'82.165.67.50'
);

/**  
 *  Collect the GET parameters from the request URL
 */
$userId = isset($_GET['uid']) ? $_GET['uid'] : null;
$credits = isset($_GET['currency']) ? $_GET['currency'] : null;
$type = isset($_GET['type']) ? $_GET['type'] : null;
$refId = isset($_GET['ref']) ? $_GET['ref'] : null;
$signature = isset($_GET['sig']) ? $_GET['sig'] : null;
$sign_version = isset($_GET['sign_version']) ? $_GET['sign_version'] : null;

$result = false;

/**  
 *  If there are any errors encountered, the script will list them
 *  in an array.
 */
$errors = array ();

if (!empty($userId) && !empty($credits) && isset($type) && !empty($refId) && !empty($signature)) {
    $signatureParams = array();
    
    /** 
     *  version 1 signature
     */
    if (empty($sign_version) || $sign_version <= 1) {
         $signatureParams = array(
            'uid' => $userId,
            'currency' => $credits,
            'type' => $type,
            'ref' => $refId
        );
    }
    /** 
     *  version 2+ signature
     */
    else {
        $signatureParams = array();
        foreach ($_GET as $param => $value) {    
            $signatureParams[$param] = $value;
        }
        unset($signatureParams['sig']);
    }
    
    /** 
     *  check if IP is in whitelist and if signature matches    
     */
    $signatureCalculated = calculatePingbackSignature($signatureParams, SECRET, $sign_version);
    
    /** 
     *  Run the security check -- if the request's origin is one
     *  of Paymentwall's servers, and if the signature matches
     *  the parameters.
     */
    if (!IP_WHITELIST_CHECK_ACTIVE || in_array(getRemoteIP(), $ipsWhitelist)) {
        if ($signature == $signatureCalculated) {
            $result = true;
            if ($type == CREDIT_TYPE_CHARGEBACK) {
				/** 
				*  Deduct credits from user. Note that currency amount
				*  sent for chargeback is negative, e.g. -5, so be
				*  careful about the sign Don't deduct negative
				*  number, otherwise user will gain credits instead
				*  of losing them
				*
				*/
				$conn = sqlsrv_connect($__CONFIG['SQLHost'], array('UID' => $__CONFIG['SQLUID'], 'PWD' => $__CONFIG['SQLPWD'], 'Database' => $__CONFIG['SQLDB']));
				if (!$conn){
					$result = false;
				}else{
					$nUserNo = mssql_escape_string($userId);
					$coins = mssql_escape_string($credits);
					$refID = mssql_escape_string($refId);
					$checkAccount = sqlsrv_query($conn, "SELECT * FROM tUser WHERE nUserNo = ?;", array($nUserNo), array("Scrollable" => SQLSRV_CURSOR_KEYSET));
					if(sqlsrv_num_rows($checkAccount) == 1){
						$updateCoins = sqlsrv_query($conn, "UPDATE tUser SET nAGPoints = nAGPoints + ? WHERE nUserNo = ?;", array($coins, $nUserNo));
						$insertLog = sqlsrv_query($conn, "INSERT INTO tDonationHistory (nEMID, nCoins, nStatus, nRefID) VALUES (?, ?, 3, ?);", array($nUserNo, $coins, $refID));
						if (!$updateCoins || !$insertLog){
							$errors['SQLDB'] = print_r(sqlsrv_errors(), true);
							$result = false;
						}
					}else{
						$errors['Account'] = 'Account not exists!';
						$result = false;
					}
				}
            } else {
                // Give credits to user
				$conn = sqlsrv_connect($__CONFIG['SQLHost'], array('UID' => $__CONFIG['SQLUID'], 'PWD' => $__CONFIG['SQLPWD'], 'Database' => $__CONFIG['SQLDB']));
				if (!$conn){
					$result = false;
				}else{
					$nUserNo = mssql_escape_string($userId);
					$coins = mssql_escape_string($credits);
					$refID = mssql_escape_string($refId);
					$checkAccount = sqlsrv_query($conn, "SELECT * FROM tUser WHERE nUserNo = ?;", array($nUserNo), array("Scrollable" => SQLSRV_CURSOR_KEYSET));
					if(sqlsrv_num_rows($checkAccount) == 1){
						$updateCoins = sqlsrv_query($conn, "UPDATE tUser SET nAGPoints = nAGPoints + ? WHERE nUserNo = ?;", array($coins, $nUserNo));
						$insertLog = sqlsrv_query($conn, "INSERT INTO tDonationHistory (nEMID, nCoins, nStatus, nRefID) VALUES (?, ?, 4, ?);", array($nUserNo, $coins, $refID));
						if (!$updateCoins || !$insertLog){
							$errors['SQLDB'] = print_r(sqlsrv_errors(), true);
							$result = false;
						}
					}else{
						$errors['Account'] = 'Account not exists!';
						$result = false;
					}
				}
            }
        } else {
            $errors['signature'] = 'Signature is not valid!';    
        }
    } else {
        $errors['whitelist'] = 'IP not in whitelist!';
    }
} else {
    $errors['params'] = 'Missing parameters!';
}

/**  
 *  Always make sure to echo OK so Paymentwall
 *  will know that the transaction is successful.
 */
if ($result) {
    echo 'OK';
} else {
    echo implode(' ', $errors);
}

// ----- FUNCTIONS ----

/**  
 *  Signature calculation function
 */
function calculatePingbackSignature($params, $secret, $version) {
    $str = '';
    if ($version == 2) {
        ksort($params);
    }
    foreach ($params as $k=>$v) {
        $str .= "$k=$v";
    }
    $str .= $secret;
    return md5($str);
}
?>