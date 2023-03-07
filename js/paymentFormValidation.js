/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

window.onload = function() {
    attachListeners();
};
function attachListeners() {
    btnSubmit = document.getElementById("btnPayment");
    btnSubmit.addEventListener("click", validatePaymentForm);
}

//JS for checkout form validation/
function validatePaymentForm() {
    var paymentForm = document.getElementById("paymentForm");
    
    var custnamestyle = document.getElementById("custname");
    var custnamevalue = custnamestyle.value;
    var custnamevalid = false;
    
    var custemailstyle = document.getElementById("custemail");
    var custemailvalue = custemailstyle.value;
    var custemailvalid = false;
    
    var cnumberestyle = document.getElementById("custnumber");
    var cnumbervalue = cnumberestyle.value;
    var cnumbervalid = false;
    
    var streetaddstyle = document.getElementById("streetadd");
    var streetaddvalue = streetaddstyle.value;
    var streetaddvalid = false;
    
    var blknumberstyle = document.getElementById("blknumber");
    var blknumbervalue = blknumberstyle.value;
    var blknumbervalid = false;
    
    var unitnumberstyle = document.getElementById("unitnumber");
    var unitnumbervalue = unitnumberstyle.value;
    var unitnumbervalid = false;
    
    var zipcodestyle = document.getElementById("zipcode");
    var zipcodevalue = zipcodestyle.value;
    var zipcodevalid = false;
    
    var deldatestyle = document.getElementById("deldate");
    var deldatevalue = deldatestyle.value;
    var deldatevalid = false;
    
    var deltimestyle = document.getElementById("deltime");
    var deltimevalue = deltimestyle.options[deltimestyle.selectedIndex].value;
    var deltimevalid = false;
    
    var ccnamestyle = document.getElementById("ccname");
    var ccnamevalue = ccnamestyle.value;
    var ccnamevalid = false;
    
    var ccnumberstyle = document.getElementById("ccnumber");
    var ccnumbervalue = ccnumberstyle.value;
    var ccnumbervalid = false;
    
    var expdatestyle = document.getElementById("expdate");
    var expdatevalue = expdatestyle.value;
    var expdatevalid = false;
    
    var ccvstyle = document.getElementById("ccvnumber");
    var ccvvalue = ccvstyle.value;
    var ccvvalid = false;
    
    //validation customer information part/
    //customer name/
    if (custnamevalue === "") {
        custnamestyle.style.borderColor = "red";
        custnamestyle.setCustomValidity("This field cannot be left blank");
        custnamevalid = false;
    }
    else if(!namevalidation(custnamevalue)) {
        custnamestyle.style.borderColor = "red";
        custnamestyle.setCustomValidity("Please enter a valid name");
        custnamevalid = false;
    }
    else {
        custnamestyle.style.borderColor = "green";
        custnamevalid = true;
    }
    
    //customer email/
    if (custemailvalue === "") {
        custemailstyle.style.borderColor = "red";
        custemailstyle.setCustomValidity("This field cannot be left blank");
        custnamevalid = false;
    }
    else if(!emailvalidation(custemailvalue)) {
        custemailstyle.style.borderColor = "red";
        custemailstyle.setCustomValidity("Please enter a valid email");
        custemailvalid = false;
    }
    else {
        custemailstyle.style.borderColor = "green";
        custemailvalid = true;
    }
    
    //customer contact number/
    if (cnumbervalue === "") {
        cnumberestyle.style.borderColor = "red";
        cnumberestyle.setCustomValidity("This field cannot be left blank");
        cnumbervalid = false;
    }
    else if(!contactnumbervalidation(cnumbervalue)) {
        cnumberestyle.style.borderColor = "red";
        cnumberestyle.setCustomValidity("Please enter a valid number");
        cnumbervalid = false;
    }
    else {
        cnumberestyle.style.borderColor = "green";
        cnumbervalid = true;
    }
    
    //validation address information part/
    //Street name/
    if (streetaddvalue === "") {
        streetaddstyle.style.borderColor = "red";
        streetaddstyle.setCustomValidity("This field cannot be left blank");
        streetaddvalid = false;
    }
    else if(!addressvalidation(streetaddvalue)) {
        streetaddstyle.style.borderColor = "red";
        streetaddstyle.setCustomValidity("Please enter a valid address");
        streetaddvalid = false;
    }
    else {
        streetaddstyle.style.borderColor = "green";
        streetaddvalid = true;
    }
    
    //blk number/
    if (blknumbervalue === "") {
        blknumberstyle.style.borderColor = "red";
        blknumberstyle.setCustomValidity("This field cannot be left blank");
        blknumbervalid = false;
    }
    else if(!blknumbervalidation(blknumbervalue)) {
        blknumberstyle.style.borderColor = "red";
        blknumberstyle.setCustomValidity("Please enter a valid blk number");
        blknumbervalid = false;
    }
    else {
        blknumberstyle.style.borderColor = "green";
        blknumbervalid = true;
    }
    
    //unit number/
    if (unitnumbervalue === "") {
        unitnumberstyle.style.borderColor = "red";
        unitnumberstyle.setCustomValidity("This field cannot be left blank");
        unitnumbervalid = false;
    }
    else if(!unitnumbervalidation(unitnumbervalue)) {
        unitnumberstyle.style.borderColor = "red";
        unitnumberstyle.setCustomValidity("Please enter a valid unit number");
        unitnumbervalid = false;
    }
    else {
        unitnumberstyle.style.borderColor = "green";
        unitnumbervalid = true;
    }
    
    //zipcode number/
    if (zipcodevalue === "") {
        zipcodestyle.style.borderColor = "red";
        zipcodestyle.setCustomValidity("This field cannot be left blank");
        zipcodevalid = false;
    }
    else if(!zipcodevalidation(zipcodevalue)) {
        zipcodestyle.style.borderColor = "red";
        zipcodestyle.setCustomValidity("Please enter a valid zipcode");
        zipcodevalid = false;
    }
    else {
        zipcodestyle.style.borderColor = "green";
        zipcodevalid = true;
    }
    
    //delivery date/
    if (deldatevalue === "") {
        deldatestyle.style.borderColor = "red";
        deldatestyle.setCustomValidity("This field cannot be left blank");
        deldatevalid = false;
    }
    else {
        deldatestyle.style.borderColor = "green";
        deldatevalid = true;
    }
    
    //delivery time/
    if (deltimevalue === 0) {
        deltimestyle.style.borderColor = "red";
        deltimestyle.setCustomValidity("This field cannot be left blank");
        deltimevalid = false;
    }
    else {
        deltimestyle.style.borderColor = "green";
        deltimevalid = true;
    } 
    
    //validation credit card information part/
    //credit card name/
    if (ccnamevalue === "") {
        ccnamestyle.style.borderColor = "red";
        ccnamestyle.setCustomValidity("This field cannot be left blank");
        ccnamevalid = false;
    }
    else if(!namevalidation(ccnamevalue)) {
        ccnamestyle.style.borderColor = "red";
        ccnamestyle.setCustomValidity("Please enter a valid name");
        ccnamevalid = false;
    }
    else {
        ccnamestyle.style.borderColor = "green";
        ccnamevalid = true;
    }
    
    //credit card number/
    if (ccnumbervalue === "") {
        ccnumberstyle.style.borderColor = "red";
        ccnumberstyle.setCustomValidity("This field cannot be left blank");
        ccnumbervalid = false;
    }
    else if(!ccnumbervalidation(ccnumbervalue)) {
        ccnumberstyle.style.borderColor = "red";
        ccnumberstyle.setCustomValidity("Please enter a valid credit card number");
        ccnumbervalid = false;
    }
    else {
        ccnumberstyle.style.borderColor = "green";
        ccnumbervalid = true;
    }
    
    //EXP number/
    if (expdatevalue === "") {
        expdatestyle.style.borderColor = "red";
        expdatestyle.setCustomValidity("This field cannot be left blank");
        expdatevalid = false;
    }
    else if(!expnumbervalidation(expdatevalue)) {
        expdatestyle.style.borderColor = "red";
        expdatestyle.setCustomValidity("Please enter a valid exp dates");
        expdatevalid = false;
    }
    else {
        expdatestyle.style.borderColor = "green";
        expdatevalid = true;
    }
    
    //CCV number/
    if (ccvvalue === "") {
        ccvstyle.style.borderColor = "red";
        ccvstyle.setCustomValidity("This field cannot be left blank");
        ccvvalid = false;
    }
    else if(!ccvvalidation(ccvvalue)) {
        ccvstyle.style.borderColor = "red";
        ccvstyle.setCustomValidity("Please enter a valid ccv number");
        ccvvalid = false;
    }
    else {
        ccvstyle.style.borderColor = "green";
        ccvvalid = true;
    }
    
    //If all input values is True/
    if(custnamevalid & custemailvalid & cnumbervalid & streetaddvalid & blknumbervalid & unitnumbervalid & zipcodevalid & deldatevalid & deltimevalid & ccnamevalid & ccnumbervalid & expdatevalid & ccvvalid === true) {
        location.href = "cart_information.php";
        paymentForm.submit();
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

function contactnumbervalidation(number) {
    return /^([0-9]{8})$/.test(number);
}

function addressvalidation(address) {
    return /^([A-Za-z0-9'\.\-\#\s\,])+$/.test(address);
}

function blknumbervalidation(blknum) {
    return /^([0-9]{3})$/.test(blknum);
}

function unitnumbervalidation(unit) {
    return /^([0-9]{2}\-[0-9]{3})$/.test(unit);
}

function zipcodevalidation(zipcode) {
    return /^([0-9]{6})$/.test(zipcode);
}

function ccnumbervalidation(ccnumber) {
    return /^([0-9]{16})$/.test(ccnumber);
}

function expnumbervalidation(expnum) {
    return /^([0-9]{2}\/[0-9]{2})$/.test(expnum);
}

function ccvvalidation(ccvnum) {
    return /^([0-9]{3})$/.test(ccvnum);
}
