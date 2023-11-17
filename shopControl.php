<?php
require('shopModel.php');

$act=$_REQUEST['act'];
switch ($act) {
case "listJob":
  $jobs=getJobList();
  echo json_encode($jobs);
  return;  
case "listJob2":
  $jobs=getJobList2();
  echo json_encode($jobs);
  return;
  
case "addJob":
    //擷取了 POST 資料中名為 "dat" 的資料轉成JSON字串
	$jsonStr = $_POST['dat']; 
	//將 JSON 字串轉換成對應 PHP 物件的函式
	$job = json_decode($jsonStr); 
	//should verify first 
	addJob($job->jobName,$job->jobContent,$job->price,$job->buyNum,$job->id,$job->totalQuantity);
	return; 
	
case "addJob2":
	
	$jsonStr = $_POST['dat'];
	$job = json_decode($jsonStr);
	//should verify first
	addJob2($job->buyNum,$job->id);
	return;
case "delJob":
	$id=(int)$_REQUEST['id']; //$_GET, $_REQUEST
	//verify
	delJob($id);
	return;
case "delJob2":
	$id=(int)$_REQUEST['id']; //$_GET, $_REQUEST
	//verify
	delJob2($id);
	return;
default:
  
}

?>