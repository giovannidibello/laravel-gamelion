@extends('layouts.game')

@section('title', "Gamelion")
    
@section("content")

<div class="container">

  <div class="d-flex justify-content-between pb-3 gap-3">
    {{-- pulsante per aggiungere un nuovo gioco --}}
      <a  class="btn btn-outline-custom" href="{{route("game.create")}}">Aggiungi un gioco</a> 
      {{-- form ricerca gioco per titolo genere o piattaforma --}}
      <form  type="submit" action="{{ route('game.index') }}" method="GET" class="d-flex flex-row gap-2">
      <input type="text" name="search" class="form-control border-search" placeholder="Cerca..." value="{{ request('search') }}">    
      </form>
  </div>

  <h2 class="mb-4 text-center">Lista Giochi</h2>

  {{-- tabella per visualizzare la lista giochi --}}
  <table class="table table-bordered table-hover align-middle">
    <thead class="table-secondary">
      <tr>
        <th>Titolo</th>
        <th>Piattaforma/e</th>
        <th>Genere/i</th>        
        <th>Cover</th>       
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach ($games as $game)
        <tr>
          <td>{{ $game->title }}</td>          
          <td>
            {{-- ciclo sulla lista delle piattaforme del gioco --}}
            @foreach ($game->platforms as $platform)
              <span style="color: {{$platform->color}}" >{{ $platform->name }}</span>
              {{-- inserisco uno spazio come divisore tranne alla fine --}}
              @if (!$loop->last)
                <span>-</span> 
               @endif
            @endforeach
          </td>
          <td>
            {{-- ciclo sulla lista dei generi del gioco --}}
            @foreach ($game->genres as $genre)
              <span style="color: #0f2c57">{{ $genre->name }}</span>
              {{-- inserisco uno spazio come divisore tranne alla fine --}}
               @if (!$loop->last)
                <span>-</span> 
               @endif
            @endforeach
          </td>
          {{-- controllo se il gioco ha un immagine di copertina  --}}
          <td>{{ $game->cover_image ? "Si" : "No" }}</td>
          {{-- pulsante per visualizzare il singolo gioco --}}
          <td class="text-center">
            <a href="{{ route('game.show', $game->id) }}" class="btn btn-sm btn-custom">Visualizza</a>            
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection