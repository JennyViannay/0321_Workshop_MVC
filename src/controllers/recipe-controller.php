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

    require __DIR__.'/../views/show.php';
}