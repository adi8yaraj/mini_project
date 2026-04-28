<?php
require_once '../config/database.php';
require_once '../includes/auth.php';

checkRole(['student']);

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
    $phone = trim($_POST['phone']);
    // Usually only phone/address are editable by student
    
    try {
        $stmt = $pdo->prepare("UPDATE students SET phone = ? WHERE user_id = ?");
        $stmt->execute([$phone, $_SESSION['user_id']]);
        $message = "<div class='alert alert-success'>Profile updated successfully.</div>";
    } catch(PDOException $e) {
        $message = "<div class='alert alert-danger'>Error updating profile.</div>";
    }
}

// Fetch Student Data
$student = [];
try {
    $stmt = $pdo->prepare("SELECT * FROM students WHERE user_id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    $student = $stmt->fetch();
} catch(PDOException $e) {
    $message = "<div class='alert alert-danger'>Error fetching profile.</div>";
}

require_once '../includes/header.php';
?>

<div class="container-fluid">
    <h2 class="mb-4">My Profile</h2>
    
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow">
                <div class="card-body text-center">
                    <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($student['name'] ?? 'Student'); ?>&background=random" class="rounded-circle mb-3" alt="Profile" width="150">
                    <h4><?php echo htmlspecialchars($student['name'] ?? 'N/A'); ?></h4>
                    <p class="text-muted"><?php echo htmlspecialchars($student['course'] ?? 'N/A'); ?> - Sem <?php echo htmlspecialchars($student['semester'] ?? 'N/A'); ?></p>
                    <span class="badge bg-primary px-3 py-2">Enrollment: <?php echo htmlspecialchars($student['enrollment_no'] ?? 'N/A'); ?></span>
                </div>
            </div>
        </div>
        
        <div class="col-lg-8 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Details</h6>
                </div>
                <div class="card-body">
                    <?php echo $message; ?>
                    <form method="POST">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Email Address (Read Only)</label>
                                <input type="email" class="form-control" value="<?php echo htmlspecialchars($student['email'] ?? ''); ?>" readonly>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Phone Number</label>
                                <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($student['phone'] ?? ''); ?>">
                            </div>
                        </div>
                        <button type="submit" name="update_profile" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
