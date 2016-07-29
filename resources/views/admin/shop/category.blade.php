@extends('_layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-12 text-center page-header">
                <h1>List of Categories</h1>
            </div>
            <div class="col col-md-4 col-md-offset-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-center">Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td class="text-center">{{$category->category_name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                {!! Form::open() !!}

                <div class="form-group">
                    {!! Form::text('category_name', null, ['placeholder' => "Title", 'class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <input type="submit" class="btn btn-success" value="Add the category">

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
