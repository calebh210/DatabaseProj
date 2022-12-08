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
            url: "phpScripts/ManagerPage/searchStaff.php",
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

    disciplianries() {
        alert(this.value)
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
        this.currentOrder = []

    }

    getSuppliers() {
        var returned;

        // ajax call to the php 
        $.ajax({
            async: false,
            cache: false,
            url: "phpScripts/ManagerPage/supplierSearch.php",
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
            opt.value = item['supplier_id'];
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
            url: "phpScripts/ManagerPage/stockItemSearch.php",
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
            opt.innerHTML = '(ID:' + item['item_id'] + ') ' + item['Name'];
            dropdownItems.appendChild(opt);
        }

    }

    /**
     * Retrieves user's options from the inputted fields
     */
    retrieveUserOptions() {

        // getting the input values
        var itemId = document.getElementById('stockItems').value;
        var supplier = document.getElementById('supplier').value;
        var quantity = document.getElementById("itemQuantity").value;

        if (itemId != '' && quantity != '' && supplier != '') {
            this.insertSupplierOrder(itemId, supplier, quantity)
        } else {
            alert('Please make sure all fields are filled')
        }
    }

    // inserts new item to the order data structure
    insertSupplierOrder(itemId, supplier, quantity) {

        for (let i = 0; i < this.currentOrder.length; i++) {
            if (this.currentOrder[i][0] == itemId) {
                alert('this item is already in the order')
                return
            }
        }


        // calculating price of the ordered part
        var price = parseFloat(this.stockItems[itemId - 1]['price']) * quantity

        price = price.toFixed(2);

        // adding to array 
        var orderToAdd = [itemId, supplier, quantity, price]

        this.currentOrder.push(orderToAdd)

        // append to temp table
        var table = document.getElementById('orderTable');

        // creating each table item in a new row and adding to table
        var row = document.createElement("tr")
        row.value = itemId
        row.classList = 'orderRow';

        var supplierCell = document.createElement("td")
        supplierCell.append(orderToAdd[1])
        row.append(supplierCell)

        var itemIDCell = document.createElement("td")
        itemIDCell.append(orderToAdd[0])
        row.append(itemIDCell)

        var quantityCell = document.createElement("td")
        quantityCell.append(orderToAdd[2])
        row.append(quantityCell)

        var priceCell = document.createElement("td")
        priceCell.append(orderToAdd[3])

        row.append(priceCell)
        table.append(row);
    }

    removeLastItem() {

        if (this.currentOrder.length == 0) {
            alert('order is empty')
        } else {

            //now remove from table
            var table = document.getElementById('orderTable');
            var rowCount = table.rows.length;

            table.deleteRow(rowCount - 1);

            // remove item from array
            let popped = this.currentOrder.pop();
            alert('Item with ID: ' + popped[0] + ' was removed from order')
        }

    }

    resetSupplierOrder() {

        // reset the array
        this.currentOrder = []

        // reset the table
        var Table = document.getElementById("orderTable");
        Table.innerHTML = "";


    }

    placeOrder() {

        if (this.currentOrder.length == 0) {
            alert('order is empty')
        } else {

            var returned = ''

            // ajax call to the php 
            $.ajax({
                async: false,
                cache: false,
                url: "phpScripts/ManagerPage/placeSupplierOrder.php",
                type: "POST",
                dataType: "json",
                data: {
                    orderToPlace: this.currentOrder,
                },
                success: function (data) {
                    returned = data;
                }
            });

            if (returned == '') {
                alert('order placed')
            } else {
                alert('error placing order')
            }

            // reset everything
            this.resetSupplierOrder()

        }

    }
}




/**
 * Functionality for the supplier order
 */

// variable holding the form
var staffSearchSubmit = document.getElementById('addToOrderBtn');

// Event listener for button click of add to order
staffSearchSubmit.addEventListener("click", () => {

    supplierOrderObj.retrieveUserOptions()

})

// variable holding the form
var removeLastItemObj = document.getElementById('removeLastItem');

// removes the last item from the object and html table
removeLastItemObj.addEventListener("click", () => {

    supplierOrderObj.removeLastItem()
})

// variable holding the form
var submitOrderObj = document.getElementById('placeOrder');

// removes the last item from the object and html table
submitOrderObj.addEventListener("click", () => {

    supplierOrderObj.placeOrder()
})


// as we can only order from one supplier at a time this resets the inputs etc
var supplierDropDownObj = document.getElementById('supplier')
supplierDropDownObj.onchange = function () {

    supplierOrderObj.resetSupplierOrder()

};


class StockSearch {

    constructor() {
        this.brands
        this.stockResult
        this.currentSizes
    }

    /**
    * Gets all stock items from the database
    */
    getAllBrands() {
        var returned;

        // ajax call to the php 
        $.ajax({
            async: false,
            cache: false,
            url: "phpScripts/ManagerPage/brandSearch.php",
            type: "POST",
            dataType: "json",
            success: function (data) {
                returned = data;
            }
        });

        this.brands = returned
    }

    appendAllBrands() {

        var dropdownItems = document.getElementById('brandSelect');

        // loops through all the stock items and appends them to the drop down list
        for (var i = 0; i < this.brands.length; i++) {

            var item = this.brands[i]
            var opt = document.createElement("option");
            opt.value = item['brand'];
            opt.innerHTML = item['brand']
            dropdownItems.appendChild(opt);
        }

    }

