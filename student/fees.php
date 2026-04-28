<?php
require_once '../config/database.php';
require_once '../includes/auth.php';

checkRole(['student']);

require_once '../includes/header.php';
?>

<div class="container-fluid">
    <h2 class="mb-4">Fee Details</h2>
    
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Fee History</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Receipt No</th>
                                    <th>Description</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#FEE-2023-01</td>
                                    <td>Semester 3 Tuition Fee</td>
                                    <td>$5,000</td>
                                    <td>15 Aug 2023</td>
                                    <td><span class="badge bg-success">Paid</span></td>
                                    <td><button class="btn btn-sm btn-outline-primary"><i class="fas fa-download"></i> Receipt</button></td>
                                </tr>
                                <tr>
                                    <td>#FEE-2023-02</td>
                                    <td>Library Fine</td>
                                    <td>$15</td>
                                    <td>-</td>
                                    <td><span class="badge bg-danger">Unpaid</span></td>
                                    <td><button class="btn btn-sm btn-primary">Pay Now</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 mb-4">
            <div class="card shadow mb-4 border-left-warning">
                <div class="card-body text-center py-5">
                    <i class="fas fa-exclamation-circle fa-4x text-warning mb-3"></i>
                    <h4 class="text-gray-800">Pending Amount</h4>
                    <h2 class="text-danger font-weight-bold my-3">$15.00</h2>
                    <p class="text-muted mb-4">Due Date: 30 Nov 2023</p>
                    <button class="btn btn-primary btn-lg w-100">Pay All Dues</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
