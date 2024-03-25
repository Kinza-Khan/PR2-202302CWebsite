<?php
$allStudents = [     
    ["name"=>"ali","email"=>"12ali@gmail.com","age"=>21],
            
    ["name"=>"aqsa","email"=>"Aaqsa@gmail.com","age"=>22,"city"=>"karachi"],
   
    ["name"=>"asif","email"=>"Hasif@gmail.com","age"=>24,"city"=>"karachi","company"=>"aptech"]
];


foreach($allStudents as  $std){
        foreach($std as $value){
                echo $value . "  ";
        }
        echo "<br>";
}

?>
<h1>for loop</h1>
<?php
for($i=0; $i<count($allStudents); $i++){
            $keys = array_keys($allStudents[$i]);
            for($j= 0 ; $j<count($keys);$j++){
                        echo $allStudents[$i][$keys[$j]] . " ";
            }
            echo "<br>";
}
?>