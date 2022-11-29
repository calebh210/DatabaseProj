<?php

// provides functionality for connection to database
include "Database.class.php";

class StaffSearch extends Database
{

    private $staffID;
    private $staffFirstName;
    private $staffLastName;
    private $staffEmail;
    private $staffPhoneNum;
    private $staffDob;

    public function __construct($staffID, $staffFirstName, $staffLastName, $staffEmail, $staffPhoneNum, $staffDob)
    {
        $this->staffID = $staffID;
        $this->staffFirstName = $staffFirstName;
        $this->staffLastName = $staffLastName;
        $this->staffEmail = $staffEmail;
        $this->staffPhoneNum = $staffPhoneNum;
        $this->staffDob = $staffDob;
    }


    public function searchStaffTable()
    {
        // prepared query (? as placeholders, stops sql injection)
        $sqlQuery = "SELECT * FROM staff WHERE staff_id = ? OR first_name = ? OR sur_name = ? OR email = ? OR phone_num = ? OR date_of_birth = ?;";

        $stmt = $this->connect()->prepare($sqlQuery);

        if (!$stmt->execute(array($this->staffID, $this->staffFirstName, $this->staffLastName, $this->staffEmail, $this->staffPhoneNum, $this->staffDob))) {
            $stmt = null;
            exit();
        } else {
            $data = $stmt->fetchAll();
        }

        $data = 1;
        return $data;
    }
}

// Grabbing user data
$staffID = $_POST["staffID"];
$staffFirstName = $_POST["staffFirstName"];
$staffLastName = $_POST["staffLastName"];
$staffEmail = $_POST["staffEmail"];
$stafPhoneNum = $_POST["stafPhoneNum"];
$staffDob = $_POST["staffDob"];

// init searcher object
$search = new StaffSearch($staffID, $staffFirstName, $staffLastName, $staffEmail, $stafPhoneNum, $staffDob);

// performing search
$data = $search->searchStaffTable();

// send the data back
echo json_encode($data);
