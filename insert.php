<?php
//making a connection to our database
include "master/db_conn.php";
//selecting the value after the post method at index.php 
if (isset($_POST['email']/* login form variable name of username filed... */)){ 
    
    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    


    //creating new variable and storing the values of the post method
    $username = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    $role = test_input($_POST['role']);
    $name = test_input($_POST['name']);
    $dept_id = test_input($_POST['dept']);
    $is_manager_str = test_input($_POST['is_manager']);
    $is_manager = filter_var($is_manager_str, FILTER_VALIDATE_BOOLEAN);
    $manager_id = test_input($_POST['manager']);
    //$role = test_input($_POST['role']);
/*Applying some conditions like user name is empty or not password is empty or not if bot are not empty then we fetch the query......*/


    if (empty($username)) {
        //if user name is empty or not
        header("Location: create.php?error=User Name is required");
    }elseif (empty($password)) {
        //paswword is empty or not
        header("Location: create.php?error=Pasword is required");
    } else {
        // Hashing the password and storing it in new variable......
        
        $password = md5($password);
        //echo  $password;
        //fetching the data using sql query......
        $sql = "INSERT INTO user_master (email,password,role,name,dept_id,is_manager,manager_id) VALUES  ('$username','$password','$role','$name','$dept_id','$is_manager',NULLIF('$manager_id',''))";

        //$sql = "SELECT * FROM  users WHERE username ='$username' And password='$password'";
        $result = mysqli_query($conn,$sql);
        if ($result === TRUE) {
            echo "<script> alert('new data added')</script>";
            header("refresh:2;admin/allEmployee.php");
            //"New record created successfully";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
          }
    }

} else {
    //echo 1;
   header("Location: login.php");
}
