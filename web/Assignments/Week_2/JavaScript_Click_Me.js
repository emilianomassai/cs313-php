// Function to alert the text "Clicked!" when the "Click Me" button is clicked.
function clikedAllert() {
  window.alert("Clicked!");
}

function colorValidating() {
  //check the input from the user. Change the color of the first div based on
  //what color has been selected. Display an error message if the color is not
  //allowed.

  let colorFromUser = document.getElementById("input_color").value;

  switch (colorFromUser) {
    case "Red":
      document.getElementById("select_message").innerHTML = "You selected Red!";
      document.getElementById("first_div").style.color = "red";
      break;

    case "Green":
      document.getElementById("select_message").innerHTML =
        "You selected Green!";
      document.getElementById("first_div").style.color = "green";
      break;

    case "Blue":
      document.getElementById("select_message").innerHTML =
        "You selected Blue!";
      document.getElementById("first_div").style.color = "blue";
      break;

    case "Yellow":
      document.getElementById("select_message").innerHTML =
        "You selected Yellow!";
      document.getElementById("first_div").style.color = "yellow";
      break;

    case "Brown":
      document.getElementById("select_message").innerHTML =
        "You selected Brown!";
      document.getElementById("first_div").style.color = "brown";
      break;

    case "White":
      document.getElementById("select_message").innerHTML =
        "You selected White!";
      document.getElementById("first_div").style.color = "white";
      break;

    case "Black":
      document.getElementById("select_message").innerHTML =
        "You selected Black!";
      document.getElementById("first_div").style.color = "black";
      break;

    default:
      document.getElementById("select_message").innerHTML =
        "Please select between Red, Green, Blue, Yellow, Brown, White or Black. It is case sensitive!";
  }
}

/* function hintMessage() {
  document.getElementById("select_message").innerHTML =
    "Select between Red, Green, Blue, Yellow or Black.";
}
*/
