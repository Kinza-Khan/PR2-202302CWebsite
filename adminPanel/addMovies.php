<?php
include('query.php');
include('header.php');
?>

   <!-- Blank Start -->
   <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 ">
                        <h3>Product</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="">Name</label>
                              <input type="text" name="productName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            
                            </div>
                            <div class="form-group">
                              <label for="">Price</label>
                              <input type="text" name="productPrice" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            
                            </div>
                            <div class="form-group">
                              <label for="">Des</label>
                              <input type="text" name="productDes" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            
                            </div>
                            <div class="form-group">
                              <label for="">Quantity</label>
                              <input type="text" name="productQty" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            
                            </div>
                            <div class="form-group">
                              <label for="">Image</label>
                              <input type="file" name="productImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            
                            </div>
                            <div class="form-group">
                              <label for="">Select Category</label>
                              <select class="form-control" name="cId" id="">
                                <option>Select Category</option>
                              <?php
                              $query = $pdo->query("select * from category");
                              $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                              foreach( $allCategories as $cat){
                              ?>
                                <option value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                                <?php
                                }
                                ?>
                              </select>
                              
                            </div>
                            <div class="form-group">
                              <label for="">Select Theater</label>
                              <select class="form-control" name="tId" id="">
                                <option>Select Category</option>
                              <?php
                              $query = $pdo->query("select * from theater");
                              $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                              foreach( $allCategories as $cat){
                              ?>
                                <option value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                                <?php
                                }
                                ?>
                              </select>
                              
                            </div>
                            <div class="form-group">
                              <label for="">Select Class</label>
                              <select class="form-control" name="classId" id="">
                                <option>Select Category</option>
                              <?php
                              $query = $pdo->query("select * from classes");
                              $allCategories = $query->fetchAll(PDO::FETCH_ASSOC);
                              foreach( $allCategories as $cat){
                              ?>
                                <option value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                                <?php
                                }
                                ?>
                              </select>
                              
                            </div>
                            <button name ="addMovies" type="submit" class="btn btn-primary">Add Movie</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Blank End --> 


<?php

include('footer.php');
?>