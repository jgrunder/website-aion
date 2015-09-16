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
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/styles/default.min.css">
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
                <a class="navbar-brand" href="{{Route('home')}}">RealAion</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="{{Route('admin')}}">Accueil</a></li>

                    <!-- Articles -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Articles <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{Route('admin.news')}}">Liste des articles</a></li>
                            <li><a href="{{Route('admin.news.add')}}">Ajouter un article</a></li>
                        </ul>
                    </li>

                    <!-- Boutique -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Boutique <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{Route('admin.shop.add')}}">Ajouter un item dans la boutique</a></li>
                            <li><a href="{{Route('admin.shop.category')}}">Liste des catégories</a></li>
                            <li><a href="{{Route('admin.shop.subcategory')}}">Liste des sous-catégories</a></li>
                        </ul>
                    </li>

                    <!-- Logs -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Logs <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            @foreach($adminLogsMenu as $adminLogMenu)
                                <li><a href="{{Route('admin.logs', $adminLogMenu)}}">Log : {{$adminLogMenu}}</a></li>
                            @endforeach
                        </ul>
                    </li>

                    <!-- PAGE -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{Route('admin.page', 'rules')}}">Editer la page Règlement</a></li>
                            <li><a href="{{Route('admin.page', 'team')}}">Editer la page Equipe</a></li>
                            <li><a href="{{Route('admin.page', 'teamspeak')}}">Editer la page Teamspeak</a></li>
                            <li><a href="{{Route('admin.page', 'subscribe')}}">Editer la page Inscription</a></li>
                        </ul>
                    </li>

                    <!-- Autre -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Autre <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{Route('admin.allopass')}}">Allopass</a></li>
                            <li><a href="{{Route('admin.paypal')}}">Paypal</a></li>
                        </ul>
                    </li>
                </ul>

                <!-- Search Function -->
                {!! Form::open(['class' => 'navbar-form navbar-right', 'url' => Route('admin.search'), 'method' => 'get']) !!}

                <div class="form-group">
                    {!! Form::select('search_type', ['character' => 'Personnage', 'shop_item' => 'Boutique'], null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::text('search_value', null, ['placeholder' => "Je cherche ...", 'class' => 'form-control', 'required' => 'required']) !!}
                </div>

                {!! Form::close() !!}

            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JAVASCRIPTS -->
    <script type="text/javascript" src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/js/ckeditor/ckeditor.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
</body>
</html>