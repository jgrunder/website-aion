<!-- NOUS REJOINDRE -->
<div class="bloc_without_header">
  <a href="#" class="joinus"></a>
</div>

<!-- VOTEZ POUR NOUS -->
@if(Config::get('aion.vote.activated'))
    <div class="bloc_with_header bloc_vote">
      <div class="bloc_header">
        <h2>Votez pour nous</h2>
        <p>1 vote = <span class="strong">{{Config::get('aion.vote.toll_per_vote')}} points</span></p>
        @if(Config::get('aion.vote.boost'))
            <p>
              Event Boost Enabled
            </p>
        @endif
      </div>
      <div class="bloc_body center">
        @foreach(Config::get('aion.vote.links') as $key => $vote)

          @if(Session::has('connected') && $accountVotes[$key]['status'])
              <a href="{{ URL::route('vote', $key) }}">Voter sur {{$vote['name']}}</a>
          @elseif (Session::has('connected') && !$accountVotes[$key]['status'])
              Wait 2h for vote for {{$vote['name']}}
          @else
              <a href="{{$vote['link']}}">Voter sur {{$vote['name']}}</a>
          @endif

        @endforeach
      </div>
    </div>
@endif


<!-- BATTLE RANKING -->
<div class="bloc_with_header bloc_battleranking">
  <div class="bloc_header">
    <h2>Battle ranking</h2>
  </div>
  <div class="bloc_body"></div>
</div>
