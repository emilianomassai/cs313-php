/*************************************************************************
 * FIRST NAME VALIDATING:
 * This function will check if the user enter his/her first name, if not,
 * it will display an error message.
 * If the field is filled, the red asterisk and the error message will
 * disappear.
 * **********************************************************************/
function firstNameValidating() {
  let x = document.forms["userInfo"]["firstName"].value;

  if (x == "") {
    document.getElementById("firstNameError").innerHTML =
      "First name is required.";
    document.getElementsByClassName("required-field")[0].style.display =
      "block";
    return false;
  }

  if (!/^[ .a-zA-Z]*$/g.test(x)) {
    document.getElementById("firstNameError").innerHTML =
      "Only characters are allowed.";
    document.getElementsByClassName("required-field")[0].style.display =
      "block";
    return false;
  } else {
    document.getElementsByClassName("required-field")[0].style.display = "none";
    document.getElementById("firstNameError").innerHTML = "";
    return true;
  }
}

/*************************************************************************
 * LAST NAME VALIDATING:
 * This function will check if the user enter his/her last name, if not,
 * it will display an error message.
 * If the field is filled, the red asterisk and the error message will
 * disappear.
 * **********************************************************************/
function lastNameValidating() {
  let x = document.forms["userInfo"]["lastName"].value;

  if (x == "") {
    document.getElementById("lastNameError").innerHTML =
      "Last name is required.";
    document.getElementsByClassName("required-field")[1].style.display =
      "block";
    return false;
  }

  // RegEx to see if the value prompted from the user match the allowed characters
  if (!/^[ .a-zA-Z]*$/g.test(x)) {
    document.getElementById("lastNameError").innerHTML =
      "Only characters are allowed.";
    document.getElementsByClassName("required-field")[1].style.display =
      "block";
    return false;
  } else {
    document.getElementsByClassName("required-field")[1].style.display = "none";
    document.getElementById("lastNameError").innerHTML = "";
    return true;
  }
}

/*************************************************************************
 * ADDRESS VALIDATING:
 * This function will check if the user enter his/her address, if not,
 * it will display an error message.
 * If the field is filled, the red asterisk and the error message will
 * disappear.
 * **********************************************************************/
function addressValidating() {
  let x = document.forms["userInfo"]["address"].value;
  if (x.length < 10) {
    document.getElementById("addressError").innerHTML = "Address is required.";
    document.getElementsByClassName("required-field")[2].style.display =
      "block";
    return false;
  } else {
    document.getElementsByClassName("required-field")[2].style.display = "none";
    document.getElementById("addressError").innerHTML = "";
    return true;
  }
}

/*************************************************************************
 * PHONE VALIDATING:
 * This function will check if the user enter his/her phone number, if not,
 * it will display an error message.
 * If the field is filled with numbers, the red asterisk and the error message
 * will disappear.
 * **********************************************************************/
function phoneValidating() {
  let x = document.forms["userInfo"]["phone"].value;
  // here I'm validating the prompt from the user with RegEx accepting only
  // the "208-497-3657" format.
  if (!/^([0-9]{3})\-([0-9]{3})\-([0-9]{4})$/g.test(x)) {
    document.getElementById("phoneError").innerHTML =
      'Please enter 10 digits with the format "208-497-3657"';
    document.getElementsByClassName("required-field")[3].style.display =
      "block";
    return false;
  } else {
    document.getElementsByClassName("required-field")[3].style.display = "none";
    document.getElementById("phoneError").innerHTML = "";
    return true;
  }
}

/*************************************************************************
 * CREDIT CARD TYPE VALIDATING:
 * This function will validate if the user selected a card type. If not,
 * an error message will be displayed.
 * **********************************************************************/
function creditCardTypeValidating() {
  if (
    !document.getElementById("visa").checked &&
    !document.getElementById("mastercard").checked &&
    !document.getElementById("americanExpress").checked
  ) {
    document.getElementById("creditCardTypeError").innerHTML =
      "Please select a credit card type.";

    document.getElementsByClassName("required-field")[4].style.display =
      "block";
    return false;
  } else {
    document.getElementsByClassName("required-field")[4].style.display = "none";
    document.getElementById("creditCardTypeError").innerHTML = "";

    return true;
  }
}

