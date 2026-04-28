<?php
require_once 'includes/auth.php';

// If already logged in, redirect to respective dashboard
redirectBasedOnRole();

require_once 'includes/header.php';
?>

<div class="hero-section">
    <div class="container">
        <h1 class="display-3 fw-bold mb-4 shadow-sm text-shadow">Smart College Automation</h1>
        <p class="lead mb-5 fs-4 text-shadow">Manage attendance, marks, notices and more in one unified platform.</p>
        <div class="d-flex justify-content-center gap-4">
            <a href="login.php" class="btn btn-light btn-lg px-5 rounded-pill shadow fw-bold text-primary">Login Now</a>
        </div>
    </div>
</div>

<style>
.text-shadow {
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
}
/* Override container padding for hero full width */
.main-container {
    padding: 0 !important;
}
</style>

<?php require_once 'includes/footer.php'; ?>
