@extends('backend.layouts.app')
@section('onPage')
Akun > Request Tour > <span style="color: #4e73df;">Detail Request Tour</span>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Detail Request Tour ({{$getDetailRequestTour->name}})</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            <tr>
                                <th class="w-25">Nama Lengkap</th>
                                <td>{{$getDetailRequestTour->name}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Email</th>
                                <td>{{$getDetailRequestTour->email}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Tanggal Pemberangkatan</th>
                                <td>{{$getDetailRequestTour->date_departure}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Nomor Telepon</th>
                                <td>{{$getDetailRequestTour->phone_number}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Destinasi</th>
                                <td>{{$getDetailRequestTour->destination}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Lama Berlibur</th>
                                <td>{{$getDetailRequestTour->long_vacation}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Penginapan</th>
                                <td>{{$getDetailRequestTour->lodge}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Total Peserta</th>
                                <td>{{$getDetailRequestTour->qty_participant}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Berangkat Dari</th>
                                <td>{{$getDetailRequestTour->from}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Pesan</th>
                                <td>{{$getDetailRequestTour->message}}</td>
                            </tr>
                            <tr>
                                <th class="w-25">Status</th>
                                <td><span class="badge @if ($getDetailRequestTour->status == 'selesai') bg-primary @elseif ($getDetailRequestTour->status == 'diterima') bg-success @elseif ($getDetailRequestTour->status == 'ditolak') bg-danger @elseif ($getDetailRequestTour->status == 'menunggu') bg-warning @endif p-2 text-white">{{$getDetailRequestTour->status}}</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                @if ($getDetailRequestTour->status != 'selesai')
                <div class="row">
                    <div class="col-md-12">
                        <form class="card-body" method="POST" action="{{url('/admin/request-tour/update/'.$getDetailRequestTour->id)}}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="status" class="ml-1">Status Request Tour :</label>
                                <select class="custom-select" name="status">
                                    <option value="menunggu" @if(old('status', $getDetailRequestTour->status) == 'menunggu') selected @endif>Menunggu</option>
                                    <option value="diterima" @if(old('status', $getDetailRequestTour->status) == 'diterima') selected @endif>Diterima</option>
                                    <option value="ditolak" @if(old('status', $getDetailRequestTour->status) == 'ditolak') selected @endif>Ditolak</option>
                                    <option value="selesai" @if(old('status', $getDetailRequestTour->status) == 'selesai') selected @endif>Selesai</option>
                                </select>
                            </div>
            
                            <div class="form-group">
                                <button class="btn btn-primary btn-icon-split mt-2 float-right" type="submit">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-save"></i>
                                    </span>
                                    <span class="text">Perbarui Request Tour</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection