<?php

class Image
{
    public function __construct()
    {
    }

    public function getImages($image_dir)
    {
        $i = 0;
        if ($handle = opendir($image_dir)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != '.' && $entry != '..') {
                    $i++;
                    $images[$i]['filename'] = $entry;
                    $image_data = $this->GetImageData($entry);
                    if (is_array($image_data)) {
                    $images[$i]['title'] = $image_data['title'];
                        $images[$i]['description'] = $image_data['description'];
                    } else {
                        $msg = $this->GetImageData($entry);
                        return $msg;
                    }
                }
            }
        }
        closedir($handle);
        return $images;
    }
    public function GetImageData($filename)
    {
        $mysqli = new mysqli ('localhost', 'root', 'root', 'projet_images');
        $mysqli->set_charset("utf8");
        if ($mysqli->connect_errno) {
            $msg = 'Echec de connexion à la base de donnée. Erreur :' . $mysqli->connect_errno;
            return $msg;
            exit();
        } else {
            $result = $mysqli->query('SELECT * FROM images WHERE filename ="' . $filename . '"');
            if (!$result) {
                $msg = 'Une erreur est survenue lors de l\'insertion des données dans la base. Message d\'erreur :' . $mysqli->error;
                return $msg;
            } else {
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
    public function UpdateImageData($title, $description, $filename)
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
                $msg= 'La mise à jour a bien été effectuée dans la base de donnée.';
                return $msg;
                $mysqli->close();
            }
        }
    }


}
