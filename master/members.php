<?php  
//include "db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['user_master_id'])) {
    
    $sql = "SELECT user_master.user_master_id,user_master.email,user_master.name,user_master.role,user_master.is_manager,user_master.manager_id,dept_master.dept_id,dept_master.dept_name FROM user_master INNER JOIN dept_master ON user_master.dept_id = dept_master.dept_id WHERE user_master.is_deleted = 0 ORDER BY user_master.user_master_id ASC";//where is_delete==0
    $res = mysqli_query($conn, $sql);
}else{
	header("Location: ../login.php");
}