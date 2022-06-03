<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['user_master_id'])) {
    $page_title = "admin_team";
    $Dashboard = "ADMIN";
    $Department = "DEPARTMENT";
    $Employee = "EMPLOYEE";
    $Dashboard_link = "../admin/admin-dashboard.php";
    $Department_link = "../department/create_dept.php";
    $All_Employee = "ALL EMPLOYEES";
    $My_Team = "MY TEAM";
    $AllEmployee_link = "../admin/allEmployee.php";
    $MyTeam_link = "../admin/admin_myteam.php";
    $Parameter = "PARAMETER";
    $Parameter_link = "../parameter/view_para.php";
    $Evaluation_link = "view_admin_task.php";
    $Evaluation =  "Evaluation";
    include "../master/db_conn.php";
    include "../master/pre-header.php";
    include "../master/close_header.php";
?>

    <?php
    include "../master/header.php";
    include "../master/navbar_admin.php";
    include "../master/breadcrumbs.php";
    ?>
    <!-- main content starts here -->
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('assets/images/others/login-3.png')">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-10 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="container d-flex align-items-center" style="min-height: 30vh">
                                        <div class="p-3">
                                            <?php $id = $_SESSION['user_master_id'];
                                            /*$query = "SELECT form_master.form_id,form_master.task_id,form_master.manager_id,form_master.for_id,task_master.task_title FROM form_master INNER JOIN task_master on form_master.task_id=task_master.task_id WHERE form_master.is_deleted=0 AND task_master.is_deleted=0 AND form_master.is_submit=0"; //where is_delete==0
        $result = mysqli_query($conn, $query);*/

                                            $query_1 = "SELECT form_master.form_id,form_master.task_id,form_master.manager_id,form_master.for_id,task_master.task_title FROM form_master INNER JOIN task_master on form_master.task_id=task_master.task_id WHERE form_master.is_deleted=0 AND task_master.is_deleted=0 AND form_master.is_submit=1"; //where is_delete==0
                                            $result_1 = mysqli_query($conn, $query_1);
                                            if (mysqli_num_rows($result_1) > 0) { ?>

                                                <h2 class="display-4 fs-1">Tasks</h2>
                                                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
                                                <table id="table" class="table-success table-bordered" style="width: 45rem;">
                                                    <thead>
                                                        <tr>
                                                            <th scope = "col">Sr.No.</th>
                                                            <th scope="col" style="display:none">Form Id</th>
                                                            <th scope="col" style="display:none">Task Id</th>
                                                            <th scope="col">Task Title</th>
                                                            <th scope="col" style="display:none">Manager Id</th>                                                       
                                                            <th scope="col" style="display:none">For Id</th>
                                                            <th scope="col">Employee Name</th>
                                                            <th scope="col">Manager Name</th>
                                                            <th scope="col">Evaluations</th>
                                                            <!--<th scope="col">Manager Evaluations</th>-->
                                                            <!--<th scope="col">Employee Evaluations</th>-->
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php /*
                    $i = 1;
                    while ($rows = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?= $rows['form_id'] ?></td>
                            <td><?= $rows['task_id'] ?></td>
                            <td><?= $rows['task_title'] ?></td>
                            <td style="display:none"><?= $rows['manager_id'] ?></td>
                            <td style="display:none"><?= $rows['for_id'] ?></td>
                            <td>
                                <a class="btn btn-success evalbtn" href="../task/manager_task.php?vmt_form_id=<?php echo $rows['form_id']; ?> &vmt_task_id=<?php echo $rows['task_id'] ?> &vmt_task_title=<?php echo $rows['task_title'] ?> &vmt_manager_id=<?php echo $rows['manager_id'] ?> &vmt_for_id=<?php echo $rows['for_id'] ?>">Evaluate</a>
                            </td>
                        </tr>
                    <?php $i++;
                    }
                    */ ?>
                                                        <!-- Previous record start -->
                                                        <?php
                                                        $i_1 = 1;
                                                        while ($rows_1 = mysqli_fetch_assoc($result_1)) { ?>
                                                        <?php
                                                        $emp_id = $rows_1['for_id'];
                                                        $mang_id = $rows_1['manager_id'];
                                                        $query_2 ="SELECT name from user_master WHERE user_master_id=$emp_id AND is_deleted=0";
                                                        $result_2 = mysqli_query($conn,$query_2);
                                                        $rows_2 = mysqli_fetch_assoc($result_2);
                                                        $query_3= "SELECT name from user_master WHERE user_master_id=$mang_id AND is_deleted=0";
                                                        $result_3= mysqli_query($conn,$query_3);
                                                        $rows_3= mysqli_fetch_assoc($result_3);
                                                        ?>
                                                            <tr><td><?= $i_1 ?></td>
                                                                <td style="display: none"><?= $rows_1['form_id'] ?></td>
                                                                <td style="display:none"><?= $rows_1['task_id'] ?></td>
                                                                <td><?= $rows_1['task_title'] ?></td>
                                                                <td style="display:none"><?= $rows_1['manager_id'] ?></td>
                                                                <td style="display:none"><?= $rows_1['for_id'] ?></td>
                                                                <td> <?= $rows_2['name'] ?> </td>
                                                                <td> <?= $rows_3['name'] ?> </td>
                                                                <td>
                                                                    <!--<a class="btn btn-success evalbtn" href="../task/disabled_manager_view.php?vmt_form_id=<?php // echo $rows_1['form_id']; ?> &vmt_task_id=<?php //echo $rows_1['task_id'] ?> &vmt_task_title=<?php //echo $rows_1['task_title'] ?> &vmt_manager_id=<?php //echo $rows_1['manager_id'] ?> &vmt_for_id=<?php //echo $rows_1['for_id'] ?>">View_manager</a>
                                                                
                                                                    <a class="btn btn-success evalbtn" href="../task/disabled_view.php?vmt_form_id=<?php //echo $rows_1['form_id']; ?> &vmt_task_id=<?php //echo $rows_1['task_id'] ?> &vmt_task_title=<?php //echo $rows_1['task_title'] ?> &vmt_manager_id=<?php //echo $rows_1['manager_id'] ?> &vmt_for_id=<?php //echo $rows_1['for_id'] ?>">View_emp</a> -->

                                                                    <a class="btn btn-success evalbtn" href="../task/dis_eva_task.php?vmt_form_id=<?php echo $rows_1['form_id']; ?> &vmt_task_id=<?php echo $rows_1['task_id'] ?> &vmt_task_title=<?php echo $rows_1['task_title'] ?> &vmt_manager_id=<?php echo $rows_1['manager_id'] ?> &vmt_for_id=<?php echo $rows_1['for_id'] ?>">View</a>
                                                                </td>
                                                            </tr>
                                                        <?php $i_1++;
                                                        }
                                                        ?>
                                                        <!-- Previous record end -->
                                                    </tbody>
                                                </table>
                                                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                                                <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
                                                <script>
                                                    jQuery(document).ready(function($) {
                                                        $('#table').DataTable();
                                                    });
                                                </script>
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

    <!-- main content ends here -->
<?php

    include "../master/footer.php";
    include "../master/after-footer.php";
} else {
    header("Location:../login.php");
}
