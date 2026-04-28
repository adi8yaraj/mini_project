<?php
require_once '../config/database.php';
require_once '../includes/auth.php';

checkRole(['admin']);

$message = '';

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    try {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = (SELECT user_id FROM students WHERE id = ?)");
        $stmt->execute([$id]);
        $message = "<div class='alert alert-success'>Student deleted successfully.</div>";
    } catch(PDOException $e) {
        $message = "<div class='alert alert-danger'>Error deleting student.</div>";
    }
}

// Fetch Students
$students = [];
try {
    $stmt = $pdo->query("SELECT s.*, u.username FROM students s JOIN users u ON s.user_id = u.id");
    $students = $stmt->fetchAll();
} catch(PDOException $e) {
    $message = "<div class='alert alert-danger'>Error fetching students.</div>";
}

require_once '../includes/header.php';
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manage Students</h2>
        <!-- In a real app, this would open a modal or redirect to an add_student.php page -->
        <button class="btn btn-primary" onclick="alert('Add student functionality to be implemented')"><i class="fas fa-plus"></i> Add Student</button>
    </div>

    <?php echo $message; ?>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-light">
                        <tr>
                            <th>Enrollment No</th>
                            <th>Name</th>
                            <th>Course</th>
                            <th>Semester</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($students) > 0): ?>
                            <?php foreach($students as $student): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($student['enrollment_no']); ?></td>
                                <td><?php echo htmlspecialchars($student['name']); ?></td>
                                <td><?php echo htmlspecialchars($student['course']); ?></td>
                                <td><?php echo htmlspecialchars($student['semester']); ?></td>
                                <td><?php echo htmlspecialchars($student['email']); ?></td>
                                <td>
                                    <button class="btn btn-sm btn-info text-white" onclick="alert('Edit functionality to be implemented')"><i class="fas fa-edit"></i></button>
                                    <a href="?delete=<?php echo $student['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this student?');"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center">No students found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
