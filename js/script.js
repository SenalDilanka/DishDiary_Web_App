document.addEventListener("DOMContentLoaded", function () {
  const recipeTitle = document.getElementById("recipeTitle");
  if (!recipeTitle) {
    return;
  }

  const recipeCollection = [
    {
      id: "avocado-toast-poached-eggs",
      category: "breakfast",
      title: "Avocado Toast with Poached Eggs",
      description: "Creamy avocado spread on toasted bread, topped with silky poached eggs and chili flakes.",
      image: "images/recipes/Avacado_poa_toast_egg.webp",
      imageAlt: "Avocado toast with poached eggs",
      ingredients: [
        "2 slices sourdough bread",
        "1 ripe avocado",
        "2 eggs",
        "1 tsp lemon juice",
        "Salt, black pepper, chili flakes"
      ],
      prepTime: "20 minutes",
      servingSize: "Serves 1-2",
      instructions: [
        "Toast the bread slices until crisp and golden.",
        "Mash avocado with lemon juice, salt, and pepper.",
        "Poach eggs in gently simmering water for 3-4 minutes.",
        "Spread avocado on toast, top with eggs, and finish with chili flakes."
      ]
    },
    {
      id: "banana-pancakes-honey-drizzle",
      category: "breakfast",
      title: "Banana Pancakes with Honey Drizzle",
      description: "Fluffy banana pancakes with warm honey and fresh fruit on top.",
      image: "images/recipes/Banana_pancake_honey.webp",
      imageAlt: "Banana pancakes with honey",
      ingredients: [
        "1 cup all-purpose flour",
        "1 ripe banana, mashed",
        "1 egg",
        "3/4 cup milk",
        "1 tsp baking powder",
        "Honey for serving"
      ],
      prepTime: "25 minutes",
      servingSize: "Serves 2",
      instructions: [
        "Whisk mashed banana, egg, and milk in a bowl.",
        "Add flour and baking powder, then mix until smooth.",
        "Cook small ladles of batter on a lightly greased pan.",
        "Stack pancakes and drizzle generously with honey."
      ]
    },
    {
      id: "sri-lankan-string-hoppers-coconut-sambol",
      category: "breakfast",
      title: "Sri Lankan String Hoppers with Coconut Sambol",
      description: "Soft steamed string hoppers served with spicy coconut sambol.",
      image: "images/recipes/string_hopp_cocon_som.jpg",
      imageAlt: "String hoppers with coconut sambol",
      ingredients: [
        "12 string hoppers",
        "1 cup grated coconut",
        "1 small red onion, sliced",
        "1 green chili, chopped",
        "1 tsp chili powder",
        "1 tbsp lime juice",
        "Salt to taste"
      ],
      prepTime: "30 minutes",
      servingSize: "Serves 3",
      instructions: [
        "Steam string hoppers for 5 minutes until soft.",
        "Mix coconut, onion, chili, chili powder, lime, and salt.",
        "Taste and adjust lime or salt for balance.",
        "Serve warm string hoppers with fresh sambol."
      ]
    },
    {
      id: "grilled-chicken-rice-bowl",
      category: "lunch",
      title: "Grilled Chicken Rice Bowl",
      description: "Protein-packed lunch bowl with grilled chicken, rice, and crunchy vegetables.",
      image: "images/recipes/Grilled-Chicken-Rice-Bowls-with-Creamy-Cilantro-Dressing.webp",
      imageAlt: "Grilled chicken rice bowl",
      ingredients: [
        "2 cups cooked rice",
        "200g chicken breast",
        "1 cup mixed vegetables",
        "1 tbsp soy sauce",
        "1 tsp sesame oil",
        "Salt and pepper"
      ],
      prepTime: "35 minutes",
      servingSize: "Serves 2",
      instructions: [
        "Season chicken with salt and pepper, then grill until cooked.",
        "Stir-fry vegetables in sesame oil for 3-4 minutes.",
        "Slice grilled chicken and assemble bowls with rice.",
        "Top with vegetables, drizzle soy sauce, and serve."
      ]
    },
    {
      id: "vegetable-fried-rice",
      category: "lunch",
      title: "Vegetable Fried Rice",
      description: "A quick wok-fried rice loaded with colorful vegetables and savory flavor.",
      image: "images/recipes/vegi_fri_rice.jpg",
      imageAlt: "Vegetable fried rice",
      ingredients: [
        "3 cups cooked rice",
        "1 carrot, diced",
        "1/2 cup peas",
        "1/2 onion, chopped",
        "2 tbsp soy sauce",
        "1 tbsp sesame oil"
      ],
      prepTime: "20 minutes",
      servingSize: "Serves 3",
      instructions: [
        "Heat sesame oil and saute onion and carrot.",
        "Add peas and cook until bright green.",
        "Stir in rice and break any clumps.",
        "Add soy sauce, toss well, and serve hot."
      ]
    },
    {
      id: "sri-lankan-rice-and-curry",
      category: "lunch",
      title: "Sri Lankan Rice and Curry",
      description: "Classic Sri Lankan lunch plate with steamed rice and mixed curries.",
      image: "images/recipes/rice_and_curry.jpg",
      imageAlt: "Sri Lankan rice and curry",
      ingredients: [
        "3 cups cooked rice",
        "1 cup dhal curry",
        "1 cup chicken or fish curry",
        "1/2 cup beetroot or bean curry",
        "Coconut sambol",
        "Papadam"
      ],
      prepTime: "45 minutes",
      servingSize: "Serves 3-4",
      instructions: [
        "Prepare curries ahead and keep warm.",
        "Scoop hot rice into serving plates.",
        "Arrange dhal, meat curry, and vegetable curry around rice.",
        "Serve with sambol and papadam on the side."
      ]
    },
    {
      id: "creamy-garlic-pasta",
      category: "dinner",
      title: "Creamy Garlic Pasta",
      description: "Comforting pasta tossed in a rich garlic cream sauce.",
      image: "images/recipes/creamy_garlic_pasta.jpg",
      imageAlt: "Creamy garlic pasta",
      ingredients: [
        "250g pasta",
        "2 tbsp butter",
        "3 garlic cloves, minced",
        "1 cup cooking cream",
        "1/2 cup parmesan",
        "Salt and pepper"
      ],
      prepTime: "30 minutes",
      servingSize: "Serves 2-3",
      instructions: [
        "Cook pasta in salted water until al dente.",
        "Melt butter and saute garlic until fragrant.",
        "Add cream and parmesan, then simmer until thickened.",
        "Toss pasta in sauce and serve with black pepper."
      ]
    },
    {
      id: "spicy-chicken-kottu",
      category: "dinner",
      title: "Spicy Chicken Kottu",
      description: "Street-food style chopped roti stir-fried with chicken and spices.",
      image: "images/recipes/chicken_kotthu.jpg",
      imageAlt: "Spicy chicken kottu",
      ingredients: [
        "4 godamba rotis, shredded",
        "200g cooked chicken, sliced",
        "1 onion, chopped",
        "1 carrot, shredded",
        "2 tbsp kottu sauce or curry sauce",
        "1 egg"
      ],
      prepTime: "35 minutes",
      servingSize: "Serves 2",
      instructions: [
        "Saute onion and carrot in a hot pan.",
        "Add chicken and sauce, then stir for 2 minutes.",
        "Mix in shredded roti and chop while stir-frying.",
        "Scramble in egg and cook until fully combined."
      ]
    },
    {
      id: "baked-salmon-lemon-butter",
      category: "dinner",
      title: "Baked Salmon with Lemon Butter",
      description: "Oven-baked salmon fillets with garlic, lemon, and melted butter.",
      image: "images/recipes/lemon-butter-salmon.webp",
      imageAlt: "Baked salmon with lemon butter",
      ingredients: [
        "2 salmon fillets",
        "2 tbsp melted butter",
        "1 tbsp lemon juice",
        "2 garlic cloves, minced",
        "Salt and pepper",
        "Parsley for garnish"
      ],
      prepTime: "28 minutes",
      servingSize: "Serves 2",
      instructions: [
        "Preheat oven to 200 C.",
        "Place salmon on a lined tray and season.",
        "Pour butter, lemon juice, and garlic over fillets.",
        "Bake for 12-15 minutes and garnish with parsley."
      ]
    },
    {
      id: "chocolate-lava-cake",
      category: "dessert",
      title: "Chocolate Lava Cake",
      description: "Warm chocolate cake with a rich molten center.",
      image: "images/recipes/chocolate_lava_cake.webp",
      imageAlt: "Chocolate lava cake",
      ingredients: [
        "100g dark chocolate",
        "100g butter",
        "2 eggs",
        "1/4 cup sugar",
        "1/4 cup flour",
        "Pinch of salt"
      ],
      prepTime: "22 minutes",
      servingSize: "Serves 2",
      instructions: [
        "Melt chocolate and butter together.",
        "Whisk eggs and sugar until light.",
        "Fold in chocolate mix, flour, and salt.",
        "Bake in ramekins at 220 C for 9-11 minutes."
      ]
    },
    {
      id: "vanilla-ice-cream-sundae",
      category: "dessert",
      title: "Vanilla Ice Cream Sundae",
      description: "Classic sundae with vanilla scoops, sauce, nuts, and cherries.",
      image: "images/recipes/vanilla_ice_cream_sundae.avif",
      imageAlt: "Vanilla ice cream sundae",
      ingredients: [
        "3 scoops vanilla ice cream",
        "Chocolate sauce",
        "Whipped cream",
        "Toasted nuts",
        "Maraschino cherry"
      ],
      prepTime: "10 minutes",
      servingSize: "Serves 1-2",
      instructions: [
        "Place scoops of ice cream in a chilled glass.",
        "Drizzle with chocolate sauce.",
        "Add whipped cream and toasted nuts.",
        "Top with cherry and serve immediately."
      ]
    },
    {
      id: "watalappan-sri-lankan-coconut-custard",
      category: "dessert",
      title: "Watalappan (Sri Lankan Coconut Custard)",
      description: "Spiced coconut milk custard sweetened with jaggery and steamed to silky perfection.",
      image: "images/recipes/watalappan.jpg",
      imageAlt: "Watalappan coconut custard",
      ingredients: [
        "400ml thick coconut milk",
        "180g grated jaggery",
        "4 eggs",
        "1/2 tsp cardamom powder",
        "Pinch of nutmeg",
        "Cashews for topping"
      ],
      prepTime: "40 minutes",
      servingSize: "Serves 6",
      instructions: [
        "Dissolve jaggery in warm coconut milk.",
        "Whisk eggs gently and mix with coconut jaggery base.",
        "Add cardamom and nutmeg, then strain.",
        "Steam in a covered dish for 25-30 minutes until set."
      ]
    },
    {
      id: "french-toast-maple-syrup",
      category: "breakfast",
      title: "French Toast with Maple Syrup",
      description: "Golden pan-fried bread dipped in cinnamon egg custard.",
      image: "images/recipes/french_toast_with_maple_syrup.jpg",
      imageAlt: "French toast with maple syrup",
      ingredients: [
        "4 slices brioche bread",
        "2 eggs",
        "1/2 cup milk",
        "1/2 tsp cinnamon",
        "1 tsp vanilla",
        "Maple syrup"
      ],
      prepTime: "18 minutes",
      servingSize: "Serves 2",
      instructions: [
        "Whisk eggs, milk, cinnamon, and vanilla.",
        "Dip each bread slice briefly in mixture.",
        "Cook in a buttered pan until golden on both sides.",
        "Serve warm with maple syrup."
      ]
    },
    {
      id: "egg-cheese-breakfast-sandwich",
      category: "breakfast",
      title: "Egg and Cheese Breakfast Sandwich",
      description: "Quick breakfast sandwich with fluffy eggs and melted cheese.",
      image: "images/recipes/egg_and_cheese_sandwich.jpg",
      imageAlt: "Egg and cheese sandwich",
      ingredients: [
        "2 sandwich buns",
        "2 eggs",
        "2 cheese slices",
        "1 tbsp butter",
        "Salt and pepper"
      ],
      prepTime: "15 minutes",
      servingSize: "Serves 2",
      instructions: [
        "Toast the buns lightly.",
        "Cook eggs as scrambled or folded omelet style.",
        "Place eggs and cheese on buns while hot.",
        "Close sandwich and serve immediately."
      ]
    },
    {
      id: "oatmeal-fruits-nuts",
      category: "breakfast",
      title: "Oatmeal with Fruits and Nuts",
      description: "Hearty oats topped with banana, berries, and crunchy nuts.",
      image: "images/recipes/oatmeal-with-fruit-nuts.jpg",
      imageAlt: "Oatmeal with fruits and nuts",
      ingredients: [
        "1 cup rolled oats",
        "2 cups milk or water",
        "1 banana, sliced",
        "1/2 cup berries",
        "2 tbsp chopped nuts",
        "Honey to taste"
      ],
      prepTime: "12 minutes",
      servingSize: "Serves 2",
      instructions: [
        "Cook oats with milk until creamy.",
        "Transfer to serving bowls.",
        "Top with banana, berries, and nuts.",
        "Drizzle with honey and enjoy warm."
      ]
    },
    {
      id: "chicken-caesar-salad",
      category: "lunch",
      title: "Chicken Caesar Salad",
      description: "Crisp romaine, grilled chicken, parmesan, and creamy Caesar dressing.",
      image: "images/recipes/chicken_caesar_salad.webp",
      imageAlt: "Chicken Caesar salad",
      ingredients: [
        "2 cups romaine lettuce",
        "150g grilled chicken",
        "1/4 cup croutons",
        "2 tbsp Caesar dressing",
        "2 tbsp grated parmesan"
      ],
      prepTime: "20 minutes",
      servingSize: "Serves 2",
      instructions: [
        "Slice grilled chicken into strips.",
        "Toss lettuce with Caesar dressing.",
        "Add chicken, croutons, and parmesan.",
        "Serve chilled as a light lunch."
      ]
    },
    {
      id: "tuna-pasta-salad",
      category: "lunch",
      title: "Tuna Pasta Salad",
      description: "Cool pasta salad with tuna, vegetables, and lemon mayo dressing.",
      image: "images/recipes/Tuna-Pasta-Salad.jpg",
      imageAlt: "Tuna pasta salad",
      ingredients: [
        "2 cups cooked pasta",
        "1 can tuna, drained",
        "1/2 cup cucumber, diced",
        "1/2 cup sweet corn",
        "2 tbsp mayonnaise",
        "1 tsp lemon juice"
      ],
      prepTime: "18 minutes",
      servingSize: "Serves 2-3",
      instructions: [
        "Combine pasta, tuna, cucumber, and corn in a bowl.",
        "Mix mayo and lemon juice separately.",
        "Fold dressing into pasta mixture.",
        "Chill for 10 minutes before serving."
      ]
    },
    {
      id: "beef-stir-fry-vegetables",
      category: "lunch",
      title: "Beef Stir-Fry with Vegetables",
      description: "Tender beef strips tossed with crisp vegetables in a savory sauce.",
      image: "images/recipes/beef-stir-fry.jpg",
      imageAlt: "Beef stir-fry with vegetables",
      ingredients: [
        "250g beef strips",
        "1 bell pepper, sliced",
        "1 cup broccoli",
        "1 carrot, julienned",
        "2 tbsp soy sauce",
        "1 tsp cornstarch"
      ],
      prepTime: "25 minutes",
      servingSize: "Serves 2",
      instructions: [
        "Coat beef with soy sauce and cornstarch.",
        "Sear beef in a hot pan and set aside.",
        "Stir-fry vegetables until crisp-tender.",
        "Return beef to pan, toss, and serve."
      ]
    },
    {
      id: "chicken-alfredo-pasta",
      category: "dinner",
      title: "Chicken Alfredo Pasta",
      description: "Creamy Alfredo pasta with juicy seasoned chicken pieces.",
      image: "images/recipes/chicken_alfredo_pasta.jpg",
      imageAlt: "Chicken Alfredo pasta",
      ingredients: [
        "250g fettuccine",
        "200g chicken breast",
        "1 cup cream",
        "1/2 cup parmesan",
        "2 garlic cloves",
        "Salt and pepper"
      ],
      prepTime: "35 minutes",
      servingSize: "Serves 3",
      instructions: [
        "Cook pasta and reserve some pasta water.",
        "Pan-sear seasoned chicken and slice.",
        "Prepare Alfredo sauce with garlic, cream, and parmesan.",
        "Combine pasta, chicken, and sauce until silky."
      ]
    },
    {
      id: "vegetable-noodles-stir-fry",
      category: "dinner",
      title: "Vegetable Noodles Stir-Fry",
      description: "Fast and flavorful noodles with crunchy vegetables and soy glaze.",
      image: "images/recipes/Vegetable-stir-fry.jpg",
      imageAlt: "Vegetable noodles stir-fry",
      ingredients: [
        "200g noodles",
        "1 carrot, julienned",
        "1 bell pepper, sliced",
        "1 cup cabbage, shredded",
        "2 tbsp soy sauce",
        "1 tsp chili sauce"
      ],
      prepTime: "22 minutes",
      servingSize: "Serves 2",
      instructions: [
        "Boil noodles and drain well.",
        "Stir-fry vegetables over high heat.",
        "Add noodles, soy sauce, and chili sauce.",
        "Toss quickly and serve hot."
      ]
    },
    {
      id: "grilled-beef-steak-garlic-butter",
      category: "dinner",
      title: "Grilled Beef Steak with Garlic Butter",
      description: "Juicy grilled steak finished with fragrant garlic herb butter.",
      image: "images/recipes/grilled_beef_steak_with_garlic_butter.jpg",
      imageAlt: "Grilled beef steak with garlic butter",
      ingredients: [
        "2 beef steaks",
        "1 tbsp olive oil",
        "2 tbsp butter",
        "2 garlic cloves, minced",
        "Salt and black pepper",
        "Fresh parsley"
      ],
      prepTime: "30 minutes",
      servingSize: "Serves 2",
      instructions: [
        "Season steaks with salt and pepper.",
        "Grill 3-5 minutes per side to preferred doneness.",
        "Melt butter with garlic and parsley.",
        "Rest steaks, spoon garlic butter over, and serve."
      ]
    },
    {
      id: "strawberry-cheesecake",
      category: "dessert",
      title: "Strawberry Cheesecake",
      description: "Creamy baked cheesecake topped with sweet strawberry sauce.",
      image: "images/recipes/strawberry_cheesecake.jpg",
      imageAlt: "Strawberry cheesecake",
      ingredients: [
        "200g cream cheese",
        "1 cup crushed biscuits",
        "3 tbsp melted butter",
        "1/3 cup sugar",
        "1 egg",
        "Strawberry topping"
      ],
      prepTime: "50 minutes",
      servingSize: "Serves 6",
      instructions: [
        "Press biscuit crumbs and butter into a cake tin.",
        "Beat cream cheese, sugar, and egg until smooth.",
        "Bake at 160 C for 30-35 minutes.",
        "Cool, chill, then top with strawberry sauce."
      ]
    },
    {
      id: "mango-pudding",
      category: "dessert",
      title: "Mango Pudding",
      description: "Silky mango dessert served chilled with cream or fresh fruit.",
      image: "images/recipes/mango_pudding.webp",
      imageAlt: "Mango pudding",
      ingredients: [
        "1 cup mango puree",
        "1/2 cup milk",
        "1/2 cup cream",
        "2 tbsp sugar",
        "1 tbsp gelatin"
      ],
      prepTime: "20 minutes + chill",
      servingSize: "Serves 4",
      instructions: [
        "Bloom gelatin in warm water.",
        "Warm milk, cream, and sugar until dissolved.",
        "Mix in mango puree and gelatin.",
        "Pour into cups and chill until set."
      ]
    },
    {
      id: "brownies-chocolate-chips",
      category: "dessert",
      title: "Brownies with Chocolate Chips",
      description: "Fudgy chocolate brownies with crisp edges and gooey center.",
      image: "images/recipes/brownies-with-chocolate-chips.webp",
      imageAlt: "Brownies with chocolate chips",
      ingredients: [
        "1/2 cup melted butter",
        "1 cup sugar",
        "2 eggs",
        "1/2 cup cocoa powder",
        "1/2 cup flour",
        "1/2 cup chocolate chips"
      ],
      prepTime: "35 minutes",
      servingSize: "Serves 8",
      instructions: [
        "Mix butter, sugar, and eggs until glossy.",
        "Fold in cocoa powder and flour.",
        "Stir in chocolate chips and pour into pan.",
        "Bake at 175 C for 22-25 minutes."
      ]
    }
  ];

  const recipeMap = recipeCollection.reduce(function (map, recipe) {
    map[recipe.id] = recipe;
    return map;
  }, {});

  const recipeDescription = document.getElementById("recipeDescription");
  const recipeMainImage = document.getElementById("recipeMainImage");
  const recipeIngredients = document.getElementById("recipeIngredients");
  const recipePrepTime = document.getElementById("recipePrepTime");
  const recipeServingSize = document.getElementById("recipeServingSize");
  const recipeInstructions = document.getElementById("recipeInstructions");
  const recipeCategory = document.getElementById("recipeCategory");
  const recipeCatalog = document.getElementById("recipeCatalog");
  const recipeCatalogEmpty = document.getElementById("recipeCatalogEmpty");
  const filterBar = document.getElementById("recipeFilterBar");
  const filterButtons = filterBar ? filterBar.querySelectorAll("[data-filter]") : [];

  const requiredElements = [
    recipeTitle,
    recipeDescription,
    recipeMainImage,
    recipeIngredients,
    recipePrepTime,
    recipeServingSize,
    recipeInstructions,
    recipeCategory,
    recipeCatalog,
    recipeCatalogEmpty
  ];

  if (requiredElements.some(function (element) { return !element; })) {
    return;
  }

  function toTitleCase(value) {
    return value.charAt(0).toUpperCase() + value.slice(1);
  }

  function renderDetails(recipe) {
    document.title = "DishDiary | " + recipe.title;
    recipeTitle.textContent = recipe.title;
    recipeDescription.textContent = recipe.description;
    recipeMainImage.src = recipe.image;
    recipeMainImage.alt = recipe.imageAlt;
    recipeCategory.textContent = toTitleCase(recipe.category);
    recipePrepTime.textContent = recipe.prepTime;
    recipeServingSize.textContent = recipe.servingSize;

    recipeIngredients.innerHTML = recipe.ingredients
      .map(function (ingredient) {
        return "<li>" + ingredient + "</li>";
      })
      .join("");

    recipeInstructions.innerHTML = recipe.instructions
      .map(function (step) {
        return "<li>" + step + "</li>";
      })
      .join("");
  }

  function setActiveFilter(filter) {
    filterButtons.forEach(function (button) {
      button.classList.toggle("active", button.dataset.filter === filter);
    });
  }

  function renderCatalog(filter, selectedRecipeId) {
    const filteredRecipes = recipeCollection.filter(function (recipe) {
      return filter === "all" || recipe.category === filter;
    });

    if (!filteredRecipes.length) {
      recipeCatalog.innerHTML = "";
      recipeCatalogEmpty.classList.remove("d-none");
      return;
    }

    recipeCatalogEmpty.classList.add("d-none");
    recipeCatalog.innerHTML = filteredRecipes
      .map(function (recipe) {
        const selectedClass = recipe.id === selectedRecipeId ? " selected" : "";
        return [
          '<div class="col-sm-6 col-lg-4">',
          '<a href="recipe.html?recipe=' + recipe.id + "&category=" + filter + '" class="text-decoration-none text-dark">',
          '<article class="card border-0 shadow-sm h-100 recipe-catalog-card' + selectedClass + '">',
          '<img src="' + recipe.image + '" class="card-img-top" alt="' + recipe.imageAlt + '">',
          '<div class="card-body">',
          '<span class="recipe-category-badge mb-2 d-inline-block">' + toTitleCase(recipe.category) + "</span>",
          "<h5>" + recipe.title + "</h5>",
          "<p class=\"mb-0\">" + recipe.description + "</p>",
          "</div>",
          "</article>",
          "</a>",
          "</div>"
        ].join("");
      })
      .join("");
  }

  const params = new URLSearchParams(window.location.search);
  const categoryParam = params.get("category") || "all";
  const validCategories = ["all", "breakfast", "lunch", "dinner", "dessert"];
  const activeCategory = validCategories.indexOf(categoryParam) > -1 ? categoryParam : "all";
  
  let recipeId = params.get("recipe");
  if (!recipeId && activeCategory !== "all") {
    const firstRecipeInCategory = recipeCollection.find(function (recipe) {
      return recipe.category === activeCategory;
    });
    recipeId = firstRecipeInCategory ? firstRecipeInCategory.id : recipeCollection[0].id;
  }
  recipeId = recipeId || recipeCollection[0].id;
  
  const selectedRecipe = recipeMap[recipeId] || recipeCollection[0];

  renderDetails(selectedRecipe);
  setActiveFilter(activeCategory);
  renderCatalog(activeCategory, selectedRecipe.id);

  filterButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      const filter = button.dataset.filter;
      setActiveFilter(filter);
      renderCatalog(filter, selectedRecipe.id);
      if (window.history && typeof window.history.replaceState === "function") {
        window.history.replaceState(null, "", "recipe.html?recipe=" + selectedRecipe.id + "&category=" + filter);
      }
    });
  });
});