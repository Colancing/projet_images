<?php
require('../process/config.php');
require('../class/Image.php');
require('../process/process_image.php');
$image = new Image();
$images_data = $image->getImages(IMAGE_DIR_PATH);
require('beginning.html');
?>
    <h1><?php echo WEB_TITLE ?></h1>
<?php if (isset($msg_error)) { ?>
    <div class="msg_error"><?php echo $msg_error ?></div>
<?php
}
?>
<?php if (isset($msg_success)) { ?>
    <div class="msg_success"><?php echo $msg_success ?></div>
<?php
}
?>
<ul>
    <?php foreach ($images_data as $image) : ?>
        <li><img src="<?php echo IMAGE_DIR_URL . '/' . $image['filename'] ?>"/>

            <form method="post" action="">
                <p>Titre : <input type="text" name="title" value="<?php echo $image['title'] ?>"/></p>
                <?php if (empty ($image['title'])): ?>
                    <input type="hidden" name="noentry" value="1">
                <?php endif ?>
                <input type="hidden" name="filename" value="<?php echo $image['filename'] ?>"/>

                <p>Description: <textarea name="description" cols="50"
                                          rows="5"><?php echo $image['description'] ?></textarea></p>

                <p><input type="submit" name="formImageSubmit" value="validez"/></p>
            </form>
        </li>
    <?php endforeach; ?>
</ul>
<?php require('ending.html') ?>