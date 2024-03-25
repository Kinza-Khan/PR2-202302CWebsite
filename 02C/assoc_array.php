<?php
$allStudents  = ["std_1"=>"ali",
                "std_2"=>"hamza",
                "std_3"=>"aqsa"
];
$allKeys = array_keys($allStudents);

// print_r($allKeys);
for($i=0;$i<count($allKeys);$i++){
        echo $allKeys[$i] . " ". $allStudents[$allKeys[$i]] . "<br>";
}

// foreach($allStudents as $k => $std){
//         echo   $k ." : " .$std . "<br>";
// }

?>