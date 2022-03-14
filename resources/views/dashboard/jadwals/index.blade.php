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


<div class="table-responsive col-lg-8">
  <a href="/dashboard/schedules/create" class="btn btn-primary mb-3">Create New Schedule</a>
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tim Tuan Rumah</th>
        <th scope="col">Tim Tandang</th>
        <th scope="col">Date</th>
        <th scope="col">Time</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($schedules as $schedule)

      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $schedule->homeTeam->name }}</td>
        <td>{{ $schedule->awayTeam->name }}</td>
        <td>{{ $schedule->tanggal }}</td>
        <td>{{ $schedule->waktu }}</td>

        <td>

          <a href="/dashboard/schedules/{{ $schedule->id }}/edit" class="badge bg-warning "><span
              data-feather="edit"></span></a>
          <form action="/dashboard/schedules/{{ $schedule->id }}" method="post" class="d-inline">
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