<div style="width: 21rem;" class="card card-custom text-white text-center">
    <div class="card-header">
        Articolo N.{{ $article->id }}
    </div>
    <div class="card-body d-flex flex-column justify-content-center align-items-center">
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
                    <div class="col-12">
                        <div id="carouselExampleDark-{{ $article->id }}" class="carousel carousel-light slide h-100">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleDark-{{ $article->id }}"
                                    data-bs-slide-to="0" class="active" aria-current="true"
                                    aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleDark-{{ $article->id }}"
                                    data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleDark-{{ $article->id }}"
                                    data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner w-100">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                <div class="carousel-item active" data-bs-interval="10000">
                                    <img src="https://picsum.photos/300" class="w-100" alt="...">
                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                    <img src="https://picsum.photos/301" class="w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="https://picsum.photos/302" class="w-100" alt="...">
                                </div>
                            </div>
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
                        </div>
                    </div>
                </div>
                <div class="col-12 text-start pt-5">
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
