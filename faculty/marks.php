<?php
require_once '../config/database.php';
require_once '../includes/auth.php';

checkRole(['faculty']);

require_once '../includes/header.php';
?>

<div class="container-fluid">
    <h2 class="mb-4">Upload Marks</h2>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Upload Module</h6>
        </div>
        <div class="card-body text-center py-4">
            <i class="fas fa-file-excel fa-3x text-success mb-3"></i>
            <p>Upload student marks via CSV or enter manually.</p>
            <button class="btn btn-primary"><i class="fas fa-upload"></i> Select File</button>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>
