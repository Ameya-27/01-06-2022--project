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

<!-- ################################################ update task form start #####################################################################-->
<div class="modal fade" id="taskeditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="update_task.php" method='post'>
                <input type="hidden" name="update_task_id" id="update_task_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label class="font-weight-semibold" for="update_task_name">Task Name:</label>
                        <div class="input-affix">
                            <i class="prefix-icon anticon anticon-user"></i>
                            <input type="text" class="form-control" id="update_task_name" name="update_task_name" placeholder="update_task_name">
                        </div>
                        <label class="font-weight-semibold" for="update_task_desc">Task Description:</label>
                        <div class="input-affix">
                            <i class="prefix-icon anticon anticon-user"></i>
                            <input type="text" class="form-control" id="update_task_desc" name="update_task_desc" placeholder="update_task_desc">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="update" value="update">submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- ################################################ update task form end #####################################################################-->

<!-- ################################################ delete task form start #####################################################################-->

<div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete department</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="delete_task.php" method='post'>
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

<!-- ################################################ delete task form end#####################################################################-->
<div class="p-3">
    <?php include 'task_list.php';
    if (mysqli_num_rows($res) > 0) { ?>
        <table class="table" style="width: 32rem;">
            <thead>
                <tr>
                    <th scope="col">Task. Id</th>
                    <th scope="col">Task. Name</th>
                    <th scope="col">Task. Description</th>

                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //$query = "SELECT * from dept_master";
                //set array
                //$array = array();
                $i = 1;
                while ($rows = mysqli_fetch_assoc($res)) {
                    $array[] = $rows;
                ?>
                    <tr>
                        <td><?= $rows['task_id'] ?></td>
                        <td><?= $rows['task_title'] ?></td>
                        <td><?= $rows['task_description'] ?></td>
                        <td>
                            <button type="button" class="btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#taskeditModal">EDIT</button>
                            <button type="button" class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#deletemodal">DELETE</button>
                        </td>
                    </tr>
                <?php $i++;
                } ?>
            </tbody>
        </table>
    <?php } ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('.editbtn').on('click', function() {
            $('#taskeditmodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#update_task_id').val(data[0]);
            $('#update_task_name').val(data[1]);
            $('#update_task_desc').val(data[2]);

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
?>