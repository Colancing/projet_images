<!DOCTYPE html>
<html>
<head lang="fr">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css" type="text/css">
    <title></title>
</head>
<body>

<form id="uploadForm" action="" method="post" enctype="multipart/form-data">
    <p>Ajoutez des images</p>
    <input type="file" value="" name="upload[]" multiple/><br>
    <input id="uploadFormSubmit" name="uploadFormSubmit" type="submit">
</form>
<?php echo '<pre>';
print_r($_FILES);
echo '</pre>';
?>
</body>
</html>
