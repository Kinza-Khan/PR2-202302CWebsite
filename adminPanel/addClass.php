
<?php
include('query.php');
include('header.php');
?>
            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 ">
                        <h3>Classes</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="">Name</label>
                              <input type="text" name="cName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                             
                            </div>
                           
                            <button  name="addClass" type="submit" class="btn btn-primary mt-3">Add Category</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Blank End --> 
<?php
include('footer.php');
?>