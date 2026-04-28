<?php
require_once '../config/database.php';
require_once '../includes/auth.php';

checkRole(['faculty']);

require_once '../includes/header.php';
?>

<div class="container-fluid">
    <h2 class="mb-4">Faculty Dashboard</h2>
    
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">My Classes Today</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">3</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pending Marks Upload</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">1 Class</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file-upload fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Today's Schedule</h6>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Data Structures (CS - Sem 3)
                    <span class="badge bg-primary rounded-pill">09:00 - 10:00</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Operating Systems (CS - Sem 4)
                    <span class="badge bg-primary rounded-pill">11:00 - 12:00</span>
                </li>
            </ul>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
