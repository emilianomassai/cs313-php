// require the 'http' library..
var http = require("http");

// declaring what I want to do while someone is connected to the server
// in this case there is a request and a response from and to the server.
function sayHello(req, res) {
  // console.log("Hello World");
  console.log("Recieved a request for: " + req.url);
  console.log("Starting server status: " + res.statusCode);

  if (req.url == "/home.html") {
    console.log("Server status when /home.html: " + res.statusCode);

    res.write("<h1>Welcome to the Home Page</h1>");
    res.end();
  } else if (req.url == "/getData") {
    res.write("<h1>Got some data</h1>");
    res.end();
  } else {
    res.statusCode = 404;
    console.log("Error from server " + res.statusCode);
    res.write("Page Not Found");
    res.end();
  }
}
// .. then I can create a new server, passing my function to the server as
// variable
var server = http.createServer(sayHello);

// .. and wait to someone connecting to the server at port 5000
server.listen(5000);

console.log("The server is now listening on port 5000...");
