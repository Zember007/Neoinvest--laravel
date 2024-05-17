function bodyFixPosition() {
	setTimeout( function() {
		if (!document.body.hasAttribute('data-body-scroll-fix')) {
			var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
			document.body.setAttribute('data-body-scroll-fix', scrollPosition);
			document.body.style.overflow = 'hidden';
			document.body.style.position = 'fixed';
			document.body.style.top = '-' + scrollPosition + 'px';
			document.body.style.left = '0';
			document.body.style.width = '100%';
		}
	}, 15 ); 
}

function bodyUnfixPosition() {
	if (document.body.hasAttribute('data-body-scroll-fix')) {
		var scrollPosition = document.body.getAttribute('data-body-scroll-fix');
		document.body.removeAttribute('data-body-scroll-fix');
		document.body.style.overflow = '';
		document.body.style.position = '';
		document.body.style.top = '';
		document.body.style.left = '';
		document.body.style.width = '';
		window.scroll(0, scrollPosition);
	}
}

$(function() {

	//Vars
	var $body = $('body'),
	$window = $(window),
	investSlider = '.js-invest-carousel',
	productsSlider = '.js-products-carousel',
	$tabsControl = $('.js-tabs-control'),
	$accordion = $('.js-accordion'),
	$listItem = $('.js-list-item');
	
	//Open / close menu
	$('.js-toggle-menu').on('click', function () {
		$body.toggleClass('menu-is-open');
		if ($body.hasClass('menu-is-open')) {
			bodyFixPosition();
		} else {
			bodyUnfixPosition();
		}
	});

	//Add header class on scroll
	$window.on('load scroll', function () {
		var scrolled = $window.scrollTop();
		if (scrolled > 10) {
			$body.addClass('header-scroll');
		} else {
			$body.removeClass('header-scroll');
		}
	});

	//Sliders
	if ($(investSlider)) {
		new Swiper(investSlider, {
			slidesPerView: 1,
			spaceBetween: 40,
			loop: true,
			navigation: {
				prevEl: '.js-invest-carousel-prev',
				nextEl: '.js-invest-carousel-next',
			},
		});
	}
	if ($(productsSlider)) {
		var productsSliderSettingsPage = {
			slidesPerView: 'auto',
			scrollbar: {
				el: '.js-products-carousel-scrollbar',
				draggable: true,
				hide: false
			},
			breakpoints: { 
				280: { 
					enabled: true, 
					spaceBetween: 8,
				},
				768: { 
					enabled: true, 
					spaceBetween: 20,
				},
				1200: { 
					enabled: false, 
					spaceBetween: 20,
				}
			}
		};
		var productsSliderSettingsAccount = {
			slidesPerView: 'auto',
			spaceBetween: 20,
			simulateTouch: true,
			enabled: true,
			scrollbar: {
				el: '.js-products-carousel-scrollbar',
				draggable: true,
				hide: false
			},
			breakpoints: { 
				280: { 
					spaceBetween: 8,
				},
				768: { 
					spaceBetween: 20,
				}
			}
		};
		if ($body.find('.products').length) {
			new Swiper(productsSlider, productsSliderSettingsPage);
		} else {
			new Swiper(productsSlider, productsSliderSettingsAccount);
		};
	}

	//Tabs
	$tabsControl.on('click', function() {
		var $th = $(this);
		$tabsControl.removeClass('active');
		$th.addClass('active');
		$th.closest('.js-tabs').find('.js-tabs-content').hide().eq($th.index()).fadeIn('fast');
	});

	//Accordion
	$('.js-accordion-item-control').on('click', function() {
		var $th = $(this);
		var $mainParent = $th.closest('.js-accordion');
		var $accordionItem = $mainParent.find('.js-accordion-item');
		var $parent = $th.closest('.js-accordion-item');
		$accordionItem.not($parent).removeClass('is-open');
		$parent.toggleClass('is-open');
		$parent.find('.js-accordion-item-content').slideToggle('fast');
		$accordionItem.not('.is-open').find('.js-accordion-item-content').slideUp('fast');
	});
	$accordion.each(function() {
		var $item = $(this).find('.js-accordion-item');
		$item.each(function() {
			var $th = $(this);
			if ($th.hasClass('is-open')) {
				$th.children('.js-accordion-item-content').show('fast');
			} else {
				$th.children('.js-accordion-item-content').hide('fast');
			}
		});
	});

	//Show password
	$('.js-input-password-toggler').on('click', function() {
		var $th = $(this);
		var $field = $th.prev('.js-input-password-field');
		if ($field.attr('type') == 'password') {
			$th.addClass('password-view');
			$field.attr('type', 'text');
		} else {
			$(this).removeClass('password-view');
			$field.attr('type', 'password');
		}
		return false;
	});

	//Lists
	$('.js-list-item-control').on('click', function() {
		var $th = $(this);
		var $mainParent = $th.closest('.js-list-item');
		$listItem.not($mainParent).removeClass('is-open');
		$mainParent.toggleClass('is-open');
		$th.next().slideToggle('fast');
		$listItem.not('.is-open').find('.js-list-item-content').slideUp('fast');
	});
	$(document).on('click', function(e){
		if ($(e.target).closest('.js-list-item-control').length) return;
		$('.js-list-item-content').slideUp('fast');
		$listItem.removeClass('is-open');
		e.stopPropagation();
	});

	//Select
	$('.js-select-variant').on('click', function() {
		var $th = $(this);
		var $parent = $th.closest('.js-select');
		var $content = $th.html();
		var value = $th.data('value');
		$parent.find('.js-select-value').html($content);
		$parent.find('.js-select-field').val(value);
		$parent.find('.js-select-variant').removeClass('active');
		$th.addClass('active');
		$parent.removeClass('is-open');
	});

	//Copy
	$('.js-input-copy-control').on('click', function() {
		var link = $(this).closest('.js-input-copy').find('.js-input-copy-field');
		link.select();
		link[0].setSelectionRange(0, 99999)
		document.execCommand("copy");
	});


	// Invest item visability
	$('.product__btn').on('click', function() {
		$(this).closest('.col-xl-9').css('display', 'none');
		for ( let item of $('.invest-item') ) {
			if ( item.id === $(this).closest('.swiper-slide')[0].id ) {
				console.log(item)
				$(item).addClass('invest-item--active')
			}
		}
	});

	// Bonus and success popups

	$(document).ready(function () {
        var $popupBonus = $('.popup--bonus');
        var $popupBonusInner = $popupBonus.find('.popup__inner');
		var $popupSuccess = $('.popup--success');
        var $popupSuccessInner = $popupSuccess.find('.popup__inner');
        // Показываем или скрываем popup при клике на кнопке
        $('.fund__item--get').click(function (event) {
            $('.popup--active').removeClass('popup--active')
            $popupBonus.fadeOut(250);
            event.stopPropagation(); // Остановка всплытия события
            $popupBonus.addClass('popup--active');
            $popupBonus.fadeIn(250, function () {
                // После показа попапа, делаем анимацию изменения opacity от 0 до 1
                $(this).animate({
                    opacity: 1
                }, 250);
            });
            $('body').addClass('body--popup');
        });
        $('.close-popup').click(function (event) {
            $('.popup').fadeOut(250);
            $('body').removeClass('body--popup');
        });
		$('.bonus-form__button').click(function (event) {
            $('.popup--active').removeClass('popup--active')
            $('.popup').fadeOut(250);
            event.stopPropagation(); // Остановка всплытия события
            $popupSuccess.addClass('popup--active');
            $popupSuccess.fadeIn(250, function () {
                // После показа попапа, делаем анимацию изменения opacity от 0 до 1
                $(this).animate({
                    opacity: 1
                }, 250);
            });
            $('body').addClass('body--popup');
        });
		
        // Скрываем popup при клике вне его области (если попап активен)
        $(document).click(function (event) {
            if ($popupBonus.hasClass('popup--active')) {
                if (!($popupBonusInner.is(event.target) || $popupBonusInner.has(event.target).length > 0)) {
                    $popupBonus.fadeOut(250);
                    $popupBonus.removeClass('popup--active')
                    $('body').removeClass('body--popup');
                }
            }
        });
		$(document).click(function (event) {
            if ($popupSuccess.hasClass('popup--active')) {
                if (!($popupSuccessInner.is(event.target) || $popupSuccessInner.has(event.target).length > 0)) {
                    $popupSuccess.fadeOut(250);
                    $popupSuccess.removeClass('popup--active')
                    $('body').removeClass('body--popup');
                }
            }
        });
    });
});

