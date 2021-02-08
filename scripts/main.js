import $ from 'jquery';
import Swiper from '../node_modules/swiper/js/swiper.min';

class MainApplication {
    constructor() {
        // $(document).foundation();
        $('[data-main-menu-trigger]').on('click', () => {
            $('[data-main-menu-trigger]').find('.hamburger-icon').toggleClass('active');
            $('[data-main-menu]').toggleClass('active');
        })

        $('.video-wrapper').on('click', () => {
            console.log('a')
            let video = $('.video-wrapper').find('video')[0];
            if (video.paused === true) {
                video.play();
                $('.video-trigger').hide();
            } else {
                video.pause();
                $('.video-trigger').show();
            }
        });

        $('[data-swiper-container]').each((index, element) => {
            new Swiper(element, {
                slidesPerView: 3,
                spaceBetween: 25,
                pagination: {
                    el: $(element).parent().find('.swiper-pagination'),
                    type: 'bullets',
                },
                navigation: {
                    nextEl: $(element).parent().find('.swiper-button-next'),
                    prevEl: $(element).parent().find('.swiper-button-prev')
                },
                autoplay: {
                    delay: 5000,
                }
            });
        });
    }
}

new MainApplication();

