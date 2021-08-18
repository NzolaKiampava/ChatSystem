<?php
$userid = $_SESSION['userid'];

if (isset($_SESSION['userid'])) 
{
	unset($_SESSION['userid']);   //unsetting the userid if is isset
	
	$DB->read("UPDATE users set online='0' where userid = '$userid'", []);
}


$info->logged_in = false;
echo json_encode($info);

/*$sql = "UPDATE SET users online='0' where userid = :userid limit 1";
$id = $_SESSION['userid'];
$DB->read($sql, ['userid'=>$id]);*/

