<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['user_master_id'])) {
?>
    <?php
    if ($_SESSION['role'] == 'employee') {
        if ($_SESSION['is_manager'] == 1) {
            //manager
            $page_title = "Manager";
            $Dashboard = "MANAGER";
            $Dashboard_link = "../manager/manager-dashboard.php";
            //$Department = "DEPARTMENT";
            $My_Evaluation = "My Evaluation";
            $MyEvaluation_link = "../evaluation_form/view_manager_task.php";
            //$Department_link = "../department/create_dept.php";
            //$All_Employee = "ALL EMPLOYEES";
            $My_Team = "MY TEAM";
            //$AllEmployee_link = "allEmployee.php";
            $MyTeam_link = "../manager/manager_myteam.php";
            include "../master/db_conn.php";
            include "../master/pre-header.php";
            include "../master/header.php";
            include "../master/navbar_manager.php";
        } else {
            //employee
            $page_title = "Employee";
            $Dashboard = "Employee";
            $Dashboard_link = "../employee/employee-dashboard.php";
            //$Department = "DEPARTMENT";
            $My_Evaluation = "My Evaluation";
            $MyEvaluation_link = "../evaluation_form/view_employee_task.php";
            //$Department_link = "../department/create_dept.php";
            //$All_Employee = "ALL EMPLOYEES";
            //$My_Team = "MY TEAM";
            //$AllEmployee_link = "allEmployee.php";
            //$MyTeam_link = "../manager/manager_myteam.php";  
            include "../master/db_conn.php";
            include "../master/pre-header.php";
            include "../master/header.php";
            include "../master/navbar_employee.php";
        }
    } else {
        //admin..
        $page_title = "admin";
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
        $Evaluation_link = "../evaluation_form/view_admin_task.php";
        $Evaluation =  "Evaluation";
        include "../master/db_conn.php";
        include "../master/pre-header.php";
        include "../master/header.php";
        include "../master/navbar_admin.php";
    }
    include "../master/breadcrumbs.php";
    include "../master/db_conn.php";
    ?>
    <!-- Main content starts here -->
    <?php
    if (($_SESSION['role'] == 'employee' && $_SESSION['is_manager'] == 1) || ($_SESSION['role'] == 'employee' && $_SESSION['is_manager'] == 0) || ($_SESSION['role'] == 'admin')) { ?>
        <?php
        $form_id = $_GET['vmt_form_id'];
        //echo $form_id;
        $task_id = $_GET['vmt_task_id'];
        $task_title = $_GET['vmt_task_title'];
        $manager_id = $_GET['vmt_manager_id'];
        $for_id = $_GET['vmt_for_id'];
        ?>
        <div class="app">
            <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('assets/images/others/login-3.png')">
                <div class="d-flex flex-column justify-content-between w-100">
                    <div class="container d-flex h-100">
                        <div class="row align-items-center w-100">
                            <div class="col-md-7 col-lg-11 m-h-auto">
                                <div class="card shadow-lg">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between m-b-30">
                                            <img class="img-fluid" alt="" src="assets/images/logo/logo.png">
                                        </div>
                                        <form action="employee_manager_insert.php" method="POST">
                                            <input type='hidden' id='mt_form_id' name='form_id' value='
                                        <?php echo " $form_id";
                                        ?>
                                        '>
                                            <input type='hidden' id='manager_id' name='manager_id' value='
                                        <?php echo "$manager_id";
                                        ?>
                                        '>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                <div class="form-group">
                                                    <input type="date" class="form-control" id="myDate" name="myDate" disabled />
                                                </div>
                                            </div>
                                            <?php if (isset($_GET['error'])) { ?>
                                                <div class="alert alert-danger" role="alert">
                                                    <?= $_GET['error'] ?>
                                                </div>
                                            <?php } ?>
                                            <!-- form-task-start -->
                                            <div class="form-group">
                                                <label class="font-weight-semibold" for="title">Task Title:</label>
                                                <div class="input-affix">
                                                    <select class="form-control" id="title" name="title" disabled>
                                                        <?php
                                                        //$id = $_SESSION['user_master_id'];
                                                        $sql = "SELECT task_id,task_title FROM task_master WHERE task_id='$task_id' AND is_deleted=0 ";
                                                        $result = mysqli_query($conn, $sql);
                                                        while ($row = $result->fetch_assoc()) :
                                                        ?>
                                                            <option value="<?php echo $row['task_id']; ?>"> <?php echo $row['task_title']; ?></option>
                                                        <?php
                                                        endwhile;
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!-- form-task-end -->
                                            <!-- form-evaluation-start -->
                                            <div class="form-group">
                                                <label class="font-weight-semibold" for="desc">Evaluation:</label>
                                                <div class="input-affix">
                                                    <!--<i class="prefix-icon anticon anticon-user"></i>-->
                                                    <input type="text" class="form-control" id="desc" name="desc" placeholder="task_eval" required disabled value="
                                                    <?php
                                                    $query_1 = "SELECT desc_emp from form_master where form_id = '$form_id'";
                                                    $r_1 = mysqli_query($conn, $query_1);
                                                    while ($row_1 = $r_1->fetch_assoc()) :
                                                        echo $row_1['desc_emp'];
                                                    endwhile;
                                                    ?> 
                                                    ">
                                                </div>
                                            </div>
                                            <!-- form-evaluation-end -->


                                            <!-- form-checkbox -start -->
                                            <div class="form-group">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col"><label>parameters</label></th>
                                                            <th scope="col"><label>Min-Rate</label></th>
                                                            <th scope="col"><label>Max-Rate</label></th>
                                                            <th scope="col"><label>Your-Rate</label></th>
                                                        </tr>
                                                    </thead>
                                                    <?php
                                                    $sql = "SELECT para_id,para_title,min_rating,max_rating FROM para_master WHERE is_deleted = 0 ";
                                                    $result = mysqli_query($conn, $sql);
                                                    $query_2 = "SELECT rating_emp FROM form_isto_para WHERE form_id ='$form_id' ";
                                                    $r_2 = mysqli_query($conn, $query_2);
                                                    $para = array(); ?>
                                                    <tbody>
                                                        <?php
                                                        while ($row = $result->fetch_assoc()) : ?>

                                                            <tr>
                                                                <?php

                                                                $id = $row['para_id'];
                                                                ?>
                                                                <td><input type="checkbox" checked disabled name="parameter_<?php echo $row['para_id']; ?>" value="<?php echo $row['para_id']; ?>">
                                                                    <label><?php echo $row['para_title']; ?></label>
                                                                </td>
                                                                <td>
                                                                    <input type="text" disabled maxlength="2" size='3' name=" min_rating" value="<?php echo $row['min_rating']; ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" disabled maxlength="2" size='3' name="max_rating" value="<?php echo $row['max_rating']; ?>">
                                                                </td>
                                                                <td>
                                                                    <input type="text" disabled maxlength="2" size='3' name="rating_
                                                                    <?php echo $row['para_id']; ?>" value="<?php
                                                                                                            $row_2 = $r_2->fetch_assoc();
                                                                                                            echo $row_2['rating_emp']; ?>">
                                                                </td>
                                                            </tr>


                                                        <?php
                                                        endwhile;
                                                        ?>
                                                    </tbody>
                                                </table>


                                            </div>
                                            <!-- form-checkbox end------->
                                            <!----------------------------------------------
                                         form-employee -start 

                                            <div class="form-group">
                                                <label for="exampleFormControlSelect1" for="employee">Employee</label>
                                                <select class="form-control" id="employee" name="employee">
                                                    <option value="" disabled selected hidden>Please Select</option>
                                                    <?php /*
                                                    $id = $_SESSION['user_master_id'];
                                                    $sql = "SELECT user_master_id,name FROM user_master WHERE is_deleted=0 AND manager_id = $id ORDER BY user_master_id ASC ";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = $result->fetch_assoc()) :
                                                    ?>
                                                        <option value="<?php echo $row['user_master_id']; ?>"> <?php echo $row['name']; ?></option>
                                                    <?php
                                                    endwhile;
                                                    */ ?>
                                                </select>
                                            </div>
                                            form-employee -end -->
                                            <!-- form-submit -start -->
                                            <div class="form-group">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <button class="btn btn-primary" name="submit" value='submit' id='submit' disabled>Submit</button>
                                                </div>
                                            </div>
                                            <!-- form-submit -end -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script type="text/javascript">
            function SetDate() {
                var date = new Date();

                var day = date.getDate();
                var month = date.getMonth() + 1;
                var year = date.getFullYear();

                if (month < 10) month = "0" + month;
                if (day < 10) day = "0" + day;

                var today = year + "-" + month + "-" + day;


                document.getElementById('myDate').value = today;
            }
        </script>

        <body onload="SetDate();">

        <?php
    } else {
        header('Location:../login.php');
    }
        ?>

        <!-- Main content end here -->
    <?php
    include "../master/footer.php";
    include "../master/after-footer.php";
} else {
    header('Location:../login.php');
}
    ?>