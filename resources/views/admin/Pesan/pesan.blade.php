@extends('layouts.adminMain')

@section('container')
    <div class="row m-2">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Pesan Masuk</h3>

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
                        <th>Nama</th>
                        <th>email</th>
                        <th>Pesan</th>
                        <th class="text-right" style="text-align-last: center;">Actions</th>
                    </tr>
                </thead>
                <tbody>  
                    {{-- @php $no = 1; @endphp                    --}}
                @foreach($contact_us as $contact)                       
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $contact->nama }}</td>
                        <td>{{ $contact->email }}</td>
                        <td class="">{{ $contact->pesan }}</td>
                        <td class="td-actions text-right" style="text-align-last: center;">
                            <a href="/admin/deskripsi/{{ $contact->id }}"><button type="button" rel="tooltip" class="badge btn-danger btn-link btn-icon btn-sm m-2">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="/admin/deskripsi/{{ $contact->id }}/edit"><button type="button" rel="tooltip" class="badge btn-danger btn-link btn-icon btn-sm m-2">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            </button>

                            <form action="/admin/deskripsi/{{ $contact->id }}" method="post" class="d-inline">
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
                {{ $contact_us->links() }}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

@endsection