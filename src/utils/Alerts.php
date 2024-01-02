<?php
function showError($message) {
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['alert'] = [
        'type' => 'error',
        'message' => $message
    ];
}

function showSuccess($message) {
    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $_SESSION['alert'] = [
        'type' => 'success',
        'message' => $message
    ];
}