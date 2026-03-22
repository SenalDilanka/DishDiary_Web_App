<?php
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/includes/db.php';
require_login();

$pageTitle = 'DishDiary | Add Recipe';
$currentPage = 'add-recipe';
$basePath = '';
$user = current_user();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = raw_value($_POST['title'] ?? '');
    $category = raw_value($_POST['category'] ?? '');
    $description = raw_value($_POST['description'] ?? '');
    $ingredients = raw_value($_POST['ingredients'] ?? '');
    $instructions = raw_value($_POST['instructions'] ?? '');
    $prepTime = raw_value($_POST['prep_time'] ?? '');
    $servingSize = raw_value($_POST['serving_size'] ?? '');
    $imagePath = 'images/recipes/creamy_garlic_pasta.jpg';
    $allowed = ['breakfast', 'lunch', 'dinner', 'dessert'];

    if ($title === '' || $description === '' || $ingredients === '' || $instructions === '' || !in_array($category, $allowed, true)) {
        set_flash('danger', 'Please complete all required recipe fields.');
    } else {
        if (!empty($_FILES['recipe_image']['name']) && ($_FILES['recipe_image']['error'] ?? 1) === UPLOAD_ERR_OK) {
            $tmpName = $_FILES['recipe_image']['tmp_name'];
            $extension = strtolower(pathinfo($_FILES['recipe_image']['name'], PATHINFO_EXTENSION));
            $validExtensions = ['jpg', 'jpeg', 'png', 'webp', 'avif'];
            if (in_array($extension, $validExtensions, true)) {
                $newName = 'uploads/' . time() . '_' . preg_replace('/[^A-Za-z0-9_\-]/', '_', pathinfo($_FILES['recipe_image']['name'], PATHINFO_FILENAME)) . '.' . $extension;
                $destination = __DIR__ . '/' . $newName;
                if (move_uploaded_file($tmpName, $destination)) {
                    $imagePath = $newName;
                }
            }
        }

        $stmt = $conn->prepare('INSERT INTO recipes (title, category, description, ingredients, instructions, prep_time, serving_size, image_path, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->bind_param('ssssssssi', $title, $category, $description, $ingredients, $instructions, $prepTime, $servingSize, $imagePath, $user['id']);
        $stmt->execute();

        set_flash('success', 'Recipe added successfully.');
        redirect('dashboard.php');
    }
}

include __DIR__ . '/includes/header.php';
?>
<section class="page-banner text-center">
  <div class="container">
    <h1 class="fw-bold">Add Your Recipe</h1>
    <p>Share your best dish with the DishDiary community.</p>
  </div>
</section>

<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="form-card shadow-sm p-4 p-md-5">
          <form method="POST" action="add-recipe.php" enctype="multipart/form-data">
            <div class="mb-3">
              <label class="form-label">Recipe Name</label>
              <input type="text" name="title" class="form-control" value="<?= old('title') ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Category</label>
              <select name="category" class="form-select" required>
                <option value="">Select category</option>
                <option value="breakfast">Breakfast</option>
                <option value="lunch">Lunch</option>
                <option value="dinner">Dinner</option>
                <option value="dessert">Dessert</option>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Short Description</label>
              <textarea name="description" class="form-control" rows="3" required><?= old('description') ?></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Ingredients (one per line)</label>
              <textarea name="ingredients" class="form-control" rows="5" required><?= old('ingredients') ?></textarea>
            </div>
            <div class="mb-3">
              <label class="form-label">Cooking Steps (one per line)</label>
              <textarea name="instructions" class="form-control" rows="6" required><?= old('instructions') ?></textarea>
            </div>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Preparation Time</label>
                <input type="text" name="prep_time" class="form-control" value="<?= old('prep_time', '30 minutes') ?>">
              </div>
              <div class="col-md-6">
                <label class="form-label">Serving Size</label>
                <input type="text" name="serving_size" class="form-control" value="<?= old('serving_size', 'Serves 2') ?>">
              </div>
            </div>
            <div class="mb-3 mt-3">
              <label class="form-label">Upload Image</label>
              <input type="file" name="recipe_image" class="form-control">
            </div>
            <button type="submit" class="btn custom-btn w-100">Submit Recipe</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
