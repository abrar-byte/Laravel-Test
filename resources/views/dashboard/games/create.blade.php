@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create New Match or Goal</h1>



</div>
<div class="col-lg-8">


  <form method="post" action="/dashboard/games" class="mb-5">
    @csrf
    <div class="mb-3">
      <label for="schedule" class="form-label">Pertandingan </label>
      <select class="form-select" name="game_id">
        @foreach ($games as $game)
        @if (old('game_id') == $game->id)
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
      <small class="text-muted">pencetak gol harus salah satu Tim dari pertandingan yang kamu pilih </small>

      <select class="form-select" name="player_id">
        @foreach ($players as $player)
        @if (old('player_id') == $player->id)
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
        name="goal_minute" value=" : {{ old('goal_minute') }}" placeholder="_:_">
      @error('goal_minute')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror

    </div>



    <button type="submit" class="btn btn-primary">Add Player</button>
  </form>

</div>

<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');


  name.addEventListener('change', function(){
    fetch('/dashboard/player/checkSlug?name=' + name.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });
{{--  menon aktifkan  trix editor upload--}}
  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  })

  function previewImage(){
  const image = document.querySelector('#image');
  const imgPreview = document.querySelector('.img-preview');
  
  imgPreview.style.display = 'block';
  
  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function(oFREvent){
    imgPreview.src = oFREvent.target.result
  }
}


</script>




@endsection