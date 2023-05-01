@extends('backend.layouts.app')
@section('onPage')
Master Web > Paket > List Paket > <span style="color: #4e73df;">Tambah Paket</span>
@endsection
@section('extraCSS')
<link href="{{ asset('assets/backend/dashboard/vendor/summernote/summernote.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Data Paket</h6>
            </div>
            <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/admin/packet/list-packet/store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="title" class="ml-1">Judul* :</label>
                            <input type="text" class="form-control  @error('title') is-invalid @enderror" name="title" placeholder="Judul..." value="{{old('title')}}" autocomplete="off">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="thumbnail" class="ml-1">Cover* :</label>
                            <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="thumbnail" placeholder="Cover..." value="{{old('thumbnail')}}" style="padding-bottom: 36px !important;" autocomplete="off">
                            @error('thumbnail')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description" class="ml-1">Deskripsi* :</label>
                            <input type="text" class="form-control  @error('description') is-invalid @enderror" name="description" placeholder="Deskripsi..." value="{{old('description')}}" autocomplete="off">
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
                            <textarea name="summary_and_detination" id="summary_and_detination" rows="2" class="form-control @error('summary_and_detination') is-invalid @enderror">{!! old('summary_and_detination') !!}</textarea>
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
                            <textarea name="term_and_condition" id="term_and_condition" rows="2" class="form-control @error('term_and_condition') is-invalid @enderror">{!! old('term_and_condition') !!}</textarea>
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
                            <textarea name="schedule_and_activities" id="schedule_and_activities" rows="2" class="form-control @error('schedule_and_activities') is-invalid @enderror">{!! old('schedule_and_activities') !!}</textarea>
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
                            <textarea name="price_and_facilities" id="price_and_facilities" rows="2" class="form-control @error('price_and_facilities') is-invalid @enderror">{!! old('price_and_facilities') !!}</textarea>
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
@endsection