<?php 

include "../master/db_conn.php";
if(isset($_POST['submit_para']))
{
    $para_title = $_POST['para_title'];
    $para_description = $_POST['para_description'];
    $query = "INSERT INTO para_master (para_title,para_description) values ('$para_title','$para_description')";
    $query_run = mysqli_query($conn, $query);
    if($query_run==TRUE){
        //$last_id = mysqli_insert_id($conn);
        //$query1 = "UPDATE dept_master SET create_by_id = '$id' WHERE dept_id = '$last_id' ";
        //$query_run1 = mysqli_query($conn, $query1);
        echo '<script> alert("Data added succesfully");</script>';
        header("refresh:2;view_para.php");
    }else{
        echo '<script> alert("data not added"); </script>';
    }
    }else{
    echo 1;
}
