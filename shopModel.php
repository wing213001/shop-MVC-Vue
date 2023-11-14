<?php
require('dbconfig.php');

function getJobList() {
	global $db;
	$sql = "select * from shop where 1;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}

function getJobList2() { //客戶的購物車
	global $db;
	$sql = "update shop set result = price * buyNum;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
	mysqli_stmt_execute($stmt); //執行SQL
	$sql = "select * from shop where buyNum > 0;";
	$stmt = mysqli_prepare($db, $sql ); //precompile sql指令，建立statement 物件，以便執行SQL
	mysqli_stmt_execute($stmt); //執行SQL
	$result = mysqli_stmt_get_result($stmt); //取得查詢結果

	$rows = array(); //要回傳的陣列
	while($r = mysqli_fetch_assoc($result)) {
		$rows[] = $r; //將此筆資料新增到陣列中
	}
	return $rows;
}

function addJob($jobName,$jobContent,$price,$buyNum,$jobID,$totalQuantity) {
	global $db;
	if($jobID>0) {
		$sql = "update shop set jobName=?, jobContent=?, price=?, buyNum=?, totalQuantity=? where id=?"; //SQL中的 ? 代表未來要用變數綁定進去的地方
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_bind_param($stmt, "ssiiii", $jobName, $jobContent,$price,$buyNum,$totalQuantity,$jobID); //bind parameters with variables, with types "sss":string, string ,string
	} else {
		$sql = "insert into shop (jobName, jobContent, price, totalQuantity) values (?, ?, ?, ?)"; //SQL中的 ? 代表未來要用變數綁定進去的地方
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_bind_param($stmt, "ssii", $jobName, $jobContent,$price,$totalQuantity); //bind parameters with variables, with types "sss":string, string ,string
	}
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}

function addJob2($buyNum,$jobID) {
	global $db;
		$sql = "update shop set buyNum=? where id=?"; //SQL中的 ? 代表未來要用變數綁定進去的地方
		$stmt = mysqli_prepare($db, $sql); //prepare sql statement
		mysqli_stmt_bind_param($stmt, "ii",$buyNum,$jobID); //bind parameters with variables, with types "sss":string, string ,string
	    mysqli_stmt_execute($stmt);  //執行SQL
        return True;

}

function updateJob($id, $jobName,$jobContent,$price) {
	echo $id, $jobName,$jobContent,$price;
	return;
}

function delJob($id) {
	global $db;

	$sql = "delete from shop where id=?;"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $id); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}

function delJob2($id) {
	global $db;

	$sql = "update shop set buyNum = 0 where id=?;"; //SQL中的 ? 代表未來要用變數綁定進去的地方
	$stmt = mysqli_prepare($db, $sql); //prepare sql statement
	mysqli_stmt_bind_param($stmt, "i", $id); //bind parameters with variables, with types "sss":string, string ,string
	mysqli_stmt_execute($stmt);  //執行SQL
	return True;
}
?>