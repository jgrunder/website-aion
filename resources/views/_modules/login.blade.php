<div class="header_body" id="user_panel">
  <!-- USER : LOGOUT -->
  {!! Form::open(array('action' => 'UserController@connect')) !!}

  {!! Form::text('username', null, ['placeholder' => 'Identifiant', 'class' => 'input']) !!}

  {!! Form::password('password', ['placeholder' => 'Mot de passe', 'class' => 'input']) !!}

  <input type="submit" class="btn" value="Se connecter">

  {!! Form::close() !!}

  <a href="#" class="password_lost">Mot de passe oublié</a>
</div>
