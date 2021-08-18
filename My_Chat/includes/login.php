<?php

	//login
	$info = (object)[];  //creating a object
	$data = false; //if i have alot of data hapening ,first i have to inicialize with false for clearing everything and start to adding new data


	//Validate info
	
	$data['email'] = $DATA_OBJ->email;

	$email = $data['email'];

	if (empty($DATA_OBJ->email)) 
	{
		$Error .= "Please enter a valid email<br>";
	}

	if (empty($DATA_OBJ->password)) 
	{
		$Error .= "Please enter a valid password<br>";
	}

	if ($Error == "") 
	{
		$query = "select * from users where email = :email limit 1";
		$result = $DB->read($query, $data);

		if (is_array($result))
		{
			$result = $result[0];
			if ($result->password == $DATA_OBJ->password) 
			{
				$_SESSION['userid'] = $result->userid;
				//$DB->read("UPDATE users set online='1' where email = :email", $data);
				
				$DB->read("UPDATE users set online='1' where email = '$email'", []);

				$info->message = "You're successfully logged in";
				$info->data_type = "info";
				echo json_encode($info); //tranform the object to string
			}
			else
			{
				$info->message = "Wrong password<br>";
				$info->data_type = "error";
				echo json_encode($info); //tranform the object to string
			}

		}
		else
		{
			$info->message = "Wrong email<br>";
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