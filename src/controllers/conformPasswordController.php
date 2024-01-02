<?php
require_once "../database.php";
require_once "../queries.php";
require_once "../utils/Alerts.php";
session_start();

// check the session id or redirect to the forget password page
if (!isset($_SESSION['id'])) {
    showError("Something went wrong");
    header("Location: ../screens/forgetPassword.php");
    exit();
}

// check if the user has submitted the form

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // Get the password and confirm password from the form
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];

    // check if its empty fields
    if (empty($password) || empty($confirmPassword)) {
        showError("Please fill up all the fields");
        header("Location: ../screens/confirmPassword.php");
    }


    // Check if the password and confirm password are the same
    if ($password != $confirmPassword) {
        showError("Password and confirm password are not the same");
        header("Location: ../screens/confirmPassword.php");
    }

    $result = updatePassword($GLOBALS['conn'], $_SESSION['id'], $password);

    if ($result > 0) {
        showSuccess("Password has been updated");
        header("Location: ../screens/login.php");
    } else if ($result == 0) {
        showError("Password has not been updated" . $_SESSION['id']);
        header("Location: ../screens/confirmPassword.php");
    }
    else {
        showError("Something went wrong".$_SESSION['id']);
        header("Location: ../screens/confirmPassword.php");
    }


}

