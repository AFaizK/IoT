@extends('layouts.adminMain')

@section('container')
    <div class="row m-2">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{ $deskripsi->judul }}</h3>
              <a href="{{url('/admin/deskripsi')}}" class=" text-decoration-none">
                <button type="button" rel="tooltip" class="badge btn-danger btn-link btn-icon btn-sm m-1 text-decoration-none">
                    <span class="bi bi-arrow-left"> Kembali</span>
                </button>
            </a>
            <a href="">
                <button type="button" rel="tooltip" class="badge btn-danger btn-link btn-icon btn-sm m-1 text-decoration-none">
                    <span class="bi bi-pencil-square"> Edit</span>
                </button>
            </a>
            <form action="/admin/deskripsi/{{ $deskripsi->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
                <button onclick="return confirm('apakah kamu yakin??')" class="btn btn-danger btn-link btn-icon btn-sm border-0  text-decoration-none">
                    <span class="bi bi-file-x" style="color: white;"> Delete</span>
                </button>
            </form>
          </div>
          <div class="card-body all-icons">
            <div class="row">
                <article class="justify">
                    {!! $deskripsi->deskripsi !!}
                </article>
            </div>
          </div>
         </div>
       </div>
    </div>

@endsection