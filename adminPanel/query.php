<?php
include('dbcon.php');
session_start();



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


// add Product
if(isset($_POST['addProduct'])){
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    $productQty = $_POST['productQty'];
    $productDes = $_POST['productDes'];
    $cId = $_POST['cId'];
    $productImageName = $_FILES['productImage']['name'];
    $productImageTmpName = $_FILES['productImage']['tmp_name'];
    $extension = pathinfo($productImageName,PATHINFO_EXTENSION);
    $destination = "img/".$productImageName;
    if($extension == "jpeg" || $extension == "png" || $extension == "jpg" || $extension == "webp"){
        if(move_uploaded_file($productImageTmpName,$destination)){
            $query  = $pdo->prepare("insert into product (name , price, des , qty , image , c_id) values (:pName , :pPrice, :pDes, :pQty , :pImage , :cId)");
            $query->bindParam('pName',$productName);
            $query->bindParam('pPrice',$productPrice);
            $query->bindParam('pDes',$productDes);
            $query->bindParam('pQty',$productQty);
            $query->bindParam('pImage',$productImageName);
            $query->bindParam('cId',$cId);
            $query->execute();
            echo "<script>alert('product added successfully')</script>";
        }
    }
    
}

// update product
if(isset($_POST['updateProduct'])){
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


?>