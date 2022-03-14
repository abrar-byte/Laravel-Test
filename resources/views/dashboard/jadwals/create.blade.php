@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create New Schedule</h1>

</div>
<div class="col-lg-8">


  <form method="post" action="/dashboard/schedules" class="mb-5">
    @csrf

    <div class="mb-3">
      <label for="home_team_id" class="form-label">Home Team</label>
      <select class="form-select" name="home_team_id">
        @foreach ($teams as $team)
        @if (old('home_team_id') == $team->id)
        <option value="{{ $team->id }}" selected>{{ $team->name }}</option>
        @else
        <option value="{{ $team->id }}">{{ $team->name }}</option>


        @endif

        @endforeach

      </select>
    </div>

    <div class="mb-3">
      <label for="away_team_id" class="form-label">Away Team</label>
      <select class="form-select" name="away_team_id">
        @foreach ($teams as $team)
        @if (old('away_team_id') == $team->id)
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
        required value="{{ old('tanggal') }}">
      @error('tanggal')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror

    </div>

    <div class="mb-3">
      <label for="waktu" class="form-label">Waktu</label>
      <input type="time" class="form-control @error('waktu') is-invalid @enderror" id="waktu" name="waktu" required
        value="{{ old('waktu') }}">
      @error('waktu')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror

    </div>



    <button type="submit" class="btn btn-primary">Add Player</button>
  </form>
  {{-- @dd(old('home_team_id')) --}}


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