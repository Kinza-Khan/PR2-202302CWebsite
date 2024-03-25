<?php
$allData = "hello this is ali. He is intelligent. ali is kind heart in nature";

echo strlen($allData);
echo "<br>";
echo str_word_count($allData);
echo "<br>";
print_r(explode(' ',$allData));
echo "<br>";
$name = "ali";
$res = strcmp($name,'ali');
if($res == -1){
    echo  "invalid";

}
else if($res==0)
{
        echo "valid name";
}
echo "<br>";
echo strrev($name);
echo "<br>";
echo ucwords($allData);
echo "<br>";
echo str_replace('ali','Huzaifa',$allData);
?>