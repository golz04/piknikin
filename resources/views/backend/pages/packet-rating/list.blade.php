@extends('backend.layouts.app')
@section('extraCSS')
<link href="{{asset('assets/backend/dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('onPage')
Master Web > Paket > <span style="color: #4e73df;">List Paket Rating</span>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Data Rating Paket</h6>
            </div>
            <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/admin/packet/list-rating-packet/store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="packet" class="ml-1">Judul Paket* :</label>
                            <select class="custom-select" name="packet">
                                @foreach ($getPacket as $item)
                                <option value="{{$item->id}}" @if(old('packet') == $item->id) selected @endif>{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
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
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="accomodation" class="ml-1">Rating Akomodasi* :</label>
                            <input type="number" class="form-control  @error('accomodation') is-invalid @enderror" name="accomodation" placeholder="Rating Akomodasi..." value="{{old('accomodation')}}" autocomplete="off">
                            @error('accomodation')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="meal" class="ml-1">Rating Makanan* :</label>
                            <input type="number" class="form-control  @error('meal') is-invalid @enderror" name="meal" placeholder="Rating Makanan..." value="{{old('meal')}}" autocomplete="off">
                            @error('meal')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="destination" class="ml-1">Rating Destinasi* :</label>
                            <input type="number" class="form-control  @error('destination') is-invalid @enderror" name="destination" placeholder="Rating Destinasi..." value="{{old('destination')}}" autocomplete="off">
                            @error('destination')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="transport" class="ml-1">Rating Kendaraan* :</label>
                            <input type="number" class="form-control  @error('transport') is-invalid @enderror" name="transport" placeholder="Rating Kendaraan..." value="{{old('transport')}}" autocomplete="off">
                            @error('transport')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="value_for_money" class="ml-1">Rating Biaya* :</label>
                            <input type="number" class="form-control  @error('value_for_money') is-invalid @enderror" name="value_for_money" placeholder="Rating Biaya..." value="{{old('value_for_money')}}" autocomplete="off">
                            @error('value_for_money')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="overall" class="ml-1">Rating Keseluruhan* :</label>
                            <input type="number" class="form-control  @error('overall') is-invalid @enderror" name="overall" placeholder="Rating Keseluruhan..." value="{{old('overall')}}" autocomplete="off">
                            @error('overall')
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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="status" class="ml-1">Status* :</label>
                            <select class="custom-select" name="status">
                                <option value="sudah dibaca" @if(old('status') == 'sudah dibaca') selected @endif>Sudah Dibaca</option>
                                <option value="belum dibaca" @if(old('status') == 'belum dibaca') selected @endif>Belum Dibaca</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-icon-split mt-2 float-right" type="submit">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Simpan Rating Galeri</span>
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
                    <h6 class="m-0 font-weight-bold text-primary pt-2">List Data Komentar Artikel</h6>
                    @if ($getCountRatingPacket > 0)
                    <form action="{{url('/admin/packet/list-rating-packet/update/all')}}" method="POST">
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
                    <table class="table table-bordered thisDisplay" id="dataTableRatingPacket" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><center>No.</center></th>
                                <th><center>Judul Paket</center></th>
                                <th><center>Nama</center></th>
                                <th><center>Surel</center></th>
                                <th><center>Akomodasi</center></th>
                                <th><center>Makanan</center></th>
                                <th><center>Destinasi</center></th>
                                <th><center>Kendaraan</center></th>
                                <th><center>Biaya</center></th>
                                <th><center>Keseluruhan</center></th>
                                <th><center>Status</center></th>
                                <th style="width: 100px;"><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getRatingPacket as $item)
                            <tr>
                                <td class="align-middle"><center>{{$loop->iteration}}</center></td>
                                <td class="align-middle">{{$item->title}}</td>
                                <td class="align-middle">{{$item->name}}</td>
                                <td class="align-middle">{{$item->email}}</td>
                                <td class="align-middle"><center>⭐{{$item->accomodation}}</center></td>
                                <td class="align-middle"><center>⭐{{$item->meal}}</center></td>
                                <td class="align-middle"><center>⭐{{$item->destination}}</center></td>
                                <td class="align-middle"><center>⭐{{$item->transport}}</center></td>
                                <td class="align-middle"><center>⭐{{$item->value_for_money}}</center></td>
                                <td class="align-middle"><center>⭐{{$item->overall}}</center></td>
                                <td class="align-middle"><center><span class="badge @if ($item->status == 'sudah dibaca') bg-success @elseif ($item->status == 'belum dibaca') bg-secondary @endif p-2 text-white">{{$item->status}}</span></center></td>
                                <td class="align-middle"><center>
                                    @if ($item->status != 'sudah dibaca')
                                    <form action="{{url('/admin/packet/list-rating-packet')}}/{{$item->id}}/update" method="POST" class="d-inline">
                                        @method('PATCH')
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-info btn-circle">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </form> |
                                    @endif
                                    <form action="{{url('/admin/packet/list-rating-packet')}}/{{$item->id}}/drop" method="POST" class="d-inline">
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
        $('#dataTableRatingPacket').DataTable();
    });
</script>
@endsection