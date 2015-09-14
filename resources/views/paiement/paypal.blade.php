@extends('_layouts.master')

@section('content')
    <div class="container_single">
        <div class="container_single_top">
            <h1>Paypal (Faites votre choix SELON VOS ENVIES)</h1>
        </div>
        <div class="container_single_body center">

          @if ($step == 1)
          <p>Glissez le curseur de gauche à droite</p> <br>

          {!! Form::open(['url' => 'https://www.paypal.com/cgi-bin/webscr', 'method' => 'post', 'class' => 'form-horizontal']) !!}

            {!! Form::input('range', 'tollWanted', 5000, [
                'class'    => 'input-range',
                'required' => 'required',
                'id'       => 'btn_toll_wanted',
                'min'      => 5000,
                'max'      => 1000000,
                'step'     => 5000
            ]) !!}

            {!! Form::input('hidden', 'business', Config::get('aion.paypal.email')) !!}
            {!! Form::input('hidden', 'notify_url', 'http://realaion.com/paypal-ipn') !!}
            {!! Form::input('hidden', 'return', 'http://realaion.com/paypal-valid') !!}
            {!! Form::input('hidden', 'item_name', '5000 toll RealAion', ['id' => 'paypal_name']) !!}
            {!! Form::input('hidden', 'quantity', '1') !!}
            {!! Form::input('hidden', 'currency_code', 'EUR') !!}
            {!! Form::input('hidden', 'amount', 1, ['id' => 'money']) !!}
            {!! Form::input('hidden', 'cmd', '_xclick') !!}
            {!! Form::input('hidden', 'uid', Session::get('user.id'), ['id' => "user_id"]) !!}
            {!! Form::input('hidden', 'custom', 'tolls=5000&uid='.Session::get('user.id'), ['id' => "custom_paypal"]) !!}

            <br> <br>

            <input type="submit" id="money_need" class="btn btn-primary" value="J'achète 5000 toll pour 1€">

          {!! Form::close() !!}
          @endif

          @if ($step == 2)
              <p>Félicitation jeune Deave vous venez d'être crédités !</p>
          @endif

        </div>
    </div>
@stop
