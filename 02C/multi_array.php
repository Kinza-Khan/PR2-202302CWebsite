<?php
$students = [     
        ["ali","12ali@gmail.com",21],
                
        ["aqsa","Aaqsa@gmail.com",22,"karachi"],
       
        ["asif","Hasif@gmail.com",24,"karachi","aptech"]
];




        for($i = 0 ; $i < count($students); $i++ ){
                //    print_r ($students[$i]);
                for($j=0;$j<count($students[$i]); $j++){
                        echo $students[$i][$j] . " ";
                }   
                echo "<br>";
        }
        ?>
            <h1>Foreach </h1>
        <?php
            foreach($students as $std){
                    foreach($std as $value){
                            echo $value . " ";
                    }

                    echo "<br>";
            }
?>