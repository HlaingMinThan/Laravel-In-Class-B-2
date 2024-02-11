<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="/app.css">
</head>

<body>
    <h1>Home Page</h1>
    <?php foreach ($blogs as $blog) : ?>
        <h1><a href="/blogs/<?= $blog->filename; ?>"><?= $blog->title ?></a></h1>
        <p><?= $blog->intro ?></p>
    <?php endforeach; ?>
</body>

</html>