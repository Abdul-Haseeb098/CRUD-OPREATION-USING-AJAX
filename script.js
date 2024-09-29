// Given an integer n, return a counter function. This counter function initially returns n and then returns 1 more than the previous value every subsequent time it is called (n, n + 1, n + 2, etc). solve this program using loop and function.

function counter(n) {
    return function() {
        n += 1;
        return n;
    };
}

let count = counter(5);

console.log(count()); 