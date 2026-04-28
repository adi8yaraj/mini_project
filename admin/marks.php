<?php
require_once '../config/database.php';
require_once '../includes/auth.php';

checkRole(['admin']);

require_once '../includes/header.php';
?>

<div class="container-fluid">
    <h2 class="mb-4">Marks Management</h2>
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i> View and generate reports for student academic performance.
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-body text-center py-5">
            <i class="fas fa-chart-bar fa-4x text-muted mb-3"></i>
            <h4>Marks Module Under Construction</h4>
            <p class="text-muted">This module will allow admins to print transcripts and perform predictive performance analysis.</p>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
