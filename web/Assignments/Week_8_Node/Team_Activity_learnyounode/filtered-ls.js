var fs = require("fs");

// read directory
// The fs.readdir() method takes a pathname as its
// first argument and a callback as its second.
// 'list' is an array of filename strings.
fs.readdir(process.argv[2], function (err, list) {
  if (err) throw err;
  //check the extension of the file
  var ext = process.argv[3];
  // callback function to
  var answer = list.filter(function (element) {
    var len = ext.length + 1;
    return element.substr(element.length - len, element.length) === "." + ext;
  });

  answer.forEach(function (e) {
    console.log(e);
  });
});

// SOLUTION :
// Here's the official solution in case you want to compare notes:

// 'use strict'
// const fs = require('fs')
// const path = require('path')

// const folder = process.argv[2]
// const ext = '.' + process.argv[3]

// fs.readdir(folder, function (err, files) {
//   if (err) return console.error(err)
//   files.forEach(function (file) {
//     if (path.extname(file) === ext) {
//       console.log(file)
//     }
//   })
// })
