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
    
        <div class="p-3">
            <?php $id = $_SESSION['user_master_id'];
            $query = "SELECT * FROM user_master where is_deleted = 0 AND manager_id = '$id' ORDER BY user_master_id ASC"; //where is_delete==0
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) { ?>

                <h1 class="display-4 fs-1">Managers</h1>
                <table class="table" style="width: 32rem;">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">EMAIL</th>
                            <th scope="col">DEPARTMENT_ID</th>
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
                                <td><?= $rows['dept_id'] ?></td>
                            </tr>
                        <?php $i++;
                        } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    
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