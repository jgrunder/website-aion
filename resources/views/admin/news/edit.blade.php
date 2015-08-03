@extends('_layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Editer l'article numéro : {{$news->id}} </h1>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open() !!}

                <div class="form-group">
                    {!! Form::text('title', $news->title, ['placeholder' => "Titre de l'article", 'class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::text('slug', $news->slug, ['placeholder' => "Slug : titre-de-larticle", 'class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::textarea('content', $news->text, ['placeholder' => "Ici tu me feras toujours un joli texte", 'class' => 'form-control ckeditor', 'required' => 'required', 'rows' => 10, 'cols' => 40]) !!}
                </div>

                <input type="submit" class="btn btn-primary" value="Editer l'article">

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
