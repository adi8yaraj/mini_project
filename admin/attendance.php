<?php
require_once '../config/database.php';
require_once '../includes/auth.php';

checkRole(['admin']);

require_once '../includes/header.php';
?>

<div class="container-fluid">
    <h2 class="mb-4">Attendance Management</h2>
    <div class="alert alert-info">
        <i class="fas fa-info-circle me-2"></i> This module allows admins to generate overall attendance reports. Daily attendance is marked by Faculty.
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <form class="row g-3">
                <div class="col-md-3">
                    <label class="form-label">Course</label>
                    <select class="form-select"><option>Computer Science</option></select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Semester</label>
                    <select class="form-select"><option>1</option><option>2</option></select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">Date From</label>
                    <input type="date" class="form-control">
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="button" class="btn btn-primary w-100"><i class="fas fa-search"></i> Generate Report</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
