<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Task2</title>
  </head>
  <body>
            <div class="container p-3">
                <form action="" method="post">
                    <div class="form-group">
                      <label for="">Enter Number</label>
                      <input type="text" name="phoneNumber" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      
                    </div>
                    <button name="findCode" type="submit" class="btn btn-info">submit</button>
                </form>
            </div>
        <?php
        if(isset($_POST['findCode'])){
                    $userNumber = $_POST['phoneNumber'];
                    $myCodes = "0331,0332,0333,0334,0335,0336";
                    $myCodesArray = explode(',',$myCodes);
                    // print_r($myCodesArray);
                    $userNumberSplit = str_split($userNumber,4);
                    // print_r($userNumberSplit);
                    echo "<br>";
                    // echo $userNumberSplit[0];
                    foreach( $myCodesArray as $code ){
                                // echo $code ."<br>";
                                if($userNumberSplit[0] == $code){
                                        echo "your number is belong to ufone family and code is ".$userNumberSplit[0];
                                }
                             
                    }
                    

        }
        ?>
   
  </body>
</html>