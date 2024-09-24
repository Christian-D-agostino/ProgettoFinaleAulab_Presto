{{-- <div style="width: 20rem;" class="card card-custom text-white text-center">
    <div class="card-header">
        Articolo N.{{ $article->id }}
    </div>

    <div class="card-body d-flex flex-column justify-content-center align-items-center">
        <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://picsum.photos/300' }}"
            class="card-img-top" alt="">
        <h5 class="card-text truncate">Titolo: {{ $article->title }}</h5>
        <p class="card-text truncate">Descrizione: {{ $article->description }}</p>
        <p class="card-text">Prezzo: {{ $article->price }}€</p>
        <p class="card-text">Categoria: {{ $article->category->name }}</p>
        <a href="{{ route('article.show', compact('article')) }}" class="btn btn-custom" data-bs-toggle="modal"
            data-bs-target="#exampleModal-{{ $article->id }}">Vedi di Più</a>
        @if (Route::currentRouteName() == 'article.index')
            <a class="btn btn-grad"
                href="{{ route('article.byCategory', ['category' => $article->category]) }}">{{ $article->category->name }}</a>
        @endif
    </div>
    <div class="card-footer text-body-secondary">
        <p class="text-white">
            {{ $article->created_at->diffForHumans() }} <br>
            Inserito da: {{ $article->user->name }}
        </p>
    </div>
</div> --}}
        {{--! NUOVA CARD --}}
<div class="card mb-3 card-custom" style="width: 38rem; height: 20rem;">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://picsum.photos/300' }}" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Titolo: {{ $article->title }}</h5>
          <p class="card-text">Descrizione: {{ $article->description }}</p>
          <p class="card-text">Prezzo: {{ $article->price }}€</p>
          <p class="card-text">Categoria: {{ $article->category->name }}</p>
          <a href="{{ route('article.show', compact('article')) }}" class="btn btn-custom" data-bs-toggle="modal"
            data-bs-target="#exampleModal-{{ $article->id }}">Vedi di Più</a>
        @if (Route::currentRouteName() == 'article.index')
            <a class="btn btn-grad"
                href="{{ route('article.byCategory', ['category' => $article->category]) }}">{{ $article->category->name }}</a>
        @endif
          <p class="card-text"><small class="text-body-secondary">{{ $article->created_at->diffForHumans() }} <br>
            Inserito da: {{ $article->user->name }}</small></p>
        </div>
      </div>
    </div>
  </div>
<!-- Modal -->
