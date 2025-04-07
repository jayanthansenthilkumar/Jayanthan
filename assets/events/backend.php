<?php
session_start();
include "config.php";
if (isset($_POST['admin_login'])) {
    try {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $admin_email = "admin@prisoltech.com";
        $admin_password = "prisolTECH";

        if ($email === $admin_email && $password === $admin_password) {
            $_SESSION['admin_logged_in'] = true;
            $res = [
                'status' => 200,
                'message' => 'Welcome Admin'
            ];
        } else {
            $res = [
                'status' => 401,
                'message' => 'Invalid Credentials'
            ];
        }
        echo json_encode($res);
    } catch (Exception $e) {
        $res = [
            'status' => 500,
            'message' => 'Error: ' . $e->getMessage()
        ];
        echo json_encode($res);
    }
}

if (isset($_POST['Add_newuser'])) {
    try {

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $rollno = mysqli_real_escape_string($conn, $_POST['regno']);
        $dept = mysqli_real_escape_string($conn, $_POST['department']);
        $mail= mysqli_real_escape_string($conn, $_POST['email']);
        $mobile= mysqli_real_escape_string($conn, $_POST['phone']);
        $github = mysqli_real_escape_string($conn, $_POST['github']);
            $query = "INSERT INTO students (Name, Regno, Dept, Mailid, Phone, Github) VALUES ('$name', '$rollno', '$dept', '$mail', '$mobile', '$github')";
            if (mysqli_query($conn, $query)) {
                $res = [
                    'status' => 200,
                    'message' => 'User Added Successfully'
                ];
                echo json_encode($res);
            } else {
                throw new Exception('Query Failed: ' . mysqli_error($conn));
            }
    } catch (Exception $e) {
        $res = [
            'status' => 500,
            'message' => 'Error: ' . $e->getMessage()
        ];
        echo json_encode($res);
    }
}
?>