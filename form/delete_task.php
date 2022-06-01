<?php 

include "../master/db_conn.php";
if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];
    $query = "UPDATE task_master SET is_deleted = 1  WHERE task_id='$id'  ";

    //$query = "DELETE FROM dept_master WHERE dept_id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("refresh:1;view_task.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}


?>