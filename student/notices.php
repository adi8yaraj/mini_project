<?php
require_once '../config/database.php';
require_once '../includes/auth.php';

checkRole(['student']);

require_once '../includes/header.php';
?>

<div class="container-fluid">
    <h2 class="mb-4">Notices & Announcements</h2>
    
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="list-group">
                <?php
                try {
                    $stmt = $pdo->query("SELECT * FROM notices WHERE target_audience IN ('all', 'students') ORDER BY created_at DESC");
                    $notices = $stmt->fetchAll();
                    
                    if(count($notices) > 0) {
                        foreach($notices as $notice) {
                            echo '<div class="list-group-item">';
                            echo '<div class="d-flex w-100 justify-content-between">';
                            echo '<h5 class="mb-1 text-primary">'.htmlspecialchars($notice['title']).'</h5>';
                            echo '<small>'.date('M d, Y', strtotime($notice['created_at'])).'</small>';
                            echo '</div>';
                            echo '<p class="mb-1">'.nl2br(htmlspecialchars($notice['content'])).'</p>';
                            echo '</div>';
                        }
                    } else {
                        echo '<p class="text-center text-muted">No new notices.</p>';
                    }
                } catch(PDOException $e) {
                    echo '<div class="alert alert-danger">Error loading notices.</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
