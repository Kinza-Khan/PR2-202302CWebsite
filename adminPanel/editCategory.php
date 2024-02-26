<?php
include('query.php');
include('header.php');
?>

        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $query = $pdo->prepare("select * from category where id = :cId");
            $query->bindParam('cId', $id);
            $query->execute();
            $cat = $query->fetch(PDO::FETCH_ASSOC);
            // print_r($cat);
        }
        ?>
     <!-- Blank Start -->
     <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 ">
                        <h3>Category</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="">Name</label>
                              <input type="text" value="<?php echo   $cat['name']?>" name="cName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                             
                            </div>
                            <div class="form-group">
                              <label for="">Des</label>
                              <input type="text" value="<?php echo   $cat['des']?>" name="cDes" id="" class="form-control" placeholder="" aria-describedby="helpId">
                             
                            </div>
                            <div class="form-group">
                              <label for="">Image</label>
                              <input type="file" value="<?php echo   $cat['image']?>" name="cImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <span><?php echo   $cat['image']?></span>
                            </div>
                            <button  name="updateCategory" type="submit" class="btn btn-primary mt-3">Update Category</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Blank End --> 



<?php
include('footer.php');
?>