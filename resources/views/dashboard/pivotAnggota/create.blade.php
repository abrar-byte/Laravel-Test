@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Buat Organisasi Baru</h1>

</div>
<div class="col-lg-8">


  <form method="post" action="/dashboard/pivotAnggota" class="mb-5" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="organisasi_id" class="form-label">Nama</label>
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
      <label for="anggota_id" class="form-label">Slug</label>
      <select class="form-select" name="anggota_id">
        @foreach ($anggotas as $anggota)
        @if (old('anggota_id') == $anggota->id)
        <option value="{{ $anggota->id }}" selected>{{ $anggota->name }}</option>
        @else
        <option value="{{ $anggota->id }}">{{ $anggota->name }}</option>


        @endif

        @endforeach

      </select>
    </div>
    <div class="mb-3">
      <label for="position" class="form-label">Alamat</label>
      <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position"
        required value="{{ old('position') }}">
      @error('position')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

</div>
@endsection