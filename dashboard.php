<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/db.php';
require_login();

$user = current_user();
$pageTitle = 'DishDiary | Dashboard';
$currentPage = '';
$basePath = '';

$userId = (int) $user['id'];
$recipeCount = 0;
$messageCount = 0;
$totalRecipeCount = 0;

$result = $conn->query("SELECT COUNT(*) AS total FROM recipes WHERE user_id = {$userId}");
if ($result) {
    $recipeCount = (int) $result->fetch_assoc()['total'];
}
$result = $conn->query('SELECT COUNT(*) AS total FROM recipes');
if ($result) {
    $totalRecipeCount = (int) $result->fetch_assoc()['total'];
}
$result = $conn->query('SELECT COUNT(*) AS total FROM messages');
if ($result) {
    $messageCount = (int) $result->fetch_assoc()['total'];
}

$myRecipes = $conn->query("SELECT id, title, category, prep_time, created_at FROM recipes WHERE user_id = {$userId} ORDER BY created_at DESC");

include __DIR__ . '/includes/header.php';
?>
<section class="page-banner text-center">
  <div class="container">
    <h1 class="fw-bold">Welcome, <?= e($user['username']) ?></h1>
    <p>Manage your account and recipes from one place.</p>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row g-4 mb-5">
      <div class="col-md-4"><div class="stat-card"><h3><?= $recipeCount ?></h3><p class="mb-0">Your Recipes</p></div></div>
      <div class="col-md-4"><div class="stat-card"><h3><?= $totalRecipeCount ?></h3><p class="mb-0">Total Recipes</p></div></div>
      <div class="col-md-4"><div class="stat-card"><h3><?= $messageCount ?></h3><p class="mb-0">Messages Received</p></div></div>
    </div>

    <div class="table-card mb-4">
      <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-3">
        <h2 class="h4 mb-0">Your Added Recipes</h2>
        <a href="add-recipe.php" class="btn custom-btn">Add New Recipe</a>
      </div>

      <?php if ($myRecipes && $myRecipes->num_rows > 0): ?>
        <div class="table-responsive">
          <table class="table align-middle">
            <thead>
              <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Prep Time</th>
                <th>Date</th>
                <th>View</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($row = $myRecipes->fetch_assoc()): ?>
                <tr>
                  <td><?= e($row['title']) ?></td>
                  <td><?= e(ucfirst($row['category'])) ?></td>
                  <td><?= e($row['prep_time']) ?></td>
                  <td><?= e(date('Y-m-d', strtotime($row['created_at']))) ?></td>
                  <td><a class="btn btn-sm btn-outline-dark" href="recipe.php?id=<?= (int) $row['id'] ?>">Open</a></td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <div class="empty-state">
          <h3>No recipes yet</h3>
          <p class="mb-3">You have not added any recipes yet.</p>
          <a href="add-recipe.php" class="btn custom-btn">Add Your First Recipe</a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
