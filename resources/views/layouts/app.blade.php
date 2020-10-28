<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Кормим маму' }}</title>

    <link rel="icon" href="images/logo.svg" type="image/svg"/>
    <link rel="shortcut icon" href="images/logo.svg" type="image/svg">

    <!-- CSS -->
    @prepend('styles')
        <link href="{{ mix('css/app.css') }}" rel="stylesheet"/>
    @endprepend

    @stack('styles')

    @prepend('scripts')
        <script>
            $(document).ready(function () {
                $('body').activity(
                    {
                        'achieveTime': 5,
                        'testPeriod':  10,
                        useMultiMode:  1,
                        callBack:      function (e) {
                            gtag('event', '60_sec', {'event_category': '60_sec'});
                            ym(68515060, 'reachGoal', '60_sec');
                        }
                    }
                );
            });
        </script>
    @endprepend

</head>
<body>

<div class="mobNav">
    <div class="mobNav__inner">
        <img class="bg" src="images/mobNavBg.svg" alt="">

        <div class="container">
            <div class="mobNav__header">
                <svg class="cross" width="28" height="28" viewBox="0 0 28 28" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16.286 13.9229L27.626 2.58293C27.8808 2.28535 28.014 1.90257 27.9988 1.51107C27.9837 1.11958 27.8214 0.748204 27.5444 0.471168C27.2674 0.194132 26.896 0.0318363 26.5045 0.0167145C26.113 0.00159274 25.7302 0.134758 25.4326 0.3896L14.0926 11.7296L2.75262 0.374044C2.45504 0.119203 2.07226 -0.0139617 1.68076 0.00116011C1.28927 0.0162819 0.917895 0.178576 0.640859 0.455612C0.363823 0.732648 0.201528 1.10402 0.186406 1.49552C0.171284 1.88701 0.30445 2.2698 0.559291 2.56738L11.8993 13.9229L0.543735 25.2629C0.380897 25.4024 0.248643 25.574 0.155273 25.767C0.0619038 25.96 0.00943394 26.1702 0.00115917 26.3844C-0.0071156 26.5986 0.0289825 26.8123 0.107187 27.0119C0.185392 27.2115 0.304016 27.3928 0.455613 27.5444C0.607209 27.696 0.788505 27.8146 0.988121 27.8928C1.18774 27.971 1.40137 28.0071 1.6156 27.9988C1.82983 27.9906 2.04003 27.9381 2.23302 27.8447C2.42601 27.7514 2.59762 27.6191 2.73707 27.4563L14.0926 16.1163L25.4326 27.4563C25.7302 27.7111 26.113 27.8443 26.5045 27.8291C26.896 27.814 27.2674 27.6517 27.5444 27.3747C27.8214 27.0977 27.9837 26.7263 27.9988 26.3348C28.014 25.9433 27.8808 25.5605 27.626 25.2629L16.286 13.9229Z"
                        fill="#9F3E4B"/>
                </svg>

                <div class="contacts">
                    @include('layouts.include.contacts')
                </div>

                <a href="#" class="callBtn"><img src="images/callIconMob.svg" alt="Звонок"></a>
            </div>

            @component('layouts.components.menu', ['class' => 'mobNavList', 'items' => [
['class' => 'transBtn', 'url' => '#tasty', 'text' => 'Как это работает'],
['class' => 'transBtn', 'url' => '#programs', 'text' => 'Меню и тарифы'],
['class' => 'transBtn', 'url' => '#zone', 'text' => 'Доставка'],
['class' => 'transBtn', 'url' => '#problems', 'text' => 'О нас'],
['class' => 'transBtn', 'url' => '#answers', 'text' => 'Вопросы'],
]])
            @endcomponent

            <img src="images/logo.svg" alt="Логотип" class="logo">
        </div>

        <div class="media">

            <div class="links">
                <a href="https://t.me/kormimmamubot"><img src="images/footerTgIcon.svg" alt="Telegram"></a>
                <a href="https://instagram.com/kormimmamu?igshid=10mkm0qvlat39"><img
                        src="images/footerIgLogo.svg" alt="Instagram"></a>
            </div>
        </div>
    </div>
</div>

