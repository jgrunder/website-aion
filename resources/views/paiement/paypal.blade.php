@extends('_layouts.master')

@section('content')
    <div class="container_single">
        <div class="container_single_top">
            <h1>Paypal</h1>
        </div>
        <div class="container_single_body center">

          <p>Mettez le nombre de points toll que vous voulez, et automatiquement le prix changera</p> <br>

          {!! Form::open(['class' => 'form-horizontal']) !!}

            {!! Form::input('range', 'tollWanted', 5000, [
                'class'    => 'input-range',
                'required' => 'required',
                'id'       => 'btn_toll_wanted'
            ]) !!}


            <input type="submit" id="money_need" class="btn btn-primary" value="J'achète pour 5€">

          {!! Form::close() !!}


        </div>
    </div>
@stop
