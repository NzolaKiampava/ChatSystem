<?php

session_start();  //iniciar uma sessao

require_once('classes/autoload.php');

$DB = new Database();
$DATA_RAW = file_get_contents("php://input");
$DATA_OBJ= json_decode($DATA_RAW); //using as parameter true to convert to array


$Error = "";

$info = (object)[];   //creating empty object

//check if logged in
if (!isset($_SESSION['userid'])) //seo userid nao estiver logado ou se nao inciou a sessao
{	
	
	if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type != "login" && $DATA_OBJ->data_type != "signup") 
	{
		$info->logged_in = false;
		echo json_encode($info);
		die;
	}
}


//write to the database
if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "signup") 
{	
	sleep(1);  //GIVE A DELAY TO PROCESS THIS PART
	//signup
	include("includes/signup.php");
}

else if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "login") 
{

	sleep(1);  //GIVE A DELAY TO PROCESS THIS PART
	//login
	include("includes/login.php");
}

else if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "user_info") 
{

	//user_info
	include("includes/user_info.php");
	
}

else if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "logout") 
{
	sleep(1);
	//logout
	include("includes/logout.php");
	
}

else if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "contacts") 
{
	sleep(1);
	//contacts
	include("includes/contacts.php");
	
}

else if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "chat") 
{
	//sleep(1);
	//contacts
	include("includes/chat.php");
	
}

else if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "settings") 
{
	sleep(1);
	//contacts
	include("includes/settings.php");
	
}

else if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "save_settings") 
{
	sleep(1);
	//contacts
	include("includes/save_settings.php");
	
}

else if (isset($DATA_OBJ->data_type) && $DATA_OBJ->data_type == "send_message") 
{
	
	//send messages
	//$info->message = $DATA_OBJ;
	//echo json_encode($info);
	include("includes/send_message.php");
	
}

function message_left($row)
{
	return "
		<div id='message_left'>
			<div></div>
			<img src='$row->image'>
			<b>$row->username</b><br>
			This is the test message<br><br>
			<span style='font-size: 11px; color:#999;'>20 Jan 2022 10:00 am</span>
		</div>		
	";
}

function message_right($data, $row)
{

	return "
		<div id='message_right'>
			<div></div>
			<img src='$row->image' style='float:right;'>
			<b>$row->username</b><br>
			$data->message<br><br>
			<span style='font-size: 11px; color:#999;'>20 Jan 2022 10:00 am</span>
		</div>
	";
}


