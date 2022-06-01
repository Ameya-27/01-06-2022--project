<?php
session_start();
$page_title = "admin";
include "../master/db_conn.php";
include "../master/pre-header.php";
include "../master/header.php";
include "../master/navbar.php";

?>
<html>

<body>
	<div class="side-nav">
		<div class="side-nav-inner">
			<ul class="side-nav-menu scrollable">
				<li class="nav-item dropdown">
					<a href="admin-dashboard.php">
						<span class="icon-holder">

						</span>
						<span class="title">DASHBOARD</span>
					</a>
					<a href="../department/create_dept.php">
						<span class="icon-holder">

						</span>
						<span class="title">DEPEARTMENT</span>
					</a>
				</li>
				<li class="nav-item dropdown">
					<a class="dropdown-toggle" href="javascript:void(0);">
						<span class="icon-holder">
							<i class="anticon anticon-pie-chart"></i>
						</span>
						<span class="title">EMPLOYEE</span>
						<span class="arrow">
							<i class="arrow-icon"></i>
						</span>
					</a>
					<ul class="dropdown-menu">
						<li>
							<a href="admin_myteam.php">MYTEAM</a>
						</li>
						<li>
							<a href="allEmployee.php">ALL EMPLOYEE</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>

</body>



</html>
<?php
include "../master/breadcrumbs.php";
?>
<html>

<body>
	<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
		<!-- For Admin -->
		<div class="card" style="width: 18rem;">
			<img src="../assets/images/others/admin-default.png" class="card-img-top" alt="admin image">
			<div class="card-body text-center">
				<h5 class="card-title">
					<?= $_SESSION['name'] ?>
				</h5>
				<a href="../logout.php" class="btn btn-dark">Logout</a>
			</div>

		</div>
		<!--

		<div class="p-3">
			<?php include '../master/members.php';
			if (mysqli_num_rows($res) > 0) { ?>

				<h1 class="display-4 fs-1">Members</h1>
				<table class="table" style="width: 32rem;">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">User name</th>
							<th scope="col">Role</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						while ($rows = mysqli_fetch_assoc($res)) { ?>
							<tr>
								<th scope="row"><?= $i ?></th>
								<td><?= $rows['name'] ?></td>
								<td><?= $rows['email'] ?></td>
								<td><?= $rows['role'] ?></td>
							</tr>
						<?php $i++;
						} ?>
					</tbody>
				</table>
			<?php } ?>
		</div>
					-->


	</div>
</body>

</html>
<?php
// content end
include "../master/footer.php";
include "../master/after-footer.php";
?>