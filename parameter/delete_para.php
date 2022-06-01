<?php 

include "../master/db_conn.php";
if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];
    $query = "UPDATE para_master SET is_deleted = 1  WHERE para_id='$id'  ";

    //$query = "DELETE FROM dept_master WHERE dept_id='$id'";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        echo '<script> alert("Data Deleted"); </script>';
        header("refresh:1;view_para.php");
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}


?>