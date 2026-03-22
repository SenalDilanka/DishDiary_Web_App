<?php
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'DishDiary | About Us';
$currentPage = 'about';
$basePath = '';
include __DIR__ . '/includes/header.php';
?>
<section class="page-banner text-center">
  <div class="container">
    <h1 class="fw-bold">About DishDiary</h1>
    <p>Sharing recipes, ideas, and inspiration for every food lover.</p>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-6">
        <img src="images/recipes/rice_and_curry.jpg" class="img-fluid rounded shadow-sm" alt="Cooking">
      </div>
      <div class="col-lg-6">
        <h2 class="section-title">Who We Are</h2>
        <p>DishDiary is a digital recipe platform created for food lovers who want to explore recipes, improve their cooking, and share favorite dishes in one place.</p>
        <p>This Phase 3 version adds PHP, MySQL, login and registration, recipe submission, a contact form, and a dashboard while keeping the same visual design from Phase 2.</p>
      </div>
    </div>
  </div>
</section>

<section class="py-5 bg-light-soft">
  <div class="container">
    <h2 class="section-title text-center mb-4">Our Team</h2>
    <div class="row justify-content-center g-4">
      <div class="col-md-5 col-lg-4">
        <div class="card border-0 shadow-sm h-100 text-center p-3">
          <img src="images/contact/imalka.jpeg" class="team-img mx-auto mb-3" alt="Imalka Ashen">
          <h5>Imalka Ashen</h5>
          <p>Frontend design and layout development.</p>
        </div>
      </div>
      <div class="col-md-5 col-lg-4">
        <div class="card border-0 shadow-sm h-100 text-center p-3">
          <img src="images/contact/senal.jpeg" class="team-img mx-auto mb-3" alt="Senal Dilanka">
          <h5>Senal Dilanka</h5>
          <p>Content organization, styling, and user experience improvements.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
