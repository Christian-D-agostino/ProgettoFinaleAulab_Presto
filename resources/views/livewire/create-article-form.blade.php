<form class="bg-body-tertiary shadow rounded p-5 my-5" wire:submit='save'>
    @if (session('created'))
        <div class="alert alert-success">
            {{ session('created') }}
        </div>
    @endif
    <div class="mb-3">
        <label for="title" class="form-label">Titolo</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" wire:model.live="title">
        @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Descrizione</label>
        <textarea class="form-control @error('description') is-invalid @enderror" cols="30" rows="10" id="description"
            wire:model.live="description"></textarea>
        @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Prezzo</label>
        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
            wire:model.live="price">
        @error('price')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <select class="form-control @error('category') is-invalid @enderror" name="category" id="category"
            wire:model.live="category">
            <option label >Seleziona una Categoria</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-dark">Crea</button>
    </div>

</form>
