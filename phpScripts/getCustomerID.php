<?php

include "Database.class.php";

class customerSearch extends Database
{

    private $email;


    public function __construct($email){
        $this->email = $email;
    }

    public function searchCheckout()
    {
        $sqlQuery = "SELECT customer_id FROM customer WHERE email = ?;";
        $stmt = $this->connect()->prepare($sqlQuery);

        if (!$stmt->execute(array($this->email))) {
            $stmt = null;
            exit();
        } else {
            $data = $stmt->fetchAll();
        }

        return $data;
        }
}


$email = $_POST['email'];

$search = new customerSearch($email);

$data = $search->searchCheckout();

echo json_encode($data);
