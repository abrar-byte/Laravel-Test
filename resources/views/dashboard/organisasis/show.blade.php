@extends('dashboard.layouts.main')

@section('container')
<div class="container">
  <div class="row my-3">

    <div class="col-lg-8">
      <h1 class="mb-3">{{ $organisasi->name }}</h1>
      <a href="/dashboard/organisasis" class="btn btn-success"><span data-feather="arrow-left"></span> Back to my
        organisasis</a>

      <a href="/dashboard/organisasis/{{ $organisasi->slug }}/edit" class="btn btn-warning"><span
          data-feather="edit"></span>
        Edit</a>

      <form action="/dashboard/organisasis/{{ $organisasi->id }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger " onclick="return confirm('Are you sure?')"><span
            data-feather="x-circle"></span>Delete</button>
      </form>

      <div class="col-md-4 mb-2">
        <div class="card mb-4 mt-4" style="width: 18rem;">
          <h5 class="text-primary text-center">Logo Organisasi</h5>
          @if ($organisasi->logo)
          <img src="{{ asset('storage/' .$organisasi->logo) }}" width="200" height="200" class=" mx-auto rounded-circle"
            alt="{{ $organisasi->name }}">
          @else
          <img src="https://source.unsplash.com/200x200?soccer" alt="{{ $organisasi->name }}"
            class="mx-auto   img-thumbnail rounded-circle">
          @endif
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
              <p>{{ $organisasi->sport }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection