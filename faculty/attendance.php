<?php
require_once '../config/database.php';
require_once '../includes/auth.php';

checkRole(['faculty']);

require_once '../includes/header.php';
?>

<div class="container-fluid">
    <h2 class="mb-4">Mark Attendance</h2>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Select Class</h6>
        </div>
        <div class="card-body">
            <form class="row g-3 mb-4">
                <div class="col-md-4">
                    <select class="form-select">
                        <option>Select Course</option>
                        <option>Computer Science</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select class="form-select">
                        <option>Select Semester</option>
                        <option>3</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="button" class="btn btn-primary w-100">Load Students</button>
                </div>
            </form>
            
            <div class="alert alert-secondary text-center">
                Select a class to load the student list and mark attendance.
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
