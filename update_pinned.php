<?php
//Database Connection Variables
	include('db.php');

	
	//Connect to database
	mysql_connect($host,$username,$password);
	@mysql_select_db($database) or die( "Unable to select database");
	
	
	
	$res = array();
	
	$test = 'hello';
	
	
	$query = "UPDATE note SET pinned =".$_POST['pinned']." , modify_time = ".$_POST['time']." WHERE ID =".$_POST['id']." ";
	
	$result = mysql_query($query);
	
	// $query = "SELECT `note`.`message` FROM `note`";
	
	// $result = mysql_query($query);
	// while($rowgr = mysql_fetch_array($result)){
        // $res[] = $rowgr['message'];
    // }
     //echo $test;
	//$res1 = mysql_result($result, 0, 'message');
	//echo $res1;
	mysql_close();
	
?>