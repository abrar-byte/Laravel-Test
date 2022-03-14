@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Schedule</h1>

</div>
<div class="col-lg-8">


  <form method="post" action="/dashboard/schedules/{{ $schedule->id }}" class="mb-5">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="homeTeam" class="form-label">Home Team</label>
      <select class="form-select" name="home_team_id">
        @foreach ($teams as $team)
        @if (old('home_team_id', $schedule->home_team_id) == $team->id)
        <option value="{{ $team->id }}" selected>{{ $team->name }}</option>
        @else
        <option value="{{ $team->id }}">{{ $team->name }}</option>


        @endif

        @endforeach

      </select>
    </div>

    <div class="mb-3">
      <label for="awayTeam" class="form-label">Away Team</label>
      <select class="form-select" name="away_team_id">
        @foreach ($teams as $team)
        @if (old('away_team_id', $schedule->away_team_id) == $team->id)
        <option value="{{ $team->id }}" selected>{{ $team->name }}</option>
        @else
        <option value="{{ $team->id }}">{{ $team->name }}</option>


        @endif

        @endforeach

      </select>
    </div>



    <div class="mb-3">
      <label for="tanggal" class="form-label">tanggal</label>
      <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal"
        value="{{ old('tanggal',$schedule->tanggal) }}">
      @error('tanggal')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror

    </div>

    <div class="mb-3">
      <label for="waktu" class="form-label">Waktu</label>
      <input type="time" class="form-control @error('waktu') is-invalid @enderror" id="waktu" name="waktu"
        value="{{ old('waktu',$schedule->waktu) }}">
      @error('waktu')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror

    </div>





    <button type="submit" class="btn btn-primary">Update Schedule</button>
  </form>

</div>





@endsection