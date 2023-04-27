@extends('backend.layouts.app')
@section('extraCSS')
<link href="{{asset('assets/backend/dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('onPage')
Master Web > <span style="color: #4e73df;">Destinasi</span>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Data Destinasi</h6>
            </div>
            <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/admin/destination/store')}}">
                @csrf
                <div class="form-group">
                    <label for="caption" class="ml-1">Keterangan :</label>
                    <input type="text" class="form-control  @error('caption') is-invalid @enderror" name="caption" placeholder="Keterangan..." value="{{old('caption')}}" autocomplete="off">
                    @error('caption')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image_destination" class="ml-1">Gambar Wisata* :</label>
                    <input type="file" class="form-control @error('image_destination') is-invalid @enderror" name="image_destination" placeholder="Gambar Wisata..." value="{{old('image_destination')}}" style="padding-bottom: 36px !important;" autocomplete="off">
                    @error('image_destination')
                        <div class="invalid-feedback">
                     {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status" class="ml-1">Status Gambar :</label>
                    <select class="custom-select" name="status">
                        <option value="tampilkan" @if(old('status') == 'tampilkan') selected @endif>Tampilkan</option>
                        <option value="sembunyikan" @if(old('status') == 'sembunyikan') selected @endif>Sembunyikan</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-icon-split mt-2 float-right" type="submit">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Simpan Destinasi</span>
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
              <h6 class="m-0 font-weight-bold text-primary">List Data Destinasi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTableDestination" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><center>No.</center></th>
                                <th><center>Gambar Destinasi</center></th>
                                <th><center>Keterangan</center></th>
                                <th><center>Status</center></th>
                                <th><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getDestination as $item)
                            <tr>
                                <td class="align-middle"><center>{{$loop->iteration}}</center></td>
                                <td class="align-middle"><center><img src="{{asset('assets/upload/destination/'.$item->image)}}" style="width: 200px;"></center></td>
                                <td class="align-middle"><center>{{$item->name}}</center></td>
                                <td class="align-middle"><center>{{$item->status}}</center></td>
                                <td class="align-middle"><center>
                                    <form action="{{url('/admin/destination')}}/{{$item->id}}/edit" method="GET" class="d-inline">
                                        <button type="submit" class="btn btn-sm btn-info btn-circle">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </form> |
                                    <form action="{{url('/admin/destination')}}/{{$item->id}}/drop" method="POST" class="d-inline">
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
        $('#dataTableDestination').DataTable();
    });
</script>
@endsection