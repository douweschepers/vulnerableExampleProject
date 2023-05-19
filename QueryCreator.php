<?php

class QueryCreator
{
    public function constructInsertQuery(ModelInstance $modelInstance): string
    {
        $tableName = get_class($modelInstance);
        $queryColumns = $this->createQueryForProperties($modelInstance);
        /**
         * SQLI1
         * Obtain the values of the modelInstance
         */
        $queryValues = $this->createQueryForValuesOfProperties($modelInstance);

        $query = 'INSERT INTO ' . $tableName . ' ( ' . $queryColumns . ' ) ' . ' VALUES ( ' . $queryValues . ' )';
        return $query;
    }
    public function createQueryForProperties(ModelInstance $objectToSave): string
    {
        $queryColumns = NULL;
        foreach ($objectToSave as $key => $value)
        {
            $queryColumns .= $key . ',';
        }
        $queryColumns = substr($queryColumns, 0, -1);
        return $queryColumns;
    }

    public function createQueryForValuesOfProperties(ModelInstance $objectToSave): string
    {
        /**
         * SQLI1
         * Loop over the modelInstance values (which contain user input) and extract the data for a query
         */
        $queryValues = NULL;
        foreach ($objectToSave as $key => $value)
        {
            $queryValues .= $value . ',';
        }
        $queryValues = substr($queryValues, 0, -1);
        return $queryValues;
    }

	/**
	 * Select fields for query
	 */
	public function constructSelectQueryBasedOnObjects(ModelInstance $objectToGet, string $name, ModelInstanceCollection $arrayOfObjects): string
	{
		$selectStatement = $this->createQueryForProperties($objectToGet);
		$fromStatement = get_class($objectToGet);
		 /**
		 * SQLI2
		 * User input send to a internal function as parameter $name
		 */
		$whereStatement = $this->createWhere($arrayOfObjects, $name);
		$query = 'SELECT ' . "'" . $selectStatement  . "'" . ' FROM ' . $fromStatement . ' where ' . $whereStatement;
		return $query;
	}

	/**
	 * Create the where clause for the query
	 */
	public function createWhere(ModelInstanceCollection $arrayOfModelInstances, string $name): string
	{
		/**
		 * SQLI2
		 * The value of properties of a object are compared to the user input, which is $name
		 */
		$whereClause = null;
		foreach($arrayOfModelInstances as $objectToSelect)
		{
            $classOfObj = get_class($objectToSelect);
		    foreach((array)$objectToSelect as $key => $value)
		    {
		        $whereClause .= "$classOfObj.$key =" . "'" .  $name . "' ,";
		    }
            $whereClause = substr($whereClause, 0, -1);
		}
		return $whereClause;
	}
}
