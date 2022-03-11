<?php
$num = 1;
while($num < 101) {
    if ($num %3 == 0 && $num %5 ==0){
        echo "Fizz!Buzz!"; 
        echo "<br>";
    } elseif ($num %5 == 0){
        echo "Buzz!";
        echo "<br>";
    } elseif ($num %3 == 0){
        echo "Fizz!";
        echo "<br>";
    } else {
        echo $num;
        echo "<br>";
           } 
        $num++;
}
?>