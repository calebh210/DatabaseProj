<?php

// provides functionality for connection to database
include "../Database.class.php";

class ResolveOrder extends Database
{

    private $orderID;
    private $staffId;

    public function __construct($orderID, $staffId)
    {
        $this->orderID = $orderID;
        $this->staffId = $staffId;
    }


    public function resolveOrder()
    {
        // prepared query (? as placeholders, stops sql injection)
        $sqlQuery = "CALL resolve_open_order(?,?)";
        $stmt = $this->connect()->prepare($sqlQuery);
        $inputArr = [$this->orderID, $this->staffId];

        if (!$stmt->execute($inputArr)) {
            return $stmt->errorInfo();
        } else {
            $data = $stmt->fetchAll();
        }

        return $data;
    }
}


// Grabbing user data
$orderId = $_POST["orderId"];
$staffId = $_POST["staffId"];


// init searcher object
$resolver = new ResolveOrder($orderId, $staffId);

// performing search
$data = $resolver->resolveOrder();

// // send the data back
echo json_encode($data);
