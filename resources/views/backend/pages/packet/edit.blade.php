@extends('backend.layouts.app')
@section('onPage')
Master Web > Paket > List Paket > <span style="color: #4e73df;">Edit Paket</span>
@endsection
@section('extraCSS')
<link href="{{ asset('assets/backend/dashboard/vendor/summernote/summernote.min.css') }}" rel="stylesheet">
<link href="{{asset('assets/backend/dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Data Paket</h6>
            </div>
            <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/admin/packet/list-packet/update/'.$getDetailPacket->id)}}">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title" class="ml-1">Judul* :</label>
                            <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" placeholder="Judul..." value="{{old('title', $getDetailPacket->title)}}" autocomplete="off">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-row my-3 align-items-center">
                            <div class="col-3">
                                <center>
                                    <img id="preview" src="{{asset('assets/upload/packet/'.$getDetailPacket->thumbnail)}}" style="width: 200px;">
                                </center>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <label for="thumbnail" class="ml-1">Cover* :</label>
                                    <input type="file" id="images" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" placeholder="Cover..." value="{{old('thumbnail')}}" style="padding-bottom: 36px !important;" autocomplete="off">
                                    @error('thumbnail')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description" class="ml-1">Deskripsi* :</label>
                            <input type="text" class="form-control  @error('description') is-invalid @enderror" name="description" placeholder="Deskripsi..." value="{{old('description', $getDetailPacket->description)}}" autocomplete="off">
                            @error('description')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="summary_and_detination" class="ml-1">Ringkasan dan Tujuan Destinasi* :</label>
                            <textarea name="summary_and_detination" id="summary_and_detination" rows="2" class="form-control @error('summary_and_detination') is-invalid @enderror">{!! old('summary_and_detination', $getDetailPacket->summary_and_detination) !!}</textarea>
                            @error('summary_and_detination')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="term_and_condition" class="ml-1">Syarat dan Ketentuan* :</label>
                            <textarea name="term_and_condition" id="term_and_condition" rows="2" class="form-control @error('term_and_condition') is-invalid @enderror">{!! old('term_and_condition', $getDetailPacket->term_and_condition) !!}</textarea>
                            @error('term_and_condition')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="schedule_and_activities" class="ml-1">Jadwal dan Kegiatan* :</label>
                            <textarea name="schedule_and_activities" id="schedule_and_activities" rows="2" class="form-control @error('schedule_and_activities') is-invalid @enderror">{!! old('schedule_and_activities', $getDetailPacket->schedule_and_activities) !!}</textarea>
                            @error('schedule_and_activities')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="price_and_facilities" class="ml-1">Harga dan Fasilitas* :</label>
                            <textarea name="price_and_facilities" id="price_and_facilities" rows="2" class="form-control @error('price_and_facilities') is-invalid @enderror">{!! old('price_and_facilities', $getDetailPacket->price_and_facilities) !!}</textarea>
                            @error('price_and_facilities')
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
                        <span class="text">Simpan Paket</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Galeri Paket</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTableGaleryPacket" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><center>No.</center></th>
                                <th>Keterangan</th>
                                <th>Gambar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getGalleryPacket as $item)
                            <tr>
                                <td class="align-middle"><center>{{$loop->iteration}}</center></td>
                                <td class="align-middle">{{$item->caption}}</td>
                                <td class="align-middle"><center><img src="{{asset('assets/upload/packet-gallery/'.$item->image)}}" style="width: 150px;"></center></center></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">List Rating Paket</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTableRatingPacket" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><center>No.</center></th>
                                <th><center>Nama</center></th>
                                <th><center>Surel</center></th>
                                <th><center>Akomodasi</center></th>
                                <th><center>Makanan</center></th>
                                <th><center>Destinasi</center></th>
                                <th><center>Kendaraan</center></th>
                                <th><center>Biaya</center></th>
                                <th><center>Keseluruhan</center></th>
                                <th><center>Status</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getRatingPacket as $item)
                            <tr>
                                <td class="align-middle"><center>{{$loop->iteration}}</center></td>
                                <td class="align-middle">{{$item->name}}</td>
                                <td class="align-middle">{{$item->email}}</td>
                                <td class="align-middle"><center>⭐{{$item->accomodation}}</center></td>
                                <td class="align-middle"><center>⭐{{$item->meal}}</center></td>
                                <td class="align-middle"><center>⭐{{$item->destination}}</center></td>
                                <td class="align-middle"><center>⭐{{$item->transport}}</center></td>
                                <td class="align-middle"><center>⭐{{$item->value_for_money}}</center></td>
                                <td class="align-middle"><center>⭐{{$item->overall}}</center></td>
                                <td class="align-middle"><center><span class="badge @if ($item->status == 'sudah dibaca') bg-success @elseif ($item->status == 'belum dibaca') bg-secondary @endif p-2 text-white">{{$item->status}}</span></center></td>
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
<script src="{{ asset('assets/backend/dashboard/vendor/summernote/summernote.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#summary_and_detination').summernote({
            placeholder: 'Masukkan teks ringkasan dan tujuan destinasi disini',
            tabsize: 2,
        });
        $('#term_and_condition').summernote({
            placeholder: 'Masukkan teks syarat dan ketentuan disini',
            tabsize: 2,
        });
        $('#schedule_and_activities').summernote({
            placeholder: 'Masukkan teks syarat dan ketentuan disini',
            tabsize: 2,
        });
        $('#price_and_facilities').summernote({
            placeholder: 'Masukkan teks syarat dan ketentuan disini',
            tabsize: 2,
        });
    });
</script>
<script>
    images.onchange = evt => {
        const [file] = images.files;
        if (file) {
            preview.src = URL.createObjectURL(file);
            fileName.innerHTML = document.getElementById("images").value.split("\\").pop();
        }
    }
</script>
<script src="{{asset('assets/backend/dashboard/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/backend/dashboard/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#dataTableGaleryPacket').DataTable();
        $('#dataTableRatingPacket').DataTable();
    });
</script>
@endsection