<?php
require_once '../config/database.php';
require_once '../includes/auth.php';

// Check if user is logged in and is an admin
checkRole(['admin']);

// Fetch Statistics
$stats = [
    'students' => 0,
    'faculty' => 0,
    'notices' => 0
];

try {
    $stmt = $pdo->query("SELECT COUNT(*) FROM students");
    $stats['students'] = $stmt->fetchColumn();
    
    $stmt = $pdo->query("SELECT COUNT(*) FROM faculty");
    $stats['faculty'] = $stmt->fetchColumn();
    
    $stmt = $pdo->query("SELECT COUNT(*) FROM notices");
    $stats['notices'] = $stmt->fetchColumn();
    
} catch(PDOException $e) {
    // Handle error silently or log it
}

require_once '../includes/header.php';
?>

<div class="container-fluid">
    <h2 class="mb-4">Admin Dashboard</h2>
    
    <div class="row mb-4">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Students</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats['students']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Faculty</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats['faculty']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Active Notices</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $stats['notices']; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Attendance Overview (Mock Data)</h6>
                </div>
                <div class="card-body">
                    <canvas id="attendanceChart"></canvas>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Student Distribution (Mock Data)</h6>
                </div>
                <div class="card-body">
                    <canvas id="distributionChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Attendance Chart
    var ctxAtt = document.getElementById('attendanceChart').getContext('2d');
    var attendanceChart = new Chart(ctxAtt, {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
            datasets: [{
                label: 'Attendance %',
                data: [85, 90, 88, 92, 80],
                backgroundColor: 'rgba(13, 110, 253, 0.2)',
                borderColor: 'rgba(13, 110, 253, 1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100
                }
            }
        }
    });

    // Distribution Chart
    var ctxDist = document.getElementById('distributionChart').getContext('2d');
    var distributionChart = new Chart(ctxDist, {
        type: 'doughnut',
        data: {
            labels: ['Computer Science', 'Electrical', 'Mechanical', 'Civil'],
            datasets: [{
                data: [45, 25, 20, 10],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#f6c23e']
            }]
        }
    });
});
</script>

<?php require_once '../includes/footer.php'; ?>
