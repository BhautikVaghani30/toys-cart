<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <link href="./admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="./admin/css/style.css" rel="stylesheet">
</head>

<body>

    <div class="container-xxl position-relative bg-warning d-flex p-0">

        <?php

        $con = mysqli_connect("localhost", "root", "", "ecoomerce");
        if ($con) {
            //echo "sucess";

        } else {
            echo "error" . mysqli_connect_error();
        }

        session_start();
        if (!isset($_SESSION['user_id'])) {

            header("location: http://localhost/toys-cart/login.php");
        }
        if (isset($_POST['submit'])) {


            $uname = $_POST['name'];
            $email = $_POST['email'];
            $feedback = $_POST['feedback'];


            $sql = "INSERT INTO `feedbacks`( `username`, `email`, `F_desc`) VALUES ('.$uname.','.$email.','.$feedback.')";

            $result = mysqli_query($con, $sql);
            if (!$result) {
                echo mysqli_error($con);
            } else {
                // echo "Thank You For Your Feedback";
                header("location:home.php");
            }
        }

        ?>

        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3 shadow-lg p-3 mb-5 bg-body rounded" style="border:1px solid white;border-radius:30px;">
                        <div class="d-flex align-items-center justify-content-between mb-3" style="border-bottom: 2px solid orange;">
                            <a href="index.html" class="">
                                <h3 class="text-dark">OM TOYS</h3>
                            </a>
                            <h3 class="text-dark">Feedback</h3>
                        </div>
                        <form action="feedback.php" method="POST" autocomplete="off" onsubmit="return validateForm();">
                            <div class="form-floating mb-3">

                                <input type="text" class="form-control" id="name" name="name" placeholder="enter user name">
                                <label for="name">Username</label>
                                <span id="nameErr" style="color:red;"></span>

                            </div>
                            <div class="form-floating mb-3">

                                <input type="email" class="form-control" id="email" name="email" placeholder="enter email address">
                                <label for="email">Email address</label>
                                <span id="emailErr" style="color:red;"></span>

                            </div>
                            <div class="form-floating mb-3">

                                <textarea id="feedback" class="form-control" name="feedback" rows="4" cols="92" placeholder="Enter Your Feedback"></textarea>
                                <label for="email" class="form-lable">FeedBack Hear...</label>
                                <span id="feedbackErr" style="color:red;"></span>

                            </div>


                            <input type="submit" style="background-color:white; border:2px solid orange;" value="Submit" name="submit" class="btn btn-light py-3 w-100 mb-4">

                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script>
        function validateForm() {
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            var feedback = document.getElementById("feedback").value;


            document.getElementById("nameErr").textContent = "";
            document.getElementById("emailErr").textContent = "";
            document.getElementById("feedbackErr").textContent = "";

            if (name === "") {
                document.getElementById("nameErr").textContent = "Please enter a username.";
                return false;
            }


            if (email === "" || email.indexOf("@") === -1 || email.indexOf(".") === -1) {
                document.getElementById("emailErr").textContent = "Please enter a valid email address.";
                return false;
            }
            if (feedback === "") {
                document.getElementById("feedbackErr").textContent = "Please enter a Feedback.";
                return false;
            }


            return true;
        }
    </script>




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