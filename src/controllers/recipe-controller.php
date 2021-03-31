<?php

require __DIR__ . '/../models/recipe-model.php';

function browseRecipes(): void
{
    $recipes = getAllRecipes();

    require __DIR__ . '/../views/index.php';
}

function showRecipe(int $id): void
{
    $recipe = getRecipeById($id);

    if (!isset($recipe['title']) || !isset($recipe['description'])) {
        header('Location: /');
    }

    require __DIR__ . '/../views/show.php';
}

function addRecipe(): void
{
    $errors = [];
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
        $recipe = "";
        if (!empty($_POST['title']) && !empty($_POST['description'])) {
            $recipe = array_map("trim", $_POST);
            if (strlen($recipe['title']) > 4) {
                $errors[] = "Max lenght error";
            }
        } else {
            $errors[] = "Tous les champs sont requis";
        }

        if (empty($errors)) {
            saveRecipe($recipe);
            header('Location: /');
        }
    }
    require __DIR__ . '/../views/form.php';
}
