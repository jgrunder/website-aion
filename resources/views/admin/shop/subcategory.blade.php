@extends('_layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col col-md-12 text-center page-header">
                <h1>Liste des Sous-catégories</h1>
            </div>
            <div class="col col-md-4 col-md-offset-4">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="text-center">Nom</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($subCategories as $subCategory)
                        <tr>
                            <th scope="row">{{$subCategory->id}}</th>
                            <td class="text-center">{{$subCategory->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center">

                {!! Form::open(['class' => 'form-inline']) !!}


                <div class="form-group">
                    {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::text('sub_category_name', null, ['placeholder' => "Titre de la sous-catégorie", 'class' => 'form-control', 'required' => 'required']) !!}
                </div>

                <br> <br>

                <button type="submit" class="btn btn-success">Ajouter la sous-catégorie</button>


                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
