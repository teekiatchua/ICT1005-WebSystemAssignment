/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
window.onload = function() {
    attachListeners();
};
function attachListeners() {
    btnSubmit = document.getElementById("btnReservation");
    btnSubmit.addEventListener("click", validateReservationForm);
}

function validateReservationForm() {
    var reservationForm = document.getElementById("reservationForm");
    
    var fnamestyle = document.getElementById("res_First_Name");
    var fnamevalue = fnamestyle.value;
    var fnamevalid = false;

    var lnamestyle = document.getElementById("res_Last_Name");
    var lnamevalue = lnamestyle.value;
    var lnamevalid = false;

    var emailstyle = document.getElementById("resEmail");
    var emailvalue = emailstyle.value;
    var emailvalid = false;

    var cnumberstyle = document.getElementById("res_ContactNumber");
    var cnumbervalue = cnumberstyle.value;
    var cnumbervalid = false;

    var resdatestyle = document.getElementById("resDate");
    var resdatevalue = resdatestyle.value;
    var resdatevalid = false;
    
    var restimestyle = document.getElementById("resTime");
    var restimevalue = restimestyle.options[restimestyle.selectedIndex].value;
    var restimevalid = false;

    var paxstyle = document.getElementById("resPax");
    var paxvalue = paxstyle.value;
    var paxvalid = false;
    
    var commentstyle = document.getElementById("res_comment");
    var commentvalue = commentstyle.value;
    var commentvalid = false;
    
    //Validation for first name input
    if (fnamevalue === "") {
        fnamestyle.style.borderColor = "red";
        fnamestyle.setCustomValidity("This field cannot be left blank");
        fnamevalid = false;
    }
    else if (!namevalidation(fnamevalue)){
        fnamestyle.style.borderColor = "red";
        fnamestyle.setCustomValidity("Please enter a name");
        fnamevalid = false;
    }
    else {
        fnamestyle.style.borderColor = "green";
        fnamevalid = true;
    }
    
    //Validation for last name input
    if (lnamevalue === "") {
        lnamestyle.style.borderColor = "red";
        lnamestyle.setCustomValidity("This field cannot be left blank");
        lnamevalid = false;
    }
    else if (!namevalidation(lnamevalue)){
        lnamestyle.style.borderColor = "red";
        lnamestyle.setCustomValidity("Please enter a last name");
        lnamevalid = false;
    }
    else {
        lnamestyle.style.borderColor = "green";
        lnamevalid = true;
    }
    
    //Validation for email input
    if (emailvalue === "") {
        emailstyle.style.borderColor = "red";
        emailstyle.setCustomValidity("This field cannot be left blank");
        emailvalid = false;
    } 
    else if (!emailvalidation(emailvalue)){
        emailstyle.style.borderColor = "red";
        emailstyle.setCustomValidity("Please enter a valid email address");
        emailvalid = false;
    }
    else {
        emailstyle.style.borderColor = "green";
        emailvalid = true;
    }
    
    //Validation for contact number input
    if (cnumbervalue === "") {
        cnumberstyle.style.borderColor = "red";
        cnumberstyle.setCustomValidity("This field cannot be left blank");
        cnumbervalid = false;
    }
    else if (!cnumbervalidation(cnumbervalue)){
        cnumberstyle.style.borderColor = "red";
        cnumberstyle.setCustomValidity("Please enter a valid contact number");
        cnumbervalid = false;
    }
    else {
        cnumberstyle.style.borderColor = "green";
        cnumbervalid = true;
    }
    
    //Validation for date input
    if (resdatevalue === "") {
        resdatestyle.style.borderColor = "red";
        resdatestyle.setCustomValidity("This field cannot be left blank");
        resdatevalid = false;
    }
    else {
        resdatestyle.style.borderColor = "green";
        resdatevalid = true;
    }
    
    //Validation for time input
    if (restimevalue === "0") {
        restimestyle.style.borderColor = "red";
        restimestyle.setCustomValidity("Please select a time");
        restimevalid = false;
    }
    else {
        restimestyle.style.borderColor = "green";
        restimevalid = true;
    }
    
    //Validation for pax input
    if (paxvalue === "") {
        paxstyle.style.borderColor = "red";
        paxstyle.setCustomValidity("This field cannot be left blank");
        paxvalid = false;
    }
    else if(!paxvalidation(paxvalue)){
        paxstyle.style.borderColor = "red";
        paxstyle.setCustomValidity("Please input a valid number");
        paxvalid = false;
    }
    else {
        paxstyle.style.borderColor = "green";
        paxvalid = true;
    }
    
    //Validation for comment input    
    if (commentvalue === "") {
        commentstyle.style.borderColor = "red";
        commentstyle.setCustomValidity("This field cannot be left blank");
        commentvalid = false;
    }
    else if (!commentvalidation(commentvalue)){
        commentstyle.style.borderColor = "red";
        commentstyle.setCustomValidity("Please input a valid request");
        commentvalid = false;
    }
    else {
        commentstyle.style.borderColor = "green";
        commentvalid = true;
    }
    
    
    //If all input values is True/
    if(fnamevalid & lnamevalid & emailvalid & cnumbervalid & resdatevalid & restimevalid & paxvalid & commentvalid === true) {
        alert("Confirmation email for the reservation has been send. Thank You");
        location.href = "index.php";
        reservationForm.submit();
    }
    else {
        alert("Please make sure your details are valid. Thank You");
    }
}

function emailvalidation(email) { 
    return /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email);
}

function namevalidation(name) {
    return /^([a-zA-Z']+)$/.test(name);
}

function cnumbervalidation(number) {
    return /^([0-9]{8})$/.test(number);
}

function paxvalidation(paxnum) {
    return /^([0-9])+$/.test(paxnum);
}

function commentvalidation(comment) {
    return /^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$/.test(comment);
}
