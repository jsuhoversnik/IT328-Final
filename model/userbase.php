<?php
/**
 * Wu, Jake
 * 2/24/2019
 * 328/IT328-Final/model/userbase.php
 *
 * contains functions to insert and retrieve plan information to relevant table.
 */
//Connect to the database
//require '/home/gwugreen/config.php';
require '/home2/jsuhover/config.php';

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

        echo($cpu . " -" . $motherboard . " -" . $gpu . " -" . $ram . $ssd . " -" . $hdd . " -" . $power . " -" . $monitor . " -" . $computerCase . " -" . $other);

        $sql = 'INSERT INTO plans(cpu, motherboard, gpu, ram, ssd, hdd, power, monitor, computerCase, other) 
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

        $sql = "SELECT planNumber, cpu, motherboard, gpu, ram, ssd, hdd, power, monitor, computerCase, other FROM plans WHERE planNumber= $planNumber";
        $results = $dbh->query($sql);

        return $results;
    }


    function getPart($planNumber, $part)
    {
        global $dbh;
        $dbh = $this->connect();

        $sql = "SELECT $part FROM plans WHERE planNumber= :planNumber";

        $statement = $dbh->prepare($sql);
        $statement->bindParam(':planNumber', $planNumber, PDO::PARAM_INT);
        $statement->execute();
        // $results = $dbh->query($sql);
        $results = $statement->fetch();

        //echo $results;

        return $results;
    }

    function getPrice($partName)
    {
        global $dbh;
        $dbh = $this->connect();

        $sql = "Select price from hardware where partName = :partName ";

        $statement = $dbh->prepare($sql);
        $statement->bindParam(':partName', $partName, PDO::PARAM_STR);
        $statement->execute();
        // $results = $dbh->query($sql);
        $results = $statement->fetch();

        //echo $results;

        return $results;
    }

    function getPlanNumber()
    {
        global $dbh;
        $dbh = $this->connect();

        $sql = "Select max(planNumber) from plans";

        $statement = $dbh->prepare($sql);
        $statement->execute();
        // $results = $dbh->query($sql);
        $results = $statement->fetch();

        //echo $results;

        return $results;
    }

}

// select price sql
// Select hardware.price from hardware, plans where plans.cpu=hardware.partName