@extends('layouts.main')

@section('home')

    <div class="row m-2">
      <div class="col-md-12">
      
        <div class="card">
          <div class="card-header mb-5">
            <h3 class="card-title">Form Edit Deskripsi</h3>
          </div>
            <form action="/admin/deskripsi/deskripsi/{{ $deskripsi->id }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="card-body">
                <div class="form-group row mb-4">
                    <label for="pre" class="col-sm-3 col-form-label">Judul</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" id="judul" value="{{ old('judul', $deskripsi->judul) }}"  placeholder="Judul" required autofocus>
                        @error('judul')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                        <div class="col-sm-7">
                            <input id="deskripsi" placeholder="Editor content goes here" value="{{ old('deskripsi',  $deskripsi->deskripsi) }}"  class="@error('deskripsi') is-invalid @enderror" type="hidden" name="deskripsi">
                            <trix-editor input="deskripsi"></trix-editor>
                            @error('deskripsi')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                </div>
        
              <button type="submit" class="btn btn-primary m-2" style=" float: right;">Simpan</button>
            
            </form>
            <a href="{{url('/admin/deskripsi/deskripsi')}}"> <button class="btn btn-warning btn-simple m-2" style=" float: left;">
                Kembali
              </button></a>
          </div>
        </div>
      </div>
    </div>
</div>

<script>
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })
</script>

@endsection

 