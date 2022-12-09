<?php

include "Database.class.php";

class StockSearch extends Database
{

    private $brand;
    private $priceRangeMin;
    private $priceRangeMax;
    private $size;

    private $branch;


    public function __construct($brand, $priceRangeMin,$priceRangeMax, $size){
        $this->brand = $brand;
        // $this->branch = $branch;
        $this->priceRangeMin = $priceRangeMin;
        $this->priceRangeMax = $priceRangeMax;
        $this->size = $size;
    }

    public function searchStockTable()
    {
        
        //customer_stock_search (branch, brand, size, lowerp, upperp)
        // $sqlQuery = "CALL customer_stock_search(?,?,?,?,?);";
        $sqlQuery = "SELECT * FROM stock_items WHERE brand = ? AND price BETWEEN ? AND ? AND size = ?;";
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
// $branch = $_POST['branch'];
$priceRangeMin = $_POST['priceRangeMin'];
$priceRangeMax = $_POST['priceRangeMax'];
$size = $_POST['size'];

$search = new StockSearch($brand,$priceRangeMin,$priceRangeMax,$size);

$data = $search->searchStockTable();

echo json_encode($data);

?>