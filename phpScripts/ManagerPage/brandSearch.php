<?php

// provides functionality for connection to database
include "../Database.class.php";

class BrandSearch extends Database
{
    public function selectBrands()
    {
        // prepared query (? as placeholders, stops sql injection)
        $sqlQuery = "CALL brand_search;";

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
$search = new BrandSearch();

// performing search
$data = $search->selectBrands();

// send the data back
echo json_encode($data);
