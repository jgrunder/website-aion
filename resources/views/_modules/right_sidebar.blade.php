<!-- NOUS REJOINDRE -->
<div class="bloc_without_header">
  <a href="{{Route('page.joins-us')}}" class="joinus"></a>
</div>

<!-- VOTEZ POUR NOUS -->
@if(Config::get('aion.vote.activated'))
    <div class="bloc_with_header bloc_vote">
      <div class="bloc_header">
        <h2>{{Lang::get('all.vote.title')}}</h2>
        <p>1 vote = <span class="strong">{{Config::get('aion.vote.toll_per_vote')}} toll</span></p>
        @if(Config::get('aion.vote.boost'))
            <p>
              {{Lang::get('all.vote.boost')}}
            </p>
        @endif
      </div>
      <div class="bloc_body center">
        @foreach(Config::get('aion.vote.links') as $key => $vote)

          @if(Session::has('connected') && $accountVotes[$key]['status'])
              <a href="{{ URL::route('vote', $key) }}">{{Lang::get('all.vote.vote')}} {{$vote['name']}}</a>
          @elseif (Session::has('connected') && !$accountVotes[$key]['status'])
              <p>{{$accountVotes[$key]['diff']}} {{Lang::get('all.vote.for')}} {{$vote['name']}}</p>
          @else
              <a href="{{$vote['link']}}">{{Lang::get('all.vote.vote')}} {{$vote['name']}}</a>
          @endif

        @endforeach
      </div>
    </div>
@endif

<!-- TOP VOTER -->
<div class="bloc_with_header bloc_vote">
    <div class="bloc_header">
        <h2>{{Lang::get('all.top_vote.title')}}</h2>
        <p>{{Lang::get('all.top_vote.description')}}</p>
    </div>
    <div class="bloc_body center">
        <table>
            <thead>
                <tr>
                    <th width="18%">#</th>
                    <th style="text-align: left;">Pseudo</th>
                    <th>Votes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($topVotes as $index => $account)
                    <tr>
                        <td width="18%">{{$index + 1}}</td>
                        <td style="text-align: left;">@if(empty($account->pseudo)) {{$account->name}} @else {{$account->pseudo}} @endif</td>
                        <td>{{$account->vote}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


<!-- BATTLE RANKING -->
<div class="bloc_with_header bloc_battleranking">
  <div class="bloc_header">
    <h2>Battle ranking</h2>
  </div>
  <div class="bloc_body"></div>
</div>
