@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Match Results</h1>

</div>
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}

</div>

@endif
<div class="table-responsive col-lg-10">
  <a href="/dashboard/hasils/create" class="btn btn-primary mb-3">Tambahkan Hasil Acara</a>
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


        <td>
          <a href="/dashboard/hasils/{{ $hasil->id }}" class="badge bg-info "><span data-feather="eye"></span></a>
          <a href="/dashboard/hasils/{{$hasil->id }}/edit" class="badge bg-warning "><span
              data-feather="edit"></span></a>
          <form action="/dashboard/hasils/{{ $hasil->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                data-feather="x-circle"></span></button>
          </form>
          </a>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>



@endsection