/*************************************************************************
 * CREDIT CARD NUMBER VALIDATING:
 * This function will validate if the credit card number is of 16 digit.
 * If the prompted value is not allowed, an error message will be displayed.
 * **********************************************************************/
function creditCardNumberValidating() {
  let x = document.forms["userInfo"]["creditCard"].value;
  if (x == "" || x.length < 16 || isNaN(x)) {
    document.getElementById("creditCardNumberError").innerHTML =
      "Please enter 16 digits for this field.";
    document.getElementsByClassName("required-field")[5].style.display =
      "block";
    return false;
  } else {
    document.getElementsByClassName("required-field")[5].style.display = "none";
    document.getElementById("creditCardNumberError").innerHTML = "";
    return true;
  }
}

/*************************************************************************
 * EXPIRATION DATE VALIDATING:
 * This function will reset all the validate if the credit card expiration
 * date is prompted correctly. If the value is not allowed, an error message
 * will be displayed.
 * **********************************************************************/
function expirationDateValidating() {
  let x = document.forms["userInfo"]["expDate"].value;

  // creating a variable to store the last four digits from the user. This will
  // be used to check if the year prompted from the user is valid.
  let year = x.substr(x.length - 4);

  // here I'm validating the prompt from the user with RegEx accepting only
  // the 1-12/YYYY format. I also check if the year is less than 2017.
  if (!/^([1-9]|1[0-2])\/([0-9]{4})$/g.test(x) || year <= "2017") {
    document.getElementById("expirationDateError").innerHTML =
      "Enter a valid expiration date. Valid month (1-12), valid year (> 2017)";
    document.getElementsByClassName("required-field")[6].style.display =
      "block";
    return false;
  } else {
    document.getElementsByClassName("required-field")[6].style.display = "none";
    document.getElementById("expirationDateError").innerHTML = "";
    return true;
  }
}

/*************************************************************************
 * RESET ALL MESSAGES:
 * This function will reset all the error messages and turn on all the
 * asterisks again.
 * **********************************************************************/
function resetAllMessages() {
  document.getElementById("firstNameError").innerHTML = "";
  document.getElementById("lastNameError").innerHTML = "";
  document.getElementById("addressError").innerHTML = "";
  document.getElementById("phoneError").innerHTML = "";
  document.getElementById("creditCardNumberError").innerHTML = "";
  document.getElementById("expirationDateError").innerHTML = "";
  switchOffAsterisks();
}

/*************************************************************************
 * TURN OFF ASTERISKS:
 * Useful function taking care of the asterisks.
 * **********************************************************************/
function switchOffAsterisks() {
  let elements = document.getElementsByClassName("required-field");

  for (let i = 0; i < elements.length; i++) {
    elements[i].style.display = "none";
  }
}

/*************************************************************************
 * ADD TO TOTAL:
 * If a checkbox is selected, the price of that product will be added
 * to total.
 * **********************************************************************/
function addToTotal() {
  let input = document.getElementsByClassName("productPrice");
  let total = 0;
  for (let i = 0; i < input.length; i++) {
    if (input[i].checked) {
      total += parseFloat(input[i].value);
    }
  }
  document.getElementById("total").value = "$" + total.toFixed(2);
  if (total != 0) {
    return true;
  } else false;
}

/*************************************************************************
 * CHECK FORM:
 * This function will check if all the required fields are filled correctly.
 * It will be called on the "onsubmit" event.
 * **********************************************************************/
function checkForm() {
  if (!firstNameValidating()) {
    document.getElementById("firstName").focus();
    return false;
  } else if (!lastNameValidating()) {
    document.getElementById("lastName").focus();
    return false;
  } else if (!addressValidating()) {
    document.getElementById("address").focus();
    return false;
  } else if (!phoneValidating()) {
    document.getElementById("phone").focus();
    return false;
  } else if (!creditCardTypeValidating()) {
    document.getElementById("visa").focus();
    return false;
  } else if (!creditCardNumberValidating()) {
    document.getElementById("creditCard").focus();
    return false;
  } else if (!expirationDateValidating()) {
    document.getElementById("expDate").focus();
    return false;
  } else if (!addToTotal()) {
    alert("Your cart is empty!");
    return false;
  }

  alert("Thank you for you purchase!");

  return true;
}
