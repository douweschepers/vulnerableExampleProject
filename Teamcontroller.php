<?php

require_once './QueryCreator.php';
require_once './Team.php';
require_once './Matches.php';
require_once './City.php';
require_once './Player.php';
require_once './Competition.php';
require_once './TeamController.php';
require_once './ModelInstanceCollection.php';

class TeamController
{
	/**
	 * Incoming traffic
	 */
	public function saveTeam(): object
	{
		/**
		 * SQLI1
		 * Start of potential vulnerability because of user input
		 */
		$name = $_GET['name'];
		  /**
		 * SQLI1
		 * User input being stored in a object
		 */
		$T0 = new Team();
		$T0 ->setName($name);
        /**
         * SQLI1
         * modelInstance with user input inside it being used to call another function
         */
        $returnObject = $T0 ->saveInstanceToDB();
        return $returnObject;
	}


	/**
	 * Incoming traffic
	 */
	public function getTeam(): object
	{
		/**
		 * SQLI2
		 * Start of potential vulnerability because of user input
		 */
		$name = $_GET['name'];

		  /**
		 * SQLI2
		 * User input being stored in a object
		 */
		$T0 = new Team();
		$T0 ->setName($name);
		  /**
		 * SQLI2
		 * User input being stored in a object
		 */
		$M1 = new Matches();
		$M1 ->setName($name);
		  /**
		 * SQLI2
		 * User input being stored in a object
		 */
		$C2 = new City();
		$C2 ->setName($name);
		  /**
		 * SQLI2
		 * User input being stored in a object
		 */
		$P3 = new Player();
		$P3 ->setName($name);
		  /**
		 * SQLI2
		 * User input being stored in a object
		 */
		$C4 = new Competition();
		$C4 ->setName($name);

        // Add all the models to a collection
        $arrayOfModels = new ModelInstanceCollection($T0,$M1,$C2,$P3,$C4);
        // Use Collection and user input to retrieve data from DB
        /**
         * SQLI2
         * The array with modelInstances is passed on to another class
         */
        $result = $T0->getInstanceFromDatabaseBasedOnObjects($name,$arrayOfModels);
        return $result;
    }
}