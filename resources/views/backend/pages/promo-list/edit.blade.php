@extends('backend.layouts.app')
@section('onPage')
Master Web > Promo > List Promo > <span style="color: #4e73df;">Edit Promo</span>
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
                <h6 class="m-0 font-weight-bold text-primary">Form Data Promo</h6>
            </div>
            <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/admin/promo/list-promo/update/'.$getDetailPromo->id)}}">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="title" class="ml-1">Judul* :</label>
                            <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" placeholder="Judul..." value="{{old('title', $getDetailPromo->title)}}" autocomplete="off">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="date_post" class="ml-1">Tanggal Posting* :</label>
                            <input type="date" class="form-control  @error('date_post') is-invalid @enderror" name="date_post" placeholder="Tanggal Posting..." value="{{old('date_post', $getDetailPromo->date_post)}}" autocomplete="off">
                            @error('date_post')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-row my-3 align-items-center">
                    <div class="col-3">
                        <center>
                            <img id="preview" src="{{asset('assets/upload/promo/'.$getDetailPromo->thumbnail)}}" style="width: 200px;">
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description" class="ml-1">Deskripsi* :</label>
                            <textarea name="description" id="description" rows="2" class="form-control @error('description') is-invalid @enderror">{!! old('description', $getDetailPromo->description) !!}</textarea>
                            {{-- <input type="text" class="form-control  @error('description') is-invalid @enderror" name="description" placeholder="Deskripsi..." value="{{old('description')}}" autocomplete="off"> --}}
                            @error('description')
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
                            <label for="period_booked_start" class="ml-1">Periode Boking Mulai* :</label>
                            <input type="date" class="form-control  @error('period_booked_start') is-invalid @enderror" name="period_booked_start" placeholder="Periode Boking Mulai..." value="{{old('period_booked_start', $getDetailPromo->period_booked_start)}}" autocomplete="off">
                            @error('period_booked_start')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="period_booked_end" class="ml-1">Periode Boking Selesai* :</label>
                            <input type="date" class="form-control  @error('period_booked_end') is-invalid @enderror" name="period_booked_end" placeholder="Periode Boking Selesai..." value="{{old('period_booked_end', $getDetailPromo->period_booked_end)}}" autocomplete="off">
                            @error('period_booked_end')
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
                            <label for="period_depart_start" class="ml-1">Periode Berangkat Mulai* :</label>
                            <input type="date" class="form-control  @error('period_depart_start') is-invalid @enderror" name="period_depart_start" placeholder="Periode Berangkat Mulai..." value="{{old('period_depart_start', $getDetailPromo->period_depart_start)}}" autocomplete="off">
                            @error('period_depart_start')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="period_depart_end" class="ml-1">Periode Berangkat Selesai* :</label>
                            <input type="date" class="form-control  @error('period_depart_end') is-invalid @enderror" name="period_depart_end" placeholder="Periode Berangkat Selesai..." value="{{old('period_depart_end', $getDetailPromo->period_depart_end)}}" autocomplete="off">
                            @error('period_depart_end')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="term_and_condition" class="ml-1">Syarat dan Ketentuan* :</label>
                            <textarea name="term_and_condition" id="term_and_condition" rows="2" class="form-control @error('term_and_condition') is-invalid @enderror">{!! old('term_and_condition', $getDetailPromo->term_and_condition) !!}</textarea>
                            @error('term_and_condition')
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
                        <span class="text">Simpan Promo</span>
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
              <h6 class="m-0 font-weight-bold text-primary">List Komentar Promo</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered thisDisplay" id="dataTablePromoComment" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><center>No.</center></th>
                                <th>Nama</th>
                                <th>Surel</th>
                                <th>Pesan</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getCommentPromo as $item)
                            <tr>
                                <td class="align-middle"><center>{{$loop->iteration}}</center></td>
                                <td class="align-middle">{{$item->name}}</td>
                                <td class="align-middle">{{$item->message}}</td>
                                <td class="align-middle"><center><span class="badge @if ($item->status == 'sudah dilihat') bg-success @elseif ($item->status == 'belum dilihat') bg-secondary @endif p-2 text-white">{{$item->status}}</span></center></td>
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
        $('#description').summernote({
            placeholder: 'Masukkan teks deskripsi disini',
            tabsize: 2,
            // height: 500,
            // toolbar: [
            //     // [groupName, [list of button]]
            //     ['style', ['bold', 'italic', 'underline', 'clear']],
            //     ['font', ['strikethrough', 'superscript', 'subscript']],
            //     ['fontsize', ['fontsize']],
            //     ['color', ['color']],
            //     ['para', ['ul', 'ol', 'paragraph']],
            //     ['height', ['height']]
            // ]
        });
        $('#term_and_condition').summernote({
            placeholder: 'Masukkan teks syarat dan ketentuan disini',
            tabsize: 2,
        });
    });
</script>
<script src="{{asset('assets/backend/dashboard/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/backend/dashboard/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready( function () {
        $('#dataTablePromoComment').DataTable();
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
@endsection