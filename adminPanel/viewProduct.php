<?php
include('query.php');
include('header.php');
?>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
                <div class="row  bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 ">
                        <h3>Product</h3>
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
                            $query = $pdo->query("select product.* , category.name as cName, category.id as catId from  product inner join category on product.c_id = category.id");
                            $allProduct = $query->fetchAll(PDO::FETCH_ASSOC);
                            foreach($allProduct as $product){
                            ?>  
                           <tr>
                           
                             <td><?php echo $product['name']?></td>
                             <td><?php echo $product['price']?></td>
                             <td><?php echo $product['qty']?></td>
                            <td><?php echo $product['des']?></td>
                           <td>  <?php echo $product['cName']?></td>
                             <td><img height="100px" src="img/<?php echo $product['image']?>" alt=""></td>
                                <td><a href="editProduct.php?id=<?php echo $product['id']?>" class="btn btn-primary">Edit</a></td>
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