<x-layout>
    @if (session('success'))
    <h1>ciao</h1>
@endif
    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-12">
                
                @foreach ($lastArticle as $article)
                <h1 class="display-4 text-center">Modifica ultimo articolo revisionato: {{ $article->title }}</h1>
               
                <div class="d-flex pb-4 justify-content-around">
                    <form action="{{ route('revisor.undo', compact('article')) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-success" type="submit">Resetta</button>
                    </form>
                </div>
 @endforeach
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-3">
                <div class="rounded shadow bg-body-secondary">
                    <h1 class="display-5 mt-5 pb-2 text-center">Revisor dashboard</h1>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('notSuccess'))
                    <div class="alert alert-success">
                        {{ session('notSuccess') }}
                    </div>
                @endif
            </div>
        </div>

        @if ($article_to_check)
            <div class="row justify-content-center pt-5">
                <div class="col-md-8">
                    <div class="row justify-content-center">

                        @for ($i = 0; $i < 6; $i++)
                            <div class="col-6 col-md-4 mb-4 text-center">
                                <img class="img-fluid rounded shadow" src="https://picsum.photos/300"
                                    alt="Foto segnaposto">
                            </div>
                        @endfor



                    </div>
                </div>

                <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                    <div>
                        <h1>{{ $article_to_check->title }}</h1>
                        <h3>autore: {{ $article_to_check->user->name }}</h3>
                        <h4>prezzo: {{ $article_to_check->price }}</h4>
                        <h4 class="fst-italic text-muted"> {{ $article_to_check->category->name }}</h4>
                        <p class="h6">{{ $article_to_check->description }}</p>
                    </div>
                    <div class="d-flex pb-4 justify-content-around">
                        <form action="{{ route('revisor.accept', $article_to_check) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success" type="submit">approva</button>
                        </form>
                        <form action="{{ route('revisor.reject', $article_to_check) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger" type="submit">rifiuta</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center align-items-center height-custom text-center">
                <div class="col-12">
                    <h1 class="display-4 fst-italic">Nessun articolo da revisionare</h1>
                    <a class="btn btn-success" href="{{ route('welcome') }}">Torna alla home</a>
                </div>
            </div>
        @endif
    </div>
</x-layout>
