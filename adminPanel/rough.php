<?php
include('query.php');
?>
<h1>hello</h1>
<?php
if(isset($_SESSION['userEmail'] )){

?>
<a href="wlogout.php">logout</a>
<?php

}

else{
    ?>
<a href="signin.php">signin</a>
    <?php
}
?>