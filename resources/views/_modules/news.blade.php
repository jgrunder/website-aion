@foreach($news as $article)
    <div class="news">
      <div class="news_top">
        <h2><a href="#">{{$article->title}}</a></h2>
      </div>
      <div class="news_body">
        <p>
          @if(isset($full))
            {{$article->text}}
          @else
            {{str_limit($article->text, $limit = 350, $end = '...')}}
          @endif
        </p>
      </div>
      <div class="news_footer">
        <p>{{Lang::get('all.news.by')}} {{$article->creator->pseudo}} Il y a {{Carbon::parse($article->updated_at)->diffForHumans()}}</p>
          @if(!isset($full))
              <a href="{{Route('news', $article->slug)}}">{{Lang::get('all.news.next')}}</a>
          @endif
      </div>
    </div>
@endforeach
