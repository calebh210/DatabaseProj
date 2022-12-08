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
      <h5 id="staffName"></h5>
    </div>

    <!-- Staff search Title -->
    <div class="row justify-content-left">
      <h2 class="sectionTitle"> Staff Search</h2>
    </div>


    <form id="staffSearchForm">

      <!-- input values for the search -->
      <div id="staffSearch" class="row">

        <!-- ID -->
        <div class="col">
          <input type="text" class="form-control" id="staffID" placeholder="ID">
        </div>

        <!-- first name -->
        <div class="col">
          <input type="text" class="form-control" id="staffFirstName" placeholder="First Name">
        </div>

        <!-- last name -->
        <div class="col">
          <input type="text" class="form-control" id="staffLastName" placeholder="Last Name">
        </div>

        <!-- ADD FUNCTIONALITY TO THE BUTTON TO INITIATE THE SEARCH -->
        <button type="button" value="submit" id="submitStaffSearch" class="btn btn-outline-primary btn-sm">Search</button>

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
              <th>ID</th>
              <th>Branch ID</th>
              <th>Position</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>D.O.B</th>
              <th>Salary (£)</th>
              <th>Gender</th>
              <th>Date Joined</th>
              <th>Phone No.</th>
              <th>Email</th>
            </tr>
          </thead>

          <!-- body where the results of the search will be appended -->
          <tbody id="staffSearchResults">
            <!-- code injected here -->
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

      <!-- Drop down menu with all the suppliers -->
      <div class="col">
        <select id="supplier" class="form-control form-control-sm">
          <option value="none" selected disabled hidden>Select a supplier</option>
        </select>
      </div>

      <!-- Drop down menu with all the stock -->
      <div class="col">
        <select id="stockItems" class="form-control form-control-sm">
          <option value="none" selected disabled hidden>Select a stock item</option>
        </select>
      </div>

      <!-- Quantity -->
      <div class="col">
        <input type="number" id="itemQuantity" class="form-control" placeholder="Item Quantity" aria-label="Enter Quantity">
      </div>
    </div>

    <!-- Add to order button -->
    <div class="row justify-content-center">
      <button id="addToOrderBtn" type="button" class="btn btn-outline-success btn-lg m-3">Add To Order</button>
    </div>

    <!-- The table that displays the result of the stock order -->
    <div class="row">
      <div class="col">

        <!--table with filter-->
        <table id="stockOrderTable" class="table">

          <!-- head of the table -->
          <thead>
            <tr>
              <th>Supplier</th>
              <th>Item ID</th>
              <th>Quantity</th>
              <th>Price</th>
            </tr>
          </thead>

          <!-- body where the results of the search will be appended -->
          <tbody id="orderTable">
          </tbody>

        </table>

        <div class="row justify-content-center">
          <button id="removeLastItem" type="button" class="btn btn-outline-danger btn-lg m-3">Remove Last Item</button>

          <button id="placeOrder" type="button" class="btn btn-outline-primary btn-lg m-3">Place Order</button>
        </div>

      </div>
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

    <!-- Staff search Title -->
    <div class="row justify-content-left">
      <h2 class="sectionTitle">Add Staff Member</h2>
    </div>


    <form class="mb-4" id="addStaffForm">

      <!-- input values for the search -->
      <div class="row">

        <!-- role -->
        <div class="col">
          <select id="role" class="form-control form-control">
            <option value="none" selected disabled hidden>Select Role</option>
            <option value="manager">Manager</option>
            <option value="receptionist">Receptionist</option>
            <option value="assembler">Assembler</option>
          </select>
        </div>

        <!-- first name -->
        <div class="col">
          <input type="text" class="form-control" id="firstName" placeholder="First Name">
        </div>

        <!-- Last name -->
        <div class="col">
          <input type="text" class="form-control" id="lastName" placeholder="Last Name">
        </div>

      </div>


      <div class="row mt-3">

        <!-- date of birth -->
        <div class="col">
          <input type="text" class="form-control" id="dateOfBirth" placeholder="D.O.B" onfocus="(this.type='date')">
        </div>

        <!-- Salary -->
        <div class="col">
          <input type="number" class="form-control" id="salary" placeholder="Salary">
        </div>

        <!-- Gender -->
        <div class="col">
          <select id="gender" class="form-control form-control">
            <option value="none" selected disabled hidden>Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">other</option>
          </select>
        </div>

      </div>

      <div class="row mt-3">

        <!-- date joined -->
        <div class="col">
          <input type="text" class="form-control" id="dateJoined" placeholder="Date Joined" onfocus="(this.type='date')">
        </div>

        <!-- phoneNum -->
        <div class="col">
          <input type="number" class="form-control" id="phoneNum" placeholder="Phone Number">
        </div>


        <!-- email -->
        <div class="col">
          <input type="email" class="form-control" id="email" placeholder="email">
        </div>

      </div>


    </form>

    <!-- insert new staff member submit -->
    <div class="row p-4">
      <div class="col-md-6 offset-md-3 text-center">
        <button type="button" value="submit" id="newStaffMember" class="btn btn-outline-primary btn-sm">Add Staff Member</button>
      </div>
    </div>



    <!--End container-->
  </div>
  <!-- Jquery CDN -->
  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

  <!-- js to interact with php -->
  <script type="text/javascript" src="jsScripts/manager.js"></script>

  <!-- bootstrap scrpits
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>



</body>

</html>