    /**
     * creates ajax call to get the sizes avaialable for each brand
     */
    updateSizes() {

        var returned
        var selectedBrand = $("#brandSelect :selected").text(); // The text content of the selected option

        // ajax call to the php 
        $.ajax({
            async: false,
            cache: false,
            url: "phpScripts/ManagerPage/sizeSearchBasedOnBrand.php",
            type: "POST",
            dataType: "json",
            data: {
                managerId: firstName,
                selectedBrand: selectedBrand
            },
            success: function (data) {
                returned = data;
            }
        });

        this.currentSizes = returned

        this.appendNewSizes()
    }

    /**
     * Appends new sizes to the drop down list
     */
    appendNewSizes() {

        // clear the sizes
        $("#shoeSizeSelection").empty();


        var select = document.getElementById('shoeSizeSelection')

        for (var i = 0; i < this.currentSizes.length; i++) {

            // update sizes with new values
            let newOption = new Option(this.currentSizes[i]['size'], this.currentSizes[i]);
            select.add(newOption, undefined)

        }

    }

    // searches the stock based on brand and size
    searchStock() {

        var returned
        var selectedBrand = $("#brandSelect :selected").text();
        var selectedSize = $("#shoeSizeSelection :selected").text();


        // ajax call to the php 
        $.ajax({
            async: false,
            cache: false,
            url: "phpScripts/ManagerPage/stockItemSearchOnBrandAndSize.php",
            type: "POST",
            dataType: "json",
            data: {
                managerId: firstName,
                selectedBrand: selectedBrand,
                selectedSize: selectedSize
            },
            success: function (data) {
                returned = data;
            }
        });

        this.stockResult = returned
        this.appendStock()

    }

    appendStock() {

        $('#stockSearchTableBody').html("");

        var content = '';

        for (var i = 0; i < this.stockResult.length; i++) {

            // update sizes with new values
            content = '<tr><td>'
                + this.stockResult[i]['item_id'] + '</td>' +
                '<td>' + this.stockResult[i]['Name'] + '</td>' +
                '<td>' + '£' + this.stockResult[i]['price'] + '</td>' +
                '<td>' + this.stockResult[i]['item_quantity'] + '</td></tr>\n';

            $('#stockSearchTableBody').append(content);
        }



    }
}

// update the available sizes based on brands
var brandSelectionObj = document.getElementById('brandSelect')
brandSelectionObj.onchange = function () {

    stockSearchObj.updateSizes()

};


// carry out stock search 
var stockSearchBtn = document.getElementById('stockSearchBtn')
stockSearchBtn.addEventListener("click", () => {

    stockSearchObj.searchStock()
})



var supplierOrderObj = new SupplierOrder();
var stockSearchObj = new StockSearch();


/**
 * Everything that happens when the page loads
 */
window.addEventListener('load', function () {

    // adds the staff name to the dom
    $(staffTag).text("Manager ID: ".concat(firstName))

    // this functionality is for the supplier order 
    supplierOrderObj.getSuppliers()
    supplierOrderObj.appendSuppliers()
    supplierOrderObj.getAllStockItems()
    supplierOrderObj.appendStockItems()

    // functionality to load in the brands in the stock search
    stockSearchObj.getAllBrands()
    stockSearchObj.appendAllBrands()
})

/**
 * Holds all functionality to 
 */
class AddStaffMember {

    constructor() {
        this.inRole
        this.inFName
        this.inLastName
        this.inDob
        this.inSalary
        this.inGender
        this.inDateJoined
        this.inPhoneNum
        this.email
    }

    getNewStaffDetails() {

        this.inRole = document.getElementById('role').value
        this.inFName = document.getElementById('firstName').value
        this.inLastName = document.getElementById('lastName').value
        this.inDob = document.getElementById('dateOfBirth').value
        this.inSalary = document.getElementById('salary').value
        this.inGender = document.getElementById('gender').value
        this.inDateJoined = document.getElementById('dateJoined').value
        this.inPhoneNum = document.getElementById('phoneNum').value
        this.email = document.getElementById('email').value
    }

    insertNewStaffMember() {

        var returned


        // ajax call to the php 
        $.ajax({
            async: false,
            cache: false,
            url: "phpScripts/ManagerPage/insertNewStaffMember.php",
            type: "POST",
            dataType: "json",
            data: {

                managerId: firstName,
                inRole: this.inRole,
                inFName: this.inFName,
                inLastName: this.inLastName,
                inDob: this.inDob,
                inSalary: this.inSalary,
                inGender: this.inGender,
                inDateJoined: this.inDateJoined,
                inPhoneNum: this.inPhoneNum,
                email: this.email

            },
            success: function (data) {
                returned = data;
            }
        });

        return returned

    }

    // checks if any of the fields are empty
    areFieldsEmpty() {

        if (this.inRole == '' || this.inFName == '' || this.inLastName == '' || this.inDob == '' || this.inSalary == '' || this.inGender == '' || this.inDateJoined == '' || this.inPhoneNum == '' || this.email == '') {
            return true
        } else {
            return false
        }
    }

    clearInputs() {

        document.getElementById('addStaffForm').reset();

    }

}

// object for the add staff member button
var submitNewStaffBtn = document.getElementById('newStaffMember')
var newStaffMembeObj = new AddStaffMember()

submitNewStaffBtn.addEventListener("click", () => {

    newStaffMembeObj.getNewStaffDetails()

    if (newStaffMembeObj.areFieldsEmpty()) {
        alert('Ensure all fields are filled')
    } else {
        returnVal = newStaffMembeObj.insertNewStaffMember()

        if (returnVal == '') {
            // clear inputs
            newStaffMembeObj.clearInputs()
            alert('New staff member added')
        } else {
            alert('Failed to add new staff member')
        }

    }


})