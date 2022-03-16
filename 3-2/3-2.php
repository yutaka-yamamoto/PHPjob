<?php
$fruits = array("りんご"=>"30", "みかん"=>"15","桃"=>"300");

function box($value,$quantity) {
    return $value * $quantity;
}

foreach($fruits as $key => $value){
    $total = box($value,10);
    print $key."は".$total."円です。<br>" ;
}
?>

