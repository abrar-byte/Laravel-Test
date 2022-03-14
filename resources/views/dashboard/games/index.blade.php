@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Match Results</h1>

</div>
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}

</div>

@endif


<div class="table-responsive col-lg-8">
  <a href="/dashboard/games/create" class="btn btn-primary mb-3">Create Match Result</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Pertandingan</th>
        <th scope="col">Pencetak Gol</th>
        <th scope="col">Menit Gol</th>
        <th scope="col">Skor Akhir</th>
      </tr>
    </thead>
    <tbody>
      @foreach($games as $key =>$game)
      <tr>
        <td>{{ $key + 1 }}</td>
        <td>
          {{ $game->schedule->homeTeam->name }}
          - {{ $game->schedule->awayTeam->name }}
        </td>
        <td>
          <ul>
            @if ($game->player->count())
            @foreach($game->player as $key => $h)
            <li> {{ $h->name }} from {{ $h->team->name }} </li>
            @endforeach
            @else
            <p class="text-danger">Hasil Pertandingan belum ada</p>
            @endif
          </ul>
        </td>
        <td>
          @if ($game->player->count())
          @foreach($game->player as $key => $h)
          <li> {{ $h->pivot->goal_minute }} </li>
          @endforeach
          @else
          <p class="text-danger">Hasil Pertandingan belum ada</p>
          @endif
        </td>
        <td class="text-center">{{ $game->player->where('team_id', '=', $game->schedule->home_team_id)->count() }}
          - {{
          $game->player->where('team_id', '=', $game->schedule->away_team_id)->count() }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>


@endsection