@extends('layouts.main')

@section('container')

<h1 class="mb-5">Jadwal Acara Organisasi</h1>

@if ($jadwals->count())

<div class="container">
  <div class="row">
    <div class="table-responsive col-lg-12">
      <table class="table table-striped table-md">
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
              <a href="/hasils?jadwal={{ $jadwal->id }}">Lihat Hasil Acara
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
<p class="text-center text-muted fs-4">Belum ada Jadwal Acara Organisasi</p>
@endif




@endsection