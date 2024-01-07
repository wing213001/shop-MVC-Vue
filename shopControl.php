<?php
require('shopModel.php');

$act=$_REQUEST['act'];
switch ($act) {
case "listJob":
  $sellerID = (int)$_REQUEST['userID'];
  $jobs=getJobList($sellerID);
  echo json_encode($jobs);
  return;  
case "listJob3":
  $userID = (int)$_REQUEST['userID'];
  $jobs=getJobList3($userID);
  echo json_encode($jobs);
  return;
case "listJob7":
  $userID = (int)$_REQUEST['userID'];
  $jobs=getJobList7($userID);
  echo json_encode($jobs);
  return;
case "listJobC":
  $jobs=getJobListC();
  echo json_encode($jobs);
  return;  
case "listJob2":
  $userID = (int)$_REQUEST['userID'];
  $jobs=getJobList2($userID);
  echo json_encode($jobs);
  return;
case "listJob4":
  $userID = (int)$_REQUEST['userID'];
  $jobs=getJobList4($userID);
  echo json_encode($jobs);
  return;
case "listJob6":
  $userID = (int)$_REQUEST['userID'];
  $jobs=getJobList6($userID);
  echo json_encode($jobs);
  return;
case "listJobT":
  $jobs=getJobListT();
  echo json_encode($jobs);
  return;
case "listJob5":
  $jobs=getJobList5();
  echo json_encode($jobs);
  return;
case "addJob":
	$sellerID = (int)$_REQUEST['userID'];
	$jsonStr = $_POST['dat'];
	$job = json_decode($jsonStr);
	//should verify first
	addJob($job->jobName,$job->jobContent,$job->price,$job->buyNum,$job->id,$job->totalQuantity,$sellerID);
	return;
case "addJob2":
	$buyerID = (int)$_REQUEST['userID'];
	$jsonStr = $_POST['dat'];
	$job = json_decode($jsonStr);
	//should verify first
	addJob2($job->jobName,$job->NewBuyNum,$buyerID,$job->sellerID,$job->price,$job->totalQuantity);
	return;
case "delJob":
	$id=(int)$_REQUEST['id']; //$_GET, $_REQUEST
	//verify
	delJob($id);
	return;
case "delJob2":
    $orderID = (int)$_REQUEST['orderID'];
    $jobName = (string)$_REQUEST['jobName'];
    $sellerID = (int)$_REQUEST['sellerID'];
    $buyNum = (int)$_REQUEST['buyNum'];
	//verify
	delJob2($orderID,$jobName,$sellerID,$buyNum);
	return;
case "orderReceived":
	$orderID=(int)$_REQUEST['orderID']; //$_GET, $_REQUEST
	//verify
	orderReceived($orderID);
	return;
case "deliver":
	$orderID=(int)$_REQUEST['orderID']; //$_GET, $_REQUEST
	//verify
	deliver($orderID);
	return;
case "pickUp":
	$jsonStr = $_POST['dat'];
	$job = json_decode($jsonStr);
	//should verify first
	pickUp($job->orderID,$job->howGood);
	return;
case "login":
	$name=$_REQUEST['name'];
	$pwd=$_REQUEST['pwd'];
    $userInfo = loginCheck($name,$pwd);
    $userID = $userInfo[0];
    $role = $userInfo[1];
	//verify
	if ($role == 1) {
		setcookie('loginRole',"1");
        setcookie('loginUser',$userID);
	} else if ($role == 2){
		setcookie('loginRole',"2");
        setcookie('loginUser',$userID);
	} else if ($role == 3){
		setcookie('loginRole',"3");
        setcookie('loginUser',$userID);
	} else {
        setcookie('loginRole',"0");
    }
	return;
case "logout":
    setcookie('loginRole',"0");
    setcookie('loginUser',"0");
	return;
case "signUp":
	
	$name = $_POST['name'];
	$pwd = $_POST['pwd'];
	$role = $_POST['role'];
	//should verify first
	signUp($name,$pwd,$role);
	return;
case "checkout":
	
	$buyerID = (int)$_REQUEST['userID'];
	//should verify first
	checkout($buyerID);
	return;
    
default:
  
}

?>