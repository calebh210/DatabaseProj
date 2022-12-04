/**
 * Provides all the structures and functions to search for staff members
 */
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

        // ajax call to the php 
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

        return returned
    }


    /**
     * Creates and appends the staff search results table
     * 
     * https://www.geeksforgeeks.org/how-to-convert-json-data-to-a-html-table-using-javascript-jquery/
     * @param {*} list 
     */
    constructTable(list) {

        // // Getting the all column names
        var cols = this.headers(list, "#staffSearchResults");

        // Traversing the JSON data
        for (var i = 0; i < list.length; i++) {
            var row = $('<tr/>');
            for (var colIndex = 0; colIndex < cols.length; colIndex++) {
                var val = list[i][cols[colIndex]];

                // If there is any key, which is matching
                // with the column name
                if (val == null) val = "";
                row.append($('<td/>').html(val));
            }

            // Adding each row to the table
            $('#staffSearchResults').append(row);
        }
    }

    /**
     * Returns the columns of a table
     * 
     * https://www.geeksforgeeks.org/how-to-convert-json-data-to-a-html-table-using-javascript-jquery/
     * @param {*} list 
     * @param {*} selector 
     * @returns 
     */
    headers(list, selector) {
        var columns = [];
        var header = $('<tr/>');

        for (var i = 0; i < list.length; i++) {
            var row = list[i];

            for (var k in row) {
                if ($.inArray(k, columns) == -1) {
                    columns.push(k);

                    // Creating the header
                    header.append($('<th/>').html(k));
                }
            }
        }
        return columns;
    }
}

class SupplierOrder {

}

// variable holding the form
var staffSearchSubmit = document.getElementById('submitStaffSearch');
// Event listener that listens for submit event
staffSearchSubmit.addEventListener("click", () => {

    // clears the tables contents
    $("#staffSearchResults tr").remove()

    // new staff search object
    const searchStaff = new StaffSearch();
    searchStaff.getFormData();

    // checking inputs are not empty
    if (!searchStaff.allFieldsEmpty()) {

        // querying database
        resultsArray = searchStaff.searchDatabase();

        // appending table to the DOM
        searchStaff.constructTable(resultsArray);
    }


    // clears the input fields
    var elements = document.getElementById("staffSearchForm");
    for (var ii = 0; ii < elements.length; ii++) {
        if (elements[ii].type == "text" || elements[ii].type == "date") {
            elements[ii].value = "";
        }
    }


})