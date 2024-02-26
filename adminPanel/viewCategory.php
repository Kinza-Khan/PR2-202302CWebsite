
<?php
include('query.php');
include('header.php');
?>
      <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 ">
                        <h3>Category</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Des</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = $pdo->query("select * from category");
                                $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach( $allCategories as $cat){
                                ?>
                                <tr>
                                    <td scope="row"><?php echo $cat['name']?></td>
                                    <td><?php echo $cat['des']?></td>
                                    <td><img height="100px" src="img/<?php echo $cat['image']?>" alt=""></td>
                                    <td><a href="editCategory.php?id=<?php echo $cat['id']?>" class="btn btn-primary">Edit</a></td>
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