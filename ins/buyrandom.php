<?php $__TOKEN = "hardcoreshitbykernstudios"; require_once('../includes/_init.php'); 

if(isset($_SESSION['nUserNo'])){
	
	
	if(isset($_POST['nNo'])){
		$thiscate = mssql_escape_string($_POST['nNo']);
		$CategoryItems = sqlsrv_query($conn, "SELECT * FROM tLuckyItems WHERE sCategory = ? AND sEnabled = 1;", array($thiscate), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
		if(sqlsrv_num_rows($CategoryItems) > 1){
			$items = array();
			while ($fetchCateItems = sqlsrv_fetch_array($CategoryItems)){
				$fetchrandomGoNo = $fetchCateItems['id'];
				array_push($items, $fetchrandomGoNo);
			}
			$randid = $items[array_rand($items)];
			
			$SelectItem = sqlsrv_query($conn, "SELECT * FROM tLuckyItems WHERE id = ? AND sEnabled = 1;", array($randid), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
			if(sqlsrv_num_rows($SelectItem) == 1){
				$FetchItem = sqlsrv_fetch_array($SelectItem);
				$GoodsNo_GetRealItem = $FetchItem['goodsNo'];
				$Unit_GetRealItem = $FetchItem['sUnit'];
				$Cate_GetRealItem = $FetchItem['sCategory'];
				$Name_GetRealItem = $FetchItem['sName'];
					
				$SelectCategory = sqlsrv_query($conn, "SELECT * FROM tLuckyCategory WHERE nNo = ? AND sEnabled = 1;", array($Cate_GetRealItem), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
				if(sqlsrv_num_rows($SelectCategory) == 1){
					$FetchCategory = sqlsrv_fetch_array($SelectCategory);	
					$Price_GetCateGory = $FetchCategory['sPrice'];
					
					$selectAccount = sqlsrv_query($conn, "SELECT * FROM tUser WHERE nUserNo = ? AND nAGPoints >= ?;", array($_SESSION['nUserNo'], $Price_GetCateGory), array( "Scrollable" => SQLSRV_CURSOR_KEYSET ));
					if(sqlsrv_has_rows($selectAccount) == 1){
						$status = 2;
						$deletePoints = sqlsrv_query($conn, "UPDATE tUser SET nAGPoints -= ? WHERE nUserNo = ?;", array($Price_GetCateGory, $_SESSION['nUserNo']));
						$insertItem = sqlsrv_query($conn, "INSERT INTO tPurchases (nAGID, nPrice, nGoodsNo, nQuantity, nUsed, sIP, nIsGift, nStatus, nName) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);", array($_SESSION['nUserNo'], $Price_GetCateGory, $GoodsNo_GetRealItem, $Unit_GetRealItem,0 , getRemoteIP(), 0, $status, $Name_GetRealItem));
						$insertItem1 = sqlsrv_query($conn, "INSERT INTO tChargeItem (userNo, orderNo, goodsNo, amount) VALUES (?, ?, ?, ?);", array($_SESSION['nUserNo'], '1', $GoodsNo_GetRealItem, $Unit_GetRealItem));
						if($insertItem1 && $insertItem && $deletePoints){
							echo 'ok#'.$GoodsNo_GetRealItem.'#'.$Name_GetRealItem;
						}else{
							echo 'error';
						}
						
					}else{
						echo 'nocoins';
					}
				}else{
					echo 'error';
				}	
			}else{
				echo 'error';
			}
			
		}else{
			echo 'error';
		}
	}else{
		echo 'error';
	}
	
	
}else{
	echo 'error';
}
?>

