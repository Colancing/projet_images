<?php
define ('WEB_DIR_NAME', 'projet_images');
define ('IMAGE_DIR_NAME', 'images');
define ('IMAGE_DIR_PATH', $_SERVER['DOCUMENT_ROOT'] . '/' . IMAGE_DIR_NAME);
define ('WEB_DIR_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/' . WEB_DIR_NAME . '/');
define ('IMAGE_DIR_URL', WEB_DIR_URL . IMAGE_DIR_NAME);
define ('WEB_TITLE', 'Projet Images');
$constants = get_defined_constants(true);


