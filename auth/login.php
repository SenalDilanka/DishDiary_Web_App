<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/db.php';

if (is_logged_in()) {
    redirect('../dashboard.php');
}

$pageTitle = 'DishDiary | Login';
$currentPage = '';
$basePath = '../';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = raw_value($_POST['email'] ?? '');
    $password = raw_value($_POST['password'] ?? '');

    if ($email === '' || $password === '') {
        set_flash('danger', 'Please enter both email and password.');
    } else {
        $stmt = $conn->prepare('SELECT id, username, email, password FROM users WHERE email = ? LIMIT 1');
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $user = $stmt->get_result()->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            set_flash('success', 'Login successful. Welcome back!');
            redirect('../dashboard.php');
        } else {
            set_flash('danger', 'Invalid email or password.');
        }
    }
}

include __DIR__ . '/../includes/header.php';
?>
<section class="login-section d-flex align-items-center py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-5">
        <div class="form-card shadow-sm p-4 p-md-5">
          <h2 class="text-center mb-4">Login to DishDiary</h2>
          <form method="POST" action="login.php">
            <div class="mb-3">
              <label class="form-label">Email Address</label>
              <input type="email" name="email" class="form-control" value="<?= old('email') ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn custom-btn">Sign In</button>
            </div>
            <div class="text-center mt-3">
              <a href="register.php" class="auth-link text-decoration-none">Need an account? Register</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
