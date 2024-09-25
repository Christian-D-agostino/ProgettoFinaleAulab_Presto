<x-layout>

    <div class="container-fluid pt-5">
        <div class="row">
            <div class="col-12 ">
                <div class="rounded">
                    <h1 class="mt-5 p-5 pb-5 text-center display-4 fst-italic text-uppercase">Revisor Dashboard</h1>
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
            <div class="row justify-content-around">
                <div class="col-10 col-md-4">
                    @if ($article_to_check->images->count() >= 0)
                        <div id="carouselExampleIndicators" class="carousel slide">
                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                                    aria-label="Slide 4"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                                    aria-label="Slide 5"></button>
                                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"
                                    aria-label="Slide 6"></button>

                            </div>
                            <div class="carousel-inner">
                                @forelse ($article_to_check->images as $key0 => $image)
                                    <div class="carousel-item @if ($key0 == 0) active @endif">
                                        <img src="{{ $image? $image->getUrl(300, 300) : 'https://picsum.photos/300' }}" class="d-block img-fluid w-100" alt="...">
                                    </div>


                                    {{-- inizio ratings --}}
                                    <div class="col-md-5 MoveMargin ">
                                        <div class="card-body">
                                            <h5 class="text-danger">Labels</h5>
                                          
                                            @if($image->labels)
                                                @foreach($image->labels as $label)
                                                         <p class="text-danger">#{{$label}}</p>
                                                @endforeach
                                            @else
                                                <p class="fst-italic text-danger">No labels</p>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-8 col-md-3 ps-3">
                                        <div class="card-body">
                                            <h5 >Ratings</h5>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto{{$image->adult}}"></div>
                                                </div>
                                                <div class="col-10 text-black">adult</div>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto{{$image->medical}}"></div>
                                                </div>
                                                <div class="col-10 text-black">medical</div>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto{{$image->racy}}"></div>
                                                </div>
                                                <div class="col-10">racy</div>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto{{$image->violence}}"></div>
                                                </div>
                                                <div class="col-10">violence</div>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <div class="text-center mx-auto{{$image->spoof}}"></div>
                                                </div>
                                                <div class="col-10">spoof</div>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- fine ratings --}}

                                    @empty
                            @for ($i = 0; $i < 6; $i++)

                                    <div class="carousel-item @if ($i == 0) active @endif">
                                        <img src="https://picsum.photos/30{{ $i }}?random" class="d-block img-fluid w-100" alt="...">
                                    </div>
                            @endfor
                                    
                                @endforelse

                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                </div>
        @endif





        {{-- COLONNA DESCRIZIONE ARTICOLO --}}
        <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
            <div>
                <h1>{{ $article_to_check->title }}</h1>
                <p>{{__('ui.author')}}: {{ $article_to_check->user->name }}</p>
                <p>{{__('ui.price')}}: {{ $article_to_check->price }}</p>
                <p class="fst-italic"> {{ $article_to_check->category->name }}</p>
                <p class="h6">{{ $article_to_check->description }}</p>
            </div>
            <div class="d-flex pb-4 justify-content-start">
                <form action="{{ route('revisor.accept', $article_to_check) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-success m-2" type="submit">{{__('ui.accept')}} </button>
                </form>
                <form action="{{ route('revisor.reject', $article_to_check) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button class="btn btn-danger m-2" type="submit">{{__('ui.reject')}} </button>
                </form>
            </div>

        </div>
    </div>

    </div>
@else
    <div class="row justify-content-center align-items-center text-center">
        <div class="col-12">
            <h1 class="fst-italic">{{__('ui.noarticlesreview')}} </h1>
            <a class="btn btn-success" href="{{ route('welcome') }}">{{__('ui.backhome')}} </a>
        </div>
    </div>
    @endif
    </div>
    @foreach ($lastArticle as $article)
        <h1 class="text-center pt-5">{{__('ui.modifyreview')}}: {{ $article->title }}</h1>
        <div class="d-flex pb-4 justify-content-around">
            <form action="{{ route('revisor.undo', compact('article')) }}" method="POST">
                @csrf
                @method('PATCH')
                <button class="btn btn-danger" type="submit">{{__('ui.resetview')}} </button>
            </form>
        </div>
    @endforeach
</x-layout>

