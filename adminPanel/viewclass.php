<?php
include('query.php');
include('header.php');
?>
      <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 ">
                        <h3>class</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = $pdo->query("select * from classes");
                                $allClasses = $query->fetchAll(PDO::FETCH_ASSOC);
                                    foreach( $allClasses as $class){
                                ?>
                                <tr>
                                    <td scope="row"><?php echo $class['name']?></td>
                                    <a href="editClass.php?id=<?php echo $class['id']?>" class="btn btn-primary">
                                  
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