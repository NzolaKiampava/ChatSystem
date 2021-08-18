<?php

	//signup
	$info = (object)[];  //creating a object
	$data = false; //if i have alot of data hapening ,first i have to inicialize with false for clearing everything and start to adding new data


	//Validate info
	
	$data['userid'] = $_SESSION['userid'];

	if ($Error == "") 
	{
		$query = "select * from users where userid = :userid limit 1"; //apenas com o limite de 1
		$result = $DB->read($query, $data);

		if (is_array($result))
		{
			$result = $result[0];
			$result->data_type = "user_info";

				//check if exist image
			$image = ($result->gender == "Male") ? 'ui/images/user_gender_male.jpg' : 'ui/images/user_gender_female.jpg';

			if (file_exists($result->image)) //looking for is exist some file ont the collumn image
			{
				$image = $result->image;
			}

			$result->image = $image;
			echo json_encode($result);  //tranform the object to string

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