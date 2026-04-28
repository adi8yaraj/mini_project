<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$base_url = '/mini';
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart College Automation System</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/style.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <?php if(isset($_SESSION['user_id'])): ?>
        <nav id="sidebar" class="bg-primary text-white">
            <div class="sidebar-header p-3 text-center border-bottom border-light">
                <h4><i class="fas fa-university me-2"></i>SmartCollege</h4>
                <small class="d-block mt-2">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></small>
            </div>
            
            <ul class="list-unstyled components p-3">
                <?php if($_SESSION['role'] == 'admin'): ?>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>/admin/dashboard.php" class="text-white text-decoration-none d-block p-2 rounded hover-bg-light"><i class="fas fa-home me-2"></i> Dashboard</a></li>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>/admin/students.php" class="text-white text-decoration-none d-block p-2 rounded hover-bg-light"><i class="fas fa-user-graduate me-2"></i> Students</a></li>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>/admin/faculty.php" class="text-white text-decoration-none d-block p-2 rounded hover-bg-light"><i class="fas fa-chalkboard-teacher me-2"></i> Faculty</a></li>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>/admin/attendance.php" class="text-white text-decoration-none d-block p-2 rounded hover-bg-light"><i class="fas fa-calendar-check me-2"></i> Attendance</a></li>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>/admin/marks.php" class="text-white text-decoration-none d-block p-2 rounded hover-bg-light"><i class="fas fa-poll me-2"></i> Marks</a></li>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>/admin/timetable.php" class="text-white text-decoration-none d-block p-2 rounded hover-bg-light"><i class="fas fa-table me-2"></i> Timetable</a></li>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>/admin/notices.php" class="text-white text-decoration-none d-block p-2 rounded hover-bg-light"><i class="fas fa-bullhorn me-2"></i> Notices</a></li>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>/admin/fees.php" class="text-white text-decoration-none d-block p-2 rounded hover-bg-light"><i class="fas fa-money-bill-wave me-2"></i> Fees</a></li>
                <?php elseif($_SESSION['role'] == 'faculty'): ?>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>/faculty/dashboard.php" class="text-white text-decoration-none d-block p-2 rounded hover-bg-light"><i class="fas fa-home me-2"></i> Dashboard</a></li>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>/faculty/attendance.php" class="text-white text-decoration-none d-block p-2 rounded hover-bg-light"><i class="fas fa-calendar-check me-2"></i> Mark Attendance</a></li>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>/faculty/marks.php" class="text-white text-decoration-none d-block p-2 rounded hover-bg-light"><i class="fas fa-poll me-2"></i> Upload Marks</a></li>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>/faculty/notices.php" class="text-white text-decoration-none d-block p-2 rounded hover-bg-light"><i class="fas fa-bullhorn me-2"></i> Notices</a></li>
                <?php elseif($_SESSION['role'] == 'student'): ?>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>/student/dashboard.php" class="text-white text-decoration-none d-block p-2 rounded hover-bg-light"><i class="fas fa-home me-2"></i> Dashboard</a></li>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>/student/profile.php" class="text-white text-decoration-none d-block p-2 rounded hover-bg-light"><i class="fas fa-user me-2"></i> Profile</a></li>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>/student/attendance.php" class="text-white text-decoration-none d-block p-2 rounded hover-bg-light"><i class="fas fa-calendar-check me-2"></i> My Attendance</a></li>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>/student/marks.php" class="text-white text-decoration-none d-block p-2 rounded hover-bg-light"><i class="fas fa-poll me-2"></i> My Marks</a></li>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>/student/timetable.php" class="text-white text-decoration-none d-block p-2 rounded hover-bg-light"><i class="fas fa-table me-2"></i> Timetable</a></li>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>/student/notices.php" class="text-white text-decoration-none d-block p-2 rounded hover-bg-light"><i class="fas fa-bullhorn me-2"></i> Notices</a></li>
                    <li class="mb-2"><a href="<?php echo $base_url; ?>/student/fees.php" class="text-white text-decoration-none d-block p-2 rounded hover-bg-light"><i class="fas fa-money-bill-wave me-2"></i> Fees</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <?php endif; ?>

        <!-- Page Content -->
        <div id="content" class="w-100 flex-grow-1">
            <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
                <div class="container-fluid">
                    <?php if(isset($_SESSION['user_id'])): ?>
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <?php else: ?>
                    <a class="navbar-brand text-primary fw-bold" href="<?php echo $base_url; ?>/"><i class="fas fa-university me-2"></i>SmartCollege</a>
                    <?php endif; ?>
                    
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ms-auto align-items-center">
                            <li class="nav-item me-3">
                                <button id="themeToggle" class="btn btn-outline-secondary btn-sm rounded-circle"><i class="fas fa-moon"></i></button>
                            </li>
                            <?php if(isset($_SESSION['user_id'])): ?>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-danger text-white px-3" href="<?php echo $base_url; ?>/logout.php">Logout</a>
                                </li>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-primary text-white px-3" href="<?php echo $base_url; ?>/login.php">Login</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="container-fluid p-4 main-container">
