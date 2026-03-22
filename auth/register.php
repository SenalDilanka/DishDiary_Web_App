<?php
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/db.php';

if (is_logged_in()) {
    redirect('../dashboard.php');
}

$pageTitle = 'DishDiary | Register';
$currentPage = '';
$basePath = '../';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = raw_value($_POST['username'] ?? '');
    $email = raw_value($_POST['email'] ?? '');
    $password = raw_value($_POST['password'] ?? '');
    $confirmPassword = raw_value($_POST['confirm_password'] ?? '');

    if ($username === '' || $email === '' || $password === '' || $confirmPassword === '') {
        set_flash('danger', 'Please fill in all registration fields.');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        set_flash('danger', 'Please enter a valid email address.');
    } elseif (strlen($password) < 6) {
        set_flash('danger', 'Password must be at least 6 characters long.');
    } elseif ($password !== $confirmPassword) {
        set_flash('danger', 'Passwords do not match.');
    } else {
        $check = $conn->prepare('SELECT id FROM users WHERE email = ?');
        $check->bind_param('s', $email);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            set_flash('danger', 'An account with this email already exists.');
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
            $stmt->bind_param('sss', $username, $email, $hashedPassword);
            $stmt->execute();
            set_flash('success', 'Registration successful. Please log in.');
            redirect('login.php');
        }
    }
}

include __DIR__ . '/../includes/header.php';
?>
<section class="login-section d-flex align-items-center py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8 col-lg-6">
        <div class="form-card shadow-sm p-4 p-md-5">
          <h2 class="text-center mb-4">Create Your DishDiary Account</h2>
          <form method="POST" action="register.php">
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" name="username" class="form-control" value="<?= old('username') ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email Address</label>
              <input type="email" name="email" class="form-control" value="<?= old('email') ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Confirm Password</label>
              <input type="password" name="confirm_password" class="form-control" required>
            </div>
            <div class="d-grid">
              <button type="submit" class="btn custom-btn">Register</button>
            </div>
            <div class="text-center mt-3">
              <a href="login.php" class="auth-link text-decoration-none">Already have an account? Login</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include __DIR__ . '/../includes/footer.php'; ?>
