<?php 

include "../master/db_conn.php";
if(isset($_POST['update_para'])){
    $id = $_POST['update_para_id'];
    $u_n = $_POST['update_para_title'];
    $u_d = $_POST['update_para_description'];
    $u_min_r = $_POST['update_para_min_r'];
    $u_max_r = $_POST['update_para_max_r'];
    $query = "UPDATE para_master SET para_title ='$u_n',para_description ='$u_d',min_rating='$u_min_r',max_rating='$u_max_r'  WHERE para_id='$id'  ";
        $query_run = mysqli_query($conn, $query);
        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("refresh:2;view_para.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
}else{
    echo 1;
}

?>