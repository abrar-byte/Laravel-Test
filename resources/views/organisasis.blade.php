@extends('layouts.main')

@section('container')

<h1 class="mb-5">Organisasi</h1>


<div class="container">
  <div class="row">

    @foreach ($organisasis as $organisasi)
    <div class="col-md-4 mb-2">

      {{-- <div class="card bg-dark text-white"> --}}
        <a href="/anggotas?organisasi={{ $organisasi->slug }}" class="text-white">
          <div class="card mb-4" style="width: 18rem;">
            <h5 class="text-primary text-center">Logo Organisasi</h5>
            @if ($organisasi->logo)
            <img src="{{ asset('storage/' .$organisasi->logo) }}" width="200" height="200"
              class=" mx-auto rounded-circle" alt="{{ $organisasi->name }}">
            @else
            <img src="https://source.unsplash.com/200x200?soccer" alt="{{ $organisasi->name }}"
              class="mx-auto   img-thumbnail rounded-circle">
            @endif
            {{-- <div class="card-img-overlay d-flex align-items-center p-0">
              <h5 class="card-title text-center flex-fill p-4 fs-3" style="background-color:rgba(0, 0, 0, 0.7)">{{
                $organisasi->name }}</h5>

            </div> --}}


            <div class="card-body text-black">
              <div class="card-title">
                <h5>Nama Organisasi :</h5>
                <p>{{ $organisasi->name }}</p>
              </div>

              <div class="card-title">
                <h5>Tahun Berdiri</h5>
                <p>{{ $organisasi->year }}</p>
              </div>
              <div class="card-title">
                <h5>Alamat</h5>
                <p>{{ $organisasi->address }}</p>
              </div>
              <div class="card-title">
                <h5>Cabang Olahraga</h5>
                <p>{{ $organisasi->olahraga->name }}</p>
              </div>





            </div>
            {{--
          </div> --}}

      </div>
      </a>
    </div>
    @endforeach

  </div>
</div>



@endsection