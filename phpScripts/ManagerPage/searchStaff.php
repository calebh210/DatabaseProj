<?php

// provides functionality for connection to database
include "../Database.class.php";

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
        $sqlQuery = 'SELECT * FROM staff WHERE 1=1';
        $inputArray = array();

        if ($this->staffID != '') {
            $sqlQuery .= ' AND staff_id = ?';
            array_push($inputArray, $this->staffID);
        }
        if ($this->staffFirstName != '') {
            $sqlQuery .= ' AND first_name = ?';
            array_push($inputArray, $this->staffFirstName);
        }
        if ($this->staffLastName != '') {
            $sqlQuery .= ' AND surname = ?';
            array_push($inputArray, $this->staffLastName);
        }

        $sqlQuery .= ';';


        // prepared query (? as placeholders, stops sql injection)
        // $sqlQuery = "CALL staff_search(?,?,?);";
        // $inputArray = array($this->staffID, $this->staffFirstName, $this->staffLastName);




        $stmt = $this->connect()->prepare($sqlQuery);

        if (!$stmt->execute($inputArray)) {
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
