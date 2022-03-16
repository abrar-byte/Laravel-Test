@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Hasil Acara</h1>

</div>
<div class="col-lg-8">
  {{-- @dd($coba) --}}
  <form method="post" action="/dashboard/hasils/{{ $hasil->id }}" class="mb-5">
    @csrf
    @method('put')

    <div class="mb-3">
      <label for="jadwal" class="form-label" Nama Acara </label>
        <select class="form-select" name="jadwal_id">
          @foreach ($jadwals as $jadwal)
          @if (old('jadwal_id',$jadwal->id) == $jadwal->id)
          <option value="{{ $jadwal->id }}" selected>{{ $jadwal->name }} dari Organisasi {{ $jadwal->organisasi->name }}
          </option>
          @else
          <option value="{{ $jadwal->id }}">{{ $jadwal->name }} from {{ $jadwal->organisasi->name }}</option>
          @endif
          @endforeach
        </select>
    </div>

    <div class="mb-3">
      <label for="resume" class="form-label">Resume Acara</label>
      @error('resume')

      <p class="text-danger">{{ $message }}</p>
      @enderror
      <input id="resume" type="hidden" required name="resume" value="{{ old('resume',$hasil->resume) }}">
      <trix-editor input="resume"></trix-editor>

    </div>


    <div class="mb-3">
      <label for="result" class="form-label">Hasil yang dicapai</label>
      @error('result')

      <p class="text-danger">{{ $message }}</p>
      @enderror
      <input id="result" type="hidden" required name="result" value="{{ old('result',$hasil->result) }}">
      <trix-editor input="result"></trix-editor>

    </div>

    <div class="mt-5">
      <h5>Tambahkan Anggota Hadir dan Kontribusinya</h5>

      <div class="mb-3">
        <label for="contribution" class="form-label">Kontribusi Anggota</label>
        <input type="text" class="form-control @error('contribution') is-invalid @enderror" id="contribution" required
          name="contribution" value=" {{ old('contribution') }}">
        @error('contribution')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>

      <div class="mb-3">
        <label for="anggota" class="form-label">Anggota yang Hadir </label>
        <p class="text-muted">Masukkan sesuai acara organisasinya!</p>
        <select class="form-select" name="anggota_id">
          @foreach ($anggotas as $anggota)
          @if (old('anggota_id',$anggota->id) == $anggota->id)
          <option value="{{ $anggota->id }}" selected>{{ $anggota->name }} </option>
          @else
          <option value="{{ $anggota->id }}">{{ $anggota->name }} </option>
          @endif
          @endforeach
        </select>
      </div>
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