<?php
include "../master/db_conn.php";
$id = $_GET['Id'];
$username = $_GET['email'];
$role = $_GET['role'];
$name = $_GET['name'];
$is_manager = $_GET['ism'];
$manager_id = $_GET['mid'];
$dept_name = $_GET['dname'];
$dept_id = $_GET['did'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Enlink - user-login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png">

    <!-- page css -->

    <!-- Core css -->
    <link href="assets/css/app.min.css" rel="stylesheet">

</head>

<body>
    <div class="app">
        <div class="container-fluid p-h-0 p-v-20 bg full-height d-flex" style="background-image: url('assets/images/others/login-3.png')">
            <div class="d-flex flex-column justify-content-between w-100">
                <div class="container d-flex h-100">
                    <div class="row align-items-center w-100">
                        <div class="col-md-7 col-lg-5 m-h-auto">
                            <div class="card shadow-lg">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between m-b-30">
                                        <img class="img-fluid" alt="" src="assets/images/logo/logo.png">
                                        <h2 class="m-b-0">Update form</h2>
                                    </div>
                                    <form action="update_code.php" method="POST">
                                        <?php if (isset($_GET['error'])) { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?= $_GET['error'] ?>
                                            </div>
                                        <?php } ?>
                                        <input type="hidden" name="update_id" id="update_id" value="<?php echo "$id" ?>">
                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="name">Name:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-user"></i>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="name" value="<?php echo "$name"; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1" for="role">Role</label>
                                            <select class="form-control" id="role" name="role">
                                                <option value="" disabled selected hidden>Please Select</option>
                                                <option <?php

                                                        if ($role == 'admin') {/* use name value as stored in database if capital then capital and if small then small */
                                                            echo "selected";
                                                        }
                                                        ?>>Admin</option>
                                                <option <?php
                                                        if ($role == 'employee') {
                                                            echo "selected";
                                                        }
                                                        ?>>Employee</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1" for="dept">Department</label>
                                            <select class="form-control" id="dept" name="dept">
                                                <option value="" disabled selected hidden>Please Select</option>
                                                <?php
                                                $sql = "SELECT dept_id,dept_name FROM dept_master WHERE is_deleted = 0 ORDER BY dept_id ASC ";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = $result->fetch_assoc()) :
                                                ?>
                                                    <option <?php
                                                            if ($dept_id == $row['dept_id']) {
                                                                echo "selected";
                                                            }
                                                            ?> value="<?php echo $row['dept_id']; ?>"> <?php echo $row['dept_name']; ?></option>
                                                <?php
                                                endwhile;
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="is_manager">Is Manager?</label>&nbsp;
                                            <!--<div class="input-affix">-->
                                            <input type="radio" id="is_manager" name="is_manager" value="yes"
                                            
                                            <?php 
                                            if($is_manager == 1){
                                                echo "checked";
                                            }
                                            ?>
                                            >
                                            <label for="is_manager"> yes </label>&nbsp;
                                            <input type="radio" id="is_manager" name="is_manager" value="no"
                                            
                                            <?php 
                                            
                                            if($is_manager == 0){
                                                echo "checked";
                                            }
                                            
                                            ?>
                                            
                                            >
                                            <label for="is_manager"> no </label>
                                            <!--</div>-->
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1" for="manager">Manager</label>
                                            <select class="form-control" id="manager" name="manager">
                                                <option value="" disabled selected hidden>Please Select</option>
                                                <option value=0 <?php
                                                                    if ($manager_id == 0) {
                                                                        echo "selected";
                                                                    }
                                                                    ?>>No needed</option>
                                                <?php
                                                $sql = "SELECT name,user_master_id FROM user_master WHERE is_manager = 1 ORDER BY user_master_id ASC ";
                                                $result = mysqli_query($conn, $sql);
                                                while ($row = $result->fetch_assoc()) :
                                                ?>
                                                    <option <?php
                                                            if ($manager_id == $row['user_master_id']) {
                                                                echo "selected";
                                                            }
                                                            ?> value="<?php echo $row['user_master_id']; ?>"> <?php echo $row['name']; ?></option>
                                                <?php
                                                endwhile;
                                                ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label class="font-weight-semibold" for="email">Email:</label>
                                            <div class="input-affix">
                                                <i class="prefix-icon anticon anticon-user"></i>
                                                <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?php echo "$username"; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <button class="btn btn-primary" name="update" value="update">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                echo $role;
                echo "<br>";
                echo $name;
                echo "<br>";
                echo $id;
                echo "<br>";
                echo $is_manager;
                echo "<br>";
                echo $username;
                echo "<br>";
                echo $manager_id;
                echo "<br>";
                echo gettype($manager_id);
                echo "<br>";
                echo $dept_name;
                echo "<br>";
                echo $dept_id;
                echo "<br>";


                ?>



                <div class="d-none d-md-flex p-h-40 justify-content-between">
                    <span class="">© 2019 ThemeNate</span>
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Legal</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="text-dark text-link" href="">Privacy</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <!-- Core Vendors JS -->
    <script src="assets/js/vendors.min.js"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>