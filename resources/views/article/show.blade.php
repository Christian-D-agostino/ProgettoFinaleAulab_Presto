<x-layout>
    <div class="container">
        <div class="row height-custom justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-4">Dettaglio dell'Articolo : {{ $article->title }}</h1>
            </div>
        </div>
        <div class="row height-custom py-5 justify-content-center">
            <div class="col-12 col-md-6 mb-3">
                <div id="carouselExampleDark" class="carousel carousel-dark slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="10000">
                            <img src="https://picsum.photos/300" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="https://picsum.photos/301" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/302" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            
            <div class="col-12 col-md-6 mb-3 height-custom text-center">
                <h2 class="display-5"><span class="fw-bold">{{ $article->title }}</span></h2>
                <div class="d-flex justify-content-center h-75 flex-column">
                    <h4 class="fw-bold">Prezzo{{ $article->price }}</h4>
                    <h5>Descrizione:</h5>
                    <p>{{ $article->description }}</p>
                </div>
            </div>

        </div>
    </div>

</x-layout>
