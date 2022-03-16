@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">Cabang Olahraga</h1>

</div>
@if (session()->has('success'))
<div class="alert alert-success col-lg-6" role="alert">
  {{ session('success') }}

</div>

@endif


<div class="table-responsive col-lg-6">
  <a href="/dashboard/olahragas/create" class="btn btn-primary mb-3">Tambahkan Cabang Olahraga Baru</a>
  @if ($olahragas->count())

  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Cabang Olahraga</th>

        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($olahragas as $olahraga)

      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $olahraga->name }}</td>

        <td>

          <a href="/dashboard/olahragas/{{ $olahraga->slug }}/edit" class="badge bg-warning "><span
              data-feather="edit"></span></a>
          <form action="/dashboard/olahragas/{{ $olahraga->id }}" method="post" class="d-inline">
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
  <p class="text-center text-muted fs-4">Belum Ada Cabang Olahraga</p>
  @endif
</div>


@endsection