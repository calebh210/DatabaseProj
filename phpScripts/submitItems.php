<?php

include "Database.class.php";

class submitItems extends Database
{

    private $branch_id;
    private $item_id;


    public function __construct($item_id, $branch_id)
    {
        $this->item_id = $item_id;
        $this->branch_id = $branch_id;
    }

    public function searchCheckout()
    {
        $sqlQuery = "CALL place_customer_items_order(?,?,1)";
        $stmt = $this->connect()->prepare($sqlQuery);

        if (!$stmt->execute(array($this->branch_id, $this->item_id))) {
            $stmt = null;
            exit();
        } else {
            $data = $stmt->fetchAll();
        }

        return $data;
    }
}

$branch_id = $_POST['branch_id'];
$item_id = $_POST['item_id'];

$search = new submitItems($branch_id, $item_id);

$data = $search->searchCheckout();

echo json_encode($data);