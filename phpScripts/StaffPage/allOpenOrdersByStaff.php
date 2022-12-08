<?php

// provides functionality for connection to database
include "../Database.class.php";

class CustomerOrders extends Database
{
    private $staffId;

    public function __construct($staffId)
    {
        $this->staffId = $staffId;
    }


    public function search()
    {
        // prepared query (? as placeholders, stops sql injection)
        $sqlQuery = "CALL open_orders(?);";
        $stmt = $this->connect()->prepare($sqlQuery);

        if (!$stmt->execute(array($this->staffId))) {
            return $stmt->errorInfo();
        } else {
            $data = $stmt->fetchAll();
            return $data;
        }
    }
}

// Grabbing user data
$staffId = $_POST["staffId"];

// init searcher object
$search = new CustomerOrders($staffId);

// performing search
$data = $search->search();

// send the data back
echo json_encode($data);
