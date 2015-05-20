<?php
$image = new Image();
$images = $image->getImages(IMAGE_DIR_PATH);
?>
<!--Affichage-->
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1><?php echo WEB_TITLE ?></h1>
<ul>
    <?php foreach ($images as $image) : ?>
    <li> <img src="<?php echo IMAGE_DIR_URL . '/' .$image['filename'] ?>" />
        <p><?php echo $image['title'] ?></p>
        <p><?php echo $image['description'] ?></p>
    </li>
    <?php endforeach ?>
</ul>