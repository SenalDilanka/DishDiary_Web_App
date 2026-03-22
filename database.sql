CREATE DATABASE IF NOT EXISTS dishdiary;
USE dishdiary;

DROP TABLE IF EXISTS messages;
DROP TABLE IF EXISTS recipes;
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    category ENUM('breakfast','lunch','dinner','dessert') NOT NULL,
    description TEXT NOT NULL,
    ingredients TEXT NOT NULL,
    instructions TEXT NOT NULL,
    prep_time VARCHAR(50) DEFAULT '30 minutes',
    serving_size VARCHAR(50) DEFAULT 'Serves 2',
    image_path VARCHAR(255) DEFAULT 'images/recipes/creamy_garlic_pasta.jpg',
    user_id INT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_recipe_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO recipes (title, category, description, ingredients, instructions, prep_time, serving_size, image_path, user_id) VALUES
('Avocado Toast with Poached Eggs', 'breakfast', 'Creamy avocado spread on toasted bread, topped with silky poached eggs and chili flakes.', '2 slices sourdough bread\n1 ripe avocado\n2 eggs\n1 tsp lemon juice\nSalt, black pepper, chili flakes', 'Toast the bread slices until crisp and golden.\nMash avocado with lemon juice, salt, and pepper.\nPoach eggs in gently simmering water for 3-4 minutes.\nSpread avocado on toast, top with eggs, and finish with chili flakes.', '20 minutes', 'Serves 1-2', 'images/recipes/Avacado_poa_toast_egg.webp', NULL),
('Sri Lankan Rice and Curry', 'lunch', 'Classic Sri Lankan lunch plate with steamed rice and mixed curries.', '3 cups cooked rice\n1 cup dhal curry\n1 cup chicken or fish curry\n1/2 cup vegetable curry\nCoconut sambol\nPapadam', 'Prepare curries ahead and keep warm.\nScoop hot rice into serving plates.\nArrange curries around the rice.\nServe with sambol and papadam on the side.', '45 minutes', 'Serves 3-4', 'images/recipes/rice_and_curry.jpg', NULL),
('Creamy Garlic Pasta', 'dinner', 'Comforting pasta tossed in a rich garlic cream sauce.', '250g pasta\n2 tbsp butter\n3 garlic cloves, minced\n1 cup cooking cream\n1/2 cup parmesan\nSalt and pepper', 'Cook pasta in salted water until al dente.\nMelt butter and saute garlic until fragrant.\nAdd cream and parmesan, then simmer until thickened.\nToss pasta in sauce and serve with black pepper.', '30 minutes', 'Serves 2-3', 'images/recipes/creamy_garlic_pasta.jpg', NULL),
('Watalappan', 'dessert', 'Spiced coconut milk custard sweetened with jaggery and steamed to silky perfection.', '400ml thick coconut milk\n180g grated jaggery\n4 eggs\n1/2 tsp cardamom powder\nPinch of nutmeg\nCashews for topping', 'Dissolve jaggery in warm coconut milk.\nWhisk eggs gently and mix with the coconut jaggery base.\nAdd cardamom and nutmeg, then strain.\nSteam for 25-30 minutes until set.', '40 minutes', 'Serves 6', 'images/recipes/watalappan.jpg', NULL),
('Banana Pancakes with Honey Drizzle', 'breakfast', 'Fluffy banana pancakes with warm honey and fresh fruit on top.', '1 cup all-purpose flour\n1 ripe banana, mashed\n1 egg\n3/4 cup milk\n1 tsp baking powder\nHoney for serving', 'Whisk mashed banana, egg, and milk.\nAdd flour and baking powder, then mix until smooth.\nCook batter on a lightly greased pan.\nStack pancakes and drizzle with honey.', '25 minutes', 'Serves 2', 'images/recipes/banana_pancake_honey.webp', NULL),
('Vegetable Fried Rice', 'lunch', 'A quick wok-fried rice loaded with colorful vegetables and savory flavor.', '3 cups cooked rice\n1 carrot, diced\n1/2 cup peas\n1/2 onion, chopped\n2 tbsp soy sauce\n1 tbsp sesame oil', 'Heat sesame oil and saute onion and carrot.\nAdd peas and cook until bright green.\nStir in rice and break any clumps.\nAdd soy sauce, toss well, and serve hot.', '20 minutes', 'Serves 3', 'images/recipes/vegi_fri_rice.jpg', NULL),
('Chicken Alfredo Pasta', 'dinner', 'Creamy Alfredo pasta with juicy seasoned chicken pieces.', '250g fettuccine\n200g chicken breast\n1 cup cream\n1/2 cup parmesan\n2 garlic cloves\nSalt and pepper', 'Cook pasta and reserve some pasta water.\nPan-sear seasoned chicken and slice.\nPrepare Alfredo sauce with garlic, cream, and parmesan.\nCombine pasta, chicken, and sauce until silky.', '35 minutes', 'Serves 3', 'images/recipes/chicken_alfredo_pasta.jpg', NULL),
('Strawberry Cheesecake', 'dessert', 'Creamy baked cheesecake topped with sweet strawberry sauce.', '200g cream cheese\n1 cup crushed biscuits\n3 tbsp melted butter\n1/3 cup sugar\n2 eggs\nStrawberry topping', 'Mix biscuits with butter and press into a pan.\nBeat cream cheese, sugar, and eggs.\nPour over crust and bake until just set.\nCool and top with strawberry sauce.', '50 minutes', 'Serves 8', 'images/recipes/strawberry_cheesecake.jpg', NULL);
