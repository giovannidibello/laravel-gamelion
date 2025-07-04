@extends('layouts.game')

@section('title', "Aggiungi un gioco")

@section('content')

<form action="{{route("game.store")}}" method="POST" enctype="multipart/form-data">
@csrf

<div class="form-control mb-2 d-flex flex-column">
    <label for="title">Titolo</label>
    <input type="text" name="title" id="title" required>   
</div>

{{-- checkbox piattaforme --}}
<div class="form-control mb-2">
    <label class="mb-2">Piattaforme</label>
    <div class="d-flex flex-wrap gap-3">
    @foreach ($platforms as $platform)
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="platforms[]" value="{{$platform->id}}" id="platform-{{$platform->id}}">
    <label class="form-check-label" for="platform-{{ $platform->id }}">{{$platform->name}}</label>
    </div>   
    @endforeach
    </div>
</div>

{{-- checkbox generi --}}
<div class="form-control mb-2">
    <label class="mb-2">Generi</label>
    <div class="d-flex flex-wrap gap-2">
    @foreach ($genres as $genre)
    <div class="form-check">
    <input class="form-check-input" type="checkbox" name="genres[]" value="{{$genre->id}}" id="genre-{{$genre->id}}">
    <label class="form-check-label" for="genre-{{ $genre->id }}">{{$genre->name}}</label>
    </div>   
    @endforeach
</div>
</div> 

{{-- campi informazioni gioco --}}
<div class="form-control mb-2 d-flex flex-column">
    <label for="release_date">Data di pubblicazione</label>
    <input type="date" name="release_date" id="release_date" required>    
</div>
<div class="form-control mb-2 d-flex flex-column">
    <label for="developer">Sviluppatore</label>
    <input type="text" name="developer" id="developer" required>    
</div>
<div class="form-control mb-2 d-flex flex-column">
    <label for="publisher">Editore</label>
    <input type="text" name="publisher" id="publisher" required>    
</div>
<div class="form-control mb-2 d-flex flex-wrap gap-3">
    <label for="cover_image">Immagine</label>
    <input type="file" name="cover_image" id="cover_image">    
</div>
<div class="form-control mb-2 d-flex flex-column">
    <label for="description">Descrizione</label>
    <textarea name="description" id="description" cols="30" rows="10" required></textarea>   
    </div>

    <input type="submit" value="Salva">
</form>

@endsection