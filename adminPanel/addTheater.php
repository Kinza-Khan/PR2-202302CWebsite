
<?php
include('query.php');
include('header.php');
?>
            <!-- Blank Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded align-items-center justify-content-center mx-0">
                    <div class="col-md-6 ">
                        <h3>Add Theater</h3>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="">Name</label>
                              <input type="text" name="tName" id="" class="form-control" placeholder="" aria-describedby="helpId">
                             
                            </div>

                            <div class="form-group">
                              <label for="">Address</label>
                              <input type="text" name="taddress" id="" class="form-control" placeholder="" aria-describedby="helpId">
                             
                            </div>
                            <div class="form-group">
                              <label for="">Image</label>
                              <input type="file" name="tImage" id="" class="form-control" placeholder="" aria-describedby="helpId">
                             
                            </div>
                            <button  name="addTheater" type="submit" class="btn btn-primary mt-3">Add Category</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Blank End --> 
<?php
include('footer.php');
?>