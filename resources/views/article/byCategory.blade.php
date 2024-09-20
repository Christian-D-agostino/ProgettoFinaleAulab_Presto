<x-layout>

    <div class="container-fluid">
        <div class="row justify-content-center align-items-center py-5 text-center">
            <div class="col-12 pt-5">
                <h1 class="display-4">Articoli della Categoria <span class="fst-italic fw-bold">{{ $category->name }}</span></h1>
            </div>
        </div>

        <div class="row justify-content-center align-items-center pb-4 text-center">
            @forelse ($articles as $article)
                <div class="col-12 col-md-3 d-flex justify-content-center  mb-2">
                    <x-card :article="$article"/>
                </div>
            @empty
                <div class="col-12 text-center">
                    <h3>Non ci sono Articoli per questa categoria</h3>
                    @auth
                        <a href="{{ route('article.create') }}" class="btn btn-custom ">Crea Articolo</a>
                    @endauth
                </div>

            @endforelse
        </div>
    </div>


</x-layout>