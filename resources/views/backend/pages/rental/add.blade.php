@extends('backend.layouts.app')
@section('onPage')
Master Web > Rental > List Rental > <span style="color: #4e73df;">Tambah Rental</span>
@endsection
@section('extraCSS')
<link href="{{ asset('assets/backend/dashboard/vendor/summernote/summernote.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Data Rental</h6>
            </div>
            <form class="card-body" method="POST" enctype="multipart/form-data" action="{{url('/admin/rental/list-rental/store')}}">
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
                            <label for="start_from" class="ml-1">Harga Mulai* :</label>
                            <input type="number" class="form-control  @error('start_from') is-invalid @enderror" name="start_from" placeholder="Harga Mulai..." value="{{old('start_from')}}" autocomplete="off">
                            @error('start_from')
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
                            <label for="type_and_price" class="ml-1">Tipe dan Harga* :</label>
                            <textarea name="type_and_price" id="type_and_price" rows="2" class="form-control @error('type_and_price') is-invalid @enderror">{!! old('type_and_price') !!}</textarea>
                            @error('type_and_price')
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
                            <label for="faq" class="ml-1">Faq* :</label>
                            <textarea name="faq" id="faq" rows="2" class="form-control @error('faq') is-invalid @enderror">{!! old('faq') !!}</textarea>
                            @error('faq')
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
        $('#type_and_price').summernote({
            placeholder: 'Masukkan teks tipe dan harga disini',
            tabsize: 2,
        });
        $('#term_and_condition').summernote({
            placeholder: 'Masukkan teks syarat dan ketentuan disini',
            tabsize: 2,
        });
        $('#faq').summernote({
            placeholder: 'Masukkan faq disini',
            tabsize: 2,
        });
    });
</script>
@endsection