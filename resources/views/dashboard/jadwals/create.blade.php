@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Create New Schedule</h1>

</div>
<div class="col-lg-8">


  <form method="post" action="/dashboard/jadwals" class="mb-5">
    @csrf

    <div class="mb-3">
      <label for="organisasi_id" class="form-label">Home Team</label>
      <select class="form-select" name="organisasi_id">
        @foreach ($organisasis as $organisasi)
        @if (old('organisasi_id') == $organisasi->id)
        <option value="{{ $organisasi->id }}" selected>{{ $organisasi->name }}</option>
        @else
        <option value="{{ $organisasi->id }}">{{ $organisasi->name }}</option>


        @endif

        @endforeach

      </select>
    </div>

    <div class="mb-3">
      <label for="name" class="form-label">Nama Acara</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required
        value="{{ old('name') }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror

    </div>


    <div class="mb-3">
      <label for="desc" class="form-label">Deskripsi</label>
      <input type="text" class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc" required
        value="{{ old('desc') }}">
      @error('desc')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror

    </div>




    <div class="mb-3">
      <label for="date" class="form-label">date</label>
      <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" required
        value="{{ old('date') }}">
      @error('date')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror

    </div>

    <div class="mb-3">
      <label for="time" class="form-label">time</label>
      <input type="time" class="form-control @error('time') is-invalid @enderror" id="time" name="time" required
        value="{{ old('time') }}">
      @error('time')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror

    </div>

    <div class="mb-3">
      <label for="priority" class="form-label">Home Team</label>
      <select class="form-select" name="priority">
        @foreach ($prioritas as $a)
        @if (old('priority') == $a)
        <option value="{{ $a }}" selected>{{ $a }}</option>
        @else
        <option value="{{ $a }}">{{ $a}}</option>


        @endif

        @endforeach

      </select>
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