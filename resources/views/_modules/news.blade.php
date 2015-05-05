<div class="article">
    @foreach($news as $article)
        <h2>{{$article->title}}</h2>
        <p>{{str_limit($article->text, $limit = 300, $end = '...')}}</p>
        <span>Published by {{$article->creator->pseudo}} il y a {{Carbon::parse($article->updated_at)->diffForHumans()}}</span>
    @endforeach
</div>