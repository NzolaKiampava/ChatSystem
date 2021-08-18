<!DOCTYPE html>
<html>
<head>
	<title>My  Chat</title>
	<meta charset="utf-8">

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
			max-height: 630px;
			display: flex;
			margin: auto;
			color: white;
			font-family: myFont;
			font-size: 13px;

		}

		#left_pannel{

			min-height: 500px;
			background-color: #27344b;
			flex: 1;
			text-align: center;

		}

		#profile_image{

			width: 50%;
			border: solid thin white;
			border-radius: 50%;
			margin: 10px;

		}

		#left_pannel label{
			
			width: 100%;
			height: 20px;
			display: block;
			background-color: #404b56;
			border-bottom: solid thin #ffffff55;
			cursor: pointer;
			padding: 5px;
			transition: all 1s ease;
		}

		#left_pannel label:hover{
			
			background-color: #778593;

		}

		#left_pannel label img{
			
			float: right;
			width: 25px;
		}

		#right_pannel{

			min-height: 500px;
			flex: 4;
			text-align: center;

		}

		#header{

			background-color: #485b6c;
			height: 70px;
			font-size: 40px;
			text-align: center;
			font-family: headFont;
			position: relative;

		}

		#inner_left_pannel{

			background-color: #383e48;
			flex: 1;
			min-height: 430px;
			max-height: 530px;

		}

		#inner_right_pannel{

			background-color: #f2f7f8;
			flex: 2;
			min-height: 430px;
			transition: all 2s ease;
			max-height: 530px;
			
		}

		#radio_contacts:checked ~ #inner_right_pannel{ /* if radio_chat is checked will change his sibling(irmao) #inner_right_pannel to flex:0*/

			flex: 0;

		}

		#radio_settings:checked ~ #inner_right_pannel{ /* if radio_chat is checked will change his sibling(irmao) #inner_right_pannel to flex:0*/

			flex: 0;

		}

		#contact{

			width: 100px;
			height: 120px;
			margin: 10px;
			display: inline-block;
			overflow: hidden;

		}

		#contact img{

			width: 100px;
			height: 100px;

		}

		#active_contact{
			
			height: 70px;
			margin: 10px;
			border: solid thin #aaa;
			padding: 2px;
			background-color: #eee;
			color: #444;

		}

		#active_contact img{

			width: 70px;
			height: 70px;
			float: left;
			margin: 2px;

		}

		#message_left{
			
			height: 70px;
			margin: 10px;
			padding: 2px;
			padding-right: 2px;
			margin-right: 10px;
			background-color: #b5e7f2;
			color: #444;
			float: left;
			box-shadow: 0px 0px 10px #aaa;
			border-bottom-left-radius: 50%;
			border-top-right-radius: 30%;
			position: relative;
			width: 60%;
			min-width: 200px;

		}

		#message_left img{

			width: 60px;
			height: 60px;
			float: left;
			margin: 2px;
			border-radius: 50%;
			border: solid 2px white;

		}

		#message_left div{

			width: 20px;
			height:20px;
			border-radius: 50%;
			border: solid 2px white;
			background-color: #73b4c8;
			position: absolute;
			left: -10px;
			top: 15px;
		}

		#message_right{
			
			height: 70px;
			margin: 10px;
			padding: 2px;
			padding-right: 2px;
			margin-right: 10px;
			background-color: #f4c4ed;
			color: #444;
			float: right;
			box-shadow: 0px 0px 10px #aaa;
			border-bottom-right-radius: 50%;
			border-top-left-radius: 30%;
			position: relative;
			width: 60%;
			min-width: 200px;

		}

		#message_right img{

			width: 60px;
			height: 60px;
			float: left;
			margin: 2px;
			border-radius: 50%;
			border: solid 2px white;

		}

		#message_right div{

			width: 20px;
			height:20px;
			border-radius: 50%;
			border: solid 2px white;
			background-color: #73b4c8;
			position: absolute;
			right: -10px;
			top: 15px;
		}

		.loader_on{

			position: absolute;
			width: 30%;
		}

		.loader_off{

			display: none;
		}

	</style>
