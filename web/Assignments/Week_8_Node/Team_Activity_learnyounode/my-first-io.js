/*************************************************
 * Write a program that uses a single synchronous
 * filesystem operation to read a file and print
 * the number of newlines (\n) it contains to the
 * console (stdout), similar to running cat file | wc -l.
 * The full path to the file to read will be provided
 * as the first command-line argument (i.e., process.argv[2]).
 * You do not need to make your own test file.
 *************************************************/

var fs = require("fs");

// This method will return a Buffer object containing the
// complete contents of the file. Buffer objects are Node's
// way of efficiently representing arbitrary arrays of data,
// whether it be ascii, binary or some other format.
var buf = fs.readFileSync(process.argv[2]);

// Buffer objects can be converted to strings by simply calling
// the toString() method on them.

const fileString = buf.toString("utf8");
// console.log(fileString);

// divide the text in the file by new lines
let newLinesArray = fileString.split(/\n/g);

// count how many lines has the file
let totalLines = newLinesArray.length - 1;

// show to the console the lines
console.log(totalLines);
