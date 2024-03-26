<?php
include('query.php');
include('header.php');
?>

        <?php
        if(isset($_GET['tid'])){
            $tid = $_GET['tid'];
            $query = $pdo->prepare("select * from theater where id = :tId");
            $query->bindParam('tId', $tid);
            $query->execute();
            $thea = $query->fetch(PDO::FETCH_ASSOC);
            // print_r($thea);
        }
        ?>
     <!-- Blank Start -->
     <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 ">
                        <h3>Update Theater</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="">Name</label>
                              <input type="text" value="<?php echo $thea['name']?>" name="tName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                             
                            </div>
                            <div class="form-group">
                              <label for="">Address</label>
                              <input type="text" value="<?php echo $thea['address']?>" name="taddress" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            
                            </div>
                            <div class="form-group">
                              <label for="">Image</label>
                              <input type="file" value="<?php echo $thea['image']?>" name="tImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                                <span><?php echo $thea['image']?></span>
                            </div>
                            <button  name="updateTheater" type="submit" class="btn btn-primary mt-3">Update Theater</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Blank End --> 



<?php
include('footer.php');
?>