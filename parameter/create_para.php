<?php
$page_title = "parameter";
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
$Parameter_link = "view_para.php";
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
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#paraModal">
        ADD PARAMETER
    </button>
</div>

<!-- ################################################ para form start #####################################################################-->
<div class="modal fade" id="paraModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="insert_para.php" method='post'>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="font-weight-semibold" for="para_title">Parameter Title:</label>
                        <div class="input-affix">
                            <i class="prefix-icon anticon anticon-user"></i>
                            <input type="text" class="form-control" id="para_title" name="para_title" placeholder="para_title">
                        </div>
                        <label class="font-weight-semibold" for="para_description">Parameter Description:</label>
                        <div class="input-affix">
                            <i class="prefix-icon anticon anticon-user"></i>
                            <input type="text" class="form-control" id="para_description" name="para_description" placeholder="para_description">
                        </div>
                        <label class="font-weight-semibold" for="para_min_r">Parameter Min Rate:</label>
                        <div class="input-affix">
                            <i class="prefix-icon anticon anticon-user"></i>
                            <input type="text" class="form-control" id="para_min_r" name="para_min_r" placeholder="para_min_r">
                        </div>
                        <label class="font-weight-semibold" for="para_max_r">Parameter Max Rate:</label>
                        <div class="input-affix">
                            <i class="prefix-icon anticon anticon-user"></i>
                            <input type="text" class="form-control" id="para_max_r" name="para_max_r" placeholder="para_max_r">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit_para" value="submit_para">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ################################################ para form end #######################################################################-->
<!--<form action="/action_page.php">
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
</form>-->
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