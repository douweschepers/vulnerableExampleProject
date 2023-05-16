<?php

require_once './queryCreator.php';
require_once './Team.php'; 
require_once './TeamController.php'; 

class queryCreator
{
	/**
	 * Select fields for query
	 */
	public function constructQuery(string $name, array $arrayOfObjects): string
	{
		$selectStatement = $this->createSelect($arrayOfObjects);
		$fromStatement = $this->createFrom();
		 /**
		 * SQLI1 && SQLI2
		 * User input send to a internal function as parameter $name
		 */
		$whereStatement = $this->createWhere($arrayOfObjects, $name);
		$query = 'SELECT ' . "'" . $selectStatement  . "'" . ' FROM ' . $fromStatement . ' where ' . $whereStatement;
		return $query;
	}


	/**
	 * Select fields for query
	 */
	public function createSelect(array $arrayOfObjects): string
	{
		$selectClause = null;
		foreach($arrayOfObjects as $objectToSelect)
		{
		    foreach((array)$objectToSelect as $key => $value)
		    {
		        $selectClause .= $key . ',';
		    }
		}
		$selectClause = substr($selectClause, 0, -1);
		return $selectClause;
	}


	/**
	 * From databases for query
	 */
	public function createFrom(): string
	{
		return 'T0,M1,C2,P3,C4';
	}


	/**
	 * Create the where clause for the query
	 */
	public function createWhere(array $arrayOfObjects, string $name): string
	{
		/**
		 * SQLI1 && SQLI2
		 * The value of properties of a object are compared to the user input, which is $name
		 */
		$whereClause = null;
		foreach($arrayOfObjects as $objectToSelect)
		{
		    foreach((array)$objectToSelect as $key => $value)
		    {
		        $whereClause .= "$value = $name" . ',';
		    }
		}
		return $whereClause;
	}
}
