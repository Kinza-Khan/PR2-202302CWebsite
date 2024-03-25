<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
      
   <div class="container p-5">
    <form action="" method="post">
        <div class="form-group">
          <label for="">Enter Email Address</label>
          <input type="text" name="uEmail" id="" class="form-control">
        </div>
        <button type="submit" name="sub" class="btn btn-info">submit</button>
    </form>
   </div>

        <?php
        if(isset($_POST['sub'])){
            $emailAddress = $_POST['uEmail'];
            $staticDomain  = "yahoo.com";
            $emailAddressArray = explode('@',$emailAddress);
            // print_r( $emailAddressArray);
            $finalResult = strcmp($staticDomain , $emailAddressArray[count($emailAddressArray)-1]);
            if($finalResult == 0 ){
                    echo "Restricted this type of domain";
            }
            else{
                echo "valid domain";
            }
        }
        
        ?>
   
  </body>
</html>