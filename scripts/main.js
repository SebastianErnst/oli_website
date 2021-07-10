import $ from 'jquery';
import Swiper from '../node_modules/swiper/js/swiper.min';
import Foundation from '../node_modules/foundation-sites';

class MainApplication {
    constructor() {
        $('[data-main-menu-trigger]').on('click', () => {
            $('[data-main-menu-trigger]').find('.hamburger-icon').toggleClass('active');
            $('[data-main-menu]').toggleClass('active');
        })

        $('.burger').on('click', (event) => {
            event.preventDefault();
            $('.burger').toggleClass('active');
            $('.main-menu').toggleClass('active');
            $('.page-overlay').toggleClass('active');
        });

        $('.video-wrapper').on('click', () => {
            let $wrapper =  $('.video-wrapper'),
                $videoThumbnail = $('[data-video-thumbnail]'),
                video = $wrapper.find('video')[0];

            $wrapper.addClass('active');
            $videoThumbnail.addClass('active');
            if (video.paused === true) {
                video.play();
                $videoThumbnail[0].pause();
                $('.video-trigger').hide();
            }
        });

        this.initSliders();
        $(window).on('changed.zf.mediaquery', () => {
            this.initSliders();
        });
    }

    initSliders() {

        let SwiperExtraOptions = {};

        if (Foundation.MediaQuery.is('small only')) {
            SwiperExtraOptions = {
                autoHeight: true
            }
        }

        $('[data-swiper-container]').each((index, element) => {
            let $parent = $(element).parent();
            const testimonilSLider = new Swiper(element, {
                ...SwiperExtraOptions,
                speed: 500,
                slidesPerView: 'auto',
                centeredSlides: true,
                spaceBetween: 25,
                pagination: {
                    el: $parent.find('.swiper-pagination'),
                    type: 'bullets',
                    clickable: true
                },
                navigation: {
                    nextEl: $parent.find('.swiper-button-next'),
                    prevEl: $parent.find('.swiper-button-prev')
                }
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