</head>
<body>

	<div id="Wrapper">
		
		<div id="left_pannel">
			
			<div id="user_info" style="padding: 10px;">
				<img id="profile_image" src="ui/images/user_gender_male.jpg" style="height: 100px; width: 100px;">
				<br>
				<span id="username">Username</span>
				<br>
				<span id="email" style="font-size: 12px;opacity: 0.5;">email@gmail.com</span>

				<br>
				<br>
				<br>
				<div>

					<label id="label_chat" for="radio_chat">Chat<img src="ui/icons/chat.png"></label>
					<label id="label_contacts" for="radio_contacts">Contacts<img src="ui/icons/contacts.png"></label>
					<label id="label_settings" for="radio_settings">Settings<img src="ui/icons/Settings.png"></label>
					<label id="logout" for="radio_logout">Logout<img src="ui/icons/logout.png"></label>

				</div>
			</div>

		</div>
		<div id="right_pannel">
			<div id="header">

				<div id="loader_holder" class="loader_on"><img style="width: 70px;" src="ui/icons/giphy.gif"></div>
				My Chat
			</div>

			<div id="container" style="display: flex;">

				<div id="inner_left_pannel">

				</div>

				<input type="radio" id="radio_chat" name="myradio" style="display: none;">
				<input type="radio" id="radio_contacts" name="myradio" style="display: none;">
				<input type="radio" id="radio_settings" name="myradio" style="display: none;">

				<div id="inner_right_pannel">
					
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script type="text/javascript">
	
	var CURRENT_CHAT_USER = "";

	function _(element){

		return document.getElementById(element);
	}

	var label_contacts = _("label_contacts");
	label_contacts.addEventListener("click",get_contacts);

	var label_chat = _("label_chat");
	label_chat.addEventListener("click",get_chat);

	var label_settings = _("label_settings");
	label_settings.addEventListener("click",get_settings);

	var logout = _("logout");
	logout.addEventListener("click",logout_user);

	function get_data(find,type){

		var xml = new XMLHttpRequest();

		var loader_holder = _("loader_holder");
		loader_holder.className = "loader_on";

		xml.onload = function(){

			if (xml.readyState == 4 || xml.status == 200){

				loader_holder.className = "loader_off";
				handle_result(xml.responseText, type);

			}

		}

		var data = {};
		data.find = find;
		data.data_type = type;
		data = JSON.stringify(data); //converting object to string

		xml.open("POST","api.php",true);
		xml.send(data);
	}

	function handle_result(result,type){
	//alert(result);	
		if (result.trim() != "") {

			var inner_right_pannel = _("inner_right_pannel");
			inner_right_pannel.style.overflow = "visible"; //show this inner when does not click on radio-conta

			var obj = JSON.parse(result);
			if (typeof(obj.logged_in) != "undefined" && !obj.logged_in){   //typeof is equivalent to say isset in php, we wll check to see if actualy check
				window.location = "login.php";
			}else{

				switch(obj.data_type){

					case "user_info":
						var username = _("username");
						var email = _("email");
						var profile_image = _("profile_image");

						username.innerHTML = obj.username;
						email.innerHTML = obj.email;
						profile_image.src = obj.image;
						
						break;

					case "contacts":
						var inner_left_pannel = _("inner_left_pannel");
						inner_right_pannel.style.overflow = "hidden";//hiddenthe innerleft when does click on radio-conta

						inner_left_pannel.innerHTML = obj.message;
				
						break;
						
					case "chat":
						var inner_left_pannel = _("inner_left_pannel");

						inner_left_pannel.innerHTML = obj.user;
						inner_right_pannel.innerHTML = obj.messages;

						break;

					case "settings":
						var inner_left_pannel = _("inner_left_pannel");

						inner_left_pannel.innerHTML = obj.message;

						break;

					case "save_settings":

						alert(obj.message);
						get_data({},"user_info");   //refresh the user_info
						get_settings(true);   //to refresh a settings
						break;

					/*case "send_message":

						alert(obj.message);
						break;*/
					
				}
			}
		}
	
	}

	function logout_user(){

		var answer = confirm("Are you sure you want log out?");

		if(answer){    //if true do that
			get_data({},"logout");   //{} means that we aren't sending anything
		}
		
	}

	get_data({},"user_info");   //{} means that we aren't sending anything

	get_data({},"contacts");   //show the contact page when refreshing
	var contacts = _("radio_contacts");
	contacts.checked = true;    //checked

	function get_contacts(e){

		get_data({},"contacts");
	}

	function get_chat(e){

		get_data({},"chat");
	}

	function get_settings(e){

		get_data({},"settings");
	}

	function send_message(e){
		var message_text = _("message_text");
		//inner_right_pannel.innerHTML = obj.messages;

		if (message_text.value.trim() == "") {  //remove all right empty space

			alert("Please type something to send!");
			return;
		}
		//alert(message_text.value);  //alerting the value of this id input*/
		get_data({
			message:message_text.value.trim(), //sending objects
			userid :CURRENT_CHAT_USER
		},"send_message");		
	}

