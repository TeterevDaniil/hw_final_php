<!DOCTYPE html>
<html lang="ru">

<head>
  <title>Cart2 - ГеймсМаркет</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="../../../resources/views/app/css/libs.min.css">
  <link rel="stylesheet" href="../../../resources/views/app/css/main.css">
  <link rel="stylesheet" href="../../../resources/views/app/css/media.css">
  <script src="../../../resources/views/app/js/jquery.js"></script>
</head>

<body>



  <div class="main-wrapper">
    <header class="main-header">
      <div class="logotype-container"><a href="#" class="logotype-link"><img src="../../../resources/views/app/img/logo.png" alt="Логотип"></a></div>
      <nav class="main-navigation">
        <ul class="nav-list">
          <li class="nav-list__item"><a href="/public" class="nav-list__item__link">Главная</a></li>
          <li class="nav-list__item"><a href="/public/myorder" class="nav-list__item__link">Мои заказы</a></li>
          <li class="nav-list__item"><a href="#" class="nav-list__item__link">Новости</a></li>
          <li class="nav-list__item"><a href="#" class="nav-list__item__link">О компании</a></li>
        </ul>
      </nav>
      <div class="header-contact">
        <div class="header-contact__phone"><a href="#" class="header-contact__phone-link">Телефон: 33-333-33</a></div>
      </div>
      <div class="header-container">
        <div class="payment-container">
          <div class="payment-basket__status">
            <div class="payment-basket__status__icon-block"><a class="payment-basket__status__icon-block__link"><i class="fa fa-shopping-basket"></i></a></div>
            <div class="payment-basket__status__basket"><span class="payment-basket__status__basket-value">0</span><span class="payment-basket__status__basket-value-descr">товаров</span></div>
          </div>
        </div>
        <div class="authorization-block">
          @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Личный кабинет</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Войти</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Регистрация</a>
                        @endif
                    @endauth
                </div>
            @endif
        <!-- <a href="#" class="authorization-block__link">Регистрация</a><a href="#" class="authorization-block__link">Войти</a> -->
        </div>
      </div>
    </header>
    <div class="middle">
      <div class="sidebar">
        <div class="sidebar-item">
          <div class="sidebar-item__title">Категории</div>
          <div class="sidebar-item__content">
            <ul class="sidebar-category">
              @foreach($categoryes as $cat)
              <li class="sidebar-category__item"><a href="/public/category/{{$cat->id}}" class="sidebar-category__item__link">{{$cat->name}}</a></li>
              @endforeach
            </ul>
          </div>
        </div>
        <div class="sidebar-item">
          <div class="sidebar-item__title">Последние новости</div>
          <div class="sidebar-item__content">
            <div class="sidebar-news">
              <div class="sidebar-news__item">
                <div class="sidebar-news__item__preview-news"><img src="../../../resources/views/app/img/cover/game-2.jpg" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
              </div>
              <div class="sidebar-news__item">
                <div class="sidebar-news__item__preview-news"><img src="../../../resources/views/app/img/cover/game-1.jpg" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
              </div>
              <div class="sidebar-news__item">
                <div class="sidebar-news__item__preview-news"><img src="../../../resources/views/app/img/cover/game-4.jpg" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
                <div class="sidebar-news__item__title-news"><a href="#" class="sidebar-news__item__title-news__link">О новых играх в режиме VR</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="main-content">
        <div class="content-top">
          <div class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</div>
          <div class="slider"><img src="../../../resources/views/app/img/slider.png" alt="Image" class="image-main"></div>
        </div>
        <div class="content-middle">
          <div class="content-head__container">
            <div class="content-head__title-wrap">
              <div class="content-head__title-wrap__title bcg-title">Оформить заказ</div>
            </div>
            <div class="content-head__search-block">
              <div class="search-container">
                <form class="search-container__form">
                  <input type="text" class="search-container__form__input">
                  <button class="search-container__form__btn">search</button>
                </form>
              </div>
            </div>
          </div>
          <div class="cart-product-list">
            <div class="cart-product-list__item">
              @foreach ($prod as $p)
              @endforeach
              <div class="cart-product__item__product-photo"><img src="../../../public/storage/{{$p->image}}" class="cart-product__item__product-photo__image"></div>
              <div class="cart-product__item__product-name">
                <div class="cart-product__item__product-name__content"><a href="/public/product/{{$p->id}}"> {{$p->name}}</a></div>
              </div>
              <div class="cart-product__item__product-price"><span class="product-price__value">{{$p->price}} рублей</span></div>
            </div>

            <form>
              Имя <input type="text" id="name" value="{{$user->name}}">
              Емаил <input type="email" id="email" value="{{$user->email}}">
              <input type="hidden" readonly id="product_id" value="{{$p->id}}">
              <input type="hidden" id="_token" value="{{ csrf_token() }}" />

            </form>
          </div>
          <div id="response"></div>
          <div class="content-footer__container">
            <input type="button" class="btn-buy-wrap" onclick="addOrder()" id="button" value="Связаться с менеджером">
            <!-- <div class="btn-buy-wrap"><a href="#" class="btn-buy-wrap__btn-link">Перейти к оплате</a></div> -->
          </div>
        </div>
        <script>
          function addOrder() {
            $.post(
              '/public/order', {
                _token: $('#_token').val(),
                name: $('#name').val(),
                email: $('#email').val(),
                product_id: $('#product_id').val(),
              },
              function(r) {
                if (r.error) {
                  $('#response').html('<span style="color:red">' + r.error + '</span>');
                } else {
                  $('#response').html('<span style="color:green">' + r.result + '</span>');
                  setTimeout(() => {
                    window.location.href ="/public/myorder";
                  }, 2000);
                }
              }
            );
          }
        </script>
        <div class="content-bottom"></div>
      </div>
    </div>
    <footer class="footer">
      <div class="footer__footer-content">
        <div class="random-product-container">
          <div class="random-product-container__head">Случайный товар</div>
          <div class="random-product-container__content">
            <div class="item-product">
              <div class="item-product__title-product"><a href="#" class="item-product__title-product__link">The Witcher 3: Wild Hunt</a></div>
              <div class="item-product__thumbnail"><a href="#" class="item-product__thumbnail__link"><img src="../../../resources/views/app/img/cover/game-1.jpg" alt="Preview-image" class="item-product__thumbnail__link__img"></a></div>
              <div class="item-product__description">
                <div class="item-product__description__products-price"><span class="products-price">400 руб</span></div>
                <div class="item-product__description__btn-block"><a href="#" class="btn btn-blue">Купить</a></div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer__footer-content__main-content">
          <p>
            Интернет-магазин компьютерных игр ГЕЙМСМАРКЕТ - это
            онлайн-магазин игр для геймеров, существующий на рынке уже 5 лет.
            У нас широкий спектр лицензионных игр на компьютер, ключей для игр - для активации
            и авторизации, а также карты оплаты (game-card, time-card, игровые валюты и т.д.),
            коды продления и многое друго. Также здесь всегда можно узнать последние новости
            из области онлайн-игр для PC. На сайте предоставлены самые востребованные и
            актуальные товары MMORPG, приобретение которых здесь максимально удобно и,
            что немаловажно, выгодно!
          </p>
        </div>
      </div>
      <div class="footer__social-block">
        <ul class="social-block__list bcg-social">
          <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-facebook"></i></a></li>
          <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-twitter"></i></a></li>
          <li class="social-block__list__item"><a href="#" class="social-block__list__item__link"><i class="fa fa-instagram"></i></a></li>
        </ul>
      </div>
    </footer>
  </div>
  <script src="../../../resources/views/app/js/main.js"></script>
</body>

</html>