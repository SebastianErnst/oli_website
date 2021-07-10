<?php
error_reporting(E_ALL);

define('ENVIRONMENT', 'dev' );

if (ENVIRONMENT === 'dev') {
    define('DOMAIN', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/oliver_kroiss" );
} else {
    define('DOMAIN', (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/" );
}

define('ASSETS_PATH', './assets/' );
define('DATA_PATH', './data/');
define('TESTIMONIAL_MEDIA_PATH', ASSETS_PATH . 'testimonials/');
define('PILLARS_MEDIA_PATH', ASSETS_PATH . 'pillars/');
define('TEASER_MEDIA_PATH', ASSETS_PATH . 'teasers/');
define('PILLAR_IMG_1', PILLARS_MEDIA_PATH.'pillar-1.png');
define('PILLAR_IMG_2', PILLARS_MEDIA_PATH.'pillar-2.png');
define('PILLAR_IMG_3', PILLARS_MEDIA_PATH.'pillar-3.png');
define('PILLAR_IMG_4', PILLARS_MEDIA_PATH.'pillar-4.png');

//Mailhandler
require 'php/mailhandler.php';

// Routing
$path = $_SERVER['REQUEST_URI'];
$path = ltrim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path);
$path = $path['path'];
$pathElements = explode('/', $path);

if (ENVIRONMENT === 'dev') {
    array_shift($pathElements);
}

$path = implode('/', $pathElements);

if (count($pathElements) > 1) {
    $path = substr($path, 0, -1);
}

if (empty($path)) {
    getPage('homepage', 'Oliver Kroiss', 'homepage-header');
} else {
    switch ($path) {
        case 'mail':
            getPage('mail');
            break;
//        case 'infogespraech':
//            getPage('infogespraech', 'Info-Gespräch');
//            break;
        case 'das-team':
            getPage('das-team', 'Das Team');
            break;
        case 'preise':
            getPage('preise', 'Preise');
            break;
        case 'kontakt':
            getPage('kontakt', 'Kontakt');
            break;
        case 'ueber-ex-pain':
            getPage('ueber-ex-pain', 'Über Ex-Pain');
            break;
        case 'datenschutz':
            getPage('datenschutz', 'Datenschutz');
            break;
        case 'impressum':
            getPage('impressum', 'Impressum');
            break;
        case 'kontaktbestaetigung':
            getPage('kontaktbestaetigung', 'Kontaktbestätigung');
            break;
        case '404':
            header('HTTP/1.1 404 Not Found');
            getPage('404', '404');
            break;
        default:
            header('Location: '.DOMAIN.'/404');
    }
}

function getPage($name, $headline = '', $header = 'header') {
    $templateClass = $name;

    require "./markup/common-header.php";
    require "./markup/main-menu.php";
    require "./markup/$header.php";
    echo '<main>';
    require "./pages/$name.php";
    echo '</main>';
    require "./markup/footer.php";
    require "./markup/common-footer.php";
}


