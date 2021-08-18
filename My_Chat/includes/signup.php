<?php

	//signup
	$info = (object)[];  //creating a object
	$data = false; //if i have alot of data hapening ,first i have to inicialize with false for clearing everything and start to adding new data

	$data['userid'] = $DB->generate_id(20);
	$data['date'] = date("Y-m-d H:i:s");  //year-month-day hour-minute-second

	//Validate username
	$data['username'] = $DATA_OBJ->username;
	if (empty($DATA_OBJ->username)) 
	{
		$Error .= "Please enter a valid username.<br>";
	}
	else
	{
		if(strlen($DATA_OBJ->username) < 3)
		{
			$Error .= "Username must be at least 3 character long.<br>";
		}
		if (!preg_match("/^[a-z A-Z]*$/", $DATA_OBJ->username)) 
		{
			$Error .= "Please enter a valid username.<br>";

		}
	}

	//validate email
	$data['email'] = $DATA_OBJ->email;
	if (empty($DATA_OBJ->email)) 
	{
		$Error .= "Please enter a valid email.<br>";
	}
	else
	{
		if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $DATA_OBJ->email)) 
		{
			$Error .= "Please enter a valid email.<br>";

		}
	}

	//validate gender
	$data['gender'] = isset($DATA_OBJ->gender) ? $DATA_OBJ->gender : null; //the condition
	if (empty($DATA_OBJ->gender)) 
	{
		$Error .= "Please select a gender.<br>";
	}
	else
	{
		if ($DATA_OBJ->gender != "Male" && $DATA_OBJ->gender != "Female") //Female and Male are the values
		{
			$Error .= "Please select a valid gender.<br>";

		}
	}


	//validate password
	$data['password'] = $DATA_OBJ->password;
	$password = $DATA_OBJ->password2;  //will not inserted on database, reason why we create another variable

	if (empty($DATA_OBJ->password)) 
	{
		$Error .= "Please enter a valid password.<br>";
	}
	else
	{

		if ($DATA_OBJ->password != $DATA_OBJ->password2) 
		{
			$Error .= "Passwords must match.<br>";
		}

		if(strlen($DATA_OBJ->password) < 8)
		{
			$Error .= "Password must be at least 8 character long.<br>";
		}
	}

	if ($Error == "") 
	{
		$query = "insert into users(userid,username,email,gender,password,date) values(:userid,:username,:email,:gender,:password,:date)";
		$result = $DB->write($query, $data);

		if ($result)
		{
			$info->message = "Your profile was created";
			$info->data_type = "info";
			echo json_encode($info); //tranform the object to string
		}
		else
		{
			$info->message = "Your profile was Not created due to an error";
			$info->data_type = "error";
			echo json_encode($info);  //tranform the object to string
		}

	}
	else
	{
		
		$info->message = $Error;
		$info->data_type = "error";
		echo json_encode($info); //tranform the object to string
	}