<?php

//Connect to the database
require '/home/gwugreen/config.php';

class userbase
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

    function insertPlan($cpu, $motherboard, $gpu, $ram, $ssd, $hdd, $power, $monitor, $computerCase, $other)
    {
        global $dbh;
        $dbh = $this->connect();

        $sql = 'INSERT INTO Members(cpu, motherboard, gpu, ram, ssd, hdd, power, monitor, computerCase, other) 
VALUES(:cpu, :motherboard, :gpu, :ram, :ssd, :hdd, :power, :monitor, :computerCase, :other)';

        $statement = $dbh->prepare($sql);

        $statement->bindValue(':cpu', $cpu, PDO::PARAM_STR);
        $statement->bindValue(':motherboard', $motherboard, PDO::PARAM_STR);
        $statement->bindValue(':gpu', $gpu, PDO::PARAM_STR);
        $statement->bindValue(':ram', $ram, PDO::PARAM_STR);
        $statement->bindValue(':ssd', $ssd, PDO::PARAM_STR);
        $statement->bindValue(':hdd', $hdd, PDO::PARAM_STR);
        $statement->bindValue(':power', $power, PDO::PARAM_INT);
        $statement->bindValue(':monitor', $monitor, PDO::PARAM_INT);
        $statement->bindValue(':computerCase', $computerCase, PDO::PARAM_INT);
        $statement->bindValue(':other', $other, PDO::PARAM_INT);

        $statement->execute();
    }


    function getPlan($planNumber)
    {
        global $dbh;
        $dbh = $this->connect();

        $sql = "SELECT planNumber, cpu, motherboard, gpu, ram, ssd, hdd, power, monitor, computerCase, other FROM plan WHERE planNumber= $planNumber";
        $results = $dbh->query($sql);

        return $results;
    }


    function getCPU($planNumber)
    {
        global $dbh;
        $dbh = $this->connect();

        $sql = "SELECT cpu FROM plan WHERE planNumber= $planNumber";
        $results = $dbh->query($sql);

        return $results;
    }

}