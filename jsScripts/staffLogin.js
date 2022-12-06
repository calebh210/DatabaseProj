/**
 * Provides all the structures and functions to search for staff members
 */
class staffLogin {

    constructor() {
        this.userName;
        this.enteredPass;
        this.passsword;
        this.role;
    }

    /**
     * Stores the form data in object fields
     */
    getFormData() {
        this.userName = document.getElementById('userName').value;
        this.enteredPass = document.getElementById('password').value;
    }


    /**
     * Uses jQuery's ajax to interact with php, searching the database for staff search conditions
     */
    searchDatabase() {

        var returned;

        // ajax call to the php 
        $.ajax({
            async: false,
            cache: false,
            url: "phpScripts/staffLogin.php",
            type: "POST",
            dataType: "json",
            data: {
                staffID: this.userName
            },
            success: function (data) {
                returned = data;
            }
        });

        return returned
    }

    verifyCredentials(credentials) {

        if (this.userName == credentials['staff_id'] && this.passsword == this.enteredPass) {
            return true
        } else {
            return false
        }

    }
}



// variable the login button
var loginSubmit = document.getElementById('login');

// Event listener that listens for submit event
loginSubmit.addEventListener("click", () => {

    // clears error message
    $("#errorMessage p").remove()

    // new staff search object
    const login = new staffLogin();
    login.getFormData();
    errorDiv = $("#errorMessage");
    paragraph = document.createElement("p");

    // checking inputs are not empty
    if (login.userName != null && login.enteredPass != null) {

        staffData = login.searchDatabase();

        if (staffData != "") {

            // not secure, i know...
            login.passsword = staffData[0]['first_name'].concat(staffData[0]['staff_id']);
            login.role = staffData[0]['role']
            auth = login.verifyCredentials(staffData[0])

            if (auth && login.role == 'manager')
                window.location.href = "./manager.php?".concat(staffData[0]['first_name']);

            else if (auth) {
                window.location.href = "./staff.php?".concat(staffData[0]['first_name']);
            }

        } else {

            paragraph.textContent = "invalid username or password";
            paragraph.style.cssText += 'color:red;'
            errorDiv.append(paragraph);

        }
    }


    // clears the input fields
    var elements = document.getElementById("loginForm");
    for (var ii = 0; ii < elements.length; ii++) {
        if (elements[ii].type == "text" || elements[ii].type == "password") {
            elements[ii].value = "";
        }
    }

})