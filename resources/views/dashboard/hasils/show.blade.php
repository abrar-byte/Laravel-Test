@extends('dashboard.layouts.main')

@section('container')
<div class="container">
  <div class="row my-3">

    <div class="col-lg-8 ">
      <a href="/dashboard/hasils" class="btn btn-success"><span data-feather="arrow-left"></span> Back to my
        hasils</a>

      <a href="/dashboard/hasils/{{ $hasil->id }}/edit" class="btn btn-warning"><span data-feather="edit"></span>
        Edit</a>

      <form action="/dashboard/hasils/{{ $hasil->id }}" method="post" class="d-inline">
        @method('delete')
        @csrf
        <button class="btn btn-danger " onclick="return confirm('Are you sure?')"><span
            data-feather="x-circle"></span>Delete</button>
      </form>

      <div class="row justify-content-center mb-5 mt-4">
        <div class="col-md-8">
          <p>Acara :</p>
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

          <p>Resume acara :</p>
          <article class="my-3 fs-5">
            {!! $hasil->resume !!}
          </article>
          <p>Hasil yang dicapai dari acara :</p>
          <h5>{{ $hasil->result }}</h5>

          <a href="/dashboard/hasils" class="d-block mt-3">Back </a>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection