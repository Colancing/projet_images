<?php

class Image
{
    public function __construct()
    {
    }

    public function getImages($image_dir)
    {
        $i = 0;
//        /Applications/MAMP/htdocs/php_avance/projet_images/images
        if ($handle = opendir($image_dir)) {
            while (false !== ($entry = readdir($handle))) {
//                problème -> $entry renvoie '.'
                if ($entry != '.' && $entry != '..') {
                    $i++;
                    $images[$i]['filename'] = $entry;
                    $image_data = $this->GetImageData($entry);
                    $images[$i]['title'] = $image_data['title'];
                    $images[$i]['description'] = $image_data['description'];
                }
            }
            closedir($handle) ;
            return $images ;
        }
    }
public  function GetImageData($filename)
{
    $mysqli = new mysqli ('localhost', 'root', 'root', 'projet_images');
    $mysqli->set_charset("utf8");
    if ($mysqli->connect_errno) {
        //        Si erreur de connexion à mysql
        $msg_error = 'Echec de connexion à la base de donnée. Erreur :' . $mysqli->connect_errno;
        return $msg_error;
        exit();
    } else {
        //            Si connexion à mysql ok
        $result = $mysqli->query('SELECT * FROM images WHERE filename ="' . $filename . '"');
//SI il n'y a pas de donnée dans la BDD correspondant à $filename
        if (!$result) {
            echo 'Aucune donnée concernant cette image dans la base de donnée n\'a été récupérée :' . $mysqli->error;
            return false;
        } else {
            //Si il y a des données correspondant à ce filename on les récupère dans le tableau $image data

            $row = $result->fetch_array();
            $image_data['id'] = $row['id'];
            $image_data['title'] = $row['title'];
            $image_data['description'] = $row['description'];
            $image_data['filename'] = $row['filename'];
            return $image_data;
        }
        $mysqli->close();
    }
}
public function insertImage($title, $description, $filename)
{
    $mysqli = new mysqli ('localhost', 'root', 'root', 'projet_images');
    $mysqli->set_charset("utf8");
    if ($mysqli->connect_errno) {
        $msg = 'Echec de connexion à la base de donnée' . $mysqli->connect_errno;
        return $msg;
        exit();
    } else {
        if (!$mysqli->query('INSERT INTO images (title, description, filename) VALUES ("' . $title . '"," ' . $description . ' ","' . $filename . '")')) {
            $msg = 'Une erreur est survenue lors de l\'insertion des données dans la base. <br/>
Le Message d\'erreur est :' . $mysqli->error;
            return $msg;
        } else {
            $msg = 'Une nouvelle entrée a bien été crée dans la base de donnée';
            return $msg;
            $mysqli->close();
        }
    }
}

public
function UpdateImageData($title, $description, $filename)
{
    $mysqli = new mysqli ('localhost', 'root', 'root', 'projet_images');
    $mysqli->set_charset("utf8");
    if ($mysqli->connect_errno) {
        $msg = 'Echec de connexion à la base de donnée' . $mysqli->connect_errno;
        return $msg;
        exit();
    } else {
        if (!$mysqli->query('UPDATE images SET title=" ' . $title . '" , description = " ' . $description . '"
            WHERE filename = " ' . $filename . '"')
        ) {
            $msg = 'Une erreur est survenue lors de la mise à jour des données dans la base. <br/>
Le Message d\'erreur est :' . $mysqli->error;
            return $msg;
        } else {
            $msg = 'La mise à jour a bien été effectuée dans la base de donnée.';
            return $msg;
            $mysqli->close();
        }
    }
}


}
