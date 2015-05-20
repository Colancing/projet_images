<?php
if (isset ($_POST['formImageSubmit'])) {
    if ((empty ($_POST['title'])) OR (empty ($_POST['description'])) OR (empty ($_POST['filename']))) {
        $msg = 'Une des information est manquante.';
    } else {
        $title = trim($_POST['title']);
        $description = trim($_POST['description']);
        $filename = trim($_POST['filename']);
//        Il faut entrer une nouvelle donnée dans le tableau
        if (isset ($_POST['newentry'])) {
            $image = new Image();
            $insertImage = $image->insertImage($title, $description, $filename);
            $msg =  $insertImage;
            }
        //            il faut mettre à jour une donnée
        else {
            $image = new Image();
            $updateimage = $image->UpdateImageData($title, $description, $filename);
                $msg =  $updateimage;
            }
        }
    }