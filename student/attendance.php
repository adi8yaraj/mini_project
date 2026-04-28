<?php
require_once '../config/database.php';
require_once '../includes/auth.php';

checkRole(['student']);

require_once '../includes/header.php';
?>

<div class="container-fluid">
    <h2 class="mb-4">My Attendance</h2>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="alert alert-warning">
                <?php if (rand(0, 1)): // Mocking low attendance alert ?>
                    <i class="fas fa-exclamation-triangle"></i> <strong>Low Attendance Alert:</strong> Your attendance in Operating Systems is below 75%. Please ensure you attend the upcoming classes.
                <?php else: ?>
                    Your attendance is well above the required 75% threshold. Keep it up!
                <?php endif; ?>
            </div>
            
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Subject</th>
                            <th>Total Classes</th>
                            <th>Attended</th>
                            <th>Percentage</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Data Structures</td>
                            <td>40</td>
                            <td>36</td>
                            <td>90%</td>
                            <td><span class="badge bg-success">Good</span></td>
                        </tr>
                        <tr>
                            <td>Operating Systems</td>
                            <td>38</td>
                            <td>26</td>
                            <td>68%</td>
                            <td><span class="badge bg-danger">Low</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
