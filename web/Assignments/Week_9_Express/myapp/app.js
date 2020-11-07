/*
* Basic routing
  Routing refers to determining how an application responds to a client request to a particular endpoint, which is a URI (or path) and a specific HTTP request method (GET, POST, and so on).
*/

const express = require("express");
const app = express();
const port = 3000;

// Respond with Hello World! on the homepage:
app.get("/", (req, res) => {
  res.send("Hello World!");
});

// Respond to POST request on the root route (/), the application’s home page:
app.post("/", function (req, res) {
  res.send("Got a POST request");
});

// Respond to a PUT request to the /user route:
app.put("/user", function (req, res) {
  res.send("Got a PUT request at /user");
});

// Respond to a DELETE request to the /user route:
app.delete("/user", function (req, res) {
  res.send("Got a DELETE request at /user");
});

app.use(express.static("web/Assignments/Week_9_Express/myapp/public"));

app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`);
});
