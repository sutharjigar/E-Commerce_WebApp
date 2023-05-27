<?php

    $con =mysqli_connect('localhost','root','','mystore1');

    if(!$con){
         die(mysqli_error($con));
    }

?>