@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Organisasi</h1>

</div>
@if (session()->has('success'))
<div class="alert alert-success col-lg-6" role="alert">
  {{ session('success') }}

</div>

@endif

<h2>Berhasil</h2>

<div class="table-responsive col-lg-6">
  <a href="/dashboard/pivotAnggota/create" class="btn btn-primary mb-3">Tambahkan Organisasi Baru</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Organisasi</th>
        <th scope="col">Cabang Olahraga</th>

        <th scope="col">Action</th>
      </tr>
    </thead>
    {{-- <tbody>
      @foreach ($pivots as $pivot)

      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $pivot->organisasi_id }}</td>
        <td>{{ $pivot->anggota_id }}</td>

        <td>
          <a href="/dashboard/organisasis/{{ $pivot->id }}" class="badge bg-info "><span data-feather="eye"></span></a>
          <a href="/dashboard/organisasis/{{ $pivot->id }}/edit" class="badge bg-warning "><span
              data-feather="edit"></span></a>
          <form action="/dashboard/organisasis/{{ $pivot->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')"><span
                data-feather="x-circle"></span></button>
          </form>
        </td>
      </tr>
      @endforeach

    </tbody> --}}
  </table>
</div>


@endsection