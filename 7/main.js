let numbers = [2, 5, 12, 13, 15, 18, 22];
//ここに答えを実装してください。↓↓↓
function isEven(num) {
for (let i = 0; i < numbers.length; i++) {
    if (numbers[i] % 2 == 0) {
        console.log(numbers[i],"偶数です");
    }
}
 return `${num}`;
};
let number = isEven();


    class Car {
        constructor(gas, num) {
            this.gas = gas;
            this.num = num;
        }
        getNumGas(){
        console.log(`ガソリンは${this.gas}です。ナンバーは${this.num}です`);
    }
    }
    
    /*let car = new Car (20.5, 1234);
    car.getNumGas();*/