<?php

//Connect to the database
require '/home/gwugreen/config.php';

class Database
{
    function connect()
    {
        try {
            //Instantiate a database object
            $dbh = new PDO(DB_DSN, DB_USERNAME,
                DB_PASSWORD);
            //echo "Connected to database!!!";
            return $dbh;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return;
        }
    }

    //return a list of all hardware in our DB
    function getAllHardware()
    {
        global $dbh;

        $dbh = $this->connect();
        //1. define the query
        $sql = "SELECT * FROM hardware ORDER BY type";

        //2. prepare the statement
        $statement = $dbh->prepare($sql);

        //3. bind parameters

        //4. execute the statement
        $statement->execute();

        //5. return the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        //print_r($result);
        return $result;
    }

    //given a type of hardware, return all possible options
    function getHardware($type)
    {
        global $dbh;

        $dbh = $this->connect();
        //1. define the query
        $sql = "SELECT * FROM hardware WHERE type = :type";

        //2. prepare the statement
        $statement = $dbh->prepare($sql);

        //3. bind parameters
        $statement->bindParam(':type', $type, PDO::PARAM_INT);

        //4. execute the statement
        $statement->execute();

        //5. return the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        //print_r($result);
        return $result;
    }

    //given a specific part name, return an individual part
    function getPart($partName)
    {
        global $dbh;
        $dbh = $this->connect();

        //1. define the query
        $sql = "SELECT * FROM hardware WHERE partName = :partName";

        //2. prepare the statement
        $statement = $dbh->prepare($sql);

        //3. bind parameters
        $statement->bindParam(':partName', $partName, PDO::PARAM_INT);

        //4. execute the statement
        $statement->execute();

        //5. return the result
        $result = $statement->fetch(PDO::FETCH_ASSOC);


        // if not premium we dont need some fields
        return $result;
    }

    function getPerformance($partName)
    {
        global $dbh;
        $dbh = $this->connect();

        $sql = "Select performance from hardware where partName = :partName ";

        $statement = $dbh->prepare($sql);
        $statement->bindParam(':partName', $partName, PDO::PARAM_INT);
        $statement->execute();
        // $results = $dbh->query($sql);
        $results = $statement->fetch();

        //echo $results;

        return $results;
    }
}