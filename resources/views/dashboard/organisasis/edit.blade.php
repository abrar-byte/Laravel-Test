@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Organisasi</h1>

</div>
<div class="col-lg-8">


  <form method="post" action="/dashboard/organisasis/{{ $organisasi->slug }}" class="mb-5"
    enctype="multipart/form-data">
    @method('put')
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Name</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required
        autofocus value="{{ old('name', $organisasi->name) }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>

    <div class="mb-3">
      <label for="slug" class="form-label">Slug</label>
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" required
        value="{{ old('slug', $organisasi->slug) }}">
      @error('slug')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>

    <div class="mb-3">
      <label for="logo" class="form-label">Post logo</label>
      @if ($organisasi->logo)
      <img src="{{ asset('storage/' . $organisasi->logo) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">

      @else
      <img class="img-preview img-fluid mb-3 col-sm-5">

      @endif
      <img class="img-preview img-fluid mb-3 col-sm-5">
      <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo" name="logo"
        onchange="previewImage()">
      @error('logo')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>

    <div class="mb-3">
      <label for="year" class="form-label">year</label>
      <input type="number" class="form-control @error('year') is-invalid @enderror" id="year" name="year" required
        value="{{ old('year',$organisasi->year) }}">
      @error('year')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>

    <div class="mb-3">
      <label for="address" class="form-label">address</label>
      <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
        required value="{{ old('address',$organisasi->address) }}">
      @error('address')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>

    <div class="mb-3">
      <label for="olahraga_id" class="form-label">sport</label>
      <select class="form-select" name="olahraga_id">
        @foreach ($olahragas as $olahraga)
        @if (old('olahraga_id',$olahraga->id) == $olahraga->id)
        <option value="{{ $olahraga->id }}" selected>{{ $olahraga->name }}</option>
        @else
        <option value="{{ $olahraga->id }}">{{ $olahraga->name }}</option>


        @endif

        @endforeach

      </select>
    </div>





    <button type="submit" class="btn btn-primary">Update Organisasi</button>
  </form>

</div>

<script>
  const name = document.querySelector('#name');
  const slug = document.querySelector('#slug');


  name.addEventListener('change', function(){
    fetch('/dashboard/organisasis/checkSlug?name=' + name.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });
{{--  menon aktifkan  trix editor upload--}}
  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  })
  function previewImage(){
    const image = document.querySelector('#logo');
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