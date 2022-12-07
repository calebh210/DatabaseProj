
class customerSearch {

    constructor() {
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
            var i = 0;
            data.forEach(function (card) {
                
                //var getSize = new sizeSearch();

                // getSize.getData(card.brand,card.Name);
                // var test = getSize.searchDatabase();
                // var sizes = getSize.sizeReturn;

                $('#card-container').append(cardTemplate.replace("{title}", 
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


var stockSearchSubmit = document.getElementById('submitStockSearch');

//array of results from query
var resultsArray = []

stockSearchSubmit.addEventListener("click", () => {

    $("#stockSearchResults tr").remove()

    const searchStock = new customerSearch();
    searchStock.getFormData();

    if (!searchStock.allFieldsEmpty()) {

        resultsArray = searchStock.searchDatabase();

        // buildcards(resultsArray);
        

    }


})


//Order button functionality

const cart = []

function addToCart(id, val) { 
    
    item = document.getElementById(id);
    cart.push(val);
    const icon = document.getElementById('cart')
    icon.setAttribute("value", cart.length)
    console.log(cart)

}

//View cart functionality

function checkout(){
    //console.log(cart.length);
    if(cart.length==0){

        alert("Your cart is empty");

    }else if(cart.length > 0){
        var checkoutTemplate = $("#checkoutTemplate").html();

        for(let i=0; i<resultsArray.length; i++){
           if(resultsArray[i].item_id == (cart[0])){
            console.log(cart[0])
            console.log("id:"+ resultsArray[i].item_id)
            $('#modal-container').append(checkoutTemplate.replace("{title}", 
            resultsArray[i].brand).replace("{price}", resultsArray[i].price).replace("{itemID}", 
            resultsArray[i].item_id).replace("{name}",resultsArray[i].Name)
            .replace("{size}",resultsArray[i].size));
           }
            
        }
        $('#checkout').modal('show');
    }
    
}

