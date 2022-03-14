@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Schedule</h1>

</div>
<div class="col-lg-8">

  <h1>Tes</h1>
  {{-- @dd($games) --}}
  @dd($gamePlayer)

  {{-- <form method="post" action="/dashboard/games/{{ $gamePlayer->id }}" class="mb-5">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="game" class="form-label">Pertandingan </label>
      <select class="form-select" name="game_id">
        @foreach ($games as $game)
        @if (old('game_id',$gamePlayer->game_id) == $game->id)
        <option value="{{ $game->id }}" selected>{{ $game->schedule->homeTeam->name }}- {{
          $game->schedule->awayTeam->name }}</option>
        @else
        <option value="{{ $game->id }}">{{ $game->schedule->homeTeam->name }}- {{
          $game->schedule->awayTeam->name }}</option>


        @endif

        @endforeach

      </select>
    </div>

    <div class="mb-3">
      <label for="player" class="form-label">Pencetak Gol </label>
      <select class="form-select" name="player_id">
        @foreach ($players as $player)
        @if (old('player_id',$gamePlayer->player_id) == $player->id)
        <option value="{{ $player->id }}" selected>{{ $player->name }} from {{ $player->team->name }}</option>
        @else
        <option value="{{ $player->id }}">{{ $player->name }} from {{ $player->team->name }}</option>


        @endif

        @endforeach
      </select>
    </div>







    <div class="mb-3">
      <label for="goal_minute" class="form-label">Menit Gol</label>
      <small class="text-muted">contoh pengisian data 16:20 </small>
      <input type="text" class="form-control @error('goal_minute') is-invalid @enderror" id="goal_minute"
        name="goal_minute" value=" : {{ old('goal_minute',$gamePlayer->goal_minute) }}" placeholder="_:_">
      @error('goal_minute')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror

    </div>




    <button type="submit" class="btn btn-primary">Update Schedule</button>
  </form> --}}

</div>





@endsection