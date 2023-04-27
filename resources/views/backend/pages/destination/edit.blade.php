@extends('backend.layouts.app')
@section('onPage')
Master Web > <span style="color: #4e73df;">Edit Destinasi</span>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Data Destinasi</h6>
            </div>
            <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/admin/destination/update/'.$getDetailDestination->id)}}">
                @method('patch')
                @csrf
                <div class="form-group">
                    <label for="caption" class="ml-1">Keterangan :</label>
                    <input type="text" class="form-control  @error('caption') is-invalid @enderror" name="caption" placeholder="Keterangan..." value="{{old('caption', $getDetailDestination->name)}}" autocomplete="off">
                    @error('caption')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-row align-items-center">
                    <div class="col-3">
                        <center>
                            <img id="preview" src="{{asset('assets/upload/destination/'.$getDetailDestination->image)}}" style="width: 250px;">
                        </center>
                    </div>
                    <div class="col-9">
                        <div class="form-group">
                            <label for="image_destination" class="ml-1">Gambar Wisata* :</label>
                            <input type="file" id="images" class="form-control @error('image_destination') is-invalid @enderror" name="image_destination" placeholder="Gambar Wisata..." value="{{old('image_destination')}}" style="padding-bottom: 36px !important;" autocomplete="off">
                            @error('image_destination')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="ml-1">Status Gambar :</label>
                    <select class="custom-select" name="status">
                        <option value="tampilkan" @if(old('status', $getDetailDestination->status) == 'tampilkan') selected @endif>Tampilkan</option>
                        <option value="sembunyikan" @if(old('status', $getDetailDestination->status) == 'sembunyikan') selected @endif>Sembunyikan</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-icon-split mt-2 float-right" type="submit">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Perbarui Destinasi</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('extraJS')
<script>
    images.onchange = evt => {
        const [file] = images.files;
        if (file) {
            preview.src = URL.createObjectURL(file);
            fileName.innerHTML = document.getElementById("images").value.split("\\").pop();
        }
    }
</script>
@endsection