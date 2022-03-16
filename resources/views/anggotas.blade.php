@extends('layouts.main')

@section('container')

<h1 class="text-center mb-3">{{ $title }}</h1>
<div class="row justify-content-center mb-3">
  <div class="col-md-6">
    <form action="/anggotas">
      @if (request('organisasi'))
      <input type="hidden" name="organisasi" value="{{ request('organisasi') }}">

      @endif


      <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search..." name="search" value={{ request('search') }}>
        <button class="btn btn-danger" type="submit">Search</button>
      </div>

    </form>
  </div>
</div>

@if ($anggotas->count())



<div class="container">
  <div class="row mb-5">
    <div class="card ">
      <div class="card-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Anggota</th>
              <th>Organisasi</th>
              <th>Posisi Anggota</th>
              <th>Nomor Ponsel</th>
            </tr>
          </thead>
          <tbody>



            @foreach($anggotas as $key =>$anggota)

            <tr>
              <td>{{ $key + 1 }}</td>
              <td>{{ $anggota->name }}</td>
              <td>
                <ul>
                  @if ($anggota->organisasi->count())
                  @foreach($anggota->organisasi as $key => $h)
                  <li> {{ $h->name }} </li>
                  @endforeach
                  @else
                  <p class="text-danger">Tidak ada</p>
                  @endif
                </ul>
              </td>
              <td>
                <ul>
                  @if ($anggota->organisasi->count())
                  @foreach($anggota->organisasi as $key => $h)
                  <li> {{ $h->pivot->position }} </li>
                  @endforeach
                  @else
                  <p class="text-danger">Tidak ada</p>
                  @endif
                </ul>
              </td>
              <td>
                {{ $anggota->number }}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>


  </div>
</div>
@else
<p class="text-center text-muted fs-4">Tidak ada Anggota</p>
@endif



<div class="d-flex justify-content-end">

  {{ $anggotas->links() }}
</div>


@endsection