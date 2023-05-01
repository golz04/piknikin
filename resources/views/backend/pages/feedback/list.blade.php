@extends('backend.layouts.app')
@section('extraCSS')
<link href="{{asset('assets/backend/dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('onPage')
Master Web > <span style="color: #4e73df;">Kritik & Saran</span>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Data Kritik & Saran</h6>
            </div>
            <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/admin/feedback/store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="full_name" class="ml-1">Nama Lengkap* :</label>
                            <input type="text" class="form-control  @error('full_name') is-invalid @enderror" name="full_name" placeholder="Nama Lengkap..." value="{{old('full_name')}}" autocomplete="off">
                            @error('full_name')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email" class="ml-1">Surel* :</label>
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Surel..." value="{{old('email')}}" autocomplete="off">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="feedback" class="ml-1">Kritik & Saran* :</label>
                            <input type="text" class="form-control  @error('feedback') is-invalid @enderror" name="feedback" placeholder="Kritik & Saran..." value="{{old('feedback')}}" autocomplete="off">
                            @error('feedback')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="message" class="ml-1">Pesan* :</label>
                            <input type="text" class="form-control  @error('message') is-invalid @enderror" name="message" placeholder="Pesan..." value="{{old('message')}}" autocomplete="off">
                            @error('message')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="status" class="ml-1">Status* :</label>
                    <select class="custom-select" name="status">
                        <option value="belum dilihat" @if(old('status') == 'belum dilihat') selected @endif>Belum Dilihat</option>
                        <option value="sudah dilihat" @if(old('status') == 'sudah dilihat') selected @endif>Sudah Dilihat</option>
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary btn-icon-split mt-2 float-right" type="submit">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Simpan Kritik & Saran</span>
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
                    <h6 class="m-0 font-weight-bold text-primary pt-2">List Data Kritik & Saran</h6>
                    @if ($getCountFeedback > 0)
                    <form action="{{url('/admin/feedback/update/all')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-info">
                            Tandai Semua Sudah Dilihat
                        </button>
                    </form>
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTableFeedback" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><center>No.</center></th>
                                <th><center>Nama</center></th>
                                <th><center>Surel</center></th>
                                <th><center>Kritik & Saran</center></th>
                                <th><center>Pesan</center></th>
                                <th><center>Status</center></th>
                                <th><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getFeedback as $item)
                            <tr>
                                <td class="align-middle"><center>{{$loop->iteration}}</center></td>
                                <td class="align-middle">{{$item->name}}</td>
                                <td class="align-middle">{{$item->email}}</td>
                                <td class="align-middle">{{$item->feedback}}</td>
                                <td class="align-middle">{{$item->message}}</td>
                                <td class="align-middle"><center><span class="badge @if ($item->status == 'sudah dilihat') bg-success @elseif ($item->status == 'belum dilihat') bg-secondary @endif p-2 text-white">{{$item->status}}</span></center></td>
                                <td class="align-middle"><center>
                                    @if ($item->status != 'sudah dilihat')
                                    <form action="{{url('/admin/feedback')}}/{{$item->id}}/update" method="POST" class="d-inline">
                                        @method('PATCH')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-info btn-circle">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </form> |
                                    @endif
                                    <form action="{{url('/admin/feedback')}}/{{$item->id}}/drop" method="POST" class="d-inline">
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
        $('#dataTableFeedback').DataTable();
    });
</script>
@endsection