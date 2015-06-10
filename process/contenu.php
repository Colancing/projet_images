<?php
$image = new Image();
$images_data = $image->getImages();
?>
<?php include('beginning.html') ?>
    <!--Affichage-->
    <h1><?php echo WEB_TITLE ?></h1>
    <ul>
        <?php foreach ($images_data as $image) : ?>
            <li><img src="<?php echo IMAGE_DIR_URL . '/' . $image['filename'] ?>"/>

                <p><?php echo $image['title'] ?></p>

                <p><?php echo $image['description'] ?></p>
            </li>
        <?php endforeach ?>
    </ul>
<?php include('ending.html') ?>