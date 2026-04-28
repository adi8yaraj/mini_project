<?php
require_once '../config/database.php';
require_once '../includes/auth.php';

checkRole(['admin']);

// Fetch Faculty
$faculty_members = [];
try {
    $stmt = $pdo->query("SELECT f.*, u.username FROM faculty f JOIN users u ON f.user_id = u.id");
    $faculty_members = $stmt->fetchAll();
} catch(PDOException $e) {
    $message = "<div class='alert alert-danger'>Error fetching faculty.</div>";
}

require_once '../includes/header.php';
?>

<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Manage Faculty</h2>
        <button class="btn btn-primary" onclick="alert('Add faculty functionality to be implemented')"><i class="fas fa-plus"></i> Add Faculty</button>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" width="100%" cellspacing="0">
                    <thead class="table-light">
                        <tr>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($faculty_members) > 0): ?>
                            <?php foreach($faculty_members as $faculty): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($faculty['name']); ?></td>
                                <td><?php echo htmlspecialchars($faculty['department']); ?></td>
                                <td><?php echo htmlspecialchars($faculty['email']); ?></td>
                                <td><?php echo htmlspecialchars($faculty['phone']); ?></td>
                                <td>
                                    <button class="btn btn-sm btn-info text-white"><i class="fas fa-edit"></i></button>
                                    <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center">No faculty found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