</script>


<script type="text/javascript">


	function collect_data(){  //colecting all the data of the form

		save_settings_button.button = _("save_settings_button");
		save_settings_button.disabled = true; //disabiliting the button
		save_settings_button.value = "Loading....Please wait...";


		var myform = _("myform");  //getting the id name of form
		var inputs = myform.getElementsByTagName("INPUT");    //getting the all tag name of form(myform)

		var data = {};  //inicialise a empty array
		for (var i = inputs.length - 1; i >= 0; i--) {
			var key = inputs[i].name;  //.name especify that we´ll get on input just theirs name

			switch(key){ //if the running of all the loop, the key be those name do:

				case "username":
				data.username = inputs[i].value;  //the value is the what user write on the form in this input 
				break;

				case "email":
				data.email = inputs[i].value;  //the value is the what user write on the form in this input 
				break;

				case "gender":
							//verifieng is the inputs radio is checked
				if(inputs[i].checked){
					data.gender = inputs[i].value;  
				}
				break; 

				case "password":
				data.password = inputs[i].value;  //the value is the what user write on the form in this input 
				break;

				case "password2":
				data.password2 = inputs[i].value;  //the value is the what user write on the form in this input 
				break;



			}
		}

		send_data(data, "save_settings");

	}
	
	function send_data(data, type){

		var xml = new XMLHttpRequest();
		xml.onload = function(){

			if (xml.readyState == 4 || xml.status == 200) {

				handle_result(xml.responseText); //calling the function a give a response from the server

				save_settings_button.button = _("save_settings_button");
				save_settings_button.disabled = false;   //abled the button
				save_settings_button.value = "Save settings";
			}
		}

		data.data_type = type;
		var data_string = JSON.stringify(data); //converting the data to string to be sending

		xml.open("POST", "api.php", true);  //true for comunication be assyncronous
		xml.send(data_string);

	}

	function upload_profile_image(files){  //files is an array

		//alert(files[0].name);
		//var myfiles = files[0].name;   //receiving the file

		change_image_button.button = _("change_image_button");
		change_image_button.disabled = true;   //abled the button
		change_image_button.innerHTML = "Uploading Image...";

		var myform = new FormData();  //creating a new FormData object

		var xml = new XMLHttpRequest(); //starting the XMLHttpRequest
		xml.onload = function(){

			if (xml.readyState == 4 || xml.status == 200) {

				//alert(xml.responseText); //calling the function a give a response from the server

				get_data({}, "user_info");  //refreshing the user_info
				get_settings(true);			//refreshing the settings page
				change_image_button.disabled = false;   //abled the button
				change_image_button.innerHTML = "Change Image";
			}
		}

		myform.append('file', files[0]);  //myform is appending the file that is the first file. IS Acessing only one file and ignore the rest

		myform.append('data_type', "change_profile_image");  //myform is appending the data_type that is change_profile_image

		xml.open("POST", "uploader.php", true);  //true for comunication be assyncronous
		xml.send(myform);

	}

	function handle_drag_and_drop(e){	//drop and drag an image

		if (e.type == "dragover") {   //if the event type is dragover

			e.preventDefault(); //will prevent the the default behavior of replecing every thing in that file
			e.target.className = "dragging";
		}
		else if (e.type == "dragleave") {  //if the event type is dragleave

			e.target.className = "";


		}
		else if (e.type == "drop") { //if the event type is drop

			e.preventDefault(); //will prevent the the default behavior of replecing every thing in that file
			e.target.className = "";
			//console.log(e.dataTransfer.files);  ///
			upload_profile_image(e.dataTransfer.files);  //calling function to upload the image
		}

	}

	function start_chat(e){

		//var userid = e.target.id; //acessing the value inside of id attributte  
		var userid = e.target.getAttribute("userid");  //get attribute of the target

		if (e.target.id == "") {  //if the target(value) of id is empty
			//userid = e.target.parentNode.id;   //acessing the principal node of id atribute
			userid = e.target.parentNode.getAttribute("userid");  //acessing the value of userid
		}

		//console.log(userid);
		CURRENT_CHAT_USER = userid;

		var radio_chat = _("radio_chat");
		radio_chat.checked = true;
		get_data({userid:CURRENT_CHAT_USER},"chat");     //SENDONG AN ONJECT AND DATATYPE
		
	}
	

	
</script>