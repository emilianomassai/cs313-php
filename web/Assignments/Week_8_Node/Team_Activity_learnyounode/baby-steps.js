// console.log(process.argv)
// console.log(Number(process.argv[2]));

// save the global process object argv property (array) into variable
let arr = process.argv;
// creating a variable to store the sum
let sum = 0;
// loop into the array argv, starting from index 2 (The first element of the
// process.argv array is always 'node', and the second element is always the
// path to your baby - steps.js file)
for (let i = 2; i < arr.length; i++) {
  // before sum we need to convert the string into the array in numbers.
  sum += Number(process.argv[i]);
}
// print the result
console.log(sum);
