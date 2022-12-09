
//TODO - FIX AND/OR QUERY ISSUE - ASK DAVID
//MAKE 3 IN A ROW ON DISPLAY

class customerSearch {

    constructor() {
        this.branch;
        this.brand;
        this.priceRangeMin;
        this.priceRangeMax;
        this.size;

    }

    getFormData() {
        this.brand = document.getElementById('brand').value;
        const tempArray = document.getElementById('priceRange').value.split("-");
        this.priceRangeMin = tempArray[0];
        this.priceRangeMax = tempArray[1]
        this.size = document.getElementById('size').value;

    }

    allFieldsEmpty() {

        // checks all fields to check if they are null
        if (this.brand == null && this.priceRangeMin == null && this.priceRangeMax == null && this.size == null) {

            return true;
        }
        else {
            return false;
        }

    }


//searching the database for the initial call    
searchDatabase() {

    var returned;

    // ajax call to the php 
    $.ajax({
        async: false,
        cache: false,
        url: "phpScripts/searchStock.php",
        type: "POST",
        dataType: "json",
        data: {

            brand: this.brand,
            priceRangeMin: this.priceRangeMin,
            priceRangeMax: this.priceRangeMax,
            size: this.size
        },
        success: function (data) {
            returned = data;
            //$("#test").text(data[0].brand);
            
            //Code adapted from https://stackoverflow.com/questions/60459321/load-list-objects-in-ajax-response-and-create-dynmic-list-divs-with-this-data
            var cardTemplate = $("#cardTemplate").html();
            // var rowTemplate = $("#rowTemplate").html();
            var currContainer;
            var i = 0;
            var location = 1
            data.forEach(function (card) {
                
            
                //var getSize = new sizeSearch();

                // getSize.getData(card.brand,card.Name);
                // var test = getSize.searchDatabase();
                // var sizes = getSize.sizeReturn;
                if(location==1){
                    currContainer = $('#card-container1')
                    location++
                }else if(location==2){
                    currContainer = $('#card-container2')
                    location++
                }else if(location==3){
                    currContainer = $('#card-container3')
                    location = 1;
                }

                currContainer.append(cardTemplate.replace("{title}", 
                card.brand).replace("{price}", card.price).replace("{itemID}", 
                card.item_id).replace("{siteID}", i).replace("{name}",card.Name)
                .replace("{size}",card.size));
               
               
                i++;
            
            })
        }

    });

    return returned
}


}

class sizeSearch {

    

    constructor() {
        this.brand
        this.name
        this.sizeReturn
    }

    getData(brandVal, nameVal){
        this.brand = brandVal;
        this.name = nameVal;
    }

    searchDatabase(){
    
    var returned

    // ajax call to the php 
    $.ajax({
        async: false,
        cache: false,
        url: "phpScripts/searchSize.php",
        type: "POST",
        dataType: "json",
        data: {
            brand: this.brand,
            name: this.name
        },
        success: function (data) {
            returned = data;
            this.sizeReturn = data
           
           
        }
    });

    return returned

    }

}

//for filling out the brands
function fillBrands(){
    var returned;
    brandContainer = document.getElementById('brand');
    $.ajax({
        async: false,
        cache: false,
        url: "phpScripts/getBrands.php",
        type: "POST",
        dataType: "json",
        success: function (data) {
            returned = data;
            data.forEach(function (brand){
                var opt = document.createElement('option');   
                opt.value = brand.brand;
                opt.innerHTML = brand.brand;
                brandContainer.appendChild(opt);

            })
           
        
        }
    });
}
fillBrands();



//Fill out size select menu
select = document.getElementById('size');

for (var i = 4; i<=12; i++){
    var opt = document.createElement('option');
    opt.value = i;
    opt.innerHTML = i;
    select.appendChild(opt);
}



var stockSearchSubmit = document.getElementById('submitStockSearch');

//array of results from query
var resultsArray = []

stockSearchSubmit.addEventListener("click", () => {

    //$("#stockSearchResults div").remove()
    //remove elements when a new search is ran so that the page cannot be flooded
    //check if results array is null
    if(resultsArray.length != 0){
        for (i=0;i<resultsArray.length;i++){
            ele = document.getElementById(i);
            ele.remove();
        }
    }

    const searchStock = new customerSearch();
    searchStock.getFormData();

    if (!searchStock.allFieldsEmpty()) {

        resultsArray = searchStock.searchDatabase();

        // buildcards(resultsArray);
        

    }


})


//update the cart icon
function updateIcon(){
    const icon = document.getElementById('cart')
    icon.setAttribute("value", cartItems)
    console.log(cartItems)
}


//Order button functionality

//track num of items in cart
cartItems = 0
//track totalCost
totalCost = 0.0
//array of itemID in cart
const cart = []

function addToCart(val) { 
    
    //item = document.getElementById(id);
    // cart.push(val);
    cartItems++;
    updateIcon();
    //drawing checkout item into modal
    var checkoutTemplate = $("#checkoutTemplate").html();

    for(let i =0; i<resultsArray.length;i++){
  
        if(resultsArray[i].item_id == val){
            // console.log(cart[0])
            // console.log("id:"+ resultsArray[i].item_id)
            $('#modal-container').append(checkoutTemplate
            .replace("{title}",resultsArray[i].brand)
            .replace("{price}", resultsArray[i].price)
            .replace("{name}",resultsArray[i].Name)
            .replace("{size}",resultsArray[i].size)
            .replace("{itemID}",val)
            .replace("{siteID}",i)
            .replace("{checkoutID}","c"+ val)
            //.replace("{checkoutID}",k)
            );
            cart.push(resultsArray[i].item_id);
            totalCost += +(resultsArray[i].price);
            console.log("c"+val)
            
            //k++;
   }
    
} 

}

//function for removing items from cart
//@params val = itemID, index = siteID, to get index in resultsArray
function removeFromCart(val,index){
    var id = "c" + val
    console.log(id)
    itemToRemove = document.getElementById(id);
    itemToRemove.remove();
    cartItems--;
    updateIcon();
    //update the total price after item removal
    totalCost -= resultsArray[index].price;
    total = document.getElementById('total');
    total.innerText = "Total = £" + totalCost;

    //Close modal menu if length is now 0
    if(cartItems==0){
        $('#checkout').modal('hide');
    }

    //remove item from cart array
    rem = cart.indexOf(val)
    cart.splice(rem,1);
    console.log(cart);
}

//View cart functionality
//TODO: Doesnt remove on backout
function showCheckout(){
    
    if(cartItems == 0){

        alert("Your cart is empty");

    }else if(cartItems > 0){

        total = document.getElementById('total');
        total.innerText = "Total = £" + totalCost;
        $('#checkout').modal('show');

    }
    
}

function confirmCheckout(){
    var q = cart[0]
    searchString = "checkout.html?="+q;
    for(i=1;i<cart.length;i++){
        searchString = searchString.concat("&" + cart[i]);
        console.log(searchString);
    }
    window.open(searchString);
}

