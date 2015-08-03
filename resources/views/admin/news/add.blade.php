@extends('_layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Ajouter un article</h1>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open() !!}

                    <div class="form-group">
                        {!! Form::text('title', null, ['placeholder' => "Titre de l'article", 'class' => 'form-control', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::text('slug', null, ['placeholder' => "Slug : titre-de-larticle", 'class' => 'form-control', 'required' => 'required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::textarea('content', null, ['placeholder' => "Ici tu me feras toujours un joli texte", 'class' => 'form-control ckeditor', 'required' => 'required', 'rows' => 10, 'cols' => 40]) !!}
                    </div>

                    <input type="submit" class="btn btn-primary" value="Ajouter l'article">

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
