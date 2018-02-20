"use strict";

$(document).ready(function() {
    $("#registerForm").on("submit", function() {
        let userName, firstName, lastName, email, password, confirmPassword;
        userName        = $("#userName").val();
        firstName       = $("#firstName").val();
        lastName        = $("#lastName").val();
        email           = $("#email").val();
        password        = $("#password").val();
        confirmPassword = $("#confirmPassword").val();
    
        let regUserName, regFullName, regEmail, regPassword;
        regUserName = /^[A-Za-z0-9_]{3,20}$/;
        regFullName = /^[a-zA-Z]*$/;
        regEmail    = /^([\w-]+(?: \.[\w-]+)*)@((?: [\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?: \.[a-z]{2})?)$/;
        regPassword = /^[A-Za-z0-9!@#$%^&*()_]{6,20}$/;
    
        let counter = 0;
    
        if (checkInputs(userName, $("#userName"), regUserName, $("#errUserName")) === false) {
            counter += 1;
        }
    
        if (checkInputs(firstName, $("#firstName"), regFullName, $("#errFirstName")) === false) {
            counter += 1;
        }
    
        if (checkInputs(lastName, $("#lastName"), regFullName, $("#errLastName")) === false) {
            counter += 1;
        }
    
        if (checkInputs(email, $("#email"), regEmail, $("#errEmail")) === false) {
            counter += 1;
        }
    
        if (checkInputs(password, $("#password"), regPassword, $("#errPassword")) === false) {
            counter += 1;
        }
    
        if (checkInputs(confirmPassword, $("#confirmPassword"), regPassword, $("#errConfirmPassword")) === false) {
            counter += 1;
        }
    
        if (password !== confirmPassword) {
            $("#errPasswordNotSame, #errConfirmPasswordNotSame").show();
            $("#password, #confirmPassword").addClass("is-invalid");
            counter += 1;
        } else {
            $("#errPasswordNotSame, #errConfirmPasswordNotSame").hide();
        }
        
        if (counter !== 0) {
            return false;
        }
    });
});

function checkInputs(value, element, reg, error) {
    if (reg.test(value) === false) {
        error.show();
        element.addClass("is-invalid");
        return false;
    } else {
        error.hide();
        element.removeClass("is-invalid");
        return true;
    }
}
