@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Edit Schedule</h1>

</div>
<div class="col-lg-8">


  <form method="post" action="/dashboard/jadwals/{{ $jadwal->id }}" class="mb-5">
    @csrf
    @method('put')

    <div class="mb-3">
      <label for="organisasi_id" class="form-label">Home Team</label>
      <select class="form-select" name="organisasi_id">
        @foreach ($organisasis as $organisasi)
        @if (old('organisasi_id',$jadwal->organisasi_id) == $organisasi->id)
        <option value="{{ $organisasi->id }}" selected>{{ $organisasi->name }}</option>
        @else
        <option value="{{ $organisasi->id }}">{{ $organisasi->name }}</option>


        @endif

        @endforeach

      </select>
    </div>
    <div class="mb-3">
      <label for="name" class="form-label">Nama Acara</label>
      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name',$jadwal->name) }}">
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror

    </div>


    <div class="mb-3">
      <label for="desc" class="form-label">Deskripsi</label>
      <input type="text" class="form-control @error('desc') is-invalid @enderror" id="desc" name="desc"
        value="{{ old('desc',$jadwal->desc) }}">
      @error('desc')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror

    </div>




    <div class="mb-3">
      <label for="date" class="form-label">date</label>
      <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date"
        value="{{ old('date',$jadwal->date) }}">
      @error('date')
      <div class="invalid-feedback">
        {{ $message }}
      </div>

      @enderror

    </div>

    <div class="mb-3">
      <label for="time" class="form-label">time</label>
      <input type="time" class="form-control @error('time') is-invalid @enderror" id="time" name="time"
        value="{{ old('time',$jadwal->time) }}">
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
        @if (old('priority',$jadwal->priority) == $a)
        <option value="{{ $a }}" selected>{{ $a }}</option>
        @else
        <option value="{{ $a }}">{{ $a}}</option>


        @endif

        @endforeach

      </select>
    </div>



    <button type="submit" class="btn btn-primary">Add Player</button>
  </form>

</div>





@endsection