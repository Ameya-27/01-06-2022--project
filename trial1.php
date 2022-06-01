<?php
session_start();
include "../master/db_conn.php";
if (isset($_SESSION['username']) && isset($_SESSION['user_master_id'])) {
    if (isset($_POST['submit'])) {
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        //creating new variable and storing the values of the post method
        $form_guid = test_input($_POST['form_id']);
        $task_id = test_input($_POST['title']);
        $for_id = test_input($_POST['employee']);
        $desc = test_input($_POST['desc']);

        
        /*--------------------------------------insert into form master start---------------------------------------------- 
        $sql_1 = "INSERT INTO form_master (form_guid,task_id,for_id) VALUES ('$form_guid','$task_id','$for_id')";
        $result_1 =mysqli_query($conn,$sql_1);
        if ($result_1 != True) {
            echo "Error: " . $sql_1 . "<br>" . $conn->error;
        }
        --------------------------------------insert into form master end---------------------------------------------- */

        /* --------------------------------------select form_id from form master start---------------------------------------------- 
        $sql_2 = "SELECT form_id FROM form_master WHERE is_deleted = 0 AND form_guid='$form_guid'";
        $result_2 = mysqli_query($conn, $sql_2);
        while ($row = $result_2->fetch_assoc()) : {
                $form_id = $row['form_id'];
            }
        endwhile;
        echo $form_id;
        --------------------------------------select form_id from form master end---------------------------------------------- */

        /*--------------------------------------update desc from form master start---------------------------------------------- 
        if ($_SESSION['role'] == 'admin') {
            $sql_3 = "UPDATE form_master SET desc_manager = '$desc' WHERE form_id = $form_id";
        }
        $result_3 = mysqli_query($conn, $sql_3);
        if ($result_3 != True) {
            echo "Error: " . $sql_3 . "<br>" . $conn->error;
        }

         --------------------------------------update desc from form master end---------------------------------------------- */

        
    }
} else {
    header("Location:../login.php");
}
