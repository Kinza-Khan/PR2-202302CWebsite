<?php
include('query.php');
include('header.php');
?>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = $pdo->prepare("select movies.* , category.name as cName, category.id as catId from movies inner join category on movies.c_id = category.id where movies.id = :mId");
    $query->bindParam('mId',$id);
    $query->execute();
    $product = $query->fetch(PDO::FETCH_ASSOC);

    
}
?>
<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 ">
                        <h3>Edit movies</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="">Name</label>
                              <input type="text" value="<?php echo   $movies['name']?>" name="pName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                              <label for="">Price</label>
                              <input type="text" value="<?php echo   $movies['price']?>" name="pPrice" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                              <label for="">Des</label>
                              <input type="text" value="<?php echo   $movies['des']?>" name="pDes" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                              <label for="">Quantity</label>
                              <input type="text" name="pQty" value="<?php echo   $movies['qty']?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                              <label for="">Image</label>
                              <input type="file" name="pImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                              <span><?php echo   $movies['image']?></span>
                            </div>
                            <div class="form-group">
                              <label for="">Select Category</label>
                              <select class="form-control" name="cId" id="">
                                <option value="<?php echo   $movies['catId']?>"><?php echo   $movies['cName']?></option>
                                <?php
                                $query = $pdo->prepare("select * from category where name != :catName");
                                $query->execute();
                                $allCatgeories = $query->fetchAll(PDO::FETCH_ASSOC);
                                foreach($allCatgeories as $cat){
                                ?>
                                <option value="<?php echo $cat['id']?>"><?php echo $cat['name']?></option>
                                <?php
                                
                                }?>
                              </select>
                            </div>
                            <button class="btn btn-primary" name="updateMovies">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Blank End -->    

<?php
include('footer.php');
?>