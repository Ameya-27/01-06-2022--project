<?php
session_start();
//making a connection to our database
include "db_conn.php";
//selecting the value after the post method at index.php 
if (isset($_POST['username']/* login form variable name of username filed... */) && isset($_POST['password']/* login form variable name of password filed... */) /*&& isset($_POST['role'])*/) {

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //creating new variable and storing the values of the post method
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    //$role = test_input($_POST['role']);
    /*Applying some conditions like user name is empty or not password is empty or not if bot are not empty then we fetch the query......*/


    if (empty($username)) {
        //if user name is empty or not
        header("Location: ../login.php?error=User Name is required");
    } elseif (empty($password)) {
        //paswword is empty or not
        header("Location: ../login.php?error=Pasword is required");
    } else {
        // Hashing the password and storing it in new variable......

        $password = md5($password);
        //echo  $password;
        //fetching the data using sql query......

        $sql = "SELECT * FROM  user_master WHERE email ='$username' And password ='$password' AND is_deleted = 0";
        $result = mysqli_query($conn, $sql);


        if (mysqli_num_rows($result) === 1) {
            //The username must be unique 
            $row = mysqli_fetch_assoc($result);
            //printing the value of $row....
            //echo "<pre>";
            //print_r($row);
            if ( //condition for unique....
                $row['password'] === $password /*&& $row['role'] == $role*/
            ) {
                $_SESSION['name'] = $row['name'];
                $_SESSION['user_master_id'] = $row['user_master_id'];
                $_SESSION['username'] = $row['email'];
                //echo $_SESSION['id'];
                //$sql1 = "SELECT role FROM users WHERE id='$_SESSION[id]'";
                //$result1 = mysqli_query($conn,$sql1);
                //echo $result1;

                /*while ($row1 = $result1->fetch_assoc()) {
                    $_SESSION['role']= $row1['role']."<br>";
                   // echo $row1['name']."<br>";
                }
                $_SESSION['role'];*/
                //$row1 = mysqli_fetch_array($result1);echo $row1;
                $_SESSION['role'] = $row['role'];
                $_SESSION['is_manager'] = $row['is_manager'];
                //for trial ... echo $_SESSION['role'];
                if (isset($_SESSION['username']) && isset($_SESSION['user_master_id'])) {
                    if ($_SESSION['role'] == 'employee') {
                        if ($_SESSION['is_manager'] == 1) {
                            header("LOCATION:../manager/manager-dashboard.php");

                        } else {
                            header("LOCATION:../employee/employee-dashboard.php");
                        }
                    } else {
                        header("LOCATION:../admin/admin-dashboard.php");
                    }
                }
            } else {
                header("Location: ../login.php?error=Incorrect username or password");
            }
        } else { //echo 1;
            echo $username;
            echo "<br>";
            echo $password;
            echo "<br>";
            $result = mysqli_query($conn, $sql);
            $c = $result->num_rows;
            echo $c;
            //echo $result;
            //echo gettype($result);

            header("Location: ../login.php?error=Incorrect username or password");
        }
    }
} else {
    header("Location: ../login.php");
}
