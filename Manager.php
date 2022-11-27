  <?php include "includes/autoLoader.inc.php"; ?>

  <!DOCTYPE <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Manager Veiw</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- custom stylesheet -->
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap styling -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>

  <body>

    <!-- main container for bootstrap-->
    <div class="container">

      <!-- top logo -->
      <img class="logo" src="resources/logo.png">

      <!-- manager currently logged in -->
      <div class="row justify-content-left m-3">
        <h5 id="staffName">Manager: Inject code here</h5>
      </div>

      <!-- Staff search Title -->
      <div class="row justify-content-left">
        <h2 class="sectionTitle"> Staff Search</h2>
      </div>




      <form action="includes/staffSearch.inc.php" method="post">
        <!-- input values for the search -->
        <div id="staffSearch" class="row">

          <!-- ID -->
          <div class="col">
            <input type="text" class="form-control" name="staffID" placeholder="ID">
          </div>

          <!-- first name -->
          <div class="col">
            <input type="text" class="form-control" name="staffFirstName" placeholder="First Name">
          </div>

          <!-- last name -->
          <div class="col">
            <input type="text" class="form-control" name="staffLastName" placeholder="Last Name">
          </div>

          <!-- Email -->
          <div class="col">
            <input type="text" class="form-control" name="staffEmail" placeholder="Email">
          </div>

          <!-- Phone no-->
          <div class="col">
            <input type="text" class="form-control" name="stafPhoneNum" placeholder="Phone Num">
          </div>

          <!-- DOB -->
          <div class="col">
            <input type="date" class="form-control" name="staffDob" placeholder="Date of Birth">
          </div>

          <!-- ADD FUNCTIONALITY TO THE BUTTON TO INITIATE THE SEARCH -->
          <button type="submit" name="search" class="btn btn-outline-primary btn-sm">Search</button>

        </div>

      </form>




      <!-- The table that displays the result of a staff search -->
      <div class="row">
        <div class="col">

          <!--table with filter-->
          <table id="staffSearchTable" class="table">

            <!-- head of the table -->
            <thead>
              <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Phone</th>
              </tr>
            </thead>

            <!-- body where the results of the search will be appended -->
            <tbody id="staffSearchResults">
              <tr>
                <td>Inject code here</td>
                <td>Inject code here</td>
                <td>Inject code here</td>
                <td>Inject code here</td>
              </tr>
            </tbody>

          </table>

        </div>
      </div>

      <!-- supplier order title -->
      <div class="row justify-content-left">
        <h2 class="sectionTitle">Supplier Order</h2>
      </div>

      <!-- input values for the order items -->
      <div class="row">

        <!-- Drop down menu with all the stock -->
        <div class="col">
          <select class="form-control form-control-sm">
            <option>inject stock items here</option>
          </select>
        </div>

        <!-- Item number -->
        <div class="col">
          <input type="text" class="form-control" placeholder="Item Number" aria-label="Item Number">
        </div>

        <!-- Quantity -->
        <div class="col">
          <input type="text" class="form-control" placeholder="Item Quantity" aria-label="Enter Quantity">
        </div>
      </div>

      <!-- Add to order button -->
      <div class="row justify-content-center">
        <button type="button" class="btn btn-outline-success btn-lg m-3">Add To Order</button>
      </div>

      <!-- The table that displays the result of a staff search -->
      <div class="row">
        <div class="col">

          <!--table with filter-->
          <table id="staffSearchTable" class="table">

            <!-- head of the table -->
            <thead>
              <tr>
                <th>Item Name</th>
                <th>Item ID</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total Price</th>
                <th></th>
              </tr>
            </thead>

            <!-- body where the results of the search will be appended -->
            <tbody id="orderTable">
              <tr class="orderRow">
                <td>Inject code here</td>
                <td>Inject code here</td>
                <td>Inject code here</td>
                <td>Inject code here</td>
                <td>Inject code here</td>
                <td><button type="button" class="btn btn-danger">Remove</button>
                </td>
              </tr>
            </tbody>

          </table>

        </div>
      </div>


      <!-- supplier order title -->
      <div class="row justify-content-left">
        <h2 class="sectionTitle">Stock Search</h2>
      </div>

      <!--Search bar-->
      <div class="row">

        <!-- stock ID -->
        <div class="col">
          <input type="text" class="form-control" placeholder="Item Number" aria-label="Item Number">
        </div>

        <!-- Brand -->
        <div class="col">
          <select class="form-control form-control-sm">
            <option>Select Brand</option>
            <option>Nike</option>
          </select>

          <!-- Size -->
        </div>
        <div class="col">
          <select class="form-control form-control-sm">
            <option>Select size</option>
            <option>Test</option>
          </select>
        </div>

        <!-- Price range -->
        <div class="col">
          <select class="form-control form-control-sm">
            <option>Select Price Range</option>
            <option>$0-$99</option>
          </select>
        </div>


        <!-- The search button -->
        <button type="button" class="btn btn-outline-primary btn-sm">Search</button>

      </div>

      <div style="padding-top: 2%; padding-bottom:5%;" class="row">

        <div style="padding-left: 6%;" class="col">
          <img style="height: 90%;" src="resources/shoePic.jpg" style="max-width:70%; ">

        </div>


        <div style="padding-top: 6%" class="col">

          <h6>Stock:</h6>
          <!--Table with the stocks-->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Branch</th>
                <th scope="col">Stock</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Glasgow</th>
                <td>27</td>
              </tr>

              <th scope="row">Edinburgh</th>
              <td>49</td>
              </tr>
              <tr>
                <th scope="row">Dundee</th>
                <td>2</td>
              </tr>
          </table>

          <h6>Item num: Asc2556</h6>
          <h6>Supplier: ASICS EdinSup</h6>
          <h6>Last Order: 27/04/2021</h6>
        </div>

      </div>
      <!--End container-->


      <!-- bootstrap scrpits -->
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



  </body>

  </html>