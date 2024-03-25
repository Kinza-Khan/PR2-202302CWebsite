<?php
include('query.php');
                    $query = $pdo->query("select * from users");
                    // print_r($query);
                    $allUsers = $query->fetchAll(PDO::FETCH_ASSOC);
                    // print_r($allUsers);
                    foreach($allUsers as $user){
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
                    ?>