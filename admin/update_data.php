<?php
//making a connection to our database
include "../master/db_conn.php";
if (isset($_POST['update'])) {
    $id = $_POST['update_id'];
    $username = $_POST['email'];
    $role = $_POST['role'];
    $name = $_POST['name'];

    $sql = "UPDATE `user_master` SET `email` = '$username', `name` = '$name', `role` = '$role' WHERE `user_master_id` = '$id'";
    $result = $conn->query($sql);

    if($result) {
        echo "Record updated successfully";
        header("refresh:2;allEmployee.php");
        } 
        else {
        echo "Error:". $sql . "<br>" . $conn->error;
        }
}
