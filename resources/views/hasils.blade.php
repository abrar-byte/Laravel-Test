@extends('layouts.main')

@section('container')

<h1 class="mb-5">Hasil Acara Organisasi</h1>

@if ($hasils->count())

<div class="container">
  <div class="row">
    <div class="table-responsive col-lg-12">
      <table class="table  table-striped table-md">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Acara</th>
            {{-- <th scope="col">Resume</th> --}}
            <th scope="col">Anggota yang Hadir</th>
            <th scope="col">Kontribusi Anggota</th>
            {{-- <th scope="col">Hasil </th> --}}
            <th scope="col">Action </th>





          </tr>
        </thead>
        <tbody>
          @foreach ($hasils as $hasil)

          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $hasil->jadwal->name }}</td>
            {{-- <td>{{ $hasil->resume }}</td> --}}
            <td>
              @if ($hasil->anggota->count())

              @foreach($hasil->anggota as $h)
              <li> {{ $h->name }} </li>
              @endforeach
              @else
              <p class="text-danger">Tidak ada</p>
              @endif

            </td>
            <td>@if ($hasil->anggota->count())

              @foreach($hasil->anggota as $h)
              <li> {{ $h->pivot->contribution }} </li>
              @endforeach
              @else
              <p class="text-danger">Tidak ada</p>
              @endif
            </td>
            {{-- <td>{{ $hasil->result }}</td> --}}


            <td>
              <a href="/hasils/{{ $hasil->id }}" class="text-success  "><span data-feather="eye"></span>
              </a>
            </td>
          </tr>
          @endforeach

        </tbody>
      </table>
    </div>

  </div>
</div>
@else
<p class="text-center text-muted fs-4">Belum Ada Hasil Acara</p>
@endif




@endsection