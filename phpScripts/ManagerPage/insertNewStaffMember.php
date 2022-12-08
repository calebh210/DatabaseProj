<?php

// provides functionality for connection to database
include "../Database.class.php";

class SupplierOrder extends Database
{
    private $submittingManager;
    private $inRole;
    private $inFName;
    private $inLastName;
    private $inDob;
    private $inSalary;
    private $inGender;
    private $inDateJoined;
    private $inPhoneNum;
    private $email;

    public function __construct($submittingManager, $inRole, $inFName, $inLastName, $inDob, $inSalary, $inGender, $inDateJoined, $inPhoneNum, $email)
    {
        $this->submittingManager = $submittingManager;
        $this->inRole = $inRole;
        $this->inFName = $inFName;
        $this->inLastName = $inLastName;
        $this->inDob = $inDob;
        $this->inSalary = $inSalary;
        $this->inGender = $inGender;
        $this->inDateJoined = $inDateJoined;
        $this->inPhoneNum = $inPhoneNum;
        $this->email = $email;
    }

    public function insertNewStaffMember()
    {
        $sqlQuery = 'CALL add_staff(?,?,?,?,?,?,?,?,?,?);';

        $inputArr = [
            $this->submittingManager,
            $this->inRole,
            $this->inFName,
            $this->inLastName,
            $this->inDob,
            $this->inSalary,
            $this->inGender,
            $this->inDateJoined,
            $this->inPhoneNum,
            $this->email
        ];

        $stmt = $this->connect()->prepare($sqlQuery);

        // if (!$stmt->execute(array($inputArr))) {
        if (!$stmt->execute($inputArr)) {
            return $stmt->errorInfo();
        } else {
            $data = $stmt->fetchAll();
            return $data;
        }
    }
}

// Grabbing user data
$submittingManager = $_POST['managerId'];
$inRole = $_POST['inRole'];
$inFName = $_POST['inFName'];
$inLastName = $_POST['inLastName'];
$inDob = $_POST['inDob'];
$inSalary = $_POST['inSalary'];
$inGender = $_POST['inGender'];
$inDateJoined = $_POST['inDateJoined'];
$inPhoneNum = $_POST['inPhoneNum'];
$email = $_POST['email'];


// init searcher object
$insertOrder = new SupplierOrder($submittingManager, $inRole, $inFName, $inLastName, $inDob, $inSalary, $inGender, $inDateJoined, $inPhoneNum, $email);

// performing search
$returnVal = $insertOrder->insertNewStaffMember();

// send the data back
echo json_encode($returnVal);
