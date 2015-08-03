<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1">

    <!-- SEO -->
    {!! SEO::generate() !!}
    <meta name="author" content="Mathieu Le Tyrant"/>
    <meta name="copyright" content="Copyright 2015 © RealAion.com"/>
    <meta name="location" content="France"/>

    <!-- STYLESHEETS -->
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">RealAion</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{Route('home')}}">Accueil</a></li>
                    <li><a href="{{Route('admin.news')}}">Articles du site</a></li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JAVASCRIPTS -->
    <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script src="http://cdn.ckeditor.com/4.5.1/standard/ckeditor.js"></script>
</body>
</html>