/*************************************************
 * Write a program that uses a single asynchronous filesystem operation to
 * read a file and print the number of newlines it contains to the console
 * (stdout), similar to running cat file | wc -l.
 *************************************************/

var fs = require("fs");

// read file
fs.readFile(process.argv[2], "utf8", function (err, file) {
  if (err) throw err;
  var lines = file.split("\n");
  // count how many lines has the file
  let totalLines = lines.length - 1;

  // show to the console the lines
  console.log(totalLines);
});
