<?php

$con = mysqli_connect("localhost", "root", "", "ecoomerce");
if ($con) {
    echo "sucess";
} else {
    echo "error" . mysqli_connect_error();
}
