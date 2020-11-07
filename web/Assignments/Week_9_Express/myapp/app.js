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

// To serve static files such as images, CSS files, and JavaScript files, use
// the express.static built -in middleware function in Express.
app.use(express.static("web/Assignments/Week_9_Express/myapp/public"));

// Customized 404 message
app.use(function (req, res, next) {
  res.status(404).send("The page you are looking for is not responding!");
});

// Send terminal log if the connection starts
app.listen(port, () => {
  console.log(`Example app listening at http://localhost:${port}`);
});
