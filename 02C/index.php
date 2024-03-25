<?php 

$stdName = "ali";
echo "<h1>".$stdName."</h1>";
?>

<?php
$num1 = 21.12;
$num2 = 23;
$res = $num1 * $num2;
$stdEmail = "ali@gmail.com";
?>
<h1><?php echo $stdEmail?></h1>
<h2><?php echo $res ?></h2>
<!-- functions work -->

<?php
function breakLine(){
    echo "<br>";
}
function fun(){
    echo "happy new year";
}
function fun2(){
    return "Pakistan Zindabad";
}
fun();
 breakLine();
echo fun2();
?>