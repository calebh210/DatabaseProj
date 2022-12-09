<?php

include "Database.class.php";

class checkoutSearch extends Database
{

    private $first_name;
    private $sur_name;
    private $street_no;
    private $street_name;
    private $postcode;
    private $gender;
    private $email;


    public function __construct($first_name, $sur_name, $street_no, $street_name, $postcode, $gender, $email){
        $this->first_name = $first_name;
        $this->sur_name = $sur_name;
        $this->street_no = $street_no;
        $this->street_name = $street_name;
        $this->postcode = $postcode;
        $this->gender = $gender;
        $this->email = $email;
    }

    public function searchCheckout()
    {
        $sqlQuery = "CALL register_customer(?,?,?,?,?,?,?);";
        $stmt = $this->connect()->prepare($sqlQuery);

        if (!$stmt->execute(array($this->first_name,$this->sur_name,$this->street_no,$this->street_name,$this->postcode,$this->gender,$this->email))) {
            $stmt = null;
            exit();
        } else {
            $data = $stmt->fetchAll();
        }

        return $data;
        }
}


$first_name = $_POST['first_name'];
$sur_name = $_POST['sur_name'];
$street_no = $_POST['street_no'];
$street_name = $_POST['street_name'];
$postcode = $_POST['postcode'];
$gender = $_POST['gender'];
$email = $_POST['email'];

$search = new checkoutSearch($first_name,$sur_name,$street_no,$street_name,$postcode,$gender,$email);

$data = $search->searchCheckout();

echo json_encode($data);
