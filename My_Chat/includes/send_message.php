<?php

	$arr['userid'] = "null";     

	//fist of all verificate if the userid is setted or if exist
	if (isset($DATA_OBJ->find->userid))
	{
		$arr['userid'] = $DATA_OBJ->find->userid;  //we use find because we are sending an object userid that save the CURRENT_USER_CHAT
	}
	
	$sql = "SELECT * FROM users where userid = :userid limit 1";  
	$result = $DB->read($sql, $arr);


	if (is_array($result)) 
	{
		$arr['message'] = $DATA_OBJ->find->message;   //retrivieng(buscar) for message
		$arr['date'] = date('Y-m-d H:i:S');  
		$arr['sender'] = $_SESSION['userid'];  //$_session is the global variable, so here is retrieving by the userid of who in starting session or who is online
		$arr['msgid'] = get_random_string_max(60);

			//Fisrt verifying and get take that the conversation of sender and receiver exist,then write on db
			$arr2['sender'] = $_SESSION['userid'];
			$arr2['receiver'] = $arr['userid'];
			$sql = "SELECT * FROM messages where (sender = :sender && receiver = :receiver) || (receiver = :sender &&  sender= :receiver) limit 1";  
			$result2 = $DB->read($sql, $arr2);

			//if there is some messages of both get message id of that conversation if not generate a random msgid
			if (is_array($result2)) 
			{
				$arr['msgid'] = $result2[0]->msgid;
			}

			//print_r($arr);
		//the receiver is the userid that sender clicked at contacts page
		$query = "INSERT INTO messages (sender, receiver, message, date, msgid) values (:sender, :userid, :message, :date, :msgid)";
		$DB->write($query, $arr); //writing into the database


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
				//READ FROM DB
				
				$a['msgid'] = $arr['msgid'];
				$sql = "SELECT * FROM messages where msgid = :msgid limit 10";  
				$result2 = $DB->read($sql, $a);

				if (is_array($result2)) 
				{
					foreach ($result2 as $data) 
					{
						$messages .= message_right($data, $row);
					}
				}

			$messages .= "
						</div>

						<div style='display:flex; width:100%; height:40px;'>

							<label for='file'><img src='ui/icons/clip.png' style='opacity:0.8;width:30px; margin:5px;cursor:pointer;'></label>
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

	}
	//if the userid doesnt exist
	else{
		//user not found
		$info->messages = "That contacts was not found<br>";
		$info->data_type = "chat";
		echo json_encode($info);  //tranform the object to string

	}


	function get_random_string_max($length)
	{
		$array = array(0,1,2,3,4,5,6,7,8,9,'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','A','B','C','D','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');

		$text = "";
		$max = 59;
		$length = rand(4,$length);   //$length acumula valores aleeatorios de 4 ate o valor da var length

		for ($i=0; $i < $length; $i++) { 
			
			$random = rand(0,$max);
			
			$text .= $array[$random];
		}

		return $text;

	}


?>

