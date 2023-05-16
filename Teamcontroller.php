<?php

require_once './queryCreator.php';
require_once './Team.php'; 
require_once './TeamController.php'; 

class TeamController
{
	/**
	 * Incoming traffic
	 */
	public function getTeam(): object
	{
		/**
		 * SQLI1
		 * Start of potential vulnerability because of user input
		 */
		$name = $_GET['name'];

		$mysqli = new mysqli('localhost', 'dbuser', 'dbpasswd', 'sql_injection_example');


		$arrayOfObjects = [];
		  /**
		 * SQLI1
		 * User input being stored in a object
		 */
		$T0 = new Team();
		$T0 ->setName($name);
		$arrayOfObjects[] = $T0;
		/**
		 * SQLI1 && SQLI2
		 * User input send to another function of another class
		 */
		$queryCreator = new queryCreator();
		$query = $queryCreator->constructQuery($name, $arrayOfObjects);
		$result = null;
		if ($mysqli->query($query)) {
		    $result = $mysqli->query($query);
		}

		return $result;
	}


	/**
	 * Incoming traffic
	 */
	public function getRandom0(): object
	{
		/**
		 * SQLI2
		 * Start of potential vulnerability because of user input
		 */
		$name = $_GET['name'];

		$mysqli = new mysqli('localhost', 'dbuser', 'dbpasswd', 'sql_injection_example');


		$arrayOfObjects = [];
		  /**
		 * SQLI2
		 * User input being stored in a object
		 */
		$T0 = new Team();
		$T0 ->setName($name);
		$arrayOfObjects[] = $T0;
		  /**
		 * SQLI2
		 * User input being stored in a object
		 */
		$M1 = new Matches();
		$M1 ->setName($name);
		$arrayOfObjects[] = $M1;
		  /**
		 * SQLI2
		 * User input being stored in a object
		 */
		$C2 = new City();
		$C2 ->setName($name);
		$arrayOfObjects[] = $C2;
		  /**
		 * SQLI2
		 * User input being stored in a object
		 */
		$P3 = new Player();
		$P3 ->setName($name);
		$arrayOfObjects[] = $P3;
		  /**
		 * SQLI2
		 * User input being stored in a object
		 */
		$C4 = new Competition();
		$C4 ->setName($name);
		$arrayOfObjects[] = $C4;
		/**
		 * SQLI1 && SQLI2
		 * User input send to another function of another class
		 */
		$queryCreator = new queryCreator();
		$query = $queryCreator->constructQuery($name, $arrayOfObjects);
		$result = null;
		if ($mysqli->query($query)) {
		    $result = $mysqli->query($query);
		}

		return $result;
	}
}
