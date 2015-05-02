@if(Config::get('aion.vote.activated'))
    <div class="voteContainer">
        <ul>
            @foreach(Config::get('aion.vote.links') as $key => $vote)
                <li>
                    @if(Session::has('connected') && $accountVotes[$key]['status'])
                        <a href="{{ URL::route('vote', $key) }}">Voter sur {{$vote['name']}}</a>
                    @elseif (Session::has('connected') && !$accountVotes[$key]['status'])
                        Wait 2h for vote for {{$vote['name']}}
                    @else
                        <a href="{{$vote['link']}}">Voter sur {{$vote['name']}}</a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
@endif