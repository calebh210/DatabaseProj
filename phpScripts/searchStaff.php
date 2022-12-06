<?php

// provides functionality for connection to database
include "Database.class.php";

class StaffSearch extends Database
{

    private $staffID;
    private $staffFirstName;
    private $staffLastName;

    public function __construct($staffID, $staffFirstName, $staffLastName)
    {
        $this->staffID = $staffID;
        $this->staffFirstName = $staffFirstName;
        $this->staffLastName = $staffLastName;
    }

    public function searchStaffTable()
    {
        // prepared query (? as placeholders, stops sql injection)
        $sqlQuery = "CALL staff_search(?,?,?)";

        $stmt = $this->connect()->prepare($sqlQuery);

        if (!$stmt->execute(array($this->staffID, $this->staffFirstName, $this->staffLastName))) {
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
$staffFirstName = $_POST["staffFirstName"];
$staffLastName = $_POST["staffLastName"];
// init searcher object
$search = new StaffSearch($staffID, $staffFirstName, $staffLastName);

// performing search
$data = $search->searchStaffTable();

// send the data back
echo json_encode($data);
