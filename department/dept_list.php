<?php
 
if (isset($_SESSION['username']) && isset($_SESSION['user_master_id'])){
include "../master/db_conn.php";
    
    $sql = "SELECT dept_id,dept_name FROM dept_master where is_deleted = 0 ORDER BY dept_id ASC";//where is_delete==0
    $res = mysqli_query($conn, $sql);
}else{
    header("Location:../login.php");
}    
   
