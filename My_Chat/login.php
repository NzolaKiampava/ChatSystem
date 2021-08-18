<!DOCTYPE html>
<html>
<head>
	<title>My  Chat</title>
	<meta charset="utf-8">	
</head>
<style type="text/css">
		

		@font-face{

			font-family: headFont;
			src: url(ui/fonts/Summer-Vibes-OTF.otf);

		}

		@font-face{

			font-family: myFont;
			src: url(ui/fonts/OpenSans-Regular.ttf);

		}

		#Wrapper{

			max-width: 900px;
			min-height: 500px;
			margin: auto;
			color: gray;
			font-family: myFont;
			font-size: 13px;

		}

		form{

			margin: auto;
			padding: 10px;
			width: 100%;
			max-width: 400px;

		}

		input[type=text], input[type=password], input[type=submit]{

			padding: 10px;
			margin: 10px;
			width: 98%;
			border-radius: 5px;
			border: solid 1px grey;
		}

		input[type=submit]{

			width: 104%;
			cursor: pointer;
			background-color: #5b97c7;
			color: white;
		}

		input[type=radio]{

			transform: scale(1.2);
			cursor: pointer;
		}

		#header{

			background-color: #485b6c;
			font-size: 40px;
			text-align: center;
			font-family: headFont;
			width: 100%;
			color: white;

		}

		#error{

			text-align: center; 
			padding: 0.5em; 
			background-color: #ecaf91; 
			color: white; 
			display: none;
		}

	</style>
<body>

	<div id="Wrapper">
		
		<div id="header">
			My Chat
			<div style="font-size: 20px; font-family: myFont">Login</div>
		</div>

		<div id="error"></div>

		<form id="myform">

			<input type="text" name="email" placeholder="email@example.ao"><br>
			<input type="password" name="password" placeholder="password"><br>
			<input type="submit" value="Login" id="login_button">

			<br>
			<a href="signup.php" style="display: block; text-align: center; text-decoration: none;">Don't have an account? Sign Up here</a>

		</form>
		
	</div>
</body>
</html>

<script type="text/javascript">
	
	function _(element){

		return document.getElementById(element);
	}


	var login_button = _("login_button");
	login_button.addEventListener("click",collect_data);
	
	function collect_data(e){  //colecting all the data of the form

		e.preventDefault();

		login_button.disabled = true; //disabiliting the button
		login_button.value = "Loading....Please wait...";


		var myform = _("myform");  //getting the id name of form
		var inputs = myform.getElementsByTagName("INPUT");    //getting the all tag name of form(myform)

		var data = {};  //inicialise a empty array
		for (var i = inputs.length - 1; i >= 0; i--) {
			var key = inputs[i].name;  //.name especify that we´ll get on input just theirs name

			switch(key){ //if the running of all the loop, the key be those name do:

				case "email":
					data.email = inputs[i].value;  //the value is the what user write on the form in this input 
					break;

				case "password":
					data.password = inputs[i].value;  //the value is the what user write on the form in this input 
					break;
			}
		}

		send_data(data, "login");

	}


	function send_data(data, type){

		var xml = new XMLHttpRequest();
		xml.onload = function(){

			if (xml.readyState == 4 || xml.status == 200) {

				handle_result(xml.responseText); //calling the function a give a response from the server
				login_button.disabled = false;   //abled the button
				login_button.value = "Login";
			}
		}

		data.data_type = type;
		var data_string = JSON.stringify(data); //converting the data to string to be sending

		xml.open("POST", "api.php", true);  //true for comunication be assyncronous
		xml.send(data_string);
		
	}

	function handle_result(result){

		var data = JSON.parse(result);  //transforming the result of the server to object
		if (data.data_type == "info"){

			window.location = "index.php";  //go directly on the main page
		}
		else{
			var error = _("error");
			error.innerHTML = data.message;
			error.style.display = "block"; //displaying the
		}

	}
</script>