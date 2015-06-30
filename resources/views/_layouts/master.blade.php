<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">

    <!-- SEO -->
    <title>{{Config::get('aion.website_name')}} - @yield('title')</title>
    <meta name="description" content=""/>
    <meta name="keywords" content="">
    <meta name="author" content=""/>
    <meta name="copyright" content=""/>
    <meta name="robots" content="index,follow"/>
    <meta name="location" content=""/>

    <!-- FB Share -->
    <meta property="og:title" content=""/>
    <meta property="og:description" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>

    <!-- TWITTER Share -->
    <meta name="twitter:card" content="">
    <meta name="twitter:site" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:creator" content="">
    <meta name="twitter:image" content="">

    <!-- GOOGLE + Share -->
    <meta itemprop="name" content="">
    <meta itemprop="description" content="">
    <meta itemprop="image" content="">

    <!-- STYLESHEETS -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/global.css" rel="stylesheet">
</head>
<body>

    <!-- Flash Messages -->
    @if(Session::has('success'))
      <div class="flash_messages success" id="flashMsg">
          <p>{{ Session::get('success') }}</p>
      </div>
    @elseif(Session::has('error'))
    <div class="flash_messages error" id="flashMsg">
        <p>{{ Session::get('error') }}</p>
    </div>
    @endif

    <!-- NAV -->
    <nav class="nav">
        <ul class="menu">
            <li><a href="{{Route('home')}}">Accueil</a></li>
            <li>
              <a href="#">A propos</a>
              <ul class="sub_menu">
                <li><a href="{{Route('page.teamspeak')}}">Teamspeak</a></li>
                <li><a href="{{Route('page.team')}}">Equipe</a></li>
                <li><a href="{{Route('page.contactus')}}">Contact</a></li>
              </ul>
            </li>
            <li><a href="{{Route('page.rules')}}">Règles</a></li>
            <li><a href="{{Route('page.rates')}}">Rates</a></li>
            <li>
                <a href="#">Stats</a>
                <ul class="sub_menu">
                    <li><a href="{{Route('stats.online')}}">Joueurs en lignes</a></li>
                    <li><a href="{{Route('stats.abyss')}}">Classement abyssal</a></li>
                    <li><a href="{{Route('stats.bg')}}">Classement des BG</a></li>
                </ul>
            </li>
            <li><a href="http://realaion.com/forum/">Forum</a></li>
            <li><a href="#">Boutique</a></li>
        </ul>
    </nav>

    <!-- LOGO -->
    <div class="logo">
        <img class="logo" src="/images/logo.png" alt="Logo de RealAion">
    </div>

    <!-- HEADER -->
    <header class="header">

      <!-- TOP -->
      <div class="header_top">
        <div class="status">
          @foreach($serversStatus as $value)
            <span>
              Etat du {{$value['name']}} : <span class="{{($value['status']) ? 'online' : 'offline'}}">{{($value['status']) ? 'ON' : 'OFF'}}</span>
            </span>
          @endforeach
        </div>
        <div class="btn_user">
          @if(Session::has('connected'))
              <a href="{{Route('user.account')}}">Mon Compte</a>
              <a href="{{Route('user.logout')}}">Déconnexion</a>
          @else
              <a href="#" id="btn_connexion">Connexion</a>
              <a href="{{Route('user.subscribe')}}">Inscription</a>
          @endif
        </div>
      </div>

      <!-- USER LOGIN -->
      @include('_modules.login')

      <!-- SLIDER | SOCIAL -->
      <div class="header_bottom">

        <!-- SLIDER -->
        <ul id="bxslider">
          @foreach(Config::get('aion.slider') as $value)
            <li><img src="/images/slider/{{$value['image']}}" title="{{$value['title']}}"/></li>
          @endforeach
        </ul>

        <div class="slider_controller">
          <span id="slider-prev"></span>
          <span id="slider-next"></span>
        </div>

        <!-- SOCIAL -->
        <div class="social">
          <a href="{{Config::get('aion.link_facebook')}}" target="_blank" class="fa fa-facebook"></a>
          <a href="{{Config::get('aion.link_twitter')}}" target="_blank" class="fa fa-twitter"></a>
          <a href="{{Config::get('aion.link_youtube')}}" target="_blank"class="fa fa-youtube-play"></a>
        </div>

      </div>

    </header>

    <!-- BODY -->
    @yield('content')

    <!-- FOOTER -->
    <footer class="footer">
      <p>Ce site n'est pas afillié à NCSOFT CORPORATION, NCSOFT EUROPE ou Gameforge Productions.</p><br>
      <p>Développé par <a href="http://mathieuletyrant.com" target="_blank">Mathieu Le Tyrant</a> | Copyright 2015 © Real Aion</p>
    </footer>

    <!-- JAVASCRIPTS -->
    <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/js/jquery.bxslider.min.js"></script>
    <script type="text/javascript" src="/js/script.js"></script>
</body>
</html>
