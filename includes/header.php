<?php
require_once __DIR__ . '/functions.php';
$user = current_user();
$pageTitle = $pageTitle ?? 'DishDiary';
$currentPage = $currentPage ?? '';
$basePath = $basePath ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= e($pageTitle) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= $basePath ?>css/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand" href="<?= $basePath ?>index.php">
      <img src="<?= $basePath ?>images/logo/DishDiary_logo.png" alt="DishDiary logo" class="site-logo">
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link <?= nav_active('home', $currentPage) ?>" href="<?= $basePath ?>index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link <?= nav_active('recipes', $currentPage) ?>" href="<?= $basePath ?>recipe.php">Recipes</a></li>
        <li class="nav-item"><a class="nav-link <?= nav_active('tips', $currentPage) ?>" href="<?= $basePath ?>tips.php">Cooking Tips</a></li>
        <li class="nav-item"><a class="nav-link <?= nav_active('add-recipe', $currentPage) ?>" href="<?= $basePath ?>add-recipe.php">Add Recipe</a></li>
        <li class="nav-item"><a class="nav-link <?= nav_active('contact', $currentPage) ?>" href="<?= $basePath ?>contact.php">Contact</a></li>
        <li class="nav-item"><a class="nav-link <?= nav_active('about', $currentPage) ?>" href="<?= $basePath ?>about.php">About Us</a></li>
      </ul>
      <?php if ($user): ?>
        <div class="d-flex align-items-center gap-2">
          <a href="<?= $basePath ?>dashboard.php" class="btn custom-btn">Dashboard</a>
          <a href="<?= $basePath ?>auth/logout.php" class="btn btn-outline-dark">Logout</a>
        </div>
      <?php else: ?>
        <div class="d-flex align-items-center gap-2">
          <a href="<?= $basePath ?>auth/login.php" class="btn custom-btn">Login</a>
          <a href="<?= $basePath ?>auth/register.php" class="btn btn-outline-dark">Register</a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</nav>
<?php $flash = get_flash(); ?>
<?php if ($flash): ?>
  <div class="alert-fixed px-3">
    <div class="alert alert-<?= e($flash['type']) ?> alert-dismissible fade show mt-3" role="alert">
      <?= e($flash['message']) ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  </div>
<?php endif; ?>
