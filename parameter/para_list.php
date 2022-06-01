<?php include "../master/db_conn.php";
    
    $sql = "SELECT para_id,para_title,para_description,min_rating,max_rating FROM para_master where is_deleted = 0 ORDER BY para_id ASC";//where is_delete==0
    $res = mysqli_query($conn, $sql);
?>