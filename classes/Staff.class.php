<?php

class Staff extends Database {

    public function getAllStaff(){
        $sql = "SELECT * FROM staff";
        $stmt = $this->connect()->query($sql);

        while($row = $stmt->fetch()){
            echo $row['staff_id']."<br>";
            echo $row['branch_id']."<br>";
            echo $row['role']."<br>";
            echo $row['first_name']."<br>";
            echo $row['sur_name']."<br>";
            echo $row['date_of_birth']."<br>";
            echo $row['salary']."<br>";
            echo $row['gender']."<br>";
            echo $row['date_joined']."<br>";
        }
    }
}

?>