<?php

// provides functionality for connection to database
include "../Database.class.php";

class SupplierOrder extends Database
{

    private $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function insertOrder()
    {
        $sqlQuery = 'CALL place_supplier_order(?,?);';
        // $sqlQuery = 'INSERT INTO stock_order(supplier_id, price) VALUES (12,999)';

        $total = $this->totalPrice();

        $stmt = $this->connect()->prepare($sqlQuery);

        if (!$stmt->execute(array($this->order[0][1], $total))) {
            // $stmt = null;
            return $stmt->errorInfo();
        } else {
            $data = $stmt->fetchAll();
            return $data;
        }
    }

    public function placeStockOrder()
    {
        $data = '';

        for ($x = 0; $x <= count($this->order); $x++) {

            $sqlQuery = 'CALL place_stock_item_order(?,?);';

            $stmt = $this->connect()->prepare($sqlQuery);

            if (!$stmt->execute(array($this->order[$x][0], $this->order[$x][2]))) {
                // $stmt = null;
                return $stmt->errorInfo();
            } else {
                $data = $stmt->fetchAll();
            }
        }

        return $data;
    }


    public function totalPrice()
    {
        $total = 0;

        for ($x = 0; $x <= count($this->order); $x++) {
            $total += $this->order[$x][3];
        }

        return $total;
    }
}

// Grabbing user data
$order = $_POST["orderToPlace"];

// init searcher object
$insertOrder = new SupplierOrder($order);

// performing search
$returnVal1 = $insertOrder->insertOrder();
$returnVal2 = $insertOrder->placeStockOrder();

// send the data back
echo json_encode($returnVal1 + ' ' + $returnVal2);
