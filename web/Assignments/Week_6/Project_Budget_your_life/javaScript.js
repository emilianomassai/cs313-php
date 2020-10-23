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
  var amountValidation =
    document.forms["newTransactionForm"]["input_amount"].value;
  var notesValidation =
    document.forms["newTransactionForm"]["input_notes"].value;
  var dateValidation =
    document.forms["newTransactionForm"]["dateTransaction"].value;

  if (amountValidation == "" || isNaN(amountValidation)) {
    alert("Please enter a valid amount!");
    return false;
  }

  if (dateValidation == "") {
    alert("Please enter a valid date!");
    return false;
  }

  if (notesValidation == "") {
    alert("Please enter some notes to add more details to the transaction!");
    return false;
  } else {
    return true;
  }
}
