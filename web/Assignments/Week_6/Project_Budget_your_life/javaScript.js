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
  var dateValidation = document.forms["newTransactionForm"]["input_date"].value;

  if (amountValidation == "") {
    alert("Please enter a name!");
    return false;
  }

  if (isNaN(amountValidation)) {
    alert("Please enter only numbers!");
    return false;
  }
}

function isExpense() {
  var transactionType =
    document.forms["newTransactionForm"]["transaction_type"].value;
  if (transactionType == "Expense") {
    return true;
  } else return false;
}
