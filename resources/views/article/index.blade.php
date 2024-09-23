<x-layout>

    <div class="container-fluid mt-5">
        <div class="row  justify-content-center align-items-center text-center pt-5">
            <div class="col-12">
                <h1 class="display-4 pt-5">Tutti gli Articoli</h1>
            </div>
        </div>
        <div class="row height-custom justify-content-center align-items-center py-4 gap-3">
           
                @forelse ($articles as $article)
                    <div class="col-12 col-md-3 pt-5">
                        <x-card :article="$article" />
                    </div>
                @empty
                    <div class="col-12">
                        <h3 class="text-center">Nessun Articolo Caricato</h3>
                    </div>
                @endforelse
        
               
           
           
            <div class="d-flex justify-content-center">
                <div>
                    {{ $articles->links() }}
                </div>
            </div>

        </div>
    </div>


</x-layout>
