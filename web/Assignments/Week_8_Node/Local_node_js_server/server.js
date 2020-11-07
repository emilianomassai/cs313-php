// require the 'http' library..
var http = require("http");

// declaring what I want to do while someone is connected to the server
// in this case there is a request and a response from and to the server.
function sayHello(req, res) {
  // console.log("Hello World");
  console.log("Received a request for: " + req.url);
  console.log("The initial server status is: " + res.statusCode);

  if (req.url == "/home.html") {
    console.log("Server status when /home.html: " + res.statusCode);

    res.write("<h1>Welcome to the Home Page</h1>");
    res.end();
  } else if (req.url == "/getData") {
    const fs = require("fs");

    fs.readFile(
      "/Volumes/GoogleDrive/My Drive/BYU-I/Classes/7.CSE 341_Web Engineering II/GitHub_remote/cs313-php/web/Assignments/Week_8_Node/Local_node_js_server/student.json",
      "utf8",
      (err, data) => {
        if (err) {
          console.log(`Error reading file from disk: ${err}`);
        } else {
          // parse JSON string to JSON object
          const students = JSON.parse(data);
          console.log(students);

          // print all databases
          students.forEach((student) => {
            res.write(
              `My name is ${student.name} and I'm ${student.age} years old.` +
                "\n" +
                `I'm a ${student.profession} and I live in ${student.city}. I have a ${student.car} as my car.` +
                "\n" +
                `I'm studing ${student.major} and I'm in the ${student.class} class.` +
                "\n" +
                "\n"
            );
          });
          // res.write(
          //   `My name is ${students.name} and I'm ${students.age} years old. I'm a ${students.profession} and I live in ${students.city}. I have a ${students.car} as my car. I'm studing ${students.major} and I'm in the ${students.class} class.`
          // );

          res.end();
        }
      }
    );
    // res.writeHead(200, { "Content-Type": "application/json" });

    // res.end();
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

// github from Sublime text
console.log("The server is now listening on port 5000...");
