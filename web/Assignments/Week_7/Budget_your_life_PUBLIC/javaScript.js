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
  var regex = /^(((?:(?:1[6-9]|[2-9]\d)?\d{2})(-)(?:(?:(?:0?[13578]|1[02])(-)31)|(?:(?:0?[1,3-9]|1[0-2])(-)(?:29|30))))|(((?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))(-)(?:0?2(-)29))|((?:(?:(?:1[6-9]|[2-9]\d)?\d{2})(-)(?:(?:0?[1-9])|(?:1[0-2]))(-)(?:0[1-9]|1\d|2[0-8]))))$/;

  var amountValidation =
    document.forms["newTransactionForm"]["input_amount"].value;
  var minValidation = amountValidation.charAt(0);
  var notesValidation =
    document.forms["newTransactionForm"]["input_notes"].value;
  var dateValidation =
    document.forms["newTransactionForm"]["dateTransaction"].value;

  if (
    amountValidation == "" ||
    isNaN(amountValidation) ||
    minValidation == "-"
  ) {
    alert(
      "Please enter a valid amount! Use '.' instead of ',' for decimals. Not use '-' in this field."
    );
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

function isSelected() {
  var isToEdit = document.forms["editTransactionForm"]["edit"].value;
  // var isToEdit = document.getElementById("edit").checked;
  if (isToEdit == "") {
    alert("Please select a transaction to edit or delete!");
    return false;
  } else {
    return true;
  }
}
