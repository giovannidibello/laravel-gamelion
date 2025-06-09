@extends('layouts.game')

@section('title', "Gamelion")
    
@section("content")

<div class="container">

  <div class="d-flex justify-content-between pb-3 gap-3">
      <a  class="btn btn-outline-custom" href="{{route("game.create")}}">Aggiungi un gioco</a> 
      <form  type="submit" action="{{ route('game.index') }}" method="GET" class="d-flex flex-row gap-2">
      <input type="text" name="search" class="form-control border-search" placeholder="Cerca..." value="{{ request('search') }}">    
      </form>
  </div>

  <h2 class="mb-4 text-center">Lista Giochi</h2>

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
            @foreach ($game->platforms as $platform)
              <span class="badge" style="background-color: {{$platform->color}}" >{{ $platform->name }}</span>
            @endforeach
          </td>
          <td>
            @foreach ($game->genres as $genre)
              <span class="badge bg-secondary">{{ $genre->name }}</span>
            @endforeach
          </td>          
          <td>{{ $game->cover_image ? "Si" : "No" }}</td>
          <td class="text-center">
            <a href="{{ route('game.show', $game->id) }}" class="btn btn-sm btn-custom">Visualizza</a>            
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection