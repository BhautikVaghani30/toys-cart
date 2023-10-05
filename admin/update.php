<?php
$con = mysqli_connect("localhost", "root", "", "ecoomerce");
if ($con) {
    // echo"sucess";

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        .div {
            width: 100%;
            background: #ffc107;
            color: white;

        }
    </style>
</head>

<body>
    <div class="div">
        <center>
            <h1>Update Hear...</h1>
        </center>
    </div>

    <?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "select * from `product` where `prod_id` = '$id'";
        $result = mysqli_query($con, $sql);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
    ?>



            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Update Current Product</h6>
                    <form action="http://localhost/toys-cart/admin/update.php?id_new=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
                        <div class=" mb-2">
                            <label for="pimage" class=" col-sm-2 col-form-label">Product Picture</label>
                            <input class="form-control " name="pimage" id="pimage" type="file" value="<?php echo $row['picture']; ?>">
                        </div>
                        <div class="row mb-3">
                            <label for="pname" class="col-sm-2 col-form-label">Product Name</label>
                            <div class="col-sm-10">
                                <input type="text" name="pname" class="form-control" id="pname" value="<?php echo $row['item']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="pdesc" class="col-sm-2 col-form-label">Product Description</label>
                            <div class="col-sm-10">
                                <input type="text" name="pdesc" class="form-control" id="pdesc" value="<?php echo $row['desc']; ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="price" class="col-sm-2 col-form-label">Product Price</label>
                            <div class="col-sm-10">
                                <input type="number" name="price" class="form-control" id="price" value="<?php echo $row['price']; ?>">
                            </div>
                        </div>

                        <input type="submit" value="submit" name="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
            </div>
    <?php
        }
    }


    ?>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    if (isset($_GET['id_new'])) {
        $idnew = $_GET['id_new'];
    }

    $uploadDir = "storeimages/"; // Directory where uploaded files will be saved
    $uploadedFile = $uploadDir . basename($_FILES['pimage']['name']); // Full path to the uploaded file
    move_uploaded_file($_FILES['pimage']['tmp_name'], $uploadedFile);

    $image = $_FILES['pimage']['name'];
    $pname = $_POST['pname'];
    $pdesc = $_POST['pdesc'];
    $price = $_POST['price'];


    $sql = "UPDATE `product` SET `item`='$pname',`desc`='$pdesc',`price`='$price',`picture`='$image' WHERE prod_id='$idnew'";
    $result = mysqli_query($con, $sql);
    if (!$result) {
        echo mysqli_error($con);
    } else {
        header('location:index.php');
    }
}

?>