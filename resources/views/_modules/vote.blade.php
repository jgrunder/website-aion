@if(Config::get('aion.vote.activated'))
    <div class="voteContainer">
        <ul>
            @foreach(Config::get('aion.vote.links') as $key => $vote)
                <li>
                    @if(!Session::has('connected'))
                        <a href="{{ URL::route('vote', $key) }}">Voter sur {{$vote['name']}}</a>
                    @else
                        <a href="{{$vote['link']}}">Voter sur {{$vote['name']}}</a>
                    @endif

                </li>
            @endforeach
        </ul>
    </div>
    <hr/>
@endif