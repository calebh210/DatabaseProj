<?php

if (isset($_POST["search"])) {

    // Grabbing user data
    $staffID = $_POST["staffID"];
    $staffFirstName = $_POST["staffFirstName"];
    $staffLastName = $_POST["staffLastName"];
    $staffEmail = $_POST["staffEmail"];
    $stafPhoneNum = $_POST["stafPhoneNum"];
    $staffDob = $_POST["staffDob"];

    // init staff search class
    include "../classes/StaffSearch.class.php";
    $search = new StaffSearch($staffID, $staffFirstName, $staffLastName, $staffEmail, $stafPhoneNum, $staffDob);

    if (!$search->emptyInput()) {
        $search->searchStaff();

        //got here need to print results now
    }

    // back to the front page
    header("location: ../Manager.php?error=None");
}
