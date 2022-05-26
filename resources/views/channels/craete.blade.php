@extends('layouts.master')
@section('css')
    <link href="{{ asset('assets/plugins/jquery-nice-select/css/nice-select.css') }}" rel="stylesheet" />

    <style>
        .ql-tooltip {
            display: none;
        }

        span.select2 {
            width: 100% !important;
        }

        .input-group {

            width: 100% !important;
            padding: 0;
        }

    </style>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">اضافة قناة</h2>
            </div>
        </div>

    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- Row Content -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-3 col-md-12 mb-3 mb-md-0">
            <form action="{{route('channels.store')}}" method="post">
                @method('POST')
                @csrf
                <div class="card">
                    <div class="card-header border-bottom pt-3 pb-3 mb-0 font-weight-bold text-uppercase">الاعدادات</div>
                    <div class="card-body pb-0">
                        <div class="form-group">
                            <label class="form-label">اسم القناة</label>
                            <input type="text" name="name_channel" class="form-control" placeholder="اسم القناة.." value="{{old('name_channel')}}">
                        </div>
                    </div>

                    <div class="py-2 px-3">
                        <button class="btn btn-primary-gradient mt-2 mb-2 pb-2" type="submit">حفظ الأن</button>
                    </div>
                </div>

        </div>

        <div class="col-xl-9 col-lg-9 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <div class="main-content-label mg-b-5">
                            روابط البث
                        </div>
                        <p>رابط البث تكون (m3u,m3u8,..)</p>
                        <div class="row row-sm">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">الرابط الاول : </label>
                                    <input class="form-control" type="text" placeholder="الرابط الاول" name="urlOne" value="{{old('urlOne')}}">
                                    @error('urlOne') {{$message}} @enderror
                                </div>
                            </div>

                             <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">الرابط الثاني : </label>
                                    <input class="form-control" type="text" placeholder="الرابط الثاني" name="urlTwo" value="{{old('urlTwo')}}">
                                    @error('urlTwo') {{$message}} @enderror
                                </div>
                            </div>

                             <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">الرابط الثالث : </label>
                                    <input class="form-control" type="text" placeholder="الرابط الثالث" name="urlThree" value="{{old('urlThree')}}">
                                    @error('urlThree') {{$message}} @enderror
                                </div>
                            </div>

                        </div>




                    </div>
                </div>


            </div>
        </div>
            </form>

    </div>
    </div>
    <!-- Container closed -->
@endsection
@section('js')
    <script src="{{ asset('assets/plugins/jquery-nice-select/js/jquery.nice-select.js') }}"></script>

    <script>
        (function($) {
            "use strict";

            // ______________Nice Select
            $('select.nice-select').niceSelect();
        })(jQuery);
    </script>
@endsection
