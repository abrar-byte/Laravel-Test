@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Anggota Baru</h1>

</div>
<div class="col-lg-8">
  <form method="post" action="/dashboard/anggotas" class="mb-5">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nama</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required
        autofocus value="{{ old('name') }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>
    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required
        value="{{ old('slug') }}">
      @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>
    <div class="mb-3">
      <label for="organisasi_id" class="form-label">Organisasi</label>
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
      <label for="height" class="form-label">Tinggi Badan</label>
      <input type="number" class="form-control @error('height') is-invalid @enderror" id="height" name="height" required
        value="{{ old('height') }}"><small class="text-muted">cm</small>
      @error('height')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>

    <div class="mb-3">
      <label for="weight" class="form-label">Berat Badan</label>
      <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" required
        value="{{ old('weight') }}"><small class="text-muted">kg</small>
      @error('weight')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>

    <div class="mb-3">
      <label for="position" class="form-label">Posisi Anggota</label>
      <select class="form-select" name="position">
        @foreach ($positions as $position)
        @if (old('position') == $position)
        <option value="{{ $position }}" selected>{{ $position }}</option>
        @else
        <option value="{{ $position }}">{{ $position }}</option>


        @endif

        @endforeach


      </select>
    </div>

    <div class="mb-3">
      <label for="number" class="form-label">Nomor Telepon</label>
      <input type="number" class="form-control @error('number') is-invalid @enderror" id="number" name="number" required
        value="{{ old('number') }}">
      @error('number')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>

    <button type="submit" class="btn btn-primary">Tambahkan Anggota</button>
  </form>
</div>

<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');


  name.addEventListener('change', function(){
    fetch('/dashboard/anggota/checkSlug?name=' + name.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });
{{--  menon aktifkan  trix editor upload--}}
  {{--  document.addEventListener('trix-file-accept', function(e){
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
}  --}}


</script>




@endsection