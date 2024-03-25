<?php
$allStudents = ["ali","aqsa","huzaifa","rafay",21,22,23,19,24];
// echo $allStudents[3]. " " . $allStudents[0];
// print_r($allStudents);
// var_dump($allStudents);

for($i = 0 ; $i<=7; $i++){
        echo  $allStudents[$i] . "<br>";
}
?>
<?php
for($i=0; $i<count($allStudents);$i++){
        echo $allStudents[$i] . " ";
}
?>
<h2>foreach loop</h2>
<?php
foreach($allStudents as $singleStudent){
            echo  $singleStudent . " ";
}

?>