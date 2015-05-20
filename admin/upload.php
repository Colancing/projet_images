<?php
require('Process/config.php');
require('class/Image.php');
include('admin/beginning.html');
require('admin/menu.php');
require('Process/process_image.php');

if (!empty($_FILES)) {
    $image = new Image();
    $images = $image->upload($_FILES);
    if ($images === true) {
        $msg_success = "Le chargement a réussi";
    } else {
        $msg_error = "Le chargement a échoué";
    }
}
?>
    <h1>Upload</h1>
<?php if (isset($msg_success)) : ?>
    <p class="msg_success"><?php echo $msg_success ?></p>
<?php endif ?>
<?php if (isset($msg_error)) : ?>
    <p class="msg_error"><?php echo $msg_error ?></p>
<?php endif ?>
    <form id="uploadForm" action="" method="post" enctype="multipart/form-data">
        <p>Ajoutez des images</p>
        <input type="file" value="" name="upload[]" multiple="multiple">
        <input id="uploadFormSubmit" name="uploadFormSubmit" type="submit">
    </form>
<?php echo 'Voici le résultat du chargement : <pre>';
print_r($_FILES);
echo '</pre>';
?>
<?php include('ending.html') ?>