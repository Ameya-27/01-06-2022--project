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
<!-- ################################################ task form end #######################################################################-->

<!-- ################################################ update task form start #####################################################################-->
<div class="modal fade" id="paraeditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Parameter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="update_para.php" method='post'>
                <input type="hidden" name="update_para_id" id="update_para_id">

                <div class="modal-body">
                    <div class="form-group">
                        <label class="font-weight-semibold" for="update_para_title">Parameter Title:</label>
                        <div class="input-affix">
                            <i class="prefix-icon anticon anticon-user"></i>
                            <input type="text" class="form-control" id="update_para_title" name="update_para_title" placeholder="update_para_title">
                        </div>
                        <label class="font-weight-semibold" for="update_para_description">Parameter Description:</label>
                        <div class="input-affix">
                            <i class="prefix-icon anticon anticon-user"></i>
                            <input type="text" class="form-control" id="update_para_description" name="update_para_description" placeholder="update_para_description">
                        </div>
                        <label class="font-weight-semibold" for="update_para_min_r">Parameter Min Rate:</label>
                        <div class="input-affix">
                            <i class="prefix-icon anticon anticon-user"></i>
                            <input type="text" class="form-control" id="update_para_min_r" name="update_para_min_r" placeholder="update_para_min_r">
                        </div>
                        <label class="font-weight-semibold" for="update_para_max_r">Parameter Max Rate:</label>
                        <div class="input-affix">
                            <i class="prefix-icon anticon anticon-user"></i>
                            <input type="text" class="form-control" id="update_para_max_r" name="update_para_max_r" placeholder="update_para_max_r">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="update_para" value="update_para">submit</button>
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
                <h5 class="modal-title" id="exampleModalLabel">Delete Parameter</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="delete_para.php" method='post'>
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
<div class="container d-flex  align-items-center" style="min-height: 30vh">
    <div class="p-3">
        <?php include 'para_list.php';
        if (mysqli_num_rows($res) > 0) { ?>
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
            <table id="table" class="table" style="width: 32rem;">
                <thead>
                    <tr>
                        <th scope="col">Parameter Id</th>
                        <th scope="col">Parameter Title</th>
                        <th scope="col">Parameter Description</th>
                        <th scope="col">Parameter Min Rating</th>
                        <th scope="col">Parameter Max Rating</th>
                        <th scope="col">Action</th>
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
                            <td><?= $rows['para_id'] ?></td>
                            <td><?= $rows['para_title'] ?></td>
                            <td><?= $rows['para_description'] ?></td>
                            <td><?= $rows['min_rating'] ?></td>
                            <td><?= $rows['max_rating'] ?></td>
                            <td>
                                <button type="button" class="btn btn-success editbtn" data-bs-toggle="modal" data-bs-target="#paraeditModal">EDIT</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger deletebtn" data-bs-toggle="modal" data-bs-target="#deletemodal">DELETE</button>
                            </td>
                        </tr>
                    <?php $i++;
                    } ?>
                </tbody>
            </table>
        <?php } ?>
    </div>
</div>
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('#table').DataTable();
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {
                $('#paraeditmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_para_id').val(data[0]);
                $('#update_para_title').val(data[1]);
                $('#update_para_description').val(data[2]);
                $('#update_para_min_r').val(data[3]);
                $('#update_para_max_r').val(data[4]);

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