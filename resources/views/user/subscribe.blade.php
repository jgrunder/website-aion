@extends('_layouts.master')

@section('content')
  <div class="container_single subscribe">
    <div class="container_single_top">
      <h1>Inscription</h1>
    </div>
    <div class="container_single_body">
      <p>Montius nos tumore inusitato quodam et novo ut rebellis et maiestati recalcitrantes Augustae per haec quae strepit incusat iratus nimirum quod contumacem praefectum, quid rerum ordo postulat ignorare dissimulantem formidine tenus iusserim custodiri.</p>
      <p>Quam ob rem circumspecta cautela observatum est deinceps et cum edita montium petere coeperint grassatores, loci iniquitati milites cedunt. ubi autem in planitie potuerint reperiri, quod contingit adsidue, nec exsertare lacertos nec crispare permissi tela, quae vehunt bina vel terna, pecudum ritu inertium trucidantur. Erat autem diritatis eius hoc quoque indicium nec obscurum nec latens, quod ludicris cruentis delectabatur et in circo sex vel septem aliquotiens vetitis certaminibus pugilum vicissim se concidentium perfusorumque sanguine specie ut lucratus ingentia laetabatur.</p>

      {!! Form::open() !!}

        {!! Form::text('username', null, ['placeholder' => 'Identifiant', 'class' => 'input', 'required' => 'required']) !!}
          @if (count($errors->get('username')) > 0)
            <span class="error_form">
                @foreach ($errors->get('username') as $message)
                  {{$message}}
                @endforeach
            </span>
          @endif

        {!! Form::text('pseudo', null, ['placeholder' => "Pseudo d'affichage", 'class' => 'input', 'required' => 'required']) !!}
          @if (count($errors->get('pseudo')) > 0)
            <span class="error_form">
                @foreach ($errors->get('pseudo') as $message)
                  {{$message}}
                @endforeach
            </span>
          @endif

        {!! Form::password('password', ['placeholder' => "Mot de passe", 'class' => 'input', 'required' => 'required']) !!}
          @if (count($errors->get('password')) > 0)
            <span class="error_form">
                @foreach ($errors->get('password') as $message)
                  {{$message}}
                @endforeach
            </span>
          @endif

        {!! Form::password('password_confirmation', ['placeholder' => "Retapez le mot de passe", 'class' => 'input', 'required' => 'required']) !!}
          @if (count($errors->get('password_confirmation')) > 0)
            <span class="error_form">
                @foreach ($errors->get('password_confirmation') as $message)
                  {{$message}}
                @endforeach
            </span>
          @endif

        {!! Form::email('email', null, ['placeholder' => 'Votre email', 'class' => 'input', 'required' => 'required']) !!}
          @if (count($errors->get('email')) > 0)
            <span class="error_form">
                @foreach ($errors->get('email') as $message)
                  {{$message}}
                @endforeach
            </span>
          @endif

        <input type="submit" class="btn btn-primary" value="Valider l'inscription">

      {!! Form::close() !!}

      <img src="/images/shugo.png" alt="Shugo" class="shugo">

      <div class="clear"></div>

    </div>
  </div>
@stop
