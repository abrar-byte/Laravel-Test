@extends('layouts.main')

@section('container')


<div class="container">
  <div class="row justify-content-center mb-5">
    <div class="col-md-8">
      <p class="text-muted">Acara :</p>
      <h5 class="mb-3">{{ $hasil->jadwal->name }}</h5>
      <table class="table  table-striped table-md">
        <tr>
          <th>
            Anggota yang Hadir
          </th>
          <th>
            Kontribusi Anggota
          </th>
        </tr>
        <tr>
          <td>
            @foreach($hasil->anggota as $h)
            <li> {{ $h->name }} </li>
            @endforeach
          </td>
          <td>@foreach($hasil->anggota as $h)
            <li> {{ $h->pivot->contribution }} </li>
            @endforeach
          </td>
        </tr>
      </table>

      <p class="text-muted">Resume acara :</p>
      <article class="my-3 fs-5">
        {!! $hasil->resume !!}
      </article>
      <p class="text-muted">Hasil yang dicapai dari acara :</p>
      <article class="my-3 fs-5">

        {!! $hasil->result !!}
      </article>


      <a href="/hasils" class="d-block mt-3">Back </a>
    </div>
  </div>
</div>
@endsection