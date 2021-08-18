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
			padding: 10pc;
			background-color: white;
			width: 35%;
			max-width: 400px;
			min-width: 200px;
			margin-top: -11px;
			box-shadow: 0px 0px 10px rgba(100, 0, 0, 0.5);
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

	</style>
<body>

	<div id="Wrapper">
		
		<div id="header">
			My Chat
			<!--<div style="font-size: 20px; font-family: myFont;">Login</div>-->
		</div>
		<form>
			
			<div style="font-size: 50px; font-family: myFont; text-align: center; color: #5b97c7; margin-top: -135px;">Login</div>

			<input type="text" name="username" placeholder="Username"><br>

			<div style="padding: 10px;">
				<br>Gender: <br>
				<input type="radio" name="gender">Male<br>
				<input type="radio" name="gender">Female<br>
			</div>

			<input type="password" name="password" placeholder="password"><br>
			<input type="password" name="password2" placeholder="Retype password"><br>
			<input type="submit" value="Sign Up">

		</form>
		
	</div>
</body>
</html>

<script type="text/javascript">
	
	function _(element){

		return document.getElementById(element);
	}

	var label = _("label-chat");

	label.addEventListener("click",function(){

		var inner_pannel = _("inner_left_pannel");
		var ajax = new XMLHttpRequest();

		ajax.onload = function(){

			if (ajax.status == 200 || ajax.readyState == 4){

				inner_pannel.innerHTML = ajax.responseText;
			}
		}
		
		ajax.open("POST", "file.php", true);
		ajax.send();
	});

	
//innerHMTL is a method to write the text via html file of the page
</script>