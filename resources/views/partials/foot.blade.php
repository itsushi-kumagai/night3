<script src="{{ mix('/js/app.js') }}"></script>
<script src="https://unpkg.com/swiper/js/swiper.js"></script>
<script src="https://unpkg.com/swiper/js/swiper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<link rel="stylesheet" href="{{ asset('/js/swiper.min.js') }}">
<script>
    var mySwiper = new Swiper ('.swiper-container', {
        // Optional parameters
        direction: 'horizontal',
        slidesPerView: 1.4,
        spaceBetween: 20,
        centeredSlides : true,
        loop: true,
    
        // Navigation arrows
        navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
        },
        breakpoints: {
          1428: {
          slidesPerView: 4.6,
          spaceBetween: 20,
        },
        1200: {
          slidesPerView: 4.1,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 3.7,
          spaceBetween: 20,
        },
        930: {
          slidesPerView: 3.2,
          spaceBetween: 20,
        },
        860: {
          slidesPerView: 2.8,
          spaceBetween: 20,
        },
        730: {
           slidesPerView: 2.5,
           spaceBetween: 20,
         },
         584: {
           slidesPerView: 2,
           spaceBetween: 20,
         },
        500: {
          slidesPerView: 1.7,
          spaceBetween: 20,
        }

      }
    
    })

     flatpickr("#date", {
         minDate: "today"
     });

     flatpickr("#date-box", {
         minDate: "today"
     });

     var prevScrollpos = window.pageYOffset;
         window.onscroll = function() {
             var currentScrollpos = window.pageYOffset;
             if(prevScrollpos > currentScrollpos){
                 document.getElementById("header").style.top = "0";
             } else {
                 document.getElementById("header").style.top = "-1000px";
             }

             prevScrollpos = currentScrollpos;
         }
 </script>