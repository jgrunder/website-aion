@extends('_layouts.master')

@section('content')
    <div class="container">
        <div class="container_left">

            <!-- CALL TO ACTION -->
            @include('_modules.call_to_action')

                    <!-- NEWS -->
            <div class="news">
                <div class="news_top">
                    <h1>Mot de passe oublié</h1>
                </div>
                <div class="news_body center">

                    @if($step == 1)

                        <p>Pour récupérer votre mot de passe nous avons besoin de votre email. Une fois celui-ci renseigné et le formulaire envoyé, vous recevrez par e-mail un lien de confirmation sur lequel vous devrez cliquer pour recevoir par la suite un nouveau mot de passe.</p>

                        <br>

                        @if($success) {{$success}} @else {{$errors}} @endif

                        <br>

                        {!! Form::open() !!}

                        {!! Form::email('email', null, ['placeholder' => 'Votre email', 'class' => 'input', 'required' => 'required']) !!}

                        <input type="submit" class="btn" value="Envoyer">

                        {!! Form::close() !!}

                    @else

                        @if($success) {{$success}} @else {{$errors}} @endif

                    @endif

                </div>
                <div class="news_footer">
                </div>
            </div>

        </div>
        <!-- RIGHT SIDEBAR -->
        <div class="container_right">
            @include('_modules.right_sidebar')
        </div>
    </div>
@stop
