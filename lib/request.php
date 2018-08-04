<?php
//pega url
$REQUEST_URI = filter_input(INPUT_SERVER, 'REQUEST_URI');
//limpa a url
$INITE = strpos($REQUEST_URI, '?');
if ($INITE):
    $REQUEST_URI = substr($REQUEST_URI, 0, $INITE);
endif;


//verifica se tem pasta com nome igual 
$REQUEST_URI_PASTA = substr($REQUEST_URI, 1);
$URL = explode('/', $REQUEST_URI_PASTA);
$URL[0] = ($URL[0] != '' ? $URL[0] : 'home');
 
if (file_exists('_site_/' . $URL[0] . '.php')):
    require('_site_/' . $URL[0] . '.php');
elseif (is_dir('_site_/' . $URL[0])):
    if (isset($URL[1]) && file_exists('_site_/' . $URL[0] . '/' . $URL[1] . '.php')):
        require('_site_/' . $URL[0] . '/' . $URL[1] . '.php');
    else:
        require('_site_/404.php');
    endif;
else:
    require('_site_/404.php');

    endif;
