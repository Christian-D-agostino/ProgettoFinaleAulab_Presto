<x-layout>

    <div class="container-fluid text-center">
        <div class="row vh-100 justify-content-center align-items-center bg-custom">
            <div class="col-12 d-flex justify-content-center flex-column align-items-center">
                <h1 class="display-4 font-title">Presto.it</h1>
                <a href="{{ route('article.create') }}" class="btn btn-custom">Crea un Articolo</a>
            </div>
        </div>

        <section class="container-fluid bg-cards">
            <div class="row justify-content-evenly m-5 box-shadow">
                <div class="col-12 col-md-3 text-center py-4 ">
                    <i class="bi bi-bag-check text-success fs-1 "></i>
                    <h3>Articoli venduti</h3>
                    <span id="incraseNumberOne" class="mt-4">0</span>
                </div>

                <div class="col-12 col-md-3 text-center py-4 ">
                    <i class="bi bi-person-plus  text-primary fs-1  "></i>
                    <h3>Clienti soddisfatti </h3>
                    <span id="incraseNumberTwo" class="mt-4"> 0</span>
                </div>

                <div class="col-12 col-md-3 text-center py-4  ">
                    <i class="bi bi-eye text-danger fs-1 "></i>
                    <h3>Visite</h3>
                    <span id="incraseNumberThree" class="mt-4"> 0</span>
                </div>
            </div>
        </section>
        <div class="row height-custom justify-content-center align-items-center py-5 bg-cards">
            @forelse ($articles as $article)
                <div class="col-12 col-md-4 mb-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="text-center">Nessun Articolo Caricato</h3>
                </div>
            @endforelse

        </div>
    </div>


</x-layout>
