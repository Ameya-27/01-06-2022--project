<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['user_master_id'])) {
	$page_title = "admin";
	$Dashboard = "ADMIN";
	$Department = "DEPARTMENT";
	$Employee = "EMPLOYEE";
	$Dashboard_link = "admin-dashboard.php";
	$Department_link = "../department/create_dept.php";
	$All_Employee = "ALL EMPLOYEES";
	$My_Team = "MY TEAM";
	$AllEmployee_link = "allEmployee.php";
	$MyTeam_link = "admin_myteam.php";
	$Parameter = "PARAMETER";
	$Parameter_link = "../parameter/view_para.php";
	$Evaluation_link = "../evaluation_form/view_admin_task.php";
	$Evaluation =  "Evaluation";
	include "../master/db_conn.php";
	include "../master/pre-header.php";
	include "../master/header.php";
	include "../master/navbar_admin.php";
	include "../master/breadcrumbs.php";
?>

	<body>
		<html>
		<div class="container d-flex justify-content-center align-items-center" style="min-height: 30vh">
			<div class="card" style="width: 18rem;">
				<img src="../assets/images/others/admin-default.png" class="card-img-top" alt="admin image">
				<div class="card-body text-center">
					<h5 class="card-title">
						<?= $_SESSION['name'] ?>
					</h5>
					<a href="../logout.php" class="btn btn-dark">Logout</a>
				</div>
			</div>
		</div>

		</html>

	</body>

	<?php
	include "../master/footer.php";
	include "../master/after-footer.php";
	?>
<?php } else {
	header("Location:../login.php");
} ?>