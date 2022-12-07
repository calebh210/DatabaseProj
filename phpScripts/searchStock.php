<?php

include "Database.class.php";

class StockSearch extends Database
{

    private $brand;
    private $priceRangeMin;
    private $priceRangeMax;
    private $size;


    public function __construct($brand, $priceRangeMin,$priceRangeMax, $size){
        $this->brand = $brand;
        $this->priceRangeMin = $priceRangeMin;
        $this->priceRangeMax = $priceRangeMax;
        $this->size = $size;
    }

    public function searchStockTable()
    {
        $sqlQuery = "SELECT * FROM stock_items WHERE brand = ? AND price BETWEEN ? AND ? or size = ?;";
        $stmt = $this->connect()->prepare($sqlQuery);

        if (!$stmt->execute(array($this->brand, $this->priceRangeMin,$this->priceRangeMax, $this->size))) {
            $stmt = null;
            exit();
        } else {
            $data = $stmt->fetchAll();
        }

        return $data;
    }
}

$brand = $_POST['brand'];
$priceRangeMin = $_POST['priceRangeMin'];
$priceRangeMax = $_POST['priceRangeMax'];
$size = $_POST['size'];

$search = new StockSearch($brand,$priceRangeMin,$priceRangeMax,$size);

$data = $search->searchStockTable();

echo json_encode($data);

?>