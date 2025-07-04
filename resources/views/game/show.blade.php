@extends('layouts.game')

@section('title', $game->title)

@section('content')


<div class="container">

    <div class="d-flex justify-content-center pb-3 gap-3">
      {{-- pulsanti modifica e elimina gioco --}}
        <a  class="btn btn-outline-warning" href="{{route("game.edit", $game)}}">Modifica</a>
        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
             Elimina
        </button>
    </div>

    <div class="d-flex justify-content-between mb-2 border rounded p-2 gap-5 bg-light">
        @if ($game->cover_image)
        <img src="{{ asset ("storage/" . $game->cover_image)}}" alt="cover" class="img-fluid" style="max-width: 300px; height: auto;">   
        @endif

        {{-- visualizzazione del gioco selezionato --}}
        <div>
            <div class="mb-2 border rounded p-2 bg-light">
            @if (count($game->platforms) > 0)
            <h5 class="gap-2 mb-0">
            @foreach ($game->platforms as $platform)
            <span class="badge" style="background-color: {{$platform->color}}">{{$platform->name}}</span>          
            @endforeach
            </h5>
            @endif
            </div>

            <div class="mb-2 border rounded p-2 bg-light">
            <h4 class="mb-0"><strong>Titolo: </strong>{{ $game->title }}</h4>
            </div> 

            @if ($game->genres->count())
            <div class="mb-2 border rounded p-2">
            <h6 class="mb-0"><strong>Genere/i: </strong>{{ $game->genres->pluck('name')->implode(', ') }}</h6>    
            </div>
            @endif

            <div class="d-flex justify-content-between mb-2 border rounded p-2 gap-3">
            <h6 class="mb-0"><strong>Data di pubblicazione: </strong>{{ \Carbon\Carbon::parse($game->release_date)->format('d/m/Y') }}</h6>
            <h6 class="mb-0"><strong>Sviluppatore: </strong>{{ $game->developer }}</h6>  
            <h6 class="mb-0"><strong>Editore: </strong>{{ $game->publisher }}</h6>  
            </div>
  
            <div class="mb-2 border rounded p-2">
            <h6 class="mb-0"><strong>Descrizione: </strong>{{ $game->description }}</h6>    
            </div>

        </div>
    </div>   

      
  
  

</div>

{{-- modal elimina --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina il progetto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Vuoi eliminare il progetto?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
        <form action="{{route("game.destroy", $game)}}" method="POST">
             @csrf
            {{-- aggiungo il metodo --}}
            @method("DELETE")
            <input type="submit" class="btn btn-danger" value="Elimina definitivamente">
        </form>
      </div>
    </div>
  </div>
</div>
@endsection