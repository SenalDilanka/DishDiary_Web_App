<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/db.php';

$pageTitle = 'DishDiary | Home';
$currentPage = 'home';
$basePath = '';

$featuredRecipes = [];
$result = $conn->query("SELECT id, title, category, image_path, description FROM recipes ORDER BY created_at DESC LIMIT 6");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $featuredRecipes[] = $row;
    }
}

include __DIR__ . '/includes/header.php';
?>
<section>
  <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <div class="hero-slide hero-1">
          <div class="hero-overlay">
            <div class="container text-center text-white">
              <h1 class="display-4 fw-bold">Welcome to DishDiary</h1>
              <p class="lead">Discover tasty recipes, cooking ideas, and kitchen inspiration.</p>
              <a href="recipe.php" class="btn btn-light btn-lg mt-2">Explore Recipes</a>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="hero-slide hero-2">
          <div class="hero-overlay">
            <div class="container text-center text-white">
              <h1 class="display-4 fw-bold">Cook With Confidence</h1>
              <p class="lead">Simple meals, detailed steps, and helpful cooking tips.</p>
              <a href="tips.php" class="btn btn-light btn-lg mt-2">View Tips</a>
            </div>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <div class="hero-slide hero-3">
          <div class="hero-overlay">
            <div class="container text-center text-white">
              <h1 class="display-4 fw-bold">Share Your Signature Dish</h1>
              <p class="lead">Add your favorite recipes and inspire others.</p>
              <a href="add-recipe.php" class="btn btn-light btn-lg mt-2">Add Recipe</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <h2 class="section-title text-center mb-4">Popular Categories</h2>
    <div class="row g-4">
      <?php foreach (['breakfast' => 'Start your day with energy and flavor.', 'lunch' => 'Quick and satisfying midday meals.', 'dinner' => 'Enjoy warm, comforting dishes every evening.', 'dessert' => 'Sweet recipes to complete every meal.'] as $category => $text): ?>
        <div class="col-md-6 col-lg-3">
          <a href="recipe.php?category=<?= urlencode($category) ?>" class="text-decoration-none text-dark">
            <div class="category-box text-center p-4 shadow-sm h-100 category-link">
              <h5><?= ucfirst($category) ?></h5>
              <p><?= e($text) ?></p>
            </div>
          </a>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="py-5 bg-light-soft">
  <div class="container">
    <h2 class="section-title text-center mb-4">Featured Recipes</h2>
    <div class="row g-4">
      <?php foreach ($featuredRecipes as $recipe): ?>
        <div class="col-md-6 col-lg-4">
          <div class="card recipe-card border-0 shadow-sm h-100">
            <a href="recipe.php?id=<?= (int) $recipe['id'] ?>">
              <img src="<?= e($recipe['image_path']) ?>" class="card-img-top" alt="<?= e($recipe['title']) ?>">
            </a>
            <div class="card-body position-relative">
              <h5 class="card-title"><?= e($recipe['title']) ?></h5>
              <p class="card-text"><?= e($recipe['description']) ?></p>
              <a href="recipe.php?id=<?= (int) $recipe['id'] ?>" class="btn custom-btn stretched-link">View Recipe</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <h2 class="section-title text-center mb-4">Quick Cooking Tips</h2>
    <div class="row g-4">
      <div class="col-md-4"><div class="tip-box shadow-sm p-4 h-100"><h5>Use Fresh Ingredients</h5><p>Fresh vegetables and herbs improve both flavor and presentation.</p></div></div>
      <div class="col-md-4"><div class="tip-box shadow-sm p-4 h-100"><h5>Prep Before Cooking</h5><p>Measure and prepare ingredients first to save time in the kitchen.</p></div></div>
      <div class="col-md-4"><div class="tip-box shadow-sm p-4 h-100"><h5>Taste As You Go</h5><p>Adjust seasoning gradually for better-balanced dishes.</p></div></div>
    </div>
  </div>
</section>

<section class="newsletter-section text-center">
  <div class="container">
    <h2 class="mb-3">Join the DishDiary Community</h2>
    <p class="mb-4">Register an account, save recipes, and share your own kitchen ideas.</p>
    <a href="auth/register.php" class="btn btn-dark btn-lg">Create Account</a>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
