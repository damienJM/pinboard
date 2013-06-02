<?php
//Database Connection Variables
	include('db.php');

	
	//Connect to database
	mysql_connect($host,$username,$password);
	@mysql_select_db($database) or die( "Unable to select database");
	
	
	
	//$arr = $_POST;
	
	if($_POST['time'] != '' && $_POST['time'] != 0){
		
		
		$query = "SELECT * FROM `note` WHERE modify_time >= ".$_POST['time']."";
		$result = mysql_query($query);
		$num_results = mysql_num_rows($result);
		$pollStart = time();
		$currentTime = time();
		$pollTime = $currentTime - $pollStart;
		while(!$num_results && $pollTime<20){
			$currentTime = time();
			$pollTime = $currentTime - $pollStart;
			usleep(10000);
			clearstatcache();
			$result = mysql_query($query);
			$num_results = mysql_num_rows($result);
		}
		
		}else{
			$query = "SELECT * FROM `note`";
			$result = mysql_query($query);
		}	
		
		
		
	
	$num_results = mysql_num_rows($result);
	 if($num_results > 0){
	
		 while($rowgr = mysql_fetch_array($result,MYSQL_ASSOC)){
			 $res[] = $rowgr;
		 }
		echo json_encode($res);
	}	
		//echo $_POST['time'];
	
	
	mysql_close();
	
?>