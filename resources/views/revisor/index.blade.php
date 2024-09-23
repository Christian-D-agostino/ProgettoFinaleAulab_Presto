<x-layout>

    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-12 ">
                <div class="rounded">
                    <h1 class="mt-5 p-5 pb-2 text-center">Revisor dashboard</h1>
                </div>
                <div class="row justify-content-center align-items-center">
                    <div class="col-3">
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

            </div>
        </div>


        @if ($article_to_check)
            <div class="row justify-content-center">
                @if ($article_to_check->images->count())
                    @foreach ($article_to_check->images as $key0 => $image)
                        <div class="col-6 col-md-4 mb-4">
                            <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid rounded shadow" alt="">
                        </div>
                    @endforeach
                @else
                    <div class="row justify-content-center pt-5">
                        <div class="col-6">
                            <div class="row justify-content-start">
                                @for ($i = 0; $i < 6; $i++)
                                    <div class="col-6 mb-4 text-center gallery">
                                        <img src="https://picsum.photos/30{{ $i }}?random"
                                            alt="Foto segnaposto">
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                @endif





                <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                    <div>
                        <h1>{{ $article_to_check->title }}</h1>
                        <h3>autore: {{ $article_to_check->user->name }}</h3>
                        <h4>prezzo: {{ $article_to_check->price }}</h4>
                        <h4 class="fst-italic"> {{ $article_to_check->category->name }}</h4>
                        <p class="h6">{{ $article_to_check->description }}</p>
                    </div>
                    <div class="d-flex pb-4 justify-content-start">
                        <form action="{{ route('revisor.accept', $article_to_check) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success m-2" type="submit">approva</button>
                        </form>
                        <form action="{{ route('revisor.reject', $article_to_check) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-danger m-2" type="submit">rifiuta</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center mt-5 align-items-center height-custom text-center">
                <div class="col-12">
                    <h1 class="fst-italic">Nessun articolo da revisionare</h1>
                    <a class="btn btn-success" href="{{ route('welcome') }}">Torna alla home</a>
                </div>
            </div>
        @endif
    </div>
    @foreach ($lastArticle as $article)
        
            <h1 class="text-center pt-5">Modifica ultimo articolo revisionato: {{ $article->title }}</h1>
            <div class="d-flex pb-4 justify-content-around">
                <form action="{{ route('revisor.undo', compact('article')) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-danger" type="submit">Resetta ultimo articolo</button>
                </form>
            </div>
        
    @endforeach
</x-layout>
