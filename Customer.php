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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/84a612beee.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">

        <div class="row">
            <img class="logo" src="logo.png" alt="logo">

            <img id="cart" src="cart.png" class="rounded float-rigth" alt="...">

        </div>

        <!--row between new and nav bar-->
        <div class="row justify-content-left m-3">
            <h2 style="font-weight: bold; padding-bottom: 2%;">Welcome to Run 5-Hundred!</h2>
        </div>

        <!--Search bar-->
        <div class="row">
            <!-- <div class="col">
                <select class="form-control form-control-sm">
                    <option>Select Shoe Type</option>
                    <option>Running</option>
                </select>
            </div> -->
            <div class="col">
                <select class="form-control form-control-sm">
                    <option>Select Brand</option>
                    <option>Nike</option>
                </select>

            </div>
            <div class="col">
                <select class="form-control form-control-sm">
                    <option>Select size</option>
                    <option>Test</option>
                </select>
            </div>

            <div class="col">
                <select class="form-control form-control-sm">
                    <option>Select Price Range</option>
                    <option>$0-$99</option>
                </select>
            </div>


            <!-- The search button -->
            <button type="button" class="btn btn-outline-primary btn-sm">Search</button>
        </div>

        <!--row between new and search bar-->
        <div class="row justify-content-center m-3">
        </div>

        <!--Shoes pics-->
        <nav class="nav nav-pills nav-justified">
            <a class="nav-item nav-link active" href="#">Road Shoes</a>
            <a class="nav-item nav-link" href="#">Winter Running</a>
            <a class="nav-item nav-link" href="#">Trail Shoes</a>
            <a class="nav-item nav-link" href="#">New Arrivals</a>
        </nav>

        <!--row between new and search bar-->
        <div class="row justify-content-center m-3">
        </div>

        <!-- Card group -->
        <div class="row">
            <div class="card-group">
                <div class="card m-2">
                    <img class="card-img-top" src="shoePic.jpg" alt="Card image cap">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Shoe 1</h5>
                        <!-- COLOR OPTIONS -->
                        <p>
                            <i class="fa-solid fa-circle text-white"></i>
                            <i class="fa-solid fa-circle"></i>
                            <i class="fa-solid fa-circle text-danger"></i>
                            <i class="fa-solid fa-circle text-primary"></i>
                            <i class="fa-solid fa-circle text-warning"></i>
                        </p>
                        <h6 class="card-title">Avaialble in size 6-16</h6>
                        <p class="card-text">One of our premier shoes. Made with the finest shoe parts.</p>

                        <button type="button" class="btn btn-outline-primary mt-auto">Buy $199</button>


                    </div>
                </div>
                <div class="card m-2">
                    <img class="card-img-top" src="shoePic.jpg" alt="Card image cap">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Shoe 2</h5>
                        <p>
                            <i class="fa-solid fa-circle text-success"></i>
                            <i class="fa-solid fa-circle text-info"></i>
                            <i class="fa-solid fa-circle"></i>
                        </p>
                        <h6 class="card-title">Avaialble in size 4-14</h6>
                        <select class="form-control form-control-sm">
                            <option>Select Insoles</option>
                            <option>Comfy</option>
                        </select>
                        <select class="form-control form-control-sm mt-2">
                            <option>Select Laces</option>
                            <option>Blue</option>
                        </select>
                        <p class="card-text">A customizable shoe, allowing for custom insoles and laces</p>
                        <button type="button" class="btn btn-outline-primary mt-auto">Buy $129</button>

                    </div>
                </div>
                <div class="card m-2">
                    <img class="card-img-top" src="shoePic.jpg" alt="Card image cap">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">Shoe 3</h5>
                        <p>
                            <i class="fa-solid fa-circle"></i>
                            <i class="fa-solid fa-circle text-secondary"></i>
                        </p>
                        <h6 class="card-title">Avaialble in size 4-13</h6>
                        <p class="card-text">One of our premier shoes. Made with the finest shoe parts.</p>

                        <button type="button" class="btn btn-outline-primary mt-auto">Buy $189</button>

                    </div>
                </div>
            </div>

            <!--Empty row for visual tidiness-->
            <div class="row justify-content-center m-3">
            </div>

            <!--Second Card group -->
            <div class="row">
                <div class="card-group">
                    <div class="card m-2">
                        <img class="card-img-top" src="shoePic.jpg" alt="Card image cap">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Shoe 1</h5>
                            <!-- COLOR OPTIONS -->
                            <p>
                                <i class="fa-solid fa-circle text-white"></i>
                                <i class="fa-solid fa-circle"></i>
                                <i class="fa-solid fa-circle text-danger"></i>
                                <i class="fa-solid fa-circle text-primary"></i>
                                <i class="fa-solid fa-circle text-warning"></i>
                            </p>
                            <h6 class="card-title">Avaialble in size 6-16</h6>
                            <p class="card-text">One of our premier shoes. Made with the finest shoe parts.</p>

                            <button type="button" class="btn btn-outline-primary mt-auto">Buy $199</button>

                        </div>
                    </div>
                    <div class="card m-2">
                        <img class="card-img-top" src="shoePic.jpg" alt="Card image cap">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Shoe 2</h5>
                            <p>
                                <i class="fa-solid fa-circle text-success"></i>
                                <i class="fa-solid fa-circle text-info"></i>
                                <i class="fa-solid fa-circle"></i>
                            </p>
                            <h6 class="card-title">Avaialble in size 4-14</h6>
                            <p class="card-text">One of our premier shoes. Made with the finest shoe parts.</p>

                            <button type="button" class="btn btn-outline-primary mt-auto">Buy $199</button>

                        </div>
                    </div>
                    <div class="card m-2">
                        <img class="card-img-top" src="shoePic.jpg" alt="Card image cap">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">Shoe 3</h5>
                            <p>
                                <i class="fa-solid fa-circle"></i>
                                <i class="fa-solid fa-circle text-secondary"></i>
                            </p>
                            <h6 class="card-title">Avaialble in size 4-13</h6>
                            <p class="card-text">One of our premier shoes. Made with the finest shoe parts.</p>

                            <button type="button" class="btn btn-outline-primary mt-auto">Buy $199</button>

                        </div>
                    </div>
                </div>

            </div>

            <!--End container-->









            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>
</body>



</html>