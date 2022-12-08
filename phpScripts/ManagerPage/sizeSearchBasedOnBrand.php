<?php

// provides functionality for connection to database
include "../Database.class.php";

class SizeSearch extends Database
{

    private $brand;
    private $managerId;

    public function __construct($brand, $managerId)
    {
        $this->brand = $brand;
        $this->managerId = $managerId;
    }


    public function selectSizes()
    {
        // prepared query (? as placeholders, stops sql injection)
        $sqlQuery = "CALL search_sizes_on_brand(?,?);";
        $stmt = $this->connect()->prepare($sqlQuery);
        $inputArr = [$this->managerId, $this->brand];

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

// init searcher object
$search = new SizeSearch($brand, $managerId);

// performing search
$data = $search->selectSizes();

// send the data back
echo json_encode($data);
