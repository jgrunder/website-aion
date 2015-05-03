@if(Session::has('error'))
    {{ Session::get('error') }}
@elseif(Session::has('success'))
    {{ Session::get('success') }}
@endif