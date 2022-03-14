{{-- @extends('layouts.main')

@section('container')

<h1 class="mb-5">Hasil Acara Organisasi</h1>


<div class="container">
  <div class="row">
    <div class="table-responsive col-lg-12">
      <table class="table table-success table-striped table-md">
        <thead>
          <tr>
            <th scope="col">Acara</th>
            <th scope="col">Resume</th>
            <th scope="col">Anggota yang Hadir</th>
            <th scope="col">Kontribusi Anggota</th>
            <th scope="col">Hasil </th>




          </tr>
        </thead>
        <tbody>

          <tr>
            <td>{{ $hasil->jadwal->name }}</td>
            <td>{{ $hasil->resume }}</td>
            <td>{{ $hasil->persons }}</td>
            <td>{{ $hasil->contribution }}</td>
            <td>{{ $hasil->result }}</td>



          </tr>

        </tbody>
      </table>
    </div>

  </div>
</div>



@endsection --}}

@extends('layouts.main')

@section('container')


<div class="container">
  <div class="row justify-content-center mb-5">
    <div class="col-md-8">
      <h1 class="mb-3">{{ $hasil->jadwal->name }}</h1>
      {{-- <p>By. <a href="/blog?authors={{ $hasil->author->username }}" class="text-decoration-none">{{
          $hasil->author->name
          }}
        </a> in<a href="/blog?category={{ $hasil->category->slug }}" class="text-decoration-none">
          {{ $hasil->category->name }}</a></p> --}}

      {{-- @if ($hasil->image)
      <div style="max-height: 350px; overflow:hidden">
        <img src="{{ asset('storage/' .$hasil->image) }}" class="img-fluid " alt="{{ $hasil->category->name }}">
      </div>
      @else
      <img src="https://source.unsplash.com/1200x400?{{ $hasil->category->name }}" class="img-fluid "
        alt="{{ $hasil->category->name }}">
      @endif --}}

      <article class="my-3 fs-5">
        {!! $hasil->resume !!}
      </article>
      <h3>{{ $hasil->persons }}</h3>
      <h3>{{ $hasil->contribution }}</h3>
      <h3>{{ $hasil->result }}</h3>

      <a href="/blog" class="d-block mt-3">Back to Blog</a>
    </div>
  </div>
</div>
@endsection