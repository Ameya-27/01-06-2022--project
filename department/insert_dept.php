<?php 

include "../master/db_conn.php";
if(isset($_POST['submit']))
{
    $dept_name = $_POST['dept_name'];
    $query = "INSERT INTO dept_master (dept_name) values ('$dept_name')";
    $query_run = mysqli_query($conn, $query);
    if($query_run==TRUE){
        //$last_id = mysqli_insert_id($conn);
        //$query1 = "UPDATE dept_master SET create_by_id = '$id' WHERE dept_id = '$last_id' ";
        //$query_run1 = mysqli_query($conn, $query1);
        echo '<script> alert("Data added");</script>';
        header("refresh:3;create_dept.php");
    }else{
        echo '<script> alert("data ot added"); </script>';
    }
    }else{
    echo 1;
}

