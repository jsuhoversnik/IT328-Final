<?php

/*
 * CREATE TABLE Members(
  `member_id` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `state` varchar(18) DEFAULT NULL,
  `seeking` varchar(6) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `premium` tinyint(4) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `interests` varchar(255) DEFAULT NULL
    );
 */
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
}