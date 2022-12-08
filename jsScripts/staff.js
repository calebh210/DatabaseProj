// the first name of the logged on manager
staffTag = document.getElementById("staffName");
StaffID = window.location.search.split('?')[1];

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
                managerId: StaffID,
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
                managerId: StaffID,
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

var stockSearchObj = new StockSearch();

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



class CustomerOrder {

    constructor(staffID) {
        this.staffID = staffID
        this.currentOpenOrders
    }

    searchForOpenOrders() {

        var returned

        // ajax call to the php 
        $.ajax({
            async: false,
            cache: false,
            url: "phpScripts/StaffPage/allOpenOrdersByStaff.php",
            type: "POST",
            dataType: "json",
            data: {
                staffId: this.staffID
            },
            success: function (data) {
                returned = data;
            }
        });

        this.currentOpenOrders = returned
        this.appendOrders()

    }

    appendOrders() {

        var content = '';

        for (var i = 0; i < this.currentOpenOrders.length - (this.currentOpenOrders.length % 3); i += 3) {

            var orderId = this.currentOpenOrders[i]['order_id']
            var insoleId = this.currentOpenOrders[i]['item_id']
            var ShoeId = this.currentOpenOrders[i + 2]['item_id']
            var shoeName = this.currentOpenOrders[i + 2]['Name']
            var laceId = this.currentOpenOrders[i + 1]['item_id']


            // update sizes with new values
            content = '<tr>' +
                '<td>' + orderId + '</td > ' +
                '<td>' + '(ID: ' + ShoeId + ') ' + shoeName + '</td > ' +
                '<td>' + insoleId + '</td > ' +
                '<td>' + laceId + '</td > ' +
                '<td>' + "<button onclick='resolveOrder(this)' value='" + orderId + "' type='button' class='btn btn-success'> Resolve</button >" + "</td >" +
                "</tr >\n";


            $('#openOrdersTableBody').append(content);
        }

    }

    resolveOrder(orderVal) {

        var returned

        // ajax call to the php 
        $.ajax({
            async: false,
            cache: false,
            url: "phpScripts/StaffPage/resolveOrder.php",
            type: "POST",
            dataType: "json",
            data: {
                orderId: orderVal,
                staffId: this.staffID
            },
            success: function (data) {
                returned = data;
            }
        });

        return returned

    }

}

// create new customer order obj
var customerOrderObj = new CustomerOrder(StaffID);

window.addEventListener('load', function () {

    // adds the staff name to the dom
    $(staffTag).text("Staff ID: ".concat(StaffID))

    // displaying open 
    customerOrderObj.searchForOpenOrders()

    // functionality to load in the brands in the stock search
    stockSearchObj.getAllBrands()
    stockSearchObj.appendAllBrands()

})

// update the available sizes based on brands
var brandSelectionObj = document.getElementById('brandSelect')
brandSelectionObj.onchange = function () {

    stockSearchObj.updateSizes()

};

function resolveOrder(objButton) {
    var orderVal = objButton.value;

    var resultVal = customerOrderObj.resolveOrder(orderVal)

    if (resultVal == '') {
        $("#openOrdersTableBody tr").remove();
        customerOrderObj.searchForOpenOrders()
        alert('order resolved')
    } else {
        alert('order could not be resolved')
    }
}