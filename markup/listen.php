<?php
$videoIds = [
    'XXzhW9pJxpw',
    'ktmjHa6kKDE',
    'Hrt6IjH4NuY',
    'RIGRULG9hu0'
];
?>
<section id="listen" class="listen">
    <div class="main-wrapper">
        <div class="inner-wrapper">
            <h2>Listen</h2>
            <div class="gallery">
                <ul class="gallery-list" data-gallery>
                    <?php for ($i = 0; $i < count($videoIds); $i++): ?>
                        <li href="https://www.youtube.com/watch?v=<?php echo $videoIds[$i]; ?>">
                            <div class="hover-wrapper">
                                <div class="video">
                                    <img src="https://img.youtube.com/vi/<?php echo $videoIds[$i]; ?>/0.jpg">
                                    <div class="play-button"></div>
                                </div>
                            </div>
                        </li>
                    <?php endfor; ?>
                </ul>
            </div>
            <iframe class="iframe" scrolling="no"
                    allow="autoplay"
                    src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/playlists/1058821102&amp;color=FF8F00&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true"
                    width="100%" height="450" frameborder="no">
            </iframe>
        </div>
    </div>
</section>