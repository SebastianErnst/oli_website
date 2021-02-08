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
            let $parent = $(element).parent();
            const testimonilSLider = new Swiper(element, {
                speed: 500,
                slidesPerView: 1.3,
                spaceBetween: 25,
                pagination: {
                    el: $parent.find('.swiper-pagination'),
                    type: 'bullets',
                },
                navigation: {
                    nextEl: $parent.find('.swiper-button-next'),
                    prevEl: $parent.find('.swiper-button-prev')
                }
                // loop: true
                // autoplay: {
                //     delay: 5000,
                // }
            });

            $parent.find('.swiper-slide-next').on('click', () => {
                testimonilSLider.slideNext();
            });

            testimonilSLider.on('slideChangeTransitionEnd', () => {
                $parent.find('.swiper-slide').off();
                $parent.find('.swiper-slide-next').on('click', () => {
                    testimonilSLider.slideNext();
                });

                $parent.find('.swiper-slide-prev').on('click', () => {
                    testimonilSLider.slidePrev();
                });
            });
        });
    }
}

new MainApplication();

