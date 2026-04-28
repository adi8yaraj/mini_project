<?php
require_once '../config/database.php';
require_once '../includes/auth.php';

checkRole(['admin']);

require_once '../includes/header.php';
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Fee Management</h2>
        <button class="btn btn-primary"><i class="fas fa-file-invoice-dollar"></i> Generate Invoices</button>
    </div>
    
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Collected</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$125,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Pending Dues</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$15,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exclamation-triangle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Recent Fee Transactions</h6>
        </div>
        <div class="card-body text-center py-4">
            <p class="text-muted">No recent transactions found.</p>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
