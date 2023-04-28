@extends('backend.layouts.app')
@section('extraCSS')
<link href="{{asset('assets/backend/dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('onPage')
Master Web > Promo > <span style="color: #4e73df;">List Promo</span>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <a href="{{url('/admin/promo/list-promo/add')}}">
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
              <h6 class="m-0 font-weight-bold text-primary">List Data Promo</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTablePromoList" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><center>No.</center></th>
                                <th>Judul</th>
                                <th>Tanggal Posting</th>
                                <th>Periode Booking</th>
                                <th>Periode Berangkat</th>
                                <th>Thumbnail</th>
                                <th style="width: 75px;"><center>Aksi</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getPromo as $item)
                            <tr>
                                <td class="align-middle"><center>{{$loop->iteration}}</center></td>
                                <td class="align-middle">{{$item->title}}</td>
                                <td class="align-middle">{{$item->date_post}}</td>
                                <td class="align-middle">{{$item->period_booked_start}} - {{$item->period_booked_end}}</td>
                                <td class="align-middle">{{$item->period_depart_start}} - {{$item->period_depart_end}}</td>
                                <td class="align-middle"><center><img src="{{asset('assets/upload/promo/'.$item->thumbnail)}}" style="width: 100px;"></center></td>
                                <td class="align-middle"><center>
                                    <form action="{{url('/admin/promo/list-promo')}}/{{$item->id}}/edit" method="GET" class="d-inline">
                                        <button type="submit" class="btn btn-sm btn-info btn-circle">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </form> |
                                    <form action="{{url('/admin/promo/list-promo')}}/{{$item->id}}/drop" method="POST" class="d-inline">
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
        $('#dataTablePromoList').DataTable();
    });
</script>
@endsection