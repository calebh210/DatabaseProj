class checkoutSearch {

    

    constructor() {
        this.item_id;
    }

    getData(item_id){
       this.item_id = item_id;
      
    }

searchDatabase(){
    
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
//when the page is loaded, run
$(document).ready(function() {    
    var resultsArray = [];

    //get the parameters from URL
    param = document.location.href.split('?=').pop()
    console.log(param);

    //split params into array
    item = param.split("&");
   
    for(i=0; i<item.length;i++){
    
    const searchedItems = new checkoutSearch();
    searchedItems.getData(item[i]);
    resultsArray = searchedItems.searchDatabase();
    console.log(resultsArray);
    // document.getElementById("item").innerHTML = resultsArray[0].Name;
    fillBasket(resultsArray);

    }
    total = document.getElementById('total');
    total.innerText = "£" + grandTotal;


});

//Fills the basket with previously selected shoes on page load
function fillBasket(resultsArray){
    select = document.getElementById('basket');
    prices = document.getElementById('basketPrices');
    for (var i = 0; i<resultsArray.length; i++){
        var p = document.createElement('p');
        var span = document.createElement('p');
        //opt.value = i;
        //span.className = "float-right"
        p.innerHTML = resultsArray[i].Name;
        span.innerHTML = resultsArray[i].price;
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