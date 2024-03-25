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
   <div class="container">
        <form action="" method="get">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="userName" id="" class="form-control" >
            </div>
            <button name="sub" class="btn btn-info" type="submit" >Submit</button>
        </form>
   </div>
   <?php
//    if(isset($_POST['sub'])){
//             $name = $_POST['userName'];
//             echo $name;
//    }
if(isset($_GET['sub'])){
    $name = $_GET['userName'];
    echo $name;
}
   ?>

  </body>
</html>