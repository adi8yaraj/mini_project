<?php
require_once 'config/database.php';
require_once 'includes/auth.php';

// Redirect if already logged in
redirectBasedOnRole();

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    if (empty($username) || empty($password)) {
        $error = 'Please enter both username and password.';
    } else {
        try {
            $stmt = $pdo->prepare("SELECT id, username, password, role FROM users WHERE username = ?");
            $stmt->execute([$username]);
            
            if ($stmt->rowCount() == 1) {
                $user = $stmt->fetch();
                if ($password === $user['password']) {
                    // Password is correct, start a new session
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $_SESSION['role'] = $user['role'];
                    
                    redirectBasedOnRole();
                } else {
                    $error = 'Invalid username or password.';
                }
            } else {
                $error = 'Invalid username or password.';
            }
        } catch(PDOException $e) {
            $error = "Oops! Something went wrong. Please try again later.";
        }
    }
}

require_once 'includes/header.php';
?>

<div class="container">
    <div class="auth-card card">
        <div class="auth-header">
            <h3><i class="fas fa-lock me-2"></i> System Login</h3>
            <p class="mb-0">Enter your credentials to access the portal</p>
        </div>
        <div class="card-body p-4">
            <?php 
            if(!empty($error)){
                echo '<div class="alert alert-danger">' . $error . '</div>';
            }        
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-floating mb-3">
                    <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary btn-lg" type="submit">Login</button>
                </div>
            </form>
            <div class="mt-4 text-center">
                <small class="text-muted">Need help? Contact system administrator.</small>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
