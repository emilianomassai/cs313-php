function validateForm() {
  var x = document.forms["userSearch"]["name_user"].value;
  if (x == "") {
    alert("Please enter a name!");
    return false;
  }
  if (!isNaN(x)) {
    alert("Please enter only letters!");
    return false;
  }
}

function validateNewUserForm() {
  var newDisplayNameValidation =
    document.forms["newUserForm"]["display_name"].value;
  var newUserNameValidation = document.forms["newUserForm"]["user_name"].value;
  var newPasswordValidation = document.forms["newUserForm"]["password"].value;

  if (newDisplayNameValidation == "") {
    alert("Please enter a name!");
    return false;
  } else if (newUserNameValidation == "") {
    alert("Please enter an username!");
    return false;
  } else if (newPasswordValidation == "") {
    alert("Please enter a password!");
    return false;
  }

  if (!isNaN(newDisplayNameValidation)) {
    alert("Please enter only letters!");
    return false;
  }
}

function validateNewTransactionForm() {
  var regexDateValidation = /^(((0[1-9]|[12]\d|3[01])\/(0[13578]|1[02])\/((19|[2-9]\d)\d{2}))|((0[1-9]|[12]\d|30)\/(0[13456789]|1[012])\/((19|[2-9]\d)\d{2}))|((0[1-9]|1\d|2[0-8])\/02\/((19|[2-9]\d)\d{2}))|(29\/02\/((1[6-9]|[2-9]\d)(0[48]|[2468][048]|[13579][26])|(([1][26]|[2468][048]|[3579][26])00))))$/g;

  var amountValidation =
    document.forms["newTransactionForm"]["input_amount"].value;
  var notesValidation =
    document.forms["newTransactionForm"]["input_notes"].value;
  var dateValidation = document.forms["newTransactionForm"]["input_date"].value;

  if (amountValidation == "" || isNaN(amountValidation)) {
    alert("Please enter a valid amount!");
    return false;
  }

  if (notesValidation == "") {
    alert("Please enter some notes to add more details to the transaction!");
    return false;
  }

  if (dateValidation == "" || dateValidation != regexDateValidation) {
    alert("Please enter a date in the format 'YYYY-MM-DD'");
    return false;
  } else {
    return true;
  }
}
