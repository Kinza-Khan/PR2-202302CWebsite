<?php
include('query.php');
include('header.php');

?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
                <div class="row  bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 ">
                        <h3>Edit Movie</h3>
                       <table class="table">
                         <thead>
                           <tr>
                             <th scope="col">Name</th>
                             <th scope="col">Price</th>
                             <th scope="col">Quantity</th>
                             <th scope="col">Des</th>
                             <th>Category</th>
                             <th>Image</th>
                             <th>Action</th>
                             <th>Action</th>
                    
                           </tr>
                         </thead>
                         <tbody>
                            <?php
                            $query = $pdo->query("select movies.* , category.name as cName, category.id as catId from  movies inner join category on movies.c_id = category.id");
                            $allMovies = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach($allMovies as $movie){
                            ?>  
                           <tr>
                           
                             <td><?php echo $movie['name']?></td>
                             <td><?php echo $movie['price']?></td>
                             <td><?php echo $movie['qty']?></td>
                            <td><?php echo $movie['des']?></td>
                           <td>  <?php echo $movie['cName']?></td>
                             <td><img height="100px" src="img/<?php echo $movie['image']?>" alt=""></td>
                                <td><a href="editmovies.php?id=<?php echo $movie['id']?>" class="btn btn-primary">Edit</a></td>
                                <td><a href="editmovies.php?id=<?php echo $movie['id']?>" class="btn btn-primary">Delete</a></td>
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