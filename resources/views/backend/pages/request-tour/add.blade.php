@extends('backend.layouts.app')
@section('onPage')
Master Web > Request Tour > <span style="color: #4e73df;">Tambah Data</span>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Data Request Tour</h6>
            </div>
            <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/admin/request-tour/store')}}">
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
                            <label for="email" class="ml-1">Email* :</label>
                            <input type="email" class="form-control  @error('email') is-invalid @enderror" name="email" placeholder="Email..." value="{{old('email')}}" autocomplete="off">
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
                            <label for="date_departure" class="ml-1">Tanggal Pemberangkatan* :</label>
                            <input type="date" class="form-control  @error('date_departure') is-invalid @enderror" name="date_departure" placeholder="Tanggal Pemberangkatan..." value="{{old('date_departure')}}" autocomplete="off">
                            @error('date_departure')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phone_number" class="ml-1">Nomor Telepon* :</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" placeholder="Nomor Telepon..." value="{{old('phone_number')}}" autocomplete="off">
                            @error('phone_number')
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
                            <label for="destination" class="ml-1">Destinasi* :</label>
                            <div class="row">
                                @foreach ($getDestination as $item)
                                <div class="col-md-3">
                                    <input type="checkbox" name="destination[]" value="{{$item->name}}">
                                    <span style="font-size: 11pt;">
                                        {{$item->name}}
                                    </span>
                                </div>
                                @endforeach
                                <div class="col-md-3">
                                    <input type="checkbox" name="destination[]" value="Lainnya">
                                    <span style="font-size: 11pt;">
                                        Lainnya
                                    </span>
                                </div>
                            </div>
                            @error('destination')
                                <p style="color: #e74a3b; font-size: 80%; padding-left: 5px;">Minimal Pilih 1 Destinasi.</p>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="long_vacation" class="ml-1">Lama Berlibur* :</label>
                            <input type="text" class="form-control  @error('long_vacation') is-invalid @enderror" name="long_vacation" placeholder="Lama Belibur..." value="{{old('long_vacation')}}" autocomplete="off">
                            @error('long_vacation')
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
                            <label for="lodge" class="ml-1">Penginapan* :</label>
                            <input type="text" class="form-control  @error('lodge') is-invalid @enderror" name="lodge" placeholder="Penginapan..." value="{{old('lodge')}}" autocomplete="off">
                            @error('lodge')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="qty_participant" class="ml-1">Jumlah Peserta* :</label>
                            <input type="number" class="form-control  @error('qty_participant') is-invalid @enderror" name="qty_participant" placeholder="Jumlah Peserta..." value="{{old('qty_participant')}}" autocomplete="off">
                            @error('qty_participant')
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
                            <label for="from" class="ml-1">Kota Asal* :</label>
                            <input type="text" class="form-control  @error('from') is-invalid @enderror" name="from" placeholder="Kota Asal..." value="{{old('from')}}" autocomplete="off">
                            @error('from')
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
                    <label for="status" class="ml-1">Status Request Tour :</label>
                    <select class="custom-select" name="status">
                        <option value="menunggu" @if(old('status') == 'menunggu') selected @endif>Menunggu</option>
                        <option value="diterima" @if(old('status') == 'diterima') selected @endif>Diterima</option>
                        <option value="ditolak" @if(old('status') == 'ditolak') selected @endif>Ditolak</option>
                        <option value="selesai" @if(old('status') == 'selesai') selected @endif>Selesai</option>
                    </select>
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-icon-split mt-2 float-right" type="submit">
                        <span class="icon text-white-50">
                            <i class="fas fa-save"></i>
                        </span>
                        <span class="text">Simpan Request Tour</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection