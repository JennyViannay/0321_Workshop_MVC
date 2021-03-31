<?php
// ici acces au variables acces BDD
require_once 'config.php';
// Ici mon model recipe (get all, get one by, save Recipe)
require __DIR__ . '/src/models/recipe-model.php';
// 
$errors = [];
if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $recipe = "";
    // si n'est pas vide
    if (!empty($_POST['title']) && !empty($_POST['description'])){
        $recipe = array_map("trim", $_POST);
        if (strlen($recipe['title']) > 4 ) {
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

require __DIR__ . '/src/views/form.php';