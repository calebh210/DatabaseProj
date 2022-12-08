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

  <div class="pos-f-t">
    <div class="collapse" id="navbarToggleExternalContent">
      <div class="bg-dark p-4">
        <h4 class="text-white">Collapsed content</h4>
        <span class="text-muted">Toggleable via the navbar brand.</span>
      </div>
    </div>
    <nav class="navbar navbar-dark bg-dark">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
  </div>



  <!-- main container for bootstrap-->
  <div class=" container">

    <!-- top logo -->
    <img class="logo" src="resources/logo.png">

    <!-- Staff member currently logged in -->
    <div class="row justify-content-left m-3">
      <h5 id="staffName"></h5>
    </div>



    <!--stock search title -->
    <div class="row justify-content-left">
      <h2 class="sectionTitle">Stock Search</h2>
    </div>

    <!--Search bar-->
    <div class="row">

      <!-- Brand -->
      <div class="col">
        <select id="brandSelect" class="form-control form-control-sm">
          <option value="none" selected disabled hidden>Select brand</option>
        </select>

        <!-- Size -->
      </div>
      <div class="col">
        <select id="shoeSizeSelection" class="form-control form-control-sm">
          <option>Select size</option>
        </select>
      </div>


      <!-- The search button -->
      <button id="stockSearchBtn" type="button" class="btn btn-outline-primary btn-sm">Search</button>

    </div>

    <div style="padding-top: 2%; padding-bottom:5%;" class="row">


      <div style="padding-top: 2%" class="col">
        <!--Table with the stocks-->
        <table class="table">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Name</th>
              <th scope="col">Price</th>
              <th scope="col">Quantity</th>
            </tr>
          </thead>
          <tbody id="stockSearchTableBody">


          </tbody>
        </table>

      </div>

    </div>


    <!-- Order Title -->
    <div class="row justify-content-left">
      <h2 class="sectionTitle">Unresolved Orders</h2>
    </div>

    <!-- Order's Table -->
    <div class="row">
      <div class="col">

        <table class="table">

          <!-- Table Header -->
          <thead>
            <tr>
              <th scope="col">Order ID</th>
              <th scope="col">Shoe</th>
              <th scope="col">Insole ID</th>
              <th scope="col">Laces ID</th>

            </tr>
          </thead>

          <!-- Order Table-->
          <tbody id="openOrdersTableBody">

          </tbody>

        </table>

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