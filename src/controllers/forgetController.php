<?php
require_once "../database.php";
require_once "../queries.php";
require_once "../utils/Alerts.php";


// check if the user has submitted the form
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // Get the email and secret answer from the form
    $email = $_POST['email'];
    $secretAnswer = $_POST['secret-answer'];

    // Get the user from the database
    $user = selectUserEmail($GLOBALS['conn'], $email);

    // check if its empty fields
    if (empty($email) || empty($secretAnswer)) {
        showError("Please fill up all the fields");
        header("Location: ../screens/forgetPassword.php");
    }

    // Check if the user exists
    if ($user) {
        // Check if the secret answer is correct
        if ($user['secret_answer'] == $secretAnswer) {
            // Redirect to the confirm password page
            showSuccess("You can reset your password now");
            // Redirect to the forget password page and add the session id to the url
header("Location: ../screens/confirmPassword.php?id=" . $user['id']);



        } else {
            showError("Secret answer is incorrect");
            // Redirect to the forget password
            header("Location: ../screens/forgetPassword.php");

        }
    } else {
        showError("User does not exist");
        // Redirect to the forget password
        header("Location: ../screens/forgetPassword.php");
    }


}

