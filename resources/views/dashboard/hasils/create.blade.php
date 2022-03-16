@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Tambahkan Hasil Acara</h1>



</div>
<div class="col-lg-8">


  <form method="post" action="/dashboard/hasils" class="mb-5">
    @csrf
    <div class="mb-3">
      <label for="jadwal" class="form-label">Nama Acara </label>
      <select class="form-select" name="jadwal_id">
        @foreach ($jadwals as $jadwal)
        @if (old('jadwal_id') == $jadwal->id)
        <option value="{{ $jadwal->id }}" selected>{{ $jadwal->name }} dari Organisasi {{ $jadwal->organisasi->name }}
        </option>
        @else
        <option value="{{ $jadwal->id }}">{{ $jadwal->name }} dari Organisasi {{ $jadwal->organisasi->name }}</option>


        @endif


        @endforeach

      </select>

    </div>


    <div class="mb-3">
      <div class="mb-3">
        <label for="resume" class="form-label">Resume Acara</label>
        @error('resume')

        <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="resume" type="hidden" name="resume" value="{{ old('resume') }}">
        <trix-editor input="resume"></trix-editor>

      </div>


      <div class="mb-3">
        <label for="result" class="form-label">Hasil yang dicapai</label>
        @error('result')

        <p class="text-danger">{{ $message }}</p>
        @enderror
        <input id="result" type="hidden" name="result" value="{{ old('result') }}">
        <trix-editor input="result"></trix-editor>

      </div>




      <button type="submit" class="btn btn-primary">Tambahkan Hasil Acara</button>
  </form>

</div>

<script>
  {{--  menon aktifkan  trix editor upload--}}
  document.addEventListener('trix-file-accept', function(e){
    e.preventDefault();
  })

 


</script>




@endsection