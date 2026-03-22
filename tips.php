<?php
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'DishDiary | Cooking Tips';
$currentPage = 'tips';
$basePath = '';
include __DIR__ . '/includes/header.php';
?>
<section class="page-banner text-center">
  <div class="container">
    <h1 class="fw-bold">Cooking Tips</h1>
    <p>Helpful kitchen advice for better meals every day.</p>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-6 col-lg-4"><div class="card border-0 shadow-sm h-100"><img src="images/recipes/chicken_alfredo_pasta.jpg" class="card-img-top" alt="Knife safety"><div class="card-body"><h5 class="card-title">Knife Safety</h5><p class="card-text">Always use a sharp knife and a stable cutting board for better control.</p></div></div></div>
      <div class="col-md-6 col-lg-4"><div class="card border-0 shadow-sm h-100"><img src="images/recipes/Vegetable-stir-fry.jpg" class="card-img-top" alt="Seasoning"><div class="card-body"><h5 class="card-title">Season Properly</h5><p class="card-text">Add salt gradually and taste your food while cooking.</p></div></div></div>
      <div class="col-md-6 col-lg-4"><div class="card border-0 shadow-sm h-100"><img src="images/recipes/strawberry_cheesecake.jpg" class="card-img-top" alt="Read the recipe first"><div class="card-body"><h5 class="card-title">Read the Recipe First</h5><p class="card-text">Understand all the steps before starting to avoid mistakes.</p></div></div></div>
    </div>
  </div>
</section>

<section class="py-5 bg-light-soft">
  <div class="container">
    <h2 class="section-title text-center mb-4">More Helpful Tips</h2>
    <div class="row g-4">
      <div class="col-md-6"><div class="tip-box shadow-sm p-4 h-100"><h5>Keep Ingredients Organized</h5><p>Arrange your ingredients before cooking to save time and reduce stress.</p></div></div>
      <div class="col-md-6"><div class="tip-box shadow-sm p-4 h-100"><h5>Control Heat Levels</h5><p>Use the correct temperature to prevent burning or uneven cooking.</p></div></div>
      <div class="col-md-6"><div class="tip-box shadow-sm p-4 h-100"><h5>Use Fresh Herbs Wisely</h5><p>Add delicate herbs at the end for better aroma and flavor.</p></div></div>
      <div class="col-md-6"><div class="tip-box shadow-sm p-4 h-100"><h5>Clean As You Go</h5><p>Wash utensils and wipe surfaces while cooking to keep your kitchen neat.</p></div></div>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
