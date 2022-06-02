<?php
session_start();
if (isset($_SESSION['username']) && isset($_SESSION['user_master_id'])) {
    include "../master/db_conn.php";
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
        $manager_name = $_SESSION['username'];
        $manager_id = $_SESSION['user_master_id'];



        /*--------------------------------------insert into form master start----------------------------------------------*/
        $sql_1 = "INSERT INTO form_master (form_guid,task_id,for_id,manager_id) VALUES ('$form_guid','$task_id','$for_id','$manager_id')";
        $result_1 = mysqli_query($conn, $sql_1);
        if ($result_1 != True) {
            echo "Error: " . $sql_1 . "<br>" . $conn->error;
        }
        /*-----------------------------------insert into form master end---------------------------------------------- */

        /* --------------------------------------select form_id from form master start---------------------------------------------- */
        $sql_2 = "SELECT form_id FROM form_master WHERE is_deleted = 0 AND form_guid='$form_guid'";
        $result_2 = mysqli_query($conn, $sql_2);
        while ($row = $result_2->fetch_assoc()) : {
                $form_id = $row['form_id'];
            }
        endwhile;

        /*--------------------------------------select form_id from form master end---------------------------------------------- */

        /*--------------------------------------Parameter insertion start---------------------------------------------*/

        $sql_4 = "SELECT para_id FROM para_master WHERE is_deleted = 0";
        $result_4 = mysqli_query($conn, $sql_4);

        while ($row = $result_4->fetch_assoc()) : {
                $id = $row['para_id'];
                if (!empty($_POST["parameter_$id"]) && !empty($_POST["rating_$id"])) {
                    $para_id = $_POST["parameter_$id"];
                    $sql_5 = "INSERT into form_isto_para (form_id,task_id,para_id,user_master_id) values ('$form_id','$task_id','$para_id','$for_id')";
                    $result_5 = mysqli_query($conn, $sql_5);
                    $rating_id = $_POST["rating_$id"];
                    if ($result_5 != True) {
                        echo "Error: " . $sql_5 . "<br>" . $conn->error;
                    } elseif ($_SESSION['role'] == 'employee') {
                        if ($_SESSION['is_manager'] == 1) {
                            $sql_8 = "UPDATE form_isto_para SET rating_manager = '$rating_id' WHERE form_id = $form_id AND para_id = $para_id";
                            $result_8 = mysqli_query($conn, $sql_8);
                            if ($result_8 != True) {
                                echo "Error: " . $sql_8 . "<br>" . $conn->error;
                            }
                        } //end employee...
                    } else {
                        $sql_6 = "UPDATE form_isto_para SET rating_manager = '$rating_id' WHERE form_id = $form_id AND para_id = $para_id";
                        $result_6 = mysqli_query($conn, $sql_6);
                        if ($result_6 != True) {
                            echo "Error: " . $sql_6 . "<br>" . $conn->error;
                        }
                    }
                }
            }
        endwhile;



        /*--------------------------------Parameter insertion end ---------------------------------------------- */

        /*--------------------------------------update desc from form master start----------------------------------------------*/
        if ($_SESSION['role'] == 'employee') {
            if ($_SESSION['is_manager'] == 1) {
                //desc_manger_manager
                $sql_9 = "UPDATE form_master SET desc_manager = '$desc' WHERE form_id = $form_id";
                $result_9 = mysqli_query($conn, $sql_9);
                if ($result_9 != True) {
                    echo "Error: " . $sql_9 . "<br>" . $conn->error;
                } else {
                    echo "Record added successfully";
                    header("refresh:2;../manager/manager_myteam.php");
                }
            } //end_employee
        } else {
            $sql_3 = "UPDATE form_master SET desc_manager = '$desc' WHERE form_id = $form_id";
            $result_3 = mysqli_query($conn, $sql_3);
            if ($result_3 != True) {
                echo "Error: " . $sql_3 . "<br>" . $conn->error;
            } else {
                echo "Record added successfully";
                header("refresh:2;../admin/admin_myteam.php");
            }
        }


        /*-------------------------------------update desc from form master end---------------------------------------------- */

        /*--------------------------------------selecting role,is_manager from user_master start---------------------------------------------- */
        //$sql_7 = "SELECT role,is_manager FROM user_master WHERE user_master_id = $for_id AND is_deleted = 0";
        //$result_7 = mysqli_query($conn, $sql_7);
        //if ($result_7 != True) {
            //echo "Error: " . $sql_7 . "<br>" . $conn->error;
       // } else {
           // while ($row = $result_7->fetch_assoc()) : {
                //    $role = $row['role'];
                  //  $is_manager = $row['is_manager'];
              //  }
           // endwhile;
            //echo "Record added successfully";
            //header("refresh:2;../admin/admin_myteam.php");
       // }

        /*--------------------------------------selecting role,is_manager from user_master end---------------------------------------------- */
    }
} else {
    header("Location:../login.php");
}
