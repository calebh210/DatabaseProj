<!DOCTYPE <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Staff Login</title>
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
        <img class="logo mt-5" src="resources/logo.png" alt="logo">

        <div class="row mt-5">
            <div class="col-md-4 offset-md-4">
                <form id="loginForm">


                    <!-- Username input -->
                    <div class="form-outline mb-4">

                        <label class="form-label">Username</label>
                        <input type="text" id="userName" class="form-control" />

                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">

                        <label class="form-label">Password</label>
                        <input type="password" id="password" class="form-control" />

                    </div>

                    <div id="errorMessage"></div>

                    <!-- Submit button -->
                    <button type="button" id="login" class="btn btn-primary btn-block mb-4">Sign in</button>

                </form>

                <p>DELETE BEFORE SUBMISSION</p>
                <p>manager acc:</p>
                <p>username: 1</p>
                <p>pass: David1</p>
                <br>
                <p>regular acc</p>
                <p>username: 8</p>
                <p>pass: Alice8</p>
            </div>
        </div>




    </div>

    <!-- Jquery CDN -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <!-- js to interact with php -->
    <script type="text/javascript" src="jsScripts/staffLogin.js"></script>

    <!-- bootstrap js links -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>



</html>