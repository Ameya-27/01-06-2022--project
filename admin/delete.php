<?php 
include "../master/db_conn.php";
if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];
    $query = "UPDATE user_master SET is_deleted = 1  WHERE user_master_id='$id'  ";

    //$query = "DELETE FROM dept_master WHERE dept_id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("refresh:1;allEmployee.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}else{
    echo 1;
}


?>