@extends('layouts.game')

@section('title', "Modifica il gioco")

@section('content')

<form action="{{route("game.update", $game)}}" method="POST" enctype="multipart/form-data">
@csrf

{{-- aggiungo il metodo --}}
@method("PUT")

<div class="form-control mb-3 d-flex flex-column">
    <label for="title">Titolo</label>
    <input type="text" name="title" id="title" value="{{ $game->title }}" required>   
</div>

{{-- platforms --}}
<div class="form-control mb-2">
    <label class="mb-2">Piattaforme</label>
    <div class="d-flex flex-wrap gap-3">
        @foreach ($platforms as $platform)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="platforms[]" value="{{ $platform->id }}" id="platform-{{ $platform->id }}"
                    {{ $game->platforms->contains($platform->id) ? 'checked' : '' }}>
                <label class="form-check-label" for="platform-{{ $platform->id }}">
                    {{ $platform->name }}
                </label>
            </div>   
        @endforeach
    </div>
</div>

{{-- genres --}}
<div class="form-control mb-2">
    <label class="mb-2">Generi</label>
    <div class="d-flex flex-wrap gap-3">
        @foreach ($genres as $genre)
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="genres[]" value="{{ $genre->id }}" id="genre-{{ $genre->id }}"
                    {{ $game->genres->contains($genre->id) ? 'checked' : '' }}>
                <label class="form-check-label" for="genre-{{ $genre->id }}">
                    {{ $genre->name }}
                </label>
            </div>
        @endforeach
    </div>
</div>

<div class="form-control mb-2 d-flex flex-column">
    <label for="release_date">Data di pubblicazione</label>
    <input type="date" name="release_date" id="release_date" value="{{ $game->release_date }}" required>    
</div>
<div class="form-control mb-2 d-flex flex-column">
    <label for="developer">Sviluppatore</label>
    <input type="text" name="developer" id="developer" value="{{ $game->developer }}" required>    
</div>
<div class="form-control mb-2 d-flex flex-column">
    <label for="publisher">Editore</label>
    <input type="text" name="publisher" id="publisher" value="{{ $game->publisher }}" required>    
</div>
<div class="form-control mb-2 d-flex flex-wrap gap-3">
    <label for="cover_image">Immagine</label>
    <input type="file" name="cover_image" id="cover_image">  
    
    @if ($game->cover_image)
        <img src="{{ asset ("storage/" . $game->cover_image)}}" alt="cover" class="img-fluid w-25">   
    @endif
</div>
<div class="form-control mb-2 d-flex flex-column">
    <label for="description">Descrizione</label>
    <textarea name="description" id="description" cols="30" rows="10" required>{{ $game->description }}</textarea>   
    </div>

    <input type="submit" value="Salva">
</form>
    
@endsection