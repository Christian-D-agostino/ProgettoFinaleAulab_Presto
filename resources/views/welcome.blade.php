<x-layout>

    <div class="container-fluid ">
        <div>

            <div class="row vh-100 justify-content-center HeaderBackground">
                @if (session('error'))
                    <div class="alert alert-success">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="col-11 col-md-8 d-flex flex-md-column align-items-start justify-content-center">

                    {{-- <img src="{{ asset('media/logoVero.png') }}" class="d-none d-md-block pt-5" alt=""> --}}
                    <div class="mb-5 pb-5">
                        <h2 class="text-center p-2">Vendere è facile, inizia oggi</h2>
                        <p class="fs-5 text-center text-white p-2">Raggiungi milioni di acquirenti</p>
                        
                        <a href="{{ route('article.create') }}" class="btn btn-custom mb-5">Vendi subito!</a>
                    </div>


                </div>

            </div>
        </div>
        <section class="container-fluid bg-cards">
            <div class="row row-numbers justify-content-evenly m-5 box-shadow text-white">
                <div class="col-12 col-md-3 text-center py-4">
                    <i class="bi bi-bag-check text-success fs-1 "></i>
                    <h3>Articoli venduti</h3>
                    <span id="incraseNumberOne" class="mt-4">0</span>
                </div>

                <div class="col-12 col-md-3 text-center py-4 ">
                    <i class="bi bi-person-plus  text-primary fs-1  "></i>
                    <h3>Clienti soddisfatti </h3>
                    <span id="incraseNumberTwo" class="mt-4"> 0</span>
                </div>

                <div class="col-12 col-md-3 text-center py-4 ">
                    <i class="bi bi-eye text-danger fs-1 "></i>
                    <h3>Visite</h3>
                    <span id="incraseNumberThree" class="mt-4"> 0</span>
                </div>
            </div>
        </section>

        <div class="row justify-content-center">
            <div class="col-12 col-md-10">
                <div class="swiper mySwiper height-custom-2">
                    <div class="swiper-wrapper">
                        @forelse ($articles as $article)
                            <div class="swiper-slide d-flex justify-content-center align-items-center flex-column">
                                <x-card :article="$article" class="card-class-swiper" />
                            </div>
                        @empty
                            <div class="col-12">
                                <h3 class="text-center">Nessun Articolo Caricato</h3>
                            </div>
                        @endforelse
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>


        {{-- <div class="container">
            <div class="row height-custom justify-content-center align-items-center py-5 bg-cards">
                @forelse ($articles as $article)
                    <div class="col-12 col-md-4 mb-3 d-flex justify-content-center">
                        <x-card :article="$article" />
                    </div>
                @empty
                    <div class="col-12">
                        <h3 class="text-center">Nessun Articolo Caricato</h3>
                    </div>
                @endforelse
            </div>

        </div> --}}
    </div>


</x-layout>
