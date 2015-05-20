<?php
require('Process/config.php');
require('class/Image.php');
require('Process/process_image.php');
$image = new Image();
$images_data = $image->getImages();
require('beginning.html');
?>
<h1><?php echo WEB_TITLE ?></h1>
<ul>
    <?php foreach ($images_data as $image) : ?>
        <li><img src="<?php echo IMAGE_DIR_URL . '/' . $image['filename'] ?>"/>

            <form method="post" action="">
                <p>Titre : <input type="text" name="title" value="<?php echo $image['title'] ?>"/></p>
                <?php if (empty ($image['title'])): ?>
                    <input type="hidden" name="newentry" value="1">
                <?php endif ?>
                <input type="hidden" name="filename" value="<?php echo $image['filename'] ?>"/>

                <p>Description: <textarea name="description" cols="50"
                                          rows="5"><?php echo $image['description'] ?></textarea></p>

                <p><input type="submit" name="formImageSubmit" value="validez"/></p>
            </form>
        </li>
    <?php endforeach;
    if (isset($msg)) { ?>
        <div class="msg"><?php echo $msg ?></div>
    <?php }
    ?>
</ul>
<?php require('ending.html') ?>