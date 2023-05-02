@extends('backend.layouts.app')
@section('extraCSS')
<link href="{{asset('assets/backend/dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('onPage')
Master Web > Rental > <span style="color: #4e73df;">List Rental Galeri</span>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Data Galeri Rental</h6>
            </div>
            <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/admin/rental/list-gallery-rental/store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="rental" class="ml-1">Judul Rental* :</label>
                            <select class="custom-select" name="rental">
                                @foreach ($getRental as $item)
                                <option value="{{$item->id}}" @if(old('rental') == $item->id) selected @endif>{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="caption" class="ml-1">Keterangan :</label>
                            <input type="text" class="form-control  @error('caption') is-invalid @enderror" name="caption" placeholder="Keterangan..." value="{{old('caption')}}" autocomplete="off">
                            @error('caption')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="image" class="ml-1">Gambar Lainnya* :</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" placeholder="Gambar Lainnya..." value="{{old('image')}}" style="padding-bottom: 36px !important;" autocomplete="off">
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

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="d-flex justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary pt-2">List Data Galeri Rental</h6>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTableRentalGallery" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><center>No.</center></th>
                                <th><center>Judul Rental</center></th>
                                <th><center>Gambar Lainnya</center></th>
                                <th><center>Keterangan</center></th>
                                <th><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getGalleryRental as $item)
                            <tr>
                                <td class="align-middle"><center>{{$loop->iteration}}</center></td>
                                <td class="align-middle">{{$item->title}}</td>
                                <td class="align-middle"><center><img src="{{asset('assets/upload/rental-gallery/'.$item->image)}}" style="width: 150px;"></center></td>
                                <td class="align-middle">{{$item->caption}}</td>
                                <td class="align-middle"><center>
                                    <form action="{{url('/admin/rental/list-gallery-rental')}}/{{$item->id}}/edit" method="GET" class="d-inline">
                                        <button type="submit" class="btn btn-sm btn-info btn-circle">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </form> |
                                    <form action="{{url('/admin/rental/list-gallery-rental')}}/{{$item->id}}/drop" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-danger btn-circle" onclick="return confirm('Hapus Data ?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </center></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
          </div>
    </div>
</div>
@endsection
@section('extraJS')
<script src="{{asset('assets/backend/dashboard/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/backend/dashboard/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#dataTableRentalGallery').DataTable();
    });
</script>
@endsection