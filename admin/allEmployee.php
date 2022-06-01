<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['user_master_id'])) {
    $page_title = "allemployee";
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
    include "../master/db_conn.php";
    include "../master/pre-header.php";
    include "../master/close_header.php";
    include "../master/header.php";
    include "../master/navbar_admin.php";
    include "../master/breadcrumbs.php";
    ?>
    <!--<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">-->
    <div class="container d-flex align-items-center" style="min-height: 30vh">
        <div class="p-3">
            <?php include '../master/members.php';
            if (mysqli_num_rows($res) > 0) { ?>

                <h1 class="display-4 fs-1">Members</h1>
                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary" href="../create.php">Add new</a>
                </div>

                <table id="table" class="table table-xl" style="width: 40rem;" data-show-toggle="false">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">User name</th>
                            <th scope="col">Role</th>
                            <th scope="col" style="display:none">Is_Manager</th>
                            <th scope="col" style="display:none">Manager ID</th>
                            <th scope="col">Manager Name</th>
                            <th scope="col" style="display:none">Department id</th>
                            <th scope="col">Department Name</th>
                            <th scope="col">Action</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($rows = mysqli_fetch_assoc($res)) {
                            $manager_id = $rows['manager_id'];
                        ?>
                            <tr>
                                <td scope="row"><?= $rows['user_master_id'] ?></td>
                                <td><?= $rows['name'] ?></td>
                                <td><?= $rows['email'] ?></td>
                                <td><?= $rows['role'] ?></td>
                                <td style="display:none"><?= $rows['is_manager'] ?></td>
                                <td style="display:none"><?= $rows['manager_id'] ?></td>
                                <td><?php
                                    if ($rows['manager_id'] == 0) {
                                        echo "---";
                                    } else {
                                        $sql1 = "SELECT name from user_master where user_master_id = '$manager_id' ";
                                        $result = mysqli_query($conn, $sql1);
                                        $row1 = mysqli_fetch_assoc($result);
                                        echo $row1['name'];
                                    }

                                    ?>
                                </td>
                                <td style="display:none"><?= $rows['dept_id'] ?></td>
                                <td><?= $rows['dept_name'] ?></td>
                                <td>
                                    <a class="btn btn-success" href="update.php?Id=<?php echo $rows['user_master_id']; ?> &name=<?php echo $rows['name']; ?> &email=<?php echo $rows['email']; ?> &ism=<?php echo $rows['is_manager']; ?> &mid=<?php echo $rows['manager_id']; ?> &did=<?php echo $rows['dept_id']; ?> &dname=<?php echo $rows['dept_name']; ?> &role=<?php echo $rows['role']; ?>"> Edit </a>
                                </td>
                                <td>
                                    <button id="delete" type="button" class="btn btn-danger deletebtn">DELETE</button>
                                </td>

                            </tr>
                        <?php $i++;
                        } ?>
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

    <script>
        $(document).ready(function() {

            $('.deletebtn').on('click', function() {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>
    <!-- ########################################################################## -->
    <!-- delete popup form -->
    <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="delete.php" method='post'>
                    <div class="modal-body">
                        <input type="hidden" name="delete_id" id="delete_id">
                        <h4> Do you want to Delete this Data ??</h4>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-primary" name="deletedata" value="deletedata">Yes !! Delete it.</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete popup form -->
    <!-- ########################################################################## -->



<?php
    include "../master/footer.php";
    include "../master/after-footer.php";
} else {
    header('Location:../login.php');
}
?>