@extends('_layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center page-header">
                <h1>Configuration du site</h1>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open() !!}

                <!-- Website_name -->
                <div class="form-group">
                    {!! Form::label('aion.website_name', "Nom du site") !!}
                    {!! Form::text('aion.website_name', $configs['website_name'], ['class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <!-- Link_facebook -->
                <div class="form-group">
                    {!! Form::label('aion.link_facebook', "Lien de la page Facebook") !!}
                    {!! Form::text('aion.link_facebook', $configs['link_facebook'], ['class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <!-- Link_twitter -->
                <div class="form-group">
                    {!! Form::label('aion.link_twitter', "Lien de la page Twitter") !!}
                    {!! Form::text('aion.link_twitter', $configs['link_twitter'], ['class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <!-- link_youtube -->
                <div class="form-group">
                    {!! Form::label('aion.link_youtube', "Lien de la page Youtube") !!}
                    {!! Form::text('aion.link_youtube', $configs['link_youtube'], ['class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <!-- contactMail -->
                <div class="form-group">
                    {!! Form::label('aion.contactMail', "Adresse Email de contact") !!}
                    {!! Form::text('aion.contactMail', $configs['contactMail'], ['class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <input type="submit" class="btn btn-danger" value="Modifier les configurations">

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
