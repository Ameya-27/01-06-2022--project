<?php 

include "../master/db_conn.php";
if(isset($_POST['update'])){
    $id = $_POST['update_dept_id'];
    $u_d = $_POST['update_dept_name'];
    $query = "UPDATE dept_master SET dept_name ='$u_d'  WHERE dept_id='$id'  ";
        $query_run = mysqli_query($conn, $query);
        if($query_run)
        {
            header("location: create_dept.php?alert=Data Updated");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
}else{
    
}

?>