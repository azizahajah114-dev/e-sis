import './bootstrap';
import Swiper from "swiper/bundle";
import "swiper/css/bundle";
import {
    createIcons,
    icons
} from 'lucide';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

window.Echo.channel("izin-channel")
    .listen(".izin.created", (e) => {
        alert("Izin baru masuk: " + e.izin.keterangan);
    });


document.addEventListener("DOMContentLoaded", () => {
    createIcons({ icons });

    const totalSlides = document.querySelectorAll('.keunggulanSwiper .swiper-slide').length;

    const perViewDesktop = Math.min(3, Math.max(1, totalSlides - 1));
    const perViewTablet = Math.min(2, Math.max(1, totalSlides - 1));
    const perViewMobile = 1;

    new Swiper('.keunggulanSwiper', {
        slidesPerView: perViewMobile,
        spaceBetween: 20,
        loop: true,
        speed: 4000,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
            reverseDirection: true
        },
        allowTouchMove: true,
        cssMode: false,
        freeMode: true,
        freeModeMomentum: false,
        breakpoints: {
            640: {
                slidesPerView: perViewTablet
            },
            1024: {
                slidesPerView: perViewDesktop
            },
        },
    });
});

Alpine.start();
