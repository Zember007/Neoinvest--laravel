<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">

  <title>WorldSmart - Главная</title>
  <meta name="description" content="#">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta property="og:title" content="#">
  <meta property="og:description" content="#">
  <meta property="og:image" content="#">
  <meta property="og:image:width" content="400">
  <meta property="og:image:height" content="210">
  <meta property="og:image:type" content="image/png">
  <meta name="twitter:card" content="summary_large_image">
  <meta property="og:type" content="website">
  <meta property="og:url" content="#">
  <meta property="og:locale" content="ru_RU">
  <link rel="icon" href="/img/new/favicons/favicon.ico" type="image/x-icon">
  <link rel="icon" type="image/png" sizes="16x16" href="/img/new/favicons/favicon-16x16.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/img/new/favicons/favicon-32x32.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/img/new/favicons/apple-touch-icon.png">
  <link rel="manifest" href="/img/new/favicons/site.webmanifest">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="libs/swiper-bundle.min.css"> 
  <link rel="stylesheet" href="{{ asset('css/new/app.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/new/style.promo.css') }}">
</head>

<body>
  <header class="header">
    <div class="container">
      <div class="row g-0 align-items-center justify-content-between">
        <div class="col-auto">
          <div class="header__main">
            <button class="sandwich header__sandwich js-toggle-menu">
              <span class="sandwich__inner"></span>
            </button>
            <a href="/" class="logo header__logo">
              <img src="/img/new/logo-accent.svg" alt="World Smart" class="logo__img">
            </a> 
            @include('layouts.partials.header.lang')
            </nav>
          </div>
        </div>
        <div class="col-auto">
          <div class="header__controls"> 
            <a href="{{ route('login') }}" class="btn btn-small btn-fill-transparent header__controls-link">
              <img src="/img/new/icons/icon-user-accent.svg" alt="alt" class="d-none d-md-block link__icon">
              <div class="link__title">Войти</div>
            </a>
            <a href="{{ route('register') }}" class="btn btn-small btn-fill-white header__controls-btn">Регистрация</a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <main class="main">
    <section class="timer">
      <div class="container">
        <div class="timer__wrap">
          <h2 class="timer__title">
            До запуска проекта 
          </h2>
          <div class="timer__items">
            <div class="timer__item timer__days">00</div>
            <div class="timer__item timer__hours">00</div>
            <div class="timer__item timer__minutes">00</div>
            <div class="timer__item timer__seconds">00</div>
          </div>

        </div>
      </div>
    </section>
    <section class="invest">
      <div class="container">
        <!-- <div class="invest__top">
          <div class="invest__top-title">
            <h1>Инвестируй сегодня. Будь уверен в завтра.</h1>
          </div>
          <a href="#" class="btn btn-round btn-round-small invest__top-btn">Инвестировать</a>
        </div> -->
        <div class="slider invest__slider">
          <div class="slider__btns invest__slider-btns">
            <button class="slider__btn slider__btn-prev js-invest-carousel-prev"></button>
            <button class="slider__btn slider__btn-next js-invest-carousel-next"></button>
          </div>
          <div class="swiper invest__carousel js-invest-carousel">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="invest-slide">
                  <div class="invest-slide__content">
                    <div class="h2 invest-slide__title">Стань частью World Smart и получи уникальные бонусы!<br>Количество регистраций ограничено</div>
                    <div class="invest-slide__descr">Ознакомьтесь с вариантами инвестиций, которые мы предлагаем партнерам</div>
                  </div>
                  <img src="/img/new/example/invest-img.png" alt="alt" class="invest-slide__image">
                </div>
              </div>
              <div class="swiper-slide">
                <div class="invest-slide">
                  <div class="invest-slide__content">
                    <div class="h2 invest-slide__title">ТОП-4 направлений инвестиций в 2024</div>
                    <div class="invest-slide__descr">Ознакомьтесь с вариантами инвестиций, которые мы предлагаем партнерам</div>
                  </div>
                  <img src="/img/new/example/invest-img.png" alt="alt" class="invest-slide__image">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="invest__advantages">
          <div class="element-blur advantage invest-advantage">
            <img src="/img/new/icons/icon-sale-round-accent.svg" alt="alt" class="advantage__img">
            <div class="advantage__title">Ежедневное начисление процентов</div>
          </div>
          <div class="element-blur advantage invest-advantage">
            <img src="/img/new/icons/icon-exchange-round-accent.svg" alt="alt" class="advantage__img">
            <div class="advantage__title">24/7 вывод начисленных средств</div>
          </div>
          <div class="element-blur advantage invest-advantage">
            <img src="/img/new/icons/icon-world-round-accent.svg" alt="alt" class="advantage__img">
            <div class="advantage__title">Работаем по всему миру</div>
          </div>
        </div>
      </div>
    </section>
    <section class="advantages js-tabs">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="advantages__left">
              <div class="advantages__content">
                <div class="advantages__title">
                  <h2>Оцените преимущества</h2>
                </div>
                <div class="advantages__descr">Мы перечислили лишь самые весомые преимущества, как для инвесторов, так и для партнеров, которые обеспечивают инвестиционный успех</div>
              </div>
              <div class="advantages__tabs">
                <button class="advantages__tabs-item js-tabs-control active">Для инвесторов</button>
                <button class="advantages__tabs-item js-tabs-control">Для партнеров</button>
              </div>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="advantages__blocks">
              <div class="advantages__block js-tabs-content">
                <div class="advantages__items">
                  <div class="element-blur advantage advantage-square advantages__items-element">
                    <img src="/img/new/icons/icon-choise-round-accent.svg" alt="alt" class="advantage__img">
                    <div class="advantage__title">Ежедневное начисление процентов</div>
                  </div>
                  <div class="element-blur advantage advantage-square advantages__items-element">
                    <img src="/img/new/icons/icon-profit-round-accent.svg" alt="alt" class="advantage__img">
                    <div class="advantage__title">Высокая доходность вложенных средств</div>
                  </div>
                  <div class="element-blur advantage advantage-square advantages__items-element">
                    <img src="/img/new/icons/icon-def-round-accent.svg" alt="alt" class="advantage__img">
                    <div class="advantage__title">Многоуровневая защита капитала</div>
                  </div>
                  <div class="element-blur advantage advantage-square advantages__items-element">
                    <img src="/img/new/icons/icon-safety-round-accent.svg" alt="alt" class="advantage__img">
                    <div class="advantage__title">Юридическая безопасность деятельности</div>
                  </div>
                  <div class="element-blur advantage advantage-square advantages__items-element">
                    <img src="/img/new/icons/icon-ecosystem-round-accent.svg" alt="alt" class="advantage__img">
                    <div class="advantage__title">Развитая экосистема инвестирования</div>
                  </div>
                  <div class="element-blur advantage advantage-square advantages__items-element">
                    <img src="/img/new/icons/icon-account-round-accent.svg" alt="alt" class="advantage__img">
                    <div class="advantage__title">Удобный личный кабинет инвестора</div>
                  </div>
                </div>
              </div>
              <div class="advantages__block js-tabs-content">
                <div class="advantages__items">
                  <div class="element-blur advantage advantage-square advantages__items-element">
                    <img src="/img/new/icons/icon-pa-round-accent.svg" alt="alt" class="advantage__img">
                    <div class="advantage__title">Личный кабинет партнера</div>
                  </div>
                  <div class="element-blur advantage advantage-square advantages__items-element">
                    <img src="/img/new/icons/icon-support-round-accent.svg" alt="alt" class="advantage__img">
                    <div class="advantage__title">Поддержка и обучение с наставником</div>
                  </div>
                  <div class="element-blur advantage advantage-square advantages__items-element">
                    <img src="/img/new/icons/icon-ref-round-accent.svg" alt="alt" class="advantage__img">
                    <div class="advantage__title">Единое реферальное дерево</div>
                  </div>
                  <div class="element-blur advantage advantage-square advantages__items-element">
                    <img src="/img/new/icons/icon-shield-round-accent.svg" alt="alt" class="advantage__img">
                    <div class="advantage__title">8 видов выгодных бонусов</div>
                  </div>
                  <div class="element-blur advantage advantage-square advantages__items-element">
                    <img src="/img/new/icons/icon-target-round-accent.svg" alt="alt" class="advantage__img">
                    <div class="advantage__title">Развитая экосистема платформы</div>
                  </div>
                  <div class="element-blur advantage advantage-square advantages__items-element">
                    <img src="/img/new/icons/icon-clear-round-accent.svg" alt="alt" class="advantage__img">
                    <div class="advantage__title">Прозрачность и отчетность</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="products">
      <div class="container">
        <div class="products__container">
          <div class="products__top">
            <div class="products__top-title">
              <h2>Инвестируя в проект, на раннем этапе, Вы получаете:</h2>
            </div>
            <div class="products__top-descr">
                <!-- <li>При пополнении депозита до запуска проекта, вы получите следующие преимущества:</li> -->
                <ul>  <li>Реферальный бонус 7% после старта проекта </li></ul>
               
           
              <p>- При пополнении от 100$ - 500$ бонус +15% к депозиту на старте проекта</p>
              <p>- При пополнении от 500$ - 1000$
                Бонус +25% к депозиту на старте проекта</p>
              <p>- При пополнении от 1000$ - 3000$ к депозиту до старта проекта
                Бонус Air Pods</p>
              <p>- При пополнении депозита от 3000$ - 5000$ до старта проекта
                Бонус IPhone 15 Pro Max</p>
              <p>- При пополнении депозита от 5000$ - 7000$ до старта проекта
                Бонус MacBook Pro</p>
              <p>- При пополнении депозита от 7000$ - 10000$ до старта проекта
                Бонус путешествие на двоих</p><br>
              После старта проекта внесенная вами сумма будет отображаться в вашем Личном кабинете, далее вы самостоятельно принимаете решение в какой продукт инвестировать.<br><br>
              С нашими продуктами и условиями инвестирования вы можете ознакомиться ниже.<br>
              Первые 350 человек, которые присоединятся до старта проекта с минимальным депозитом 1500$ примут участие в первой конференции компании в ОАЭ и Доминикане ( количество людей делится на две группы,на две страны), оплачивается перелет,проживание и питание (по системе All-inclusive)
            </div>
          </div>
          <div class="swiper products__elements js-products-carousel">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="element-blur product products__elements-item">
                  <img src="/img/new/elements/products/product-1.png" alt="alt" class="product__image" loading="lazy">
                  <div class="product__title">Starter</div>
                  <div class="product__row">
                    <div class="product__row-title">срок</div>
                    <div class="product__row-descr">100 дней</div>
                  </div>
                  <div class="product__row">
                    <div class="product__row-title">Инвестиция</div>
                    <div class="product__row-descr">100$ - 5.000$</div>
                  </div>
                  <div class="product__row">
                    <div class="product__row-title">Доходность</div>
                    <div class="product__row-descr">0.5 – 0.7% в сутки</div>
                  </div>
                  <a href="#" class="btn btn-big btn-fill-blue product__btn">Инвестировать</a>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="element-blur product products__elements-item">
                  <img src="/img/new/elements/products/product-2.png" alt="alt" class="product__image" loading="lazy">
                  <div class="product__title">Investor</div>
                  <div class="product__row">
                    <div class="product__row-title">срок</div>
                    <div class="product__row-descr">150 дней</div>
                  </div>
                  <div class="product__row">
                    <div class="product__row-title">Инвестиция</div>
                    <div class="product__row-descr">5.000$ - 30.000$</div>
                  </div>
                  <div class="product__row">
                    <div class="product__row-title">Доходность</div>
                    <div class="product__row-descr">0.7 - 1% в сутки</div>
                  </div>
                  <a href="#" class="btn btn-big btn-fill-blue product__btn">Инвестировать</a>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="element-blur product products__elements-item">
                  <img src="/img/new/elements/products/product-3.png" alt="alt" class="product__image" loading="lazy">
                  <div class="product__title">Gold</div>
                  <div class="product__row">
                    <div class="product__row-title">срок</div>
                    <div class="product__row-descr">175 дней</div>
                  </div>
                  <div class="product__row">
                    <div class="product__row-title">Инвестиция</div>
                    <div class="product__row-descr">30.000$ - 50.000$</div>
                  </div>
                  <div class="product__row">
                    <div class="product__row-title">Доходность</div>
                    <div class="product__row-descr">1 – 1.4% в сутки</div>
                  </div>
                  <a href="#" class="btn btn-big btn-fill-blue product__btn">Инвестировать</a>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="element-blur product products__elements-item">
                  <img src="/img/new/elements/products/product-4.png" alt="alt" class="product__image" loading="lazy">
                  <div class="product__title">VIP</div>
                  <div class="product__row">
                    <div class="product__row-title">срок</div>
                    <div class="product__row-descr">230 дней</div>
                  </div>
                  <div class="product__row">
                    <div class="product__row-title">Инвестиция</div>
                    <div class="product__row-descr">от 50.000$</div>
                  </div>
                  <div class="product__row">
                    <div class="product__row-title">Доходность</div>
                    <div class="product__row-descr">2% в сутки</div>
                  </div>
                  <a href="#" class="btn btn-big btn-fill-blue product__btn">Инвестировать</a>
                </div>
              </div>
            </div>
          </div>
          <div class="products__scrollbar js-products-carousel-scrollbar"></div>
        </div>
      </div>
    </section>
    <section class="fund">
      <div class="container">
        <div class="fund__title">
          <h3>Бонусы за реферальный оборот</h3>
        </div>
        <div class="fund__container">
          <div class="row">
            <div class="col-lg-5">
              <div class="fund__col">
                <div class="fund__col-title">&lt; $50 000</div>
                <div class="fund__col-items">
                  <div class="element-blur fund__item">
                    <img src="/img/new/elements/fund/image-airpods.png" alt="alt" class="fund__item-image" loading="lazy">
                    <div class="fund__item-content">
                      <div class="fund__item-price">$ 4000</div>
                      <div class="fund__item-info">AirPods Pro 2</div>
                    </div>
                  </div>
                  <div class="element-blur fund__item">
                    <img src="/img/new/elements/fund/image-iphone.png" alt="alt" class="fund__item-image" loading="lazy">
                    <div class="fund__item-content">
                      <div class="fund__item-price">$ 12 000</div>
                      <div class="fund__item-info">IPhone 15 Pro</div>
                    </div>
                  </div>
                  <div class="element-blur fund__item">
                    <img src="/img/new/elements/fund/image-macbook.png" alt="alt" class="fund__item-image" loading="lazy">
                    <div class="fund__item-content">
                      <div class="fund__item-price">$ 25 000</div>
                      <div class="fund__item-info">Macbook Pro 16 M3</div>
                    </div>
                  </div>
                  <div class="element-blur fund__item">
                    <img src="/img/new/elements/fund/image-airplane.png" alt="alt" class="fund__item-image" loading="lazy">
                    <div class="fund__item-content">
                      <div class="fund__item-price">$ 50 000</div>
                      <div class="fund__item-info">Путешествие в Дубаи на 2-их</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-7">
              <div class="fund__col">
                <div class="fund__col-title">&gt; $100 000</div>
                <div class="fund__col-items">
                  <div class="element-blur fund__item">
                    <img src="/img/new/elements/fund/image-tesla.png" alt="alt" class="fund__item-image" loading="lazy">
                    <div class="fund__item-content">
                      <div class="fund__item-price">$ 130 000</div>
                      <div class="fund__item-info">Автомобиль Tesla</div>
                    </div>
                  </div>
                  <div class="element-blur fund__item">
                    <img src="/img/new/elements/fund/image-merc.png" alt="alt" class="fund__item-image" loading="lazy">
                    <div class="fund__item-content">
                      <div class="fund__item-price">$ 290 000</div>
                      <div class="fund__item-info">Автомобиль люкс класса</div>
                    </div>
                  </div>
                  <div class="element-blur fund__item">
                    <img src="/img/new/elements/fund/image-house.png" alt="alt" class="fund__item-image" loading="lazy">
                    <div class="fund__item-content">
                      <div class="fund__item-price">$ 550 000</div>
                      <div class="fund__item-info">Апартаменты стоимостью $100 000</div>
                    </div>
                  </div>
                  <div class="element-blur fund__item">
                    <img src="/img/new/elements/fund/image-crown.png" alt="alt" class="fund__item-image" loading="lazy">
                    <div class="fund__item-content">
                      <div class="fund__item-price">$ 888 000</div>
                      <div class="fund__item-info">Статус VIP (реферальная система 8%)</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="question">
      <div class="container">
        <div class="question__container">
          <div class="c-white question__title">
            <h2>Остались вопросы?</h2>
          </div>
          <div class="c-white question__descr">Задайте их нашему эксперту</div>
          <form class="question__form">
            <div class="question__form-left">
              <label class="input question__form-field">
                <span class="c-white input__title">Имя</span>
                <input type="text" name="user_name" class="input__field input__big element-blur" placeholder="Представьтесь, пожалуйста">
              </label>
              <label class="input question__form-field">
                <span class="c-white input__title">Электронная почта</span>
                <input type="email" name="user_email" class="input__field input__big element-blur" placeholder="yourmail@gmail.com">
              </label>
              <label class="input question__form-field">
                <span class="c-white input__title">Введите ваш вопрос</span>
                <textarea name="user_text" id="" class="input__field input__big element-blur" placeholder="Ваш вопрос"></textarea>
              </label>
            </div>
            <div class="question__form-right">
              <button class="btn btn-round btn-round-middle btn-round-white question__form-submit">
                <span class="text-grad">Свяжитесь со мной</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </section>
  </main>
  <footer class="footer">
    <div class="footer__top">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <div class="footer__content">
              <a href="/" class="logo footer__content-logo">
                <img src="/img/new/logo-accent.svg" alt="World Smart" class="logo__img">
              </a>
              <div class="footer__content-descr">
                Международная инвестиционная платформа с реальными отзывами
              </div>
              <div class="socials footer__content-socials">
                <a href="#" class="socials__item socials__item-telegram" target="_blank"></a>
                <a href="#" class="socials__item socials__item-instagram" target="_blank"></a>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="footer__col">
              <div class="footer__col-title">Навигация</div>
              <div class="footer__col-content">
                <nav class="footer__col-nav">
                  <ul>
                    <li><a href="main.html">Главная</a></li>
                    
                  </ul>
                </nav>
              </div>
            </div>
          </div>
          <div class="col-6 col-lg-3">
            <div class="footer__col">
              <div class="footer__col-title">Пользователям</div>
              <div class="footer__col-content">
                <nav class="footer__col-nav">
                  <ul>
                    <li><a href="account.html">Личный кабинет</a></li>
                   
                  </ul>
                </nav>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="footer__col">
              <div class="footer__col-title">Связь с нами и подписка</div>
              <div class="footer__col-content">
                <a href="tel:+780444200420" class="link link-default footer__col-phone">+78 044 420 0 420</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer__bottom">
      <div class="container">
        <div class="row">
          <div class="col-6 col-md-3">
            <div class="footer__bottom-policy">2024 © Все права защищены</div>
          </div>
          <div class="col-6 col-md-3">
            <a href="policy.html" class="link link-default-lt footer__bottom-link">Политика конфидиенцальности</a>
          </div>
          <div class="col-6 col-md-3">
            <a href="cookie.html" class="link link-default-lt footer__bottom-link">Правила использования и coockies</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="{{ asset('js/new/libs.min.js') }}"></script>
  <script src="{{ asset('js/new/common.js') }}"></script>
  <script src="{{ asset('js/new/countdown.js') }}"></script>

