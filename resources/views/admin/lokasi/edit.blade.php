@extends('layouts.main')

@section('home')

    <div class="row m-2">
      <div class="col-md-12">
      
        <div class="card">
          <div class="card-header mb-5">
            <h3 class="card-title">Form Edit wilayah</h3>
          </div>
            <form action="/admin/lokasi/lokasi/{{ $wilayah->id }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
                <div class="card-body">
                    <div class="form-group row mb-4">
                        <label for="pre" class="col-sm-3 col-form-label">Wilayah</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control @error('wilayah') is-invalid @enderror" name="wilayah" id="wilayah" value="{{ old('wilayah',$wilayah->wilayah) }}"  placeholder="wilayah" required autofocus>
                            @error('wilayah')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    </div>
        
              <button type="submit" class="btn btn-primary m-2" style=" float: right;">Simpan</button>
            
            </form>
            <a href="{{url('/admin/lokasi/lokasi')}}"> <button class="btn btn-warning btn-simple m-2" style=" float: left;">
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

 