<div style="width: 21rem;" class="card text-center">
    <div class="card-header">
     Articolo N.{{$article->id}}
    </div>
    <div class="card-body d-flex flex-column justify-content-center align-items-center">
      <h5 class="card-title text-truncate">Titolo: {{$article->title}}</h5>
      <p class="card-text text-truncate">Descrizione: {{$article->description}}</p>
      <p class="card-text text-truncate">Prezzo: {{$article->price}}€</p>
      <p class="card-text text-truncate">Categoria: {{$article->category->name}}</p>
      <a href="{{route('article.show',compact('article'))}}" class="btn btn-custom">Vedi di Più</a>
      @if (Route::currentRouteName() == 'article.index')
          
      <a class="btn btn-grad" href="{{route('article.byCategory',['category' => $article->category])}}">{{$article->category->name}}</a>
      @endif
    </div>
    <div class="card-footer text-body-secondary">
        {{$article->created_at->diffForHumans()}} <br>
        Inserito da: {{$article->user->name}}
    </div>
</div>