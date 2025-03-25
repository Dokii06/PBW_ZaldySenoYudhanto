const fibonacci = (n) => {
    let fib = [0, 1];
    for (let i = 2; i < n; i++) {
        fib[i] = fib[i - 1] + fib[i - 2];
    }
    return fib;
};

console.log("Fibonacci 10 angka:", fibonacci(10));

const calculator = (operator, ...numbers) => {
    switch (operator) {
        case '+': return numbers.reduce((a, b) => a + b, 0);
        case '-': return numbers.reduce((a, b) => a - b);
        case '*': return numbers.reduce((a, b) => a * b, 1);
        case '/': return numbers.reduce((a, b) => a / b);
        case '%': return numbers.reduce((a, b) => a % b);
        default: return "Operator tidak valid";
    }
};

console.log("Penjumlahan:", calculator('+', 10, 5, 2));
console.log("Pengurangan:", calculator('-', 10, 5, 2));
console.log("Perkalian:", calculator('*', 10, 5, 2));
console.log("Pembagian:", calculator('/', 10, 5));
console.log("Modulo:", calculator('%', 10, 3));
