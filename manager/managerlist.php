<?php 
if (isset($_SESSION['username']) && isset($_SESSION['user_master_id'])){
//include "../master/db_conn.php";
$query = "SELECT user_master.user_master_id, user_master.name,user_master.email, user_master.dept_id, dept_master.dept_name FROM user_master INNER JOIN dept_master ON user_master.dept_id = dept_master.dept_id where user_master.is_manager = 1 AND user_master.is_deleted = 0 ORDER BY user_master.user_master_id;";
$result = mysqli_query($conn, $query);
}else{
	header("Location: ../login.php");
}
?>