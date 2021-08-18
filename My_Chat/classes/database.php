<?php

Class Database
{
	private $con;


	//construct
	function __construct()
	{
		$this->con = $this->connect();
	}

	//connect to db
	private function connect()
	{

		$string = "mysql:dbname=mychatsystem;host=localhost";
		
		try
		{

			$connection = new PDO($string,DBUSER,DBPASS);
			return $connection;

		}catch(PDOException $e)
		{
			echo $e->getMessage();
			die;
		}

		return false;  //if doesnt of them work
	}

	//read from database
	public function write($query, $data_array = [])
	{

		$con = $this->connect();
		$statement = $con->prepare($query);
		$check = $statement->execute($data_array);   //binding  internaly a parameter together with $query

		if ($check) //if every thing went well return true
		{
			return true;
		}

		//and return false other rise if was negative
		return false;
	}

	public function read($query, $data_array = [])
	{

		$con = $this->connect();
		$statement = $con->prepare($query);
		$check = $statement->execute($data_array);   //binding  internaly a parameter together with $query

		if ($check) //if every thing went well return true
		{

			$result = $statement->fetchAll(PDO::FETCH_OBJ);  //fetching for an object
			if(is_array($result) && count($result) > 0)
			{	
				
				return $result;
			}
			return false;
		}

		//and return false other rise if was negative
		return false;
	}

	public function generate_id($max)
	{

		$rand = "";
		$rand_count = rand(4, $max);

		for ($i=0; $i < $rand_count ; $i++) { 
			# code...
			$r = rand(0,9);
			$rand .= $r;   //adding $r
		}

		return $rand;
	}
}