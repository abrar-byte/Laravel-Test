@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Anggota</h1>

</div>
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}

</div>

@endif


<div class="table-responsive col-lg-8">
  <a href="/dashboard/anggotas/create" class="btn btn-primary mb-3">Tambahkan Anggota</a>
  @if ($anggotas->count())

  <div class="mt-3">
    <p class="text-muted">Tambahkan Organisasi yang diikuti dan posisi anggotanya dengan klik icon pensil berwarna
      kuning</p>
  </div>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama </th>
        <th scope="col">Organisasi</th>
        <th scope="col">Tinggi Badan</th>
        <th scope="col">Berat Badan</th>
        <th scope="col">Posisi</th>
        <th scope="col">Nomer Ponsel</th>




        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($anggotas as $anggota)

      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $anggota->name }}</td>
        <td> @if ($anggota->organisasi->count())
          @foreach($anggota->organisasi as $key => $h)
          <li> {{ $h->name }} </li>
          @endforeach
          @else
          <p class="text-danger">Tidak ada</p>
          @endif
        </td>
        <td>{{ $anggota->height }}cm</td>
        <td>{{ $anggota->weight }}kg</td>
        <td> @if ($anggota->organisasi->count())
          @foreach($anggota->organisasi as $key => $h)
          <li> {{ $h->pivot->position }} </li>
          @endforeach
          @else
          <p class="text-danger">Tidak ada</p>
          @endif
        </td>
        <td>{{ $anggota->number }}</td>
        <td>

          <a href="/dashboard/anggotas/{{ $anggota->slug }}/edit" class="badge bg-warning "><span
              data-feather="edit"></span></a>

          <form action="/dashboard/anggotas/{{ $anggota->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                data-feather="x-circle"></span></button>
          </form>
        </td>
      </tr>
      @endforeach

    </tbody>
  </table>
  @else
  <p class="text-center text-muted fs-4">Belum Ada Anggota</p>
  @endif
</div>


@endsection