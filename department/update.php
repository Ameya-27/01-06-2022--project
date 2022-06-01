<?php 

include "../master/db_conn.php";
if(isset($_POST['update'])){
    $id = $_POST['update_dept_id'];
    $u_d = $_POST['update_dept_name'];
    $query = "UPDATE dept_master SET dept_name ='$u_d'  WHERE dept_id='$id'  ";
        $query_run = mysqli_query($conn, $query);
        if($query_run)
        {
            echo $id;
            echo $u_d;
            echo '<script> alert("Data Updated"); </script>';
            header("refresh:3;create_dept.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
}else{
    echo 1;
}

?>