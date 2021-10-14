<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}" />
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/all.js"></script>
  
    <title>@yield('title')</title>
   
</head>
<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v12.0" nonce="qJ14oRMP"></script>
    <div class="header">
        <div class="header__navbar">
            
                <ul class="header__menu">
                    <li class="header__punkt"><a href="{{route('home')}}">Головна</a> </li>
                    <li class="header__punkt"><a href="{{route('events')}}">Активності</a></li>
                    <li class="header__punkt"><a href="{{route('publications')}}">ПублікаціЇ</a></li>
                </ul>
            
            
            <div class="header__logo">
<img src="{{ asset('/img/logo.svg') }}" alt="">
            </div>
            <div class="header__button">
                <button> Связаться с нами</button>
            </div>
        

        </div>
    </div>

   @yield('main_content')
   <div class="content__block-contacts">
                <div class="content__wrapper"> 
                    <div class="content__item-x2">
                        <h2>Контакты
                        </h2>
                        <p style="margin:0px">Слов’янськ, вул Василівська 37</p ><p style="margin-top:5px">sloviansk.drukarnia@gmail.com</p>
                    </div> 
                    <div class="content__item-x2">
                    <div class="fb-page" 
data-href="https://www.facebook.com/drukarnia.sloviansk"
data-width="380" 
data-hide-cover="false"
data-show-facepile="false"></div>
                    </div> 
                </div>
        </div>
    <div class="content__block-offer">
                <div class="content__wrapper"> 
                            <div class="content__item-x2">
                                <h2>Є  що сказати? Не зволікай</h2>
                                <p>Якщо Вы бажаэте зв`язатися з нами щодо партнерства, або маєте важливе повідомлення, залиште свій номер телефону</p>
                            </div> 
                            <div class="content__item-x2">
                              
                                <form action="{{route('form')}}" method="post">
                                @csrf
                                <input type="text" name="name" placeholder="Ваше ім'я" id="name">
                                <input type="text" name="phone" placeholder="+380" id="phone">
                                <button type="submit">Відправити</button>
                                </form>
                                
                            </div> 
                 </div>
        </div>
    <div class="footer">
        <div class="footer__menu"> 
            <div class="content__wrapper"> 
            <div class="footer__logo">
            <img src="{{ asset('/img/logo.svg') }}" alt="">
            </div>
                        <ul class="header__menu">
                            <li class="footer__punkt">Головна</li>
                            <li class="footer__punkt">Активності</li>
                            <li class="footer__punkt">ПублікаціЇ</li>
                        </ul>
</div>   
        </div>

    </div>
   
<script src="./js/app.js"></script>
    
</body>
</html>