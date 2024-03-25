<?php
include('query.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Add user</title>
</head>
<body>
    <div class="container p-4">
    <?php
    if(isset($_GET['uid'])){
            $uId = $_GET['uid'];
            $query = $pdo->prepare("select * from users where id = :id");
            $query->bindParam('id',$uId);
            $query->execute();
            $user = $query->fetch(PDO::FETCH_ASSOC);
            // print_r($user);
            
    }
    ?>
                <form action="" method="post">
                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" name="uName" value="<?php echo $user['name']?>" id="" class="form-control" >
                      <input type="hidden" name="uid" value="<?php echo $user['id']?>" >
                    </div>
                    <div class="form-group">
                      <label for="">Email</label>
                      <input type="text" name="uEmail" value="<?php echo $user['email']?>" id="" class="form-control" >
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="text" name="uPassword" value="<?php echo $user['password']?>" id="" class="form-control" >
                    </div>
                    <button class="btn btn-info" type="submit" name="updateUser">update</button>
                </form>
    </div>
</body>
</html>
