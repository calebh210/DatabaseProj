<?php

include "Database.class.php";

class checkoutSearch extends Database
{

    private $item_id;


    public function __construct($item_id){
        $this->item_id = $item_id;
    }

    public function searchCheckout()
    {
        $sqlQuery = "SELECT * FROM stock_items WHERE item_id = ?;";
        $stmt = $this->connect()->prepare($sqlQuery);

        if (!$stmt->execute(array($this->item_id))) {
            $stmt = null;
            exit();
        } else {
            $data = $stmt->fetchAll();
        }

        return $data;
        }
}


$item_id = $_POST['item_id'];

$search = new checkoutSearch($item_id);

$data = $search->searchCheckout();

echo json_encode($data);

