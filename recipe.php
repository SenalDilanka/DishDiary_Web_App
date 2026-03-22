<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/db.php';

$pageTitle = 'DishDiary | Recipes';
$currentPage = 'recipes';
$basePath = '';

$recipeId = isset($_GET['id']) ? (int) $_GET['id'] : 0;
$category = raw_value($_GET['category'] ?? '');
$allowedCategories = ['breakfast', 'lunch', 'dinner', 'dessert'];

if ($recipeId > 0) {
    $stmt = $conn->prepare('SELECT r.*, u.username FROM recipes r LEFT JOIN users u ON r.user_id = u.id WHERE r.id = ?');
    $stmt->bind_param('i', $recipeId);
    $stmt->execute();
    $recipe = $stmt->get_result()->fetch_assoc();

    include __DIR__ . '/includes/header.php';

    if (!$recipe) {
        echo '<section class="py-5"><div class="container"><div class="empty-state"><h2>Recipe not found</h2><p>The recipe you selected does not exist.</p><a class="btn custom-btn mt-3" href="recipe.php">Back to recipes</a></div></div></section>';
        include __DIR__ . '/includes/footer.php';
        exit;
    }

    $relatedStmt = $conn->prepare('SELECT id, title, description, image_path FROM recipes WHERE category = ? AND id != ? ORDER BY created_at DESC LIMIT 3');
    $relatedStmt->bind_param('si', $recipe['category'], $recipeId);
    $relatedStmt->execute();
    $related = $relatedStmt->get_result();
    ?>
    <section class="page-banner text-center">
      <div class="container">
        <h1 class="fw-bold"><?= e($recipe['title']) ?></h1>
        <p><?= e(ucfirst($recipe['category'])) ?> recipe</p>
      </div>
    </section>

    <section class="py-5">
      <div class="container">
        <div class="row g-5">
          <div class="col-lg-6">
            <img src="<?= e($recipe['image_path']) ?>" class="recipe-hero-img shadow-sm" alt="<?= e($recipe['title']) ?>">
          </div>
          <div class="col-lg-6">
            <div class="d-flex flex-wrap gap-2 mb-3">
              <span class="recipe-meta-chip"><?= e(ucfirst($recipe['category'])) ?></span>
              <span class="recipe-meta-chip"><?= e($recipe['prep_time']) ?></span>
              <span class="recipe-meta-chip"><?= e($recipe['serving_size']) ?></span>
            </div>
            <p class="lead"><?= e($recipe['description']) ?></p>
            <p class="small-muted mb-4">Added by <?= e($recipe['username'] ?: 'DishDiary') ?></p>
            <h3>Ingredients</h3>
            <ul class="recipe-list">
              <?php foreach (explode("\n", $recipe['ingredients']) as $ingredient): if (trim($ingredient) !== ''): ?>
                <li><?= e($ingredient) ?></li>
              <?php endif; endforeach; ?>
            </ul>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-12">
            <h3>Instructions</h3>
            <ol class="recipe-list">
              <?php foreach (explode("\n", $recipe['instructions']) as $step): if (trim($step) !== ''): ?>
                <li><?= e($step) ?></li>
              <?php endif; endforeach; ?>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <section class="py-5 bg-light-soft">
      <div class="container">
        <h2 class="section-title text-center mb-4">Related Recipes</h2>
        <div class="row g-4">
          <?php while ($item = $related->fetch_assoc()): ?>
            <div class="col-md-4">
              <div class="card border-0 shadow-sm h-100">
                <img src="<?= e($item['image_path']) ?>" class="card-img-top" alt="<?= e($item['title']) ?>">
                <div class="card-body">
                  <h5><?= e($item['title']) ?></h5>
                  <p><?= e($item['description']) ?></p>
                  <a href="recipe.php?id=<?= (int) $item['id'] ?>" class="btn custom-btn">View Recipe</a>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </section>
    <?php
    include __DIR__ . '/includes/footer.php';
    exit;
}

$whereClause = '';
if (in_array($category, $allowedCategories, true)) {
    $stmt = $conn->prepare('SELECT id, title, category, image_path, description FROM recipes WHERE category = ? ORDER BY created_at DESC');
    $stmt->bind_param('s', $category);
    $stmt->execute();
    $recipes = $stmt->get_result();
} else {
    $recipes = $conn->query('SELECT id, title, category, image_path, description FROM recipes ORDER BY created_at DESC');
}

include __DIR__ . '/includes/header.php';
?>
<section class="page-banner text-center">
  <div class="container">
    <h1 class="fw-bold">Recipes</h1>
    <p>Browse meals, desserts, and community favorites.</p>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="recipe-filter-bar mb-4">
      <a class="recipe-filter-btn <?= $category === '' ? 'active' : '' ?>" href="recipe.php">All</a>
      <?php foreach ($allowedCategories as $item): ?>
        <a class="recipe-filter-btn <?= $category === $item ? 'active' : '' ?>" href="recipe.php?category=<?= urlencode($item) ?>"><?= ucfirst($item) ?></a>
      <?php endforeach; ?>
    </div>

    <div class="row g-4">
      <?php while ($row = $recipes->fetch_assoc()): ?>
        <div class="col-md-6 col-lg-4">
          <div class="card recipe-card border-0 shadow-sm h-100">
            <img src="<?= e($row['image_path']) ?>" class="card-img-top" alt="<?= e($row['title']) ?>">
            <div class="card-body d-flex flex-column">
              <span class="small-muted mb-2"><?= e(ucfirst($row['category'])) ?></span>
              <h5 class="card-title"><?= e($row['title']) ?></h5>
              <p class="card-text flex-grow-1"><?= e($row['description']) ?></p>
              <a href="recipe.php?id=<?= (int) $row['id'] ?>" class="btn custom-btn">View Recipe</a>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
