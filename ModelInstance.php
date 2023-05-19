<?php

class ModelInstance
{

    public function saveInstanceToDB(): mysqli_result
    {
        $mysqli = new mysqli('localhost', 'dbuser', 'dbpasswd', 'sql_injection_example');
        $queryCreator = new QueryCreator();
        /**
         * SQLI1
         * ModelInstance with user input in it calling another class
         */
        $query = $queryCreator->constructInsertQuery($this);
        $result = null;
        if ($mysqli->query($query)) {
            $result = $mysqli->query($query);
        }
        return $result;
    }
    public function getInstanceFromDatabaseBasedOnObjects(string $name,ModelInstanceCollection $arayOfObjects) : mysqli_result
    {
        $mysqli = new mysqli('localhost', 'dbuser', 'dbpasswd', 'sql_injection_example');
        $QueryCreator = new QueryCreator();
        /**
         * SQLI2
         * The current modelInstance, name variable, and array with modelInstances is passed on to another class
         */
        $query = $QueryCreator->constructSelectQueryBasedOnObjects($this, $name, $arayOfObjects);
        $result = null;
        if ($mysqli->query($query)) {
            $result = $mysqli->query($query);
        }
        return $result;
    }
}