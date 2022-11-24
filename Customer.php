<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Customer View</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- our style sheet -->
    <link rel="stylesheet" href="style.css">

    <!-- bootstrap -->
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/84a612beee.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- main container -->
    <div class="container">

        <!-- logo and cart images -->
        <img id="cart" src="cart.png" class="rounded float-rigth" alt="cart">
        <img class="logo" src="logo.png" alt="logo">

        <!-- Welcome message -->
        <div class="row justify-content-left">
            <h2 id="welcomeMessage">Welcome to Run 5-Hundred!</h2>
        </div>

        <!-- Shoe search -->
        <div class="row justify-content-left">
            <h2 class="sectionTitle">Shoe Search</h2>
        </div>

        <!-- user options -->
        <div class="row">

            <!-- brand -->
            <div class="col">
                <select class="form-control form-control-sm">
                    <option>Select Brand</option>
                </select>

            </div>

            <!-- size -->
            <div class="col">
                <select class="form-control form-control-sm">
                    <option>Select size</option>
                </select>
            </div>

            <!-- price range -->
            <div class="col">
                <select class="form-control form-control-sm">
                    <option>Select Price Range</option>
                    <option>£0-£30</option>
                    <option>£30-£50</option>
                    <option>£50-£100</option>
                    <option>£100+</option>
                </select>
            </div>

            <!-- search -->
            <button type="button" class="btn btn-outline-primary btn-sm">Search</button>
        </div>

        <!-- results from search -->
        <div class="row">

            <div class="card-group">

                <div class="card mt-5">

                    <!-- shoe image -->
                    <img class="card-img-top" src="shoePic.jpg" alt="Card image cap">

                    <div class="card-body d-flex flex-column">

                        <!-- shoe name -->
                        <h5 class="card-title">Shoe 1</h5>

                        <!--  sizing -->
                        <select class="form-control form-control-sm mt-2">
                            <option>Selected Size</option>
                        </select>

                        <!-- insole -->
                        <select class="form-control form-control-sm mt-2">
                            <option>Default Insoles</option>
                        </select>

                        <!-- laces -->
                        <select class="form-control form-control-sm mt-2">
                            <option>Default Laces</option>
                        </select>

                        <!-- price -->
                        <h5 class="mt-2">£xxx</h5>

                        <!-- add to basket -->
                        <button type="button" class="btn btn-success mt-2">Add to Basket</button>

                    </div>



                </div>
            </div>

            <!-- bootstrap js links -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>



</html>