@extends('backend.layouts.app')
@section('onPage')
Master Web > Rental > <span style="color: #4e73df;">Edit Rental Galeri</span>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Data Galeri Rental</h6>
            </div>
            <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/admin/rental/list-gallery-rental/update/'.$getGalleryRentalDetail->id)}}">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rental" class="ml-1">Judul Rental* :</label>
                            <select class="custom-select" name="rental">
                                @foreach ($getRental as $item)
                                <option value="{{$item->id}}" @if(old('rental', $getGalleryRentalDetail->rental_id) == $item->id) selected @endif>{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="caption" class="ml-1">Keterangan :</label>
                            <input type="text" class="form-control  @error('caption') is-invalid @enderror" name="caption" placeholder="Keterangan..." value="{{old('caption', $getGalleryRentalDetail->caption)}}" autocomplete="off">
                            @error('caption')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row align-items-center">
                    <div class="col-3">
                        <center>
                            <img id="preview" src="{{asset('assets/upload/rental-gallery/'.$getGalleryRentalDetail->image)}}" style="width: 250px;">
                        </center>
                    </div>
                    <div class="col-9">
                        <div class="form-group">
                            <label for="image" class="ml-1">Gambar Lainnya* :</label>
                            <input type="file" id="images" class="form-control @error('image') is-invalid @enderror" name="image" placeholder="Gambar Lainnya..." value="{{old('image')}}" style="padding-bottom: 36px !important;" autocomplete="off">
                            @error('image')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-icon-split mt-2 float-right" type="submit">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Simpan Rental Galeri</span>
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