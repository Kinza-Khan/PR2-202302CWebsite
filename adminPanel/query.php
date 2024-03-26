<?php
include('dbcon.php');
session_start();

// add Classes


if(isset($_POST['addClass'])){
    $cName = $_POST['cName'];
                            $query = $pdo->prepare("insert into classes (name) values(:cName)");
                            $query->bindParam('cName',$cName);                      
                            $query->execute();
                            echo "<script>alert('class added successfully');
                            location.assign('viewClass.php');
                            </script>";

    

}

// end classes


// add Theater
if(isset($_POST['addTheater'])){
    $tName = $_POST['tName'];
    $taddress = $_POST['taddress'];
    $tImageName = $_FILES['tImage']['name'];
    $tImageTmpName = $_FILES['tImage']['tmp_name'];
    $extension = pathinfo($tImageName,PATHINFO_EXTENSION);
    $destination = "img/".$tImageName;
    if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "webp" || $extension == "jfif"){
                if(move_uploaded_file($tImageTmpName,$destination)){
                            $query = $pdo->prepare("insert into theater (name, address , image) values(:tName , :taddress, :tImage)");
                            $query->bindParam('tName',$tName);
                            $query->bindParam('taddress',$taddress);
                            $query->bindParam('tImage',$tImageName);
                            $query->execute();
                            echo "<script>alert('theater added successfully');
                            location.assign('viewTheater.php');
                            </script>";

                }
    }
 
    

}
// update Theater
if(isset($_POST['updateTheater'])){
    $tid = $_GET['tid'];
    $tName = $_POST['tName'];
    $taddress = $_POST['taddress'];
    $query = $pdo->prepare("update theater set name = :tName, address= :taddress where id = :tId ");
    if(isset($_FILES['tImage'])){
        $tImageName = $_FILES['tImage']['name'];
        $tImageTmpName = $_FILES['tImage']['tmp_name'];
        $extension = pathinfo($tImageName,PATHINFO_EXTENSION);
        $destination = "img/".$tImageName;
        if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "webp"){
                    if(move_uploaded_file($tImageTmpName,$destination)){
                                $query = $pdo->prepare("update theater set name = :tName , address= :taddress, image = :tImage where id = :tId");
                                $query->bindParam('tImage',$tImageName);
                               
                    }   
        }
    }

                                $query->bindParam('tId',$tid);
                                $query->bindParam('tName',$tName);
                                $query->bindParam('taddress',$taddress);
                                $query->execute();
                                echo "<script>alert('theater updated successfully');
                                location.assign('viewTheater.php');
                                </script>";
}
// end Theater
//DELETE THEATER
if(isset($_GET['id'])){
    $tid=$_GET['id'];
    $query=$pdo->prepare("delete from theater where id=:id");
    $query->bindParam('id',$tid);
    $query->execute();
    echo "<script>alert('delete theater successfully');
    location.assign('viewTheater.php');
    </script>";

}

// end theater

// add cATEGORY
if(isset($_POST['addCategory'])){
    $cName = $_POST['cName'];
    $cDes = $_POST['cDes'];

    $cImageName = $_FILES['cImage']['name'];
    $cImageTmpName = $_FILES['cImage']['tmp_name'];
    $extension = pathinfo($cImageName,PATHINFO_EXTENSION);
    $destination = "img/".$cImageName;
    if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "webp"){
                if(move_uploaded_file($cImageTmpName,$destination)){
                            $query = $pdo->prepare("insert into category (name, des , image) values(:cName , :cDes, :cImage)");
                            $query->bindParam('cName',$cName);
                            $query->bindParam('cDes',$cDes);
                            $query->bindParam('cImage',$cImageName);
                            $query->execute();
                            echo "<script>alert('category added successfully');
                            location.assign('viewCategory.php');
                            </script>";

                }
    }
    // else if

}


// update category


