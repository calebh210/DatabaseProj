<?php

// provides functionality for connection to database
include "../Database.class.php";

class StockItemLoader extends Database
{
    public function selectAllStock()
    {
        // prepared query (? as placeholders, stops sql injection)
        $sqlQuery = "CALL supplier_search();";

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

// init searcher object
$search = new StockItemLoader();

// performing search
$data = $search->selectAllStock();

// send the data back
echo json_encode($data);
