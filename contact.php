<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/db.php';

$pageTitle = 'DishDiary | Contact';
$currentPage = 'contact';
$basePath = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = raw_value($_POST['name'] ?? '');
    $email = raw_value($_POST['email'] ?? '');
    $message = raw_value($_POST['message'] ?? '');

    if ($name === '' || $email === '' || $message === '') {
        set_flash('danger', 'Please fill in all contact form fields.');
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        set_flash('danger', 'Please enter a valid email address.');
    } else {
        $stmt = $conn->prepare('INSERT INTO messages (name, email, message) VALUES (?, ?, ?)');
        $stmt->bind_param('sss', $name, $email, $message);
        $stmt->execute();
        set_flash('success', 'Your message has been sent successfully.');
        redirect('contact.php');
    }
}

include __DIR__ . '/includes/header.php';
?>
<section class="page-banner text-center">
  <div class="container">
    <h1 class="fw-bold">Contact Us</h1>
    <p>Send your questions, ideas, or feedback to the DishDiary team.</p>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="form-card shadow-sm p-4 p-md-5">
          <form method="POST" action="contact.php">
            <div class="mb-3">
              <label class="form-label">Your Name</label>
              <input type="text" name="name" class="form-control" value="<?= old('name') ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Email Address</label>
              <input type="email" name="email" class="form-control" value="<?= old('email') ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Message</label>
              <textarea name="message" class="form-control" rows="6" required><?= old('message') ?></textarea>
            </div>
            <button type="submit" class="btn custom-btn w-100">Send Message</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
