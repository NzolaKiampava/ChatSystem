<?php
	
	$arr['userid'] = "null";
	if (isset($DATA_OBJ->find->userid))
	{
		$arr['userid'] = $DATA_OBJ->find->userid;  //we use find because we are sending an object userid that save the CURRENT_USER_CHAT
	}
	
	$sql = "SELECT * FROM users where userid = :userid limit 1";  
	$result = $DB->read($sql, $arr);


	if (is_array($result)) 
	{	
		//user found
		$row = $result[0]; //already that result is returning an array,that's why we choose the 1 obj 
		
		$image = ($row->gender == "Male") ? 'ui/images/user_gender_male.jpg' : 'ui/images/user_gender_female.jpg';

			if (file_exists($row->image)) //looking for is exist some file ont the collumn image
			{
				$image = $row->image;
			}

			$row->image = $image;

			$mydata =  "Now Chatting with:<br>
						<div id='active_contact' userid='$row->userid' onclick='start_chat(event)'>
							<img src='$image'>
							$row->username
						</div>";

			$messages = "
					<div id='messages_holder_parent' style='height:630px;'>
						<div id='messages_holder' style='border: solid thin #888; height:490px; overflow-y:scroll;'>";

			$messages .= "
						</div>

						<div style='display:flex; width:100%; height:40px;'>

							<label for='message_file'><img src='ui/icons/clip.png' style='opacity:0.8;width:30px; margin:5px;cursor:pointer;'></label>
							<input type='file' id='message_file' name='file' style='display:none;'/>
							<input id='message_text' style='flex:6; border:solid thin #ccc; border-bottom:none; font-size:14px; padding:4px;' type='text' placeholder='type your message'/>
							<input style='flex:1; cursor:pointer;' type='button' value='send' onclick='send_message(event)'/>
						</div>
					</div>
			";
	

		$info->user = $mydata;
		$info->messages = $messages;
		$info->data_type = "chat";
		echo json_encode($info);  //tranform the object to string

	}else{
		//user not found
		$info->message = "That contacts was not found<br>";
		$info->data_type = "chat";
		echo json_encode($info);  //tranform the object to string

	}

	

?>

