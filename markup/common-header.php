<?php
$domain = 'http://www.sebern.de/oliver_kroiss';
$author = 'Online Training gegen Rückenschmerzen';
$metaDescription = 'Flexibel & effizient trainieren.';
$socialShareImage = 'social-share-image.png';

$socialShareImage = DOMAIN.'/assets/social-share-image.png';
?>

<!DOCTYPE html>
<html class="<?php  echo $templateClass; ?>">
<head>
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $author; ?></title>
    <meta name="author" content="<?php echo $author; ?>>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:domain" content="<?php echo $domain; ?>>">
    <meta name="twitter:title" content="<?php echo $author; ?>">
    <meta name="twitter:text:description" content="<?php echo $metaDescription; ?>">
    <meta name="twitter:description" content="<?php echo $metaDescription; ?>">
    <meta name="twitter:image" content="<?php echo $socialShareImage; ?>">

    <meta property="og:title" content="<?php echo $author; ?>">
    <meta property="og:url" content="<?php echo $domain; ?>">
    <meta property="og:type" content="article">
    <meta property="og:description" content="<?php echo $metaDescription; ?>">
    <meta property="og:image" content="<?php echo $socialShareImage; ?>">
    <meta property="og:updated_time" content="2020-08-18T11:07:26+02:00">
    <meta property="article:modified_time" content="2020-08-18T11:07:26+02:00">
    <meta name="description" content="<?php echo $metaDescription; ?>">

    <script defer src="build/runtime.js" type="module"></script>
    <script defer src="build/vendor.js" type="module"></script>
    <script defer src="build/main.js" type="module"></script>
    <link rel="stylesheet" type="text/css" href="./build/main.css">
</head>
<body>
    <div class="page-overlay"></div>