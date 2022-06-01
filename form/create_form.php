<?php
$page_title = "allemployee";
$Dashboard = "ADMIN";
$Department = "DEPARTMENT";
$Employee = "EMPLOYEE";
$Dashboard_link = "../admin/admin-dashboard.php";
$Department_link = "../department/create_dept.php";
$All_Employee = "ALL EMPLOYEES";
$My_Team = "MY TEAM";
$AllEmployee_link = "../admin/allEmployee.php";
$MyTeam_link = "../admin/admin_myteam.php";
include "../master/db_conn.php";
include "../master/pre-header.php";
?>
<?php
include "../master/close_header.php";
?>


<?php
include "../master/close_header.php";
include "../master/header.php";
include "../master/navbar_admin.php";
include "../master/breadcrumbs.php";
?>


<!-- Button trigger modal for task -->
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#taskModal">
        ADD TASK
    </button>
</div>

<!-- ################################################ task form start #####################################################################-->
<div class="modal fade" id="taskModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="insert_task.php" method='post'>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="font-weight-semibold" for="task_name">Task Name:</label>
                        <div class="input-affix">
                            <i class="prefix-icon anticon anticon-user"></i>
                            <input type="text" class="form-control" id="task_name" name="task_name" placeholder="task_name">
                        </div>
                        <label class="font-weight-semibold" for="task_desc">Task Description:</label>
                        <div class="input-affix">
                            <i class="prefix-icon anticon anticon-user"></i>
                            <input type="text" class="form-control" id="task_desc" name="task_desc" placeholder="task_desc">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit_task" value="submit_task">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ################################################ task form end #######################################################################-->
<form action="/action_page.php">
    <div class="mb-3 mt-3">
        <label for="email" class="form-label">Date:</label>
        <input type="date" id="myDate" />
    </div>
    <div class="mb-3 mt-3">
        <label for="e" class="form-label">TASK:</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="mb-3">
        <label for="pwd" class="form-label">DESCRIPTION:</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
    </div>
    <div class="form-check mb-3">
        <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember"> Remember me
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!-- ################################################ task form start #########################################################################-->









<input type="date" id="myDate" />
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
    include "../master/footer.php";
    include "../master/after-footer.php";
    ?>