<?php

// provides functionality for connection to database
include "../Database.class.php";

class StaffLogin extends Database
{

    private $staffID;

    public function __construct($staffID)
    {
        $this->staffID = $staffID;
    }


    public function searchStaffTable()
    {
        // prepared query (? as placeholders, stops sql injection)
        $sqlQuery = "SELECT first_name, staff_id, role FROM staff WHERE staff_id = ?;";

        $stmt = $this->connect()->prepare($sqlQuery);

        if (!$stmt->execute(array($this->staffID))) {
            $stmt = null;
            exit();
        } else {
            $data = $stmt->fetchAll();
        }

        return $data;
    }
}


// Grabbing user data
$staffID = $_POST["staffID"];

// init searcher object
$login = new StaffLogin($staffID);

// performing search
$data = $login->searchStaffTable();

// // send the data back
echo json_encode($data);
