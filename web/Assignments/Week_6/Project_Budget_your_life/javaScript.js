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


  
  var regex = /^((0[13578] | 1[02])[\/.]31[\/.](18|19|20)[0-9]{2})|((01|0[3-9]|1[1-2])[\/.](29|30)[\/.](18|19|20)[0-9]{2})|((0[1-9]|1[0-2])[\/.](0[1-9]|1[0-9]|2[0-8])[\/.](18|19|20)[0-9]{2})|((02)[\/.]29[\/.](((18|19|20)(04|08|[2468][048]|[13579][26]))|2000));
  
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

  if (dateValidation == "" || !regex.test(dateValidation)) {
    alert("Please enter a valid date! The format is YYYY-MM-DD");
    return false;
  }

  if (notesValidation == "") {
    alert("Please enter some notes to add more details to the transaction!");
    return false;
  } else {
    return true;
  }
}
