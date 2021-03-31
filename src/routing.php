<?php

require __DIR__.'/controllers/recipe-controller.php';

$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if ('/' === $urlPath) {
    browseRecipes();
} elseif ('/show' === $urlPath && isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT, ["options" => ["min_range" => 1]]);
    showRecipe($id);
} elseif ('/add' === $urlPath) {
    addRecipe();
} else {
    header('HTTP/1.1 404 Not Found');
}