<?php

$data = file_get_contents("php://input");
$myobject = json_decode($data); //using as parameter true to convert to array

//json_decode(json) == JSON.parse()
//json_encode(value) == JSON.stringify()

$myobject = (array)$myobject;
$myobject = (object)$myobject;
echo $myobject->gender;

die;
echo "<pre>";
print_r($myobject);
echo "</pre>";

