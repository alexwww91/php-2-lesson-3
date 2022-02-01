<?php

const PHOTO_PATH = 'data/photo';
const PHOTO_SMALL_PATH = 'data/photo_small';

require_once 'Twig/Autoloader.php';
Twig_Autoloader::register();
try {
  $loader = new Twig_Loader_Filesystem('templates');
  $twig = new Twig_Environment($loader);
  $template = $twig->loadTemplate('index.tmpl');
  $photosInDir = array_slice(scandir(PHOTO_PATH), 2);
  echo $template->render(array(
    'title' => 'Список фотографий альбома',
    'path_to_photo_small' => PHOTO_SMALL_PATH,
    'photos' => $photosInDir
  ));
} catch (Exception $e) {
  die('ERROR: ' . $e->getMessage());
}
