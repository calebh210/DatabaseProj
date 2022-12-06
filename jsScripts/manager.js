// the first name of the logged on manager
staffTag = document.getElementById("staffName");
firstName = window.location.search.split('?')[1];


/**
 * Provides all the structures and functions to search for staff members
 */
class StaffSearch {

    constructor() {
        this.staffID;
        this.staffFirstName;
        this.staffLastName;
        this.searchResult
    }

    /**
     * Stores the form data in object fields
     */
    getFormData() {
        this.staffID = document.getElementById('staffID').value;
        this.staffFirstName = document.getElementById('staffFirstName').value;
        this.staffLastName = document.getElementById('staffLastName').value;
    }


    /**
     * Checks if all fields are empty
     * @returns true if all fields are empty
     */
    allFieldsEmpty() {

        // checks all fields to check if they are null
        if (this.staffID == null && this.staffFirstName == null == null && this.staffLastName == null) {

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



/**
 * Staff search functionality
 */

// variable holding the form
var staffSearchSubmit = document.getElementById('submitStaffSearch');

// Event listener that listens for staff search
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


/**
 * Class holding all the functionality to place an order to the supplier
 */
class SupplierOrder {

    constructor() {

        this.staffFirstName = firstName;
        this.stockItems
        this.suppliers

    }

    getSuppliers() {
        var returned;

        // ajax call to the php 
        $.ajax({
            async: false,
            cache: false,
            url: "phpScripts/supplierSearch.php",
            type: "POST",
            dataType: "json",
            success: function (data) {
                returned = data;
            }
        });

        this.suppliers = returned
    }
    appendSuppliers() {

        var dropdownItems = document.getElementById('supplier');

        // loops through all the stock items and appends them to the drop down list
        for (var i = 0; i < this.suppliers.length; i++) {

            var item = this.suppliers[i]
            var opt = document.createElement("option");
            opt.value = item['item_id'];
            opt.innerHTML = '(Id ' + item['supplier_id'] + '): ' + item['supplier_name']
            dropdownItems.appendChild(opt);
        }

    }

    /**
     * Gets all stock items from the database
     */
    getAllStockItems() {
        var returned;

        // ajax call to the php 
        $.ajax({
            async: false,
            cache: false,
            url: "phpScripts/stockItemSearch.php",
            type: "POST",
            dataType: "json",
            success: function (data) {
                returned = data;
            }
        });

        this.stockItems = returned
    }

    /**
     * Appends all stock items to the drop down selection
     */
    appendStockItems() {

        var dropdownItems = document.getElementById('stockItems');

        // loops through all the stock items and appends them to the drop down list
        for (var i = 0; i < this.stockItems.length; i++) {

            var item = this.stockItems[i]
            var opt = document.createElement("option");
            opt.value = item['item_id'];
            opt.innerHTML = item['Name']
            opt.innerHTML = item['item_id'];
            dropdownItems.appendChild(opt);
        }

    }

    retrieveUserOptions() {

        // getting the input values
        var itemId = document.getElementById('stockItems').value;
        var quantity = document.getElementById("itemQuantity").value;

        if (itemId != '' && quantity != '') {
            this.insertSupplierOrder()
        } else {
            alert('please select valid options')
        }


    }
}

var supplierOrderObj = new SupplierOrder();


/**
 * Everything that happens when the page loads
 */
window.addEventListener('load', function () {

    // adds the staff name to the dom
    $(staffTag).text("Manager: ".concat(firstName))

    // retrieves all stock items from the database
    supplierOrderObj.getSuppliers()
    supplierOrderObj.appendSuppliers()
    supplierOrderObj.getAllStockItems()
    supplierOrderObj.appendStockItems()
})

/**
 * Functionality for the supplier order
 */

// variable holding the form
var staffSearchSubmit = document.getElementById('addToOrderBtn');

// Event listener for button click of add to order
staffSearchSubmit.addEventListener("click", () => {

    userOption = supplierOrderObj.retrieveUserOptions()


})