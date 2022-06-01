<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['user_master_id'])) {

    $page_title = "department";
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
    include "../master/db_conn.php";
    include "../master/pre-header.php";
    include "../master/close_header.php";
    include "../master/header.php";
    include "../master/navbar_admin.php";
    include "../master/breadcrumbs.php";
?>


    <!-- Button trigger modal -->
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dpetaddmodal">
            Add new
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="dpetaddmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="insert_dept.php" method='post'>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="font-weight-semibold" for="dept_name">Department Name:</label>
                            <div class="input-affix">
                                <i class="prefix-icon anticon anticon-user"></i>
                                <input type="text" class="form-control" id="dept_name" name="dept_name" placeholder="dept_name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="submit" value="submit">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ################################################################################################################################ -->
    <!-- update popup form -->
    <div class="modal fade" id="editmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit department</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="update.php" method='post'>
                    <div class="modal-body">
                        <input type="hidden" name="update_dept_id" id="update_dept_id">


                        <div class="form-group">
                            <label class="font-weight-semibold" for="update_dept_name">Department Name:</label>
                            <div class="input-affix">
                                <i class="prefix-icon anticon anticon-user"></i>
                                <input type="text" class="form-control" id="update_dept_name" name="update_dept_name" placeholder="update_dept_name">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="update" value="update">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- ################################################################################################################################ -->
    <!--delete -->
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

    <!-- ################################################################################################################################ -->
    <!--delete -->
    <div class="container d-flex  align-items-center" style="min-height: 30vh">
        <div class="p-3">
            <?php include 'dept_list.php';
            if (mysqli_num_rows($res) > 0) { ?>
                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
                <table id="table" class="table table-x1" style="width: 35rem;">
                    <thead>
                        <tr>
                            <th scope="col">Dept. Id</th>
                            <th scope="col">Dept. Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * from dept_master";
                        //set array
                        $array = array();
                        $i = 1;
                        while ($rows = mysqli_fetch_assoc($res)) {
                            $array[] = $rows;
                        ?>
                            <tr>
                                <td><?= $rows['dept_id'] ?></td>
                                <td><?= $rows['dept_name'] ?></td>
                                <td>
                                    <button type="button" class="btn btn-success editbtn">EDIT</button>
                                    <button type="button" class="btn btn-danger deletebtn">DELETE</button>
                                </td>
                            </tr>
                        <?php $i++;
                        } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('#table').DataTable();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {
                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_dept_id').val(data[0]);
                $('#update_dept_name').val(data[1]);

            });

        });
    </script>
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
<?php
    include "../master/footer.php";
    include "../master/after-footer.php";
} else {
    header("Location: ../login.php");
}
?>