@extends('layouts.main')

@section('home')
    <div class="row m-2">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">{{ $contact_us->nama }}</h3>
              <a href="{{url('/admin/pesan/pesan')}}" class=" text-decoration-none">
                <button type="button" rel="tooltip" class="badge btn-danger btn-link btn-icon btn-sm m-1 text-decoration-none">
                    <span class="bi bi-arrow-left"> Kembali</span>
                </button>
            </a>
            <form action="/admin/pesan/pesan/{{ $contact_us->id }}" method="post" class="d-inline">
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
                    {!! $contact_us->pesan !!}
                </article>
            </div>
          </div>
         </div>
       </div>
    </div>

@endsection