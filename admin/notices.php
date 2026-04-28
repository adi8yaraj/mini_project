<?php
require_once '../config/database.php';
require_once '../includes/auth.php';

checkRole(['admin']);

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_notice'])) {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $audience = $_POST['audience'];
    
    if (!empty($title) && !empty($content)) {
        try {
            $stmt = $pdo->prepare("INSERT INTO notices (title, content, posted_by, target_audience) VALUES (?, ?, ?, ?)");
            $stmt->execute([$title, $content, $_SESSION['user_id'], $audience]);
            $message = "<div class='alert alert-success'>Notice added successfully.</div>";
        } catch(PDOException $e) {
            $message = "<div class='alert alert-danger'>Error adding notice.</div>";
        }
    }
}

// Fetch Notices
$notices = [];
try {
    $stmt = $pdo->query("SELECT n.*, u.username FROM notices n JOIN users u ON n.posted_by = u.id ORDER BY created_at DESC");
    $notices = $stmt->fetchAll();
} catch(PDOException $e) {
    $message = "<div class='alert alert-danger'>Error fetching notices.</div>";
}

require_once '../includes/header.php';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 mb-4">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h5 class="m-0 font-weight-bold">Add New Notice</h5>
                </div>
                <div class="card-body">
                    <?php echo $message; ?>
                    <form method="POST">
                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Content</label>
                            <textarea name="content" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label>Target Audience</label>
                            <select name="audience" class="form-select">
                                <option value="all">All</option>
                                <option value="students">Students Only</option>
                                <option value="faculty">Faculty Only</option>
                            </select>
                        </div>
                        <button type="submit" name="add_notice" class="btn btn-primary w-100">Post Notice</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-8 mb-4">
            <div class="card shadow">
                <div class="card-header">
                    <h5 class="m-0 font-weight-bold text-primary">Recent Notices</h5>
                </div>
                <div class="card-body">
                    <?php if(count($notices) > 0): ?>
                        <div class="list-group">
                        <?php foreach($notices as $notice): ?>
                            <div class="list-group-item list-group-item-action mb-2 border rounded">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1 text-primary"><?php echo htmlspecialchars($notice['title']); ?></h5>
                                    <small class="text-muted"><?php echo date('M d, Y H:i', strtotime($notice['created_at'])); ?></small>
                                </div>
                                <p class="mb-1"><?php echo nl2br(htmlspecialchars($notice['content'])); ?></p>
                                <small class="badge bg-secondary">Audience: <?php echo ucfirst($notice['target_audience']); ?></small>
                                <small class="text-muted ms-2">Posted by: <?php echo htmlspecialchars($notice['username']); ?></small>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    <?php else: ?>
                        <p class="text-center text-muted">No notices found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
