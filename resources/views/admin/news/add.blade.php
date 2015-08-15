@extends('_layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center page-header">
                <h1>Ajouter un article</h1>
            </div>

            <!-- ERROR MESSAGE -->
            @if (Session::has('error'))
                <div class="col col-md-8 col-md-offset-2 text-center">
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{Session::get('error')}}
                    </div>
                </div>
            @endif

            <!-- SUCCESS MESSAGE -->
            @if (Session::has('success'))
                <div class="col col-md-8 col-md-offset-2 text-center">
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{Session::get('success')}}
                    </div>
                </div>
            @endif

            <div class="col-md-8 col-md-offset-2">
                {!! Form::open() !!}

                    <div class="form-group">
                        {!! Form::text('title', null, ['placeholder' => "Titre de l'article", 'class' => 'form-control', 'required' => 'required']) !!}
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
