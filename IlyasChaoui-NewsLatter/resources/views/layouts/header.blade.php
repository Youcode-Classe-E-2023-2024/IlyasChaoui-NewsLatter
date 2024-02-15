<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>
        NewsLetter | @yield('title')
    </title>
    <link rel="shortcut icon" href="/assets-home/images/logo/logo-uiverse.png" type="image/x-icon"/>
    <link rel="stylesheet" href="/assets-home/css/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="/assets-home/css/animate.css"/>
    <link rel="stylesheet" href="/assets-home/css/style.css"/>
    <link rel="stylesheet" href="/assets-home/css/tailwind.css"/>
    <!-- ==== WOW JS ==== -->
    <script src="/assets-home/js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <style>

    </style>
</head>
<body>

{{--navbar section--}}
<x-navbar.navbar/>
{{--end navbar section--}}

@yield('content')

{{--footer section--}}
<x-footer.footer/>
{{--end footer section--}}

<!-- ====== All Scripts -->

<script src="assets-home/js/swiper-bundle.min.js"></script>
<script src="assets-home/js/main.js"></script>
<script>
    // ==== for menu scroll
    const pageLink = document.querySelectorAll(".ud-menu-scroll");

    pageLink.forEach((elem) => {
        elem.addEventListener("click", (e) => {
            e.preventDefault();
            const href = elem.getAttribute("href");
            // Ensure href is a valid selector for querySelector (e.g., starts with '#')
            if (href.startsWith("#")) {
                const scrollTarget = document.querySelector(href);
                if (scrollTarget) {
                    scrollTarget.scrollIntoView({
                        behavior: "smooth",
                        block: "start", // Consider using 'start' for aligning with the top
                    });
                }
            }
        });
    });

    // section menu active
    function onScroll(event) {
        const sections = document.querySelectorAll(".ud-menu-scroll");
        const scrollPos = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;

        for (let i = 0; i < sections.length; i++) {
            const currLink = sections[i];
            const val = currLink.getAttribute("href");
            if (!val.startsWith("#")) continue; // Skip if not an ID selector
            const refElement = document.querySelector(val);
            if (!refElement) continue; // Skip if the element does not exist
            const scrollTopMinus = scrollPos + 73;
            if (refElement.offsetTop <= scrollTopMinus && refElement.offsetTop + refElement.offsetHeight > scrollTopMinus) {
                document.querySelector(".ud-menu-scroll.active")?.classList.remove("active");
                currLink.classList.add("active");
            } else {
                currLink.classList.remove("active");
            }
        }
    }

    window.document.addEventListener("scroll", onScroll);


    // Testimonial
    const testimonialSwiper = new Swiper(".testimonial-carousel", {
        slidesPerView: 1,
        spaceBetween: 30,

        // Navigation arrows
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },

        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 30,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            1280: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
    });
</script>
<!-- register form script file  -->
<script src="./assets-home/js/image-register.js"></script>
</body>
</html>
