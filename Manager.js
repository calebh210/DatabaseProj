class StaffSearch {

    constructor() {
        this.staffID;
        this.staffFirstName;
        this.staffLastName;
        this.staffEmail;
        this.stafPhoneNum;
        this.staffDob;
        this.searchResult
    }

    /**
     * Stores the form data in object fields
     */
    getFormData() {
        this.staffID = document.getElementById('staffID').value;
        this.staffFirstName = document.getElementById('staffFirstName').value;
        this.staffLastName = document.getElementById('staffLastName').value;
        this.staffEmail = document.getElementById('staffEmail').value;
        this.stafPhoneNum = document.getElementById('stafPhoneNum').value;
        this.staffDob = document.getElementById('staffDob').value;
    }


    /**
     * Checks if all fields are empty
     * @returns true if all fields are empty
     */
    allFieldsEmpty() {

        // checks all fields to check if they are null
        if (this.staffID == null && this.staffFirstName == null && this.staffFirstName == null && this.staffLastName == null && this.stafPhoneNum == null && this.staffDob == null) {

            return true;
        }
        else {
            return false;
        }

    }

    /**
     * Uses jQuery's ajax to interact with php, searching the database for staff search conditions
     */
    searchDatabase() {

        var returned;

        // ajac call to the php 
        $.ajax({
            async: false,
            cache: false,
            url: "phpScripts/searchStaff.php",
            type: "POST",
            dataType: "json",
            data: {
                staffID: this.staffID,
                staffFirstName: this.staffFirstName,
                staffLastName: this.staffLastName,
                staffEmail: this.staffEmail,
                stafPhoneNum: this.stafPhoneNum,
                staffDob: this.staffDob
            },
            success: function (data) {
                returned = data;
            }
        });

        // prints returned data
        // // TODO: REMOVE, HERE FOR TESTING
        // console.log(returned);
        // console.log(typeof returned);

        return returned
    }

    /**
     * Generates html table and appends to DOM
     */
    appendTable(tableObject) {

        alert(tableObject[0]['first_name']);

        text = "<table border='1'>"
        counter = 0
        for (let x in tableObject) {
            counter++
            // text += "<tr><td>" + tableObject[x].name + "</td></tr>";
        }
        alert(counter)
        // text += "</table>"
        // document.getElementById("staffSearchResults").innerHTML = text;
    }
}

// variable holding the form
var staffSearchSubmit = document.getElementById('submitStaffSearch');

// Event listener that listens for submit event
staffSearchSubmit.addEventListener("click", () => {

    // new staff search object
    const searchStaff = new StaffSearch();
    searchStaff.getFormData();

    // checking inputs are not empty
    if (!searchStaff.allFieldsEmpty()) {

        // querying database
        resultsArray = searchStaff.searchDatabase();

        // appending table to the DOM
        searchStaff.appendTable(resultsArray);
    }


})