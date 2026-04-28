<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function checkRole($allowed_roles) {
    if (!isLoggedIn()) {
        header("Location: /mini/login.php");
        exit();
    }
    
    if (!in_array($_SESSION['role'], $allowed_roles)) {
        header("Location: /mini/index.php"); // Redirect to home if unauthorized
        exit();
    }
}

function redirectBasedOnRole() {
    if (isset($_SESSION['role'])) {
        switch ($_SESSION['role']) {
            case 'admin':
                header("Location: /mini/admin/dashboard.php");
                break;
            case 'faculty':
                header("Location: /mini/faculty/dashboard.php");
                break;
            case 'student':
                header("Location: /mini/student/dashboard.php");
                break;
        }
        exit();
    }
}
?>
