<?php
include "Database.class.php";

class SizeSearch extends Database
{
    private $brand;
    private $name;

    public function __construct($brand, $name){
        $this->brand = $brand;
        $this->name = $name;

    }

    public function searchTables()
    {
        $sqlQuery = "SELECT size FROM stock_items where type = 'Shoe' and brand = ? and Name = ? and quantity > 0;";

        $stmt = $this->connect()->prepare($sqlQuery);

        if (!$stmt->execute(array($this->brand,$this->name ))) {
            $stmt = null;
            exit();
        } else {
            $data = $stmt->fetchAll();
        }

        return $data;

    }
}


    $brand = $_POST['brand'];
    $name = $_POST['name'];

    $search = new SizeSearch($brand,$name);

    $data = $search->searchTables();

    echo json_encode($data);



















