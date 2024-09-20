<div style="width: 21rem;" class="card card-custom text-white text-center">
    <div class="card-header">
        Articolo N.{{ $article->id }}
    </div>

    <div class="card-body d-flex flex-column justify-content-center align-items-center">
        <img src="{{ $article->images->isNotEmpty() ? Storage::url($article->images->first()->path) : 'https://picsum.photos/200' }}"
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
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal-{{ $article->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row bg-success rowmodal">
                    <div class="col-12 p-0">
                        @if ($article->images->count() > 0)
                            <div id="carouselExampleDark-{{ $article->id }}"
                                class="carousel carousel-dark slide h-100">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleDark-{{ $article->id }}"
                                        data-bs-slide-to="0" class="active" aria-current="true"
                                        aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark-{{ $article->id }}"
                                        data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark-{{ $article->id }}"
                                        data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    <button type="button" data-bs-target="#carouselExampleDark-{{ $article->id }}"
                                        data-bs-slide-to="3" aria-label="Slide 4"></button>
                                      <button type="button" data-bs-target="#carouselExampleDark-{{ $article->id }}"
                                            data-bs-slide-to="4" aria-label="Slide 5"></button>
                                     <button type="button" data-bs-target="#carouselExampleDark-{{ $article->id }}"
                                            data-bs-slide-to="5" aria-label="Slide 6"></button>
                                     <button type="button" data-bs-target="#carouselExampleDark-{{ $article->id }}"
                                              data-bs-slide-to="6" aria-label="Slide 7"></button>
                                     <button type="button" data-bs-target="#carouselExampleDark-{{ $article->id }}"
                                              data-bs-slide-to="7" aria-label="Slide 8"></button>
                                            
                                </div>
                                <div class="carousel-inner w-100">
                                    @foreach ($article->images as $key => $image)
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                        <div class="carousel-item  @if ($loop->first) active @endif"
                                            data-bs-interval="10000">
                                            <img src="{{ Storage::url($image->path) }}"
                                                class=" d-block rounded shadow w-100" alt="...">
                                        </div>
                                    @endforeach
                                </div>
                                @if ($article->images->count() > 1)
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExampleDark-{{ $article->id }}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExampleDark-{{ $article->id }}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                @endif
                            </div>
                         @else
                            <img src="https://picsum.photos/300" alt="foto alternativa">
                        @endif
                    </div>

                </div>
                <div class="col-12 text-start pt-2 ps-1">
                    <small
                        class="d-inline-flex px-2 py-1 text-white bg-secondary border border-secondary rounded-2">{{ $article->category->name }}</small>
                    <small
                        class="d-inline-flex px-2 py-1 text-white bg-secondary border border-secondary rounded-2">{{ $article->user->name }}</small>
                    <small
                        class="d-inline-flex px-2 py-1 text-white bg-secondary border border-secondary rounded-2">{{ $article->price }}€</small>
                    <h5 class="mt-3 text-center">Titolo:</h5>
                    <p class="text-center fw-semibold">{{ $article->title }}</p>

                </div>


                <div class="row text-center">
                    <div class="col-12 text-start">
                        <h5 class="text-center">Descrizione:</h5>
                        <p class="text-center fst-italic">{{ $article->description }}</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
