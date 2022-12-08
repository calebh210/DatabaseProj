<!DOCTYPE <!DOCTYPE html>
<html>

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Staff View</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- custom stylesheet -->
  <link rel="stylesheet" href="style.css">

  <!-- Bootstrap styling -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Font Awesome styling -->
  <script src="https://kit.fontawesome.com/84a612beee.js" crossorigin="anonymous"></script>

</head>

<body>

  <!-- main container for bootstrap-->
  <div class="container">

    <!-- top logo -->
    <img class="logo" src="resources/logo.png">

    <!-- Staff member currently logged in -->
    <div class="row justify-content-left m-3">
      <h5 id="staffName">Staff: Inject code here</h5>
    </div>

    <!-- Order Title -->
    <div class="row justify-content-left">
      <h2 class="sectionTitle"> Open Orders</h2>
    </div>

    <!-- Order's Table -->
    <div class="row">
      <div class="col">

        <table class="table">

          <!-- Table Header -->
          <thead>
            <tr>
              <th scope="col">Order No.</th>
              <th scope="col">Shoe</th>
              <th scope="col">Insole</th>
              <th scope="col">Laces</th>
              <th scope="col">Order ID</th>
              <th scope="col">Action</th>
            </tr>
          </thead>

          <!-- Order Table-->
          <tbody>

            <!-- EXAMPLE CODE FOR TABLE ROW -->
            <!-- ideally  this whole TR would be injected into the table -->
            <tr>
              <td>Inject code here</td>
              <td>Inject code here</td>
              <td>Inject code here</td>
              <td>Inject code here</td>
              <td>Inject code here</td>
              <td>
                <!-- add functionallity to this button -->
                <button type="button" class="btn btn-outline-success btn-sm">Resolve</button>
              </td>
            </tr>

          </tbody>

        </table>

      </div>
    </div>


    <!-- Shoe search title -->
    <div class="row justify-content-left">
      <h2 class="sectionTitle">Stock Item Search</h2>
    </div>

    <!-- Search Terms -->
    <div class="row">

      <!-- Type -->
      <div class="col">

        <select class="form-control form-control-lg m-2" aria-label="Test">
          <!-- Inject Option Here -->
        </select>

      </div>

      <!-- Brand -->
      <div class="col">

        <select class="form-control form-control-lg m-2" aria-label="Test">
          <!-- Inject Option Here -->
        </select>

      </div>


      <!-- Size -->
      <div class="col">

        <select class="form-control form-control-lg m-2" aria-label="Test">
          <!-- Inject Option Here -->
        </select>

      </div>

      <!-- Size -->
      <div class="col">

        <select class="form-control form-control-lg m-2" aria-label="Test">
          <!-- Inject Option Here -->
        </select>

      </div>

      <!-- search on item_ID alone -->
      <div class="col">
        <input class="form-control form-control-lg m-2" placeholder="Item ID">
      </div>

      <!-- ADD ACTION TO THIS BUTTON -->
      <!-- search can commense as long as one of the fields contains data -->
      <!-- The search button -->
      <button type="button" class="btn btn-info">Search</button>
    </div>

    <!-- Returned Results From Search -->
    <div id="returnedShoes">
      <div class="row">

        <div class="col">

          <!-- THIS WONT EXIST IN HTML, WE WILL INJECT THIS IS USING JS FRAMEWORK -->
          <div class="card shoeResult">

            <!-- Image of stock Item -->
            <img class="card-img-top" src="shoePic.jpg" alt="Card image cap">

            <div class="card-body d-flex flex-column">

              <!-- Shoe Name and ID -->
              <h5 class="card-title">Shoe 1</h5>
              <h6 class="card-title">ID:2341</h6>


              <!-- Colour options -->
              <p>
                <i class="fa-solid fa-circle text-white"></i>
                <i class="fa-solid fa-circle"></i>
                <i class="fa-solid fa-circle text-danger"></i>
                <i class="fa-solid fa-circle text-primary"></i>
                <i class="fa-solid fa-circle text-warning"></i>
              </p>

              <!-- size selection -->
              <select class="form-control form-control-lg m-2" aria-label="Test">
                <!-- Inject Option Here -->
              </select>

              <!-- Description -->
              <p>How many left in stock</p>
              <p class="card-text"><small class="text-muted">Price</small></p>
              <button type="button" class="btn btn-info mt-auto">More Details</button>

            </div>
          </div>

        </div>
      </div>


    </div>

    <!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <!-- js to interact with php -->
    <script type="text/javascript" src="jsScripts/staff.js"></script>

    <!-- bootstrap scrpits
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>