if(isset($_POST['updateCategory'])){
    $id = $_GET['id'];
    $cName = $_POST['cName'];
    $cDes = $_POST['cDes'];
    $query = $pdo->prepare("update category set name = :cName , des = :cDes  where id = :cId ");

    if(isset($_FILES['cImage'])){
        $cImageName = $_FILES['cImage']['name'];
        $cImageTmpName = $_FILES['cImage']['tmp_name'];
        $extension = pathinfo($cImageName,PATHINFO_EXTENSION);
        $destination = "img/".$cImageName;
        if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "webp"){
                    if(move_uploaded_file($cImageTmpName,$destination)){
                                $query = $pdo->prepare("update category set name = :cName , des = :cDes , image = :cImage where id = :cId  ");
                               
                                $query->bindParam('cImage',$cImageName);
                               
                    }   
        }
    }

                                $query->bindParam('cId',$id);
                                $query->bindParam('cName',$cName);
                                $query->bindParam('cDes',$cDes);
                                $query->execute();
                                echo "<script>alert('category updated successfully');
                                location.assign('viewCategory.php');
                                </script>";
}


// add movies
if(isset($_POST['addMovies'])){
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productQty = $_POST['productQty'];
    $productDes = $_POST['productDes'];
    $cId = $_POST['cId'];
    $classId = $_POST['classId'];
    $tId = $_POST['tId'];
    $productImageName = $_FILES['productImage']['name'];
    $productImageTmpName = $_FILES['productImage']['tmp_name'];
    $extension = pathinfo($productImageName,PATHINFO_EXTENSION);
    $destination = "img/".$productImageName;
    if($extension == "jpeg" || $extension == "png" || $extension == "jpg" || $extension == "webp"){
        if(move_uploaded_file($productImageTmpName,$destination)){
            $query  = $pdo->prepare("insert into movies(name , price, des , qty , image , c_id,class_id,t_id) values (:pName , :pPrice, :pDes, :pQty , :pImage , :cId ,:classId, :tId)");
            $query->bindParam('pName',$productName);
            $query->bindParam('pPrice',$productPrice);
            $query->bindParam('pDes',$productDes);
            $query->bindParam('pQty',$productQty);
            $query->bindParam('pImage',$productImageName);
            $query->bindParam('cId',$cId);
            $query->bindParam('classId',$classId);
            $query->bindParam('tId',$tId);
            $query->execute();
            echo "<script>alert('movie added successfully')
            location.assign('viewmovies.php');</script>";
        }
    }
    
}

// update movies
if(isset($_POST['updateMovies'])){
    $id = $_GET['id'];
    $pName = $_POST['pName'];
    $pPrice = $_POST['pPrice'];
    $pQty = $_POST['pQty'];
    $pDes = $_POST['pDes'];
    $cId = $_POST['cId'];
    $query = $pdo->prepare("update product set name = :pName , price = :pPrice,  des = :pDes, qty = :pQty ,c_id = :cId where id = :pId ");

    if(isset($_FILES['pImage'])){
        $pImageName = $_FILES['pImage']['name'];
        $pImageTmpName = $_FILES['pImage']['tmp_name'];
        $extension = pathinfo($pImageName,PATHINFO_EXTENSION);
        $destination = "img/".$pImageName;
        if($extension == "jpg" || $extension == "png" || $extension == "jpeg" || $extension == "webp"){
                    if(move_uploaded_file($pImageTmpName,$destination)){
                                $query = $pdo->prepare("update product set name = :pName , price = :pPrice,  des = :pDes, qty = :pQty , image = :pImage , c_id = :cId where id = :pId");
                               
                                $query->bindParam('pImage',$pImageName);
                               
                    }   
        }
    }

                                $query->bindParam('cId',$cId);
                                $query->bindParam('pName',$pName);
                                $query->bindParam('pDes',$pDes);
                                $query->bindParam('pQty',$pQty);
                                $query->bindParam('pId',$id);
                                $query->bindParam('pPrice',$pPrice);
                            
                                $query->execute();
                                echo "<script>alert('product updated successfully');
                                location.assign('viewProduct.php');
                                </script>";
}
 // delete movies
if(isset($_GET['id'])){
    $mid=$_GET['id'];
    $query=$pdo->prepare("delete from movies where id=:id");
    $query->bindParam('id',$mid);
    $query->execute();
    echo "<script>alert('delete movies successfully');
    location.assign('viewMovies.php');
    </script>";

}

?>
