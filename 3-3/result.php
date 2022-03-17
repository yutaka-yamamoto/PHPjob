<?php
$my_name = $_POST['my_name'];
?>
<p><?php echo date("Y/m/d" , time());?>の運勢は</p>

<p>選ばれた数字は<?php $number = substr(str_shuffle($my_name),0,1);
                        echo $number; ?></p>
<?php if($number == 0) {
    echo "凶";
} elseif($number <=3) {
    echo "小吉";
} elseif(4 <= $number && $number <=6){
    echo "中吉";
} elseif(7 <= $number && $number <=8){
    echo "吉";
} else {
    echo "大吉";
}                     
?>

