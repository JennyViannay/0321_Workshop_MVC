<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Add</title>
    </head>
    <body>
        <h1>Add recipe</h1>
        <?php foreach($errors as $error) { ?>
        <p><?= $error ?></p>
        <?php } ?>
        <form method="POST">
            <label for="title">Title</label>
            <input type="text" id="title" name="title">
            <label for="description">Title</label>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
            <button type="submit">Add</button>
        </form>
    </body>
</html>