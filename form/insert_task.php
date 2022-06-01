<?php 

include "../master/db_conn.php";
if(isset($_POST['submit_task']))
{
    $task_name = $_POST['task_name'];
    $task_desc = $_POST['task_desc'];
    $query = "INSERT INTO task_master (task_title,task_description) values ('$task_name','$task_desc')";
    $query_run = mysqli_query($conn, $query);
    if($query_run==TRUE){
        //$last_id = mysqli_insert_id($conn);
        //$query1 = "UPDATE dept_master SET create_by_id = '$id' WHERE dept_id = '$last_id' ";
        //$query_run1 = mysqli_query($conn, $query1);
        echo '<script> alert("Data added");</script>';
        header("refresh:3;view_task.php");
    }else{
        echo '<script> alert("data ot added"); </script>';
    }
    }else{
    echo 1;
}
