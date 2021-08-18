<?php

session_start();  //iniciar uma sessao

require_once('classes/autoload.php');

$DB = new Database();

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


$data_type = "";
//Check if post data_type is isset
if (isset($_POST['data_type'])) 
{
	
	$data_type = $_POST['data_type'];
}


$destination = "";  //initialise with an empty string
if (isset($_FILES['file']) && $_FILES['file']['name']) 
{
	
	if ($_FILES['file']['error'] == 0) //if don't have any error
	{
		
		//good to go

		$folder = "uploads/";

		if (!file_exists($folder)) //if the $folder file not exist 
		{
			mkdir($folder, 0777, true); //make diretory for the $folder. true means that if we have file that contain a suubfile, it is not request.
		}

		$destination = $folder . $_FILES['file']['name']; //$folder concatinating with the file name
		move_uploaded_file($_FILES['file']['tmp_name'], $destination);  //moving the file uploaded in

		$info->message = "Your image was uploaded!<br>";
		$info->data_type = $data_type;
		echo json_encode($info);  //tranform the object to string
	}
}


//CHECK IF data_type is realy "change_profile_image"
if($data_type == "change_profile_image")
{

	if ($destination != "") //if $destination contain some string
	{
		//save to database

		$id = $_SESSION['userid'];
		$query = "UPDATE users set image = '$destination' where userid = '$id' limit 1";  //passing the value directly

		$DB->write($query, []);

	}
}



/*---------------------------------------------------------------------------*/

//EXAMPLYFITE

/*print_r($_FILES);

Array
(
    [file] => Array
        (
            [name] => 1-linguagens-de-programacao-2019.jpg
            [type] => image/jpeg
            [tmp_name] => C:\xampp\tmp\php88D7.tmp
            [error] => 0
            [size] => 74555
        )

)

----------------------------

print_r($_POST);

Array
(
    [data_type] => change_profile_image
)
*/