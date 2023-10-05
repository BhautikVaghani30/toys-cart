<?php
session_start();
if (!isset($_SESSION['admin_id'])) {

    header("location: http://localhost/toys-cart/admin/loginadmin.php");
}
$con = mysqli_connect("localhost", "root", "", "ecoomerce");
if ($con) {
    // echo"sucess";

} else {
    echo "error" . mysqli_connect_error();
}

$q = "select * from `order`";
$rq = mysqli_query($con, $q);

$row = mysqli_fetch_assoc($rq);
// ksort($row);
// var_dump($row);

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
            <!-- Navbar End -->
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">


                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4"> Current Order </h6>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <?php
                                            foreach ($row as $key => $value) {



                                            ?>
                                                <th scope="col"><?php echo $key; ?></th>

                                            <?php
                                            }

                                            ?>
                                            <th>Update</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // print_r(mysqli_num_rows($rq));
                                        if (mysqli_num_rows($rq) > 0) {
                                            while ($row = mysqli_fetch_assoc($rq)) {
                                                // print_r($row);

                                        ?>
                                                <tr>
                                                    <td scope="row"><?= $row['order_id'] ?></td>
                                                    <td scope="row"><?= $row['user_id'] ?></td>
                                                    <td scope="row"><?= $row['product_id'] ?></td>
                                                    <td scope="row"><?= $row['item_name'] ?></td>
                                                    <td><img src="storeimages/<?= $row['picture'] ?>" width="60px" alt="this is images"></td>

                                                    <td>₹<?= $row['amount'] ?></td>
                                                    <td>₹<?= $row['total_amount'] ?></td>
                                                    <td scope="row"><?= $row['created_at'] ?></td>

                                                    <td scope="row"><?= $row['que'] ?></td>
                                                    <td>
                                                        <form action="order.php" method="post">

                                                            <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                                            <select name="update_payment">
                                                                <option value="" selected disabled><?php echo $row['order_status']; ?></option>
                                                                <option value="Pending">Pending</option>
                                                                <option value="Confirm">Confirm</option>
                                                            </select>
                                                            <!-- </form> -->
                                                    </td>
                                                    <td>
                                                        <!-- <form action="order.php" method="post"> -->

                                                        <input type="submit" value="update" name="update_order" class="btn btn-primary">
                                                        </form>

                                                    </td>

                                                </tr>
                                        <?php
                                            }
                                        }

                                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                            // Check if the dropdown list value is set
                                            if (isset($_POST["update_payment"])) {
                                                $selectedValue = $_POST["update_payment"];
                                                $oid = $_POST['order_id'];

                                                $sql = "UPDATE `order` SET `order_status`='$selectedValue' WHERE order_id='$oid'";
                                                $result = mysqli_query($con, $sql);
                                                if ($result) {
                                                    echo "order id : " . $oid . " Updated";
                                                } else {
                                                    echo "somthing whats wrong";
                                                }
                                            } else {
                                                echo "Please select a value from the dropdown list.";
                                            }
                                        }



                                        ?>



                                    </tbody>
                                </table>
                            </div>
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