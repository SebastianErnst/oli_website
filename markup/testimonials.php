<?php

$introText = '';

if (($file = fopen(DATA_PATH."Testimonials.csv", "r")) === FALSE) {
  return;
}

$testimonials = [];
while (($data = fgetcsv($file, 0, ",")) !== FALSE)  {
    $testimonials[] = $data;
}

fclose($file);

$name = 0;
$age = 1;
$rating = 2;
$image = 3;
$text = 4;
$description = 5;

?>

<section id="about" class="testimonials-section additional-content section-dark">
    <div class="main-wrapper">
        <div class="inner-wrapper">
            <h2>Referenzen</h2>
            <p class="keymessage"><?php echo $introText; ?></p>
            <div class="testimonials">
                <div class="swiper-container" data-swiper-container>
                    <div class="swiper-wrapper">
                        <?php for ($i = 1; $i < count($testimonials); $i++):?>
                        <?php
                            $swipeLength = '';
                            if (strlen($testimonials[$i][$text]) < 1000) {
                                $swipeLength = ' three-quarter';
                            }
                            if (strlen($testimonials[$i][$text]) < 500) {
                                $swipeLength = ' half';
                            }
                        ?>
                        <div class="swiper-slide<?php echo $swipeLength; ?>">
                            <div class="testimonial">
                                <div class="top-content">
                                    <div class="rating-image-wrapper">
                                        <div class="rating">
                                            <?php if (empty($testimonials[$i][$rating]) === false): ?>
                                            <?php for ($j = 1; $j < 6; $j++) {
                                                if ($j <= $testimonials[$i][$rating]) {
                                                    echo '<div class="icon icon-star-full"></div>';
                                                    continue;
                                                }
                                                if ($j > $testimonials[$i][$rating]) {
                                                    if ($j - 0.5 == $testimonials[$i][$rating]) {
                                                        echo '<div class="icon icon-star-half"></div>';
                                                        continue;
                                                    }
                                                    echo '<div class="icon icon-star-empty"></div>';
                                                }
                                            } ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="image">
                                            <div class="icon icon-heart"></div>
                                            <img src="<?php echo TESTIMONIAL_MEDIA_PATH.$testimonials[$i][$image]; ?>" alt="">
                                        </div>
                                    </div>
                                    <blockquote class="quote">
                                        <div class="text"><?php echo $testimonials[$i][$text]; ?></div>
                                    </blockquote>
                                </div>
                                <div class="bottom-content">
                                    <span class="name"><?php echo $testimonials[$i][$name]. ", ". $testimonials[$i][$age]; ; ?></span>
                                    <span class="description"><?php echo $testimonials[$i][$description]; ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
</section>