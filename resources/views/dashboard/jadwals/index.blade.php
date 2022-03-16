@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Schedules</h1>

</div>
@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}

</div>

@endif


<div class="table-responsive col-lg-10">
  <a href="/dashboard/jadwals/create" class="btn btn-primary mb-3">Tambahkan Jadwal</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Organisasi</th>
        <th scope="col">Nama Acara</th>
        <th scope="col">Deskripsi Acara</th>
        <th scope="col">Tanggal Acara</th>
        <th scope="col">Waktu Acara</th>
        <th scope="col">Tingkat Prioritas</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($jadwals as $jadwal)

      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $jadwal->organisasi->name }}</td>
        <td>{{ $jadwal->name }}</td>
        <td>{{ $jadwal->desc }}</td>
        <td>{{ $jadwal->date }}</td>
        <td>{{ $jadwal->time }}</td>
        <td>{{ $jadwal->priority }}</td>
        <td>
          <a href="/dashboard/jadwals/{{ $jadwal->id }}/edit" class="badge bg-warning "><span
              data-feather="edit"></span></a>
          <form action="/dashboard/jadwals/{{ $jadwal->id }}" method="post" class="d-inline">
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
</div>


@endsection