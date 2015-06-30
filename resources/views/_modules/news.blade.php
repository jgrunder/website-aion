@foreach($news as $article)
    <div class="news">
      <div class="news_top">
        <h2><a href="#">{{$article->title}}</a></h2>
      </div>
      <div class="news_body">
        <p>
          {{str_limit($article->text, $limit = 350, $end = '...')}}
        </p>
      </div>
      <div class="news_footer">
        <p>Posté par {{$article->creator->pseudo}} Il y a {{Carbon::parse($article->updated_at)->diffForHumans()}}</p>
        <a href="#">Lire la suite</a>
      </div>
    </div>
@endforeach
