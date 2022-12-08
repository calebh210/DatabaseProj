<?php

// provides functionality for connection to database
include "../Database.class.php";

class StockSearch extends Database
{

    private $brand;
    private $size;
    private $managerId;

    public function __construct($brand, $size, $managerId)
    {
        $this->brand = $brand;
        $this->size = $size;
        $this->managerId = $managerId;
    }


    public function search()
    {
        // prepared query (? as placeholders, stops sql injection)
        $sqlQuery = "CALL staff_stock_search(?,?,?);";

        $stmt = $this->connect()->prepare($sqlQuery);

        $inputArr = [(int)$this->managerId, $this->brand, (int)$this->size];

        if (!$stmt->execute($inputArr)) {
            // $stmt = null;
            return $stmt->errorInfo();
        } else {

            $data = $stmt->fetchAll();
            return $data;
        }
    }
}

// Grabbing user data
$managerId = $_POST["managerId"];
$brand = $_POST["selectedBrand"];
$size = $_POST["selectedSize"];


// init searcher object
$search = new StockSearch($brand, $size, $managerId);

// performing search
$data = $search->search();

// send the data back
echo json_encode($data);
