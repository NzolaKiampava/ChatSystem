<?php

$sql = "select * from users where userid = :userid limit 1";
$id = $_SESSION['userid'];
$data = $DB->read($sql, ['userid'=>$id]);

$mydata = "";
if (is_array($data)) 
{
	$data = $data[0];

	//check if exist image
	$image = ($data->gender == "Male") ? 'ui/images/user_gender_male.jpg' : 'ui/images/user_gender_female.jpg';

	if (file_exists($data->image)) //looking for is exist some file ont the collumn image
	{
		$image = $data->image;
	}

	$gender_male = "";  //initialise a string to put checked on input radio
	$gender_female = ""; //initialise a string to put checked on input radio

	//checked if gender is equal with actual user
	if ($data->gender == "Male") 
	{
		$gender_male = "checked"; //if is, gender_male recieve checked
	}else
	{
		$gender_female = "checked"; //if is not, gender_female recieve checked
	}

	$mydata = '

	<style>

		@keyframes appear{

			0%{opacity: 0; transform: translateY(50px) rotate(5deg); transform-origin:100% 100%}    /*rotate for rotation, transform-orign for incialise the rotation*/
			100%{opacity: 1; transform: translateY(0px) rotate(0deg); transform-origin:100% 100%}
		}


		form{

			text-align: left;
			margin: auto;
			padding: 10px;
			width: 100%;
			max-width: 700px;

		}

		input[type=text], input[type=password], input[type=submit]{

			padding: 10px;
			margin: 10px;
			width: 200px;
			border-radius: 5px;
			border: solid 1px grey;
		}

		input[type=submit]{

			width: 220px;
			cursor: pointer;
			background-color: #5b97c7;
			color: white;
		}

		input[type=radio]{

			transform: scale(1.2);
			cursor: pointer;
		}

		#error{

			text-align: center; 
			padding: 0.5em; 
			background-color: #ecaf91; 
			color: white; 
			display: none;
		}

		.dragging{

			border: dashed 2px #aaa;
		}

	</style>


	<div style="display:flex; animation: appear 1s ease;">

	<div>
	<span style="font-size:11px;">drag and drop an image to change</span><br>
	<img ondragover="handle_drag_and_drop(event)" ondrop="handle_drag_and_drop(event)" ondragleave="handle_drag_and_drop(event)" src="'.$image.'" style="width:200px; height:200px; margin:10px;"/>

	<label for="change_image_input" id="change_image_button" style="background-color:#9b9a80; display: inline-block; padding:1em; border-radius;5px; cursor: pointer;">
		Change Image
		
	</label>
	<input type="file" onchange="upload_profile_image(this.files)" id="change_image_input" style="display:none;">

	</div>

	<form id="myform">
	<input type="text" name="username" placeholder="Username" value="'.$data->username.'"><br>
	<input type="text" name="email" placeholder="email@example.ao" value="'.$data->email.'"><br>

	<div style="padding: 10px;">
	<br>Gender: <br>
	<input type="radio" value="Male" name="gender" '.$gender_male.'><label for="male">Male</label><br>
	<input type="radio" value="Female" name="gender" '.$gender_female.'><label for="female">Female</label><br>
	</div>

	<input type="password" name="password" placeholder="password" value="'.$data->password.'"><br>
	<input type="password" name="password2" placeholder="Retype password" value="'.$data->password.'"><br>
	<input type="submit" value="Save Settings" id="save_settings_button" onclick="collect_data(event)">

	</form>
	</div>

	';
	

	$info->message = $mydata;
	$info->data_type = "contacts";
	echo json_encode($info);  //tranform the object to string

}else
{
	$info->message = "No contacts were found<br>";
	$info->data_type = "error";
	echo json_encode($info);  //tranform the object to string
}

?>

