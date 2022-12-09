<?php

include "Database.class.php";

class submitOrder extends Database
{

    private $branch_id;
    private $date;
    private $customerID;
    private $price;


    public function __construct($branch_id,$date,$customerID,$price){
        $this->branch_id = $branch_id;
        $this->date = $date;
        $this->customerID = $customerID;
        $this->price = $price;

    }

    public function searchCheckout()
    {
        $sqlQuery = "CALL place_customer_order(?,?,?,?);";
        $stmt = $this->connect()->prepare($sqlQuery);

        if (!$stmt->execute(array($this->branch_id,$this->date,$this->customerID,$this->price))) {
            return $stmt->errorInfo();
        } else {
            $data = $stmt->fetchAll();
        }

        return $data;
        }
}


$branch_id = $_POST['branch_id'];
$date = $_POST['date'];
$customerID = $_POST['customerID'];
$price = $_POST['price'];

$search = new submitOrder($branch_id,$date,$customerID,$price);

$data = $search->searchCheckout();


echo json_encode($data);
