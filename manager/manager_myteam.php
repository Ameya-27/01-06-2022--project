<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['user_master_id'])) {
    $page_title = "Manger-team";
    $Dashboard = "MANAGER";
    $Dashboard_link = "manager-dashboard.php";
    $My_Evaluation = "My Evaluation";
    $MyEvaluation_link = "../evaluation_form/view_manager_task.php";
    $My_Team = "MY TEAM";
    $MyTeam_link = "manager_myteam.php";
    include "../master/db_conn.php";
    include "../master/pre-header.php";
    include "../master/header.php";
    include "../master/navbar_manager.php";
    include "../master/breadcrumbs.php";
?>
    <div class="container d-flex  align-items-center" style="min-height: 30vh">
        <div class="p-3">
            <?php $id = $_SESSION['user_master_id'];
            $query = "SELECT * FROM user_master where is_deleted = 0 AND manager_id = '$id' ORDER BY user_master_id ASC"; //where is_delete==0
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) { ?>

                <h4 class="display-4 fs-1">Members</h4>
                <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css" />
                <table id="table" class="table-success table-bordered" style="width: 32rem;">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($rows = mysqli_fetch_assoc($result)) { ?>
                            <tr>
                                <th scope="row"><?= $rows['user_master_id'] ?></th>
                                <td><?= $rows['name'] ?></td>
                                <td><?= $rows['email'] ?></td>
                                <td>
                                    <a class="btn btn-success evalbtn" href="../evaluation_form/create.php?Id=<?php echo $rows['user_master_id']; ?>">Evaluate/View</a>
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
    <?php
    // content end
    include "../master/footer.php";
    include "../master/after-footer.php";
    ?>
<?php
} else {
    header("Location:../login.php");
}
?>