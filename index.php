<?php
define('ASSETS_PATH', './assets/' );
define('DATA_PATH', './data/');
define('TESTIMONIAL_MEDIA_PATH', ASSETS_PATH . 'testimonials/');
define('PILLARS_MEDIA_PATH', ASSETS_PATH . 'pillars/');
define('TEASER_MEDIA_PATH', ASSETS_PATH . 'teasers/');


// Routing
$path = ltrim($_SERVER['REQUEST_URI'], '/');
$elements = explode('/', $path);
$pageName = $elements[1];
if (empty($pageName)) {
    getPage('homepage', 'Oliver Kroiss', 'homepage-header');
} else {
    switch ($pageName) {
        case 'das-team':
            getPage('das-team', 'Das Team');
            break;
        case 'kontakt':
            getPage('kontakt', 'Kontakt');
            break;
        case 'ueber-firma':
            getPage('ueber-firma', 'Über Firma');
            break;
        default:
            header('HTTP/1.1 404 Not Found');
            getPage('404', '404');
    }
}

function getPage($name, $headline, $header = 'header') {
    require "./markup/common-header.php";
    require "./markup/main-menu.php";
    require "./markup/$header.php";
    echo '<main>';
    require "./pages/$name.php";
    echo '</main>';
    require "./markup/footer.php";
    require "./markup/common-footer.php";
}


