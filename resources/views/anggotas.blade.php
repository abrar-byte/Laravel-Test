@extends('layouts.main')

@section('container')

<h1 class="text-center mb-3">{{ $title }}</h1>
<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="/anggotas">
      @if (request('organisasi'))
      <input type="hidden" name="organisasi" value="{{ request('organisasi') }}">

      @endif


      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search..." name="search" value={{ request('search') }}>
        <button class="btn btn-danger" type="submit">Search</button>
      </div>

    </form>
  </div>
</div>

@if ($anggotas->count())



<div class="container">
  <div class="row">
    @foreach ($anggotas as $anggota)

    <div class="col-md-4 mb-3">
      <div class="card" style="width: 18rem;">
        <div class="px-3 py-2 text-white" style="background-color : rgba(0,0,0,0.7)"><a
            href="/players?team={{ $anggota->organisasi->slug }}" class="text-decoration-none text-white">{{
            $anggota->organisasi->name }}</a></div>


        <div class="card-body">
          <div class="card-title">
            <h5>Nama Anggota Organisasi :</h5>
            <p>{{ $anggota->name }}</p>
          </div>
          <div class="card-title">
            <h5>Organisasi</h5>
            <p>{{ $anggota->organisasi->name }}</p>
          </div>
          <div class="card-title">
            <h5>Tinggi Badan</h5>
            <p>{{ $anggota->height }}cm</p>
          </div>
          <div class="card-title">
            <h5>Berat Badan</h5>
            <p>{{ $anggota->weight }}kg</p>
          </div>
          <div class="card-title">
            <h5>Posisi Anggota</h5>
            <p>{{ $anggota->position }}</p>
          </div>
          <div class="card-title">
            <h5>Nomor Ponsel</h5>
            <p>{{ $anggota->number }}</p>
          </div>





        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
@else
<p class="text-center fs-4">No player found</p>
@endif



<div class="d-flex justify-content-end">

  {{ $anggotas->links() }}
</div>


@endsection