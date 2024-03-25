<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Task</title>
  </head>
  <body>
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
              <label for="">Enter Number</label>
              <input type="text" name="eNumber" id="" class="form-control" placeholder="" aria-describedby="helpId">
          
            </div>
            <button name="printTable" type="submit" class="btn btn-info">Submit</button>
        </form>
        <?php
        if(isset($_POST['printTable'])){
            $userNumber = $_POST['eNumber'];
                ?>
                    <table class="table">
                        <tbody>
                            <?php 
                            for($i=1; $i<=$userNumber ; $i++){
                            ?>
                            <tr>
                                <td ><?php echo $userNumber?></td>
                                <td><?php echo 'x'?></td>
                                <td><?php echo $i?></td>
                                <td><?php echo '='?></td>
                                <td><?php echo $i*$userNumber?></td>
                            </tr>
                           <?php
                           }
                           ?>
                        </tbody>
                    </table>
              
              
              <?php
        }
        
        ?>



    </div>
  </body>
</html>