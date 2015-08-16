@extends('_layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center page-header">
                <h1>Editer la page</h1>
                <small>{{$page->page_name}}</small>
            </div>
            <div class="col-md-8 col-md-offset-2">
                {!! Form::open() !!}


                <div class="form-group">
                    {!! Form::textarea('fr', $page->fr, ['class' => 'form-control ckeditor', 'required' => 'required', 'rows' => 10, 'cols' => 40]) !!}
                </div>

                <div class="form-group">
                    {!! Form::textarea('en', $page->en, ['class' => 'form-control ckeditor', 'required' => 'required', 'rows' => 10, 'cols' => 40]) !!}
                </div>

                <input type="submit" class="btn btn-primary" value="Editer la page">

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop