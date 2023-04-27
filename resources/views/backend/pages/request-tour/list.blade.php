@extends('backend.layouts.app')
@section('extraCSS')
<link href="{{asset('assets/backend/dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('onPage')
Master Web > <span style="color: #4e73df;">Request Tour</span>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <a href="{{url('/admin/request-tour/add')}}">
            <button class="btn btn-primary btn-icon-split mb-3 float-left">
                <span class="icon text-white">
                    <i class="fas fa-plus"></i>&nbsp;&nbsp;&nbsp;Tambah Data
                </span>
            </button>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">List Data Request Tour</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTableRequestTour" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th style="font-size: 11pt;"><center>No.</center></th>
                                <th style="font-size: 11pt;">Nama</th>
                                <th style="font-size: 11pt;">Surel</th>
                                <th style="font-size: 11pt;">Tanggal pemberangkatan</th>
                                <th style="font-size: 11pt;">Nomor Telepon</th>
                                <th style="font-size: 11pt;">Destinasi</th>
                                <th style="font-size: 11pt;">Lama Berlibur</th>
                                <th style="font-size: 11pt;">Penginapan</th>
                                <th style="font-size: 11pt;">Jumlah Peserta</th>
                                <th style="font-size: 11pt;">Berangkat Dari</th>
                                <th style="font-size: 11pt;">Pesan</th>
                                <th style="font-size: 11pt;">Status</th>
                                <th style="font-size: 11pt; width: 70px;"><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getRequestTour as $item)
                            <tr>
                                <td style="font-size: 10pt;" class="align-middle"><center>{{$loop->iteration}}</center></td>
                                <td style="font-size: 10pt;" class="align-middle">{{$item->name}}</td>
                                <td style="font-size: 10pt;" class="align-middle">{{$item->email}}</td>
                                <td style="font-size: 10pt;" class="align-middle">{{$item->date_departure}}</td>
                                <td style="font-size: 10pt;" class="align-middle">{{$item->phone_number}}</td>
                                <td style="font-size: 10pt;" class="align-middle">{{$item->destination}}</td>
                                <td style="font-size: 10pt;" class="align-middle">{{$item->long_vacation}}</td>
                                <td style="font-size: 10pt;" class="align-middle">{{$item->lodge}}</td>
                                <td style="font-size: 10pt;" class="align-middle">{{$item->qty_participant}}</td>
                                <td style="font-size: 10pt;" class="align-middle">{{$item->from}}</td>
                                <td style="font-size: 10pt;" class="align-middle">{{$item->message}}</td>
                                <td style="font-size: 10pt;" class="align-middle"><center><span class="badge @if ($item->status == 'selesai') bg-primary @elseif ($item->status == 'diterima') bg-success @elseif ($item->status == 'ditolak') bg-danger @elseif ($item->status == 'menunggu') bg-warning @endif p-2 text-white">{{$item->status}}</span></center></td>
                                <td style="font-size: 10pt;" class="align-middle"><center>
                                    <form action="{{url('/admin/request-tour')}}/{{$item->id}}/detail" method="GET" class="d-inline">
                                        <button type="submit" class="btn btn-sm btn-info btn-circle">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </form> |
                                    <form action="{{url('/admin/request-tour')}}/{{$item->id}}/drop" method="POST" class="d-inline">
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
        $('#dataTableRequestTour').DataTable();
    });
</script>
@endsection