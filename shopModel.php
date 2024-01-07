<?php
require('dbconfig.php');

function getJobList($sellerID) { //列出這個商家的所有商品
	global $db;
	$sql = "select * from shop where sellerID=?;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
    mysqli_stmt_bind_param($stmt, "i", $sellerID);
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}

function getJobList3($userID) { //商家要確認的訂單
	global $db;
	$sql = "select * from shop_order where sellerID = ? and status = '未處理';";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
    mysqli_stmt_bind_param($stmt, "i",$userID);
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}

function getJobList7($userID) { //商家要確認的訂單
	global $db;
	$sql = "select * from shop_order where sellerID = ? and status = '已送達';";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
    mysqli_stmt_bind_param($stmt, "i",$userID);
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}

function getJobListC() { //列出客戶看到的所有商品
	global $db;
	$sql = "select * from shop where totalQuantity > buyNum;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}

function getJobList2($userID) { //客戶的購物車
	global $db;
	$sql = "update shop_order set result = price * buyNum;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
	mysqli_stmt_execute($stmt); //執行SQL
	$sql = "select * from shop_order where buyerID = ? and status = '';";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
    mysqli_stmt_bind_param($stmt, "i",$userID);
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}

function getJobList4($userID) { //客戶送出的訂單
	global $db;
	$sql = "select * from shop_order where buyerID = ? and status != '';";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
    mysqli_stmt_bind_param($stmt, "i",$userID);
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}

function getJobList6($buyerID) { //列出這個客戶的已寄送訂單
	global $db;
	$sql = "select * from shop_order where buyerID = ? and status = '已寄送';";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
    mysqli_stmt_bind_param($stmt, "i", $buyerID);
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}

function getJobListT() { //列出物流要運送的所有訂單
	global $db;
	$sql = "select * from shop_order where status = '寄送中';";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}

function getJobList5() { //列出客戶看到的所有商品
	global $db;
	$sql = "select * from shop_order where status = '已寄送' or status = '已送達';";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}

function addJob($jobName,$jobContent,$price,$buyNum,$jobID,$totalQuantity,$sellerID) { //商家新增或修改商品
	global $db;
	if($jobID>0) {
		$sql = "update shop set jobName=?, jobContent=?, price=?, buyNum=?, totalQuantity=? where id=?"; //SQL中的 ? 代表未來要用變數綁定進去的地方
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_bind_param($stmt, "ssiiii", $jobName, $jobContent,$price,$buyNum,$totalQuantity,$jobID); //bind parameters with variables, with types "sss":string, string ,string
	} else {
		$sql = "insert into shop (jobName, jobContent, price, totalQuantity, sellerID) values (?, ?, ?, ?, ?)"; //SQL中的 ? 代表未來要用變數綁定進去的地方
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_bind_param($stmt, "ssiii", $jobName, $jobContent,$price,$totalQuantity,$sellerID); //bind parameters with variables, with types "sss":string, string ,string
	}
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}

function addJob2($jobName,$buyNum,$buyerID,$sellerID,$price,$totalQuantity) { //客戶新增購買數量
	global $db;
		$sql = "insert into shop_order (jobName, buyNum, buyerID, sellerID, price,totalQuantity) values (?, ?, ?, ?, ?, ?)"; //SQL中的 ? 代表未來要用變數綁定進去的地方
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_bind_param($stmt, "siiiii",$jobName,$buyNum,$buyerID,$sellerID,$price,$totalQuantity); //bind parameters with variables, with types "sss":string, string ,string
	    mysqli_stmt_execute($stmt);  //執行SQL
        $sql = "update shop set buyNum = buyNum + ? where jobName=? and sellerID = ?";
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_bind_param($stmt, "isi",$buyNum,$jobName,$sellerID); //bind parameters with variables, with types "sss":string, string ,string
	    mysqli_stmt_execute($stmt);  //執行SQL
        return True;

}



function delJob($id) { //商家刪除商品
	global $db;

	$sql = "delete from shop where id=?"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $id); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}

function delJob2($orderID,$jobName,$sellerID,$buyNum) { //客戶從購物車刪除商品
	global $db;

	$sql = "delete from shop_order where orderID = ?"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $orderID); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
    $sql = "update shop set buyNum = buyNum - ? where jobName=? and sellerID = ?";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "isi",$buyNum,$jobName,$sellerID); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}

function orderReceived($orderID) { //商家確認訂單並出貨
	global $db;

    $sql = "update shop_order set status = '寄送中' where orderID = ?";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i",$orderID); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}

function deliver($orderID) { //物流收到貨物並寄送
	global $db;

    $sql = "update shop_order set status = '已寄送' where orderID = ?";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i",$orderID); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}

function pickUp($orderID,$satisfaction) { //客戶取貨並給評價
	global $db;

    $sql = "update shop_order set status = '已送達', satisfaction = ? where orderID = ?";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "ii",$satisfaction,$orderID); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}

function loginCheck($name,$pwd) { //登入
	global $db;
	$sql = "select userID, role from user where name=? and pwd=?";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
	mysqli_stmt_bind_param($stmt, "si", $name,$pwd); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果
    $rows = array();
    while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
		foreach ($row as $r) {
            $rows[] = $r;
        } //將此筆資料新增到陣列中
	}
	return $rows;
}

function signUp($name,$pwd,$role) { //註冊
	global $db;
	//	$sql = "select * from user where name=?;"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	//	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	//	mysqli_stmt_bind_param($stmt, "s",$name); //bind parameters with variables, with types "sss":string, string ,string
	//    mysqli_stmt_execute($stmt);  //執行SQL
    //    $result = mysqli_stmt_get_result($stmt); //取得查詢結果
    //    if(!mysqli_fetch_assoc($result)) {
    $sql = "insert into user (name, pwd, role) values (?, ?, ?)"; //SQL中的 ? 代表未來要用變數綁定進去的地方
    $stmt = mysqli_prepare($db, $sql); //prepare sql statement
    mysqli_stmt_bind_param($stmt, "sii",$name,$pwd,$role); //bind parameters with variables, with types "sss":string, string ,string
    mysqli_stmt_execute($stmt);  //執行SQL
   //     } 
    return True;

}

function checkout($buyerID) { //客戶送出購物車的訂單
	global $db;

    $sql = "update shop_order set status = '未處理' where buyerID = ? and status = ''";
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i",$buyerID); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}

?>