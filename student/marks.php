<?php
require_once '../config/database.php';
require_once '../includes/auth.php';

checkRole(['student']);

require_once '../includes/header.php';
?>

<div class="container-fluid">
    <h2 class="mb-4">My Marks</h2>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <h5 class="text-primary mb-3">Semester 3 Results</h5>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Subject code</th>
                            <th>Subject Name</th>
                            <th>Internal Marks</th>
                            <th>External Marks</th>
                            <th>Total</th>
                            <th>Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>CS301</td>
                            <td>Data Structures</td>
                            <td>28/30</td>
                            <td>62/70</td>
                            <td>90/100</td>
                            <td><span class="badge bg-success">A+</span></td>
                        </tr>
                        <tr>
                            <td>CS302</td>
                            <td>Operating Systems</td>
                            <td>25/30</td>
                            <td>55/70</td>
                            <td>80/100</td>
                            <td><span class="badge bg-primary">A</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div class="mt-4 p-3 bg-light rounded text-center">
                <h4 class="mb-0">SGPA: 8.5</h4>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
