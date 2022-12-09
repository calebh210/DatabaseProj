class checkoutSearch {



    constructor() {
        this.item_id;
    }

    getData(item_id) {
        this.item_id = item_id;

    }

    searchDatabase() {

        var returned;

        // ajax call to the php 
        $.ajax({
            async: false,
            cache: false,
            url: "phpScripts/checkoutSearch.php",
            type: "POST",
            dataType: "json",
            data: {
                item_id: this.item_id,
            },
            success: function (data) {
                returned = data;
            },
            error: function () {
                alert('error');
            }
        });

        return returned;

    }

}


var grandTotal = 0;
var numOfItems = 0;
var checkoutArray;
//when the page is loaded, run
$(document).ready(function () {
    var resultsArray = [];

    //get the parameters from URL
    param = document.location.href.split('?=').pop()
    console.log(param);

    //split params into array
    item = param.split("&");
    numOfItems = item.length;
    for (let i = 0; i < item.length; i++) {

        const searchedItems = new checkoutSearch();
        searchedItems.getData(item[i]);
        resultsArray = searchedItems.searchDatabase();
        //TODO APPEND TO ARRAY DONT OVERWRITE
        checkoutArray = resultsArray;
        console.log(resultsArray);
        // document.getElementById("item").innerHTML = resultsArray[0].Name;
        fillBasket(resultsArray);

    }
    total = document.getElementById('total');
    total.innerText = "£" + grandTotal;
    cartIcon = document.getElementById('itemsInCart');
    cartIcon.innerHTML = item.length;


});

//Fills the basket with previously selected shoes on page load
function fillBasket(resultsArray) {
    select = document.getElementById('basket');
    prices = document.getElementById('basketPrices');
    for (let i = 0; i < resultsArray.length; i++) {
        var p = document.createElement('p');
        var span = document.createElement('p');
        //opt.value = i;
        //span.className = "float-right"
        p.innerHTML = resultsArray[i].Name;
        span.innerHTML = "£" + resultsArray[i].price;
        select.appendChild(p);
        prices.appendChild(span);
        grandTotal += +resultsArray[i].price;
    }
}

var x = document.getElementById("register");
x.style.display = "none";
function showRegister() {
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}


class registerUser {

    constructor() {
        this.first_name;
        this.sur_name;
        this.street_no;
        this.street_name;
        this.postcode;
        this.gender;
        this.email;
    }

    getData() {
        this.first_name = document.getElementById('first_name').value;
        this.sur_name = document.getElementById('sur_name').value;
        this.street_no = document.getElementById('street_no').value;
        this.street_name = document.getElementById('street_name').value;
        this.postcode = document.getElementById('postcode').value;
        this.gender = document.getElementById('gender').value;
        this.email = document.getElementById('inputEmail').value;
    }

    registerUserInDatabase() {

        var returned;

        // ajax call to the php 
        $.ajax({
            async: false,
            cache: false,
            url: "phpScripts/addCustomerAccount.php",
            type: "POST",
            dataType: "json",
            data: {
                first_name: this.first_name,
                sur_name: this.sur_name,
                street_no: this.street_no,
                street_name: this.street_name,
                postcode: this.postcode,
                gender: this.gender,
                email: this.email,
            },
            success: function (data) {
                returned = data;
                alert("Order has been placed");
                window.close();
            },
            error: function () {
                alert('ERROR: Could not create account. Please try again later\n(Order was not placed)');
            }
        });

        return returned;

    }


}

function userRegister() {
    const buttonPressed = new registerUser();
    buttonPressed.getData();
    buttonPressed.registerUserInDatabase();

}

function login() {

    var email = document.getElementById('loginEmail').value;
    var password = document.getElementById('inputPassword').value;
    var customerID = getCustomerID(email);
    var priceToSend = grandTotal
    if (customerID != '' & password == "password") {
        if (priceToSend != 0) {
            submitOrder(customerID, priceToSend);
            for (let i = 0; i <= checkoutArray.length; i++) {
                var idToSend = checkoutArray[i].item_id;
                sendItems(idToSend);
            }
            alert("Order Placed!");
            window.close();
        }


    }


}

function getCustomerID(email) {
    var customerID = "";
    $.ajax({
        async: false,
        cache: false,
        url: "phpScripts/getCustomerID.php",
        type: "POST",
        dataType: "json",
        data: {
            email: email,
        },
        success: function (data) {
            customerID = data[0].customer_id;


        },
        error: function () {
            alert('ERROR: Could not create account. Please try again later\n(Order was not placed)');
        }
    });

    return customerID;
}

function submitOrder(customerID, price) {

    var branch_id;
    var date;

    $.ajax({
        async: false,
        cache: false,
        url: "phpScripts/submitOrder.php",
        type: "POST",
        dataType: "json",
        data: {
            branch_id: 1,
            date: '1999-10-10',
            customerID: customerID,
            price: price,

        },
        success: function (data) {
            alert('worked')


        },
        error: function () {
            alert('ERROR: Could not place order. Please try again later\n(Order was not placed)');

        }
    });
}

function sendItems(idToSend) {

    $.ajax({
        async: false,
        cache: false,
        url: "phpScripts/submitItems.php",
        type: "POST",
        dataType: "json",
        data: {
            item_id: idToSend,
            branch_id: 1,
        },
        success: function (data) {


        },
        error: function () {
            alert('ERROR: Could not place order. Please try again later\n(Order was not placed)');
        }
    });

}