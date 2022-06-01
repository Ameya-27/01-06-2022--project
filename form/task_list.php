<?php include "../master/db_conn.php";
    
    $sql = "SELECT task_id,task_title,task_description FROM task_master where is_deleted = 0 ORDER BY task_id ASC";//where is_delete==0
    $res = mysqli_query($conn, $sql);
?>