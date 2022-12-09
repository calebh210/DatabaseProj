<?php

include "Database.class.php";

class getBrands extends Database
{

    public function searchCheckout()
    {
        $sqlQuery = "SELECT DISTINCT brand FROM stock_items;";
        $stmt = $this->connect()->prepare($sqlQuery);

        if (!$stmt->execute()) {
            $stmt = null;
            exit();
        } else {
            $data = $stmt->fetchAll();
        }

        return $data;
        }
}

$search = new getBrands();

$data = $search->searchCheckout();

echo json_encode($data);

?>