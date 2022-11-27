<?php
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

    /**
     * Checks if all the inputted values are empty
     */
    public function emptyInput()
    {
        if (empty($this->staffID) && empty($this->staffFirstName) && empty($this->staffLastName) && empty($this->staffEmail) && empty($this->staffPhoneNum) && empty($this->staffDob)) {
            return true;
        } else {
            return false;
        }
    }

    public function searchStaff()
    {
        // prepared query (? as placeholders, stops sql injection)
        $sqlQuery = "SELECT * FROM staff WHERE staff_id = ? OR first_name = ? OR sur_name = ? OR email = ? OR phone_num = ? OR date_of_birth = ?;";

        $stmt = $this->connect()->prepare($sqlQuery);

        if (!$stmt->execute(array($this->staffID, $this->staffFirstName, $this->staffLastName, $this->staffEmail, $this->staffPhoneNum, $this->staffDob))) {

            $stmt = null;
            header("location: ../Manager.php?error=stmtfailed");
            exit();
        }

        return $stmt;
    }
}
