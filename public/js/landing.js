window.addEventListener('load', function() {

    //mobile menu
    let mobileHamburger = document.querySelector('.header-hamburger');
    let mobileMenu = document.querySelector('.mobileMenu');
    let mobileLinks = document.querySelectorAll('.mobileMenu-nav ul li a');
    let mobileCheck = true;
    
    mobileHamburger.addEventListener('click', function(e) {
        if(this.classList.contains('active')) {
            mobileMenuToggle("reverse");
        } else {            
            mobileMenuToggle();
        }
    });

    function mobileMenuToggle(reverse = "normal") {
        if(mobileCheck) {
            mobileCheck = false;
            mobileHamburger.classList.toggle('active');
            mobileMenu.classList.toggle('mobileMenu-open');       
            let elDelay = 200;
            if(mobileHamburger.classList.contains('active')) {
                mobileLinks.forEach(function(el , i) {
                    elDelay += 100;
                    el.animate([
                        {transform: "translateY(30px)", opacity: 0},
                        {transform: "translateY(0px)", opacity: 1}
                    ], { duration: elDelay, direction: reverse });
                });
            }
            setTimeout(() => {
                mobileCheck = true;
            }, 800);
        }
    }


    //change language
    let languageButton = document.querySelector('.header-language__visible');
    languageButton.addEventListener('click', function() {
        this.closest('.header-language').classList.toggle('open');
        clickCloseLang();
    });
    function clickCloseLang(e) {
        let visibleItem = document.querySelector('.header-language');
        window.addEventListener('click', closeLang);
        function closeLang(e) {
            if (!visibleItem.contains(e.target)) {
                visibleItem.classList.remove('open');
                window.removeEventListener('click', closeLang);
            }
        }
    }




    //lazyload
    let lazyLoadInstance = new LazyLoad();


    //sliders
    var swiper = new Swiper(".packets-slider", {
        grabCursor: true,
        effect: "creative",
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        creativeEffect: {
          prev: {
            shadow: true,
            translate: ["-120%", 0, -500],
          },
          next: {
            shadow: true,
            translate: ["120%", 0, -500],
          },
        },
    });
    var swiperLevels = new Swiper(".levels-slider", {
        autoHeight: true,
        pagination: {
            el: ".swiper-pagination",
        },
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
    });
    let sliderArrow = document.querySelectorAll('.packets-buttons__arrow');
    sliderArrow.forEach(function(el) {
        el.addEventListener('click', function() {
            if(el.classList.contains('prev')) {
                el.closest('section').querySelector('.swiper-button-prev').click();
            } else {
                el.closest('section').querySelector('.swiper-button-next').click();
            }
        });
    });


    //check window width
    let loadWidth = window.innerWidth;
    if(loadWidth < 1251) {
        document.querySelector('.map-scrollbar').classList.add('scrollbar');
        OverlayScrollbars(document.querySelectorAll(".map-scrollbar"), { });
        OverlayScrollbars(document.querySelectorAll(".levels-scrollbar"), { });
    }



    //calculator
    let tarfis = document.querySelectorAll('.calculator-tarif');
    let input = document.querySelector('.calculator-onkey__input');
    let valueError = document.querySelector('.calculator-onkey__event');
    let capital = 100;

    input.addEventListener('input', function() {
        input.value = this.value.replace (/\D/, '');
        let val = Number(input.value);
        if(val != 0 && val < 100) {
            input.classList.add('error');
            valueError.classList.add('error');
        } else if(val > 1000000) {
            input.value = 1000000;
            rangeSlider.noUiSlider.set(1000000);
        } else {
            input.classList.remove('error');
            valueError.classList.remove('error');
            rangeSlider.noUiSlider.set(val);
        }
    });

    tarfis.forEach(function(el) {
        el.addEventListener('click', function() {
            document.querySelector('.calculator-tarif.active').classList.remove('active');
            el.classList.add('active');
            document.querySelector('.calculator-parcent__result span').innerHTML = el.dataset.parcent;
            result();
        });
    });

    let rangeSlider = document.querySelector('#slider-range');
    noUiSlider.create(rangeSlider, {
        start: [100],
        step: 1,
        connect: [true, false],
        range: {
            'min': [100],
            'max': [1000000]
        }
    });
    rangeSlider.noUiSlider.on('update', function (values, handle) {
        capital = parseInt(values[handle])
        document.querySelector('.calculator-range__result span').innerHTML = capital;
        result();
    });

    function result() {
        let parcent = Number(document.querySelector('.calculator-tarif.active').dataset.parcent);
        capital = Number(capital);
        let result = capital * parcent / 100;
        let week = result * 7
        let month = result * 30
        let year = result * 365
        document.querySelector('.calculator-day').textContent = result.toFixed(1);
        document.querySelector('.calculator-week').textContent = week.toFixed(1);
        document.querySelector('.calculator-month').textContent = month.toFixed(1);
        document.querySelector('.calculator-year').textContent = year.toFixed(1);
    }





    //tabs
    let tabButtons = document.querySelectorAll('.levels-mobile__tab');
    let tabContents = document.querySelectorAll('.levels-mobile__content');
    tabButtons.forEach(function(el, index) {
        el.addEventListener('click', function() {
            document.querySelector('.levels-mobile__tab.active').classList.remove('active');
            el.classList.add('active');
            for (let i = 0; i < tabContents.length; i++) {
                tabContents[i].style.display = "none";
            }
            fadeIn(tabContents[index]);
        });
    });
    function fadeIn(el) {
        var opacity = 0.01;
        el.style.display = "block";
        var timer = setInterval(function() {
            if(opacity >= 1) {
                clearInterval(timer);
            }
            el.style.opacity = opacity;
            opacity += opacity * 0.1;
        }, 10);
    }







    //desktop menu
    let menuButton = document.querySelector('.sidebar-hamburger');
    let menuScroll = document.querySelector('.menu-slider');
    let menuDesktop = document.querySelector('.menu');
    let menuPrev = document.querySelector('.menu .prev');
    let menuNext = document.querySelector('.menu .next');
    let menuBg = document.querySelector('.menu-bg');
    let desktopCheck = true;

    menuButton.addEventListener('click', function(e) {
        animationMenu(e.target);
    });
    menuPrev.addEventListener('click', function() {
        document.querySelector('.menu-slider .swiper-button-prev').click();
        document.querySelector('.menu-images .swiper-button-prev').click();
    });
    menuNext.addEventListener('click', function() {
        document.querySelector('.menu-slider .swiper-button-next').click();
        document.querySelector('.menu-images .swiper-button-next').click();
    });

    let wheelChecker = true;
    menuScroll.addEventListener('mousewheel', function(e) {
        if(wheelChecker) {
            if(e.deltaY > 0) {
                document.querySelector('.menu-slider .swiper-button-next').click();
                document.querySelector('.menu-images .swiper-button-next').click();
            } else {
                document.querySelector('.menu-slider .swiper-button-prev').click();
                document.querySelector('.menu-images .swiper-button-prev').click();
            }
            setTimeout(() => {
                wheelChecker = true;
            }, 500);
        }
        wheelChecker = false;
    });
    let menuSlider = new Swiper(".menu-slider", {
        direction: "vertical",
        slidesPerView: 3,
        allowTouchMove: false,
        centeredSlides: true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
    });
    let menuImages = new Swiper(".menu-images", {
        direction: "vertical",
        slidesPerView: 1,
        allowTouchMove: false,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
    });
    function animationMenu(el) {
        if(desktopCheck) {
            desktopCheck = false;
            if(menuButton.classList.contains('active')) {
                menuClose();
            } else {
                menuButton.classList.add('active');
                menuDesktop.classList.add('active');
                menuBg.animate([
                    {transform: "rotate(-15deg)", left: '10%', width: "140%"},
                    {transform: "rotate(0)", left: 0, width: "50%"}
                ], { duration: 800});
                setTimeout(() => {
                    menuBg.classList.add('index');
                }, 800);
                setTimeout(() => {
                    menuDesktop.classList.add('show');
                }, 1200);
                setTimeout(() => {
                    menuDesktop.classList.add('showLeft');
                }, 1500);
                menuTimeout(2000);
            }
            document.addEventListener('keyup', closeMenu);
            function closeMenu(e) {
                if(e.key === "Escape") {
                    menuClose();
                    window.removeEventListener('click', closeMenu);
                }
            }
        }
    }
    function menuClose() {
        menuButton.classList.remove('active');
        menuDesktop.classList.remove('active');
        menuBg.classList.remove('index');
        menuDesktop.classList.remove('show');
        menuDesktop.classList.remove('showLeft');
        menuTimeout(400);
    }
    function menuTimeout(delay) {
        setTimeout(() => {
            desktopCheck = true;
        }, delay);
    }



    //scroll to id
    document.querySelectorAll('.mobileMenu-nav ul li a, .scroll, .menu-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            let href = this.getAttribute('href').substring(1);
            const scrollTarget = document.getElementById(href);
            let topOffset = 0;
            const elementPosition = scrollTarget.getBoundingClientRect().top;
            let windowWidth = window.innerWidth;
            if(windowWidth > 1250) {
            } else {
                let header = document.querySelector('.header').clientHeight;
                topOffset = header;
                if(mobileMenu.classList.contains('mobileMenu-open')) {
                    mobileMenuToggle("reverse");
                }
            }
            if(menuButton.classList.contains('active')) {
                menuButton.click();
            }
            const offsetPosition = elementPosition - topOffset;
            window.scrollBy({
                top: offsetPosition,
                behavior: 'smooth'
            });
        });
    });



    // aos init
    AOS.init({
        once: true,
        duration: 800,
    });



});