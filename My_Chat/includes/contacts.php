<?php
	
	$myid = $_SESSION['userid'];
	$sql = "SELECT * from users where userid != '$myid' limit 10";
	$myusers = $DB->read($sql, []);

	//selecting the image from database
	$mydata = 
		"
		<style>

			@keyframes appear{

				0%{ opacity: 0; transform: translateY(50px) }

				100%{ opacity: 1; transform: translateY(0px) }
			}

			#contact{
				cursor: pointer;
				transition: all .5s cubic-bezier(.68,-2,0.265,1.55);
			}

			#contact:hover{
				transform: scale(1.1);
			}

		</style>
		<div style='text-align: center; animation: appear 1s ease;'>";

		foreach ($myusers as $row) {

			$image = ($row->gender == "Male") ? 'ui/images/user_gender_male.jpg' : 'ui/images/user_gender_female.jpg';

			if (file_exists($row->image)) //looking for is exist some file ont the collumn image
			{
				$image = $row->image;
			}

			$mydata .=     //adding these
			"<div id='contact' userid='$row->userid' onclick='start_chat(event)'>
				<img src='$image'>
				<br>
				$row->username
			</div>";
		}

	$mydata .="</div>";   //adding these

	
	$info->message = $mydata;
	$info->data_type = "contacts";
	echo json_encode($info);  //tranform the object to string

	die;

	$info->message = "No contacts were found<br>";
	$info->data_type = "error";
	echo json_encode($info);  //tranform the object to string


?>


