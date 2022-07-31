@extends('layouts.main')

@section('home')
    <div class="row m-2">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Tambah Lokasi</h3>

            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                                                
            @endif 
          </div>
          <div class="card-body all-icons">
            <div class="row">
              <table class="table ">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">id</th>
                        <th class="text-center">Wilayah</th>
                        <th class="text-right" style="text-align-last: center;">Actions</th>
                    </tr>
                </thead>
                <tbody>                     
                @foreach($lokasis as $lokasi)                       
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $lokasi->id }}</td>
                        <td class="text-center">{{ $lokasi->wilayah }}</td>
                        <td class="td-actions text-right" style="text-align-last: center;">
                            <a href="/admin/lokasi/lokasi/{{ $lokasi->id }}/edit"><button type="button" rel="tooltip" class="badge btn-danger btn-link btn-icon btn-sm m-2">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            </button>

                            <form action="/admin/lokasi/lokasi/{{ $lokasi->id }}" method="post" class="d-inline">
                            @method('delete')
                            @csrf
                                <button  rel="tooltip" onclick="return confirm('apakah kamu yakin??')" class="badge btn-danger btn-link btn-icon btn-sm border-0">
                                    <i class="bi bi-file-x"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
              </table>
              <div class="d-flex justify-content-end">
                {{ $lokasis->links() }}
              </div>
            </div>
          </div>
          <a href="{{url('/admin/lokasi/lokasi/create')}}"><button class="btn btn-primary btn-simple m-3" style="float: right;">
            Tambah Lokasi
          </button></a>
        </div>
      </div>
    </div>

@endsection