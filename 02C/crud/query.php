<?php
include('dbcon.php');
if(isset($_POST['addUser'])){
    $userName = $_POST['uName'];
    $userEmail = $_POST['uEmail'];
    $userPassword = $_POST['uPassword'];
    $query = $pdo->prepare("insert into users (name,email,password) values(:usName ,:usEmail ,:usPassword)");
    $query->bindParam('usName',$userName);
    $query->bindParam('usEmail',$userEmail);
    $query->bindParam('usPassword',$userPassword);
    $query->execute();
    echo "<script>alert('record added successfully');
    location.assign('select.php');
    </script>";

}

    // update user

    if(isset($_POST['updateUser'])){
        $userId = $_GET['uid'];
        // $userId  = $_POST['uid'];
        $userName = $_POST['uName'];
        $userEmail = $_POST['uEmail'];
        $userPassword = $_POST['uPassword'];
        $query = $pdo->prepare("update users set name = :usName , email = :usEmail , password = :usPassword where id = :usId");
        $query->bindParam('usId',$userId);
        $query->bindParam('usName',$userName);
        $query->bindParam('usEmail',$userEmail);
        $query->bindParam('usPassword',$userPassword);
        $query->execute();
        echo "<script>alert('record updated successfully');
        location.assign('select.php');
        </script>";


    }

    // record deleted
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = $pdo->prepare("delete  from users  where id = :id");
        $query->bindParam('id',$id);
        $query->execute();
        echo "<script>alert('record deleted successfully');
        location.assign('select.php');
        </script>";

    }


    if(isset($_POST['input'])){
        $val = $_POST['input'];
        $query = $pdo->prepare("SELECT * FROM users WHERE name LIKE :val");
        $val = "%$val%";
        $query->bindParam('val', $val);
        $query->execute();
        $allUsers = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach($allUsers as $user ){
    ?>
    <tr>
        <td><?php echo $user['name']?></td>
        <td><?php echo $user['email']?></td>
        <td><?php echo $user['password']?></td>
        <td><a href="edit.php?uid=<?php echo $user['id']?>" class="btn btn-info">Edit</a></td>
        <td><a href="?id=<?php echo $user['id']?>" class="btn btn-danger">Delete</a></td>
    </tr>
    <?php
        }
    }
?>