<?php

$introText = '';

if (($file = fopen(DATA_PATH."Testimonials.csv", "r")) === FALSE) {
  return;
}

$testimonials = [];
while (($data = fgetcsv($file, 0, ",")) !== FALSE)  {
    $testimonials[] = $data;
}
count($testimonials);

fclose($file);
?>

<section id="about" class="testimonials-section additional-content section-dark">
    <div class="main-wrapper">
        <div class="inner-wrapper">
            <h2>Referenzen</h2>
            <p class="keymessage"><?php echo $introText; ?>
            </p>
            <div class="testimonials">
                <div class="swiper-container" data-swiper-container>
                    <div class="swiper-wrapper">
                        <?php for ($i = 1; $i < count($testimonials); $i++):?>
                        <!-- Rating $testimonials[$i]2] -->
                        <div class="swiper-slide">
                            <div class="testimonial">
                                <div class="top-content">
                                    <div class="image">
                                        <div class="icon icon-heart"></div>
                                        <img src="<?php echo TESTIMONIAL_MEDIA_PATH.$testimonials[$i][3]; ?>" alt="">
                                    </div>
                                    <blockquote class="quote">
                                        <div class="text"><?php echo $testimonials[$i][4]; ?></div>
                                    </blockquote>
                                </div>
                                <div class="bottom-content">
                                    <span class="name"><?php echo $testimonials[$i][0]. ", ". $testimonials[$i][1]; ; ?></span>
                                    <span class="description"><?php echo $testimonials[$i][5]; ?></span>
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