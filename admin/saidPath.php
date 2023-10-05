<?php
echo '


<div class="sidebar pe-4 pb-3">
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
        <h6><?php echo $_SESSION["admin_name"] ?></h6>
        <a href="adminlogout.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>log Out</a>

        </div>
    </div>
    <div class="navbar-nav w-100">
        <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
        <!-- <a href="admin.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Staff</a> -->
        <a href="user.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Users</a>
        <!--<a href="product.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Live Product</a>--!>
        <a href="add_product.php" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Add New Product</a>
        <a href="order.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>order</a>
        <a href="payment.php" class="nav-item nav-link"><i class="fa fa-table fa-rupee  me-2"></i>Payments</a>
        <a href="order_address.php" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Order Adresss</a>

        <a href="feedback.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>User FeedBacks</a>
        <a href="adminadd.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Admin Staff</a>
        
    </div>
</nav>
</div>





';



?>