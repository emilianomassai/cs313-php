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

  if (
    newDisplayNameValidation == "" ||
    newUserNameValidation == "" ||
    newPasswordValidation == ""
  ) {
    alert("Please enter a name!");
    return false;
  }
  if (!isNaN(newDisplayNameValidation)) {
    alert("Please enter only letters!");
    return false;
  }
}
