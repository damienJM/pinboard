<?php
//Database Connection Variables
	include('db.php');

	
	//Connect to database
	mysql_connect($host,$username,$password);
	@mysql_select_db($database) or die( "Unable to select database");
	
	
	$arr = $_POST;
	$res = array();
	$time = time();
	//$note = mysql_real_escape_string($_POST['text']);
	
	$query = "INSERT INTO note VALUES ('','".$arr['text']."','".$time."','".$time."',150,150,0)";
	
	$result = mysql_query($query);
	
	//$query = "SELECT `note`.`message` FROM `note`";
	
	//$result = mysql_query($query);
	//while($rowgr = mysql_fetch_array($result)){
       // $res[] = $rowgr['message'];
   // }
   // echo json_encode($res);
	//$res1 = mysql_result($result, 0, 'message');
	//echo $res1;
	mysql_close();
	
?>