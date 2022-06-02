<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['user_master_id'])) {
    $page_title = "admin_team";
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
    include "../master/close_header.php";
    include "../master/header.php";
    include "../master/navbar_admin.php";
    include "../master/breadcrumbs.php";
?>
    <?php
    $id = $_SESSION['user_master_id'];
    $sql = "SELECT * FROM user_master where is_deleted = 0 AND manager_id = '$id' ORDER BY user_master_id ASC"; //where is_delete==0
    $res = mysqli_query($conn, $sql);
    ?>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('assets/images/others/login-3.png')">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-10 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="container d-flex  align-items-center" style="min-height: 30vh">
                                        <div class="p-3">
                                            <?php
                                            $id = $_SESSION['user_master_id'];
                                            $sql = "SELECT * FROM user_master where is_deleted = 0 AND manager_id = '$id' ORDER BY user_master_id ASC"; //where is_delete==0
                                            $res = mysqli_query($conn, $sql);
                                            if (mysqli_num_rows($res) > 0) { ?>

                                                <h4 class="display-4 fs-1">Members</h4>
                                                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
                                                <table id="table" class="table-danger table-bordered" style="width: 45rem;">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Sr. No.</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">User name</th>
                                                            <th scope="col">Role</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $i = 1;
                                                        while ($rows = mysqli_fetch_assoc($res)) { ?>
                                                            <tr>

                                                                <td><?= $i ?></td>
                                                                <td><?= $rows['name'] ?></td>
                                                                <td><?= $rows['email'] ?></td>
                                                                <td><?= $rows['role'] ?></td>
                                                                <td>
                                                                    <a class="btn btn-success evalbtn" href="../evaluation_form/create.php?Id=<?php echo $rows['user_master_id']; ?>">Evaluate</a>
                                                                </td>
                                                            </tr>
                                                        <?php $i++;
                                                        } ?>
                                                    </tbody>
                                                </table>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('#table').DataTable();
        });
    </script>

<?php
    // content end
    include "../master/footer.php";
    include "../master/after-footer.php";
} else {
    header('Location:../login.php');
}
?>