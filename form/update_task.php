<?php 

include "../master/db_conn.php";
if(isset($_POST['update'])){
    $id = $_POST['update_task_id'];
    $u_n = $_POST['update_task_name'];
    $u_d = $_POST['update_task_desc'];
    $query = "UPDATE task_master SET task_title ='$u_n',task_description ='$u_d'  WHERE task_id='$id'  ";
        $query_run = mysqli_query($conn, $query);
        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("refresh:3;view_task.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
}else{
    echo 1;
}

?>