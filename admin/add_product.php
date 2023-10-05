<?php
session_start();
if (!isset($_SESSION['admin_id'])) {

    header("location: http://localhost/toys-cart/admin/loginadmin.php");
}
$con = mysqli_connect("localhost", "root", "", "ecoomerce");
if (!$con) {
    die("connection failed");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Admin -OM Toys</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <!-- <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-warning">OM TOYS-ADMIN</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/AVATAR.png" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0"><?php echo $_SESSION['admin_name']; ?></h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <!-- <a href="admin.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Staff</a> -->
        <a href="user.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Users</a>
        <a href="product.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Live Product</a>
        <a href="add_product.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Add New Product</a>
        <a href="order.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>order</a>
        <a href="adminadd.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Add New Staff</a>

        <a href="adminlogout.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>log Out</a>
    </div>
    </nav>
    </div> -->
    <?php
    require 'saidPath.php';
    ?>
    <!-- Sidebar End -->


    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
            <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
            </a>


            <div class="navbar-nav align-items-center ms-auto">



                <div class="nav-item ">
                    <a href="#" class="nav-link ">
                        <img class="rounded-circle me-lg-2" src="img/AVATAR.png" alt="" style="width: 40px; height: 40px;">
                        <span class="d-none d-lg-inline-flex"><?php echo $_SESSION['admin_name']; ?></span>
                    </a>

                </div>
            </div>
        </nav>
        <!-- Table Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">


                <div class="col-sm-12 col-xl-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Add New Product</h6>
                        <form action="http://localhost/toys-cart/admin/add_product.php" method="POST" enctype="multipart/form-data">
                            <div>
                                <label for="pimage" class="form-label">Product Picture</label>
                                <input class="form-control " name="pimage" id="pimage" type="file">
                            </div>
                            <div class="row mb-3">
                                <label for="pname" class="col-sm-2 col-form-label">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="pname" class="form-control" id="pname">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="pdesc" class="col-sm-2 col-form-label">Product Description</label>
                                <div class="col-sm-10">
                                    <input type="text" name="pdesc" class="form-control" id="pdesc">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="price" class="col-sm-2 col-form-label">Product Price</label>
                                <div class="col-sm-10">
                                    <input type="number" name="price" class="form-control" id="price">
                                </div>
                            </div>

                            <input type="submit" value="submit" name="submit" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>

            <!-- Footer End -->

        </div>
        <!-- Sale & Revenue End -->






    </div>
    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>

</body>

</html>
<?php

if (isset($_POST['submit'])) {

    $uploadDir = "storeimages/"; // Directory where uploaded files will be saved
    $uploadedFile = $uploadDir . basename($_FILES['pimage']['name']); // Full path to the uploaded file
    move_uploaded_file($_FILES['pimage']['tmp_name'], $uploadedFile);

    $image = $_FILES['pimage']['name'];
    $pname = $_POST['pname'];
    $pdesc = $_POST['pdesc'];
    $price = $_POST['price'];

    if ($image && $pname && $pdesc && $price) {
        $sql = "insert into product (`picture`,`item`,`desc`,`price`) values ('" . $image . "','" . $pname . "','" . $pdesc . "','" . $price . "')";
        // echo $sql;
        // die;
        $result = mysqli_query($con, $sql);
        if (!$result) {
            echo mysqli_error($con);
        } else {
            echo "sucessfully inserted";
        }
    } else {
        echo "enter valid data";
    }
}
?>