<?php
include('query.php');
include('header.php');
?>
      <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 ">
                        <h3>Theater</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Address</th>
                                    <th>Image</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = $pdo->query("select * from theater");
                                $alltheaters = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach( $alltheaters as $thea){
                                ?>

                                <tr>
                                    <td scope="row"><?php echo $thea['name']?></td>
                                    <td><?php echo $thea['address']?></td>
                                    <td><img height="100px" src="img/<?php echo $thea['image']?>" alt=""></td>
                                    <td><a href="editTheater.php?tid=<?php echo $thea['id']?>" class="btn btn-primary">Edit</a></td>
                                    <td><a href="editTheater.php?id=<?php echo $thea['id']?>" class="btn btn-primary">Delete</a></td>
                                    <td></td>
                                </tr>
                             <?php
                             }
                             ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Blank End -->    
<?php
include('footer.php');
?>