<header class="header" id="header">
    <div class="container">
        <a href="#header" class="logo"><img src="images/logo.svg" alt="Логотип"></a>

        <svg class="burger" width="50" height="35" viewBox="0 0 50 35" fill="none"
             xmlns="http://www.w3.org/2000/svg">
            <rect width="50" height="5" rx="2.5" fill="#9F3E4B"/>
            <rect y="15" width="50" height="5" rx="2.5" fill="#9F3E4B"/>
            <rect y="30" width="50" height="5" rx="2.5" fill="#9F3E4B"/>
        </svg>

        @component('layouts.components.menu', ['items' => [
['class' => 'transBtn', 'url' => '#tasty', 'text' => 'Как это работает'],
['class' => 'transBtn', 'url' => '#programs', 'text' => 'Меню и тарифы'],
['class' => 'transBtn', 'url' => '#zone', 'text' => 'Доставка'],
['class' => 'transBtn', 'url' => '#problems', 'text' => 'О нас'],
['class' => 'transBtn', 'url' => '#answers', 'text' => 'Вопросы'],
]])
        @endcomponent

        <div class="contacts">
            @include('layouts.include.contacts')
        </div>

        <a href="#" class="callBtn" data-toggle="modal" data-target="#callBackModal">Перезвоните мне</a>
        <a href="#" class="mobCallBtn" data-toggle="modal" data-target="#callBackModal"><img
                src="images/callIconMob.svg" alt="Звонок"></a>
    </div>

    <div class="callBackModal">
        @component('layouts.components.modal', ['id' => 'callBackModal', 'title' => 'Заказать звонок'])
            <form method="POST" id="callBackForm" action="{{ route('send.callback') }}" class="callBackForm">
                <div class="errors"></div>
                @csrf
                <input type="text" name="name" required="required" placeholder="Ваше имя" >
                <input type="tel" name="phone" id="phone-mask" required="required" placeholder="Номер телефона">
                <input type="checkbox" name="personal_data_agree" value="1" required="required" id="callBackCheckbox">
                <label for="callBackCheckbox">Согласна на обработку персональных данных</label>
                <button type="submit" class="callBtn">Позвоните мне</button>
            </form>
        @endcomponent
    </div>

    <div class="callBackThanksModal">
        @component('layouts.components.modal', ['id' => 'callBackThanksModal', 'title' => 'Спасибо за заявку!'])
            <h3>Мы перезвоним вам в ближайшее время</h3>
            <p>А пока вы можете вернуться на наш сайт и изучить его :)</p>
            <a class="actionBtn" href="#" data-dismiss="modal" aria-label="Close">Вернуться на сайт</a>
        @endcomponent
    </div>
</header>

@yield('content')

<footer class="footer">
    <div class="container">
        <div class="leftSide">
            <div class="logo">
                <a href="#header" class="transBtn"><img src="images/logo.svg" alt="Логотип"></a>
                <p>Сбалансированная еда для беременных и&nbsp;кормящих мам с&nbsp;доставкой на&nbsp;дом</p>
            </div>

            <p class="disclaimer">Фотографии блюд на&nbsp;сайте являются вариантом сервировки блюда. Внешний вид блюда
                может отличаться от&nbsp;фотографии на&nbsp;сайте.</p>

            <div class="info">
                @include('layouts.include.info')
            </div>
        </div>

        <div class="rightSide">
            <a href="tel:+79817427904" class="tel">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M29 15C29 22.732 22.732 29 15 29C7.26801 29 1 22.732 1 15C1 7.26801 7.26801 1 15 1C22.732 1 29 7.26801 29 15Z"
                        stroke="#1FC173" stroke-width="2"/>
                    <path
                        d="M21.8966 17.8518C20.4087 17.8518 18.9897 17.5277 17.6811 16.888C17.4759 16.7897 17.238 16.7742 17.0208 16.8484C16.8035 16.9242 16.6259 17.0828 16.5259 17.288L15.9052 18.5725C14.0432 17.5035 12.4984 15.957 11.4277 14.0949L12.7139 13.4742C12.9208 13.3742 13.0777 13.1966 13.1535 12.9794C13.2277 12.7621 13.2139 12.5242 13.1139 12.319C12.4725 11.0121 12.1484 9.59318 12.1484 8.10352C12.1484 7.62766 11.7621 7.24146 11.2863 7.24146H8.10352C7.62766 7.24146 7.24146 7.62766 7.24146 8.10352C7.24146 16.1846 13.8156 22.7587 21.8966 22.7587C22.3725 22.7587 22.7587 22.3725 22.7587 21.8966V18.7139C22.7587 18.238 22.3725 17.8518 21.8966 17.8518Z"
                        fill="#1FC173"/>
                </svg>

                <p>8 (981) 742-79-04</p>
            </a>


            <div class="telegram">
                <p>По всем вопросам пишите сюда:</p>

                <div class="media">
                    <a href="https://t.me/kormimmamubot">
                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M20 40C31.0457 40 40 31.0457 40 20C40 8.9543 31.0457 0 20 0C8.9543 0 0 8.9543 0 20C0 31.0457 8.9543 40 20 40Z"
                                fill="#039BE5"/>
                            <path class="stable"
                                  d="M9.15162 19.5665L28.4349 12.1315C29.33 11.8082 30.1116 12.3499 29.8216 13.7032L29.8233 13.7015L26.5399 29.1699C26.2966 30.2665 25.6449 30.5332 24.7333 30.0165L19.7333 26.3315L17.3216 28.6549C17.0549 28.9215 16.8299 29.1465 16.3133 29.1465L16.6683 24.0582L25.9349 15.6865C26.3383 15.3315 25.8449 15.1315 25.3133 15.4849L13.8616 22.6949L8.92495 21.1549C7.85328 20.8149 7.82995 20.0832 9.15162 19.5665Z"
                                  fill="white"/>
                        </svg>
                    </a>
                </div>
            </div>

            <div class="igLink">
                <p>Подписывайтесь<br/>на наш Instagram:</p>
                <a href="https://instagram.com/kormimmamu?igshid=10mkm0qvlat39">
                    <img src="images/footerIgLogo.svg" alt="Instagram">
                    <img src="images/footerIgBrown.svg" alt="Instagram">
                </a>
            </div>
        </div>
    </div>

    <!--<ul class="docs">
        <li><a href="#">Публичная оферта</a></li>
        <li><a href="#">Пользовательское соглашение</a></li>
        <li><a href="#">Согласие на обработку персональных данных</a></li>
    </ul>-->
</footer>

@production
    @include('layouts.include.contrers');
@endproduction

@prepend('scripts')
    <script src="js/app.js"></script>
@endprepend

<!-- Scripts -->
@stack('scripts')
</body>
</html>
