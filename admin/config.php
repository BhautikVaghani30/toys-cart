<?php

$con = mysqli_connect("localhost", "root", "", "ecoomerce");
if ($con) {
    echo "connection ok";
} else {

    echo "connect failed";
}
