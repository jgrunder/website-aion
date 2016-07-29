@extends('_layouts.master')

@section('content')
    <div class="container_single">
        <div class="container_single_top">
            <h1>Paypal (Choose YOUR DESIRES)</h1>
        </div>
        <div class="container_single_body center">

          @if ($step == 1)
          <p>Slide the slider from left to right</p> <br>

          {!! Form::open(['url' => 'https://www.paypal.com/cgi-bin/webscr', 'method' => 'post', 'class' => 'form-horizontal']) !!}

            {!! Form::input('range', 'tollWanted', 5000, [
                'class'    => 'input-range',
                'required' => 'required',
                'id'       => 'btn_toll_wanted',
                'min'      => 5000,
                'max'      => Config::get('aion.paypal.maxShopPoints'),
                'step'     => 5000
            ]) !!}

            {!! Form::input('hidden', 'business', Config::get('aion.paypal.email')) !!}
            {!! Form::input('hidden', 'notify_url', Config::get('app.url').'/paypal-ipn') !!}
            {!! Form::input('hidden', 'return', Config::get('app.url').'/paypal-valid') !!}
            {!! Form::input('hidden', 'item_name', '5000 Shop Points', ['id' => 'paypal_name']) !!}
            {!! Form::input('hidden', 'quantity', '1') !!}
            {!! Form::input('hidden', 'currency_code', 'EUR') !!}
            {!! Form::input('hidden', 'amount', 1, ['id' => 'money']) !!}
            {!! Form::input('hidden', 'cmd', '_xclick') !!}
            {!! Form::input('hidden', 'uid', $uid, ['id' => "user_id"]) !!}
            {!! Form::input('hidden', 'custom', 'points=5000&uid='.$uid, ['id' => "custom_paypal"]) !!}

            <br> <br>

            <input type="submit" id="money_need" class="btn btn-primary" value="Buy 5000 points shop for 1€">

          {!! Form::close() !!}
          @endif

          @if ($step == 2)
              <p>Congratulations, you just have to be credited !</p>
          @endif

        </div>
    </div>
@stop
