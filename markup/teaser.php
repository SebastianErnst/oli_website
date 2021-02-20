<?php

$claims = [
    'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis dolorum eaque, magnam natus nemo pariatur.',
];
$headline = $claims[array_rand($claims)];

$images = [
    'teaser-3.jpg'
];

$image = $images[array_rand($images)];
?>


<section id="about" class="teaser-section additional-content section-green">
    <div class="main-wrapper">
        <div class="inner-wrapper">
            <div class="background-image" style="background-image: url('<?php echo TEASER_MEDIA_PATH.$image?>')"></div>
            <p class="keymessage"><?php echo $headline; ?></p>
            <p class="intro">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aut debitis eos, excepturi incidunt itaque maxime non qui quia quos sint sit tempore vero? Accusantium debitis doloremque id tenetur ullam?</p>
            <a href="./kontakt" class="button">
                <span> Probetraining</span>
            </a>
        </div>
    </div>
</section>