</body>

</html>


<!-- <!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Инвестиционная обучающая платформа Neo-Invest</title>
    <meta name="description" content="Обучающая инвестиционная платформа с доходностью до 1,7% в сутки, бесплатными сигналами и бесплатным обучением для партнеров">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="/img/new/favicon.svg">
    <link rel="icon" href="/img/new/favicon.ico">
    <link rel="stylesheet" href="libs/normalize.css">
    <link rel="stylesheet" href="libs/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="libs/swiper-bundle.min.css">
    <link rel="stylesheet" href="libs/nouislider.css">
    <link rel="stylesheet" href="libs/aos.css">
    <link rel="stylesheet" href="css/landing.min.css?v=3">

    <meta property="og:title" content="Инвестиционная обучающая платформа Neo-Invest" />
    <meta property="og:description" content="Обучающая инвестиционная платформа с доходностью до 1,7% в сутки, бесплатными сигналами и бесплатным обучением для партнеров" />
    <meta property="og:image" content="//img/new/promo.png">
    <meta property="og:image:secure_url" content="//img/new/promo.png">
    <meta property="og:url" content="https://neo-invest.club">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ru_RU">
    <meta property="og:image:alt" content="Neo-Invest">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">

</head>
<body>

    <div class="page">

        <div class="menu">
            <div class="menu-bg"></div>
            <div class="menu-left">
                <div class="menu-arrows">
                    <div class="menu-arrows__item next"><img src="/img/new/menu-arrow.svg" alt="icon: arrow" class="img"></div>
                    <div class="menu-arrows__item prev"><img src="/img/new/menu-arrow.svg" alt="icon: arrow" class="img"></div>
                </div>
                <div class="menu-slider swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide menu-slide"><a href="#b1" class="menu-link">О нас</a></div>
                        <div class="swiper-slide menu-slide"><a href="#b2" class="menu-link">Инструментарий</a></div>
                        <div class="swiper-slide menu-slide"><a href="#b3" class="menu-link">Инвестиционные <br>предложения</a></div>
                        <div class="swiper-slide menu-slide"><a href="#b4" class="menu-link">Калькулятор <br>доходности</a></div>
                        <div class="swiper-slide menu-slide"><a href="#b5" class="menu-link">Партнерская <br>программа</a></div>
                        <div class="swiper-slide menu-slide"><a href="#b6" class="menu-link">Образовательная <br>платформа</a></div>
                        <div class="swiper-slide menu-slide"><a href="#b7" class="menu-link">Дорожная <br>карта</a></div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <div class="menu-right">
                <div class="menu-images swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide menu-img"><img data-src="/img/new/menu/7.png" src="/img/new/load.svg" alt="" class="img lazy"></div>
                        <div class="swiper-slide menu-img"><img data-src="/img/new/menu/3.png" src="/img/new/load.svg" alt="" class="img lazy"></div>
                        <div class="swiper-slide menu-img"><img data-src="/img/new/menu/4.png" src="/img/new/load.svg" alt="" class="img lazy"></div>
                        <div class="swiper-slide menu-img"><img data-src="/img/new/menu/5.png" src="/img/new/load.svg" alt="" class="img lazy"></div>
                        <div class="swiper-slide menu-img"><img data-src="/img/new/menu/1.png" src="/img/new/load.svg" alt="" class="img lazy"></div>
                        <div class="swiper-slide menu-img"><img data-src="/img/new/menu/2.png" src="/img/new/load.svg" alt="" class="img lazy"></div>
                        <div class="swiper-slide menu-img"><img data-src="/img/new/menu/6.png" src="/img/new/load.svg" alt="" class="img lazy"></div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>

        <div class="sidebar">
            <a href="index.html" class="sidebar-logo"><img src="/img/new/logo-small.svg" alt="" class="img"></a>
            <div class="sidebar-hamburger">
                <div class="sidebar-hamburger__icon">
                    <span></span>
                    <span></span>
                    <span></span>
                    <svg width="72" height="72" viewBox="0 0 72 72" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.5 17.5L54.5 54.5" stroke="#2D2D2D" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M54 18L17 55" stroke="#2D2D2D" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>                      
                </div>
                <div class="sidebar-hamburger__text"><span>МЕНЮ</span><b>ЗАКРЫТЬ</b></div>
            </div>
            <div class="sidebar-soc">
                <a href="https://www.youtube.com/channel/UCu-9nEly8HvpflDiCMVCbiQ" target="_blank" class="sidebar-soc__item">
                    <svg width="27" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.4133 3.19842C26.1661 1.82401 24.7429 0.622991 23.1678 0.463701C16.7399 -0.15473 10.2548 -0.154566 3.82693 0.464188C2.2575 0.622937 0.834223 1.82385 0.585752 3.20341C-0.195559 7.70992 -0.195249 12.2952 0.586673 16.8016C0.834161 18.1761 2.2575 19.377 3.83222 19.5362C7.04291 19.8454 10.2703 20.0002 13.5 20C16.7297 20.0002 19.9571 19.8454 23.1678 19.5362L23.1729 19.5357C24.7426 19.3771 26.166 18.1761 26.4142 16.7965C27.1956 12.29 27.1953 7.7048 26.4133 3.19842ZM18.0828 10.739L12.0458 14.2922C11.8942 14.3814 11.7181 14.4326 11.5362 14.4404C11.3543 14.4481 11.1735 14.4122 11.0129 14.3363C10.8523 14.2604 10.7181 14.1475 10.6245 14.0096C10.5309 13.8717 10.4815 13.7139 10.4815 13.5531V6.44675C10.4815 6.28597 10.5309 6.12821 10.6245 5.99028C10.7181 5.85236 10.8523 5.73944 11.0129 5.66358C11.1735 5.58772 11.3543 5.55175 11.5362 5.55951C11.7181 5.56727 11.8942 5.61848 12.0458 5.70766L18.0828 9.26085C18.2206 9.34196 18.3336 9.45186 18.4118 9.58079C18.4899 9.70972 18.5308 9.8537 18.5308 9.99994C18.5308 10.1462 18.4899 10.2901 18.4118 10.4191C18.3336 10.548 18.2206 10.6579 18.0828 10.739Z" fill="#0076FF"/>
                    </svg>                      
                </a>
                <a href="https://instagram.com/neo_invest_ru" target="_blank" class="sidebar-soc__item">
                    <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18 0H7C5.14413 0.00201777 3.36487 0.710664 2.05257 1.97047C0.740275 3.23028 0.00210184 4.93836 0 6.72V17.28C0.00210184 19.0616 0.740275 20.7697 2.05257 22.0295C3.36487 23.2893 5.14413 23.998 7 24H18C19.8559 23.998 21.6351 23.2893 22.9474 22.0295C24.2597 20.7697 24.9979 19.0616 25 17.28V6.72C24.9979 4.93836 24.2597 3.23028 22.9474 1.97047C21.6351 0.710664 19.8559 0.00201777 18 0ZM12.5 17.76C11.3133 17.76 10.1533 17.4222 9.16658 16.7893C8.17988 16.1563 7.41085 15.2568 6.95672 14.2043C6.5026 13.1518 6.38378 11.9936 6.61529 10.8763C6.8468 9.75895 7.41824 8.73262 8.25736 7.92706C9.09647 7.12151 10.1656 6.57293 11.3295 6.35068C12.4933 6.12843 13.6997 6.24249 14.7961 6.67845C15.8925 7.11441 16.8295 7.85269 17.4888 8.79992C18.1481 9.74714 18.5 10.8608 18.5 12C18.4982 13.5271 17.8655 14.9912 16.7407 16.071C15.6158 17.1509 14.0907 17.7583 12.5 17.76ZM19 7.2C18.7033 7.2 18.4133 7.11555 18.1666 6.95732C17.92 6.79909 17.7277 6.57419 17.6142 6.31106C17.5007 6.04794 17.4709 5.7584 17.5288 5.47907C17.5867 5.19974 17.7296 4.94315 17.9393 4.74177C18.1491 4.54038 18.4164 4.40323 18.7074 4.34767C18.9983 4.29211 19.2999 4.32062 19.574 4.42961C19.8481 4.5386 20.0824 4.72317 20.2472 4.95998C20.412 5.19679 20.5 5.47519 20.5 5.76C20.5 6.14191 20.342 6.50818 20.0607 6.77823C19.7794 7.04829 19.3978 7.2 19 7.2Z" fill="#0076FF"/>
                    </svg>                                          
                </a>
                <a href="https://t.me/Neo_invest_public_ru" target="_blank" class="sidebar-soc__item">
                    <svg width="28" height="27" viewBox="0 0 28 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M26.3746 1.14601C26.099 0.89119 25.7636 0.721963 25.4047 0.656656C25.0458 0.591349 24.677 0.632451 24.3383 0.775512L1.26869 10.4818C0.866579 10.651 0.526432 10.9551 0.299146 11.3486C0.0718591 11.7421 -0.0303463 12.2038 0.00782273 12.6647C0.0459917 13.1256 0.222483 13.5608 0.510887 13.9053C0.799292 14.2498 1.1841 14.485 1.60774 14.5758L7.4676 15.831V23.6696C7.46726 24.0934 7.58436 24.5078 7.80407 24.8603C8.02377 25.2127 8.3362 25.4875 8.70179 25.6496C9.06738 25.8118 9.46969 25.8541 9.85776 25.7713C10.2458 25.6884 10.6022 25.4841 10.8818 25.1842L14.1247 21.7112L19.0467 26.3499C19.4091 26.6945 19.8767 26.8852 20.3613 26.8858C20.572 26.8856 20.7814 26.85 20.9818 26.7804C21.3123 26.6682 21.6096 26.465 21.8439 26.1913C22.0783 25.9175 22.2415 25.5828 22.3173 25.2204L27.0191 3.24769C27.1009 2.86774 27.0841 2.47104 26.9705 2.10058C26.8569 1.73011 26.6508 1.4 26.3746 1.14601ZM20.3679 24.7419L10.0689 15.0354L24.8994 3.56439L20.3679 24.7419Z" fill="#0076FF"/>
                    </svg>                                              
                </a>
            </div>
        </div>


        <div class="bg-top">

            <header class="header">
                <div class="container">
                    <div class="header-list">
                        <a href="index.html" class="header-logo">
                            <img src="/img/new/logo.svg" alt="Neo-Invest logotype" class="img">
                        </a>
                        <div class="header-language">
                            <div class="header-language__btn header-language__visible">
                                <img src="/img/new/rus.svg" class="img header-language__flag" alt="icon: Russian flag">
                                <div class="header-language__text">RU</div>
                                <img src="/img/new/arrow.svg" alt="icon: arrow" class="img header-language__arrow">
                            </div>
                            <a href="/?lang=en" class="header-language__btn header-language__absolute">
                                <img src="/img/new/eng.svg" class="img header-language__flag" alt="icon: Russian flag">
                                <div class="header-language__text">EN</div>
                            </a>
                        </div>
                        <a href="/login" target="_blank" class="header-login">
                            <svg width="12" height="13" viewBox="0 0 12 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1 12.8517C1 12.8517 0 12.8517 0 11.7807C0 10.7097 1 7.4968 6 7.4968C11 7.4968 12 10.7097 12 11.7807C12 12.8517 11 12.8517 11 12.8517H1Z" fill="white" fill-opacity="0.5"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M6 6.42583C7.65685 6.42583 9 4.98736 9 3.21291C9 1.43847 7.65685 0 6 0C4.34315 0 3 1.43847 3 3.21291C3 4.98736 4.34315 6.42583 6 6.42583Z" fill="white" fill-opacity="0.5"/>
                            </svg>
                            <span>Войти</span>
                        </a>
                        <a href="/register" target="_blank" class="header-register">Регистрация</a>
                        <div class="header-hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                </div>
            </header>

            <main class="main">
                <div class="container">
                        <div class="main-wrapper">
                        <h1 class="main-title"><span data-aos="fade-up" data-aos-delay="400">Зарабатывайте до 1,7 % <br>в сутки с нами на трендах криптовалюты</span> <img src="/img/new/check.svg" alt="Neo-Invest" data-aos="fade-up" data-aos-delay="1300"></h1>
                        <div class="main-subtitle" data-aos="fade-up" data-aos-delay="800">Инвестиционная платформа с собственной системой обучения заработку на трендах  криптовалюты </div>
                        <div class="main-buttons">
                            <a href="#b1" class="main-btn btn btn-white scroll" data-aos="fade-in" data-aos-delay="1200">Подробнее</a>
                            <a href="https://drive.google.com/file/d/1RLqIsrKfSDySPRyku0Gc1lDYTScjIpOn/view?usp=sharing" target="_blank" class="main-borderBtn btn" data-aos="fade-in" data-aos-delay="1600">
                                <span>Скачать презентацию</span>
                                <b><img src="/img/new/download.svg" alt="icon: Download" class="img"></b>
                            </a>
                        </div>
                        <div class="main-bottom">
                            <div class="main-bottom__text" data-aos="fade-up" data-aos-delay="400">Работаем с проверенными криптовалютными биржами</div>
                            <div class="main-bottom__flex">
                                <div class="main-bottom__item"><img data-aos="fade-in" data-aos-delay="600" src="/img/new/main-logo-1.svg" alt="Binance" class="img"></div>
                                <div class="main-bottom__item"><img data-aos="fade-in" data-aos-delay="800" src="/img/new/main-logo-2.svg" alt="Huobi" class="img"></div>
                                <div class="main-bottom__item"><img data-aos="fade-in" data-aos-delay="1200" src="/img/new/main-logo-3.svg" alt="coinbase" class="img"></div>
                                <div class="main-bottom__item"><img data-aos="fade-in" data-aos-delay="1400" src="/img/new/main-logo-4.svg" alt="exmo-seeklogo" class="img"></div>
                                <div class="main-bottom__item"><img data-aos="fade-in" data-aos-delay="1600" src="/img/new/main-logo-5.svg" alt="poloniex" class="img"></div>
                            </div>
                        </div>
                        <img data-aos="fade-in" data-aos-delay="400" data-src="/img/new/main-phone.png" alt="iPhone" class="main-img lazy" src="data:image/gif;base64,R0lGODlhZQLyBIAAAP///wAAACH5BAEAAAEALAAAAABlAvIEAAL+jI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusra6voKGys7S1tre4ubq7vL2+v7CxwsPExcbHyMnKy8zNzs/AwdLT1NXW19jZ2tvc3d7f0NHi4+Tl5ufo6err7O3u7+Dh8vP09fb3+Pn6+/z9/v/w8woMCBBAsaPIgwocKFDBs6fAgxosSJFCtavIgxo8b+jRw7evwIMqTIkSRLmjyJMqXKlSxbunwJM6bMmTRr2ryJM6fOnTx7+vwJNKjQoUSLGj2KNKnSpUybOn0KNarUqVSrWr2KNavWrVy7ev0KNqzYsWTLmj2LNq3atWzbun0LN67cuXTr2r2LN6/evXz7+v0LOLDgwYQLGz6MOLHixYwbO34MObLkyZQrW76MObPmzZw7e/4MOrTo0aRLmz6NOrXq1axbu34NO7bs2bRr276NO7fu3bx7+/4NPLjw4cSLGz+OPLny5cybO38OPbr06dSrW7+OPbv27dy7e/8OPrz48eTLmz+PPr369ezbu38PP778+fTr27+PP7/+/fz++/v/D2CAAg5IYIEGHohgggouyGCDDj4IYYQSTkhhhRZeiGGGGm7IYYcefghiiCKOSGKJJp6IYooqrshiiy6+CGOMMs5IY4023ohjjjruyGOPPv4IZJBCDklkkUYeiWSSSi7JZJNOPglllFJOSWWVVl6JZZZabslll15+CWaYYo5JZplmnolmmmquyWabbr4JZ5xyzklnnXbeiWeeeu7JZ59+/glooIIOSmihhh6KaKKKLspoo44+Cmmkkk5KaaWWXopppppuymmnnn4Kaqiijkpqqaaeimqqqq7KaquuvgprrLLOSmuttt6Ka6667sprr77+Cmywwg5LbLHGHov+bLLKLstss84+C2200k5LbbXWXottttpuy2233n4Lbrjijktuueaei2666q7LbrvuvgtvvPLOS2+99t6Lb7767stvv/7+C3DAAg9McMEGH4xwwgovzHDDDj8MccQST0xxxRZfjHHGGm/McccefwxyyCKPTHLJJp+Mcsoqr8xyyy6/DHPMMs9Mc80234xzzjrvzHPPPv8MdNBCD0100UYfjXTSSi/NdNNOPw111FJPTXXVVl+NddZab811115/DXbYYo9Ndtlmn4122mqvzXbbbr8Nd9xyz0133XbfjXfeeu/Nd99+/w144IIPTnjhhh+OeOKKL854444/Dnnkkk/+Tnnlll+Oeeaab855555/Dnrooo9Oeummn4566qqvznrrrr8Oe+yyz0577bbfjnvuuu/Oe+++/w588MIPT3zxxh+PfPLKL898884/D3300k9PffXWX4999tpvz3333n8Pfvjij09++eafj3766q/Pfvvuvw9//PLPT3/99t+Pf/76789///7/D8AACnCABCygAQ+IwAQqcIEMbKADHwjBCEpwghSsoAUviMEManCDHOygBz8IwhCKcIQkLKEJT4jCFKpwhSxsoQtfCMMYynCGNKyhDW+IwxzqcIc87KEPfwjEIApxiEQsohGPiMQkKnGJTGyiE58IxShKcYpUrKLDFa+IxSxqcYtc7KIXvwjGMIpxjGQsoxnPiMY0qnGNbGyjG98IxzjKcY50rKMd74jHPOpxj3zsox//CMhACnKQhCykIQ+JyEQqcpGMbKQjHwnJSEpykpSspCUviclManKTnOykJz8JylCKcpSkLKUpT4nKVKpylaxspStfCctYynKWtKylLW+Jy1zqcpe87KUvfwnMYApzmMQspjGPicxkKnOZzGymM58JzWhKc5rUrKY1r4nNbGpzm9zspje/Cc5wrqYAADs=">
                    </div>
                </div>
            </main>
        
        </div>

        <section class="about" id="b1">
            <div class="container">
                <h2 class="about-title" data-aos="fade-up" data-aos-delay="400">О нас</h2>
                <div class="about-text" data-aos="fade-in" data-aos-delay="800"><span>Neo-Invest</span> – это инвестиционная платформа с собственной системой обучения клиентов, целью которой является приумножение денежных средств за короткий период.</div>
                <div class="about-wrapper">
                    <div class="about-bitcoin-wrapper" data-aos="fade-up" data-aos-delay="1200">
                        <img data-src="/img/new/bitcoin.png" alt="" class="about-bitcoin lazy" src="data:image/gif;base64,R0lGODlh8wP8AYAAAP///wAAACH5BAEAAAEALAAAAADzA/wBAAL+jI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusra6voKGys7S1tre4ubq7vL2+v7CxwsPExcbHyMnKy8zNzs/AwdLT1NXW19jZ2tvc3d7f0NHi4+Tl5ufo6err7O3u7+Dh8vP09fb3+Pn6+/z9/v/w8woMCBBAsaPIgwocKFDBs6fAgxosSJFCtavIgxo8b+jRw7evwIMqTIkSRLmjyJMqXKlSxbunwJM6bMmTRr2ryJM6fOnTx7+vwJNKjQoUSLGj2KNKnSpUybOn0KNarUqVSrWr2KNavWrVy7ev0KNqzYsWTLmj2LNq3atWzbun0LN67cuXTr2r2LN6/evXz7+v0LOLDgwYQLGz6MOLHixYwbO34MObLkyZQrW76MObPmzZw7e/4MOrTo0aRLmz6NOrXq1axbu34NO7bs2bRr276NO7fu3bx7+/4NPLjw4cSLGz+OPLny5cybO38OPbr06dSrW7+OPbv27dy7e/8OPrz48eTLmz+PPr369ezbu38PP778+fTr27+PP7/+/fz++/v/D2CAAg5IYIEGHohgggouyGCDDj4IYYQSTkhhhRZeiGGGGm7IYYcefghiiCKOSGKJJp6IYooqrshiiy6+CGOMMs5IY4023ohjjjruyGOPPv4IZJBCDklkkUYeiWSSSi7JZJNOPglllFJOSWWVVl6JZZZabslll15+CWaYYo5JZplmnolmmmquyWabbr4JZ5xyzklnnXbeiWeeeu7JZ59+/glooIIOSmihhh6KaKKKLspoo44+Cmmkkk5KaaWWXopppppuymmnnn4Kaqiijkpqqaaeimqqqq7KaquuvgprrLLOSmuttt6Ka6667sprr77+Cmywwg5LbLHGHov+bLLKLstss84+C2200k5LbbXWXottttpuy2233n4Lbrjijktuueaei2666q7LbrvuvgtvvPLOS2+99t6Lb7767stvv/7+C3DAAg9McMEGH4xwwgovzHDDDj8MccQST0xxxRZfjHHGGm/McccefwxyyCKPTHLJJp+Mcsoqr8xyyy6/DHPMMs9Mc80234xzzjrvzHPPPv8MdNBCD0100UYfjXTSSi/NdNNOPw111FJPTXXVVl+NddZab811115/DXbYYo9Ndtlmn4122mqvzXbbbr8Nd9xyz0133XbfjXfeeu/Nd99+/w144IIPTnjhhh+OeOKKL854444/Dnnkkk+CTnnlll+Oeeaab855555/Dnrooo9Oeummn4566qqvznrrrr8Oe+yyz0577bbfjnvuuu/Oe+++/w588MIPT3zxxh+PfPLKL898884/D3300k9PffXWX4999tpvz3333n8Pfvjij09++eafj3766q/Pfvvuvw9//PLPT3/99t+Pv/0FAAA7">
                    </div>
                    <div class="about-list">
                        <div class="about-item">
                            <div class="about-item__top" data-aos="fade-up" data-aos-delay="400">200%</div>
                            <div class="about-item__desc" data-aos="fade-in" data-aos-delay="800">Доходы компании в месяц на собственном оборотном капитале и инвестициях партнеров</div>
                        </div>
                        <div class="about-item">
                            <div class="about-item__top" data-aos="fade-up" data-aos-delay="400">30-50%</div>
                            <div class="about-item__desc" data-aos="fade-in" data-aos-delay="800">Заработок партнера в месяц на инвестированные средства, как часть наших доходов и экономии  на маркетинговых программах</div>
                        </div>
                    </div>
                </div>
                <div class="about-bottom">
                    <div class="about-bottom__promo"><span>Neo<br>invest</span></div>
                    <div class="about-bottom__block">
                        <div class="about-bottom__title" data-aos="fade-up" data-aos-delay="300">Наша миссия :</div>
                        <div class="about-bottom__text" data-aos="fade-in" data-aos-delay="600">Благодаря возможности обучать и получать сверхприбыль, мы сможем добиться того, чтобы большее количество людей смогли изменить свою жизнь к лучшему и научиться полностью контролировать свои финансы.</div>
                    </div>
                    <div class="about-bottom__block">
                        <div class="about-bottom__title" data-aos="fade-up" data-aos-delay="300">Наша цель :</div>
                        <div class="about-bottom__text" data-aos="fade-in" data-aos-delay="600">С помощью платформы Neo-Invest обучить наших клиентов  самостоятельно инвестировать в криптовалюту и получать сверхприбыль за короткий срок.</div>
                    </div>
                    <a href="/register" target="_blank" data-aos="fade-in" data-aos-delay="1000" class="about-bottom__btn btn">Начать инвестировать</a>
                    <div class="about-bottom__rocket"  data-aos="fade-up" data-aos-delay="400">
                        <img data-src="/img/new/rocket.png" alt="Rocket"class="img lazy" src="data:image/gif;base64,R0lGODlhwwPrBIAAAP///wAAACH5BAEAAAEALAAAAADDA+sEAAL+jI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusra6voKGys7S1tre4ubq7vL2+v7CxwsPExcbHyMnKy8zNzs/AwdLT1NXW19jZ2tvc3d7f0NHi4+Tl5ufo6err7O3u7+Dh8vP09fb3+Pn6+/z9/v/w8woMCBBAsaPIgwocKFDBs6fAgxosSJFCtavIgxo8b+jRw7evwIMqTIkSRLmjyJMqXKlSxbunwJM6bMmTRr2ryJM6fOnTx7+vwJNKjQoUSLGj2KNKnSpUybOn0KNarUqVSrWr2KNavWrVy7ev0KNqzYsWTLmj2LNq3atWzbun0LN67cuXTr2r2LN6/evXz7+v0LOLDgwYQLGz6MOLHixYwbO34MObLkyZQrW76MObPmzZw7e/4MOrTo0aRLmz6NOrXq1axbu34NO7bs2bRr276NO7fu3bx7+/4NPLjw4cSLGz+OPLny5cybO38OPbr06dSrW7+OPbv27dy7e/8OPrz48eTLmz+PPr369ezbu38PP778+fTr27+PP7/+/fz++/v/D2CAAg5IYIEGHohgggouyGCDDj4IYYQSTkhhhRZeiGGGGm7IYYcefghiiCKOSGKJJp6IYooqrshiiy6+CGOMMs5IY4023ohjjjruyGOPPv4IZJBCDklkkUYeiWSSSi7JZJNOPglllFJOSWWVVl6JZZZabslll15+CWaYYo5JZplmnolmmmquyWabbr4JZ5xyzklnnXbeiWeeeu7JZ59+/glooIIOSmihhh6KaKKKLspoo44+Cmmkkk5KaaWWXopppppuymmnnn4Kaqiijkpqqaaeimqqqq7KaquuvgprrLLOSmuttt6Ka6667sprr77+Cmywwg5LbLHGHov+bLLKLstss84+C2200k5LbbXWXottttpuy2233n4Lbrjijktuueaei2666q7LbrvuvgtvvPLOS2+99t6Lb7767stvv/7+C3DAAg9McMEGH4xwwgovzHDDDj8MccQST0xxxRZfjHHGGm/McccefwxyyCKPTHLJJp+Mcsoqr8xyyy6/DHPMMs9Mc80234xzzjrvzHPPPv8MdNBCD0100UYfjXTSSi/NdNNOPw111FJPTXXVVl+NddZab811115/DXbYYo9Ndtlmn4122mqvzXbbbr8Nd9xyz0133XbfjXfeeu/Nd99+/w144IIPTnjhhh+OeOKKL854444/Dnnkkk/+Tnnlll+Oeeaab855555/Dnrooo9Oeummn4566qqvznrrrr8Oe+yyz0577bbfjnvuuu/Oe+++/w588MIPT3zxxh+PfPLKL898884/D3300k9PffXWX4999tpvz3333n8Pfvjij09++eafj3766q/Pfvvuvw9//PLPT3/99t+Pf/76789///7/D8AACnCABCygAQ+IwAQqcIEMbKADHwjBCEpwghSsoAUviMEManCDHOygBz8IwhCKcIQkLKEJT4jCFKpwhSxsoQtfCMMYynCGNKyhDW+IwxzqcIc87KEPfwjEIApxiEQsohGPiMQkKnGJTGyiE58IxShKcYpUrKL+Fa+IxSxqcYtc7KIXvwjGMIpxjGQsoxnPiMY0qnGNbGyjG98IxzjKcY50rKMd74jHPOpxj3zsox//CMhACnKQhCykIQ+JyEQqcpGMbKQjHwnJSEpykpSspCUviclManKTnOykJz8JylCKcpSkLKUpT4nKVKpylaxspStfCctYynKWtKylLW+Jy1zqcpe87KUvfwnMYApzmMQspjGPicxkKnOZzGymM58JzWhKc5rUrKY1r4nNbGpzm9zspje/Cc5winOc5CynOc+JznSqc53sbKc73wnPeMpznvSspz3vic986nOf/OynP/8J0IAKdKAELahBD4rQhCp0oQxtqEP+HwrRiEp0ohStqEUvitGManSjHO2oRz8K0pCKdKQkLalJT4rSlKp0pSxtqUtfCtOYynSmNK2pTW+K05zqdKc87alPfwrUoAp1qEQtqlGPitSkKnWpTG2qU58K1ahKdapUrapVr4rVrGp1q1ztqle/CtawinWsZC2rWc+K1rSqda1sbatb3wrXuMp1rnStq13vite86nWvfO2rX/8K2MAKdrCELaxhD4vYxCp2sYxtrGMfC9nISnaylK2sZS+L2cxqdrOc7axnPwva0Ip2tKQtrWlPi9rUqna1rG2ta18L29jKdra0ra1tb4vb3Op2t7ztrW9/C9zgCne4xC2ucY9zi9zkKne5zG2uc58L3ehKd7rUra51r4vd7Gp3u9ztrne/C97wine85C2vec+L3vSqd73sba973wvf+Mp3vvStr33vi9/86ne//O2vf/8L4AALeMAELrCBD4zgBCt4wQxusIMfDOEIS3jCFK6whS+M4RkWAAA7">
                        <span>Neo-Invest</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="tools" id="b2">
            <div class="blue-top">
                <div class="blue-top__wrapper"></div>
            </div>
            <img data-src="/img/new/blur.png" src="/img/new/load.svg" alt="" class="tools-blur lazy">
            <img data-src="/img/new/blur.png" src="/img/new/load.svg" alt="" class="tools-blur left lazy">
            <img src="/img/new/bg-tools.svg" alt="background" class="tools-bg">
            <div class="container">
                <h2 class="title white center" data-aos="fade-up" data-aos-delay="400" >Наш инвестиционный <br>инструментарий</h2>
                <div class="tools-wrapper">
                    <div class="tools-list">
                        <div class="tools-item">
                            <div class="tools-item__title" data-aos="fade-up" data-aos-delay="500">Трейдинг NFT</div>
                            <div class="tools-item__text" data-aos="fade-in" data-aos-delay="900">NFT – это невзаимозаменяемый токен, 
                                уникальный токен – один из видов
                                криптографического токена, каждый
                                экземпляр которого уникален.
                                </div>
                        </div>
                        <div class="tools-item">
                            <div class="tools-item__title" data-aos="fade-up" data-aos-delay="400">Стейкинг и IDO</div>
                            <div class="tools-item__text" data-aos="fade-in" data-aos-delay="900">IDO (Initial DEX Offering, первоначальное
                                децентрализованное предложение) — это 
                                модель запуска токена через сбор средств на
                                децентрализованной бирже.</div>
                        </div>
                        <div class="tools-item">
                            <div class="tools-item__title" data-aos="fade-up" data-aos-delay="400">Трейдинг</div>
                            <div class="tools-item__text" data-aos="fade-in" data-aos-delay="900">При обмене криптовалют на соответствующих
                                биржах, существует целый ряд алгоритмических
                                возможностей для получения дохода: использование
                                разницы на курсах на различных криптобиржах, 
                                получение дохода при небольших колебаниях
                                курсов («скальпинг», «пипсовка»), и ряд других
                                подходов.
                                </div>
                        </div>
                        <div class="tools-item">
                            <div class="tools-item__title" data-aos="fade-up" data-aos-delay="500">Фарминг</div>
                            <div class="tools-item__text" data-aos="fade-up" data-aos-delay="900">Фарминг (Yield Farming) или доходное
                                фермерство – это способ заработка
                                криптовалют и токенов путем добавления
                                криптоактивов в пулы ликвидности или 
                                предоставления флеш-кредитов*.Другими 
                                словами, farming в DeFi представляет собой 
                                микс лендинга и стейкинга криптовалют. </div>
                        </div>
                    </div>
                    <div class="cube-wrapper" data-aos="fade-up" data-aos-delay="400">
                        <img data-src="/img/new/cube.png" alt="cube" class="tools-cube lazy" src="data:image/gif;base64,R0lGODlhDQPaAoAAAP///wAAACH5BAEAAAEALAAAAAANA9oCAAL+jI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusra6voKGys7S1tre4ubq7vL2+v7CxwsPExcbHyMnKy8zNzs/AwdLT1NXW19jZ2tvc3d7f0NHi4+Tl5ufo6err7O3u7+Dh8vP09fb3+Pn6+/z9/v/w8woMCBBAsaPIgwocKFDBs6fAgxosSJFCtavIgxo8b+jRw7evwIMqTIkSRLmjyJMqXKlSxbunwJM6bMmTRr2ryJM6fOnTx7+vwJNKjQoUSLGj2KNKnSpUybOn0KNarUqVSrWr2KNavWrVy7ev0KNqzYsWTLmj2LNq3atWzbun0LN67cuXTr2r2LN6/evXz7+v0LOLDgwYQLGz6MOLHixYwbO34MObLkyZQrW76MObPmzZw7e/4MOrTo0aRLmz6NOrXq1axbu34NO7bs2bRr276NO7fu3bx7+/4NPLjw4cSLGz+OPLny5cybO38OPbr06dSrW7+OPbv27dy7e/8OPrz48eTLmz+PPr369ezbu38PP778+fTr27+PP7/+/fz++/v/D2CAAg5IYIEGHohgggouyGCDDj4IYYQSTkhhhRZeiGGGGm7IYYcefghiiCKOSGKJJp6IYooqrshiiy6+CGOMMs5IY4023ohjjjruyGOPPv4IZJBCDklkkUYeiWSSSi7JZJNOPglllFJOSWWVVl6JZZZabslll15+CWaYYo5JZplmnolmmmquyWabbr4JZ5xyzklnnXbeiWeeeu7JZ59+/glooIIOSmihhh6KaKKKLspoo44+Cmmkkk5KaaWWXopppppuymmnnn4Kaqiijkpqqaaeimqqqq7KaquuvgprrLLOSmuttt6Ka6667sprr77+Cmywwg5LbLHGHov+bLLKLstss84+C2200k5LbbXWXottttpuy2233n4Lbrjijktuueaei2666q7LbrvuvgtvvPLOS2+99t6Lb7767stvv/7+C3DAAg9McMEGH4xwwgovzHDDDj8MccQST0xxxRZfjHHGGm/McccefwxyyCKPTHLJJp+Mcsoqr8xyyy6/DHPMMs9Mc80234xzzjrvzHPPPv8MdNBCD0100UYfjXTSSi/NdNNOPw111FJPTXXVVl+NddZab811115/DXbYYo9Ndtlmn4122mqvzXbbbr8Nd9xyz0133XbfjXfeeu/Nd99+/w144IIPTnjhhh+OeOKKL854444/Dnnkkk/NTnnlll+Oeeaab855555/Dnrooo9Oeummn4566qqvznrrrr8Oe+yyz0577bbfjnvuuu/Oe+++/w588MIPT3zxxh+PfPLKL898884/D3300k9PffXWX4999tpvz3333n8Pfvjij09++eafj3766q/Pfvvuvw9//PLPT3/99t+Pf/76789///7/D8AACnCABCygAQ+IwAQqcIEMbKADHwjBCEpwghSsoAUviMEManCDHOygBz8IwhCKcIQkLKEJT4jCFKpwhSxsoQtfSJYCAAA7">
                    </div>
                </div>
                <div class="tools-bottom">
                    <div class="tools-bottom__title" data-aos="fade-in" data-aos-delay="700">Алгоритмический арбитраж на криптовалюте</div>
                    <div class="tools-bottom__text" data-aos="fade-in" data-aos-delay="1200">При обмене криптовалют на соответствующих биржах, существует целый ряд алгоритмических возможностей для получения дохода: использование разницы на курсах на различных криптобиржах, получение дохода при небольших колебаниях курсов («скальпинг», «пипсовка»), и ряд других подходов.</div>
                </div>
            </div>
        </section>

        <div class="bg-center">
            
            <section class="packets" id="b3">
                <div class="container">
                    <h2 class="title center" data-aos="fade-in" data-aos-delay="200">Инвестиционные <span>предложения</span></h2>
                    <div class="packets-list">
                        <div class="packets-block" data-aos="fade-in" data-aos-delay="400">
                            <div class="packets-item">
                                <div class="packets-item__img"><img data-src="/img/new/pacekts-1.png" alt="" class="img lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAEALAAAAAABAAEAAAICTAEAOw=="></div>
                                <div class="packets-item__name">Neo Infinity</div>
                                <div class="packets-item__list">
                                    <div class="packets-item__block">
                                        <span>Срок действия:</span>
                                        <p>Бессрочный</p>
                                    </div>
                                    <div class="packets-item__block">
                                        <span>Минимальная сумма инвестиций:</span>
                                        <p>100$</p>
                                    </div>
                                    <div class="packets-item__block">
                                        <span>Ежедневный процент:</span>
                                        <p>1,1% без выходных</p>
                                    </div>
                                    <div class="packets-item__block">
                                        <span>Начисления:</span>
                                        <p>Ежедневно</p>
                                    </div>
                                    <div class="packets-item__block">
                                        <span>Возврат вложеных средств:</span>
                                        <p>Нет</p>
                                        <div class="packets-item__question small">
                                            <img src="/img/new/question.svg" alt="question" class="img">
                                            <p>Вложенные средства автоматически возвращаются с каждым ежедневным начислением прибыли</p>
                                        </div>
                                    </div>
                                </div>
                                <a href="/register" target="_blank" class="packets-item__btn btn">Открыть пакет</a>
                            </div>
                        </div>
                        <div class="packets-block" data-aos="fade-in" data-aos-delay="600">
                            <div class="packets-item">
                                <div class="packets-item__img"><img data-src="/img/new/pacekts-2.png" alt="" class="img lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAEALAAAAAABAAEAAAICTAEAOw=="></div>
                                <div class="packets-item__name">Neo Back</div>
                                <div class="packets-item__list">
                                    <div class="packets-item__block">
                                        <span>Срок действия:</span>
                                        <p>Бессрочный</p>
                                    </div>
                                    <div class="packets-item__block">
                                        <span>Минимальная сумма инвестиций:</span>
                                        <p>100$</p>
                                    </div>
                                    <div class="packets-item__block">
                                        <span>Ежедневный процент:</span>
                                        <p>0,9% без выходных</p>
                                    </div>
                                    <div class="packets-item__block">
                                        <span>Начисления:</span>
                                        <p>Ежедневно</p>
                                    </div>
                                    <div class="packets-item__block">
                                        <span>Возврат вложеных средств:</span>
                                        <p>Да</p>
                                        <div class="packets-item__question">
                                            <img src="/img/new/question.svg" alt="question" class="img">
                                            <p>Прибыль по пакету перестанет начисляться, как только пакет будет закрыт. <br>Вся сумма будет зачислена на ваш баланс через 30 рабочих дней и будет доступна для вывода.</p>
                                        </div>
                                    </div>
                                </div>
                                <a href="/register" target="_blank" class="packets-item__btn btn">Открыть пакет</a>
                            </div>
                        </div>
                        <div class="packets-block" data-aos="fade-in" data-aos-delay="800">
                            <div class="packets-item">
                                <div class="packets-item__img"><img data-src="/img/new/pacekts-3.png" alt="" class="img lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAEALAAAAAABAAEAAAICTAEAOw=="></div>
                                <div class="packets-item__name">Neo Premium</div>
                                <div class="packets-item__list">
                                    <div class="packets-item__block">
                                        <span>Срок действия:</span>
                                        <p>120 дней</p>
                                    </div>
                                    <div class="packets-item__block">
                                        <span>Минимальная сумма инвестиций:</span>
                                        <p>5000$</p>
                                    </div>
                                    <div class="packets-item__block">
                                        <span>Ежедневный процент:</span>
                                        <p>1,7% без выходных</p>
                                    </div>
                                    <div class="packets-item__block">
                                        <span>Начисления:</span>
                                        <p>Ежедневно</p>
                                    </div>
                                    <div class="packets-item__block">
                                        <span>Возврат вложеных средств:</span>
                                        <p>Нет</p>
                                        <div class="packets-item__question small">
                                            <img src="/img/new/question.svg" alt="question" class="img">
                                            <p>Вложенные средства автоматически возвращаются с каждым ежедневным начислением прибыли</p>
                                        </div>
                                    </div>
                                </div>
                                <a href="/register" target="_blank" class="packets-item__btn btn">Открыть пакет</a>
                            </div>
                        </div>
                    </div>
                    <div class="packets-slider swiper">
                        <div class="swiper-wrapper">
                            <div class="packets-block swiper-slide">
                                <div class="packets-item">
                                    <div class="packets-item__img"><img data-src="/img/new/pacekts-1.png" alt="" class="img lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAEALAAAAAABAAEAAAICTAEAOw=="></div>
                                    <div class="packets-item__name">Neo Infinity</div>
                                    <div class="packets-item__list">
                                        <div class="packets-item__block">
                                            <span>Срок действия:</span>
                                            <p>Бессрочный</p>
                                        </div>
                                        <div class="packets-item__block">
                                            <span>Минимальная сумма инвестиций:</span>
                                            <p>100$</p>
                                        </div>
                                        <div class="packets-item__block">
                                            <span>Ежедневный процент:</span>
                                            <p>1,1% без выходных</p>
                                        </div>
                                        <div class="packets-item__block">
                                            <span>Начисления:</span>
                                            <p>Ежедневно</p>
                                        </div>
                                        <div class="packets-item__block">
                                            <span>Возврат вложеных средств:</span>
                                            <p>Нет</p>
                                            <div class="packets-item__question small">
                                                <img src="/img/new/question.svg" alt="question" class="img">
                                                <p>Вложенные средства автоматически возвращаются с каждым ежедневным начислением прибыли</p>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/register" target="_blank" class="packets-item__btn btn">Открыть пакет</a>
                                </div>
                            </div>
                            <div class="packets-block swiper-slide">
                                <div class="packets-item">
                                    <div class="packets-item__img"><img data-src="/img/new/pacekts-2.png" alt="" class="img lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAEALAAAAAABAAEAAAICTAEAOw=="></div>
                                    <div class="packets-item__name">Neo Back</div>
                                    <div class="packets-item__list">
                                        <div class="packets-item__block">
                                            <span>Срок действия:</span>
                                            <p>Бессрочный</p>
                                        </div>
                                        <div class="packets-item__block">
                                            <span>Минимальная сумма инвестиций:</span>
                                            <p>100$</p>
                                        </div>
                                        <div class="packets-item__block">
                                            <span>Ежедневный процент:</span>
                                            <p>0,9% без выходных</p>
                                        </div>
                                        <div class="packets-item__block">
                                            <span>Начисления:</span>
                                            <p>Ежедневно</p>
                                        </div>
                                        <div class="packets-item__block">
                                            <span>Возврат вложеных средств:</span>
                                            <p>Да</p>
                                            <div class="packets-item__question">
                                                <img src="/img/new/question.svg" alt="question" class="img">
                                                <p>Прибыль по пакету перестанет начисляться, как только пакет будет закрыт. <br>Вся сумма будет зачислена на ваш баланс через 30 рабочих дней и будет доступна для вывода.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/register" target="_blank" class="packets-item__btn btn">Открыть пакет</a>
                                </div>
                            </div>
                            <div class="packets-block swiper-slide">
                                <div class="packets-item">
                                    <div class="packets-item__img"><img data-src="/img/new/pacekts-3.png" alt="" class="img lazy" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAEALAAAAAABAAEAAAICTAEAOw=="></div>
                                    <div class="packets-item__name">Neo Premium</div>
                                    <div class="packets-item__list">
                                        <div class="packets-item__block">
                                            <span>Срок действия:</span>
                                            <p>120 дней</p>
                                        </div>
                                        <div class="packets-item__block">
                                            <span>Минимальная сумма инвестиций:</span>
                                            <p>5000$</p>
                                        </div>
                                        <div class="packets-item__block">
                                            <span>Ежедневный процент:</span>
                                            <p>1,7% без выходных</p>
                                        </div>
                                        <div class="packets-item__block">
                                            <span>Начисления:</span>
                                            <p>Ежедневно</p>
                                        </div>
                                        <div class="packets-item__block">
                                            <span>Возврат вложеных средств:</span>
                                            <p>Нет</p>
                                            <div class="packets-item__question small">
                                                <img src="/img/new/question.svg" alt="question" class="img">
                                                <p>Вложенные средства автоматически возвращаются с каждым ежедневным начислением прибыли</p>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="/register" target="_blank" class="packets-item__btn btn">Открыть пакет</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-button-next swiper-button-arrow"></div>
                        <div class="swiper-button-prev swiper-button-arrow"></div>
                    </div>
                    <div class="packets-buttons">
                        <div class="packets-buttons__arrow prev"></div>
                        <div class="packets-buttons__arrow next"></div>
                    </div>
                </div>
            </section>

            <section class="calculator" id="b4">
                <div class="container">
                    <h2 class="title">Рассчитайте <span>вашу прибыль</span></h2>
                    <div class="calculator-wrapper">
                        <div class="calculator-bold">Выберите пакет</div>
                        <div class="calculator-flex">
                            <div class="calculator-left">
                                <div class="calculator-tarifs">
                                    <div class="calculator-tarif active" data-parcent="1.1">Neo Infinity</div>
                                    <div class="calculator-tarif" data-parcent="0.9">Neo Back</div>
                                    <div class="calculator-tarif" data-parcent="1.7">Neo Premium</div>
                                </div>
                                <div class="calculator-line"></div>
                                <div class="calculator-onkey">
                                    <div class="calculator-onkey__title">Введите сумму инвестиции</div>
                                    <input type="text" class="calculator-onkey__input" placeholder="Введите сумму">
                                    <div class="calculator-onkey__event"><span>Ошибка!</span> Минимальная инвестиция <b>100 USDT</b></div>
                                </div>
                                <div class="calculator-range">
                                    <div class="calculator-range__title">Быстрый выбор суммы</div>
                                    <div class="calculator-range__result"><span>252</span> USDT</div>
                                    <div id="slider-range"></div>
                                    <div class="calculator-range__bottom">
                                        <span>100 USDT</span>
                                        <span>1 000 000 USDT</span>
                                    </div>
                                </div>
                                <a href="/register" target="_blank" class="calculator-btn btn">Инвестировать сейчаc</a>
                            </div>
                            <div class="calculator-right">
                                <div class="calculator-right__wrapper">
                                    <div class="calculator-right__title">Предварительный расчет</div>
                                    <div class="calculator-right__line"></div>
                                    <div class="calculator-right__list">
                                        <div class="calculator-right__item">
                                            <div class="calculator-right__price">
                                                <span class="calculator-day">15</span>
                                                <small> $ </small>
                                                <b>/</b>
                                            </div>
                                            <div class="calculator-right__term">В день</div>
                                        </div>
                                        <div class="calculator-right__item">
                                            <div class="calculator-right__price">
                                                <span class="calculator-week">150</span>
                                                <small> $ </small>
                                                <b>/</b>
                                            </div>
                                            <div class="calculator-right__term">В неделю</div>
                                        </div>
                                        <div class="calculator-right__item">
                                            <div class="calculator-right__price">
                                                <span class="calculator-month">1500</span>
                                                <small> $ </small>
                                                <b>/</b>
                                            </div>
                                            <div class="calculator-right__term">В месяц</div>
                                        </div>
                                        <div class="calculator-right__item">
                                            <div class="calculator-right__price">
                                                <span class="calculator-year">15000</span>
                                                <small> $ </small>
                                                <b>/</b>
                                            </div>
                                            <div class="calculator-right__term">В год</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="calculator-parcent lazy" data-bg="/img/new/parcent-bg.jpg">
                                    <div class="calculator-parcent__title">Ежедневный процент :</div>
                                    <div class="calculator-parcent__result"><span>1.1</span> %</div>
                                    <img src="/img/new/parcent-money.png" alt="Money" class="calculator-parcent__img">
                                </div>
                            </div>
                        </div>
                        <a href="/register" target="_blank" class="calculator-btn btn mobile">Инвестировать сейчаc</a>
                    </div>
                </div>
            </section>

        </div>

        <section class="programs" id="b5">
            <div class="blue-top">
                <div class="blue-top__wrapper"></div>
            </div>
            <img data-src="/img/new/blur.png" src="/img/new/load.svg" alt="" class="programs-blur lazy">
            <img data-src="/img/new/blur.png" src="/img/new/load.svg" alt="" class="programs-blur left lazy">
            <div class="container">
                <h2 class="title center white" data-aos="fade-up" data-aos-delay="300">Чтобы сократить маркетинговые расходы, мы предусмотрели партнерскую программу</h2>
                <div class="programs-wrapper">
                    <div class="programs-imagesWrapper" data-aos="fade-up" data-aos-delay="600">
                        <img data-src="/img/new/programs.png" alt="" class="programs-img lazy" src="data:image/gif;base64,R0lGODlh1QGbAYAAAP///wAAACH5BAEAAAEALAAAAADVAZsBAAL+jI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusra6voKGys7S1tre4ubq7vL2+v7CxwsPExcbHyMnKy8zNzs/AwdLT1NXW19jZ2tvc3d7f0NHi4+Tl5ufo6err7O3u7+Dh8vP09fb3+Pn6+/z9/v/w8woMCBBAsaPIgwocKFDBs6fAgxosSJFCtavIgxo8b+jRw7evwIMqTIkSRLmjyJMqXKlSxbunwJM6bMmTRr2ryJM6fOnTx7+vwJNKjQoUSLGj2KNKnSpUybOn0KNarUqVSrWr2KNavWrVy7ev0KNqzYsWTLmj2LNq3atWzbun0LN67cuXTr2r2LN6/evXz7+v0LOLDgwYQLGz6MOLHixYwbO34MObLkyZQrW76MObPmzZw7e/4MOrTo0aRLmz6NOrXq1axbu34NO7bs2bRr276NO7fu3bx7+/4NPLjw4cSLGz+OPLny5cybO38OPbr06dSrW7+OPbv27dy7e/8OPrz48eTLmz+PPr369ezbu38PP778+fTr27+PP7/+/fyU+/v/D2CAAg5IYIEGHohgggouyGCDDj4IYYQSTkhhhRZeiGGGGm7IYYcefghiiCKOSGKJJp6IYooqrshiiy6+CGOMMs5IY4023ohjjjruyGOPPv4IZJBCDklkkUYeiWSSSi7JZJNOPglllFJOSWWVVl6JZZZabslll15+CWaYYo5JZplmnolmmmquyWabbr4JZz8FAAA7">
                    </div>
                    <div class="programs-list">
                        <div class="programs-item" data-aos="fade-up" data-aos-delay="400">
                            <span>до 30k $</span>
                            <p>Бонус за переходы</p>
                        </div>
                        <div class="programs-item" data-aos="fade-up" data-aos-delay="600">
                            <span>до 13%</span>
                            <p>Реферальный бонус</p>
                        </div>
                        <div class="programs-item" data-aos="fade-up" data-aos-delay="800">
                            <span>до 0,5%</span>
                            <p>От всего оборота структуры <br>к уровню Директор</p>
                        </div>
                        <div class="programs-item" data-aos="fade-up" data-aos-delay="1200">
                            <span>10</span>
                            <p>Уровней Партнерской <br>программы</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="bg-gray">

            <section class="levels">
                <div class="container">
                    <div class="levels-container">
                        <div class="levels-slider swiper">
                            <div class="swiper-wrapper">
    
                                <div class="levels-slide swiper-slide">                             
                                    <div class="levels-wrapper">
                                        <div class="levels-item">
                                            <div class="levels-text start">Уровень</div>
                                            <div class="levels-text">Уровень 0</div>
                                            <div class="levels-text">Уровень 1</div>
                                            <div class="levels-text">Уровень 2</div>
                                            <div class="levels-text five">Уровень 3</div>
                                        </div>
                                        <div class="levels-item">
                                            <div class="levels-text start">Структурный оборот</div>
                                            <div class="levels-text">-</div>
                                            <div class="levels-text">20 000 $</div>
                                            <div class="levels-text">50 000 $</div>
                                            <div class="levels-text five">200 000 $</div>
                                        </div>
                                        <div class="levels-item">
                                            <div class="levels-text start">Оборот по 1 линии *</div>
                                            <div class="levels-text">-</div>
                                            <div class="levels-text">-</div>
                                            <div class="levels-text">10 000 $</div>
                                            <div class="levels-text five">15 000 $</div>
                                        </div>
                                        <div class="levels-item">
                                            <div class="levels-text start">Бонус за переход</div>
                                            <div class="levels-text">-</div>
                                            <div class="levels-text">400 $</div>
                                            <div class="levels-text">800 $</div>
                                            <div class="levels-text five">2 000 $</div>
                                        </div>
                                        <div class="levels-item">
                                            <div class="levels-text start">Реферальный бонус</div>
                                            <div class="levels-text block">
                                                <span>1 линия = 4 %</span>
                                                <span>2 линия = 1 %</span>
                                                <span>3 линия = 0,5 %</span>
                                                <span>4 линия = 0,5 %</span>
                                            </div>
                                            <div class="levels-text block">
                                                <span>1 линия = 5 %</span>
                                                <span>2 линия = 1 %</span>
                                                <span>3 линия = 0,5 %</span>
                                                <span>4 линия = 0,5 %</span>
                                            </div>
                                            <div class="levels-text block">
                                                <span>1 линия = 6 %</span>
                                                <span>2 линия = 1 %</span>
                                                <span>3 линия = 0,5 %</span>
                                                <span>4 линия = 0,5 %</span>
                                            </div>
                                            <div class="levels-text block">
                                                <span>1 линия = 7 %</span>
                                                <span>2 линия = 1 %</span>
                                                <span>3 линия = 0,5 %</span>
                                                <span>4 линия = 0,5 %</span>
                                                <span>5 линия = 0,5 %</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="levels-slide swiper-slide">                             
                                    <div class="levels-wrapper">
                                        <div class="levels-item">
                                            <div class="levels-text start">Уровень</div>
                                            <div class="levels-text six">Уровень 4</div>
                                            <div class="levels-text seven">Уровень 5</div>
                                            <div class="levels-text eight">Уровень 6</div>
                                            <div class="levels-text eight">Уровень 7</div>
                                        </div>
                                        <div class="levels-item">
                                            <div class="levels-text start">Структурный оборот</div>
                                            <div class="levels-text six">500 000 $</div>
                                            <div class="levels-text seven">1 000 000 $</div>
                                            <div class="levels-text eight">2 500 000 $</div>
                                            <div class="levels-text eight">5 000 000 $</div>
                                        </div>
                                        <div class="levels-item">
                                            <div class="levels-text start">Оборот по 1 линии *</div>
                                            <div class="levels-text six">20 000 $</div>
                                            <div class="levels-text seven">30 000 $</div>
                                            <div class="levels-text eight">40 000 $</div>
                                            <div class="levels-text eight">50 000 $</div>
                                        </div>
                                        <div class="levels-item">
                                            <div class="levels-text start">Бонус за переход</div>
                                            <div class="levels-text six">2 500 $</div>
                                            <div class="levels-text seven">4 000 $</div>
                                            <div class="levels-text eight">5 000 $</div>
                                            <div class="levels-text eight">10 000 $</div>
                                        </div>
                                        <div class="levels-item">
                                            <div class="levels-text start">Реферальный бонус</div>
                                            <div class="levels-text block">
                                                <span>1 линия = 8 %</span>
                                                <span>2 линия = 1 %</span>
                                                <span>3 линия = 0,5 %</span>
                                                <span>4 линия = 0,5 %</span>
                                                <span>5 линия = 0,5 %</span>
                                                <span>6 линия = 0,5 %</span>
                                            </div>
                                            <div class="levels-text block">
                                                <span>1 линия = 9 %</span>
                                                <span>2 линия = 1 %</span>
                                                <span>3 линия = 0,5 %</span>
                                                <span>4 линия = 0,5 %</span>
                                                <span>5 линия = 0,5 %</span>
                                                <span>6 линия = 0,5 %</span>
                                                <span>7 линия = 0,25 %</span>
                                            </div>
                                            <div class="levels-text block">
                                                <span>1 линия = 10 %</span>
                                                <span>2 линия = 1 %</span>
                                                <span>3 линия = 0,5 %</span>
                                                <span>4 линия = 0,5 %</span>
                                                <span>5 линия = 0,5 %</span>
                                                <span>6 линия = 0,5 %</span>
                                                <span>7 линия = 0,25 %</span>
                                                <span>8 линия = 0,25 %</span>
                                            </div>
                                            <div class="levels-text block">
                                                <span>1 линия = 11 %</span>
                                                <span>2 линия = 2 %</span>
                                                <span>3 линия = 1 %</span>
                                                <span>4 линия = 0,5 %</span>
                                                <span>5 линия = 0,5 %</span>
                                                <span>6 линия = 0,5 %</span>
                                                <span>7 линия = 0,5 %</span>
                                                <span>8 линия = 0,5 %</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="levels-slide swiper-slide">                             
                                    <div class="levels-wrapper">
                                        <div class="levels-item">
                                            <div class="levels-text start">Уровень</div>
                                            <div class="levels-text nine">Уровень 8</div>
                                            <div class="levels-text nine">Уровень VIP</div>
                                        </div>
                                        <div class="levels-item">
                                            <div class="levels-text start">Структурный оборот</div>
                                            <div class="levels-text nine">10 000 000 $</div>
                                            <div class="levels-text nine">20 000 000 $</div>
                                        </div>
                                        <div class="levels-item">
                                            <div class="levels-text start">Оборот по 1 линии *</div>
                                            <div class="levels-text nine">70 000 $</div>
                                            <div class="levels-text nine">90 000 $</div>
                                        </div>
                                        <div class="levels-item">
                                            <div class="levels-text start">Бонус за переход</div>
                                            <div class="levels-text nine">20 000 $</div>
                                            <div class="levels-text nine">30 000 $</div>
                                        </div>
                                        <div class="levels-item">
                                            <div class="levels-text start">Реферальный бонус</div>
                                            <div class="levels-text block">
                                                <span>1 линия = 12 %</span>
                                                <span>2 линия = 3 %</span>
                                                <span>3 линия = 1 %</span>
                                                <span>4 линия = 1 %</span>
                                                <span>5 линия = 0,5 %</span>
                                                <span>6 линия = 0,5 %</span>
                                                <span>7 линия = 0,5 %</span>
                                                <span>8 линия = 0,5 %</span>
                                                <span>9 линия = 0,5 %</span>
                                            </div>
                                            <div class="levels-text block">
                                                <span>1 линия = 13 %</span>
                                                <span>2 линия = 4 %</span>
                                                <span>3 линия = 1 %</span>
                                                <span>4 линия = 1 %</span>
                                                <span>5 линия = 1 %</span>
                                                <span>6 линия = 0,5 %</span>
                                                <span>7 линия = 0,5 %</span>
                                                <span>8 линия = 0,5 %</span>
                                                <span>9 линия = 0,5 %</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                            <div class="swiper-button-next swiper-button-arrow"></div>
                            <div class="swiper-button-prev swiper-button-arrow"></div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="packets-buttons">
                            <div class="packets-buttons__arrow prev"></div>
                            <div class="packets-buttons__arrow next"></div>
                        </div>

                    </div>
                    <div class="levels-mobile">
                        <div class="levels-scrollbar scrollbar">
                            <div class="levels-mobile__title">Уровень</div>
                            <div class="levels-mobile__tabs">
                                <div class="levels-mobile__tab active">0</div>
                                <div class="levels-mobile__tab">1</div>
                                <div class="levels-mobile__tab">2</div>
                                <div class="levels-mobile__tab">3</div>
                                <div class="levels-mobile__tab">4</div>
                                <div class="levels-mobile__tab">5</div>
                                <div class="levels-mobile__tab">6</div>
                                <div class="levels-mobile__tab">7</div>
                                <div class="levels-mobile__tab">8</div>
                                <div class="levels-mobile__tab">VIP</div>
                            </div>
                            <div class="levels-mobile__contents">
    
                                <div class="levels-mobile__content">
                                    <div class="levels-mobile__flex">
                                        <div class="levels-mobile__item">
                                            <span>Структурный оборот</span>
                                            <p>-</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Оборот по 1 линии *</span>
                                            <p>-</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Бонус за переход</span>
                                            <p>-</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Реферальный бонус</span>
                                            <p class="levels-mobile__text">
                                                <small>1 линия = 4 %</small>
                                                <small>2 линия = 1 %</small>
                                                <small>3 линия = 0,5 %</small>
                                                <small>4 линия = 0,5 %</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="levels-mobile__content">
                                    <div class="levels-mobile__flex">
                                        <div class="levels-mobile__item">
                                            <span>Структурный оборот</span>
                                            <p>20 000 $</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Оборот по 1 линии *</span>
                                            <p>-</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Бонус за переход</span>
                                            <p>400$</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Реферальный бонус</span>
                                            <p class="levels-mobile__text">
                                                <small>1 линия = 5 %</small>
                                                <small>2 линия = 1 %</small>
                                                <small>3 линия = 0,5 %</small>
                                                <small>4 линия = 0,5 %</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="levels-mobile__content">
                                    <div class="levels-mobile__flex">
                                        <div class="levels-mobile__item">
                                            <span>Структурный оборот</span>
                                            <p>50 000 $</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Оборот по 1 линии *</span>
                                            <p>10 000$</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Бонус за переход</span>
                                            <p>800$</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Реферальный бонус</span>
                                            <p class="levels-mobile__text">
                                                <small>1 линия = 6 %</small>
                                                <small>2 линия = 1 %</small>
                                                <small>3 линия = 0,5 %</small>
                                                <small>4 линия = 0,5 %</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="levels-mobile__content">
                                    <div class="levels-mobile__flex">
                                        <div class="levels-mobile__item">
                                            <span>Структурный оборот</span>
                                            <p>200 000 $</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Оборот по 1 линии *</span>
                                            <p>15 000$</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Бонус за переход</span>
                                            <p>2 000$</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Реферальный бонус</span>
                                            <p class="levels-mobile__text">
                                                <small>1 линия = 7 %</small>
                                                <small>2 линия = 1 %</small>
                                                <small>3 линия = 0,5 %</small>
                                                <small>4 линия = 0,5 %</small>
                                                <small>5 линия = 0,5 %</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="levels-mobile__content">
                                    <div class="levels-mobile__flex">
                                        <div class="levels-mobile__item">
                                            <span>Структурный оборот</span>
                                            <p>500 000 $</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Оборот по 1 линии *</span>
                                            <p>20 000$</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Бонус за переход</span>
                                            <p>2 500$</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Реферальный бонус</span>
                                            <p class="levels-mobile__text">
                                                <small>1 линия = 8 %</small>
                                                <small>2 линия = 1 %</small>
                                                <small>3 линия = 0,5 %</small>
                                                <small>4 линия = 0,5 %</small>
                                                <small>5 линия = 0,5 %</small>
                                                <small>6 линия = 0,5 %</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="levels-mobile__content">
                                    <div class="levels-mobile__flex">
                                        <div class="levels-mobile__item">
                                            <span>Структурный оборот</span>
                                            <p>1 000 000 $</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Оборот по 1 линии *</span>
                                            <p>30 000$</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Бонус за переход</span>
                                            <p>4 000$</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Реферальный бонус</span>
                                            <p class="levels-mobile__text">
                                                <small>1 линия = 9 %</small>
                                                <small>2 линия = 1 %</small>
                                                <small>3 линия = 0,5 %</small>
                                                <small>4 линия = 0,5 %</small>
                                                <small>5 линия = 0,5 %</small>
                                                <small>6 линия = 0,5 %</small>
                                                <small>7 линия = 0,25 %</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="levels-mobile__content">
                                    <div class="levels-mobile__flex">
                                        <div class="levels-mobile__item">
                                            <span>Структурный оборот</span>
                                            <p>2 500 000 $</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Оборот по 1 линии *</span>
                                            <p>40 000$</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Бонус за переход</span>
                                            <p>5 000$</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Реферальный бонус</span>
                                            <p class="levels-mobile__text">
                                                <small>1 линия = 10 %</small>
                                                <small>2 линия = 1 %</small>
                                                <small>3 линия = 0,5 %</small>
                                                <small>4 линия = 0,5 %</small>
                                                <small>5 линия = 0,5 %</small>
                                                <small>6 линия = 0,5 %</small>
                                                <small>7 линия = 0,25 %</small>
                                                <small>8 линия = 0,25 %</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="levels-mobile__content">
                                    <div class="levels-mobile__flex">
                                        <div class="levels-mobile__item">
                                            <span>Структурный оборот</span>
                                            <p>5 000 000 $</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Оборот по 1 линии *</span>
                                            <p>50 000$</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Бонус за переход</span>
                                            <p>10 000$</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Реферальный бонус</span>
                                            <p class="levels-mobile__text">
                                                <small>1 линия = 11 %</small>
                                                <small>2 линия = 2 %</small>
                                                <small>3 линия = 1 %</small>
                                                <small>4 линия = 0,5 %</small>
                                                <small>5 линия = 0,5 %</small>
                                                <small>6 линия = 0,5 %</small>
                                                <small>7 линия = 0,5 %</small>
                                                <small>8 линия = 0,5 %</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="levels-mobile__content">
                                    <div class="levels-mobile__flex">
                                        <div class="levels-mobile__item">
                                            <span>Структурный оборот</span>
                                            <p>10 000 000 $</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Оборот по 1 линии *</span>
                                            <p>70 000$</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Бонус за переход</span>
                                            <p>20 000$</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Реферальный бонус</span>
                                            <p class="levels-mobile__text">
                                                <small>1 линия = 12 %</small>
                                                <small>2 линия = 3 %</small>
                                                <small>3 линия = 1 %</small>
                                                <small>4 линия = 1 %</small>
                                                <small>5 линия = 0,5 %</small>
                                                <small>6 линия = 0,5 %</small>
                                                <small>7 линия = 0,5 %</small>
                                                <small>8 линия = 0,5 %</small>
                                                <small>9 линия = 0,5 %</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="levels-mobile__content">
                                    <div class="levels-mobile__flex">
                                        <div class="levels-mobile__item">
                                            <span>Структурный оборот</span>
                                            <p>20 000 000 $</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Оборот по 1 линии *</span>
                                            <p>90 000$</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Бонус за переход</span>
                                            <p>30 000$</p>
                                        </div>
                                        <div class="levels-mobile__item">
                                            <span>Реферальный бонус</span>
                                            <p class="levels-mobile__text">
                                                <small>1 линия = 13 %</small>
                                                <small>2 линия = 4 %</small>
                                                <small>3 линия = 1 %</small>
                                                <small>4 линия = 1 %</small>
                                                <small>5 линия = 1 %</small>
                                                <small>6 линия = 0,5 %</small>
                                                <small>7 линия = 0,5 %</small>
                                                <small>8 линия = 0,5 %</small>
                                                <small>9 линия = 0,5 %</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
    
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <section class="platform" id="b6">
                <div class="container">
                    <div class="bg-gray__wrapper">
                        <h2 class="title" data-aos="fade-up" data-aos-delay="300">Образовательная платформа</h2>
                        <div class="platform-text" data-aos="fade-in" data-aos-delay="600">Платформа Neo-Invest является не только инновационной системой для получения сверхприбыли за короткое время, но является и образовательной платформой. Уже сейчас мы запустили канал <br>с бесплатными сигналами в Telegram.</div>
                        <a href="https://t.me/neo_invest_signal" data-aos="fade-in" data-aos-delay="900" target="_blank" class="platform-btn btn">
                            <span>Получить сигнал</span>
                            <b><img src="/img/new/telegram.svg" class="img" alt="icon: telegram"></b>
                        </a>
                        <div class="platform-bottom"> 
                            <img data-src="/img/new/iphone.png" alt="iPhone" data-aos="fade-in" data-aos-delay="1400" class="platform-bottom__img lazy" src="data:image/gif;base64,R0lGODlhRwW/BYAAAP///wAAACH5BAEAAAEALAAAAABHBb8FAAL+jI+py+0Po5y02ouz3rz7D4biSJbmiabqyrbuC8fyTNf2jef6zvf+DwwKh8Si8YhMKpfMpvMJjUqn1Kr1is1qt9yu9wsOi8fksvmMTqvX7Lb7DY/L5/S6/Y7P6/f8vv8PGCg4SFhoeIiYqLjI2Oj4CBkpOUlZaXmJmam5ydnp+QkaKjpKWmp6ipqqusra6voKGys7S1tre4ubq7vL2+v7CxwsPExcbHyMnKy8zNzs/AwdLT1NXW19jZ2tvc3d7f0NHi4+Tl5ufo6err7O3u7+Dh8vP09fb3+Pn6+/z9/v/w8woMCBBAsaPIgwocKFDBs6fAgxosSJFCtavIgxo8b+jRw7evwIMqTIkSRLmjyJMqXKlSxbunwJM6bMmTRr2ryJM6fOnTx7+vwJNKjQoUSLGj2KNKnSpUybOn0KNarUqVSrWr2KNavWrVy7ev0KNqzYsWTLmj2LNq3atWzbun0LN67cuXTr2r2LN6/evXz7+v0LOLDgwYQLGz6MOLHixYwbO34MObLkyZQrW76MObPmzZw7e/4MOrTo0aRLmz6NOrXq1axbu34NO7bs2bRr276NO7fu3bx7+/4NPLjw4cSLGz+OPLny5cybO38OPbr06dSrW7+OPbv27dy7e/8OPrz48eTLmz+PPr369ezbu38PP778+fTr27+PP7/+/fz++/v/D2CAAg5IYIEGHohgggouyGCDDj4IYYQSTkhhhRZeiGGGGm7IYYcefghiiCKOSGKJJp6IYooqrshiiy6+CGOMMs5IY4023ohjjjruyGOPPv4IZJBCDklkkUYeiWSSSi7JZJNOPglllFJOSWWVVl6JZZZabslll15+CWaYYo5JZplmnolmmmquyWabbr4JZ5xyzklnnXbeiWeeeu7JZ59+/glooIIOSmihhh6KaKKKLspoo44+Cmmkkk5KaaWWXopppppuymmnnn4Kaqiijkpqqaaeimqqqq7KaquuvgprrLLOSmuttt6Ka6667sprr77+Cmywwg5LbLHGHov+bLLKLstss84+C2200k5LbbXWXottttpuy2233n4Lbrjijktuueaei2666q7LbrvuvgtvvPLOS2+99t6Lb7767stvv/7+C3DAAg9McMEGH4xwwgovzHDDDj8MccQST0xxxRZfjHHGGm/McccefwxyyCKPTHLJJp+Mcsoqr8xyyy6/DHPMMs9Mc80234xzzjrvzHPPPv8MdNBCD0100UYfjXTSSi/NdNNOPw111FJPTXXVVl+NddZab811115/DXbYYo9Ndtlmn4122mqvzXbbbr8Nd9xyz0133XbfjXfeeu/Nd99+/w144IIPTnjhhh+OeOKKL854444/Dnnkkk/+Tnnlll+Oeeaab855555/Dnrooo9Oeummn4566qqvznrrrr8Oe+yyz0577bbfjnvuuu/Oe+++/w588MIPT3zxxh+PfPLKL898884/D3300k9PffXWX4999tpvz3333n8Pfvjij09++eafj3766q/Pfvvuvw9//PLPT3/99t+Pf/76789///7/D8AACnCABCygAQ+IwAQqcIEMbKADHwjBCEpwghSsoAUviMEManCDHOygBz8IwhCKcIQkLKEJT4jCFKpwhSxsoQtfCMMYynCGNKyhDW+IwxzqcIc87KEPfwjEIApxiEQsohGPiMQkKnGJTGyiE58IxShKcYpUrKL+Fa+IxSxqcYtc7KIXvwjGMIpxjGQsoxnPiMY0qnGNbGyjG98IxzjKcY50rKMd74jHPOpxj3zsox//CMhACnKQhCykIQ+JyEQqcpGMbKQjHwnJSEpykpSspCUviclManKTnOykJz8JylCKcpSkLKUpT4nKVKpylaxspStfCctYynKWtKylLW+Jy1zqcpe87KUvfwnMYApzmMQspjGPicxkKnOZzGymM58JzWhKc5rUrKY1r4nNbGpzm9zspje/Cc5winOc5CynOc+JznSqc53sbKc73wnPeMpznvSspz3vic986nOf/OynP/8J0IAKdKAELahBD4rQhCp0oQxtqEP+HwrRiEp0ohStqEUvitGManSjHO2oRz8K0pCKdKQkLalJT4rSlKp0pSxtqUtfCtOYynSmNK2pTW+K05zqdKc87alPfwrUoAp1qEQtqlGPitSkKnWpTG2qU58K1ahKdapUrapVr4rVrGp1q1ztqle/CtawinWsZC2rWc+K1rSqda1sbatb3wrXuMp1rnStq13vite86nWvfO2rX/8K2MAKdrCELaxhD4vYxCp2sYxtrGMfC9nISnaylK2sZS+L2cxqdrOc7axnPwva0Ip2tKQtrWlPi9rUqna1rG2ta18L29jKdra0ra1tb4vb3Op2t7ztrW9/C9zgCne4xC2ucY/+i9zkKne5zG2uc58L3ehKd7rUra51r4vd7Gp3u9ztrne/C97wine85C2vec+L3vSqd73sba973wvf+Mp3vvStr33vi9/86ne//O2vf/8L4AALeMAELrCBD4zgBCt4wQxusIMfDOEIS3jCFK6whS+M4QxreMMc7rCHPwziEIt4xCQusYlPjOIUq3jFLG6xi18M4xjLeMY0rrGNb4zjHOt4xzzusY9/DOQgC3nIRC6ykY+M5CQreclMbrKTnwzlKEt5ylSuspWvjOUsa3nLXO6yl78M5jCLecxkLrOZz4zmNKt5zWxus5vfDOc4y3nOdK6zne+M5zzrec987rOf/wz+6EALetCELrShD43oRCt60YxutKMfDelIS3rSlK60pS+N6UxretOc7rSnPw3qUIt61KQutalPjepUq3rVrG61q18N61jLeta0rrWtb43rXOt617zuta9/DexgC3vYxC62sY+N7GQre9nMbraznw3taEt72tSutrWvje1sa3vb3O62t78N7nCLe9zkLre5z43udKt73exut7vfDe94y3ve9K63ve+N73zre9/87re//w3wgAt84AQvuMEPjvCEK3zhDG+4wx8O8YhLfOIUr7jFL47xjGt84xzvuMc/DvKQi3zkJC+5yU+O8pSrfOUsb7nLXw7zmMt85jSvuc1vjvPQnOt85zzvuc9/DvSgC33oRC+60Y+O9KQrfelMb7rTnw71qEt96lSvutWvjvWsa33rXO+6178O9rCLfexkL7vZz472tKt97Wxvu9vfDve4y33udK+73e+O97zrfe9877vf/w74wAt+8IQvvOEPj/jEK37xjG+84x8P+chLfvKUr7zlL4/5zGt+85zvvOc/D/rQi370pC+96U+P+tSrfvWsb73rXw/72Mt+9rSvve1vj/vc6373vO+9738P/OALf/jEL77xj4/85Ct/+cxvPkwKAAA7">
                            <div class="platform-bottom__block">
                                <div class="platform-bottom__promo"><span>Neo<br>invest</span></div>
                                <div class="platform-bottom__text">В январе 2022 года по дорожной карте у нас планируется масштабное открытие  образовательной платформы внутри уже имеющейся системы. Вы сможете не покидая систему совершенно бесплатно учиться использовать все 5 наших инструментов самостоятельно.</div>
                            </div>
                        </div>
                        <div class="platform-partner" data-aos="fade-in" data-aos-delay="500">
                            <div class="platform-partner__title">Стратегический партнер</div>
                            <div class="platform-partner__flex">
                                <img src="/img/new/logo-partner.svg" alt="logo Uniswap" class="platform-partner__logo img">
                                <div class="platform-partner__info">
                                    <a href="https://uniswap.org/" target="_blank" class="platform-partner__link">Uniswap.org</a>
                                    <div class="platform-partner__text" data-aos="fade-in" data-aos-delay="300">Стратегическим партнером компании <br>Neo-Invest является компания Uniswap.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="map" id="b7">
                <div class="container">
                    <h2 class="title center" data-aos="fade-in" data-aos-delay="1000">Дорожная карта на первое полугодие</h2>
                </div>
                <div class="container map-container">
                    <div class="map-scrollbar">
                        <div class="map-list">
                            <div class="map-item" data-aos="fade-in" data-aos-delay="300">
                                <div class="map-item__date">13.08.20 – 01.11.21</div>
                                <div class="map-item__text">Создание концепции проекта, разработка платформы, тестирование системы, предстарт и тестовый запуск</div>
                                <div class="map-item__number">01</div>
                            </div>
                            <div class="map-item" data-aos="fade-in" data-aos-delay="600">
                                <div class="map-item__date">01.11.21</div>
                                <div class="map-item__text">Запуск образовательного канала и привлечение комьюнити, знакомство с проектом</div>
                                <div class="map-item__number">02</div>
                            </div>
                            <div class="map-item" data-aos="fade-in" data-aos-delay="300">
                                <div class="map-item__date">09.12.21</div>
                                <div class="map-item__text">Официальный запуск проекта</div>
                                <div class="map-item__number">03</div>
                            </div>
                            <div class="map-item" data-aos="fade-in" data-aos-delay="600">
                                <div class="map-item__date">18.12.21</div>
                                <div class="map-item__text">Начало разработки NFT-игры на платформе Ethereum</div>
                                <div class="map-item__number">04</div>
                            </div>
                            <div class="map-item" data-aos="fade-in" data-aos-delay="300">
                                <div class="map-item__date">27.12.21</div>
                                <div class="map-item__text">Подведение итогов года Neo-Invest, розыгрыш ценных призов</div>
                                <div class="map-item__number">05</div>
                            </div>
                            <div class="map-item" data-aos="fade-in" data-aos-delay="600">
                                <div class="map-item__date">10.01.22</div>
                                <div class="map-item__text">Обновление 2.0 (Запуск обучающего видео-блока на платформе)
                                    </div>
                                <div class="map-item__number">06</div>
                            </div>
                            <div class="map-item" data-aos="fade-in" data-aos-delay="300">
                                <div class="map-item__date">05.02.22</div>
                                <div class="map-item__text">Запуск нового продукта <br>Market Place IDO</div>
                                <div class="map-item__number">07</div>
                            </div>
                            <div class="map-item" data-aos="fade-in" data-aos-delay="600">
                                <div class="map-item__date">10.03.22</div>
                                <div class="map-item__text big"> Первое официальное мероприятие проекта (встреча комьюнити, презентация новых трендов в криптовалюте</div>
                                <div class="map-item__number">08</div>
                            </div>
                            <div class="map-item" data-aos="fade-in" data-aos-delay="300">
                                <div class="map-item__date">15.03.22</div>
                                <div class="map-item__text">Презентация концепции <br>мобильного приложения Neo-Invest</div>
                                <div class="map-item__number">09</div>
                            </div>
                            <div class="map-item" data-aos="fade-in" data-aos-delay="600">
                                <div class="map-item__number center">скоро</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


        </div>

        <section class="change">
            <div class="blue-top">
                <div class="blue-top__wrapper"></div>
            </div>
            <div class="change-bg">

                <img src="/img/new/change-bg.svg" alt="" class="change-bg__top">
                <img src="/img/new/change-bg.svg" alt="" class="change-bg__bottom">
                <img data-src="/img/new/blur.png" src="/img/new/load.svg" alt="" class="change-blur lazy">
            </div>
            <div class="container">
                <h2 class="change-title" data-aos="fade-in" data-aos-delay="300">
                    <span>Измените свою жизнь сейчас – начните свой путь инвестора сейчас!</span>
                    <b>Измените свою жизнь сейчас – начните свой путь инвестора сейчас!</b>
                </h2>
                <a href="/register" data-aos="fade-in" data-aos-delay="500" target="_blank" class="change-btn btn btn-white">Стать партнером</a>
            </div>
            <svg class="change-circle" width="836" height="836" viewBox="0 0 836 836" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="418" cy="418" r="417.5" stroke="url(#paint0_linear_26_923)"/>
                <circle cx="418" cy="418" r="417.5" stroke="url(#paint1_linear_26_923)"/>
                <circle cx="418" cy="418" r="417.5" stroke="url(#paint2_linear_26_923)"/>
                <defs>
                <linearGradient id="paint0_linear_26_923" x1="397.048" y1="1.57285e-07" x2="390.762" y2="836" gradientUnits="userSpaceOnUse">
                <stop stop-color="#0442C8"/>
                <stop offset="1" stop-color="white" stop-opacity="0"/>
                </linearGradient>
                <linearGradient id="paint1_linear_26_923" x1="-5.2381" y1="381.333" x2="1027.71" y2="370.857" gradientUnits="userSpaceOnUse">
                <stop stop-color="#1C59DA"/>
                <stop offset="1" stop-color="white" stop-opacity="0"/>
                </linearGradient>
                <linearGradient id="paint2_linear_26_923" x1="836" y1="354.095" x2="418" y2="364.571" gradientUnits="userSpaceOnUse">
                <stop stop-color="#2460E1"/>
                <stop offset="1" stop-color="white" stop-opacity="0"/>
                </linearGradient>
                </defs>
            </svg>              
        </section>

        <footer class="footer">
            <div class="container">
                <div class="title white">Контакты</div>
                <div class="footer-list">
                    <div class="footer-block">
                        <div class="footer-item">
                            <div class="footer-item__title">Головной офис в городе Брайтон, Великобритания</div>
                            <div class="footer-item__text">Westergate Rd, Brighton BN2 4QN, Великобритания<br><a class="footer-item__phone" href="tel:+441273004439">+441273004439</a><br><a href="mailto:support@neo-invest.club">support@neo-invest.club</a></div>
                        </div>
                    </div>
                    <div class="footer-block footer-block__center">
                        <div class="footer-item">
                            <div class="footer-item__title">Русскоязычное представительство:</div>
                            <div class="footer-item__text"><a class="footer-item__phone" href="tel:+78007076129 ">8 (800) 707-61-29</a> (звонок по России бесплатный) <br><a href="mailto:support@neo-invest.club">support@neo-invest.club</a></div>
                        </div>
                    </div>
                    <div class="footer-block">
                        <div class="footer-item__title">Наши Telegram-каналы:</div>
                        <div class="footer-links">
                            <div class="footer-linkWrapper">
                                <a href="https://t.me/neo_invest_signal" target="_blank" class="footer-link">Канал с бесплатными сигналами</a>
                            </div>
                            <div class="footer-linkWrapper">
                                <a href="https://t.me/Neo_invest_public_ru" target="_blank" class="footer-link">Новости Neo-Invest Russia</a>
                            </div>
                            <div class="footer-linkWrapper">
                                <a href="https://t.me/neo_invest_public " target="_blank" class="footer-link">Новости Neo-Invest English</a>
                            </div>
                        </div>
                        <a href="https://www.instagram.com/neo_invest_ru/" target="_blank" class="footer-inst">
                            <span>Наш Instagram</span>
                            <svg width="42" height="40" viewBox="0 0 42 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M30.24 0H11.76C8.64214 0.00336295 5.65299 1.18444 3.44832 3.28412C1.24366 5.3838 0.0035311 8.23061 0 11.2V28.8C0.0035311 31.7694 1.24366 34.6162 3.44832 36.7159C5.65299 38.8156 8.64214 39.9966 11.76 40H30.24C33.3579 39.9966 36.347 38.8156 38.5517 36.7159C40.7563 34.6162 41.9965 31.7694 42 28.8V11.2C41.9965 8.23061 40.7563 5.3838 38.5517 3.28412C36.347 1.18444 33.3579 0.00336295 30.24 0ZM21 29.6C19.0064 29.6 17.0575 29.037 15.3999 27.9821C13.7422 26.9272 12.4502 25.4279 11.6873 23.6738C10.9244 21.9196 10.7247 19.9894 11.1137 18.1271C11.5026 16.2649 12.4627 14.5544 13.8724 13.2118C15.2821 11.8692 17.0782 10.9549 19.0335 10.5845C20.9888 10.214 23.0156 10.4042 24.8574 11.1308C26.6993 11.8574 28.2736 13.0878 29.3812 14.6665C30.4888 16.2452 31.08 18.1013 31.08 20C31.077 22.5452 30.014 24.9853 28.1243 26.785C26.2346 28.5848 23.6725 29.5971 21 29.6ZM31.92 12C31.4216 12 30.9344 11.8592 30.52 11.5955C30.1056 11.3318 29.7826 10.957 29.5918 10.5184C29.4011 10.0799 29.3512 9.59734 29.4484 9.13178C29.5457 8.66623 29.7857 8.23859 30.1381 7.90294C30.4905 7.5673 30.9395 7.33872 31.4284 7.24612C31.9172 7.15351 32.4239 7.20104 32.8844 7.38269C33.3448 7.56434 33.7384 7.87195 34.0153 8.26663C34.2922 8.66131 34.44 9.12533 34.44 9.6C34.44 10.2365 34.1745 10.847 33.7019 11.2971C33.2293 11.7471 32.5883 12 31.92 12Z" fill="#5A657E"/>
                            </svg>
                        </a>
                        <div class="footer-linkWrapper">
                            <a href="https://www.instagram.com/neo_invest_ru/" target="_blank" class="footer-link">instagram.com/neo_invest_ru</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>


    </div>



    <div class="mobileMenu">
        <nav class="mobileMenu-nav">
            <ul>
                <li><a href="#b1">О нас</a></li>
                <li><a href="#b2">Инструментарий</a></li>
                <li><a href="#b3">Инвестиционные <br>предложения</a></li>
                <li><a href="#b4">Калькулятор <br>доходности</a></li>
                <li><a href="#b5">Партнерская <br>программа</a></li>
                <li><a href="#b6">Образовательная <br>платформа</a></li>
                <li><a href="#b7">Дорожная <br>карта</a></li>
            </ul>
        </nav>
    </div>

    <script src="libs/lazyload.min.js"></script>
    <script src="libs/OverlayScrollbars.min.js"></script>
    <script src="libs/swiper-bundle.min.js"></script>
    <script src="libs/nouislider.min.js"></script>
    <script src="libs/aos.js"></script>
    <script src="js/landing.js?v=5"></script>
</body>
</html> -->